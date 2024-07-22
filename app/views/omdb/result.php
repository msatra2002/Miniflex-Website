<?php require_once 'app/views/templates/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #141414;
            color: #fff;
        }
        .container {
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            color: #e50914;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            padding: 5px 0;
        }
        .btn-primary {
            background-color: #e50914;
            border-color: #e50914;
        }
        .btn-primary:hover {
            background-color: #f40612;
            border-color: #f40612;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Movie Details</h1>
        <?php if ($data['movie'] && $data['movie']['Response'] !== 'False'): ?>
            <ul>
                <li><img src="<?php echo htmlspecialchars($data['movie']['Poster']); ?>" alt="<?php echo htmlspecialchars($data['movie']['Title']); ?> Poster" class="img-fluid"></li>
                <li><strong>Title:</strong> <?php echo htmlspecialchars($data['movie']['Title']); ?></li>
                <li><strong>Year:</strong> <?php echo htmlspecialchars($data['movie']['Year']); ?></li>
                <li><strong>Director:</strong> <?php echo htmlspecialchars($data['movie']['Director']); ?></li>
                <li><strong>Actors:</strong> <?php echo htmlspecialchars($data['movie']['Actors']); ?></li>
                <li><strong>Plot:</strong> <?php echo htmlspecialchars($data['movie']['Plot']); ?></li>
                <li><strong>AI Review:</strong> <?php echo htmlspecialchars($_SESSION['review']);?></li>
            </ul>
        <?php else: ?>
            <p>Movie not found.</p>
        <?php endif; ?>
        <form action="/omdb/rate" method="post" class="mb-3">
                <div class="btn-group btn-group-custom" role="group" aria-label="Basic example">
                    Rate This Movie:  
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <input type="hidden" name="rating" value="<?php echo $i; ?>">
                        <button type="submit" class="btn btn-primary"><?php echo $i; ?></button>
                    <?php } ?>
                </div>
            </form>
        <a href="/omdb" class="btn btn-primary">Search Again</a>
    </div>
</body>
</html>
<?php require_once 'app/views/templates/footer.php' ?>
