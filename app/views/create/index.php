<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Create an Account</h1>
            </div>
        </div>
    </div>
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

<div class="row">
    <div class="col-sm-auto">
    <form action="/create/verify" method="post" >
    <fieldset>
      <div class="form-group">
        <label for="username">Username</label>
        <input required type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" class="form-control" name="password">
      </div>
        <div id="password-rules">
            <p>Password must contain:</p>
            <ul>
                <li id="length" class="invalid">At least 8 characters</li>
                <li id="uppercase" class="invalid">At least one uppercase letter</li>
                <li id="number" class="invalid">At least one number</li>
                <li id="special" class="invalid">At least one special character</li>
            </ul>
        </div>
      <!-- <div class="form-group">
        <label for="confirm_password">Password</label>
        <input required type="password" class="form-control" name="confirm_password">
      </div> -->
      <br>
      <button type="submit" class="btn btn-danger">
          Register here
      </button>
    </fieldset>
    </form> 
  </div>
</div>
    <?php require_once 'app/views/templates/footer.php' ?>