<!-- table section -->

<table class="content-table">
    <thead>
        <tr>
            <th>Material Name</th>
            <th>Exam date</th>
            <th>Student'Mark</th>
        </tr>
    </thead>
    <tbody>
        <?php

        for ($i = 0; $i < count($Tests); $i++) {
        ?>
            <tr>
                <td>
                    <?php echo $Tests[$i][0]; ?>
                </td>
                <td>
                    <?php echo $Tests[$i][1]; ?>
                </td>
                <td>
                    <?php echo round($Tests[$i][2])."%"; ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<br>
<br>
s