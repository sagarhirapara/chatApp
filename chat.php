<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Realtime Chat App</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <?php
        session_start();
    include "php/config.php";
    $uid = $_GET['user_id'];
    $sql = "select * from users where unique_id = {$uid}";
    $res = mysqli_query($conn,$sql) or die();
    if(mysqli_num_rows($res))
    {
        $row = mysqli_fetch_assoc($res);
    }
    ?>
        <section class="chat-area">
            <header>
                <a href="users.php" class="back-icon"> <i class="fa fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img']; ?>" alt="" />
                <div class="details">
                    <span><?php echo $row['fname'] . ' '. $row['lname']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="" class="typing-area" autocomplete="off">
                <input type="hidden" name="incoming_id" value="<?php echo $uid; ?>">
                <input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>">
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." />
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>

</html>