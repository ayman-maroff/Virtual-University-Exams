<table class="content-table">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Phone Number</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Role</th>
      <th>Edit</th>
      <th> Delete
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
      <tr>
        <td><?php if (isset($user->firstname)) echo $user->firstname; ?></td>
        <td><?php if (isset($user->midlename)) echo $user->midlename; ?></td>
        <td><?php if (isset($user->lastname)) echo $user->lastname; ?></td>
        <td><?php if (isset($user->phonenumber)) echo $user->phonenumber; ?></td>
        <td><?php if (isset($user->email)) echo $user->email; ?></td>
        <td><?php if (isset($user->gender)) echo $user->gender; ?></td>
        <td><?php if (isset($user->roleName)) echo $user->roleName; ?></td>
        <td> <a href="<?php echo URL . 'user/prepareToUpdateUser/' . $user->iid; ?>"><i class='bx bx-cog'></i></a></td>
        <?php if($_SESSION['userid']!=$user->iid) {?>
        <!-- <td><i class='bx bx-cart-alt'></i></td> -->
        <td><a href="<?php echo URL . 'user/prepareTodeleteUser/' . $user->iid; ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
     <?php }else{?>
        <td></td>
      <?php }?>
      </tr>
    <?php } ?>
  </tbody>
</table>
<!-- Add new User Button -->
<button class="main__btn"><a href="<?php echo URL; ?>user/preparetoaddUser">+ Add New User</a></button>


<script>
  function alert_delete() {
    alert("Deleted User ?");
  }
</script>

</html>
<?php
//echo $_SESSION['edit_state']." at the end of users.php";
