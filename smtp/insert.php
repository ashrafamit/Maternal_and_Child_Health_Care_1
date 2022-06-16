<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Wish</title>
</head>
<body>
    <form action="function.php" method="POST">
    Friends Name<input type="text" name="name"><br> 
    Your Email<input type="email" name="email"><br> 
    Your Mobile<input type="mobile" name="mobile"><br> 
    Date of Birth<input type="datetime-local" name="dates"><br> 
    <input type="submit" name="submit"><br> 
    </form>


    <button><a href="showTable.php">show users to send reminder</a></button>
    <button><a href="send_mail.php">send reminder</a></button>
</body>
</html>