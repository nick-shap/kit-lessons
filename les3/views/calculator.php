<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Простой калькулятор</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="first_num" value="<?php echo $data["first_num"] ?? 0?>">
    <select name="sign">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="second_num" value="<?php echo $data["second_num"] ?? 0?>">
    <button type="submit" name="submit" value="calculate">Получить ответ</button>

<h2 style="margin-top: 16px">
    <?php echo  $data["total"] ?? 0?>
</h2>

