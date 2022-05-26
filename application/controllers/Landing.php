<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property ResearchModel $research
 * Class Dashboard
 */
class Landing extends App_Controller
{
	protected $layout = 'layouts/landing';
	/**
	 * Dashboard constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ResearchModel', 'research');

		$this->setFilterMethods([
			'research' => 'GET',
		]);
	}

	/**
	 * Show dashboard page.
	 */
	public function index()
	{
		$this->render('landing/index');
	}

	public function research()
	{
		$researches = $this->research->getAll();
		$this->render('landing/research', compact('researches'));
	}
}
