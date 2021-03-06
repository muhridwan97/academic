<form action="<?= site_url('syllabus/course/save/' . (empty($selectedCurriculum) ? '' : $selectedCurriculum['id'] ) . '?redirect=' . get_url_param('redirect')) ?>" method="POST" enctype="multipart/form-data" id="form-course">
    <?= _csrf() ?>
	<div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Create New Course</h5>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="curriculum">Curriculum</label>
						<?php if(empty($selectedCurriculum)): ?>
							<select class="form-control select2" id="curriculum" name="curriculum" data-placeholder="Select curriculum" required>
								<option value="">No curriculum</option>
								<?php foreach ($curriculums as $curriculum): ?>
									<option value="<?= $curriculum['id'] ?>"<?= set_select('curriculum', $curriculum['id']) ?>>
										<?= $curriculum['curriculum_title'] ?> - <?= $curriculum['department'] ?>
									</option>
								<?php endforeach; ?>
							</select>
						<?php else: ?>
							<input type="text" class="form-control" value="<?= $selectedCurriculum['curriculum_title'] ?>" id="curriculum" readonly>
							<input type="hidden" name="curriculum" value="<?= $selectedCurriculum['id'] ?>">
						<?php endif; ?>
						<?= form_error('curriculum') ?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="course_title">Course Title</label>
						<input type="text" class="form-control" id="course_title" name="course_title" required maxlength="100"
							   value="<?= set_value('course_title') ?>" placeholder="Course title">
						<?= form_error('course_title') ?>
					</div>
				</div>
			</div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" maxlength="500"
                          placeholder="Enter course description"><?= set_value('description') ?></textarea>
                <?= form_error('description') ?>
            </div>
			<div class="form-group">
				<label for="status">Status</label>
				<div class="mt-1">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="status_active" name="status" value="ACTIVE" class="custom-control-input"<?= set_radio('status', 'ACTIVE') ?>>
						<label class="custom-control-label" for="status_active">Active</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="status_inactive" name="status" value="INACTIVE" required class="custom-control-input"<?= set_radio('status', 'INACTIVE') ?>>
						<label class="custom-control-label" for="status_inactive">Inactive</label>
					</div>
				</div>
			</div>
        </div>
    </div>
	<div class="card mb-3">
		<div class="card-body">
			<h5 class="card-title">Course Image</h5>
			<div class="form-group">
				<div class="d-flex flex-column flex-sm-row align-items-center">
					<div class="mb-3 mb-sm-0">
						<img src="<?= base_url('assets/dist/img/no-image.png') ?>"
							 alt="Image cover" id="image-cover" class="rounded img-fluid" style="height:140px; width: 140px; object-fit: cover">
					</div>
					<div class="mr-lg-3 ml-sm-4 flex-fill" style="max-width: 500px">
						<label for="cover_image" class="d-none d-md-block">Select a cover image</label>
						<input type="file" id="cover" name="cover_image" accept="image/jpeg,image/png" class="file-upload-default" data-max-size="2000000" data-target-preview="#image-cover">
						<div class="input-group">
							<input type="text" class="form-control file-upload-info" disabled placeholder="Upload cover">
							<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary btn-simple-upload" type="button">
									Select Cover
								</button>
							</span>
						</div>
						<span class="form-text">Leave it unselected if you don't change the cover.</span>
						<?= form_error('cover_image') ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card mb-3">
        <div class="card-body d-flex justify-content-between">
            <button onclick="history.back()" type="button" class="btn btn-light">Back</button>
            <button type="submit" class="btn btn-success" data-toggle="one-touch" data-touch-message="Saving...">
				Save Course
			</button>
        </div>
    </div>
</form>
