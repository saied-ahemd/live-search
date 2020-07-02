<?php 

$link=new mysqli("localhost","root","","shop");
if($link->connect_error){
    die("connect Failed" .$link->connect_error);
}

?>
