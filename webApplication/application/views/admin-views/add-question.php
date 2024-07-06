<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/update-question.css">
    <title>AddQuestion page</title>
    <style>
            h2{
            margin-left:170px;
                    }
    </style>
</head>


<body>

<br>
    <div class="container">
</br>
        <h2>Add a Question</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL . 'question/addQuestion/' . $topicname; ?>">
            <div class="container2" method="post">
                <label id="label">
                       Question Text: </br></br>
                </label>
                <input id="name2" type="text" name="Qtext" placeholder="Question Text" required/>
                </br>
                </br>
                <label id="label" for="numbermin">
                       Question Mark: </br></br>
                </label>
                <input id="name2" type="number" name="Mark" placeholder="Mark" size="15" name="numbermin" min="1" onKeyup="manage(form)" required/>
                </br>
                </br>
                <div>
                 
                    <label id="label">
                        Number of Options: </br></br>
                    </label>
                    <select onChange="manageoption(this)" name="num">
                        <option value="2">Two option</option>
                        <option value="3">Three option</option>
                        <option value="4">Four option</option>
                        <option value="5">Five option</option>

                    </select>
                </div>

                </br>
                <label id="label">
                    Options:
                </label>
                <label id="label2">
                    Answer:
                </label>
                </br></br>
                <div>
                    <input id="name1" type="text" name="option1" placeholder="option1" required>
                    <input id="name" type="radio" name="correct" value="1" checked>yes
                </div>
                </br>
                <div>
                    <input id="name1" type="text" name="option2" placeholder="option2" size="10" required>
                    <input id="name" type="radio" name="correct" value="2">yes
                </div>
                </br>
                <div id="one" style="display: none">
                    <input id="name1" type="text" name="option3" placeholder="option3" size="10" >
                    <input id="name" type="radio" name="correct" value="3">yes
                </div>
                </br>
                <div id="two" style="display: none">
                    <input id="name1" type="text" name="option4" placeholder="option4" size="10" >
                    <input id="name" type="radio" name="correct" value="4">yes
                </div>
                </br>
                <div id="three" style="display: none">
                    <input id="name1" type="text" name="option5" placeholder="option5" size="10" >
                    <input id="name" type="radio" name="correct" value="5">yes
                </div>
                </br>


                <input type="submit" name="btn1" id="submit" class="registerbtn" title="you must fill all fields completely" value="Submit">
        </form>
        <!-- <input type="submit" name="btn1" class="registerbtn" value="Users List"> -->
        <!-- </form> -->
        <!-- <a href="../users/login.php" class="regist">Login Here</a> -->

        <script type="text/javascript" src="<?php echo URL; ?>public/js/add-question.js"></script>
    </div>
                </div>
                <br><br>
    <!-- </form> -->
</body>

</html>