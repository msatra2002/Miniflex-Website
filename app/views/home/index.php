<?php require_once 'app/views/templates/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Rated Movies</title>
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
        <h1>User Rated Movies</h1>
        <?php if (!empty($data['ratedMovies'])): ?>
            <ul>
                <?php foreach ($data['ratedMovies'] as $movie): ?>
                    <li>
                        <strong>Title:</strong> <?php echo htmlspecialchars($movie['movie_title']); ?><br>
                        <strong>Rating:</strong> <?php echo htmlspecialchars($movie['rating']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No rated movies found.</p>
        <?php endif; ?>
        <a href="/omdb" class="btn btn-primary">Search Again</a>
    </div>
</body>
</html>
    <?php require_once 'app/views/templates/footer.php' ?>
