<?php
 $db_name = 'mysql:host=localhost;dbname=form_database';
 $user_name = 'root';
 $user_password = '';

 $conn = new PDO($db_name, $user_name, $user_password);

session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION['email'];
 
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if($select_user->rowCount() > 0){
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $gender = $row["gender"];
        $email = $row["email"];
        $password = $row["password"]; // Note: It's recommended to hash passwords for security before storing them in the database
        $country = $row["country"];

       // Welcome message
       echo "Welcome back, $firstname $lastname!";
       echo "<br>";
       echo "Your email address is: $email";
     }else{
        echo "No user found";
     }
}

?>