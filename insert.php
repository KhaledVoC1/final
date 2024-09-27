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
