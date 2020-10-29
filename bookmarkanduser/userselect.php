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
  <title>ユーザーリスト（一般管理者画面）</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/bookmark.css">
  <style>div{padding:10px; }</style>
</head>
<body>
<div class ="title" style="background-color: #1f6f8b; height:80px;margin-bottom:40px;margin-left:10px;color:white;">
  <h1 class="home_title">ユーザーリスト（一般管理者画面）</h1>
</div>

<!-- 説明 -->
<div class="explain" style="border:1px solid #1f6f8b;text-align:center;width:30%;margin:auto;">
  <h3>一般管理者画面利用説明</h3>
  <ul>
    <li>画面に一般管理者だけのユーザーリストが表示されます</li>
    <li>ユーザー名前、ユーザーID、入社状況が編集できます</li>
  </ul>
</div>


<!-- データ表示 -->
<h2 class="datalist" style="padding-left: 30px;">ユーザーリスト一覧</h2>
        <?php
    
            if ($status == false) {
              sql_error($status);
            } else {

            echo '<table class="table" style="text-align: center; border: 1px solid black;margin:0px 10px;margin-bottom:50px;width:90%;">';
              echo '<tr style="background-color:#51adcf; color:white;">';
              echo '<th>管理者タイプ</th><th style="border: 1px solid black;">ユーザー名前</th><th>ユーザーID</th><th>入社状況</th><th></th>';
              echo '</tr>';
              while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

                // 一般管理者のユーザーリスト管理画面に一般管理者だけのユーザーリストが表示されます
                if($result['kanri_flg']=="一般管理者"){
             
                  echo '<tr >';
                  echo '<td class="display" style="background-color:#f8f1f1;"width:25%>' . $result['kanri_flg'] . '</td>';
                  echo '<td class="display" style="background-color:#f8f1f1;width:20%">' . $result['name'] . '</td>';
                  echo '<td class="display" style="background-color:#f8f1f1;width:25%">' . $result['lid'] . '</td>';
                  echo '<td class="display" style="background-color:#f8f1f1;width:20%">' . $result['life_flg'] . '</td>';

                  echo '<td class="display" style="background-color:#f8f1f1;width:10%">';
                  echo "<a href=useredit.php?id=" . $result['id'] . ">編集</a>\n";
                
                  echo '</td>';

                  echo '</tr>';
                }
            
            }
            echo "</table>\n";
          }
        ?>

<a href="superuserpage.php"><button style="border:1px solid #707070;background-color: #707070; color:white;cursor:pointer;height:30px;border-radius:0.5;margin-left:10px;margin-top:50px;">戻る</button></a>

</body>


</html>

