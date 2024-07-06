<table class="content-table">
  <thead>
    <tr>

      <th>Test</th>
      <th>Full Mark</th>
      <th>Number of Questions</th>
      <th>Time</th>
      <th>Date</th>
      <th>Material Name</th>
      
      <th> Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter = 1;?>
    <?php foreach ($tests as $test) { ?>
      <tr>
        <td><?php if (isset($test->tid)) echo "Test " . $counter; ?></td>
        <td><?php if (isset($test->full_mark)) echo $test->full_mark; ?></td>
        <td><?php if (isset($test->num_of_questions)) echo $test->num_of_questions; ?></td>
        <td><?php if (isset($test->time)) echo $test->time; ?></td>
        <td><?php if (isset($test->date)) echo $test->date; ?></td>
        <td><?php if (isset($test->mt_name)) echo $test->mt_name; ?></td>
        <?php $counter++;?>
        <td><a href="<?php echo URL . 'test/prepareTodeletTest/' . $test->tid; ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
      </tr> 
    <?php } ?>
  </tbody>
</table>
<!-- Generate new Exam Button       <a href="<?php echo URL; ?>test/MaterialList">
 -->
<button class="main__btn"><a href="<?php echo URL; ?>test/MaterialList">+ Generate New Exam</a></button>


<script>
  function alert_delete() {
    alert("Deleted Test ?");
  }
</script>

</html>
<?php
//echo $_SESSION['edit_state']." at the end of users.php";
