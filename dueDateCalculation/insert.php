<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Due Date Calculator</title>
</head>
<body>
    <form action="calculator.php" method="POST">
        
    Please select the first day of your last menstrual period:
    <input type="date" name="dates"><br>

    <p>Usual number of days in your period: <select name="days">
    <?php
    for($i=20;$i<=45;$i++)
    {
        if($i==28) $selected='selected="true"';
        else $selected='';
        echo "<option $selected value='$i'>$i</option>";
    }
    ?>
    </select></p> 
    
        <input type="submit" name="submit"><br> 
    </form>

    
</body>
</html>