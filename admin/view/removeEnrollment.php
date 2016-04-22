<?php include 'database.php';

//populate variables from the form
$usertype = $_POST['usertype'];
$idnumber = $_POST['idnumber'];
$classid = $_POST['classid'];

//execute sql statement
if ($usertype == "student"){
    $sql= "DELETE FROM Registers WHERE idNumber = ".$idnumber. " AND classid = ".$classid;
    mysqli_query($connect, $sql);

    if(mysqli_affected_rows($connect) > 0){
        echo "<p>User ".$idnumber." removed from course ID : ".$classid."</p>";
    }
    else {
        echo "Error removing student!.<br>";
        echo mysqli_error ($connect)."<br>";
    }

    echo "<p><a href='dash.html'>Go Back</a></p>";

}

if ($usertype == "teacher") {
    $sql= "DELETE FROM Teaches WHERE idNumber = ".$idnumber." AND classid = ".$classid;
    mysqli_query($connect, $sql);

    if(mysqli_affected_rows($connect) > 0){
        echo "<p>Teacher ".$idnumber." no longer teaches course w/ ID : ".$classid."</p>";
    }
    else {
        echo "Error removing teacher from course!.<br>";
        echo mysqli_error ($connect)."<br>";
    }

    echo "<p><a href='dash.html'>Go Back</a></p>";
}
