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
            <form method="post" enctype="multipart/form-data" action="?c=home&a=addBand">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Band name</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Band logo</label>
                    <input class="form-control" type="file" name="logo" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Bio</label>
                    <input type="text" class="form-control" name="bio" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Members</label>
                    <input type="text" class="form-control" name="members" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">DiscoGraphy</label>
                    <input type="text" class="form-control" name="disco" id="exampleFormControlInput2" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add band</button>
                </div>
            </form>
        </div>
    </div>
</div>