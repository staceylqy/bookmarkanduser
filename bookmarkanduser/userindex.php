<?php

require_once("funcs.php");
$pdo = user_conn();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録画面</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/bookmark.css">
  <style>div{padding:10px; }</style>
</head>
<body>
<div class ="title" style="background-color: #495464; height:80px;margin-bottom:40px;margin-left:10px;color:white;">
  <h1 class="home_title">ユーザー登録画面</h1>
</div>
<!-- データ登録 -->
<div class="dataregister">
<form id="dataregister" method="post" action="userinsert.php" class="dataregister">
   <fieldset style="border:1px solid #463333;width:23%;margin-bottom:10px;">
    <h2>ユーザー新規登録</h2>
     <label >ユーザー名前：<input type="text" name="username"></label><br>
     <label >ユーザーID：<input type="text" name="idnumber"></label><br>
     <label >パスワード：<input id="pwdone" type="password" name="password"></label><br><br>
     <label>管理者タイプ:<br>
   
        <input type="radio" name = "type" value="一般管理者">一般管理者
        <input type="radio" name = "type"value="スーパー管理者">スーパー管理者<br>
        
    </label><br>
    <label>
   
        <input type="radio" name = "life"value="入社" checked style="display:none">
        
    </label><br>
    
     <input type="submit" value="新規登録" style="border:1px solid #bbbfca;background-color: #bbbfca; color:white;cursor:pointer;">
    </fieldset>
 
</form>
</div>
<div class="login">
  <div class="container" style="background-color: #f8efd4; height:100px; width:23%;margin-bottom:40px;">
    <h4>既にアカウントが持っているユーザー</h4>
    <a href="userpage.php"><button style="border:1px solid #1f6f8b;background-color: #1f6f8b; color:white;cursor:pointer;height:30px;border-radius:0.5;">一般管理者はこちら</button></a>

    <a href="superuserpage.php"><button style="border:1px solid #213e3b;background-color: #213e3b; color:white;cursor:pointer;height:30px;border-radius:0.5;">スーパー管理者はこちら</button></a>
  </div>
</div>

</body>
<script>

</script>

</html>