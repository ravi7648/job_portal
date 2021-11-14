<?php
    $login = $_GET['data'];
    $name = $_GET['name'];
    echo $name;
    if($login)
    {
        echo "<script>location.href='home.php?data=$login&&name=$name'</script>";
    }
    else{
        echo "<script>location.href='index.php'</script>";
    }
    
 
  ?>