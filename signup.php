<!DOCTYPE html>
<html>
<head>
  <title>Create new account</title>
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
  <link rel="stylesheet" type='text/css' href="css/signup.css">
</head>
<body>
      <div class="signup-form">
          <form action="" method="POST">
              <div class="form-header">
                  <h2>Sign up </h2>
                  <p>Fill out this form and start chatting with your friends </p>
              </div>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="user_name" placeholder="Example: Minh Phuong" autocomplete="off" required>
              </div>

              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="user_pass" placeholder="Password"
                  autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="user_email" placeholder="duyvippro@email.com"
                  autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Country</label>
                    <select class="form-control" name="user_country">
                        <option disabled="">Select your country</option>
                        <option>Viet Nam</option>
                        <option>USA</option>
                        <option>France</option>
                        <option>China</option>
                    </select>
              </div>
              <div class="form-group">
                  <label>Gender</label>
                    <select class="form-control" name="user_gender">
                        <option disabled="">Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</options>

                    </select>
              </div>
              <div class="form-group">
                  <label class="checkbox-inline"><Input type="checkbox" required> I accept  the<a href="#"> Term of Uses </a> &amp;<a href="#">Private Policy </a> </a> <label>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button> 
                </div>
              <div class="small">Forgot password<a href="forgot_pass.php">Click here</a></div><br>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Sign in</button>
              </div>
              </form>
              <?php include "./signup_user.php"; ?> 
          
              <div class="text-center-small" style="color:#647288;">Already have an account? <a href="signin.php">Sign in here</div>
        </div>
</body>
</html>