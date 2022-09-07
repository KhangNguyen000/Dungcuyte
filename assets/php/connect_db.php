<?php 
$host="localhost";
$user="root";
$password="";
$database="khang_health";
$con=mysqli_connect($host,$user,$password,$database);
$con -> set_charset("utf8");
if(mysqli_connect_error()){
    echo "Connect Fail: ".mysqli_connect_errno(); exit;
}
// else{
//     echo "success";
// }

