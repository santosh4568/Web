<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Result</title>
    <style>
        form{
            margin-left: 30%;
            margin-right: 20%;
            padding: 15px;
        }
        input{
            width: 300px;
            height: 20px;
        }
        button{
            background-color: green;
            margin: 5px;
        }
    </style>
</head>
<body>
    <form action="#" method="post">
        <label for="redg"><b>Register Number</b></label><br>
        <input type="text" name="redg" required><br>
        <button name="submit"><b>Submit</b></button>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $result = $_POST['redg'];
        $_SESSION['res'] = $result;
        header("Location: details.php", true, 301);  
        exit();
    }
    ?>
</body>
</html>