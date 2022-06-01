<?php if(!$study['is_link']): ?>
<form action="<?= site_url('study/update/' . $study['id']) ?>" method="POST" enctype="multipart/form-data" id="form-study">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Edit Study</h5>
            <div class="form-group">
                <label for="name">Nama</label>
                <textarea class="form-control" id="name" name="name" maxlength="500" required
                          placeholder="Enter study title"><?= set_value('name', $study['name']) ?></textarea>
                <?= form_error('name') ?>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" maxlength="200" required readonly
                        value="<?= set_value('slug', $study['slug']) ?>" placeholder="Slug">
                <?= form_error('slug') ?>
            </div>
            <input type="hidden" class="form-control" id="is_link" name="is_link"
                    value="<?= set_value('is_link', $study['is_link']) ?>">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control ckeditor" id="description" name="description"
                          placeholder="Enter description"><?= set_value('description', $study['description']) ?></textarea>
                <?= form_error('description') ?>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-primary" data-toggle="one-touch" data-touch-message="Updating...">Update Study</button>
            </div>
        </div>
    </div>
</form>
<?php else: ?>
    <form action="<?= site_url('study/update/' . $study['id']) ?>" method="POST" enctype="multipart/form-data" id="form-study">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Edit Study</h5>
            <div class="form-group">
                <label for="name">Nama</label>
                <textarea class="form-control" id="name" name="name" maxlength="500" required
                          placeholder="Enter study title"><?= set_value('name', $study['name']) ?></textarea>
                <?= form_error('name') ?>
            </div>
            <input type="hidden" class="form-control" id="is_link" name="is_link"
                    value="<?= set_value('is_link', $study['is_link']) ?>">
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" class="form-control" id="link" name="link" maxlength="500" required
                        value="<?= set_value('link', $study['description']) ?>" placeholder="link">
                <?= form_error('link') ?>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-primary" data-toggle="one-touch" data-touch-message="Updating...">Update Study</button>
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