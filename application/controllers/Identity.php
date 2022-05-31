<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Identity
 * @property LecturerModel $lecturer
 * @property IdentityModel $identity
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Identity extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('IdentityModel', 'identity');
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
     * Show Identity index page.
     */
    public function index()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_IDENTITY_VIEW);

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
        $identities = $this->identity->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('identity', $identities);
        }

        $this->render('identity/index', compact('identities'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_IDENTITY_VIEW);

        $identity = $this->identity->getById($id);

        $this->render('identity/view', compact('identity'));
    }
    /**
     * Show edit Identity form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_IDENTITY_EDIT);

        $identity = $this->identity->getById($id);

        $this->render('identity/edit', compact('identity'));
    }

    /**
     * Save new Identity data.
     * @param $id
     */
    public function update($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_IDENTITY_EDIT);

        if ($this->validate($this->_validation_rules($id))) {
            if ($this->input->post('is_link')) {
                $name = $this->input->post('name');
                $description = $this->input->post('link');
            } else {
                $name = $this->input->post('name');
                $description = $this->input->post('description');
            }
            
            $identity = $this->identity->getById($id);

            $save = $this->identity->update([
                'name' => $name,
                'description' => $description,
            ], $id);

            if ($save) {
                flash('success', "Identity {$identity['lecturer_name']} successfully updated", 'identity');
            } else {
                flash('danger', "Update Identity failed, try again of contact administrator");
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
