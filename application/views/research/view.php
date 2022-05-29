<div class="form-plaintext">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">View Research</h5>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($research['lecturer_name'], 'No name') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">No Lecturer</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($research['no_lecturer'], '-') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Judul Penelitan</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($research['research_title'], 'No title') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Penelitian</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($research['research_type'], 'NO type') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Sumber Dana</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($research['source_of_funds'], 'No dana') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($research['year'], 'No year') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Akreditasi Jurnal</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?= if_empty($research['journal_accreditation'], 'No accreditation') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Link Jurnal</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <a href="<?= if_empty($research['journal_link'], 'No link') ?>" target="_blank"><?= if_empty($research['journal_link'], 'No link') ?></a>
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
                                <?= if_empty($research['description'], 'No description') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">
                                <?php
                                $statuses = [
                                    ResearchModel::STATUS_ACTIVE => 'success',
                                    ResearchModel::STATUS_INACTIVE => 'secondary',
                                ]
                                ?>
                                <label class="mb-0 small badge badge-<?= $statuses[$research['status']] ?>">
                                    <?= $research['status'] ?>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card grid-margin">
        <div class="card-body d-flex justify-content-between">
            <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
            <?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_EDIT)): ?>
                    <a href="<?= site_url('research/edit/' . $research['id']) ?>" class="btn btn-primary">
                        Edit Research
                    </a>
                <?php endif; ?>
        </div>
    </div>
</div>
