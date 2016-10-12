<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
   .fig {
    text-align: center; /* Выравнивание по центру */ 
   }
  </style>
</head>
<body>
 <p class="fig"><img src="../image/404.jpg"></p>
<?php
echo "Такого теста не существует! Пожалуйста, выберите тест из указанных в списке!";
http_response_code(404);
 ?>
</body>
</html>