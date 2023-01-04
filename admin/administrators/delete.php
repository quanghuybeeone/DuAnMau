<?php
include_once("../../lib/db.php");
$db = new database();
$id=$_GET['id'];
// echo $id;
$sql="delete from administrators where id_admin=".$id;
//echo $sql;
$conn = $db->connect();
$conn->exec($sql);
// echo "xóa thành công";
header("location: index.php");
?>