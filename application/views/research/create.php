<form action="<?= site_url('research/save') ?>" method="POST" enctype="multipart/form-data" id="form-research">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Create New Research</h5>

            <div class="form-group">
                <label for="lecturer">Dosen</label>
                <select class="form-control select2" name="lecturer" id="lecturer" required data-placeholder="Select dosen">
                    <option value="">-- Select Dosen --</option>
                    <?php foreach ($lecturers as $lecturer): ?>
                        <option value="<?= $lecturer['id'] ?>"<?= set_select('lecturer', $lecturer['id']) ?>>
                            <?= $lecturer['no_lecturer'] ?> - <?= $lecturer['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('lecturer') ?>
            </div>
            <div class="form-group">
                <label for="research_title">Judul Penelitian</label>
                <textarea class="form-control" id="research_title" name="research_title" maxlength="500" required
                          placeholder="Enter research title"><?= set_value('research_title') ?></textarea>
                <?= form_error('research_title') ?>
            </div>
            <div class="form-group">
                <label for="research_type">Jenis Penelitian</label>
                <input type="text" class="form-control" id="research_type" name="research_type" maxlength="100" required
                        value="<?= set_value('research_type') ?>" placeholder="Jenis penelitian">
                <?= form_error('research_type') ?>
            </div>
            <div class="form-group">
                <label for="source_of_funds">Sumber Dana</label>
                <input type="text" class="form-control" id="source_of_funds" name="source_of_funds" maxlength="200" required
                        value="<?= set_value('source_of_funds') ?>" placeholder="Sumber dana">
                <?= form_error('source_of_funds') ?>
            </div>
            <div class="form-group">
                <label for="year">Tahun</label>
                <?php $years = range(1990, strftime("%Y", time())); ?>
                <!-- <input type="text" class="form-control datepickeryear" id="year" name="year" maxlength="200"
                        value="<?= set_value('year') ?>" placeholder="Tahun"> -->
                <select class="form-control select2" name="year" id="year" required data-placeholder="Select year">
                    <option value="">-- Select Year --</option>
                    <?php foreach ($years as $year): ?>
                        <option value="<?= $year?>"<?= set_select('year', $year) ?>>
                            <?= $year ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('year') ?>
            </div>
            
            <div class="form-group">
                <label for="journal_accreditation">Akreditasi Jurnal</label>
                <input type="text" class="form-control" id="journal_accreditation" name="journal_accreditation" maxlength="200" required
                        value="<?= set_value('journal_accreditation') ?>" placeholder="Akreditasi jurnal">
                <?= form_error('journal_accreditation') ?>
            </div>

            <div class="form-group">
                <label for="journal_link">Link Jurnal</label>
                <input type="url" class="form-control" id="journal_link" name="journal_link" maxlength="500" required
                        value="<?= set_value('journal_link') ?>" placeholder="Link jurnal">
                <?= form_error('journal_link') ?>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" maxlength="500"
                          placeholder="Enter description"><?= set_value('description') ?></textarea>
                <?= form_error('description') ?>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-success mr-2" data-toggle="one-touch" data-touch-message="Saving...">Save Research</button>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('partials/modals/_alert') ?>
