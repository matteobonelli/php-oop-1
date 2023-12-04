<div class="col-12 col-md-3 col-lg-3">
    <div class="card" style="width: 18rem;">
        <img src="<?= $image ?>" class="card-img-top" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text overflow-y-auto">
                <?= $descr ?>
            </p>
            <h5>
                <?= $genre ?>
            </h5>
            <div class="d-flex justify-content-between ">
                <div>
                    <div>
                        <?= $lang ?>
                    </div>
                    <small>
                        <?= $release ?>
                    </small>
                </div>
                <div class="text-warning">
                    <?= $vote ?>
                </div>
            </div>

        </div>
    </div>
</div>