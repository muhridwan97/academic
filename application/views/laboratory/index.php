<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between">
            <h5 class="card-title mb-sm-0">Data Laboratory</h5>
            <div>
                <a href="#modal-filter" data-toggle="modal" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
                <a href="<?= base_url(uri_string()) ?>?<?= $_SERVER['QUERY_STRING'] ?>&export=true" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-file-download-outline"></i>
                </a>
            </div>
        </div>
        <div class="<?= $laboratories['total_data'] > 3 ? 'table-responsive' : '' ?>">
            <table class="table table-hover table-sm mt-3 responsive" id="table-laboratory">
                <thead>
                <tr>
                    <th class="text-md-center" style="width: 60px">No</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Is Link</th>
                    <th>Description</th>
                    <th style="min-width: 20px" class="text-md-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = isset($laboratories) ? ($laboratories['current_page'] - 1) * $laboratories['per_page'] : 0 ?>
                <?php foreach ($laboratories['data'] as $laboratory): ?>
                    <tr>
                        <td class="text-md-center"><?= ++$no ?></td>
                        <td><?= $laboratory['name'] ?></td>
                        <td><?= $laboratory['slug'] ?></td>
                        <td><?php if($laboratory['is_link']):?>
                            <label class="badge badge-success">
                                YES
                            </label>
                            <?php else: ?>
                            <label class="badge badge-info">
                                NO
                            </label>
                            <?php endif; ?>
                        </td>
                        <td><?= $laboratory['description'] ?></td>
                        <td class="text-md-right">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right row-laboratory"
                                     data-id="<?= $laboratory['id'] ?>"
                                     data-label="<?= $laboratory['name'] ?>">
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_CONTENT_EDIT)): ?>
                                        <a class="dropdown-item" href="<?= site_url('laboratory/edit/' . $laboratory['id']) ?>">
                                            <i class="mdi mdi-square-edit-outline mr-2"></i> Edit
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($laboratories['data'])): ?>
                    <tr>
                        <td colspan="6">No laboratories data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('partials/_pagination', ['pagination' => $laboratories]) ?>
    </div>
</div>

<?php $this->load->view('laboratory/_modal_filter') ?>
