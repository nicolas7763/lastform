<?php ob_start();?>
<?php
error_reporting(E_ALL);
$testnumb = htmlspecialchars($_GET['testnumber']);//получаем значение номер теста

/*$filename ='test/'.$testnumb .'.json';//прописываем путь к тесту в зависимости от введенного числа
var_dump($filename);
if (file_exists($filename)) {
$f = fopen($filename, 'r');// открываем и читаем
}else  {
	header("Location:404.php");
	ob_end_flush();
 	} 
$data = stream_get_contents($f);//получаем содержимое
$array = json_decode($data, true);*/
$filename = __DIR__ . '/test/' . (int)$testnumb . '.json';
if (file_exists($filename)) {
$data = json_decode(file_get_contents($filename), true);
//var_dump($data);
} else {
  header("Location:404.php");
	ob_end_flush();  
}
foreach ($data as $key => $value) {
	foreach ($value as $value1) {
		//var_dump($value);
		//echo "$value $value1";
		$question = "{$value["question"]}";//получаем только вопросы
		$goodAnswer= "{$value["answer1"]}";
		$badAnswer1 ="{$value["answer2"]}";
		$badAnswer2 ="{$value["answer3"]}";
		//var_dump($goodAnswer);
		
	}//$question = "{$value["question"]}";
	//$goodAnswer= "{$value["answer1"]}"; 
		//$badAnswer1 ="{$value["answer2"]}";
		//$badAnswer2 ="{$value["answer3"]}";
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Тест</title>
</head>
<body>
<p><a href="list.php">вернуться к списку тестов</a></p>
	

<form action="function.php" method= "post">
<div>

<p><b><?=$question?></b></p> 
<label><input name="answer" type="radio" value="a"><b><?=$goodAnswer?></b></label>
<?php echo '<br />'; ?>
<label><input name="answer" type="radio" value="b"><b><?=$badAnswer1?></b></label>
<?php echo '<br />'; ?>
<label><input name="answer" type="radio" value="c"><b><?=$badAnswer2?></b></label>
</div>

<button type="submit" name="send">Результат</button>
</form>

</body>
</html>