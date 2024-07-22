<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Floating Label Input</title>
	<style>
			@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap");

			*,
			*::before,
			*::after {
					box-sizing: border-box;
			}

			body {
					font-family: 'Poppins', sans-serif;
					display: flex;
					justify-content: center;
					align-items: center;
					height: 100vh;
					margin: 0;
					background-color: #141414; /* Dark background */
					color: #fff; /* Light text color */
			}

			.form-field {
					position: relative;
					margin: 30px 0;
					width: 300px; /* Adjusted width for better appearance */
			}

			.form-field input {
					width: 100%;
					padding: 10px;
					font-size: 16px;
					border: 2px solid #333; /* Darker border */
					border-radius: 5px;
					background-color: #333; /* Darker background */
					color: #fff; /* Light text color */
					transition: border-color 0.3s;
					outline: none;
			}

			.form-field input:focus {
					border-color: #e50914; /* Netflix red on focus */
			}

			.form-field label {
					position: absolute;
					top: 0;
					left: 0;
					padding: 10px;
					font-size: 16px;
					color: #999;
					pointer-events: none;
					transition: all 0.3s ease;
			}

			.form-field input:focus + label,
			.form-field input:not(:placeholder-shown) + label {
					top: -25px;
					left: 0;
					padding: 0 5px;
					font-size: 12px;
					color: #e50914; /* Netflix red */
			}

			.button {
					position: relative;
					padding: 1em 1.5em;
					border: none;
					background-color: #e50914; /* Netflix red */
					color: #fff;
					cursor: pointer;
					outline: none;
					font-size: 18px;
					margin: 1em 0.8em;
					border-radius: 5px;
					transition: background-color 0.3s ease;
			}

			.button:hover {
					background-color: #f40612; /* Lighter red on hover */
			}

			.container {
					display: flex;
					flex-direction: column;
					align-items: center;
			}

			a {
					color: #e50914; /* Netflix red */
					text-decoration: none;
					margin-top: 15px;
			}

			a:hover {
					text-decoration: underline;
			}
	</style>
</head>
<body>
	<?php
	// Display error messages if they exist
	if (isset($_SESSION['failedAuth']) && !empty($_SESSION['failedAuth'])) {
		 echo "<p style='color: red;'>" . $_SESSION['failedAuth'] . "</p>";
	}
		if (isset($_SESSION['lastFailedAuthTime']) && 		 
						!empty($_SESSION['lastFailedAuthTime'])) {
			echo "<p style='color: red;'>" . $_SESSION['error_message'] . $_SESSION['lastFailedAuthTime'] . "</p>";
		}
		if ($_SESSION['failedAuth'] > 3){
			echo "<p style='color: red;'>" . $_SESSION['error_message'] . "</p>";

		}
	?>
<form action="/login/verify" method="post" >
<div class="form-field">
	
		<input type="text" id="name" placeholder=" " name = "username" required>
		<label for="username">Username</label>
</div>
	<div class="form-field">

			<input type="password" id="name" placeholder=" " name = "password" required> 
			<label for="password">password</label>
		
	</div>
	<div class="container">
	<button type= " submit "class="button type2">login!</button>
		<a href="/create">Create an account ?</a>
		</div>
	</form>
	

</body>
</html>