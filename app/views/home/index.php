<?php require_once 'app/views/templates/header.php' ?>
<style>
    .head {
      position: fixed;
      top: 0;
      width: 100%;
    }


@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap");



body {
    text-align: center;
  
  min-height: 100vh;
  display: grid;
  align-content: center;
  
  font-family: "Poppins", sans-serif;
  
  
    h1 {
      text-align: center;
    }
    


    </style>
<body>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Welcome</h1>
                <p class="lead" > <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div >
        <div >
            <p> <a href="/logout">Click here to logout</a></p>
        </div>
    </div>
    </body>

    <?php require_once 'app/views/templates/footer.php' ?>
