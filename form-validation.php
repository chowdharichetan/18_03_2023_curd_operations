<?php 
   
function isEmpty($value) {
    return empty($value) || trim($value) === '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $firstname = $_POST['name'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $course = $_POST['course'];
    // $vehicle = isset($_POST['vehicle']) ? $_POST['vehicle'] : array();
    $gender = $_POST['gender'];
    $phone = $_POST['mobile'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['psw-repeat'];
    $country_code = $_POST['country_code'];
    $current_address = $_POST['current_address'];


    if (isEmpty($firstname)) {
        $errors[] = "Firstname is required.";
    }
    if (isEmpty($middlename)) {
        $errors[] = "Middlename is required.";
    }
    if (isEmpty($lastname)) {
        $errors[] = "Lastname is required.";
    }
    if (isEmpty($course)) {
        $errors[] = "Course is required.";
    }
    // Process selected vehicles
    $selectedVehicles = array();
    if (isset($_POST['vehicle1'])) {
        $selectedVehicles[] = $_POST['vehicle1'];
    }
    if (isset($_POST['vehicle2'])) {
        $selectedVehicles[] = $_POST['vehicle2'];
    }
    if (isset($_POST['vehicle3'])) {
        $selectedVehicles[] = $_POST['vehicle3'];
    }
    if (isEmpty($gender)) {
        $errors[] = "Gender is required.";
    }
    if (isEmpty($phone)) {
        $errors[] = "Phone is required.";
    }
    if (isEmpty($username)) {
        $errors[] = "username is required.";
    }
    if (isEmpty($email)) {
        $errors[] = "Email is required.";
    }
    if (isEmpty($password)) {
        $errors[] = "Password is required.";
    }
    if (isEmpty($retypePassword)) {
        $errors[] = "Retype Password is required.";
    }
    if (isEmpty($country_code)) {
        $errors[] = "country_code is required.";
    }
    if (isEmpty($current_address)) {
        $errors[] = "current_address is required.";
    }

    if (empty($errors)) {
        echo "Form submitted successfully!";
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
