<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Alumni
 * @property LecturerModel $lecturer
 * @property AlumniModel $alumni
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Alumni extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AlumniModel', 'alumni');
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
     * Show Alumni index page.
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
        $alumnis = $this->alumni->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('alumni', $alumnis);
        }

        $this->render('alumni/index', compact('alumnis'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_VIEW);

        $alumni = $this->alumni->getById($id);

        $this->render('alumni/view', compact('alumni'));
    }

    /**
     * Show create Alumni.
     */
    public function create()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_ALUMNI_CREATE);

        $this->render('alumni/create');
    }

    /**
     * Save new Alumni data.
     */
    public function save()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_ALUMNI_CREATE);

        if ($this->validate()) {
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $job = $this->input->post('job');
            $office_address = $this->input->post('office_address');
            $description = $this->input->post('description');

            $save = $this->alumni->create([
                'name' => $name,
                'address' => $address,
                'job' => $job,
                'office_address' => $office_address,
                'description' => $description,
            ]);

            if ($save) {
                flash('success', "Alumni {$name} successfully created", 'alumni');
            } else {
                flash('danger', "Create alumni failed, try again of contact administrator");
            }
        }
        $this->create();
    }

    /**
     * Show edit Alumni form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_EDIT);

        $alumni = $this->alumni->getById($id);

        $this->render('alumni/edit', compact('alumni'));
    }

    /**
     * Save new Alumni data.
     * @param $id
     */
    public function update($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_EDIT);

        if ($this->validate($this->_validation_rules($id))) {
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $job = $this->input->post('job');
            $office_address = $this->input->post('office_address');
            $description = $this->input->post('description');
            
            $alumni = $this->alumni->getById($id);

            $save = $this->alumni->update([
                'name' => $name,
                'address' => $address,
                'job' => $job,
                'office_address' => $office_address,
                'description' => $description,
            ], $id);

            if ($save) {
                flash('success', "Alumni {$alumni['name']} successfully updated", 'alumni');
            } else {
                flash('danger', "Update Alumni failed, try again of contact administrator");
            }
        }
        $this->edit($id);
    }


    /**
     * Perform deleting Alumni data.
     *
     * @param $id
     */
    public function delete($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_ALUMNI_DELETE);

        $alumni = $this->alumni->getById($id);
        // push any status absent to history
        $this->statusHistory->create([
            'type' => StatusHistoryModel::TYPE_ALUMNI,
            'id_reference' => $id,
            'status' => $alumni['status'],
            'description' => "Alumni is deleted",
            'data' => json_encode($alumni)
        ]);

        if ($this->alumni->delete($id, true)) {
            flash('warning', "Alumni {$alumni['name']} successfully deleted");
        } else {
            flash('danger', "Delete Alumni failed, try again or contact administrator");
        }
        redirect('alumni');
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
