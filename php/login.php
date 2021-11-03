<?php
session_start();
include "config.php";
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

if(!empty($email) && !empty($password)){
    $sql = "select * from users where email = '{$email}' and password = '{$password}'";
    $res = mysqli_query($conn,$sql) or die("die");
    if(mysqli_num_rows($res) > 0)
    {
        $row = mysqli_fetch_assoc($res);
        $status = "Active now";
        $query = mysqli_query($conn,"update users set status = '{$status}' where unique_id = {$row['unique_id']}");
        $_SESSION['unique_id'] = $row['unique_id'];
        echo "success";
    }
    else {
        echo "Entered email or password does not match";
    } 
    
}
else{
    echo "All input are required";
}
?>