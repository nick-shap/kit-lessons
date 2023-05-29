<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Возведение числа в квадрат</title>
</head>
<body>
    <form action="/les4/square" method="post">
        <input type="text" name="num" value="<?php echo $data["num"] ?? 0?>">
        <button type="submit" name="submit" value="calculate">Получить ответ</button>
    </form>
    <h2 style="margin-top: 16px">
        <?php echo  $data["total"] ?? 0?>
    </h2>
</body>
</html>






