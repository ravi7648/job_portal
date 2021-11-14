<?php

include 'db_connection.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['pnumber'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];

    if($password != $confirm_password){
        echo "<script>alert('Password is not matching!');location.href='Register.php'</script>";
    }
    else{
        $conn = OpenCon();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $check_email = mysqli_query($conn, "SELECT email FROM users where email = '$email' ");
        if(mysqli_num_rows($check_email) > 0){
            echo "<script>alert('Users already exists!');location.href='login.php'</script>";
        }
        else
        {
            if(!empty($name) || !empty($email) || !empty($pnumber) || !empty($password)){
                $insert="INSERT INTO users SET name='".$name."',email='".$email."',phone='".$phone."',password='".$hash."'";
                $res=mysqli_query($conn,$insert);
                  if($res){
                      echo "<script>alert('Successfully registered!');location.href='index.php'</script>";
                  }
                  else{
                      echo "<script>alert('Some error occured, please register again!');location.href='Register.php'</script>";
                  }
              }
        }
        CloseCon($conn);
    }
}
?>