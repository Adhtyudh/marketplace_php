<?php


include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['insert'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($koneksi, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['name'];

    header("Location: index.php");
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("Tidak Ditemukan")';
    echo '</script>';
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="Assets/Style/logins.css">

  <title>login perpustakaan</title>
</head>

<body>
  <div class="global-container">
    <div class="card login-form">
      <div class="card-body">
        <h1 class="card-title text-center text-info">Login</h1>
      </div>
      <div class="card-text">
        <form action="" method="post">
          <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input class="input_auth" type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3 row">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input class="input_auth" type="password" class="form-control" name="password" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <button type="submit" name="insert" class="btn btn-success">Login</button>
          </div>
        </form>

        <a href="register.php">
          <button type="button" class="btn btn-primary">Register</button>
        </a>


      </div>
    </div>
  </div>

</body>

</html>