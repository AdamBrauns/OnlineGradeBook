<?php include 'database.php';

//populate variables from the form
$username=$_POST['username'];


// execute SQL query for 'Authentication'
mysqli_query($connect, "INSERT INTO Authentication (idNumber, username, password) VALUES ('$idnumber', '$username', '$password')");
if(mysqli_affected_rows($connect) > 0){
    echo "<p>Authentication table populated with the following values:</p>";
    echo "ID Number: ".$idnumber;
    echo "<br>username: ".$username;
    echo "<br>password: ".$password;
    $Authentication_success = 1;
}
else {
    echo "Error!  Authentication table was not populated.<br>";
    echo mysqli_error ($connect)."<br>";
}

if ($Authentication_success == 1) {
// excecute SQL query for 'Contact'
    mysqli_query($connect, "INSERT INTO Contact (idNumber, phoneNumber, emailAddress, addressLine1, addressLine2, stateID, zipcode) VALUES ('$idnumber', '$phonenumber', '$emailaddress', '$address', '$address2', '$state', '$zip')");
    if (mysqli_affected_rows($connect) > 0) {
        echo "<p>Contact table populated with the following values:</p>";
        echo "ID Number: " . $idnumber;
        echo "<br>Phone Number: " . $phonenumber;
        echo "<br>Email Address: " . $emailaddress;
        echo "<br>Address Line 1: " . $address;
        echo "<br>Address Line 2: " . $address2;
        echo "<br>State: " . $state;
        echo "<br>ZIP code: " . $zip;
        $Contact_success = 1;
    } else {
        echo "Error!  Contact table was not populated.<br>";
        echo mysqli_error($connect) . "<br>";
    }
}

if ($Contact_success == 1) {
// excecute SQL query for 'Users'
    mysqli_query($connect, "INSERT INTO Users (idNumber, usertype, lastName, firstName) VALUES ('$idnumber', '$usertype', '$lastname', '$firstname')");
    if (mysqli_affected_rows($connect) > 0) {
        echo "<p>Contact table populated with the following values:</p>";
        echo "ID Number: " . $idnumber;
        echo "<br>User Type: " . $usertype;
        echo "<br>Last Name: " . $lastname;
        echo "<br>First Name: " . $firstname;
        $Users_success = 1;
    } else {
        echo "Error!  Users table was not populated.<br>";
        echo mysqli_error($connect) . "<br>";
    }
}

if ($Users_success == 1) {
    echo "<br>All tables populated successfully.";
    echo "<p><a href='dash.html'>Go Back</a></p>";
}
else{
    echo "<br>Something went wrong populating a table!.";
    echo "<p><a href='dash.html'>Go Back</a></p>";
}