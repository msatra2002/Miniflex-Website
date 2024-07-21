<?php require_once 'app/views/templates/header.php' ?>
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">reminders</li>
  </ol>
</nav>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap");
    body {
      --color: rgba(30, 30, 30);
      --bgColor: rgba(245, 245, 245);
      
      display: grid;
      align-content: center;
      gap: 2rem;

      font-family: "Poppins", sans-serif;
      color: var(--color);
      background: var(--bgColor);
    }

    h1 {
      text-align: center;
    }

</style>
<div class="container" >
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1> Create a new Reminder</h1>

              <form action="/reminders/change" method="post" >
              <fieldset>
                <div class="form-group">
                  <label for="subject">subject </label>
                  <input required type="text" class="form-control" name="subject">
                </div>
                      <br>
                  <button type="submit" class="btn btn-primary">Create</button>
              </fieldset>
              </form>
                 
            </div>
        </div>
    </div>
  <br>
  <p><a href="/reminders/index" class="btn btn-primary">Back to reminders</a></p>
    <?php
    
    

    ?>

    <?php require_once 'app/views/templates/footer.php' ?>
