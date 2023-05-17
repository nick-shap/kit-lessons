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
    <input type="text" name="first_num" value="<?php echo $data["num1"]?>">
    <select name="sign">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="second_num" value="<?php echo $data["num2"]?>">
    <button type="submit" name="submit" value="calculate">Получить ответ</button>
</form>
<?php echo '<h2 style="margin-top: 16px">' . $result . '</h2>';?>
</body>
</html>