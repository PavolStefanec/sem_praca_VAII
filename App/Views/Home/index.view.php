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

<section>
    <div class="news">
        <h1>News</h1>
        <p>Updates every day</p>
    </div>
    <?php
    $counter = 0;
    for ($i = 0; $i < count($data['news']); $i++) {
//        if ($counter % 3 == 0) {?>
<!--            <div class="row">-->
<!--        --><?php //} ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card news-col">
                    <div class="card-body">
                        <?php if ($counter == 0 && App\Auth::isLogged()) {?>
                            <div class="plus">
                                <a class="addIcon" href="?c=news&a=newsForm"><i class="fas fa-plus-circle"></i></a>
                            </div>
                            <?php $i--;?>
                        <?php } else {
                            $news = $data['news'][$i]?>
                            <div class="cardIcons">
                                <?php if (App\Auth::isLogged()) {?>
                                    <div class = "row bands-icons">
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 cog">
                                            <a href="?c=news&a=modifyForm&id=<?= $news->getId() ?>"><i class="fas fa-cog" ></i></a>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 minus">
                                            <a href="?c=news&a=deleteNews&id=<?= $news->getId() ?>"><i class="fas fa-minus-circle"></i></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="cardText">
                                <h3 class="card-title"> <?= $news->getTitle() ?></h3>
                                <p class="card-text"> <?= $news->getContent() ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
<!--        --><?php //if ($counter % 3 == 2) { ?>
<!--            </div>-->
<!--        --><?php //}
            $counter++;
        ?>
    <?php } ?>
</section>
