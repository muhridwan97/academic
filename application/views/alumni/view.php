<div class="form-plaintext">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">View Alumni</h5>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($alumni['name'], 'No name') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($alumni['address'], '-') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pekerjaan</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($alumni['job'], 'No job') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Alamat Kantor</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($alumni['office_address'], '-') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Description</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($alumni['description'], '-') ?>
                            </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card grid-margin">
        <div class="card-body d-flex justify-content-between">
            <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
            <?php if(!$this->config->item('sso_enable')): ?>
                <?php if(AuthorizationModel::isAuthorized(PERMISSION_ALUMNI_EDIT)): ?>
                    <a href="<?= site_url('master/alumni/edit/' . $alumni['id']) ?>" class="btn btn-primary">
                        Edit Alumni
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
