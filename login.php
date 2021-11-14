<?php
include 'db_connection.php';
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $_SESSION['loggedIn'] = false;
    $password=$_POST['password'];
    $email = stripcslashes($email);  
    $password = stripcslashes($password); 
    $conn = OpenCon(); 
    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password); 

   if(!empty($email) && !empty($password)){
       $hash = mysqli_query($conn, "select * from users where email='$email'");
       $data = mysqli_fetch_array($hash);
       $count = mysqli_num_rows($hash);
       if($count == 1){
           $hash = $data['password'];
           $verify = password_verify($password, $hash);
           $name = $data['name'];
           if($verify){
               $login = true;
               echo "<script>alert('Welcome $name!');location.href='session.php?data=$login&&name=$name'</script>";
           }
           else{
               echo "<script>alert('Wrong Password!');location.href='index.php'</script>";
            }
       }
       else{
           echo "<script>alert('Invalid email, Please create account!');location.href='index.php'</script>";
       }
    }
    else{
        echo "<script>alert('All fields are mandatory!');location.href='index.php'</script>";
    }
    
    CloseCon($conn);
}
?>

