<table class="content-table" id="qtable" style="display:block">
    <thead>
        <tr>
            <th><?php echo "Question text:  ".$Q_informations[0]->question_text; ?></th>
            <th><?php echo "Question Mark: " . $Q_informations[0]->question_mark; ?></th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        $index = 1;
        foreach ($Q_informations as $info) {
        ?>
            <tr>
                <td><?php echo "Option " . $index . ":"; ?></td>
                <td>
                    <?php echo $info->text;
                    if ($info->correct == 1) echo "  (The correct answer)"; ?>
                </td>
            </tr>
        <?php
            $index++;
        }
        ?>

    </tbody>
</table>
<br><br>