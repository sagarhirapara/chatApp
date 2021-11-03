<?php
session_start();
if(isset($_SESSION['unique_id']))
{
    include_once 'config.php';

    $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
    $output = "";
    $sql = mysqli_query($conn , "select * from messages left join users on users.unique_id = messages.incoming_msg_id where (outgoing_msg_id = {$outgoing_id} and incoming_msg_id = {$incoming_id}) or (outgoing_msg_id = {$incoming_id} and incoming_msg_id = {$outgoing_id}) order by msg_id");
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_assoc($sql))
        {
            if($row['outgoing_msg_id'] === $outgoing_id)
            {
                $output .= '<div class="chat outgoing">
                    <div class="details">
                        <p>'. $row['msg'].'</p>
                    </div>
                </div>';
            }
            else{
                $output .= ' <div class="chat incoming">
                    <img src="php/images/'.$row['img'].'" alt="" />
                    <div class="details">
                        <p>'.$row['msg'].'</p>
                    </div>
                </div>';
        }
    }
}
}
else{
    header("location:../login.php");
}
echo $output;
?>