<?php
// Файлы phpmailer
require ‘phpmailer.php’;
require ‘smtp.php’;
// Переменные
$name = $_POST[‘name’];
$number = $_POST[‘number’];
$email = $_POST[‘email’];
$message = $_POST[‘msg’];
// Настройки
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->Host = ‘smtp.yandex.ru’; 
$mail->SMTPAuth = true; 
$mail->Username = cs-lg.ru; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = ‘stories96’; // Ваш пароль
$mail->SMTPSecure = ‘ssl’; 
$mail->Port = 465;
$mail->setFrom(‘mcmertos@yandex.ru’); // Ваш Email
// Прикрепление файлов
 for ($ct = 0; $ct < count($_FILES[‘userfile’][‘tmp_name’]); $ct++) {
 $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES[‘userfile’][‘name’][$ct]));
 $filename = $_FILES[‘userfile’][‘name’][$ct];
 if (move_uploaded_file($_FILES[‘userfile’][‘tmp_name’][$ct], $uploadfile)) {
 $mail->addAttachment($uploadfile, $filename);
 } else {
 $msg .= ‘Failed to move file to ‘ . $uploadfile;
 }
 } 
 
// Письмо
$mail->isHTML(true); 
$mail->Subject = “Заявка сайта”; // Заголовок письма
$mail->Body = “$name . оставил заявку . <br> . Контатные данные: . <br> . Номер телефона: . $number . <br> . . Почта: . $email . <br> . Сообщение . $msg”; // Текст письма
// Результат
if(!$mail->send()) {
 echo ‘Message could not be sent.’;
 echo ‘Mailer Error: ‘ . $mail->ErrorInfo;
} else {
 echo ‘ok’;
}
?>