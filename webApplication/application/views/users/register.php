<?php 
// require_once '../../../application/config/config.php';
 ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/registercss.css">
    <title>Register Page</title>
</head>

<body>
<br>

    <div class="container">
        <br>
        <h2>Add User</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL; ?>user/adduser">
            <div class="container2" method="post">
                <label id="label"> Profile Picture</label>
                <div id="profile-container">
                    <image id="profileImage" src="<?php echo URL; ?>public/img/user-icon.png" />
                </div>
                <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" capture>
                </br>
                </br>
                </br>
                <input id="name" type="text" name="firstname" placeholder="Firstname" size="15" onKeyup="manage(form)" />
                </br>
                </br>
                <input id="name" type="text" name="midlename" placeholder="Middlename" size="15" onKeyup="manage(form)" />
                </br>
                </br>
                <input id="name" type="text" name="lastname" placeholder="Lastname" size="15" onKeyup="manage(form)" />
                </br>
                <div>
                    <br><br>
                    <label id="label">
                        Account type : </br></br>
                    </label>
                    <input type="radio" value="Admin" name="ROLE" checked> Admin
                    <input type="radio" value="Testcenteradmin" name="ROLE"> Test center admin
                    <input type="radio" value="Student" name="ROLE"> Student
                </div>
                <div>
                    <br>
                    <label id="label">
                        Gender :</br></br>
                    </label>
                    <input type="radio" value="Male" name="gender" checked> Male
                    <input type="radio" value="Female" name="gender"> Female
                </div>
                </br>
                </br>
                <input id="name2" type="text" name="phonenumber" placeholder="Phone number" size="10" onKeyup="manage(form)">
                <br><br>
                <input id="name2" type="email" placeholder="Enter Email" name="email" onKeyup="manage(form)">
                </br>
                <div class="pw-meter">
                    <div class="form-element">
                        <div class="input-text">
                            <input type="password" placeholder="Enter Password" id="password" name="password1" size=25 onKeyup="manage(form)">
                        </div>
                        <div class="pw-display-toggle-btn">

                        </div>
                        <div class="pw-strength">
                            <span>Weak</span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <input type="password" placeholder="Retype Password" name="password2" id="password2" size=25 onKeyup="manage(form)">
                </br>
                </br>
                </br>
                <input type="submit" name="btn1" id="submit" disabled=" disabled" class="registerbtn" title="you must fill all fields completely" value="Register">
        </form>
        <!-- <input type="submit" name="btn1" class="registerbtn" value="Users List"> -->
        <!-- </form> -->
        <!-- <a href="../users/login.php" class="regist">Login Here</a> -->

        <script type="text/javascript" src="<?php echo URL;?>public/js/registerjs.js"></script>
    </div>
</div>
<br>
    <!-- </form> -->
</body>

</html>