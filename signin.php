<!DOCTYPE html>
<html>
<head>
  <title>Login to your account</title>
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
  <link rel="stylesheet" type='text/css' href="./css/signin.css">
</head>
<body>
      <div class="signin-form">
          <form action="" method="post">
              <div class="form-header">
                  <h2>Sign in </h2>
                  <p>Login to ChatApp</p>
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="youremail@site.com"
                  autocomplete="off" required>
              </div>

              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Your password"
                  autocomplete="off" required>
              </div>
              <div class="small">Forgot password<a href="forgot_pass.php">Click here</a></div><br>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Sign in</button>
              </div>
              <?php include("signin_user.php"); ?> 
          </form>
              <div class="text-center small" style="color:#647288;">Dont have an account yet xD ? <a href="signup.php">Create one </div>
        </div>
</body>
</html>
