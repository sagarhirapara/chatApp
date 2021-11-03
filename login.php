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
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="">
                <div class="error-txt" style="display:none;">This is an error message</div>
                <div class="field input">
                    <label for="">Email id</label>
                    <input type="text" name="email" placeholder="Enter your email address" />
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your password" />
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat" />
                </div>
                <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
            </form>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>