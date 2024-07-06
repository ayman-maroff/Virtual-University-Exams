
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>

    <link href="<?php echo URL; ?>public/css/logincss.css" rel="stylesheet">
</head>

<body>
    <div class="login">
        <h2>login</h2> </br>
        <img class="icon" src="<?php echo URL; ?>public/img/user-icon.png">
        <div id="error"></div>
        <form id="form" action="<?php echo URL; ?>user/confirmuser" method="post">
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