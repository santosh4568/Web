<?php
include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail</title>
    <style>
        .details{
            margin-left: 30%;
            margin-right: 20%;
            display: flex;
            justify-content:space-evenly;
            padding: 10px;
        }
        .container{
            display: flex;
            justify-content: space-evenly;
        }
        input,select{
            width: 300px;
            height: 25px;
        }
        h2{
            color: blue;
        }
        form{
            border: 5px double black;
        }
        button{
            margin-top: 20px;
            margin-left: 5%;
            background-color: green;
        }
    </style>
</head>
<body>
    <form action="#" method="post">
    <h2><b><u>STUDENT DETAILS</u></b></h2>
    <div class="details">
        <div class="number">
            <label for="regd"><b>Register Number</b></label><br>
            <input type="text" placeholder="Please Enter your register number" name="regd" required>
        </div>
        <div class="branch">
            <label for="bch"><b>Branch</b></label><br>
            <input type="text" placeholder="Please enter your branch" name="bch" required>
        </div>
    </div>
    <h2><b><u>PROGRAMME DETAILS</u></b></h2>
    <div class="container">
        <div class="prog">
            <select name="slct1" id="slct1" onchange="populate1(this.id,'slct2')" required>
            <option value="">-- choose degree --</option>
            <option value="UG">UG</option>
            <option value="PG">PG</option>
            </select>
        </div>

        <div class="prog">
            <select name="slct2" id="slct2" onchange="populate2(this.id,'slct3')" required></select>
        </div>

        <div class="prog">
            <select name="slct3" id="slct3" onchange="populate3(this.id,'slct4')" required></select>
        </div>
        <div class="prog">
            <select name="slct4" id="slct4" required>
                <option value="">-- choose Regulation --</option>
                <option value="R19">R19</option>
                <option value="R22">R22</option>
            </select>
        </div>
    </div>
    <button name="submit"><b>Submit</b></button>
    <?php
    if(isset($_POST['submit']))
    {
        $regd = $_POST['regd'];
        $branch = $_POST['bch'];
        $reg = $_POST['slct4'];
        $course = $_POST['slct2'];
        $namm = $_SESSION['name'];
        $query = mysqli_query($conn,"INSERT INTO `student` (`Name`, `regdNo`, `branch`, `course`, `regulation`) VALUES ('$namm', '$regd', '$branch', '$course', '$reg')");
        if($query){
            $_SESSION['reges'] = $regd;
            echo '<script>
            alert("Data inserted!!");
        </script>';
        header("Location: questionaire.php", true, 301);  
        exit();
        }
        else{
            echo '<script>
            alert("Error!!");
        </script>';
        }
    }
    ?>
    </form>
    <script>
        function populate1(s1,s2) {
            var s1 =document.getElementById(s1);
            var s2 =document.getElementById(s2);
            s2.innerHTML = "";
            if(s1.value == "UG")
            {
                var optionArray = ['BCA|BCA','BBA|BBA','BPharma|BPharma','B.tech|B.tech'];
            }
            else if(s1.value == "PG")
            {
                var optionArray = ['M.tech|M.tech','MCA|MCA','MBA|MBA'];
            }

            for(var option in optionArray)
            {
                var pair =optionArray[option].split("|");
                var newoption =document.createElement("option");

                newoption.value = pair[0];
                newoption.innerHTML = pair[1];
                s2.options.add(newoption);
            }
        }
            function populate2(s1,s2) {
            var s1 =document.getElementById(s1);
            var s2 =document.getElementById(s2);
            s2.innerHTML = "";
            if(s1.value == "B.tech")
            {
                var optionArray = ['CSE|CSE','ECE|ECE','EEE|EEE','MECH|MECH'];
            }
            else if(s1.value == "BCA")
            {
                var optionArray = ['BCA|BCA'];
            }
            else if(s1.value == "BBA")
            {
                var optionArray = ['BBA|BBA'];
            }
            else if(s1.value == "BPharma")
            {
                var optionArray = ['BPharma|BPharma'];
            }
            else if(s1.value == "M.tech")
            {
                var optionArray = ['CSE|CSE','ECE|ECE','EEE|EEE','MECH|MECH'];
            }
            else if(s1.value == "MCA")
            {
                var optionArray = ['Data Analytics|Data Analytics','AI|AI','System Management|System Management'];
            }
            else if(s1.value == "MBA")
            {
                var optionArray = ['Enterpreneurship|Enterpreneurship','Marketing|Marketing','Finance|Finance'];
            }
            for(var option in optionArray)
            {
                var pair =optionArray[option].split("|");
                var newoption =document.createElement("option");

                newoption.value = pair[0];
                newoption.innerHTML = pair[1];
                s2.options.add(newoption);
            }
        }
    </script>
</body>
</html>