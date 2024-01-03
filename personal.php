<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details</title>
    <style>
        .personal{
            border: 5px double black;
            margin-left: 30%;
            margin-right: 20%;
            display: flex;
            justify-content:space-between;
            padding: 10px;
        }
        .gen{
            width: 50px;
            height: 13px;
        }
        input,select{
            width: 300px;
            height: 30px;
        }
        button{
            background-color: green;
        }
        h1{
            color: blue;
        }
    </style>
</head>
<body>
    <h1><b><u>PERSONAL DETAILS</u></b></h1>
    <form action="#" method="post">
    <div class="personal">
        <div class="first">
            <label for="stakename"><b>Name of the Stakeholder</b></label><br>
            <input type="text" name="stakename" placeholder="Please enter your firstname" required><br>
            <label for="ph"><b>Phone</b></label><br>
            <input type="number" name="ph" placeholder="Please enter your phone" required><br>
            <label for="feedback"><b>Feedback for Acedemic Year</b></label><br>
            <select name="feedback" id="acd" required>
                <option value="" disabled selected>Select the Acedemic Year</option>
                <option value="2022-23"><b>2022-23</b></option>
            </select>
        </div>
        <div class="second">
            <label for="type"><b>Type of the Stakeholder</b></label><br>
            <select name="type" id="detail" required>
                <option value="" disabled selected>Select the type</option>
                <option value="Student"><b>Student</b></option>
                <option value="Faculty"><b>Faculty</b></option>
                <option value="Alumni"><b>Alumni</b></option>
            </select><br>
            <label for="mail"><b>Email</b></label><br>
            <input type="email" placeholder="Please enter your email" name="mail" required><br>
            <label for="gen"><b>Gender</b></label><br>
            <input type="radio" name="gender" value="Male" class="gen" required><b>Male</b>
            <input type="radio" name="gender" value="Female" class="gen" required><b>Female</b><br>
            <button method="post" name="submit"><b>Submit</b></button>
        </div>
    </div>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $naam = $_POST['stakename'];
        $ph = $_POST['ph'];
        $yr = $_POST['feedback'];
        $type = $_POST['type'];
        $mail = $_POST['mail'];
        $gen = $_POST['gender'];
        $_SESSION['name'] = $naam;
        $query = mysqli_query($conn,"INSERT INTO `personal` (`Name`, `Phone`, `Year`, `Type`, `mail`, `gender`) VALUES ('$naam', '$ph', '$yr', '$type', '$mail', '$gen')");
        if($query)
        {
            header("Location: student.php", true, 301);  
            exit();
        }
        else{
            echo '<script>
            alert("Error while inserting data!!");
        </script>';
        }
    }
    ?>
    <footer>
    <hr>
    <span>&copy;Vignan University</span>
    <hr>
    </footer>
</body>
</html>