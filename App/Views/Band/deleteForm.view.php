<?php /** @var Array $data */ ?>

<div class="text-box">
    <h1>Delete content of existing band</h1>
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
        <div class="col-sm-4 offset-sm-4">
            <?php if($data['error'] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>

            <form method="post" action="?c=band&a=deleteBand">
                <select class="form-select" aria-label="Default select example" name="id">
                    <option selected>Select band</option>
                    <?php foreach ($data['bands'] as $band) {?>
                        <option value="<?= $band->getId() ?>"><?= $band->getName() ?></option>
                    <?php } ?>
                </select>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
