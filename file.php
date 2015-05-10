<?php

        if (empty($_POST['lastname']) or empty($_POST['firstname']) or empty($_POST['amount']) or empty($_POST['comments'])) exit('заполните все поля');
        if (isset($_POST['lastname']) and isset($_POST['firstname']) and isset($_POST['amount'])) {
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $amount = (int)$_POST['amount'];
            $comments = $_POST['comments'];
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
echo "ваше имя:  <b>" + $firstname + "</b><br>";
echo "товар:  <b>"+ $item+"</b><br>";
echo "цена: <b>" + $price + "</b><br>";
echo "количество: <b>"+ $amount +"</b><br>";
echo "итого к оплате: <b>"+ $sum +"</b><br>";

if (empty($_POST['lastname']) or empty($_POST['firstname']) or empty($_POST['amount']) or empty($_POST['comments'])) exit('заполните все поля');
if (isset($_POST['lastname']) and isset($_POST['firstname']) and isset($_POST['amount']))
{
    $lastname=$_POST['lastname'];
    $firstname=$_POST['firstname'];
    $amount=(int)$_POST['amount'];
    $comments=$_POST['comments'];
    $menu=$_POST['menu'];

    if ($menu == "magnet"){ $price = 469; $item = "магнит";}
    if ($menu == "dutka"){ $price = 799; $item = "дудка";}
    if ($menu == "pen"){ $price = 2299; $item = "ручка";}
    if ($menu == "shawl"){ $price = 1499; $item = "платок";}
    if ($menu == "mazayka"){ $price = 999; $item = "мазайка";}
    $sum = $amount * $price;


    /*  try {
          $csv = new CSV("1.csv"); //Открываем наш csv
          /**
           * Чтение из CSV  (и вывод на экран в красивом виде)
           */
    /*echo "<h2>CSV до записи:</h2>";
    $get_csv = $csv->getCSV();

    foreach ($get_csv as $value) { //Проходим по строкам
        echo "фамилия: " . $value[0] . "<br/>";
        echo "имя: " . $value[1] . "<br/>";
        echo "количество: " . $value[2] . "<br/>";
        echo "товар: " . $value[3] . "<br/>";
        echo "цена: " . $value[4] . "<br/>";
        echo "итого: " . $value[5] . "<br/>";
        echo "--------<br/>";
    }*/

    /**
     * Запись новой информации в CSV
     */
    /*
        $arr = array("$lastname;$firstname;$amount;$item;$price;$sum");
        $csv->setCSV($arr);
    }
    catch (Exception $e) { //Если csv файл не существует, выводим сообщение
        echo "Ошибка: " . $e->getMessage();
    }*/


    echo "ваше имя:  <b> $firstname</b><br>";
    echo "товар:  <b> $item</b><br>";
    echo "цена: <b> $price</b><br>";
    echo "количество: <b> $amount</b><br>";
    echo "итого к оплате: <b> $sum </b><br>";
}

/**
 * Класс для работы с csv-файлами
 * @author дизайн студия ox2.ru
 */
class CSV {

    private $_csv_file = null;

    /**
     * @param string $csv_file  - путь до csv-файла
     */
    public function __construct($csv_file) {
        if (file_exists($csv_file)) { //Если файл существует
            $this->_csv_file = $csv_file; //Записываем путь к файлу в переменную
        }
        else { //Если файл не найден то вызываем исключение
            throw new Exception("Файл " +$csv_file+" не найден");
        }
    }

    public function setCSV(Array $csv) {
        //Открываем csv для до-записи,
        //если указать w, то  ифнормация которая была в csv будет затерта
        $handle = fopen($this->_csv_file, "a");

        foreach ($csv as $value) { //Проходим массив
            //Записываем, 3-ий параметр - разделитель поля
            fputcsv($handle, explode(";", $value), ";");
        }
        fclose($handle); //Закрываем
    }

    /**
     * Метод для чтения из csv-файла. Возвращает массив с данными из csv
     * @return array;
     */
    public function getCSV() {
        $handle = fopen($this->_csv_file, "r"); //Открываем csv для чтения

        $array_line_full = array(); //Массив будет хранить данные из csv
        //Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $array_line_full[] = $line; //Записываем строчки в массив
        }
        fclose($handle); //Закрываем файл
        return $array_line_full; //Возвращаем прочтенные данные
    }

}
?>*?/