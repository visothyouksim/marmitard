<div class="container my-5 d-flex flex-wrap gap-3 justify-content-center">
    <?php foreach ($recettes as $recette) { ?>
        <div class="card w-25" style="width: 18rem;">
            <img src="imgs/<?= $recette['image'] ?>" class="card-img-top w-100" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center text-primary" style="font-weight: bold"><?= $recette['titre_recette'] ?></h5>
                <p class="card-text text-center">Publié par : <?= $recette['nom_auteur'] . ' ' . $recette['prenom_auteur'] ?></p>
                <em class="card-subtitle mb-2 text-muted d-block text-center"><?= $recette['nom_categorie'] ?></em>
                <p class="card-text"><?= substr($recette['description'], 0, 250) ?>... </p>
                <a href="#" class="btn btn-primary">Afficher la recette</a>
                <span class="float-end">
                    <a href="?url=like&id_recette=<?= $recette['id_recette'] ?>&id_user=<?= $recette['id_user'] ?>"><i class="fa-solid fa-heart"></i></a>
                    <?= $recette['nbr_like'] ?> Likes
                    <p>Note : <?= ceil($recette['note']) ?><br>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" name="a_noter" value="<?= $recette['id_recette'] ?>">
                            Noter
                        </button>
                    </p>
                </span>
            </div>
        </div>
    <?php } ?>
</div>


<!-- Modal Noter -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?url=note" method="post">
                    <div class="form-group">
                        <input type="text" name="id_recette" value="<?= $recette['id_recette'] ?>" hidden class="form-control">
                        <input type="number" max="10" min="1" class="form-control" name="a_noter">
                    </div>
                    <button class="btn btn-primary float-end mt-3">Noter</button>
                </form>
            </div>
        </div>
    </div>
</div>