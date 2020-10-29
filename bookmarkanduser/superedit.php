<?php
require_once("funcs.php");

//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id'];
$pdo = user_conn();
?>

<?php
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id);
$status = $stmt->execute();


//３．データ表示
if ($status == false) {
    sql_error($status);
} else {

    $result = $stmt->fetch();

}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ユーザーリスト編集</title>
    <style>div{padding:10px; }</style>
    </head>
<body>
    <div class ="title" style="background-color: #213e3b; height:80px;margin-bottom:20px;margin-left:10px;color:white;">
        <h1 class="home_title">ユーザーリストの管理画面</h1>
    </div>

    <div class="contact-form">
        <h2>編集</h2>
        <form action="superupdate.php" method="post" style="border:1px solid #463333;width:23%;margin-bottom:20px;padding-left:10px;padding-bottom:10px;">
                <input type="hidden" name="id" value="<?php if (!empty($result['id'])) echo(htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'));?>">
            <p>
                <label>ユーザー名前：</label>
                <input type="text" name="username" value="<?php if (!empty($result['name'])) echo(htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
    
            <p>
                <label>ユーザーID：</label>
                <input type="text" name="idnumber" value="<?php if (!empty($result['lid'])) echo(htmlspecialchars($result['lid'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            
            <p>
                <label>パスワード：</label>
                <input type="password" name="password" value="<?php if (!empty($result['lpw'])) echo(htmlspecialchars($result['lpw'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <p>
                <label>管理者タイプ：</label><br>
                <select name = "type">
                <?php 
                $types = array('一般管理者', 'スーパー管理者');
                ?>
                <option><?php if (!empty($result['kanri_flg'])) echo(htmlspecialchars($result['kanri_flg'], ENT_QUOTES, 'UTF-8'));?></option>
                <?php
                foreach($types as $type){
                    echo "<option value='$type'>$type</option>";
                }
                ?>
                </select>
            </p>
            <p>
                <label>入社状況：</label><br>
                <select name = "life">
                <?php 
                $lives = array('入社', '退社');
                ?>
                <option><?php if (!empty($result['life_flg'])) echo(htmlspecialchars($result['life_flg'], ENT_QUOTES, 'UTF-8'));?></option>
                <?php
                foreach($lives as $life){
                    echo "<option value='$life'>$life</option>";
                }
                ?>
                </select>
            </p>
            
            <input type="submit" value="編集する" style="border:1px solid #41aea9;background-color: #41aea9; color:white;cursor:pointer;">

        </form>
    </div>

        <a href="superuserselect.php">ユーザーリストの管理画面へ</a>
</body>
</html>