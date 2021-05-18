<?php 
    session_start();

    $username = "";
    $password_1 = "";
    $password_2 = "";
    $email = "";   
    $errors = array();
    // database bağlantısı
    $db = mysqli_connect('localhost', 'root', '', 'loginsystem');

    if (isset($_POST['register'])) {
        $username = addslashes($_POST['username']);
        $password_1 = addslashes($_POST['password_1']);
        $password_2 = addslashes($_POST['password_2']);
        $email = addslashes($_POST['email']);

        if (empty($username)) {
             array_push($errors, "Username cannot be empty"); // Hata listesine hata ekleme işlemi
        }

        if (empty($password_1)) {
            array_push($errors, "Password cannot be empty");
       }

       if (empty($password_2)) {
            array_push($errors, "Please confirm your password");
       }

       if (empty($email)) {
            array_push($errors, "E-mail cannot be empty");
       }

       if ($password_1 != $password_2) {
            array_push($errors, "Passwords do not match");
       }

       if (count($errors) == 0) {
           $password = md5($password_1); // databaseye aktarmadan önce şifreleme
           $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
           mysqli_query($db, $sql);
           $_SESSION['username'] = $username;
           $_SESSION['success'] = "You are now logged in!";
           header('location: index.php'); // giriş yaptıktan sonra yönlendirme 
       }
    }

    // log in

    if (isset($_POST['login'])) {
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username cannot be empty");
       }

       if (empty($password)) {
           array_push($errors, "Password cannot be empty");
      }

      if (count($errors) == 0) {
          $password = md5($password); // databasedeki şifreyle karşılaştırmadan önce passwordu şifreleyip aynı durum getiriyor
          $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) == 1) {
              
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in!";
            header('location: index.php'); // giriş yaptıktan sonra yönlendirme 
          }
          else {
              array_push($errors, "The username/password doesnt exist.");
              //header('location: login.php');
          }
      }
    }



    // çıkış yapma
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>