<?php include 'database.php';

//populate variables from the form
$usertype = $_POST['usertype'];
$idnumber = $_POST['idnumber'];
$classid = $_POST['classid'];

//execute sql statement
if ($usertype == "student"){
    $sql= "INSERT INTO Registers (idNumber, classID, finalGrade) VALUES ('$idnumber', '$classid', '0')";
    echo $sql;
    mysqli_query($connect, $sql);

    if(mysqli_affected_rows($connect) > 0){
        echo "<p>User ".$idnumber." added into course ID : ".$classid."</p>";
    }
    else {
        echo "Error enrolling student!.<br>";
        echo mysqli_error ($connect)."<br>";
    }

    echo "<p><a href='dash.html'>Go Back</a></p>";

}

if ($usertype == "teacher") {
    $sql= "INSERT INTO Teaches (idNumber, classID) VALUES ('$idnumber', '$classid')";
    echo $sql;
    mysqli_query($connect, $sql);

    if(mysqli_affected_rows($connect) > 0){
        echo "<p>Teacher ".$idnumber." now teaches course w/ ID : ".$classid."</p>";
    }
    else {
        echo "Error assigning teacher!.<br>";
        echo mysqli_error ($connect)."<br>";
    }

    echo "<p><a href='dash.html'>Go Back</a></p>";
}

