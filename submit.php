<?php
include 'db_connection.php';
if(isset($_POST['submit'])){
    $cname=$_POST['cname'];
    $position=$_POST['position'];
    $job_description=$_POST['job_description'];
    $skill=$_POST['skill'];
    $ctc=$_POST['ctc'];
    $name = $_GET['name'];
    $login = $_GET['data'];
    $conn = OpenCon();

   if(!empty($cname) || !empty($position) || !empty($job_description) || !empty($skill) || !empty($ctc)){
        $insert="INSERT INTO placement SET company_name='".$cname."',position='".$position."',job_description='".$job_description."',skills='".$skill."',ctc='".$ctc."'";
        $res=mysqli_query($conn,$insert);
          if($res){
              echo "<script>alert('Successfully posted!');location.href='session.php?data=$login&&name=$name'</script>";
          }
          else{
              echo "<script>alert('Some error occured, please try again!');location.href='home.php'</script>";
          }
      }
    
    CloseCon($conn);
}
?>