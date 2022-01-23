<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1933557714:AAGX0bEWCDiiYtAy9ezd9rJdNmKOOY0xJwU";

//Сюда вставляем chat_id
$chat_id = "-1001508067558";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $phone = ($_POST['phone']);
    $quantityOfPeople = ($_POST['quantity_of_people']);
    $addres = ($_POST['addres']);
    $home = ($_POST['home']);
    $flat = ($_POST['flat']);
    $entrance = ($_POST['entrance']);
    $floor = ($_POST['floor']);
    $payment = ($_POST['payment']);
    $productName = implode(', ', $_POST['productName']);;

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Имя:' => $name,
        'Телефон:' => $phone,
        'Кол-во наборов:' => $quantityOfPeople,
        'Адрес:' => $addres,
        'Дом:' => $home,
        'Квартира:' => $flat,
        'Подъезд:' => $entrance,
        'Этаж:' => $floor,
        'Оплата:' => $payment,
        'Названия продуктов:' => $productName
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


}

$new_url = '../index.html';
header('Location: '.$new_url);
?>