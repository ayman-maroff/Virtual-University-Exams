<!-- table section -->
<table class="content-table">
    <thead>
        <tr>

            <th>Question </th>
            <th>Question Text</th>
            <th>Num of options</th>
            <th>Question Mark</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $index = 1;

        foreach ($exam as $question) {

        ?>
            <tr>
                <td> <?php echo "Question " . $index ?> </td>
                <td> <?php echo  $question->question_text ?> </td>
                <td> <?php echo   $question->num_of_answers ?> </td>
                <td> <?php echo  $question->question_mark ?> </td>
            </tr>
        <?php
            $index++;
        }
        ?>
    </tbody>

</table>
</br>

<form method="post" id="addform" action="<?php echo URL . 'test/saveExam'. "/" .$cid. "/" .$material_name; ?>">

            <?php foreach($exam as $question) {?>  
            <input type="hidden" value= "<?php echo $question->id;?>" name="hiddenArray[]">
            <?php }?>
            <br>
            <p class="coursename2" for="numbermin"> Full Mark:</p>
    <input value="" id="coursename" class="add" type="number" name="fullmark" placeholder="Full Mark" name="numbermin" min="1" size="15" required />
    </br>
    <p class="coursename22"> Date:</p>
    <input value="" id="coursename" class="add" type="date" name="date" placeholder="Date" size="15" required />
    </br>
    <p class="coursename22" for="numbermin"> Time(in seconds):</p>
    <input value="" id="coursename" class="add" type="number" name="time" placeholder="Time" name="numbermin" min="1" size="15" required />
    </br>
    <input id="submit_btn" class="submit" name="AddExambtn" type="submit" value="ADD EXAM" size="15" />

    <a href="<?php echo URL; ?>test/testsList" id="submit_btn" class="close">
        Cancel
    </a>
    <br><br>
</form>
<br><br>
<style>
    .close {
        font-size: 1.0rem;
        background: #f3390b;
        /* background: -webkit-linear-gradient(to right, #f00e1a, #f08a16, #e9530e); */
        background: linear-gradient(to right, #63739c, #1672db, #3613b3);
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        margin-top: 2rem;
        margin-bottom:0rem;
        cursor: pointer;
        position: absolute;
        margin-left: 35px;
        transition: all 0.35s;
        outline: none;
        color:white;
    }
    .main__btn {
    font-size: 1.0rem;
    /* background: #3c3ab4; */
    /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
    background: linear-gradient(to right, #63739c, #1672db, #3613b3);
    padding: 10px 20px;
    color:white;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    cursor: pointer;
    position: relative;
    margin-left: 260px;
    transition: all 0.35s;
    outline: none;
    }
    .main__btn:hover {
    background:white;
    }
    .main__btn:after {
    position: absolute;
    /* content: ''; */
    
    /* background: #1005a7; */
    /* transition: all 0.35s; */
}
    #addform{
      margin-top:1rem;
      position: flex;
      width:300px;
      margin-left:265px;
      z-index: -1;
      border: 5px solid rgb(146, 136, 136);
      border-radius: 10px;
      background-color: rgba(202, 238, 224, 0.5);

        }
    .coursename2{

      margin-left:20px;
      /* background:wheat; */
      width:120px;
      border-radius: 4px;
      margin-top:0rem;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight:bold;
      /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
      /* color:white; */
    }
    .coursename22{
      margin-left:20px;
      /* background:wheat; */
      width:170px;
      border-radius: 4px;
      padding: 7px 5px;
      font-family: 'Kumbh Sans', sans-serif;
      font-size: 0.97em;
      font-weight:bold;
      /* background: -webkit-linear-gradient(to right, #63739c, #1672db, #3613b3); */
      /* color:white; */
    }
    .topic {
    font-size: 1.0rem;
    background: #3a98b4;
    background: -webkit-linear-gradient(to right, #63739c, #6a819c, #8062e0);
    background: linear-gradient(to right, #7f828a, #69a1e0, #5b43b3);
    padding: 5px 5px;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}
    .submit {
    font-size: 1.0rem;
    background: #77f181;
    color:white;
    /* background: -webkit-linear-gradient(to right, #1cf126, #126d29, #4feb69); */
    background: linear-gradient(to right, #63739c, #1672db, #3613b3);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 2rem;
    /* margin-bottom:1.5rem; */
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}
  .add {
    font-size: 1.0rem;
    background: #deddf8;
    background: -webkit-linear-gradient(to right, #f0f2f5, #ecf0f5, #bcb7cf);
    background: linear-gradient(to right, #afb7cc, #d8dde2, #e3e1ec);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 0rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
    width:250px;
  }
  .addtopic {
    font-size: 1.0rem;
    background: #deddf8;
    background: -webkit-linear-gradient(to right, #f0f2f5, #ecf0f5, #bcb7cf);
    background: linear-gradient(to right, #afb7cc, #d8dde2, #e3e1ec);
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    margin-top: 0rem;
    cursor: pointer;
    position: relative;
    margin-left: 20px;
    transition: all 0.35s;
    outline: none;
}

</style>