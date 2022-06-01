<?php if(!$laboratory['is_link']): ?>
<form action="<?= site_url('laboratory/update/' . $laboratory['id']) ?>" method="POST" enctype="multipart/form-data" id="form-laboratory">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Edit Laboratory</h5>
            <div class="form-group">
                <label for="name">Nama</label>
                <textarea class="form-control" id="name" name="name" maxlength="500" required
                          placeholder="Enter laboratory title"><?= set_value('name', $laboratory['name']) ?></textarea>
                <?= form_error('name') ?>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" maxlength="200" required readonly
                        value="<?= set_value('slug', $laboratory['slug']) ?>" placeholder="Slug">
                <?= form_error('slug') ?>
            </div>
            <input type="hidden" class="form-control" id="is_link" name="is_link"
                    value="<?= set_value('is_link', $laboratory['is_link']) ?>">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control ckeditor" id="description" name="description"
                          placeholder="Enter description"><?= set_value('description', $laboratory['description']) ?></textarea>
                <?= form_error('description') ?>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-primary" data-toggle="one-touch" data-touch-message="Updating...">Update Laboratory</button>
            </div>
        </div>
    </div>
</form>
<?php else: ?>
    <form action="<?= site_url('laboratory/update/' . $laboratory['id']) ?>" method="POST" enctype="multipart/form-data" id="form-laboratory">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Edit Laboratory</h5>
            <div class="form-group">
                <label for="name">Nama</label>
                <textarea class="form-control" id="name" name="name" maxlength="500" required
                          placeholder="Enter laboratory title"><?= set_value('name', $laboratory['name']) ?></textarea>
                <?= form_error('name') ?>
            </div>
            <input type="hidden" class="form-control" id="is_link" name="is_link"
                    value="<?= set_value('is_link', $laboratory['is_link']) ?>">
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" class="form-control" id="link" name="link" maxlength="500" required
                        value="<?= set_value('link', $laboratory['description']) ?>" placeholder="link">
                <?= form_error('link') ?>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-primary" data-toggle="one-touch" data-touch-message="Updating...">Update Laboratory</button>
            </div>
        </div>
    </div>
</form>
<?php endif; ?>

<?php $this->load->view('partials/modals/_alert') ?>
<script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>

<script>
        CKEDITOR.replace( 'description', {
            extraPlugins : 'emoji,colorbutton',
            // removeButtons : 'Underline,Subscript,Superscript,Styles,Table,Symbol,SpecialChar',
            // removePlugins : 'link,image,blockquote,format,horizontalrule,about,list',
        } );
</script>