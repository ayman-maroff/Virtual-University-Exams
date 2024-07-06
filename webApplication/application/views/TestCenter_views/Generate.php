<html>
    <head>
        <style>
            
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
      width:194px;
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
      width:150px;
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
    /* background: -webkit-linear-gradient(to right, #1cf126, #126d29, #4feb69); */
    background: linear-gradient(to right, #63739c, #1672db, #3613b3);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    margin-top: 1rem;
    margin-bottom:1rem;
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
            <th>Generate</th>

        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($array2[0]); $i++) { ?>

            <tr>
                <td><?php echo  $array2[0][$i]->mt_name; ?></td>
                <td> <a href="<?php echo URL . 'test/prepareToGenerate/' . $array2[0][$i]->cid; ?>"><i class='bx bx-cog'></i></a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>

<!-- <label class="main__btn">Generate Exam</label> -->
<form method="post" id="addform" action="<?php echo URL . 'test/Generate/' . $array2[1][0]->cid . "/" .$array2[1][0]->mt_name;  ?>">
<p class="coursename2"> Course Name: <?php echo $array2[1][0]->mt_name; ?></p>

    </br>
    <p class="coursename22" name="numbermin"> Num of Questions:</p><br>

    <div id="topic">
        <input id="topicname" class="addtopic" type="number" name="Number" placeholder="Num of Questions" name="numbermin" min="1" size="15" required />
    </div>
    <input  id="submit_btn" class="submit" type="submit" size="15" />

</form>