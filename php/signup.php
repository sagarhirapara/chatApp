<?php 
include_once "config.php";
$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){ // if email is valid

        // check Email already Exists
       $con = mysqli_query($conn,"select email from users where email = '{$email}'");
       if(mysqli_num_rows($con) > 0){ // email exists
            echo "email already exits";
       }
       else{ // not exists then check valid image
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
                
                if($img_ext == "jpeg" || $img_ext == "png" || $img_ext == "jpg"){
                    $time = time(); // return current time
                    $new_img_name = $time.$img_name;
                    
                    if(move_uploaded_file($tmp_name , "images/". $new_img_name)){

                        $status = "Active now";
                        $random_id = rand(time(),10000000);

                        $sql2 = "insert into users (unique_id,fname,lname,email,password,img,status) 
                            values({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')";
                        if(mysqli_query($conn,$sql2)){
                            $sql3 = mysqli_query($conn , "select * from users where email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0){
                                $row = mysqli_fetch_assoc($sql3);
                                session_start();
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";

                            }

                        }else{
                            echo "something went wrong";
                        }
                    }
                }else{
                    echo "valid extension is jpeg,png,jpg";
                }
            }else{
                echo "please select an Image";
            }
       }
    }
    else{
        echo "enter valid email";
    }

}else{
    echo "all input field is required";
}
?>