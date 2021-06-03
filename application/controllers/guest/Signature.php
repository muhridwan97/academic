<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Course
 * @property SignatureModel $signature
 * @property LecturerModel $lecturer
 * @property NotificationModel $notification
 * @property ResearchPermitModel $researchPermit
 * @property AssignmentLetterModel $assignmentLetter
 * @property Exporter $exporter
 * @property Uploader $uploader
 * @property Mailer $mailer
 */
class Signature extends App_Controller
{
	protected $layout = 'layouts/landing';
	/**
	 * Course constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SignatureModel', 'signature');
		$this->load->model('LecturerModel', 'lecturer');
		$this->load->model('NotificationModel', 'notification');
		$this->load->model('modules/Exporter', 'exporter');
		$this->load->model('modules/Uploader', 'uploader');
		$this->load->model('modules/Mailer', 'mailer');
		$this->load->model('notifications/CreateCourseNotification');
		$this->load->model('ResearchPermitModel', 'researchPermit');
		$this->load->model('AssignmentLetterModel', 'assignmentLetter');

		$this->setFilterMethods([
		]);
	}

	/**
     * Show Signature index page.
     */
    public function index()
    {
        $filters = get_url_param('code', 0);
        $signatures = $this->signature->getByCode($filters);
		// print_debug($signatures);
		$data['tujuan']='NOT FOUND';
		$data['signature_by']='NOT FOUND';
		switch ($signatures['type']) {
			case SignatureModel::TYPE_RESEARCH_PERMIT:
				$researchPermit = $this->researchPermit->getById($signatures['id_reference']);
				$lecturer = $this->lecturer->getById($signatures['id_lecturer']);
				$data['tujuan']='Surat : Surat Izin Penelitian <br>';
				$data['tujuan'].='No Surat : '.$researchPermit['no_letter'].'<br>';
				$data['signature_by'] = $lecturer['name'];
				break;
			case SignatureModel::TYPE_ASSIGNMENT_LETTER:
				$assignmentLetter = $this->assignmentLetter->getById($signatures['id_reference']);
				$lecturer = $this->lecturer->getById($signatures['id_lecturer']);
				$data['tujuan']='Surat : Permohonan Surat Tugas <br>';
				$data['tujuan'].='No Surat : '.$assignmentLetter['no_letter'].'<br>';
				$data['signature_by'] = $lecturer['name'];
				break;
			default:
				# code...
				break;
		}
        $this->render('signature/index', compact('data'));
    }
}