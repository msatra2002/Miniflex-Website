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
		margin: 0;
		padding: 0;

	}
		/* Basic styling for the body */
		body {
				font-family: 'Poppins', sans-serif;
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
				margin: 0;
				
		}

		/* Styling for the container of the input field */
		.form-field {
				position: relative;
				margin: 30px 0;
		}

		/* Style adjustments for the input field */
		.form-field input {
				width: 100%;
				padding: 10px;
				font-size: 16px;
				border: 2px solid #ccc;
				border-radius: 5px;
				transition: border-color 0.3s;
				outline: none; /* Removes the default focus highlight */
		}

		/* Focus state for the input field */
		.form-field input:focus {
				border-color: #4CAF50; /* Changes border color on focus */
		}

		/* Label styling */
		.form-field label {
				position: absolute;
				top: 0;
				left: 0;
				padding: 10px;
				font-size: 16px;
				color: #999;
				pointer-events: none; /* Allows click to go through the label */
				transition: all 0.3s ease;
		}

		/* Moving the label up when the input is focused or filled */
		.form-field input:focus + label,
		.form-field input:not(:placeholder-shown) + label {
				top: -25px;
				left: 0;
				
				padding: 0 5px;
				font-size: 12px;
				color: #4CAF50;
		}
	/* for the cool button */
	/* Styling for the button */
	/* Basic styling for button */
	.button {
		position: relative;
		padding: 1em 1.5em;
		border: none;
		background-color: transparent;
		cursor: pointer;
		outline: none;
		font-size: 18px;
		margin: 1em 0.8em;
	}
	.button.type2 {
		color: #4CAF50;
	}
	.button.type2.type2:after, .button.type2.type2:before {
		content: "";
		display: block;
		position: absolute;
		top: 100%;
		left: 0;
		width: 100%;
		height: 2px;
		background-color: #4CAF50;
		transition: all 0.3s ease;
		transform: scale(0.85);
	}
	.button.type2.type2:hover:before {
		top: 0;
		transform: scale(1);
	}
	.button.type2.type2:hover:after {
		transform: scale(1);
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