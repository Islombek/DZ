<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>День Добра</title>
    <style>
        body {
            background: #fffd8b;
        }

        textarea {
            min-width: 200px;
            max-width: 200px;
            max-height: 100px;
            display: block;
            margin-bottom: 20px;
        }

        div {
            width: 430px;
            height: 450px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
        }

        table {
            margin: 0 auto;
        }

        th,td {
            padding: 5px;
            background: #fff;
            width: 100px;
        }

    </style>
    <?php
    if(isset($_POST['submit'])) {
        if (empty($_POST['lastname']) or empty($_POST['firstname']) or empty($_POST['email'])) exit('заполните все поля');
        else {
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $amount = (int)$_POST['amount'];
            $comments = $_POST['email'];
            $menu = $_POST['menu'];

            if ($menu == "magnet") {
                $price = 469;
                $item = "магнит";
            }
            if ($menu == "dutka") {
                $price = 799;
                $item = "дудка";
            }
            if ($menu == "pen") {
                $price = 2299;
                $item = "ручка";
            }
            if ($menu == "shawl") {
                $price = 1499;
                $item = "платок";
            }
            if ($menu == "mazayka") {
                $price = 999;
                $item = "мазайка";
            }
            $sum = $amount * $price;
        }
        echo "ваше имя:  <b> $firstname </b><br> товар:  <b> $item </b><br> цена: <b> $price </b><br>количество: <b>
                $amount </b><br> итого к оплате: <b> $sum </b><br>";
    }

    ?>
</head>
<body>
<div align="center">
    <form action="" method="post" >
        <input type="text" name="firstname" placeholder="имя">
        <br>
        <input type="text" name="lastname" placeholder="Фамилия">
        <br><br>

        <br>
        <input type="email" name="email" placeholder="email"><br><br>

        Товар
        <br>
        <select name="menu" size="1">
            <option value="magnet">магнит</option>
            <option value="dutka">дудка</option>
            <option value="pen">ручка</option>
            <option value="shawl">платок</option>
            <option value="mazayka">мазайка</option>
        </select>
        <br>
        количество вещей:
        <input type="number" name="amount">
        <br><br>

        <input type="reset"  value="очистить">
        <input type="submit" name="submit"  value="готово">
        <br><br>
    </form>
</div>
</body></html>
