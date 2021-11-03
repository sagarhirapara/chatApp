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
            <header style="margin-bottom:10px;">Realtime Chat App</header>
            <form action="" enctype="multipart/form-data">
                <div class="error-txt" style="display:none;">This is an error message</div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required />
                    </div>
                    <div class="field input">
                        <label for="">last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required />
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email id</label>
                    <input type="text" name="email" placeholder="Enter your email address" required />
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your password" autocomplete="on"
                        required />
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image" required />
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat" />
                </div>
                <div class="link">
                    Already signed up? <a href="login.php">Login now</a>
                </div>
            </form>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/sigup.js"></script>
</body>

</html>