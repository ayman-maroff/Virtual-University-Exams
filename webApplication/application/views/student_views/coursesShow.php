<html>
<style>
    .a-table {
        border-collapse: collapse;
        margin-top: 90px;
        margin-left: 280px;
        font-size: 1.05em;
        min-width: 500px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .a-table thead tr {
        background: linear-gradient(to right, #63739c, #1672db, #3613b3);
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    .a-table th,
    .a-table td {
        padding: 12px 15px;
    }

    .a-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .a-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .a-table tbody tr:nth-of-type(odd) {
        background-color: #aaabac;
    }

    .a-table tbody tr:last-of-type {
        border-bottom: 2px solid #2455bd;
    }

    .a-table tbody tr.active-row {
        font-weight: bold;
        color: #1672db;
    }
</style>
<!-- table section -->
<table class="a-table">

    <thead>
        <tr>
            <th>Course Name</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($array as $index) { ?>
            <tr>
                <td><?php echo $index->mt_name; ?></td>

            </tr>
        <?php } ?>

    </tbody>
</table>