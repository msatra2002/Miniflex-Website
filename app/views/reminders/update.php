<?php require_once 'app/views/templates/header.php' ?>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Update Reminder</title>
      <!-- Include Bootstrap CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
      <div class="container mt-5">
          <div class="page-header" id="banner">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="display-4">Update Reminder</h1>
                      <p><a href="/reminders/index" class="btn btn-primary">Back to reminders</a></p>
                      <p class="text-muted"><s><?php echo htmlspecialchars($data['subject']); ?></s></p>
                      <form action="/reminders/rechange" method="post">
                          <div class="form-group">
                              <label for="subject">Subject</label>
                              <input type='hidden' name='id' value='<?php echo htmlspecialchars($data['reminder_id']); ?>'>
                              <input required type="text" class="form-control" name="subject2" placeholder="<?php echo htmlspecialchars($data['subject']); ?>">
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <!-- Include Bootstrap JS and dependencies -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

<?php require_once 'app/views/templates/footer.php' ?>