<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>テスト</title>
</head>
<body>
<?php
 echo '<div><p>post_data:'.$_POST["data"].'</p></div>'; 
 try{
 $pdo = new PDO('mysql:host=localhost;dbname=php_data;charset=utf8','root','');print '接続成功';} catch (PDOException $e){
 print "データベース接続失敗:{.$e->getMessage()}";
 } 
$stmt = $pdo->prepare("INSERT INTO php_data (post_data,regist_data) VALUES (:post_data,:regist_data)");
 $post_data = $_POST["data"];
 $regist_data = date("Y-m-d H:i:s");
 $stmt->bindParam(':post_data',$post_data,PDO::PARAM_STR);
 $stmt->bindValue(':regist_data',$regist_data,PDO::PARAM_INT); 
 $stmt->execute();
?>
<form action="pract.php">
 <input type="submit" value="戻る">
</form>

</body>
</html>
