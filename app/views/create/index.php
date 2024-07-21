<?php require_once 'app/views/templates/headerPublic.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Create an Account</h1>
            </div>
        </div>
    </div>

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
      <button type="submit" class="btn btn-primary">
          Register here
      </button>
    </fieldset>
    </form> 
  </div>
</div>
    <?php require_once 'app/views/templates/footer.php' ?>