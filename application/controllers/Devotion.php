<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Devotion
 * @property LecturerModel $lecturer
 * @property DevotionModel $devotion
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Devotion extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DevotionModel', 'devotion');
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
     * Show Devotion index page.
     */
    public function index()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DEVOTION_VIEW);

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
        $devotions = $this->devotion->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('devotion', $devotions);
        }

        $this->render('devotion/index', compact('devotions'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DEVOTION_VIEW);

        $devotion = $this->devotion->getById($id);

        $this->render('devotion/view', compact('devotion'));
    }

    /**
     * Show create Devotion.
     */
    public function create()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DEVOTION_CREATE);
        $civitasLogin = UserModel::loginData();
        $pembimbingId = '';
        $pembimbing = '';
        if($civitasLogin['civitas_type'] == 'MAHASISWA'){
            $student = $this->student->getById($civitasLogin['id_civitas']);
            $pembimbingId = $student['id_pembimbing'];
            $pembimbing = $student['nama_pembimbing'];
        }
        $lecturers = $this->lecturer->getAll(['status'=> LecturerModel::STATUS_ACTIVE]);

        $this->render('devotion/create', compact('lecturers'));
    }

    /**
     * Save new Devotion data.
     */
    public function save()
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DEVOTION_CREATE);

        if ($this->validate()) {
            $lecturerId = $this->input->post('lecturer');
            $activity = $this->input->post('activity');
            $location = $this->input->post('location');
            $sourceOfFunds = $this->input->post('source_of_funds');
            $year = $this->input->post('year');
            $proofLink = $this->input->post('proof_link');
            $description = $this->input->post('description');

            $lecturer = $this->lecturer->getById($lecturerId);
            $save = $this->devotion->create([
                'id_lecturer' => $lecturerId,
                'activity' => $activity,
                'location' => $location,
                'source_of_funds' => $sourceOfFunds,
                'year' => $year,
                'proof_link' => $proofLink,
                'description' => $description,
            ]);

            if ($save) {
                flash('success', "Devotion {$lecturer['name']} successfully created", 'devotion');
            } else {
                flash('danger', "Create devotion failed, try again of contact administrator");
            }
        }
        $this->create();
    }

    /**
     * Show edit Devotion form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DEVOTION_EDIT);

        $devotion = $this->devotion->getById($id);
        $lecturers = $this->lecturer->getAll(['status'=> StudentModel::STATUS_ACTIVE]);

        $this->render('devotion/edit', compact('lecturers', 'devotion'));
    }

    /**
     * Save new Devotion data.
     * @param $id
     */
    public function update($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DEVOTION_EDIT);

        if ($this->validate($this->_validation_rules($id))) {
            $lecturerId = $this->input->post('lecturer');
            $activity = $this->input->post('activity');
            $location = $this->input->post('location');
            $sourceOfFunds = $this->input->post('source_of_funds');
            $year = $this->input->post('year');
            $proofLink = $this->input->post('proof_link');
            $description = $this->input->post('description');

            $devotion = $this->devotion->getById($id);

            $save = $this->devotion->update([
                'id_lecturer' => $lecturerId,
                'activity' => $activity,
                'location' => $location,
                'source_of_funds' => $sourceOfFunds,
                'year' => $year,
                'proof_link' => $proofLink,
                'description' => $description,
            ], $id);

            if ($save) {
                flash('success', "Devotion {$devotion['lecturer_name']} successfully updated", 'devotion');
            } else {
                flash('danger', "Update Devotion failed, try again of contact administrator");
            }
        }
        $this->edit($id);
    }

    /**
     * Perform deleting Devotion data.
     *
     * @param $id
     */
    public function delete($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_DEVOTION_DELETE);

        $devotion = $this->devotion->getById($id);
        // push any status absent to history
        $this->statusHistory->create([
            'type' => StatusHistoryModel::TYPE_DEVOTION,
            'id_reference' => $id,
            'status' => $devotion['status'],
            'description' => "Devotion is deleted",
            'data' => json_encode($devotion)
        ]);

        if ($this->devotion->delete($id, true)) {
            flash('warning', "Devotion {$devotion['lecturer_name']} successfully deleted");
        } else {
            flash('danger', "Delete Devotion failed, try again or contact administrator");
        }
        redirect('devotion');
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
            'lecturer' => 'trim|required',
            'activity' => 'trim|required',
            'location' => 'trim|required',
            'source_of_funds' => 'trim|required',
            'year' => 'trim|required',
            'proof_link' => 'trim|required',
        ];
    }

}
