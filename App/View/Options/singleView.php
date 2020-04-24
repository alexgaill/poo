<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=newProperty">Nouveau</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=newOption">Nouvelle option <span class="sr-only">(current)</span></a>
            </li>
            </ul>
        </div>
    </nav> <!-- liens de notre site-->
    
    <div class="recherche mt-5"></div>
    <div class="affichage mt-5 justify-content-around">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://fakeimg.pl/300x200/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $option->name ?></h5>

                <a href="index.php?page=modifyOptions&id=<?= $option->id ?>" class="btn btn-primary">Modifier</a>
                <a href="index.php?page=deleteOptions&id=<?= $option->id ?>" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>
</body>
</html>