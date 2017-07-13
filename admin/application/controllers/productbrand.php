<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require APPPATH . '/libraries/BaseController.php';

class Productbrand extends BaseController {
	public function __construct(){
		parent::__construct();
		//call model inti
		$this->load->model('initdata_model');
		$this->load->model('productbrand_model');
		$this->load->model('products_model');
		$this->load->library('pagination');
		$this->isLoggedIn();

	}

	//page view
	public function index($page=0)
	{

		$config['base_url'] = base_url('productbrand/index');
		$config['total_rows'] = $this->productbrand_model->get_productbrand_count();
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
		$data['productbrand_list'] = $this->productbrand_model->get_productbrand($page, $config['per_page']);
		$data['links_pagination'] = $this->pagination->create_links();

		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);

		//call script
        $data['menu_id'] ='7';
		$data['content'] = 'productbrand';
		$data['script_file']= "js/product_add_js";
		$data['header'] = array('title' => 'productbrand| '.$this->config->item('sitename'),
								'description' =>  'productbrand| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);
	}


	//page search
	public function search()
	{

		$return_data = $this->productbrand_model->get_productbrand_search();
		$data['productbrand_list'] = $return_data['result_productbrand'];
		$data['data_search'] = $return_data['data_search'];
		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);

        $data['menu_id'] ='7';
		$data['content'] = 'productbrand';
		$data['script_file']= "js/product_add_js";
		$data['header'] = array('title' => 'productbrand| '.$this->config->item('sitename'),
								'description' =>  'productbrand| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);

	}

	//page edit
	public function edit($productbrand_id)
	{
		$this->isLoggedIn();
		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);
		$data['productbrand_data'] = $this->productbrand_model->get_productbrand_id($productbrand_id);
        $data['menu_id'] ='7';
		$data['content'] = 'productbrand_edit';
		$data['script_file']= "js/product_add_js";
		$data['header'] = array('title' => 'productbrand| '.$this->config->item('sitename'),
								'description' =>  'productbrand| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);

	}

	// update
	public function update($productbrand_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save productbrand
		$this->productbrand_model->update_productbrand($productbrand_id);

		if($productbrand_id!=""){
			redirect('productbrand/edit/'.$productbrand_id);
		}
		else {
			redirect('productbrand');
		}

	}

	// insert
	public function add()
	{
		date_default_timezone_set("Asia/Bangkok");
		//save document
		$productbrand_id ="";
		$productbrand_id = $this->productbrand_model->save_productbrand();

		if($document_id !=""){
			redirect('productbrand/edit/'.$productbrand_id);
		}
		else {
			redirect('productbrand');
		}
	}

}

/* End of file productbrand.php */
/* Location: ./application/controllers/productbrand.php */