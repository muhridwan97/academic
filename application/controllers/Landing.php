<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property ResearchModel $research
 * @property DevotionModel $devotion
 * @property AlumniModel $alumni
 * @property IdentityModel $identity
 * @property ReviewCurriculumModel $reviewCurriculum
 * @property LecturerModel $lecturer
 * @property StudyModel $study
 * @property JournalModel $journal
 * @property TracerStudyModel $tracerStudy
 * @property DocumentModel $document
 * @property LaboratoryModel $laboratory
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
		$this->load->model('AlumniModel', 'alumni');
		$this->load->model('IdentityModel', 'identity');
        $this->load->model('ReviewCurriculumModel', 'reviewCurriculum');
		$this->load->model('LecturerModel', 'lecturer');
		$this->load->model('StudyModel', 'study');
		$this->load->model('JournalModel', 'journal');
		$this->load->model('TracerStudyModel', 'tracerStudy');
		$this->load->model('DocumentModel', 'document');
		$this->load->model('LaboratoryModel', 'laboratory');

        $this->load->library('pagination');
		$this->setFilterMethods([
			'research' => 'GET',
			'devotion' => 'GET',
			'alumni' => 'GET',
			'visi_misi' => 'GET',
			'learning_outcome' => 'GET',
			'review_curriculum' => 'GET',
			'review_curriculum_view' => 'GET',
			'lecturer_view' => 'GET',
			'rps_semester_satu' => 'GET',
			'rps_semester_dua' => 'GET',
			'rps_semester_tiga' => 'GET',
			'rps_semester_empat' => 'GET',
			'rps_semester_lima' => 'GET',
			'rps_semester_enam' => 'GET',
			'rps_semester_tujuh' => 'GET',
			'rps_semester_delapan' => 'GET',
			'ppm_kelas_x' => 'GET',
			'ppm_kelas_xi' => 'GET',
			'ppm_kelas_xii' => 'GET',
			'rps_pilihan' => 'GET',
		]);
	}

	/**
	 * Show dashboard page.
	 */
	public function index()
	{
		$researches = $this->research->getAll(['status'=> ResearchModel::STATUS_ACTIVE, 'limit' => 5]);
		$devotions = $this->devotion->getAll(['status'=> DevotionModel::STATUS_ACTIVE, 'limit' => 5]);
		$newPosts = $this->reviewCurriculum->getAll(['limit' => 2]);
		$postPopulars = $this->reviewCurriculum->getAll([
			'order_method' => 'desc',
			'sort_by' => 'count_view',
			'limit' => 2,
		]);

		$this->render('landing/index', compact('researches','devotions', 'newPosts', 'postPopulars'));
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

	public function alumni()
	{
		$alumnis = $this->alumni->getAll();
		$this->render('landing/alumni', compact('alumnis'));
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
		$this->reviewCurriculum->updating([
			'count_view' => ++$reviewCurriculum['count_view'],
		], $id);
		$this->render('landing/review_curriculum_view', compact('reviewCurriculum'));
	}

	public function lecturer_view($id)
	{
        $lecturer = $this->lecturer->getById($id);
		$this->render('landing/lecturer_view', compact('lecturer'));
	}
	
	public function rps_semester_satu()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-satu'],true);
		$this->render('landing/rps_semester_satu', compact('study'));
	}
	
	public function rps_semester_dua()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-dua'],true);
		$this->render('landing/rps_semester_dua', compact('study'));
	}
	
	public function rps_semester_tiga()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-tiga'],true);
		$this->render('landing/rps_semester_tiga', compact('study'));
	}
	
	public function rps_semester_empat()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-empat'],true);
		$this->render('landing/rps_semester_empat', compact('study'));
	}
	
	public function rps_semester_lima()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-lima'],true);
		$this->render('landing/rps_semester_lima', compact('study'));
	}
	
	public function rps_semester_enam()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-enam'],true);
		$this->render('landing/rps_semester_enam', compact('study'));
	}
	
	public function rps_semester_tujuh()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-tujuh'],true);
		$this->render('landing/rps_semester_tujuh', compact('study'));
	}
	
	public function rps_semester_delapan()
	{
		$study = $this->study->getBy(['slug'=>'rps-semester-delapan'],true);
		$this->render('landing/rps_semester_delapan', compact('study'));
	}
	
	public function ppm_kelas_x()
	{
		$study = $this->study->getBy(['slug'=>'ppm-kelas-x'],true);
		$this->render('landing/ppm_kelas_x', compact('study'));
	}
	
	public function ppm_kelas_xi()
	{
		$study = $this->study->getBy(['slug'=>'ppm-kelas-xi'],true);
		$this->render('landing/ppm_kelas_xi', compact('study'));
	}
	
	public function ppm_kelas_xii()
	{
		$study = $this->study->getBy(['slug'=>'ppm-kelas-xii'],true);
		$this->render('landing/ppm_kelas_xii', compact('study'));
	}
	
	public function rps_pilihan()
	{
		$study = $this->study->getBy(['slug'=>'rps-pilihan'],true);
		$this->render('landing/rps_pilihan', compact('study'));
	}

	//penyederhanaan
	public function content($slug)
	{
		$content = $this->content->getBy(['slug'=> $slug],true);
		$this->render('landing/content', compact('study'));
	}
}
