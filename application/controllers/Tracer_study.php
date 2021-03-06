<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class TracerStudy
 * @property LecturerModel $lecturer
 * @property TracerStudyModel $tracerStudy
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Tracer_study extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TracerStudyModel', 'tracerStudy');
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
     * Show TracerStudy index page.
     */
    public function index()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_VIEW);

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
        $tracerStudies = $this->tracerStudy->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('tracerstudy', $tracerStudies);
        }

        $this->render('tracer_study/index', compact('tracerStudies'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_VIEW);

        $tracerStudy = $this->tracerStudy->getById($id);

        $this->render('tracer_study/view', compact('tracerStudy'));
    }
    /**
     * Show edit tracerstudy form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_EDIT);

        $tracerStudy = $this->tracerStudy->getById($id);

        $this->render('tracer_study/edit', compact('tracerStudy'));
    }

    /**
     * Save new tracer_study data.
     * @param $id
     */
    public function update($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_EDIT);

        if ($this->validate($this->_validation_rules($id))) {
            if ($this->input->post('is_link')) {
                $name = $this->input->post('name');
                $description = $this->input->post('link');
            } else {
                $name = $this->input->post('name');
                $description = $this->input->post('description');
            }
            
            $tracerStudy = $this->tracerStudy->getById($id);

            $save = $this->tracerStudy->update([
                'name' => $name,
                'description' => $description,
            ], $id);

            if ($save) {
                flash('success', "Tracer study {$tracerStudy['lecturer_name']} successfully updated", 'tracer_study');
            } else {
                flash('danger', "Update Tracer study failed, try again of contact administrator");
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
