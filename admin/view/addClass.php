<?php include 'database.php';

//populate variables from the form
$coursename = $_POST['coursename'];
$coursedesc = $_POST['coursedesc'];

//execute sql statement to remove

$sql= "INSERT INTO Course (courseID, courseName, courseDescription) VALUES (NULL, '$coursename', '$coursedesc')";

mysqli_query($connect, $sql);

if(mysqli_affected_rows($connect) > 0){
    echo "<p>Course created with the following properties:</p>";
    echo "<br>Course Name: ".$coursename;
    echo "<br>Course Description: ".$coursedesc;
}
else {
    echo "Error creating Course!.<br>";
    echo mysqli_error ($connect)."<br>";
}

echo "<p><a href='dash.html'>Go Back</a></p>";