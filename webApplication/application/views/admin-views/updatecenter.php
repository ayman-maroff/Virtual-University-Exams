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
      width:135px;
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
    width:250px;
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
      <th>Test center address</th>
      <th>Capacity</th>
      <th>Edit</th>
      <th> Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php $indx = 0; ?>
    <?php foreach ($array3 as $arr) { ?>
      <?php if ($indx == 0) { ?>
        <?php foreach ($arr as $center) { ?>
          <?php $indx = 1; ?>
          <tr>
            <td><?php echo $center->address ?></td>
            <td><?php echo $center->capacity . "  Student" ?> </td>
            <td> <a href="<?php echo URL . 'test_center/prepareToUpdateCenter/' . $center->id; ?>"><i class='bx bx-cog'></i></a></td>
            <!-- <td><i class='bx bx-cart-alt'></i></td> -->
            <td><a  href="<?php echo URL . 'test_center/perpareTodeleteCenter/' .  $center->id; ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
          </tr>
        <?php } ?>
      <?php } else {
        break;
      } ?>
    <?php } ?>
  </tbody>
</table>
<!-- <button class="main__btn" onclick="addcenter()">+ Add New Test Center</button> -->
<form method="post" id="addform" action="<?php echo URL . 'test_center/updateCenter/' . $array3[1][0]->id; ?>">
<p class="coursename2"> Center Address:</p><br>
  <input id="coursename" class="add" type="text" name="centeraddress" placeholder="Center Address" size="15" required value="<?php echo $array3[1][0]->address; ?>" />
  </br>
  </br>
  <p class="coursename22" for="numbermin"> Capacity:</p><br>
  <input id="coursename" class="add" type="number" name="capacity" placeholder="Capacity" size="15" name="numbermin" min="1" required value="<?php echo $array3[1][0]->capacity; ?>" />
  </br>
  </br>
  <input  id="submit_btn" class="submit" type="submit" placeholder="Course name" size="15" />

</form>