<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between">
            <h5 class="card-title mb-sm-0">Data Alumnis</h5>
            <div>
                <a href="#modal-filter" data-toggle="modal" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
                <a href="<?= base_url(uri_string()) ?>?<?= $_SERVER['QUERY_STRING'] ?>&export=true" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-file-download-outline"></i>
                </a>
                <?php if(AuthorizationModel::isAuthorized(PERMISSION_ALUMNI_CREATE)): ?>
                    <a href="<?= site_url('alumni/create') ?>" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus-box-outline mr-2"></i>CREATE
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="<?= $alumnis['total_data'] > 3 ? 'table-responsive' : '' ?>">
            <table class="table table-hover table-sm mt-3 responsive" id="table-alumni">
                <thead>
                <tr>
                    <th class="text-md-center" style="width: 60px">No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Alamat Kantor</th>
                    <th style="width: 20px" class="text-md-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = isset($alumnis) ? ($alumnis['current_page'] - 1) * $alumnis['per_page'] : 0 ?>
                <?php foreach ($alumnis['data'] as $alumni): ?>
                    <tr>
                        <td class="text-md-center"><?= ++$no ?></td>
                        <td><?= $alumni['name'] ?></td>
                        <td><?= $alumni['address'] ?></td>
                        <td><?= $alumni['job'] ?></td>
                        <td><?= $alumni['office_address'] ?></td>
                        <td class="text-md-right">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right row-alumni"
                                     data-id="<?= $alumni['id'] ?>"
                                     data-label="<?= $alumni['name'] ?>">
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_ALUMNI_VIEW)): ?>
                                        <a class="dropdown-item" href="<?= site_url('alumni/view/' . $alumni['id']) ?>">
                                            <i class="mdi mdi-eye-outline mr-2"></i> View
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_ALUMNI_EDIT)): ?>
                                        <a class="dropdown-item" href="<?= site_url('alumni/edit/' . $alumni['id']) ?>">
                                            <i class="mdi mdi-square-edit-outline mr-2"></i> Edit
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_ALUMNI_DELETE)): ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item btn-delete" href="#modal-delete" data-toggle="modal"
                                            data-id="<?= $alumni['id'] ?>" data-label="<?= $alumni['name'] ?>" data-title="Alumni"
                                            data-url="<?= site_url('alumni/delete/' . $alumni['id']) ?>">
                                            <i class="mdi mdi-trash-can-outline mr-2"></i> Delete
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($alumnis['data'])): ?>
                    <tr>
                        <td colspan="6">No alumnis data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('partials/_pagination', ['pagination' => $alumnis]) ?>
    </div>
</div>

<?php $this->load->view('alumni/_modal_filter') ?>

<?php if(AuthorizationModel::isAuthorized(PERMISSION_ALUMNI_DELETE)): ?>
    <?php $this->load->view('partials/modals/_delete') ?>
<?php endif; ?>
