<?php include 'database.php';

//populate variables from the form
$courseid = $_POST['courseid'];

//execute sql statement to remove

$sql = "DELETE FROM Course WHERE courseID = ".$courseid;


mysqli_query($connect, $sql);

if(mysqli_affected_rows($connect) > 0){
    echo "<p>Course deleted with courseID = ".$courseid."</p>";
}
else {
    echo "Error deleting course with ID = ".$courseid."<br>";
    echo mysqli_error ($connect)."<br>";
}

echo "<p><a href='dash.html'>Go Back</a></p>";