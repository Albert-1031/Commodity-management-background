<?php
require('db.php');
$sql = 'select * from product';
$result = $mysqli-> query($sql);
while($row = $result->fetch_assoc()){
    echo "{$row['uid']},{$row['cname']}<br>";
}
?>