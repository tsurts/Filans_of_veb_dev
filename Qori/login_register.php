<?php  include('fun/style_for_register.php'); ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up / Login Form</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post" action="fun/check.php">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="n" placeholder="User name" required="">
					<input type="email" name="g" placeholder="Email" required="">
					<input type="password" name="pas" placeholder="Password" required="">
					<button type="submit" name="signup" value="signup">Sign up</button>
                    <a href="index.php">Home</a>
					
				</form>
			</div>

			<div class="login">
				<form method="post" action="fun/check.php">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="g" placeholder="Email" >
					<input type="password" name="pas" placeholder="Password" >
					<button type="submit" name="login" value="login">Login</button>
				
				</form>
				<a href="index.php">Home</a>
			</div>
	</div>
</body>
</html>

  
</body>
</html>
