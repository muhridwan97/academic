<form action="<?= site_url('review-curriculum/save') ?>" method="POST" enctype="multipart/form-data" id="form-review-curriculum">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Create New Review Curriculum</h5>

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="500" required
                        value="<?= set_value('title') ?>" placeholder="Judul">
                <?= form_error('title') ?>
            </div>
            <div class="form-group">
                <label for="body">Isi</label>
                <textarea class="form-control ckeditor" id="body" name="body"
                          placeholder="Enter body"><?= set_value('body') ?></textarea>
                <?= form_error('body') ?>
            </div>
            <div class="form-group">
                <label for="user">Penulis</label>
                <select class="form-control select2" name="user" id="user" required data-placeholder="Select Writer">
                    <option value="">-- Select Dosen --</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>"<?= set_select('user') ?>>
                            <?= $user['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('user') ?>
            </div>
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="text" class="form-control datepicker" id="date" name="date" required
                        value="<?= set_value('date') ?>" placeholder="tanggal">
                <?= form_error('date') ?>
            </div>
            <div class="form-group">
                <label>Attachment</label>
                <input type="file" id="attachment" name="attachment" class="file-upload-default" data-max-size="10000000">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload file">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-success btn-simple-upload" type="button">
                            Upload
                        </button>
                    </span>
                </div>
                <?= form_error('attachment') ?>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" maxlength="500"
                          placeholder="Enter description"><?= set_value('description') ?></textarea>
                <?= form_error('description') ?>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-success mr-2" data-toggle="one-touch" data-touch-message="Saving...">Save Review</button>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('partials/modals/_alert') ?>

<script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>

<script>
        CKEDITOR.replace( 'body', {
            extraPlugins : 'emoji,colorbutton',
            // removeButtons : 'Underline,Subscript,Superscript,Styles,Table,Symbol,SpecialChar',
            // removePlugins : 'link,image,blockquote,format,horizontalrule,about,list',
        } );
</script>