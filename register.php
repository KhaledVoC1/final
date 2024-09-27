<?php  
if (isset($_POST['submit'])) {
 
  $con = mysqli_connect('localhost', 'root', '', '123');
  
 
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

   function check($var) {
    $var = trim($var);
    $var = strip_tags($var);
    return $var;
  }

 
  $Name = check($_POST['name']);
  $Email =check($_POST['email']) ;
  $Number = preg_match('/^[0-9]{10,15}$/', $_POST['number']) ? check($_POST['number']) : null;
  $Password = check($_POST['password']);

 
  if (!$Email || !$Number) {
    echo "<script>alert('Invalid email or phone number'); window.location.href = 'register.php';</script>";
    exit();
  }


  $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

 
  $query = "SELECT * FROM tbluser WHERE Email = '$Email' OR UserName = '$Name'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('This email or username is already taken'); window.location.href = 'register.php';</script>";
  } else {
   
    $query = "INSERT INTO tbluser (UserName, Email, Number, Password) 
              VALUES ('$Name', '$Email', '$Number', '$Password')";
    $result = mysqli_query($con, $query);

    if ($result) {
      echo "<script>alert('Register successfully'); window.location.href = 'register.php';</script>";
    } else {
      echo "Error: " . mysqli_error($con);
    }
  }

 
  mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-2K3X0GvJ4J4Kl3O54v3pIHsTeYfE6d1a9uZLftXkBxgk6F68nE9V5kFdbPfUEN0Z" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1539363943468-f66a37f09a17?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: sans-serif;
    }

    .card {
      border-radius: 1rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      width: 100%;
      padding: 2rem;
    }

    .card-header {
      background-color: #17a2b8;
      color: white;
      text-align: center;
      padding: 1rem;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      font-size: 1.5rem;
    }

    .form1 {
      margin-bottom: 1rem;
    }

    .form-control {
      border-radius: 0.5rem;
      padding: 0.75rem 1.25rem;
      font-size: 1rem;
      width: 90%;

    }

    .btn-custom {
      background-color: #17a2b8;
      color: white;
      border: none;
      border-radius: 0.5rem;
      padding: 0.75rem 1.5rem;
      transition: all 0.3s ease-in-out;
    }

    .btn-custom:hover {
      background-color: #138496;
    }

    .footer-text {
      text-align: center;
      margin-top: 1rem;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="card-header">
      User Registration
    </div><br>
    <div class="card-body">
      <form action="insert.php" method="POST">
        <div class="form1">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form1">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form1">
          <label for="number" class="form-label">Number</label>
          <input type="number" class="form-control" id="number" name="number" placeholder="Enter your number" required>
        </div>
        <div class="form1">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-custom w-100">Register</button>
      </form>
      <div class="footer-text">
        <a href="login.php" class="btn btn-outline-light w-100 mt-2">Already have an account?</a>
      </div>
    </div>
  </div>
</body>

</html>