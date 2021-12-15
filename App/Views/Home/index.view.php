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
    <?php
    $counter = 0;
    for ($i = 0; $i < count($data['news']); $i++) {
        if ($counter % 3 == 0) {?>
            <div class="row">
        <?php } ?>
            <div class="news-col">
                <?php if ($counter == 0 && App\Auth::isLogged()) {?>
                    <a href="?c=news&a=newsForm"><i class="fas fa-plus-circle"></i></a>
                    <?php $i--;?>
                <?php } else {
                    $news = $data['news'][$i]?>
                    <h3> <?= $news->getTitle() ?></h3>
                    <p> <?= $news->getContent() ?></p>
                    <?php if (App\Auth::isLogged()) {?>
                        <a href="?c=news&a=modifyForm&id=<?= $news->getId() ?>"><i class="fas fa-cog" ></i></a>
                        <a href="?c=news&a=deleteNews&id=<?= $news->getId() ?>"><i class="fas fa-minus-circle"></i></a>
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
