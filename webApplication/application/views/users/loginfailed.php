<?php 
 
session_start(); 
// $_SESSION['login_state'] = true;
// $_SESSION['roleid'] = $_POST['firstname'];


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>
    <link href="<?php echo URL; ?>public/css/logincss.css" rel="stylesheet">
    <style>
             #error {
                color: rgb(221, 13, 41);
                text-align: center;

                /* animation-name: popupError;
                animation-duration: 3s;
                animation-iteration-count: 1;
                animation-timing-function: all 1s;
                opacity: 0; */
            }
    </style>
</head>

<body>
    
    <div class="login">
        <h2>login</h2> </br>
        <img class="icon" src="<?php echo URL; ?>public/img/user-icon.png">
        <form id="form" action="<?php echo URL; ?>user/confirmuser" method="post">
        <div id="error">Login Failed, Please retry again</div>
            <div class="input-text">
                <input type="text" placeholder="Username" id="name" name="name" required>
            </div>
            <div class="pw-meter">
                <div class="form-element">
                    <div class="input-text">
                        <input type="password" placeholder="Password" id="password" name="password" required>
                    </div>
                    </br>

                </div>
            </div>
            <input class="btn" name="btn2" type="submit" value="login">
        </form>
   
    </div>
    <script src="../../../public/js/loginjs.js"></script>

</body>

</html>