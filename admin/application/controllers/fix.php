<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require APPPATH . '/libraries/BaseController.php';

class Fix extends BaseController {
	public function __construct(){
		parent::__construct();
		//call model inti
		$this->load->model('initdata_model');
		$this->load->model('fix_model');
		$this->load->model('products_model');
		$this->load->library('pagination');
		$this->isLoggedIn();

	}

	//page view
	public function index($page=0)
	{

		$config['base_url'] = base_url('fix/index');
		$config['total_rows'] = $this->fix_model->get_fix_count();
		$config['per_page'] = 10;
        /* This Application Must Be Used With BootStrap 3 *  */
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);
		$data['fix_list'] = $this->fix_model->get_fix($page, $config['per_page']);
		$data['links_pagination'] = $this->pagination->create_links();

		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);
		$data['type_list'] = $this->products_model->get_type();

		//call script
        $data['menu_id'] ='16';
		$data['content'] = 'fix';
		$data['script_file']= "js/product_add_js";
		$data['header'] = array('title' => 'fix| '.$this->config->item('sitename'),
								'description' =>  'fix| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);
	}


	//page search
	public function search()
	{

		$return_data = $this->fix_model->get_fix_search();
		$data['fix_list'] = $return_data['result_fix'];
		$data['data_search'] = $return_data['data_search'];
		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);

        $data['menu_id'] ='16';
		$data['content'] = 'fix';
		$data['script_file']= "js/product_add_js";
		$data['header'] = array('title' => 'fix| '.$this->config->item('sitename'),
								'description' =>  'fix| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);

	}

	//page edit
	public function edit($fix_id)
	{
		$this->isLoggedIn();
		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);
		$data['fix_data'] = $this->fix_model->get_fix_id($fix_id);
		$data['type_list'] = $this->products_model->get_type();
        $data['menu_id'] ='1';
		$data['content'] = 'fix_edit';
		$data['script_file']= "js/product_add_js";
		$data['header'] = array('title' => 'fix| '.$this->config->item('sitename'),
								'description' =>  'fix| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);

	}

	// update
	public function update($fix_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save fix
		$this->fix_model->update_fix($fix_id);

		if($fix_id!=""){
			redirect('fix/edit/'.$fix_id);
		}
		else {
			redirect('fix');
		}

	}

	// insert
	public function add()
	{
		date_default_timezone_set("Asia/Bangkok");
		//save document
		$fix_id ="";
		$fix_id = $this->fix_model->save_fix();

		if($document_id !=""){
			redirect('fix/edit/'.$fix_id);
		}
		else {
			redirect('fix');
		}
	}


}

/* End of file fix.php */
/* Location: ./application/controllers/fix.php */
