<?php
//session_start();
$ot = 0;
   $not = 0;
   $answer = filter_input(INPUT_POST, 'answer');
      if ($answer == 'a'){$ot++;} else {$not++;}
      //var_dump($_POST['answer']);

        if($ot > $not){
            $f = fopen('file.json', 'r');// открываем и читаем 
            $data = stream_get_contents($f);//получаем содержимое
            $array = json_decode($data, true);
     $text = $array['user'] . ', поздравляем!!! Тест пройден успешно!!!';
 } else {
     $f = fopen('file.json', 'r');// открываем и читаем 
            $data = stream_get_contents($f);//получаем содержимое
     $array = json_decode($data, true);
    $text =  $array['user'] .  ', Тест не пройден! Попробуйте еще раз.' ;  
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Тест</title>
</head>
<body>
 <h1><?=$text?></h1>   
<p><a href="list.php">Попробовать снова!</a></p>
<p><b>Правильных ответов: <?php echo $ot; ?></b></p>
<p><b>Неправильных ответов: <?php echo $not; ?></b></p>
<img src ="image.php" alt="Рисунок">

</body>
</html>
