<?php 

include('connect.php');
include('style.php');

$user_id = $_GET['editid'] ?? null;

$name = $middlename = $lastname = $username = $mobile = $email = $password = $psw = $course =  $gender = $vehicles = $country_code = $current_address ='';

if (isset($_GET['editid'])) {
    $user_id = mysqli_real_escape_string($con, $user_id);
    $sql = "SELECT * FROM user_meta
            JOIN users ON user_meta.user_id = users.user_id
            WHERE user_meta.user_id = '$user_id'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['firstname'];
        $middlename = $row['middlename'];
        $lastname = $row['lastname'];
        $username = $row['username'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $course = $row['course'];
        $gender = $row['gender'];
        $vehicles = explode(', ', $row['vehicle']);
        $country_code = $row['country_code'];
        $current_address = $row['current_address'];
    }
}

if (isset($_POST['submit'])) {
      if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $middlename = $_POST['middlename'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $username = $_POST['username'] ?? '';
        $mobile = $_POST['mobile'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $psw = $_POST['psw-repeat'] ?? '';

        $course = $_POST['course'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $vehicles = isset($_POST['vehicle']) ? $_POST['vehicle'] : [];
        $vehicle_string = implode(', ', $vehicles);
        $country_code = $_POST['country_code'] ?? '';
        $current_address = $_POST['current_address'] ?? '';
        
        $user_id = mysqli_real_escape_string($con, $user_id);

        $sql = "UPDATE user_meta
                JOIN users ON user_meta.user_id = users.user_id
                SET user_meta.firstname = '$name',
                    user_meta.middlename = '$middlename',
                    user_meta.lastname = '$lastname',
                    user_meta.course = '$course',
                    user_meta.gender = '$gender',
                    user_meta.vehicle = '$vehicle_string',
                    user_meta.country_code = '$country_code',
                    user_meta.current_address = '$current_address',
                    users.email = '$email',
                    users.phone_number = '$mobile',
                    users.passwords = '$password',
                    users.re_type_password = '$psw'
                WHERE user_meta.user_id = '$user_id'";

        $results = mysqli_query($con, $sql);

        if ($results) {
            echo "UPDATED Successfully";
            // header('location:display.php');
        } else {
            die(mysqli_error($con));
        }
    }
}

?>

<form action="" method="POST">
    <div class="container">
        <center>
            <h1>Student Registration Form</h1>
        </center>
        <label>Firstname:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" size="15"/>

        <label> Middlename: </label>
        <input type="text" name="middlename" value="<?php echo htmlspecialchars($middlename); ?>" size="15"/>

        <label> Lastname: </label>
        <input type="text" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" size="15"/>

       <label> Course : </label>
        <select name="course">
            <option value="">Course</option>
            <option value="BCA"<?php if ($course === "BCA") echo " selected"; ?>>BCA</option>
            <option value="BBA"<?php if ($course === "BBA") echo " selected"; ?>>BBA</option>
            <option value="B.Tech"<?php if ($course === "B.Tech") echo " selected"; ?>>B.Tech</option>
            <option value="MBA"<?php if ($course === "MBA") echo " selected"; ?>>MBA</option>
            <option value="MCA"<?php if ($course === "MCA") echo " selected"; ?>>MCA</option>
            <option value="M.Tech"<?php if ($course === "M.Tech") echo " selected"; ?>>M.Tech</option>
        </select>
       <div>
            <label> Gender : </label><br>
            <input type="radio" value="Male" name="gender"<?php if ($gender === "Male") echo " checked"; ?>> Male
            <input type="radio" value="Female" name="gender"<?php if ($gender === "Female") echo " checked"; ?>> Female
            <input type="radio" value="Other" name="gender"<?php if ($gender === "Other") echo " checked"; ?>> Other
        </div>


        <label> Country Code : </label>
        <input type="text" name="country_code" placeholder="Country Code" value="+91" size="2" />

         <label> Current Address :</label>
         <textarea cols="80" rows="5" name="current_address"  value="<?php echo  $current_address; ?>" >
         </textarea>

        <!-- Add your other input fields here -->

        <label>Phone:</label>
        <input type="text" name="mobile" value="<?php echo $mobile; ?>" size="10"/>

        <label for="email"><b>Email</b></label>
        <input type="text" value="<?php echo $email; ?>" name="email" >
        <span class="error"><?php echo isset($email_err) ? $email_err : ''; ?></span>

        <label> Username: </label>
         <input type="text" name="username" value="<?php echo $username; ?>" size="15"  />

       
    <label for="password"><b>Password</b></label>
    <input type="password" value="<?php echo  $password; ?>" name="password" id="passwordInput">
    <span class="error"><?php echo isset($password_err) ? $password_err : ''; ?></span>
    <input type="checkbox" onclick="togglePasswordVisibility('passwordInput')"> Show Password

    <br><br>

    <label for="psw-repeat"><b>Re-type Password</b></label>
    <input type="password" value="<?php echo  $psw; ?>" name="psw-repeat" id="retypePasswordInput">
    <input type="checkbox" onclick="togglePasswordVisibility('retypePasswordInput')"> Show Password

    <button type="submit" name="submit" class="update">Update</button>
    </div>
</form>
<script>
    function togglePasswordVisibility(inputId) {
        var x = document.getElementById(inputId);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
