<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <meta name="viewport" content="width-device-width, initial-scale-1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      background-image: url("poster.jpg");
      background-size: cover;
    }

    form {
      background-color: #fff;
      margin-top: 5em;
      margin-bottom: 3em;
      margin-left: 30em;
      margin-right: 5em;
      padding: 30px;
      box-shadow: 10px 10px 8px 10px #888888;

    }
  </style>
  <title>Register</title>
</head>

<body>
  <div class="container">
    <form action="registeration.php" method="POST">

      <div class="mb-3">
        <label for="exampleInputName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputName" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="pnumber" name="pnumber">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">submit</button>
      <br>
      Already have an account? <a style="text-decoration:none" href="index.php">Login</a>

    </form>
  </div>
</body>

</html>