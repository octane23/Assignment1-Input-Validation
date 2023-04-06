# Assignment1-Input-Validation


## Index.html ##
The frontend of the website which display the reservation form. This html form is inserted with regex for Client-Side Input Validation. This term can also be called validate early

## style.css ##
For styling of the reservation form

## validation.js ##
For validate function to be used in the html form. The function act as Client-Side Input Validation.

## submit.php ##

For server-side input validation before the data is pass to the database. This term can also be called validate late



#login#

## auth.php ##
This page connect with the databse to authenticate user by providing input email and password that is already stored in the databased. Below is crucial code in the auth.php to compare the email and password entered  with email and password in the database before being able to authenticate.

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
        

## style.css ##
For styling of the logijn form

## index,php ##
The page that request the email and password to authenticate the user bewfore sending to the database
