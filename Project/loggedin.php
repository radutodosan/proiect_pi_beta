<?php
session_start();

  include("connection.php");
  include("functions.php");

  function check_string($my_string){
    $regex = preg_match('[@_!#$%^&*()<>?/|}{~:]', $my_string);
    if($regex)
       return false;
    else
       return true;
  }

  if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['cantitate'] == null){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && check_string($password) && check_string($user_name)){

        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result){
          if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] == $password){
              $_SESSION['id'] = $user_data['id'];
              header("Location: index1.php");
              die;
            }
          }
        }
    }
    else{
      //header("Location: index1.php");
      echo '<script>alert("Please enter some valid information!")</script>';
    }
  }

?>