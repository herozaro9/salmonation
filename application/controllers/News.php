<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	private function load($title = '', $datapath = '')
	{
		if($this->uri->segment(1) == 'blog' && $this->uri->segment(2) == 'detail'){
			$slug = $this->uri->segment(3);
			$getdetail = $this->db->query("SELECT * FROM blog where slug='$slug' ORDER BY blog_id DESC LIMIT 1")->result_array();
			if($getdetail){
				$detail = $getdetail[0];
			}else{
				$detail = $getdetail[0];
			}
		}else{
				$detail = "";
		}
		$page = array(
			"css" => $this->load->view('template/main_css', array("title" => $title, "detail" => $detail), true),
			"header" => $this->load->view('template/header', false, true),
			"js" => $this->load->view('template/main_js', false, true),
			"footer" => $this->load->view('template/footer', false, true)
		);
		return $page;
	}

	public function index(){
		$jumlah_data = $this->jumlah_data();
		$config['base_url'] = base_url().'blog/pages';
		$config['total_rows'] = $jumlah_data - 8;
		$config['per_page'] = 9;
		$from = $this->uri->segment(2);
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
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 8;

		$data['blog'] = $this->data($config["per_page"], $data['page']);           
		$data['lastblog'] = $this->db->query("SELECT * FROM blog WHERE status='1' ORDER BY blog_id DESC LIMIT 1")->result_array();           
		$data['blogsix'] = $this->db->query("SELECT * FROM blog WHERE status='1' ORDER BY blog_id DESC LIMIT 7 OFFSET 1")->result_array();
		$data['pagination'] = $this->pagination->create_links();
		$path = "";
		$datasend = array(
			"page" => $this->load("Blog", $path),
			"content" =>$this->load->view('blog/index', $data, true)
		);
		$this->load->view('template/template', $datasend);
	}

	public function pages(){
		redirect('blog', 'refresh');
	}

	public function kategori($kategori){
		$jumlah_data = $this->jumlah_data_kategori($kategori);
		$config['base_url'] = base_url().'blog/kategori/'.$kategori;
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 9;
		$from = $this->uri->segment(4);
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
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['blog'] = $this->data_withkategori($config["per_page"], $data['page'], $kategori);           
		$data['kategori'] = $kategori;           
		$data['pagination'] = $this->pagination->create_links();
		$path = "";
		$datasend = array(
			"page" => $this->load("Kategori " . $kategori, $path),
			"content" =>$this->load->view('blog/kategori', $data, true)
		);
		$this->load->view('template/template', $datasend);
	}

	public function detail($slug){
		$getdetail = $this->db->query("SELECT * FROM blog where slug='$slug' ORDER BY blog_id DESC LIMIT 1")->result_array();
		if($getdetail){
			$kategori = $getdetail[0]['category'];
			$blog_id = $getdetail[0]['blog_id'];
			$visited = $getdetail[0]['visited'];
			$title = $getdetail[0]['title'];
			$path = "";
			$datasend = array(
				'detail' => $getdetail,
				'kategori' => $this->db->query("SELECT DISTINCT category as kategori, COUNT(blog_id) as total FROM blog GROUP BY category")->result_array(),
				'lainnya' => $this->db->query("SELECT * FROM blog WHERE blog_id !='$blog_id' ORDER BY rand() DESC LIMIT 7")->result_array()
			);

			$this->db->where('blog_id', $blog_id);
			$this->db->update('blog', array('visited'=> $visited+1));
			$data = array(
				"page" => $this->load($title, $path),
				"content" =>$this->load->view('blog/detail', $datasend, true)
			);
			$this->load->view('template/template', $data);
		}else{
			redirect('blog', 'refresh');
		}
	}

	public function search(){
		$search = $this->input->get('q');
		$jumlah_data = $this->jumlah_data_search($search);
		$config['base_url'] = base_url().'blog/search?='.$search;
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 6;
		$from = $this->uri->segment(3);
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
		$config['next_tagl_close']  = '<span aria-hi	dden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->paginationsearch->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['blog'] = $this->data_withsearch($config["per_page"], $data['page'], $search);           
		$data['search'] = $search;           
		$data['pagination'] = $this->paginationsearch->create_links();
		$data['blogsix'] = $this->db->query("SELECT * FROM blog WHERE status='1' ORDER BY blog_id DESC LIMIT 7")->result_array();
		$data['kategori'] = $this->db->query("SELECT DISTINCT category as kategori, COUNT(blog_id) as total FROM blog GROUP BY category")->result_array();
		$path = "";
		$datasend = array(
			"page" => $this->load("Pencarian " . $search, $path),
			"content" =>$this->load->view('blog/search', $data, true)
		);
		$this->load->view('template/template', $datasend);
	}

	function jumlah_data(){
		return $this->db->order_by('blog_id', "DESC")->order_by('status', '1')->get('blog')->num_rows();
	}

	function jumlah_data_kategori($kategori){
		return $this->db->order_by('blog_id', "DESC")->where('category', $kategori)->where('status', '1')->get('blog')->num_rows();
	}

	function jumlah_data_search($search){
		return $this->db->order_by('blog_id', "DESC")->where('status', '1')->like('content', $search, 'both')->get('blog')->num_rows();
	}

	function data($number,$offset){
		return $query = $this->db->order_by('blog_id', "DESC")->where('status', '1')->get('blog',$number,$offset)->result_array();		
	}

	function data_withkategori($number,$offset,$kategori){
		return $query = $this->db->order_by('blog_id', "DESC")->where('category', $kategori)->where('status', '1')->get('blog',$number,$offset)->result_array();		
	}

	function data_withsearch($number,$offset,$search){
		return $query = $this->db->order_by('blog_id', "DESC")->where('status', '1')->like('content', $search, 'both')->get('blog',$number,$offset)->result_array();		
	}
}
?>