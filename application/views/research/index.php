<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between">
            <h5 class="card-title mb-sm-0">Data Research</h5>
            <div>
                <a href="#modal-filter" data-toggle="modal" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
                <a href="<?= base_url(uri_string()) ?>?<?= $_SERVER['QUERY_STRING'] ?>&export=true" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-file-download-outline"></i>
                </a>
                <?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_CREATE)): ?>
                    <a href="<?= site_url('research/create') ?>" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus-box-outline mr-2"></i>CREATE
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="<?= $researches['total_data'] > 3 ? 'table-responsive' : '' ?>">
            <table class="table table-hover table-sm mt-3 responsive" id="table-research">
                <thead>
                <tr>
                    <th class="text-md-center" style="width: 60px">No</th>
                    <th>Judul</th>
                    <th>Nama</th>
                    <th>No Dosen</th>
                    <th>Jenis</th>
                    <th>Dana</th>
                    <th>Tahun</th>
                    <th>Akreditasi</th>
                    <th>Link</th>
                    <th style="width: 20px">Status</th>
                    <th style="min-width: 20px" class="text-md-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $statuses = [
                    ResearchModel::STATUS_ACTIVE => 'success',
                    ResearchModel::STATUS_INACTIVE => 'secondary',
                ]
                ?>
                <?php $no = isset($researches) ? ($researches['current_page'] - 1) * $researches['per_page'] : 0 ?>
                <?php foreach ($researches['data'] as $research): ?>
                    <tr>
                        <td class="text-md-center"><?= ++$no ?></td>
                        <td><?= $research['research_title'] ?></td>
                        <td><?= $research['lecturer_name'] ?></td>
                        <td><?= $research['no_lecturer'] ?></td>
                        <td><?= $research['research_type'] ?></td>
                        <td><?= $research['source_of_funds'] ?></td>
                        <td><?= $research['year'] ?></td>
                        <td><?= $research['journal_accreditation'] ?></td>
                        <td><a href="<?= $research['journal_link'] ?>" target="_blank"><?= $research['journal_link'] ?></a></td>
                        <td>
                            <label class="badge badge-<?= $statuses[$research['status']] ?>">
                                <?= $research['status'] ?>
                            </label>
                        </td>
                        <td class="text-md-right">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right row-research"
                                     data-id="<?= $research['id'] ?>"
                                     data-label="<?= $research['research_title'] ?>">
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_VIEW)): ?>
                                        <a class="dropdown-item" href="<?= site_url('research/view/' . $research['id']) ?>">
                                            <i class="mdi mdi-eye-outline mr-2"></i> View
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_EDIT)): ?>
                                        <a class="dropdown-item" href="<?= site_url('research/edit/' . $research['id']) ?>">
                                            <i class="mdi mdi-square-edit-outline mr-2"></i> Edit
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_VALIDATE) && $research['status'] != ResearchModel::STATUS_ACTIVE): ?>
                                        <a class="dropdown-item btn-validate" href="#modal-validate" data-toggle="modal"
                                            data-id="<?= $research['id'] ?>" data-label="<?= $research['research_title'] ?>" data-title="Validate Research"
                                            data-url="<?= site_url('research/research/validate-research/' . $research['id']) ?>" data-action="VALIDATED">
                                            <i class="mdi mdi-check-outline mr-2"></i> Validate
                                        </a>
                                        <a class="dropdown-item btn-validate" data-action="REJECTED" data-id="<?= $research['id'] ?>"
                                            data-label="<?= $research['research_title'] ?>" data-title="Reject Absent"
                                            href="<?= site_url('research/research/validate-research/' . $research['id']) ?>?redirect=<?= base_url(uri_string()) ?>">
                                            <i class="mdi mdi-close mr-2"></i> Reject
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_DELETE)): ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item btn-delete" href="#modal-delete" data-toggle="modal"
                                            data-id="<?= $research['id'] ?>" data-label="<?= $research['research_title'] ?>" data-title="Research"
                                            data-url="<?= site_url('research/delete/' . $research['id']) ?>">
                                            <i class="mdi mdi-trash-can-outline mr-2"></i> Delete
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($researches['data'])): ?>
                    <tr>
                        <td colspan="11">No researches data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('partials/_pagination', ['pagination' => $researches]) ?>
    </div>
</div>

<?php $this->load->view('research/_modal_filter') ?>

<?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_DELETE)): ?>
    <?php $this->load->view('partials/modals/_delete') ?>
<?php endif; ?>
<?php if(AuthorizationModel::isAuthorized(PERMISSION_RESEARCH_VALIDATE)): ?>
    <?php $this->load->view('partials/modals/_validate') ?>
<?php endif; ?>
