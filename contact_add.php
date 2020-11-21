<?php
require_once '\MAMP\db_config.php';
$handle_name = $_POST['handle_name'];
$gender = (int) $_POST['gender'];
$age = (int) $_POST['age'];
$mail_address = $_POST['mail_address'];
$phone_number = $_POST['phone_number'];
$contact = $_POST['contact'];
$datetimes = date('Y-m-d H:i:s', strtotime('+9hour'));

try {
    //データベースに接続
    $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //入力フォームから送信された値をデータベースに挿入
    $sql = "INSERT INTO contacts (handle_name, gender, age, phone_number, contact, datetimes) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $handle_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $gender, PDO::PARAM_INT);
    $stmt->bindValue(3, $age, PDO::PARAM_INT);
    $stmt->bindValue(4, $phone_number, PDO::PARAM_STR);
    $stmt->bindValue(5, $contact, PDO::PARAM_STR);
    $stmt->bindValue(6, $datetimes, PDO::PARAM_STR);
    //データベースへの値の挿入を実行
    $stmt->execute();
    //データベースとの接続を終了
    $dbh = null;
    echo "お問い合わせが完了しました。<br>";
    echo "<a href='index.php'>トップページへ戻る</a>";
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>