<form action="<?= site_url('alumni/update/' . $alumni['id']) ?>" method="POST" enctype="multipart/form-data" id="form-alumni">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Edit Alumni</h5>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="50"
                               value="<?= set_value('name', $alumni['name']) ?>" placeholder="Alumni name">
                        <?= form_error('name') ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" required maxlength="100"
                               value="<?= set_value('address', $alumni['address']) ?>" placeholder="Alumni address">
                        <?= form_error('address') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="job">Pekerjaan</label>
                        <input type="text" class="form-control" id="job" name="job" required maxlength="50"
                               value="<?= set_value('job', $alumni['job']) ?>" placeholder="Alumni job">
                        <?= form_error('job') ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="office_address">Alamat Kantor</label>
                        <input type="text" class="form-control" id="office_address" name="office_address" required maxlength="100"
                               value="<?= set_value('office_address', $alumni['office_address']) ?>" placeholder="Alumni office address">
                        <?= form_error('office_address') ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" maxlength="500"
                          placeholder="Enter alumni description"><?= set_value('description', $alumni['description']) ?></textarea>
                <?= form_error('description') ?>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-primary" data-toggle="one-touch" data-touch-message="Updating...">Update Alumni</button>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('partials/modals/_alert') ?>
