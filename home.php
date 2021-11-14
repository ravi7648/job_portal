<?php
  $login = $_GET['data'];
  $name = $_GET['name'];
    if(!$login)
    {
      echo "<script>location.href='index.php'</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css" integrity="sha512-f2MWjotY+JCWDlE0+QAshlykvZUtIm35A6RHwfYZPdxKgLJpL8B+VVxjpHJwZDsZaWdyHVhlIHoblFYGkmrbhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <style>
      .sidebar {
    margin: 0;
    margin-top: -2px;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
  }
    .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
  }
    .sidebar a.active {
    background-color: #04AA6D;
    color: white;
  }
    .sidebar a:hover:not(.active) {
    background-color: #555;
    color: white;
  }
    div.content {
    margin-top: 60px;
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
  }
    @media screen and (max-width: 700px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
    }
    .sidebar a {float: left;}
    div.content {margin-left: 0;}
  }
    @media screen and (max-width: 400px) {
    .sidebar a {
      text-align: center;
      float: none;
    }
  }
  .navbar{
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
  }
    </style>
</head>
<body>
  <div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo "Admin: $name"?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    </div>
  </div>
</nav>
<div class="sidebar">
  <a class="active" href="#index.php">Jobs</a>
  <a href="#job.php">Candidate Applied</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>

</div>

<div class="content">
  <p>
    <!-- <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>--->
  <div style="display: flex; justify-content: space-between">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Post Job
    </button>
    <button class="btn btn-primary" type="button" onclick="location.href='index.php';">
      Logout
    </button>
</div>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <form action=<?php echo "submit.php?data=$login&&name=$name"?> method="POST">
        <div class="mb-3">
          <label for="cname" class="form-label">Company Name</label>
          <input type="text" class="form-control" id="cname" name="cname">
        </div>
        <div class="mb-3">
          <label for="position" class="form-label">Position</label>
          <input type="text" class="form-control" id="position" name="position">
        </div>
        <div class="mb-3">
          <label for="job_description" class="form-label">Job Description</label>
          <textarea name="job_description" id="job_description" cols="30" rows="10" class="form-control" name="Job Description"></textarea>
        </div>
        <div class="mb-3">
          <label for="skill" class="form-label">skills</label>
          <input type="text" class="form-control" id="skill" name="skill">
        </div>
        <div class="mb-3">
          <label for="ctc" class="form-label">CTC</label>
          <input type="text" class="form-control" id="ctc" name="ctc">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">S.No.</th>
        <th scope="col">Company Name</th>
        <th scope="col">Position</th>
        <th scope="col">CTC(in  LPA)</th>
      </tr>
    </thead>
    <tbody>

      <?php

      include "db_connection.php";
      $conn = OpenCon();

      $records = mysqli_query($conn, "select * from placement");

      while ($data = mysqli_fetch_array($records)) {
      ?>
        <tr>
          <th scope="row"><?php echo $data['id']; ?></th>
          <td><?php echo $data['company_name']; ?></td>
          <td><?php echo $data['position']; ?></td>
          <td><?php echo $data['ctc']; ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php CloseCon($conn);
  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>