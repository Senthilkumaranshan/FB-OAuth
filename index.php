<?php

require './login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>OAuth Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php if(isset($_SESSION['access_token'])) : ?>

<div class="jumbotron text-center">
  <h1><?php echo "Hi, ",$user->getField('name'); ?></h1><br>
    <img src="<?php echo "//graph.facebook.com/",$user->getField('id'),"/picture" ?>">
  <h4>Click Below Link to Logout</h4>
  <p><a class="button" href="logout.php"> Logout</a></p> 
</div>

<?php else : ?>

<div class="jumbotron text-center">
  <h1>Click Below Link to Login with Facebook</h1>
  <p><a class="button" href="<?php echo $login_url; ?>"> Login with Facebook</a></p> 
</div>
  
<?php endif; ?>

</body>
</html>

