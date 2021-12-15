<?php /** @var Array $data */ ?>

<div class="text-box">
    <h1>Modify content of existing band</h1>
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

            <form method="post" action="?c=band&a=modifyBand&id=<?=$data['band']->getId() ?>">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Band logo</label>
                    <input class="form-control" type="file" name="logo" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Bio</label>
                    <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3"><?= $data['band']->getBio()?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Members</label>
                    <textarea class="form-control" name="members" id="exampleFormControlTextarea1" rows="3"><?= $data['band']->getMembers()?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">DiscoGraphy</label>
                    <textarea class="form-control" name="disco" id="exampleFormControlTextarea1" rows="3"><?= $data['band']->getDiscography()?></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Modify</button>
                </div>
            </form>
        </div>
    </div>
</div>
