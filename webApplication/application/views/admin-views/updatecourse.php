<head>
<style>
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
      width:120px;
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
    margin-bottom:1.5rem;
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

</head>
<!-- table section -->
<table class="content-table">

  <thead>
    <tr>
      <th>Course Name</th>
      <th>Topic Name</th>
      <th>Edit</th>
      <th> Delete </th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($array3[0]); $i++) { ?>

      <tr>
        <td><?php echo $array3[0][$i]->mt_name; ?></td>
        <td>
          <a href="<?php echo URL . 'question/questionsList/' . $array3[0][$i]->tp_name; ?>">
            <?php echo $array3[0][$i]->tp_name; ?></a>
        </td>
        <td> <a href="<?php echo URL . 'material/prepareToUpdateCourse/' . $array3[0][$i]->cid . "/" . $array3[0][$i]->tid; ?>" title="Go Down"><i class='bx bx-cog'></i></a></td>

        <!-- <td><i class='bx bx-cart-alt'></i></td> -->
        <td><a   href="<?php echo URL . 'material/prepareToDeleteCourse/' . $array3[0][$i]->cid . "/" . $array3[0][$i]->tid; ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
      </tr>
    <?php } ?>
    <?php for ($i = 0; $i < count($array3[1]); $i++) { ?>
      <tr>
        <td><?php echo $array3[1][$i]->mt_name; ?></td>
        <td> <?php echo "NO TOPIC TO SHOW!" ?> </td>
        <td> <a href="<?php echo URL . 'material/prepareToUpdateCourse/' . $array3[1][$i]->cid; ?>" title="Go Down"><i class='bx bx-cog'></i></a></td>
        <!-- <td><i class='bx bx-cart-alt'></i></td> -->
        <td><a   href="<?php echo URL . 'material/prepareToDeleteCourse/' . $array3[1][$i]->cid; ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>

      </tr>
    <?php } ?>

  </tbody>
</table>
<!-- <button class="main__btn" onclick="addcourse()">+ Add New Course</button> -->
<?php if ($array3[3] == 1) { ?>
  <form method="post" id="addform" action="<?php echo URL . 'material/updateCourse/' . $course_id . "/" . $topic_id; ?>">
</br>
<p class="coursename2"> Course Name :</p>
<br>
    <input id="coursename" class="add" type="text" name="coursename" placeholder="Course name" size="15" required value="<?php echo $array3[2][0]->mt_name; ?>" />
    <br><br>
    <a class="topic" onclick="addtopic()">Add New topic</a>
    </br>
</br>
    <div id="topic">
    <p class="coursename22"> Topic Name :</p>
<br>
      <input id="topicname" class="addtopic" type="text" name="topicname" placeholder="Topic name" size="15" value="<?php echo $array3[2][0]->tp_name; ?>" />
    </div>
    <input  id="submit_btn" class="submit" type="submit" placeholder="Course name" size="15" />

  </form>
  <br><br><br>
<?php } else { ?>
  <form method="post" id="addform" action="<?php echo URL . 'material/updateCourse/' . $course_id; ?>">
</br>
<p class="coursename2"> Course Name :</p><br>
<br>
    <input id="coursename" class="add" type="text" name="coursename" placeholder="Course name" size="15" required value="<?php echo $array3[2][0]->mt_name; ?>" />
    <br><br>
    <a class="topic" onclick="addtopic()">Add New topic</a>
    </br>
    <br>
    <div id="topic" style="display: none">
    <p class="coursename22"> Topic Name :</p>
<br>
      <input value="" id="topicname" class="addtopic" type="text" name="topicname" placeholder="Topic name" size="15" />
    </div>
    <input  id="submit_btn" class="submit" type="submit" placeholder="Course name" size="15" />
<br>
  </form>
  <br><br><br>
<?php } ?>