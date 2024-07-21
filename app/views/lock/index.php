<?php require_once 'app/views/templates/headerPublic.php'?>
<!DOCTYPE html>
    <main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>LOG IN!</h1>
            </div>
        </div>
    </div>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="/lock/verify" method="POST">   
        <p><?php echo htmlspecialchars($_SESSION['error_message']); ?></p>
        <?php sleep(60);?>
        <p><a href="/login">Try Again</a></p>
        </form>
    </div>
</body>
</html>