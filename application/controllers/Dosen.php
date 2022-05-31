<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Dosen
 * @property LecturerModel $lecturer
 * @property DosenModel $dosen
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Dosen extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DosenModel', 'dosen');
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
     * Show Dosen index page.
     */
    public function index()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DOSEN_VIEW);

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
        $dosens = $this->dosen->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('dosen', $dosens);
        }

        $this->render('dosen/index', compact('dosens'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DOSEN_VIEW);

        $dosen = $this->dosen->getById($id);

        $this->render('dosen/view', compact('dosen'));
    }
    /**
     * Show edit Dosen form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DOSEN_EDIT);

        $dosen = $this->dosen->getById($id);

        $this->render('dosen/edit', compact('dosen'));
    }

    /**
     * Save new Dosen data.
     * @param $id
     */
    public function update($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DOSEN_EDIT);

        if ($this->validate($this->_validation_rules($id))) {
            if ($this->input->post('is_link')) {
                $name = $this->input->post('name');
                $description = $this->input->post('link');
            } else {
                $name = $this->input->post('name');
                $description = $this->input->post('description');
            }
            
            $dosen = $this->dosen->getById($id);

            $save = $this->dosen->update([
                'name' => $name,
                'description' => $description,
            ], $id);

            if ($save) {
                flash('success', "Dosen {$dosen['lecturer_name']} successfully updated", 'dosen');
            } else {
                flash('danger', "Update Dosen failed, try again of contact administrator");
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
