<?php
session_start();
$do = filter_input(INPUT_GET, 'do');
if($do == 'logout'){
unset($_SESSION['admin']);
session_destroy();
header("Location: index.php");
die;
}

if(!$_SESSION['admin']){
header("Location: 403.php");
die;
}



if (isset($_POST["send"])) {
	header("Location:list.php");
}
?>

<!DOCTYPE html>
    <HTML>
    <HEAD>
	<title>Тестовая камера</title>
    </HEAD>
<body>
<h1>В данный момент файлы тестов загружены</h1>
<h2>Для перехода к тестированию жмем кнопку "загрузить"</h2>
<form enctype="multipart/form-data" action="" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="30000">
Отправить: <input name="userfile" type="file">
<input type="submit" name="send" value="Загрузить">
</form>
<a href="admin.php?do=logout">Выход</a>
</body>
    </HTML>

<?php
if (!empty($_FILES['userfile'])){
$uploaddir = 'test/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
}
?>
