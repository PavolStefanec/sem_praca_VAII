<?php /** @var Array $data */ ?>

<div class="text-box">
    <h1>Modify news</h1>
    <p>scroll down</p>
    <div class="scroll-row">
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<div class="container">
    <div class="form-block">
        <div class="col-sm-8 offset-sm-2">
            <?php if($data['error'] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>

            <form method="post" action="?c=news&a=modifyNews&id=<?=$data['news']->getId() ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= $data['news']->getTitle()?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3"><?= $data['news']->getContent()?></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Modify</button>
                </div>
            </form>
        </div>
    </div>
</div>
