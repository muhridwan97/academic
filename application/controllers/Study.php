<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Study
 * @property LecturerModel $lecturer
 * @property StudyModel $study
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Study extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudyModel', 'study');
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
     * Show Study index page.
     */
    public function index()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_STUDY_VIEW);

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
        $studies = $this->study->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('study', $studies);
        }

        $this->render('study/index', compact('studies'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_STUDY_VIEW);

        $study = $this->study->getById($id);

        $this->render('study/view', compact('study'));
    }
    /**
     * Show edit Study form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_STUDY_EDIT);

        $study = $this->study->getById($id);

        $this->render('study/edit', compact('study'));
    }

    /**
     * Save new Study data.
     * @param $id
     */
    public function update($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_STUDY_EDIT);

        if ($this->validate($this->_validation_rules($id))) {
            if ($this->input->post('is_link')) {
                $name = $this->input->post('name');
                $description = $this->input->post('link');
            } else {
                $name = $this->input->post('name');
                $description = $this->input->post('description');
            }
            
            $study = $this->study->getById($id);

            $save = $this->study->update([
                'name' => $name,
                'description' => $description,
            ], $id);

            if ($save) {
                flash('success', "Study {$study['lecturer_name']} successfully updated", 'study');
            } else {
                flash('danger', "Update Study failed, try again of contact administrator");
            }
        }
        $this->edit($id);
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
            'name' => 'trim|required',
        ];
    }

}
