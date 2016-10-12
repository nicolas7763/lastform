<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Список загруженных файлов</title>
</head>
<body>
<h1>Доступные тесты</h1>

<p>Чтобы выбрать тест вводим: /test.php?testnumber=x</p>
<p>где x -номер теста</p>
<p><a href="admin.php">Вернуться в админку</a></p>
<?php
$directory = 'test/';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));
?>
<?php foreach ($scanned_directory as $key => $value) {
 echo "<p>$value</p>"; 
}
?>

</body>
</html>