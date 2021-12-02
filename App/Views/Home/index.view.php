<?php /** @var Array $data */ ?>

<div class="text-box">
    <h1>Metal world</h1>
    <p>Music releases, band infos, tour infos and more all in one place</p>
    <div class="scroll-row">
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<section class="news">
    <h1>News</h1>
    <p>Updates every day</p>

    <?php if (App\Auth::isLogged()) {?>
        <a href="?c=home&a=bandForm" type="button" class="btn btn-primary">Add new</a>
        <a href="?c=home&a=modifyNews" type="button" class="btn btn-primary">Modify</a>
        <a href="?c=home&a=deleteNews" type="button" class="btn btn-primary">Delete</a>
    <?php } ?>

    <?php
    $counter = 0;
    foreach ($data['news'] as $new) {
        if ($counter % 3 == 0) {?>
            <div class="row">
       <?php } ?>
        <div class="news-col">
            <h3> <?= $new->getTitle() ?></h3>
            <p> <?= $new->getContent() ?></p>
        </div>
        <?php if ($counter % 3 == 2) { ?>
            </div>
        <?php }
            $counter++;
        ?>
    <?php } ?>
</section>
