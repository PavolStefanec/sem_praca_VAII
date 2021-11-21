<?php /** @var Array $data */ ?>

<div class="text-box">
    <h1>List of modern metal bands</h1>
    <p>scroll down</p>
    <div class="scroll-row">
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<section class="bands-tiles">
    <h1>Bands</h1>

    <?php if (App\Auth::isLogged()) {?>
        <a href="?c=home&a=bandForm" type="button" class="btn btn-primary">Add new</a>
        <a href="?c=home&a=modifyForm" type="button" class="btn btn-primary">Modify</a>
        <a href="?c=home&a=deleteForm" type="button" class="btn btn-primary">Delete</a>
    <?php } ?>

    <?php
    $counter = 0;
    foreach ($data['bands'] as $band) {
        if ($counter % 3 == 0) {?>
            <div class="row">
        <?php } ?>
            <div class="bands-col">
                <img src="<?= \App\Config\Configuration::UPLOAD_DIR . $band->getLogoSrc()?>" class="img-fluid mx-auto d-block" alt="band1">
                <a class="nav-link" href="?c=home&a=bandPage&parId=<?= $band->getId() ?>"><p><?= $band->getName() ?></p></a>
            </div>
        <?php if ($counter % 3 == 2) { ?>
            </div>
        <?php }
            $counter++;
        ?>
    <?php } ?>
</section>