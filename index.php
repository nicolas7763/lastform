<?php 
/*define('ADMIN_USER', 'admin');
define('ADMIN_PASSWORD', 'pass');
$noAuthParams = !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']);

$isValidLogin = $_SERVER['PHP_AUTH_USER'] == ADMIN_USER;
$isValidPassword = $_SERVER['PHP_AUTH_PW'] == ADMIN_PASSWORD;

if ($noAuthParams || !$isValidLogin || !$isValidPassword) {
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: Basic realm = "MyRealm"');
		echo "Доступ к данной странице запрещен!";
		die;
}
echo "Добро пожаловать в административную часть, " . ADMIN_USER;*/
?>


<?php
session_start();

if(isset($_SESSION['admin'])){
   // $_SESSION['admin'] = 'list.php';
header("Location: admin.php");
die;
}

if ($submit = filter_input(INPUT_POST, 'submit')) {
	//$user = $_POST["user"];
    $user = filter_input(INPUT_POST, 'user');
	//$pass = $_POST["pass"];
    $pass = filter_input(INPUT_POST, 'pass');
	$a =array();
	$a['user'] = $user;
	$a['pass'] = $pass;
	//var_dump($a);
	file_put_contents('file.json', json_encode($a));//создаем файл json
$f = fopen('file.json', 'r');// открываем и читаем 
$data = stream_get_contents($f);//получаем содержимое
//echo "$data";
$fileAut= fopen('auth.json', 'r');
$data1 = stream_get_contents($fileAut);
var_dump($data1);

if ($data == $data1) {
	$admin = 'admin';
	$_SESSION['admin'] = $admin;
	//var_dump($_SESSION['admin']);
	header("Location: admin.php");
	die;
}else{
	echo "Здравствуйте, вы вошли как гость " . $user;
	//die;
	sleep(5);
	header("Location: list.php");
	die;
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
</head>
<body>
<form method="post">
Username: <input type="text" name="user" /><br />
<?php echo "<br />"; ?>
Password: <input type="password" name="pass" /><br />
<input type="submit" name="submit" value="Войти" />
</form>

</body>
</html>