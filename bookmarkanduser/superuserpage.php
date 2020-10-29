<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = user_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザーリスト(スーパー管理者画面)</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/bookmark.css">
  <style>div{padding:10px; }</style>
</head>
<body>
<div class ="title" style="background-color: #213e3b; height:80px;margin-bottom:40px;margin-left:10px;color:white;">
  <h1 class="home_title">ユーザーリスト(スーパー管理者画面)</h1>
</div>

<a href="index.php">
    <button style="border:1px solid #e6d5b8;background-color: #e6d5b8; color:white;cursor:pointer;height:50px;width:280px;border-radius:0.5;margin-top:50px;margin-left:38%;font-size:20px;padding:10px;border-radius:0.5;">書類管理画面
</button>
</a>

<a href="superuserselect.php">
    <button style="border:1px solid #8db596;background-color: #8db596; color:white;cursor:pointer;height:50px;width:280px;border-radius:0.5;margin-top:50px;margin-left:38%;font-size:20px;padding:10px;border-radius:0.5;"> スーパーユーザー管理画面
</button>
</a><br>

<a href="userindex.php"><button style="border:1px solid #707070;background-color: #707070; color:white;cursor:pointer;height:30px;border-radius:0.5;margin-left:10px;margin-top:50px;">戻る</button></a>


</body>


</html>

