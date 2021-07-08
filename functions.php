<?php
// データベースに接続
function connectDB()
{
    $param = 'mysql:dbname=my_image;host=localhost';
    try {
        $pdo = new PDO($param, 'root', '');
        return $pdo;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
// ログイン状態のチェック関数
function check_session_id()
{ // 失敗時はログイン画面に戻る
    if (
        !isset($_SESSION['session_id']) || // session_idがない
        $_SESSION['session_id'] != session_id() // idが一致しない 
    ) {
        header('Location: login.php'); // ログイン画面へ移動 
    } else {
        session_regenerate_id(true); // セッションidの再生成
        $_SESSION['session_id'] = session_id(); // セッション変数上書き }
    }
}
