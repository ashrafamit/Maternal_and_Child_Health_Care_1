<div>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Date</th>
            <th>Active</th>
        </tr>

        <?php
        include("config.php");

        $find_dates_to_send_reminder = "SELECT * from record WHERE  dates > CURRENT_TIMESTAMP  and active = 0";
        $find_dates_to_send_reminder_run = mysqli_query($mysqli, $find_dates_to_send_reminder);


        while ($result = mysqli_fetch_array($find_dates_to_send_reminder_run)) {
            echo '<tr>';
            echo '<td>' . $result['id'] . '</td>';
            echo '<td>' . $result['name'] . '</td>';
            echo '<td>' . $result['email'] . '</td>';
            echo '<td>' . $result['mobile'] . '</td>';
            echo '<td>' . $result['dates'] . '</td>';
            echo '<td>' . $result['active'] . '</td>';
            echo '</tr>';
        }
        ?>

    </table>
    <button><a href="simple.php">send reminder</a></button>
</div>