<?php require_once "C:/Users/Nikita/Desktop/kitPHP/les1/functions.php" ?>
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
    <input type="text" name="first_num" value="<?=$_POST["first_num"]?>">
    <select name="sign">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="second_num" value="<?=$_POST["second_num"]?>">
    <button type="submit" name="submit" value="calculate">Получить ответ</button>
</form>

<?php
$result = "";
if (isset($_POST["submit"])) {
    if (isset($_POST["first_num"]) && is_numeric($_POST["first_num"]) && isset($_POST["second_num"]) && is_numeric($_POST["second_num"])) {
        switch ($_POST["sign"]){
            case "+":
                $result = sumNumbers($_POST["first_num"], $_POST["second_num"]);
                break;
            case "-":
                $result = subtractNumbers($_POST["first_num"], $_POST["second_num"]);
                break;
            case "*":
                $result = multiplyNumbers($_POST["first_num"], $_POST["second_num"]);
                break;
            case "/":
                $result = devideNumbers($_POST["first_num"], $_POST["second_num"]);
                break;
        }
    } else {
        $result = "Введите все числа";
    }

    echo '<h2 style="margin-top: 16px">' . $result . '</h2>';
}
?>

</body>
</html>