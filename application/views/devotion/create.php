<form action="<?= site_url('devotion/save') ?>" method="POST" enctype="multipart/form-data" id="form-devotion">
    <?= _csrf() ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Create New Devotion</h5>

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
                <label for="activity">Nama Kegiatan</label>
                <textarea class="form-control" id="activity" name="activity" maxlength="500" required
                          placeholder="Enter devotion title"><?= set_value('activity') ?></textarea>
                <?= form_error('activity') ?>
            </div>
            <div class="form-group">
                <label for="location">Lokasi Kegiatan</label>
                <input type="text" class="form-control" id="location" name="location" maxlength="500" required
                        value="<?= set_value('location') ?>" placeholder="Lokasi pengabdian">
                <?= form_error('location') ?>
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
                <label for="proof_link">Link Bukti Kegiatan</label>
                <input type="url" class="form-control" id="proof_link" name="proof_link" maxlength="500" required
                        value="<?= set_value('proof_link') ?>" placeholder="Link jurnal">
                <?= form_error('proof_link') ?>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" maxlength="500"
                          placeholder="Enter description"><?= set_value('description') ?></textarea>
                <?= form_error('description') ?>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
                <button type="submit" class="btn btn-success mr-2" data-toggle="one-touch" data-touch-message="Saving...">Save Devotion</button>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('partials/modals/_alert') ?>
