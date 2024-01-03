<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        .im{
            margin-left: 38%;
        }
        p{
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <div class="im">
        <img src="image/logo.jpg" alt="Vignan">
    </div>
    <p><b>Student Feedback Report for 2022-23(1-5 means Low-High)</b></p>
    <pre>
        <?php
        $res = $_SESSION['res'];
        $query1 = mysqli_query($conn,"SELECT * FROM `student` WHERE `regdNo` LIKE '$res'");
        while($field = mysqli_fetch_assoc($query1))
        {
            $name  =$field['Name'];
            $Branch = $field['branch'];
            $cr = $field['course'];
            $regul = $field['regulation'];
        }
        $query2 = mysqli_query($conn,"SELECT * FROM `personal` WHERE `Name` LIKE '$name'");
        while($col = mysqli_fetch_assoc($query2))
        {
            $year = $col['Year'];
        }
        $query3 = mysqli_query($conn,"SELECT * FROM `questionaire` WHERE `regdNo` LIKE '$res'");
        while($column = mysqli_fetch_assoc($query3))
        {
            $r1 = $column['first'];
            $r2 = $column['second'];
            $r3 = $column['third'];
            $r4 = $column['fourth'];
            $r5 = $column['fifth'];
            $r6 = $column['sixth'];
            $r7 = $column['seventh'];
        }
        echo '<br>';
        echo 'Regd No.                                                                                                              :  '.$res.'<br>';
        echo 'Name                                                                                                                  :  '.$name.'<br>';
        echo 'Course                                                                                                                :  '.$cr.'<br>';
        echo 'Branch                                                                                                                :  '.$Branch.'<br>';
        echo 'Acedemic Year                                                                                                         :  '.$year.'<br>';
        echo 'Regulation                                                                                                            :  '.$regul.'<br>';
        echo 'Course Contents of Curriculum are in tune with the Program Outcomes                                                   :  '.$r1.'<br>';
        echo 'Course Contents are designed to enable Problem Solving Skills and Core Competencies                                   :  '.$r2.'<br>';
        echo 'Course places in the carriculum serves the needs of both advanced and slow learners                                   :  '.$r3.'<br>';
        echo 'Contact Hour Distribution among the various Course Components(LTP) is Satisfiable                                     :  '.$r4.'<br>';
        echo 'Composition of Basic Science,Engineering, Humanities and Management Course is a right mix and satisfiable             :  '.$r5.'<br>';
        echo 'Laboratory sessions are sufficient to improve the technical skills of students                                        :  '.$r6.'<br>';
        echo 'Inclusion of Minor Project/Mini Project improved the technical competency and leadership skills among the students    :  '.$r7.'<br>';
        ?>
    </pre>
</body>
</html>