<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property LecturerModel $lecturer
 * @property StudentModel $student
 * @property ResearchModel $research
 * @property DevotionModel $devotion
 * @property ExamExerciseModel $examExercise
 * Class Dashboard
 */
class Dashboard extends App_Controller
{
	/**
	 * Dashboard constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LecturerModel', 'lecturer');
		$this->load->model('StudentModel', 'student');
		$this->load->model('ResearchModel', 'research');
		$this->load->model('DevotionModel', 'devotion');
	}

	/**
	 * Show dashboard page.
	 */
	public function index()
	{
		$data = [
			'totalLecturer' => $this->lecturer->getBy([], 'COUNT'),
			'totalStudent' => $this->student->getBy([], 'COUNT'),
			'totalResearch' => $this->research->getBy([], 'COUNT'),
			'totalDevotion' => $this->devotion->getBy([], 'COUNT'),
		];

		$data['latestExams'] =  [];
		$data['activeTrainings'] = [];

		$this->render('dashboard/index', $data);
	}
}
