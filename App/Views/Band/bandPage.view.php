<?php /** @var Array $data */ ?>

<div class="row">
    <div class="band-col">
        <div class="text-box-band">
            <h1><?= $data['band']->getName() ?></h1>
            <br>
            <h3>Bio</h3>
            <p class="band-info"><?= $data['band']->getBio() ?></p>
            <br>
            <h3>Active members</h3>
            <p class="band-info"><?= $data['band']->getMembers() ?></p>
            <br>
            <h3>Discography</h3>
            <p class="band-info"><?= $data['band']->getDiscoGraphy() ?></p>
        </div>
    </div>
    <div class="band-col">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < count($data['images']); $i++) {?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" class="active"
                            <?php if ($i == 0) { ?>
                                aria-current="true"
                            <?php } ?>
                        aria-label="<?= 'Slide' . ($i + 1) ?>">
                    </button>
                <?php } ?>
            </div>
            <div class="carousel-inner">
                <?php for ($i = 0; $i < count($data['images']); $i++) {?>
                    <div class="carousel-item <?php if ($i == 0) { ?>active <?php } ?>">
                        <img src="<?= \App\Config\Configuration::UPLOAD_DIR . $data['images'][$i]->getImageSrc() ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $data['images'][0]->getDesc() ?></h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
