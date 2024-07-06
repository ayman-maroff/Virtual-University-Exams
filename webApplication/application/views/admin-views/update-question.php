<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/update-question.css">
    <title>addQuestion page</title>
</head>

<body>

<br>

    <div class="container">
    </br>
    
        <h2>Edit Question</h2>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <form method="POST" action="<?php echo URL.'question/updateQuestion/'.$question_id."/".$topicname;?>">
            <div class="container2">
                <label id="label">
                       Question Text: </br></br>
                </label>
                <input id="name2" type="text" name="Qtext" placeholder="Question Text" value ="<?php echo $array[0]->question_text;?>" required />
                </br>
                </br>
                <label id="label" for="numbermin">
                       Question Mark: </br></br>
                </label>
                <input id="name2" type="number" name="Mark" placeholder="Mark" size="15" name="numbermin" min="1" onKeyup="manage(form)"value ="<?php echo $array[0]->question_mark;?>" required />
                </br>
                </br>
                <div>
                   
                    <label id="label">
                       Number of Options: </br></br>
                    </label>
                    <?php if($array[0]->num_of_answers==2){?>
                    <select onChange="manageoption(this)"  name="num">
                    <option value="2"  >Two option</option>
                    <option value="3"  >Three option</option>
                    <option value="4"  >Four option</option>
                    <option value="5"  >Five option</option>
                    
                </select>
                </div>
                 
                 
                 
            </br>
            <label id="label"   >
                   Options: 
                </label>
                <label id="label2" >
                  Answer:
                </label>
                </br></br>
            <div >  
            <input id="name1" type="text" name="option1" placeholder="option1" value ="<?php echo $array[0]->text;?>" required >
           <?php if($array[0]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="1" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="1" >yes
                <?php } ?>   
            </div>
            </br>
        
            <div >
            <input id="name1" type="text" name="option2" placeholder="option2" size="10" value ="<?php echo $array[1]->text;?>" required>
            <?php if($array[1]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="2" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="2" >yes
                <?php } ?>   
            </div>
            </br>
            <div id="one" style="display: none">
            <input id="name1" type="text" name="option3" placeholder="option3" size="10" >
            <input id="name" type="radio" name="correct"   value ="3" >yes
                 
            </div>
            </br>
            <div id="two" style="display: none">
            <input id="name1" type="text" name="option4" placeholder="option4" size="10"  >
    
                <input id="name" type="radio" name="correct"   value ="4" >yes
                
            </div>
            </br>
            <div id="three" style="display: none">
            <input id="name1" type="text" name="option5" placeholder="option5" size="10" >
            
                <input id="name" type="radio" name="correct"   value ="5" >yes
                <?php }?>
                
                <?php if($array[0]->num_of_answers==3){?>
                    <select onChange="manageoption(this)"  name="num">
                    <option value="2"  >Two option</option>
                    <option value="3"  selected>Three option</option>
                    <option value="4"  >Four option</option>
                    <option value="5"  >Five option</option>
                    
                </select>
                </div>
         
            </br>
            </br>
            <label id="label"   >
                   Options: 
                </label>
                <label id="label2" >
                  Answer: 
                </label>
                </br></br>
            <div >  
            <input id="name1" type="text" name="option1" placeholder="option1" value ="<?php echo $array[0]->text;?>" required >
           <?php if($array[0]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="1" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="1" >yes
                <?php } ?>   
            </div>
            </br>
            <div >
            <input id="name1" type="text" name="option2" placeholder="option2" size="10" value ="<?php echo $array[1]->text;?>" required>
            <?php if($array[1]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="2" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="2" >yes
                <?php } ?>   
            </div>
            </br>
            <div id="one" >
            <input id="name1" type="text" name="option3" placeholder="option3" size="10" value ="<?php echo $array[2]->text;?>" required>
            <?php if($array[2]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="3" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="3" >yes
                <?php } ?> 
            </div>
            
            </br>
            <div id="two" style="display: none">
            <input id="name1" type="text" name="option4" placeholder="option4" size="10" >
            <input id="name" type="radio" name="correct"   value ="4" >yes
              
            </div>
            </br>
            <div id="three" style="display: none">
            <input id="name1" type="text" name="option5" placeholder="option5" size="10"value ="<?php echo $array[4]->text;?>" >
            <input id="name" type="radio" name="correct"   value ="5" >yes
            </br>
                <?php }?>
                
                <?php if($array[0]->num_of_answers==4){?>
                    <select onChange="manageoption(this)"  name="num">
                    <option value="2"  >Two option</option>
                    <option value="3"  >Three option</option>
                    <option value="4" selected >Four option</option>
                    <option value="5"  >Five option</option>
                    
                </select>
                </div>
                
            </br>
            </br>
            <label id="label"   >
                   Options: 
                </label>
                <label id="label2" >
                  Answer:
                </label>
                </br></br>
            <div >  
            <input id="name1" type="text" name="option1" placeholder="option1" value ="<?php echo $array[0]->text;?>" required>
           <?php if($array[0]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="1" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="1" >yes
                <?php } ?>   
            </div>
            </br>
            <div >
            <input id="name1" type="text" name="option2" placeholder="option2" size="10" value ="<?php echo $array[1]->text;?>" required>
            <?php if($array[1]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="2" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="2" >yes
                <?php } ?>   
            </div>
            </br>
            <div id="one" >
            <input id="name1" type="text" name="option3" placeholder="option3" size="10" value ="<?php echo $array[2]->text;?>" required>
            <?php if($array[2]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="3" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="3" >yes
                <?php } ?>   
            </div>
            </br>
            <div id="two" >
            <input id="name1" type="text" name="option4" placeholder="option4" size="10" value ="<?php echo $array[3]->text;?>" required>
            <?php if($array[3]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="4" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="4" >yes
                <?php } ?>   
            </div>
            
            </br>
            <div id="three" style="display: none">
            <input id="name1" type="text" name="option5" placeholder="option5" size="10" >
            <input id="name" type="radio" name="correct"   value ="5" >yes
            </br>
                <?php }?>
                
                <?php if($array[0]->num_of_answers==5){?>
                    <select onChange="manageoption(this)"  name="num">
                    <option value="2"  >Two option</option>
                    <option value="3"  >Three option</option>
                    <option value="4"  >Four option</option>
                    <option value="5" selected >Five option</option>
                    
                </select>
                </div>
               
            </br>
            </br>
            <label id="label"   >
                   Options: 
                </label>
                <label id="label2" >
                  Answer:
                </label>
                </br></br>
            <div >  
            <input id="name1" type="text" name="option1" placeholder="option1" value ="<?php echo $array[0]->text;?>" required>
           <?php if($array[0]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="1" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="1" >yes
                <?php } ?>   
            </div>
            </br>
            <div >
            <input id="name1" type="text" name="option2" placeholder="option2" size="10" value ="<?php echo $array[1]->text;?>" required>
            <?php if($array[1]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="2" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="2" >yes
                <?php } ?>   
            </div>
            </br>
            <div id="one" >
            <input id="name1" type="text" name="option3" placeholder="option3" size="10" value ="<?php echo $array[2]->text;?>" required>
            <?php if($array[2]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="3" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="3" >yes
                <?php } ?>   
            </div>
            </br>
            <div id="two" >
            <input id="name1" type="text" name="option4" placeholder="option4" size="10" value ="<?php echo $array[3]->text;?>" required>
            <?php if($array[3]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="4" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="4" >yes
                <?php } ?>   
            </div>
            </br>
            <div id="three" >
            <input id="name1" type="text" name="option5" placeholder="option5" size="10"value ="<?php echo $array[4]->text;?>" required>
            <?php if($array[4]->correct==1){?>
            <input id="name" type="radio" name="correct"   value ="5" checked>yes
            <?php }else { ?>
                <input id="name" type="radio" name="correct"   value ="5" >yes
            </br>
                <?php } ?>   
                <?php }?>
               
                </div>
                
            </br>
                <input type="submit" name="btn1" id="submit"  class="registerbtn" title="you must fill all fields completely" value="Save changes">
        </form>
        <!-- <input type="submit" name="btn1" class="registerbtn" value="Users List"> -->
        <!-- </form> -->
        <!-- <a href="../users/login.php" class="regist">Login Here</a> -->

        <script type="text/javascript" src="<?php echo URL;?>public/js/update-question.js"></script>
        </div>
        </div>
    <br><br>
    <!-- </form> -->
</body>

</html>