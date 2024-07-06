<html>
<!-- table section -->
<table class="content-table">

    <thead>
        <tr>
            <th>Course Name</th>
            <th>Generate</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($array as $arr) { ?>

            <tr>
                <td><?php echo  $arr->mt_name; ?></td>
                <td> <a href="<?php echo URL . 'test/prepareToGenerate/' . $arr->cid; ?>"><i class='bx bx-cog'></i></a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>



</html>