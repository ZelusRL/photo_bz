<?php
session_start();
$db = new PDO('mysql:dbname=bz_photo;host=localhost', 'root', '');
function __autoload($className)
{
	require('models/'.$className.'.class.php');
}
// $db = mysqli_connect("localhost", "root", "troiswa", "bz_photo");
$error = '';
$page = "home";
$access = ["home", "gallery", "contact", "login", "register", "test"];
$accessIn = ["home", "galery", "contact", "img"];
if(isset($_GET['page']))
{
	if(isset($_SESSION['id']) && in_array($_GET['page'], $accessIn))
	{
		$page = $_GET['page'];

	}

	else if(in_array($_GET['page'], $access))
	{
		$page = $_GET['page'];
	}
}
$traitementList = [
	"register" => "users", "login" => "users", "logout" => "users",
	"img" => "img"
];
if(isset($_GET['page'], $traitementList[$_GET['page']]))
	require("apps/traitement_".$traitementList[$_GET['page']].".php");
require("apps/skel.php");
?>