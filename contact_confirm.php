<?php
require_once '\MAMP\db_config.php';
$handle_name = $_POST['handle_name'];
$gender = (int) $_POST['gender'];
$age = (int) $_POST['age'];
$mail_address = $_POST['mail_address'];
$phone_number = $_POST['phone_number'];
$contact = $_POST['contact'];

//$genderのvalueを
if($gender === 1){$gender_display = "男性";}
else if($gender === 2){$gender_display = "女性";}
else{$gender_display = "ひみつ";}

echo "<!DOCTYPE html>
<html lang=’ja’>
<head>
    <meta charset=’UTF-8’>
    <meta name=’viewport’ content=’width=device-width, initial-scale=1.0’>
    <title>お問い合わせ内容|確認</title>
</head>
<body>
以下の内容でよろしいですか？</br></br>
ハンドルネーム：$handle_name
</br>
性別：$gender_display
</br>
年齢：$age 歳
</br>
電話番号：$phone_number
</br>
メールアドレス：$mail_address
</br>
ご用件：$contact
<form method='post' action='contact_add.php'>
    <input type='hidden' name='handle_name' value='$handle_name'>
    <input type='hidden' name='gender' value='$gender'>
    <input type='hidden' name='age' value='$age'>
    <input type='hidden' name='phone_number' value='$phone_number'>
    <input type='hidden' name='contact' value='$contact'>
    <input type='submit' value='送信'>
</form>
    <a href='contact.html'>お問い合わせへ戻る</a><br>
    <a href='index.php'>トップページへ戻る</a>
</body>
</html>";