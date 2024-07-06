<!-- slide bar section    -->
<div class="sidebar">
  <div class="logo-details">
 
    <i class='bx bx-menu' id="btn"></i>
  </div>
  <ul class="nav-list">
    <!-- <li>
      <i class='bx bx-search'></i>
      <input type="text" placeholder="Search...">
      <span class="tooltip">Search</span>
    </li> -->
    <li>
      <a href="<?php echo URL; ?>test/testsList">
        <i class='bx bx-user'></i>
        <span class="links_name">Exams</span>
      </a>
     
    </li>

    <li>
      <?php $temp = $_SESSION['userid']; ?>
      <a href="<?php echo URL . 'user/userprofileTC' . "/" . $temp; ?>">
        <i class='bx bx-cart-alt'></i>
        <span class="links_name">My Profile</span>
      </a>
     
    </li>

 
    <!-- <li>
      <a href="#">
        <i class='bx bx-cog'></i>
        <span class="links_name">Setting</span>
      </a>
      <span class="tooltip">Setting</span>
    </li> -->
    <li class="profile">
      <div class="profile-details">
        <img src="<?php echo URL; ?>public/img/user-icon.png" alt="profileImg">
        <div class="name_job">
          <div class="name"><?php echo  ucwords($_SESSION['username']); ?></div>
          <div class="job"><?php echo $_SESSION['rolename']; ?></div>
        </div>
      </div>
      <i class='bx bx-user' id="log_out"></i>
    </li>
  </ul>
</div>
<script src="<?php echo URL; ?>public/js/sidebar.js"></script>