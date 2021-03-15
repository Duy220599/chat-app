<!DOCTYPE  html>
<?php
session_start();
include("find_friends_function.php");
?>
<html>
<head>
    <title> Search for friend
            </title>
            <meta charset="utf-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" type='text/css' href="css/find_people.css">

</head>
<body>
        <nav class="navbar-brand" href="#">
            <a class="navbar-brand" href="#">
                <?php 
                    $user = $_SESSION['user_email'];
                    $get_user="select *from users where user_email='$user'";
                    $run_user=mysqli_query($connection,$get_user);
                    $row=mysqli_fetch_array($run_user);
                    $user_name=$row['user_name'];
                    echo"<a href='../home.php?user_name=$user_name'>Mychat</a>";

                ?>
                <ul class="navbar-nav">
                    <li><a style="color:white;text-decoration:none;font-size:20px;"href="../account_settings.php">Setting</a></li>
                </ul>
            </a>

        </nav><br>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <form class="search-form" action="">
                    <input  type="text" name="search_query" place_holder="Search Friends" autocomplete="off" required>
                    <button class="btn" type="submit" name="search_btn">Search</button>
                </form>
            </div>
            <div class="col-sm-4">
            </div><br></br>
            <?php search_user(); ?>
        </div>
</body>
</html>