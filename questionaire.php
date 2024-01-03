<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionaire</title>
    <style>
        input{
            width: 70%;
            margin-bottom: 20px;
        }
        form{
            border: 5px double black;
            margin-left: 10%;
            margin-right: 20%;
            padding: 15px;
        }
        label{
            color: black;
            font-weight:bolder;
        }
        body{
            color: red;
            font-weight: bold;
        }
        h2{
            color: blue;
        }
        button{
            background-color: green;
        }
    </style>
</head>
<body>
    <h2><b><u>QUESTIONAIRE FOR STUDENT</u></b></h2>
    <form action="#" method="post">
        <label for="r1">Course Contents of Curriculum are in tune with the Program Outcomes</label><br>
        1 means low <input type="range" name="r1" min="1" max="5"> 5 means High<br>
        <label for="r2">Course Contents are designed to enable Problem Solving Skills and Core Competencies</label><br>
        1 means low <input type="range" name="r2" min="1" max="5"> 5 means High<br>
        <label for="r3">Course places in the carriculum serves the needs of both advanced and slow learners</label><br>
        1 means low <input type="range" name="r3" min="1" max="5"> 5 means High<br>
        <label for="r4">Contact Hour Distribution among the various Course Components(LTP) is Satisfiable</label><br>
        1 means low <input type="range" name="r4" min="1" max="5"> 5 means High<br>
        <label for="r5">Composition of Basic Science,Engineering, Humanities and Management Course is a right mix and satisfiable</label><br>
        1 means low <input type="range" name="r5" min="1" max="5"> 5 means High<br>
        <label for="r6">Laboratory sessions are sufficient to improve the technical skills of students</label><br>
        1 means low <input type="range" name="r6" min="1" max="5"> 5 means High<br>
        <label for="r7">Inclusion of Minor Project/Mini Project improved the technical competency and leadership skills among the students</label><br>
        1 means low <input type="range" name="r7" min="1" max="5"> 5 means High<br>
        <label for="sug">Suggest any other point to improve curriculum</label><br>
        <textarea name="sug" id="" cols="90" rows="3"></textarea><br>
        <button name="submit"><b>Submit</b></button>
        <?php
    if(isset($_POST['submit']))
    {
        $row1 = $_POST['r1'];
        $row2 = $_POST['r2'];
        $row3 = $_POST['r3'];
        $row4 = $_POST['r4'];
        $row5 = $_POST['r5'];
        $row6 = $_POST['r6'];
        $row7 = $_POST['r7'];
        $registration = $_SESSION['reges'];
        $query1 = mysqli_query($conn,"INSERT INTO `questionaire` (`regdNo`,`first`, `second`, `third`, `fourth`, `fifth`, `sixth`, `seventh`) VALUES ('$registration','$row1', '$row2', '$row3', '$row4', '$row5', '$row6', '$row7')");
        if($query1)
        {
            echo '<script>
            alert("Data inserted successfully!!");
        </script>';
        header("Location: display.php", true, 301);  
            exit();
        }
        else{
            echo '<script>
            alert("Error while inserting data!!");
        </script>';
        }
    }
    ?>
    </form>
</body>
</html>