<?php
include_once 'config.php';
$output = "";
session_start();
$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);
$sql = mysqli_query($conn,"select * from users where fname like '%{$searchTerm}%' or lname like '%{$searchTerm}%'") or die();
if(mysqli_num_rows($sql) > 0)
{
    while($row = mysqli_fetch_assoc($sql))
    {

    
    $sql2 = "select * from messages where (incoming_msg_id = {$row['unique_id']} or outgoing_msg_id = {$row['unique_id']}) and (outgoing_msg_id = {$outgoing_id} or incoming_msg_id = {$outgoing_id}) order by msg_id Desc limit 1";
        $query2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($query2);

        if(mysqli_num_rows($query2) > 0)
        {
            $result = $row2['msg'];
        }
        else{
            $result = "No Message are available";
        }
        (strlen($result) > 28) ? $msg = substr($result,0,28): $msg = $result;
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You : " : $you = "";
        ($row['status'] == "Offline now")? $offline = "offline" : $offline = "";

        if($row['unique_id'] != $_SESSION['unique_id'])
        {
            $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                        <img src="php/images/'. $row['img'].'" alt="" />
                        <div class="details">
                            <span>'. $row['fname'] . ' '. $row['lname'] .'</span>
                            <p>'.$you. $msg .'</p>
                        </div>
                    </div>
                    <div class="status-dot'.$offline.'">
                        <i class="fa fa-circle"></i>
                    </div>
                </a>';
        }
        
    }
}else{
    $output .= "no user found";
}
echo $output;
?>