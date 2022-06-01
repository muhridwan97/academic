<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between">
            <h5 class="card-title mb-sm-0">Data Document</h5>
            <div>
                <a href="#modal-filter" data-toggle="modal" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
                <a href="<?= base_url(uri_string()) ?>?<?= $_SERVER['QUERY_STRING'] ?>&export=true" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-file-download-outline"></i>
                </a>
            </div>
        </div>
        <div class="<?= $documents['total_data'] > 3 ? 'table-responsive' : '' ?>">
            <table class="table table-hover table-sm mt-3 responsive" id="table-document">
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
                <?php $no = isset($documents) ? ($documents['current_page'] - 1) * $documents['per_page'] : 0 ?>
                <?php foreach ($documents['data'] as $document): ?>
                    <tr>
                        <td class="text-md-center"><?= ++$no ?></td>
                        <td><?= $document['name'] ?></td>
                        <td><?= $document['slug'] ?></td>
                        <td><?php if($document['is_link']):?>
                            <label class="badge badge-success">
                                YES
                            </label>
                            <?php else: ?>
                            <label class="badge badge-info">
                                NO
                            </label>
                            <?php endif; ?>
                        </td>
                        <td><?= $document['description'] ?></td>
                        <td class="text-md-right">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right row-document"
                                     data-id="<?= $document['id'] ?>"
                                     data-label="<?= $document['name'] ?>">
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_CONTENT_EDIT)): ?>
                                        <a class="dropdown-item" href="<?= site_url('document/edit/' . $document['id']) ?>">
                                            <i class="mdi mdi-square-edit-outline mr-2"></i> Edit
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($documents['data'])): ?>
                    <tr>
                        <td colspan="6">No documents data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('partials/_pagination', ['pagination' => $documents]) ?>
    </div>
</div>

<?php $this->load->view('document/_modal_filter') ?>
