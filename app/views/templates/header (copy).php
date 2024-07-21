<?php
if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}
?>
  
<!DOCTYPE html>
<html lang="en">
  <div class= "head">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
    </head>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">COSC 4806</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/reminders"> Reminders</a>
        </li>
        <?php
        //print_r($_SESSION);

        if (!isset($_SESSION['auth'])) {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='/rlogin'> login</a>";
            echo "</li>";
        }else{
          echo "<li class='nav-item'>";
          echo "<a class='nav-link disabled' colour='green' > hello " . $_SESSION['username'] ."</a>";
          echo "</li>";
        }


        ?>
        
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>