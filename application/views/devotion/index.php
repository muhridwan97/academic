<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between">
            <h5 class="card-title mb-sm-0">Data Devotion</h5>
            <div>
                <a href="#modal-filter" data-toggle="modal" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
                <a href="<?= base_url(uri_string()) ?>?<?= $_SERVER['QUERY_STRING'] ?>&export=true" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-file-download-outline"></i>
                </a>
                <?php if(AuthorizationModel::isAuthorized(PERMISSION_DEVOTION_CREATE)): ?>
                    <a href="<?= site_url('devotion/create') ?>" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus-box-outline mr-2"></i>CREATE
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="<?= $devotions['total_data'] > 3 ? 'table-responsive' : '' ?>">
            <table class="table table-hover table-sm mt-3 responsive" id="table-devotion">
                <thead>
                <tr>
                    <th class="text-md-center" style="width: 60px">No</th>
                    <th>Kegiatan</th>
                    <th>Nama</th>
                    <th>No Dosen</th>
                    <th>Lokasi</th>
                    <th>Dana</th>
                    <th>Tahun</th>
                    <th>Link</th>
                    <th style="width: 20px">Status</th>
                    <th style="min-width: 20px" class="text-md-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $statuses = [
                    DevotionModel::STATUS_ACTIVE => 'success',
                    DevotionModel::STATUS_INACTIVE => 'secondary',
                ]
                ?>
                <?php $no = isset($devotions) ? ($devotions['current_page'] - 1) * $devotions['per_page'] : 0 ?>
                <?php foreach ($devotions['data'] as $devotion): ?>
                    <tr>
                        <td class="text-md-center"><?= ++$no ?></td>
                        <td><?= $devotion['activity'] ?></td>
                        <td><?= $devotion['lecturer_name'] ?></td>
                        <td><?= $devotion['no_lecturer'] ?></td>
                        <td><?= $devotion['location'] ?></td>
                        <td><?= $devotion['source_of_funds'] ?></td>
                        <td><?= $devotion['year'] ?></td>
                        <td><a href="<?= $devotion['proof_link'] ?>" target="_blank"><?= $devotion['proof_link'] ?></a></td>
                        <td>
                            <label class="badge badge-<?= $statuses[$devotion['status']] ?>">
                                <?= $devotion['status'] ?>
                            </label>
                        </td>
                        <td class="text-md-right">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right row-devotion"
                                     data-id="<?= $devotion['id'] ?>"
                                     data-label="<?= $devotion['activity'] ?>">
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_DEVOTION_VIEW)): ?>
                                        <a class="dropdown-item" href="<?= site_url('devotion/view/' . $devotion['id']) ?>">
                                            <i class="mdi mdi-eye-outline mr-2"></i> View
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_DEVOTION_EDIT)): ?>
                                        <a class="dropdown-item" href="<?= site_url('devotion/edit/' . $devotion['id']) ?>">
                                            <i class="mdi mdi-square-edit-outline mr-2"></i> Edit
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_DEVOTION_VALIDATE) && $devotion['status'] != DevotionModel::STATUS_ACTIVE): ?>
                                        <a class="dropdown-item btn-validate" href="#modal-validate" data-toggle="modal"
                                            data-id="<?= $devotion['id'] ?>" data-label="<?= $devotion['activity'] ?>" data-title="Validate Devotion"
                                            data-url="<?= site_url('devotion/devotion/validate-devotion/' . $devotion['id']) ?>" data-action="VALIDATED">
                                            <i class="mdi mdi-check-outline mr-2"></i> Validate
                                        </a>
                                        <a class="dropdown-item btn-validate" data-action="REJECTED" data-id="<?= $devotion['id'] ?>"
                                            data-label="<?= $devotion['activity'] ?>" data-title="Reject Absent"
                                            href="<?= site_url('devotion/devotion/validate-devotion/' . $devotion['id']) ?>?redirect=<?= base_url(uri_string()) ?>">
                                            <i class="mdi mdi-close mr-2"></i> Reject
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_DEVOTION_DELETE)): ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item btn-delete" href="#modal-delete" data-toggle="modal"
                                            data-id="<?= $devotion['id'] ?>" data-label="<?= $devotion['activity'] ?>" data-title="Devotion"
                                            data-url="<?= site_url('devotion/delete/' . $devotion['id']) ?>">
                                            <i class="mdi mdi-trash-can-outline mr-2"></i> Delete
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($devotions['data'])): ?>
                    <tr>
                        <td colspan="10">No devotions data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('partials/_pagination', ['pagination' => $devotions]) ?>
    </div>
</div>

<?php $this->load->view('devotion/_modal_filter') ?>

<?php if(AuthorizationModel::isAuthorized(PERMISSION_DEVOTION_DELETE)): ?>
    <?php $this->load->view('partials/modals/_delete') ?>
<?php endif; ?>
<?php if(AuthorizationModel::isAuthorized(PERMISSION_DEVOTION_VALIDATE)): ?>
    <?php $this->load->view('partials/modals/_validate') ?>
<?php endif; ?>
