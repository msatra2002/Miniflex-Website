<?php require_once 'app/views/templates/header.php' ?>
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
<body>
    <div class="container mt-5">
        <h1>Search for a Movie</h1>
        <form action="/omdb/search" method="POST">
            <div class="mb-3">
                <label for="movie_name" class="form-label">Movie Name</label>
                <input type="text" class="form-control" id="movie_name" name="movie_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</body>
<?php require_once 'app/views/templates/footer.php' ?>