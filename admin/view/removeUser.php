<?php include 'database.php';

//populate variables from the form
$idnumber=$_POST['idnumber'];

// sql to delete a record
$Authentication_sql = "DELETE FROM Authentication WHERE idnumber = ".$idnumber;
$Contact_sql= "DELETE FROM Contact WHERE idnumber = ".$idnumber;
$Users_sql= "DELETE FROM Users WHERE idnumber = ".$idnumber;

//run SQL for Authentication
mysqli_query($connect, $Authentication_sql);
if (mysqli_affected_rows($connect) > 0) {
    echo "Record deleted from Authentication successfully<br>";
} else {
    echo "Error deleting record from Authentication.<br>";
}

//run SQL for Contact
mysqli_query($connect, $Contact_sql);
if (mysqli_affected_rows($connect) > 0) {
    echo "Record deleted from Contact successfully<br>";
} else {
    echo "Error deleting record from Contact.<br>";
}

//run SQL for Users
mysqli_query($connect, $Users_sql);
if (mysqli_affected_rows($connect) > 0) {
    echo "Record deleted from Users successfully<br>";
} else {
    echo "Error deleting record from Users.<br>";
}
mysqli_close($connect);

echo "<p><a href='dash.html'>Go Back</a></p>";

?>


