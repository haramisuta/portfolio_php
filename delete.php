<?php
require_once '\MAMP\db_config.php';
try {
    //GET変数でIDを受取
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    //データベースに接続
    $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //DELETEのSQLを入力
    $sql = "DELETE FROM recipes WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    //プレースホルダの値を指定し、データベースの操作を実行
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $dbh = null;
    echo "ID: " . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . "の削除が完了しました。";
    echo "<a href='index.php'>トップページへ戻る</a>";
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
