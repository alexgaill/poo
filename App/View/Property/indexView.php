
    <div class="recherche mt-5"></div>
    <div class="affichage mt-5 justify-content-around">

    <?php foreach ($biens as $bien) : ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://fakeimg.pl/300x200/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $bien->title ?></h5>
                <div class="card-text">
                    <p>Code Postal: <?= $bien->postalCode ?></p>
                    <p>Surface: <?= $bien->surface ?>m2</p>
                    <p>Type: <?= $bien->type ?></p>
                </div>
                <a href="index.php?page=singleProperty&id=<?= $bien->id ?>" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    <?php endforeach ?>
    </div>