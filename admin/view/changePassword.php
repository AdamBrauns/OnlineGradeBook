<?php include 'database.php';

//populate variables from the form
$username = $_POST['username'];
$newpass = $_POST['newpass'];
$newpass2 = $_POST['newpass2'];


if ($newpass == $newpass2) {

    $sql = "UPDATE Authentication SET  password = '".$newpass."' WHERE  username = '".$username."'";

    mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        echo "<p>Password for " . $username . " switched to " . $newpass . "!</p>";
    } else {
        echo "Error changing password... check to make sure the current password doesn't equal the new password<br>";
        echo mysqli_error($connect) . "<br>";
    }


    echo "<p><a href='dash.html'>Go Back</a></p>";
}
else{
    echo "Passwords did not match!  Try again.";
    echo "<p><a href='dash.html'>Go Back</a></p>";
}