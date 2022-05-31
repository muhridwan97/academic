<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property ResearchModel $research
 * @property DevotionModel $devotion
 * @property IdentityModel $identity
 * @property ReviewCurriculumModel $reviewCurriculum
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
		$this->load->model('IdentityModel', 'identity');
        $this->load->model('ReviewCurriculumModel', 'reviewCurriculum');

        $this->load->library('pagination');
		$this->setFilterMethods([
			'research' => 'GET',
			'devotion' => 'GET',
			'visi_misi' => 'GET',
			'learning_outcome' => 'GET',
			'review_curriculum' => 'GET',
			'review_curriculum_view' => 'GET',
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

	public function visi_misi()
	{
		$identity = $this->identity->getBy(['slug'=>'visi-misi'],true);
		$this->render('landing/visi_misi', compact('identity'));
	}
	public function learning_outcome()
	{
		$identity = $this->identity->getBy(['slug'=>'learning-outcome'],true);
		$this->render('landing/learning_outcome', compact('identity'));
	}

	public function review_curriculum()
	{
		// $filters = array_merge($_GET, ['page' => get_url_param('page', 1)]);
        // $reviewCurriculum = $this->reviewCurriculum->getAll($filters);

		
        $reviewCurriculum = $this->reviewCurriculum->getAll();
		
		//konfigurasi pagination
        $config['base_url'] = site_url('landing/review_curriculum'); //site url
        $config['total_rows'] = count($reviewCurriculum); //total row
        $config['per_page'] = 5 ;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->reviewCurriculum->get_review_curriculum_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
		
		$this->render('landing/review_curriculum', $data);
	}

	public function review_curriculum_view($id)
	{
        $reviewCurriculum = $this->reviewCurriculum->getById($id);
		$this->render('landing/review_curriculum_view', compact('reviewCurriculum'));
	}
}
