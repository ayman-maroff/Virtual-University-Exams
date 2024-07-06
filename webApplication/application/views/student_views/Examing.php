<!-- table section -->

<table class="content-table">
  <thead>
    <tr>
      <th>Test center address</th>
      <th>Materials</th>
    </tr>
  </thead>
  <tbody>
    <?php

    for ($i = 0; $i < count($centers[0]); $i++) {
    ?>
      <tr>
        <td>
          <?php echo $centers[0][$i]->address; ?>
        </td>
        <td>
          <?php
          for ($j = 0; $j < count($centers[1]); $j++) {
          ?>
            <a target="_blank" href="<?php echo URL . 'test/prepareToStartExam/' . $centers[1][$j]->id . "/" . $centers[1][$j]->mt_name; ?>"> <?php echo  $centers[1][$j]->mt_name; ?></a>
            <br>
          <?php } ?>
        </td>

      </tr>


    <?php

    }
    ?>
  </tbody>
</table>