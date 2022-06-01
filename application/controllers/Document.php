<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Document
 * @property LecturerModel $lecturer
 * @property DocumentModel $document
 * @property StudentModel $student
 * @property StatusHistoryModel $statusHistory
 * @property DepartmentModel $department
 * @property UserModel $user
 * @property Exporter $exporter
 * @property Mailer $mailer
 * @property Uploader $uploader
 */
class Document extends App_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DocumentModel', 'document');
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
     * Show Document index page.
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
        $documents = $this->document->getAll($filters);

        if ($export) {
            $this->exporter->exportFromArray('document', $documents);
        }

        $this->render('document/index', compact('documents'));
    }

    /**
     * Show Skripsi data.
     *
     * @param $id
     */
    public function view($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_VIEW);

        $document = $this->document->getById($id);

        $this->render('document/view', compact('document'));
    }
    /**
     * Show edit Document form.
     * @param $id
     */
    public function edit($id)
    {
        AuthorizationModel::mustAuthorized(PERMISSION_CONTENT_EDIT);

        $document = $this->document->getById($id);

        $this->render('document/edit', compact('document'));
    }

    /**
     * Save new Document data.
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
            
            $document = $this->document->getById($id);

            $save = $this->document->update([
                'name' => $name,
                'description' => $description,
            ], $id);

            if ($save) {
                flash('success', "Document {$document['lecturer_name']} successfully updated", 'document');
            } else {
                flash('danger', "Update Document failed, try again of contact administrator");
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
