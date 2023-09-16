<div class="col-md-3 my-1">
    <div class="card">
        <img src="<?=$imagePath = 'uploads/annonces/' . $row['image'];?>" class="card-img-top" alt="<?=$row['title']?>"
            width="200" height="200">

        <div class="card-body">
            <h5 class="card-title"><?= $row["mark"].' '.($row["title"]) ?></h5>
            <p class="card-text bold"><?= ($row["price"]) ?></p>
            <p class="card-text"><?= ($row["content"]) ?></p>
            <p class="card-text"><?= ($row["km"]) ?></p>
            <a href="annonce.php?id=<?=$row["id"]?>" class="btn btn-primary">Lire la suite</a>
        </div>
    </div>
</div>