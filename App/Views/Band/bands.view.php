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
    <?php
    $counter = 0;
    for ($i = 0; $i < count($data['bands']); $i++) {
        if ($counter % 3 == 0) {?>
            <div class="row">
        <?php } ?>
            <div class="bands-col">
                <?php if ($counter == 0 && App\Auth::isLogged()) {?>
                    <a href="?c=band&a=bandForm"><i class="fas fa-plus-circle"></i></a>
                    <?php $i--;?>
                <?php } else {
                    $band = $data['bands'][$i]?>
                    <img src="<?= \App\Config\Configuration::UPLOAD_DIR . $band->getLogoSrc()?>" class="img-fluid mx-auto d-block" alt="band1">
                    <a class="nav-link" href="?c=band&a=bandPage&id=<?= $band->getId() ?>"><p><?= $band->getName() ?></p></a>
                    <?php if (App\Auth::isLogged()) {?>
                        <a href="?c=band&a=modifyForm&id=<?= $band->getId() ?>"><i class="fas fa-cog" ></i></a>
                        <a href="?c=band&a=deleteBand&id=<?= $band->getId() ?>"><i class="fas fa-minus-circle"></i></a>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php if ($counter % 3 == 2) { ?>
            </div>
        <?php }
            $counter++;
        ?>
    <?php } ?>
</section>