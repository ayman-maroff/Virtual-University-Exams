<?php
//	session_start();
//echo $_SESSION['edit_state']." at the start of register.php";
// echo "IDs array session is : "."</br></br>";
// foreach($_SESSION['IDs'] as $id=>$value){
//     echo "The ID : ".$id."</br>";
//     echo "The value : ".$value."</br>";

// }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/registercss.css">
    <title>Update Page</title>
</head>

<body>

<br>
    <div class="container">
        <br>
        <h2>Update User</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <div class="container2" method="post">
            <label id="label"> Profile Picture</label>
            <div id="profile-container">
                <image id="profileImage" src="<?php echo URL; ?>public/img/user-icon.png" />
            </div>
            <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" capture>
            </br>
            </br>
            </br>
            <?php foreach ($array as $index) { ?>
                <form method="POST" action="<?php echo URL . 'user/updateUser/' . $index->iid; ?>">
                    <input id="name" type="text" name="firstname" placeholder="Firstname" size="15" onKeyup="manage(form)" value="<?php echo $index->firstname; ?>" />
                    </br>
                    </br>
                    <input id="name" type="text" name="midlename" placeholder="Middlename" size="15" onKeyup="manage(form)" value="<?php echo $index->midlename; ?>" />
                    </br>
                    </br>
                    <input id="name" type="text" name="lastname" placeholder="Lastname" size="15" onKeyup="manage(form)" value="<?php echo $index->lastname; ?>" />
                    </br>
                    <?php if ($index->roleName  == "Test Center Manager") { ?>
                        <div>
                            <br><br>
                            <label id="label">
                                Account type : </br></br>
                            </label>
                            <input type="radio" value="Admin" name="ROLE"> Admin
                            <input type="radio" value="Testcenteradmin" name="ROLE" checked> Test center admin
                            <input type="radio" value="Student" name="ROLE"> Student
                        </div>
                    <?php } else if ($index->roleName  == "Student") { ?>
                        <div>
                            <br><br>
                            <label id="label">
                                Account type : </br></br>
                            </label>
                            <input type="radio" value="Admin" name="ROLE"> Admin
                            <input type="radio" value="Testcenteradmin" name="ROLE"> Test center admin
                            <input type="radio" value="Student" name="ROLE" checked> Student
                        </div>
                    <?php } else if ($index->roleName  == "Admin") { ?>
                        <div>
                            <br><br>
                            <label id="label">
                                Account type : </br></br>
                            </label>
                            <input type="radio" value="Admin" name="ROLE" checked> Admin
                            <input type="radio" value="Testcenteradmin" name="ROLE"> Test center admin
                            <input type="radio" value="Student" name="ROLE"> Student
                        </div>
                    <?php }
                    if ($index->gender == "Male") { ?>
                        <div>
                            <br>
                            <label id="label">
                                Gender :</br></br>
                            </label>
                            <input type="radio" value="Male" name="gender" checked> Male
                            <input type="radio" value="Female" name="gender"> Female
                        </div>
                    <?php } else { ?>
                        <div>
                            <br>
                            <label id="label">
                                Gender :</br></br>
                            </label>
                            <input type="radio" value="Male" name="gender"> Male
                            <input type="radio" value="Female" name="gender" checked> Female
                        </div>
                    <?php } ?>
                    </br>
                    </br>
                    <input id="name2" type="text" name="phonenumber" placeholder="Phone number" size="10" onKeyup="manage(form)" value="<?php echo $index->phonenumber; ?>">
                    </br>
                    </br>
                    <input id="name2" type="email" placeholder="Enter Email" name="email" onKeyup="manage(form)" value="<?php echo $index->email; ?>">
                    </br>
                    <!-- <div class="pw-meter">
                            <div class ="form-element">
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
                        </br> -->
                    </br>
                    <input type="submit" name="btn1" id="submit" class="registerbtn" disabled=" disabled" title="you must fill all fields completely" value="Update">
                </form>
            <?php } ?>

            <!-- <input type="submit" name="btn1" class="registerbtn" value="Users List"> -->
            <!-- </form> -->
            <!-- <a href="../users/login.php" class="regist">Login Here</a> -->

            <script type="text/javascript" src="<?php echo URL; ?>public/js/updateuser.js"></script>
            </div></div>
        <br>
        <!-- </form> -->
</body>

</html>