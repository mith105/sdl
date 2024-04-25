<!-- CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL, -- Note: Store hashed passwords
    country VARCHAR(50) NOT NULL
); -->


<?php
$db_name = 'mysql:host=localhost;dbname=form_database';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Note: It's recommended to hash passwords for security before storing them in the database
    $country = $_POST["country"];

    $insert_user = $conn->prepare("INSERT INTO `users`(firstname, lastname, gender, email, password, country) VALUES(?,?,?,?,?,?)");
    $insert_user->execute([$firstname, $lastname, $gender, $email, $password, $country]);
    header('location:login.php');// for session change for cookie

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="styel.css"/> -->
    <title>Registration form</title>
    <style>
      /* style.css content */
      body {
        font-family: Arial, sans-serif; /* Setting a base font for the page */
        background-color: #f8f8f8; /* Light grey background for the whole page */
        margin: 0;
        padding-left: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 400px;
      }

      .container {
        background: #fff;
        padding: 20px 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: blanchedalmond;
      }

      label {
        margin-bottom: 5px;
        font-weight: 800;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"],
      input[type="select"] {
        width: 100%; /* Full width of their container */
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }

      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="password"]:focus {
        border-color: #4a90e2; /* Blue border for focus */
        outline: none;
      }

      input[type="submit"] {
        background-color: #4a90e2;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
      }

      input[type="submit"]:hover {
        background-color: #357abd; /* Slightly darker blue on hover */
      }

      .country {
        width: 100%; /* Full width of their container */
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form id="registrationForm" action="" method="POST">
        <label>Firstname:</label>
        <input
          type="text"
          name="firstname"
          placeholder="enter your first name"
          required
        />
        <div id="firstnameError" class="error-message"></div>
        <br />
        <label>Lastname:</label>
        <input
          type="text"
          name="lastname"
          placeholder="enter your last name"
          required
        />
        <div id="lastnameError" class="error-message"></div>
        <!-- Add error message element -->
        <br />
        <div class="gender">
          <input
            type="radio"
            name="gender"
            id="rd1male"
            value="Male"
            required
          />
          <label for="rd1male">Male</label>
          <input type="radio" name="gender" id="rd1female" value="Female" />
          <label for="rd1female">Female</label>
        </div>
        <label>Email:</label>
        <input
          type="email"
          name="email"
          placeholder="enter your email"
          required
        />
        <div id="emailError" class="error-message"></div>
        <!-- Add error message element -->
        <br />
        <label>Password:</label>
        <input
          type="password"
          name="password"
          placeholder="enter your password"
          required
          minlength="3"
        />
        <div id="passwordError" class="error-message"></div>
        <!-- Add error message element -->
        <br />
        <label>Confirm Password:</label>
        <input
          type="password"
          name="con_password"
          placeholder="confirm your password"
          required
          minlength="3"
        />
        <div id="confirmPasswordError" class="error-message"></div>
        <!-- Add error message element -->
        <br />
        <div class="country">
          <select name="country" required>
            <option>select a country</option>
            <option>India</option>
            <option>USA</option>
            <option>Russia</option>
          </select>
        </div>
        <!-- <div class="cbox">
          <input type="checkbox" id="cb1" required />
          <label for="cb1">I agree for newsletter</label>
          <br />
          <input type="checkbox" id="cb2" />
          <label for="cb2">I agree for newsletter</label>
        </div> -->
        <input class="button" type="submit" value="register now" name="submit" class="btn">
      </form>
    </div>
  </body>
</html>
