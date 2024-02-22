<?php

$token = "7198035973:AAGhpvylgTDQ0eNJ6f1-kmX7mUmuVJv9v0A";
$path = "https://api.telegram.org/bot".$token;

$update = json_decode(file_get_contents("php://input"), true);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if (strpos($message, "/weather") === 0) {
$location = substr($message, 9);
$weather = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=mytoken"), TRUE)["weather"][0]["main"];
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$location.": ". $weather);
}


?>
