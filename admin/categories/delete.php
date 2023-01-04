<?php
include_once("../../lib/db.php");
$db = new database();
$id=$_GET['id'];
// echo $id;
$sql="delete from categories where id=".$id;
//echo $sql;
$conn = $db->connect();
$conn->exec($sql);
header("location: index.php");
?>