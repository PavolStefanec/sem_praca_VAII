<?php /** @var Array $data */ ?>

<div class="text-box">
    <h1>Add new band</h1>
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
            <form method="post" enctype="multipart/form-data" action="?c=band&a=addBand">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Band name</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Band logo</label>
                    <input class="form-control" type="file" name="logo" id="formFile" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Band pictures</label>
                    <input class="form-control" type="file" name="file[]" id="band_imgs" multiple >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                    <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea2" class="form-label">Members</label>
                    <textarea class="form-control" name="members" id="exampleFormControlTextarea2" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea3" class="form-label">DiscoGraphy</label>
                    <textarea class="form-control" name="disco" id="exampleFormControlTextarea3" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add band</button>
                </div>
            </form>
        </div>
    </div>
</div>