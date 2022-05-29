<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property ResearchModel $research
 * @property DevotionModel $devotion
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
		$this->load->model('DevotionModel', 'devotion');

		$this->setFilterMethods([
			'research' => 'GET',
			'devotion' => 'GET',
		]);
	}

	/**
	 * Show dashboard page.
	 */
	public function index()
	{
		$researches = $this->research->getAll(['status'=> ResearchModel::STATUS_ACTIVE, 'limit' => 5]);
		$devotions = $this->devotion->getAll(['status'=> DevotionModel::STATUS_ACTIVE, 'limit' => 5]);

		$this->render('landing/index', compact('researches','devotions'));
	}

	public function research()
	{
		$researches = $this->research->getAll(['status'=> ResearchModel::STATUS_ACTIVE]);
		$this->render('landing/research', compact('researches'));
	}

	public function devotion()
	{
		$devotions = $this->devotion->getAll();
		$this->render('landing/devotion', compact('devotions'));
	}
}
