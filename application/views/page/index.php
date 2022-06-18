<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between">
            <h5 class="card-title mb-sm-0">Data Page</h5>
            <div>
                <a href="#modal-filter" data-toggle="modal" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
                <a href="<?= base_url(uri_string()) ?>?<?= $_SERVER['QUERY_STRING'] ?>&export=true" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-file-download-outline"></i>
                </a>
                <?php if(AuthorizationModel::isAuthorized(PERMISSION_PAGE_CREATE)): ?>
                    <a href="<?= site_url('page/create') ?>" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus-box-outline mr-2"></i>CREATE
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="<?= $pages['total_data'] > 3 ? 'table-responsive' : '' ?>">
            <table class="table table-hover table-sm mt-3 responsive" id="table-page">
                <thead>
                <tr>
                    <th class="text-md-center" style="width: 60px">No</th>
                    <th>Url</th>
                    <th>Nama Halaman</th>
                    <th>Foto</th>
                    <th>Content</th>
                    <th style="min-width: 20px" class="text-md-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = isset($pages) ? ($pages['current_page'] - 1) * $pages['per_page'] : 0 ?>
                <?php foreach ($pages['data'] as $page): ?>
                    <tr>
                        <td class="text-md-center"><?= ++$no ?></td>
                        <td><?= $page['url'] ?></td>
                        <td><?= $page['page_name'] ?></td>
                        <td><?= $page['photo'] ?></td>
                        <td><?= $page['content'] ?></td>
                        <td class="text-md-right">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right row-page"
                                     data-id="<?= $page['id'] ?>"
                                     data-label="<?= $page['page_name'] ?>">
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_PAGE_VIEW)): ?>
                                        <a class="dropdown-item" href="<?= site_url('page/view/' . $page['id']) ?>">
                                            <i class="mdi mdi-eye-outline mr-2"></i> View
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_PAGE_EDIT)): ?>
                                        <a class="dropdown-item" href="<?= site_url('page/edit/' . $page['id']) ?>">
                                            <i class="mdi mdi-square-edit-outline mr-2"></i> Edit
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_PAGE_DELETE)): ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item btn-delete" href="#modal-delete" data-toggle="modal"
                                            data-id="<?= $page['id'] ?>" data-label="<?= $page['page_name'] ?>" data-title="Page"
                                            data-url="<?= site_url('page/delete/' . $page['id']) ?>">
                                            <i class="mdi mdi-trash-can-outline mr-2"></i> Delete
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($pages['data'])): ?>
                    <tr>
                        <td colspan="6">No pages data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('partials/_pagination', ['pagination' => $pages]) ?>
    </div>
</div>

<?php $this->load->view('page/_modal_filter') ?>

<?php if(AuthorizationModel::isAuthorized(PERMISSION_PAGE_DELETE)): ?>
    <?php $this->load->view('partials/modals/_delete') ?>
<?php endif; ?>
