<!-- <?php
        session_start();
        //echo $_SESSION['edit_state']." at the start of register.php";
        // echo "IDs array session is : "."</br></br>";
        // foreach($_SESSION['IDs'] as $id=>$value){
        //     echo "The ID : ".$id."</br>";
        //     echo "The value : ".$value."</br>";

        // }
        ?> -->
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/AdminProfile.css">
    <title>Profile Page</title>
</head>

<body>


    <div class="container">
        </br>
        <h2>User Profile</h2>
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
                <form method="POST" action="#">

                    <!-- <label id="name" type="text" name="firstname" placeholder="Firstname" size="15" onKeyup="manage(form)" value="">
                        
                    </label> -->
                    </br>
                    </br>
                    </br>
                    <label id="name" type="text" name="midlename" placeholder="Middlename" size="15" onKeyup="manage(form)" value="">
                    <?php echo $index->firstname; 
                        echo " ";
                        echo $index->midlename; 
                        echo " ";
                        echo $index->lastname;
                        ?>
                    </label>
                    </br>
                    </br>
                    <!-- <label id="name" type="text" name="lastname" placeholder="Lastname" size="15" onKeyup="manage(form)" value="">
                        
                    </label> -->
                    </br>
                    <?php if ($index->Role_id  == 2) { ?>
                        <div>
                            <br><br>
                            <label id="label">
                                Account type : 
                            </label>
                            <!-- <input type="radio" value="Admin" name="ROLE"> Admin -->
                            <input type="radio" value="Testcenteradmin" disabled name="ROLE" checked> Test center admin
                            <!-- <input type="radio" value="Student" name="ROLE"> Student -->
                        </div>
                    <?php } else if ($index->Role_id == 3) { ?>
                        <div>
                            <br><br>
                            <label id="label">
                                Account type : 
                            </label>
                            <!-- <input type="radio" value="Admin" name="ROLE"> Admin -->
                            <!-- <input type="radio" value="Testcenteradmin" name="ROLE"> Test center admin -->
                            <input type="radio" value="Student" disabled name="ROLE" checked> Student
                        </div>
                    <?php } else if ($index->Role_id  == 1) { ?>
                        <div>
                            <br><br>
                            <label id="label">
                                Account type : 
                            </label>
                            <input type="radio" value="Admin" disabled name="ROLE" checked> Admin 
                            <!-- <input type="radio" value="Testcenteradmin" name="ROLE"> Test center admin -->
                            <!-- <input type="radio" value="Student" name="ROLE"> Student -->
                        </div>
                    <?php }
                    if ($index->gender == "Male") { ?>
                        <div>
                            <br>
                            
                            <label id="label">
                                Gender :
                            </label>
                            <input type="radio" value="Male" disabled name="gender" checked> Male
                            <!-- <input type="radio" value="Female" name="gender"> Female -->
                        </div>
                    <?php } else { ?>
                        <div>
                            <br>
                           
                            <label id="label">
                                Gender :
                            </label>
                            <input type="radio" value="Female" disabled name="gender" checked> Female
                        </div>
                    <?php } ?>
                    </br>
                    
                    <label id="label">
                                Phone Number :
                            </label>
                    <label id="name2" type="text" name="phonenumber" placeholder="Phone number" size="10" onKeyup="manage(form)" value="">
                        <?php echo $index->phonenumber; ?>
                    </label>
                    </br>
                    </br>
                    <label id="label">
                                Email :
                            </label>
                    <label id="name2" type="email" placeholder="Enter Email" name="email" onKeyup="manage(form)" value="">
                        <?php echo $index->email; ?>
                    </label>
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
                </form>
            <?php } ?>

            <!-- <input type="submit" name="btn1" class="registerbtn" value="Users List"> -->
            <!-- </form> -->
            <!-- <a href="../users/login.php" class="regist">Login Here</a> -->

            <script type="text/javascript" src="<?php echo URL; ?>public/js/updateuser.js"></script>
        </div>
        <!-- </form> -->
</body>

</html>