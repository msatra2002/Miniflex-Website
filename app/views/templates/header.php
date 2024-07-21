<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="/favicon.png">
    <title>Miniflix</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="/home">
                <img src="https://cloudinary-res.cloudinary.com/image/upload/v1521663307/MiniFlix-Logo_620x180.png" alt="Netflix" width="112" height="28">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/"></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php
                    unset($_SESSION['auth']);
                    //$_SESSION['auth'] =1;
                    if (!isset($_SESSION['auth'])) {
                        echo "<li class='nav-item'>";
                        echo "<a class='btn btn-danger' href='/login'>login</a>";
                        echo "</li>";
                    } else {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link disabled' style='color: white;'>hello, " . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . "!</a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
