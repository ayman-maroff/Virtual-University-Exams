<!-- table section -->
<table class="content-table">
  <thead>
    <tr>
      <th>Topic Name</th>
      <th>Question ID</th>
      <th>Edit</th>
      <th> Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $temp = 1;
    foreach ($questions as $question) {
    ?>
      <tr>
        <td><?php echo $topic_name ?></td>
        <td>
          <a href="<?php echo URL . 'question/displayQuestion/' . $question->id . "/" . $topic_name; ?>">
            <?php echo "Question " . $temp; ?>
          </a>

        </td>
        <td> <a href="<?php echo URL . 'question/prepareToUpdateQuestion/' . $question->id . "/" . $topic_name; ?>"><i class='bx bx-cog'></i></a></td>
        <!-- <td><i class='bx bx-cart-alt'></i></td> -->
        <td><a  href="<?php echo URL . 'question/prepareTodeleteQuestion/' .  $question->id . "/" . $topic_name; ?>" class="btn_del"><i id="deltbtn" class='bx bx-cart-alt'></i></a></td>
      </tr>
    <?php
      $temp++;
    }
    ?>
  </tbody>
</table>
<button class="main__btn"><a href="<?php echo URL . 'question/prepareAddquestion/' . $topic_name; ?>">+ Add New Question</a></button>