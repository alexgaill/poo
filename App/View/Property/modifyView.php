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
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=newProperty">Nouveau <span class="sr-only">(current)</span></a>
            </li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-5">
    <form action="index.php?page=saveModifyProperty&id=<?= $bien->id ?>" method="POST">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $bien->title ?>">
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $bien->address ?>">
        </div>
        <div class="form-group">
            <label for="postalCode">Code postal</label>
            <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?= $bien->postalCode ?>">
        </div>
        <div class="form-group">
            <label for="surface">Surface</label>
            <input type="number" class="form-control" id="surface" name="surface" value="<?= $bien->surface ?>">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type"  value="<?= $bien->type ?>">
                <option value="1">Appartement</option>
                <option value="2">Maison</option>
            </select>
        </div>
        <div class="form-group">
            <label for="floor">Etage</label>
            <input type="number" class="form-control" id="floor" name="floor" value="<?= $bien->floor ?>">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    </div>
</body>
</html>