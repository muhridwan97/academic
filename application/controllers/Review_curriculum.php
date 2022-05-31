<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Curriculum
 * @property LecturerModel $lecturer
 * @property ReviewCurriculumModel $reviewCurriculum
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Review_curriculum extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ReviewCurriculumModel', 'reviewCurriculum');
        $this->load->model('StudentModel', 'student');
        $this->load->model('LecturerModel', 'lecturer');
        $this->load->model('StatusHistoryModel', 'statusHistory');

        $this->load->model('DepartmentModel', 'department');
        $this->load->model('UserModel', 'user');
        $this->load->model('modules/Mailer', 'mailer');
        $this->load->model('modules/Exporter', 'exporter');
        $this->load->model('modules/Uploader', 'uploader');

        $this->setFilterMethods([
		]);
    }

    /**
     * Show Curriculum index page.
     */
    public function index()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_REVIEW_CURRICULUM_VIEW);

        $filters = array_merge($_GET, ['page' => get_url_param('page', 1)]);

        $export = $this->input->get('export');
        if ($export) unset($filters['page']);

        $civitasLoggedIn = UserModel::loginData('id_civitas', '-1');
        $civitasType = UserModel::loginData('civitas_type', 'Admin');
		if($civitasType == "DOSEN"){
            $filters['dosen'] = $civitasLoggedIn;
        }else if($civitasType == "MAHASISWA"){
            $filters['mahasiswa'] = $civitasLoggedIn;
        }
        $reviewCurriculums = $this->reviewCurriculum->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('reviewCurriculum', $reviewCurriculums);
        }

        $this->render('review_curriculum/index', compact('reviewCurriculums'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_REVIEW_CURRICULUM_VIEW);

        $curriculum = $this->curriculum->getById($id);

        $this->render('curriculum/view', compact('curriculum'));
    }

    /**
     * Show create Research.
     */
    public function create()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_REVIEW_CURRICULUM_CREATE);
        $civitasLogin = UserModel::loginData();
        $pembimbingId = '';
        $pembimbing = '';
        if($civitasLogin['civitas_type'] == 'MAHASISWA'){
            $student = $this->student->getById($civitasLogin['id_civitas']);
            $pembimbingId = $student['id_pembimbing'];
            $pembimbing = $student['nama_pembimbing'];
        }
        $users = $this->user->getAll(['status'=> UserModel::STATUS_ACTIVATED]);

        $this->render('review_curriculum/create', compact('users'));
    }

    /**
     * Save new Research data.
     */
    public function save()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_REVIEW_CURRICULUM_CREATE);

        if ($this->validate()) {
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $user = $this->input->post('user');
            $date = $this->input->post('date');
            $description = $this->input->post('description');

            
            $uploadedData = "";
            if (!empty($_FILES['attachment']['name'])) {
                $options = ['destination' => 'review_curriculum/' . date('Y/m')];
                if ($this->uploader->uploadTo('attachment', $options)) {
                    $uploadedData = $this->uploader->getUploadedData();
                    $avatar = $uploadedData['uploaded_path'];
                } else {
                    flash('danger', $this->uploader->getDisplayErrors(), '_back', 'review_curriculum/create');
                }
            }
            $this->db->trans_start();
            $this->reviewCurriculum->create([
                'title' => $title,
                'body' => $body,
                'date' => format_date($date),
                'writed_by' => $user,
                'attachment' => isset($uploadedData['uploaded_path'])?$uploadedData['uploaded_path']: "",
                'description' => $description,
            ]);


            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                flash('success', "Review Curriculum {$title} successfully created", 'review_curriculum');
            } else {
                flash('danger', "Create Review Curriculum failed, try again of contact administrator");
            }
        }
        $this->create();
    }
    /**
     * Show edit Curriculum form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_REVIEW_CURRICULUM_EDIT);

        $reviewCurriculum = $this->reviewCurriculum->getById($id);
        $users = $this->user->getAll(['status'=> UserModel::STATUS_ACTIVATED]);

        $this->render('review_curriculum/edit', compact('reviewCurriculum', 'users'));
    }

    /**
     * Save new Curriculum data.
     * @param $id
     */
    public function update($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_REVIEW_CURRICULUM_EDIT);

        if ($this->validate($this->_validation_rules($id))) {
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $user = $this->input->post('user');
            $date = $this->input->post('date');
            $description = $this->input->post('description');

            $uploadedData = "";
            if (!empty($_FILES['attachment']['name'])) {
                $options = ['destination' => 'review_curriculum/' . date('Y/m')];
                if ($this->uploader->uploadTo('attachment', $options)) {
                    $uploadedData = $this->uploader->getUploadedData();
                    $avatar = $uploadedData['uploaded_path'];
                } else {
                    flash('danger', $this->uploader->getDisplayErrors(), '_back', 'review_curriculum/edit/'.$id);
                }
            }
            $this->db->trans_start();
            
            $reviewCurriculum = $this->reviewCurriculum->getById($id);
            $this->reviewCurriculum->update([
                'title' => $title,
                'body' => $body,
                'date' => format_date($date),
                'writed_by' => $user,
                'attachment' => empty($uploadedData) ? $reviewCurriculum['attachment'] : $uploadedData['uploaded_path'],
                'description' => $description,
            ], $id);


            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                flash('success', "Review Curriculum {$title} successfully created", 'review_curriculum');
            } else {
                flash('danger', "Create Review Curriculum failed, try again of contact administrator");
            }
        }
        $this->edit($id);
    }

    /**
     * Perform deleting Research data.
     *
     * @param $id
     */
    public function delete($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_REVIEW_CURRICULUM_DELETE);

        $reviewCurriculum = $this->reviewCurriculum->getById($id);
        // push any status absent to history
        $this->statusHistory->create([
            'type' => StatusHistoryModel::TYPE_REVIEW_CURRICULUM,
            'id_reference' => $id,
            'status' => $reviewCurriculum['status'],
            'description' => "Review Curriculum is deleted",
            'data' => json_encode($reviewCurriculum)
        ]);

        if ($this->reviewCurriculum->delete($id, true)) {
            flash('warning', "Review Curriculum {$reviewCurriculum['title']} successfully deleted");
        } else {
            flash('danger', "Delete Review Curriculum failed, try again or contact administrator");
        }
        redirect('review_curriculum');
    }

    /**
     * Return general validation rules.
     *
     * @param array $params
     * @return array
     */
    protected function _validation_rules(...$params)
    {
        $id = isset($params[0]) ? $params[0] : 0;
        return [
            'title' => 'trim|required',
        ];
    }

}
