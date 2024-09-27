<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    
    body {
      background: url('https://images.unsplash.com/photo-1539363943468-f66a37f09a17?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Arial', sans-serif;
      color: #333;
    }

    
    .form-container {
      width: 400px;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .form-container h2 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #17a2b8;
    }

  
    label {
      display: block;
      margin-bottom: 5px;
      font-size: 16px;
      text-align: left;
      color: #555;
    }

    
    input {
      width: 90%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
    }

    
    button {
      width: 100%;
      padding: 12px;
      background-color: #17a2b8;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      color: white;
      cursor: pointer;
    }

    button:hover {
      background-color: #138496;
    }

    
    .form-container a {
      text-decoration: none;
      color: #17a2b8;
      font-size: 14px;
      display: block;
      margin-top: 10px;
    }
    
    .form-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Login</h2>
    <form action="content.php" method="POST">
      <div>
        <label for="name">Name</label>
        <input type="text" id="name"  name="name" placeholder="Enter your name" required>
      </div>
      <div>
        <label for="password" >Password</label>
        <input type="password" id="password"  name="password" placeholder="Enter your password" required >
      </div>
      <button type="submit">Login</button>
    </form>

    <a href="register.php">don't have account? register</a>
  </div>
</body>
</html>
