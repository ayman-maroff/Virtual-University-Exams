    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/update-question.css">
        <title>Exam page</title>
        <script src="http://code.jquery.com/jquery-latest.js"></script>

<script>
    

            var Timer = <?php echo $_SESSION['Exam_timer']; ?>

            $(document).ready(function() {
                $("#div_refresh12").load("<?php echo URL; ?>application/views/student_views/loadtime.php");
                setInterval(function() {
                    $("#div_refresh12").load("<?php echo URL; ?>application/views/student_views/loadtime.php");
                    if (Timer == 0) {
                        window.location.href = "<?php echo URL; ?>test/submitExam";
                    } else {
                        Timer--;
                    }
                }, 1000);

            });

        </script>
    </head>

    <body>


        <div class="container">
            <div id="div_refresh12" class="timer">


            </div>
            <h2>Exam</h2>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <form method="POST" action=" <?php echo URL . 'test/Move/' . $test[count($test) - 4] . '/' . $test[count($test) - 3]->id . '/' .  $test[count($test) - 1] ?>">
                <div class="container2">


                    <label id="name2">
                        <?php echo "Mark: " . $test[0]->question_mark; ?>
                    </label>
                    </br>
                    </br>
                    <label id="name2">
                        <?php echo "The Number of questions: " . $test[count($test) - 3]->num_of_questions; ?>
                    </label>
                    </br>
                    </br>
                    <label id="name2">
                        <?php echo "The Number of question: " . $test[count($test) - 2]; ?>
                    </label>
                    </br>
                    </br>
                    <label id="name2">
                        <?php echo "The number of questions left: " . $test[count($test) - 1]; ?>
                    </label>
                    </br>
                    </br>
                    </br>
                    </br>
                    <label id="name2" style=" background-color:darkorange">
                        <?php echo $test[0]->question_text; ?>
                    </label>

                    <div>


                        <?php if ($test[0]->num_of_answers == 2) { ?>

                            </br>
                            </br>
                            <label id="label">
                                Options:
                            </label>

                            </br></br>
                            <div>
                                <label id="name1" type="text">
                                    <?php echo $test[0]->text; ?>
                                </label>
                                
                            <?php if (in_array($test[0]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" >yes
                                    <?php }?>
                            </div>
                            </br>
                            </br>
                            <div>
                                <label id="name1" type="text" name="option2">
                                    <?php echo $test[1]->text; ?>
                                </label>
                                <?php if (in_array($test[1]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" >yes
                                    <?php }?>
                            </div>
                            </br>
                            </br>
                        <?php } ?>
                        <?php if ($test[0]->num_of_answers == 3) { ?>

                            </br>
                            </br>
                            <label id="label">
                                Options:
                            </label>

                            </br></br>
                            <label id="name1" type="text">
                                <?php echo $test[0]->text; ?>
                            </label>
                            <?php if (in_array($test[0]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" >yes
                                    <?php }?>
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option2">
                            <?php echo $test[1]->text; ?>
                        </label>
                        <?php if (in_array($test[1]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" >yes
                                    <?php }?>
                                
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option3">
                            <?php echo $test[2]->text; ?>
                        </label>
                        <?php if (in_array($test[2]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[2]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[2]->id; ?>" >yes
                                    <?php }?>

                    <?php } ?>

                    <?php if ($test[0]->num_of_answers == 4) { ?>
                        </br>
                        </br>
                        <label id="label">
                            Options:
                        </label>

                        </br></br>
                        <label id="name1" type="text">
                            <?php echo $test[0]->text; ?>
                        </label>
                        <?php if (in_array($test[0]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" >yes
                                    <?php }?>
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option2">
                            <?php echo $test[1]->text; ?>
                        </label>
                        <?php if (in_array($test[1]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" >yes
                                    <?php }?>   
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option3">
                            <?php echo $test[2]->text; ?>
                        </label>
                        <?php if (in_array($test[2]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[2]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[2]->id; ?>" >yes
                                    <?php }?>
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option4">
                            <?php echo $test[3]->text; ?>
                        </label>
                        <?php if (in_array($test[3]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[3]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[3]->id; ?>" >yes
                                    <?php }?>

                    <?php } ?>

                    <?php if ($test[0]->num_of_answers == 5) { ?>
                        </br>
                        </br>
                        <label id="label">
                            Options:
                        </label>
                        5
                        </br></br>
                        <label id="name1" type="text">
                            <?php echo $test[0]->text; ?>
                        </label>
                        <?php if (in_array($test[0]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[0]->id; ?>" >yes
                                    <?php }?>
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option2">
                            <?php echo $test[1]->text; ?>
                        </label>
                        <?php if (in_array($test[1]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[1]->id; ?>" >yes
                                    <?php }?>
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option3">
                            <?php echo $test[2]->text; ?>
                        </label>
                        <?php if (in_array($test[2]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[2]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[2]->id; ?>" >yes
                                    <?php }?>
                    </div>
                    </br>
                    </br>
                    <div>
                        <label id="name1" type="text" name="option4">
                            <?php echo $test[3]->text; ?>
                        </label>
                        <?php if (in_array($test[3]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[3]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[3]->id; ?>" >yes
                                    <?php }?>
                        </br>
                        </br>
                        <div>
                            <label id="name1" type="text" name="option5">
                                <?php echo $test[4]->text; ?>
                            </label>
                            <?php if (in_array($test[4]->id,$_SESSION['Examing'][1])){ ?>
                                <input id="name" type="radio" name="correct" value="<?php echo $test[4]->id; ?>" checked>yes
                                <?php }else{?>
                                    <input id="name" type="radio" name="correct" value="<?php echo $test[4]->id; ?>" >yes
                                    <?php }?>
                        <?php } ?>


                        </div>
                        </br>
                        </br>
                        </br>
                        <div>
                            <?php if ($test[count($test) - 2] == 1) { ?>
                                <input type="submit" style="display: none" name="previos" id="submit" class="registerbtn" value="Previos" style=" width: 100px;  margin: 0px;">
                            <?php } else { ?>
                                <input type="submit" name="previos" id="submit" class="registerbtn" value="Previos" style=" width: 100px;  margin: 0px;">
                            <?php } ?>
                            <?php if ($test[count($test) - 2] == $test[count($test) - 3]->num_of_questions) { ?>
                                <input type="submit" name="submit" id="submit" class="registerbtn" value="Submit" style=" width: 100px; margin-left: 220px; ">
                                <input style="display: none" type="submit" name="next" id="submit" class="registerbtn" value="Next" style="  width: 100px;   margin: 15px; margin-left: 220px;">
                            <?php } else { ?>
                                <input type="submit" name="next" id="submit" class="registerbtn" value="Next" style="  width: 100px;   margin: 0px; margin-left: 220px;">
                            <?php } ?>
                        </div>

            </form>
            <!-- <script type="text/javascript" src="<?php echo URL; ?>public/js/update-question.js"></script> -->
        </div>
        <!-- </form> -->

    </body>
	<script type="text/javascript">
	
        window.onbeforeunload = function() {
            
  console.log('event');
  
  return ""; //here also can be string, that will be shown to the user
}
	</script>
    </html>