<?php
require_once('dbhelp.php');

$s_fullName = $s_age = $s_address = '';

if (isset($_POST["submit"])) {

  if (isset($_POST['id'])){
    $s_id=$_POST['id'];
  }

  if (!empty($_POST['fullName'])) {
    $s_fullName = $_POST['fullName'];
  }
  if (isset($_POST['age'])) {
    $s_age = $_POST['age'];
  }
  if (isset($_POST['address'])) {
    $s_address = $_POST['address'];
  }

  $s_fullName = str_replace('\'', '\\\'', $s_fullName);
  $s_age = str_replace('\'', '\\\'', $s_age);
  $s_address = str_replace('\'', '\\\'', $s_address);
  $s_id = str_replace('\'', '\\\'', $s_id);



if($s_id!=''){
  //update
  $sql="UPDATE student SET fullName='$s_fullName', age='$s_age', address='$s_address' WHERE id=".$s_id;
  execute($sql);
  //echo $sql;
 
} else{
  //insert
  if(!empty($s_fullName)){
    //echo $sql;
   
  } else {
    echo "Sai";
    exit();
  }
 
}
header('Location: index.php');
die();

  
 
}
  $id='';
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql='SELECT *FROM student WHERE id= '.$id;
    $studentList=executeResult($sql);
    if($studentList!=NULL&&count($studentList)>0){
      $std= $studentList[0];
      $s_fullName= $std['fullName'];
      $s_age= $std['age'];
      $s_address= $std['address'];
    } else {
      $id='';
    }
  }

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Add Student</h2>
    <form method="POST">
      <div class="form-group">
        <label for="usr">Name:</label>
        <input type="number" name='id'  value="<?=$id?>" style="display: none;" >
        <input type="text" class="form-control" id="name" name='fullName'  value="<?=$s_fullName?>">
      </div>
      <div class="form-group">
        <label for="age">age:</label>
        <input type="number" class="form-control" id="pwd" name='age'  value="<?=$s_age?>">
      </div>
      <div class="form-group">
        <label for="address">address:</label>
        <input type="text" class="form-control" id="adr" name='address' value="<?=$s_address?>">
      </div>
      <button type="submit" name='submit' class="btn btn-default">Submit</button>
    </form>
  </div>

</body>

</html>