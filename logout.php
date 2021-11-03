<?php
session_start();
if(isset($_SESSION['unique_id']))
{
    include 'php/config.php';
    $logid = mysqli_real_escape_string($conn,$_GET['user_id']);
    if(isset($logid))
    {
        $status = "Offline now";
        $query = "update users set status = '{$status}' where unique_id = {$logid}";
        $res = mysqli_query($conn,$query);
        if($res)
        {
            session_unset();
            session_destroy();
             header("location:login.php");
        }
    }
}
else{
    header("location:login.php");
}
?>