<!-- slide bar section    -->
<div class="sidebar">
  <div class="logo-details">
    <!-- <i class="bx bxl-c-plus-plus icon"></i> -->
    <!-- <div class="logo_name"></div> -->
    <i class='bx bx-menu' id="btn"></i>
  </div>
  <ul class="nav-list">
    <!-- <li>
      <i class='bx bx-search'></i>
      <input type="text" placeholder="Search...">
      <span class="tooltip">Search</span>
    </li> -->
    <li>
      <a href="<?php echo URL; ?>material/coursesListST">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">My Courses</span>
      </a>
      <!-- <span class="tooltip">Courses</span> -->
    </li>

    <li>
      <?php $temp1 =   $_SESSION['userid']; ?>
      <a href="<?php echo URL . 'test/ShowStudenExam' . "/" . $temp1; ?>">
        <i class='bx bx-cart-alt'></i>

        <span class="links_name">My Exams</span>
      </a>
      <!-- <span class="tooltip">Users</span> -->
    </li>
    <li>
      <?php $temp = $_SESSION['userid']; ?>
      <a href="<?php echo URL . 'user/userprofileST' . "/" . $temp; ?>">
        <i class='bx bx-user'></i>
        <span class="links_name">My Profile</span>
      </a>
      <!-- <span class="tooltip">Order</span> -->
    </li>


    <li>
      <a href=" <?php echo URL; ?>test/displayCenters">
        <i class='bx bx-cog'></i>
        <span class="links_name">Start New Exam</span>
      </a>
      <span class="tooltip"></span>
    </li>
    <li class="profile">
      <div class="profile-details">
        <img src="<?php echo URL; ?>public/img/user-icon.png" alt="profileImg">
        <div class="name_job">
          <div class="name"><?php echo  ucwords($_SESSION['username']); ?></div>
          <div class="job"><?php echo $_SESSION['rolename']; ?></div>
        </div>
      </div>

      <!-- <a href="<?php echo URL; ?>user/logout" > -->
        <i class='bx bx-user' id="log_out"></i>
    </li>
  </ul>
</div>
<script src="<?php echo URL; ?>public/js/sidebar.js"></script>