<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'users';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
  
     //Hash the password
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
    // Check if the email and hashed password match a record in the database
    $sql = "SELECT * FROM user_info WHERE email='$email' ";
    $result = mysqli_query($conn, $sql);
  
    if ($result && mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
  
      if (password_verify($password, $user['password'])) {
        // Password is correct, start a session
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $user['id'];
        
        // Redirect to the protected page
        header('Location: ../reservationform/index.html');
      } else {
        // Password is not correct, show an error message
        $error = "Incorrect password";
        header('Location: index.php?error=' . urlencode($error));
      }
    } else {
      // Email is not found, show an error message
      $error = "Email not found";
      header('Location: index.php?error=' . urlencode($error));
    }
  }
  
  mysqli_close($conn);
  
  ?>