<?php
session_start();
if(!isset($_SESSION['unique_id']))
{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Realtime Chat App</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php
    include "php/config.php";
    $uid = $_SESSION['unique_id'];
    $sql = "select * from users where unique_id = {$uid}";
    $res = mysqli_query($conn,$sql) or die();
    if(mysqli_num_rows($res))
    {
        $row = mysqli_fetch_assoc($res);
    }
    ?>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="" />
                    <div class="details">
                        <span><?php echo $row['fname'] . ' '. $row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="logout.php?user_id=<?php echo $row['unique_id']; ?>" class="logout"> Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to chat</span>
                <input type="text" placeholder="Enter name to search..." />
                <button><i class="fa fa-search"></i></button>
            </div>
            <div class="user-list">


            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>

</html>