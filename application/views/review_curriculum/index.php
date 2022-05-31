<div class="card mb-3">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between">
            <h5 class="card-title mb-sm-0">Data Review Curriculum</h5>
            <div>
                <a href="#modal-filter" data-toggle="modal" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-filter-variant"></i>
                </a>
                <a href="<?= base_url(uri_string()) ?>?<?= $_SERVER['QUERY_STRING'] ?>&export=true" class="btn btn-info btn-sm pr-2 pl-2">
                    <i class="mdi mdi-file-download-outline"></i>
                </a>
                <?php if(AuthorizationModel::isAuthorized(PERMISSION_REVIEW_CURRICULUM_CREATE)): ?>
                    <a href="<?= site_url('review-curriculum/create') ?>" class="btn btn-sm btn-primary">
                        <i class="mdi mdi-plus-box-outline mr-2"></i>CREATE
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="<?= $reviewCurriculums['total_data'] > 3 ? 'table-responsive' : '' ?>">
            <table class="table table-hover table-sm mt-3 responsive" id="table-review-curriculum">
                <thead>
                <tr>
                    <th class="text-md-center" style="width: 60px">No</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Writer</th>
                    <th>Date</th>
                    <th>Total View</th>
                    <th>Description</th>
                    <th style="min-width: 20px" class="text-md-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = isset($reviewCurriculums) ? ($reviewCurriculums['current_page'] - 1) * $reviewCurriculums['per_page'] : 0 ?>
                <?php foreach ($reviewCurriculums['data'] as $review_curriculum): ?>
                    <tr>
                        <td class="text-md-center"><?= ++$no ?></td>
                        <td><?= $review_curriculum['title'] ?></td>
                        <td><?= $review_curriculum['body'] ?></td>
                        <td><?= $review_curriculum['writer_name'] ?></td>
                        <td><?= format_date($review_curriculum['date'], 'd F Y') ?></td>
                        <td><?php if($review_curriculum['count_view']>0):?>
                            <label class="badge badge-success">
                            <?= $review_curriculum['count_view'] ?>
                            </label>
                            <?php else: ?>
                            <label class="badge badge-info">
                            <?= $review_curriculum['count_view'] ?>
                            </label>
                            <?php endif; ?>
                        </td>
                        <td><?= $review_curriculum['description'] ?></td>
                        <td class="text-md-right">
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionButton" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right row-review_curriculum"
                                     data-id="<?= $review_curriculum['id'] ?>"
                                     data-label="<?= $review_curriculum['title'] ?>">
                                    <!-- <?php if(AuthorizationModel::isAuthorized(PERMISSION_REVIEW_CURRICULUM_VIEW)): ?>
                                        <a class="dropdown-item" href="<?= site_url('review_curriculum/view/' . $review_curriculum['id']) ?>">
                                            <i class="mdi mdi-eye-outline mr-2"></i> View
                                        </a>
                                    <?php endif; ?> -->
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_REVIEW_CURRICULUM_EDIT)): ?>
                                        <a class="dropdown-item" href="<?= site_url('review_curriculum/edit/' . $review_curriculum['id']) ?>">
                                            <i class="mdi mdi-square-edit-outline mr-2"></i> Edit
                                        </a>
                                    <?php endif; ?>
                                    <?php if(AuthorizationModel::isAuthorized(PERMISSION_REVIEW_CURRICULUM_DELETE)): ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item btn-delete" href="#modal-delete" data-toggle="modal"
                                            data-id="<?= $review_curriculum['id'] ?>" data-label="<?= $review_curriculum['title'] ?>" data-title="Review Curriculum"
                                            data-url="<?= site_url('review_curriculum/delete/' . $review_curriculum['id']) ?>">
                                            <i class="mdi mdi-trash-can-outline mr-2"></i> Delete
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($reviewCurriculums['data'])): ?>
                    <tr>
                        <td colspan="6">No reviewCurriculums data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php $this->load->view('partials/_pagination', ['pagination' => $reviewCurriculums]) ?>
    </div>
</div>

<?php $this->load->view('review_curriculum/_modal_filter') ?>

<?php if(AuthorizationModel::isAuthorized(PERMISSION_REVIEW_CURRICULUM_DELETE)): ?>
    <?php $this->load->view('partials/modals/_delete') ?>
<?php endif; ?>