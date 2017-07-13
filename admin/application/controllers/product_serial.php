<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require APPPATH . '/libraries/BaseController.php';

class Product_serial extends BaseController {
	public function __construct(){
		parent::__construct();
		//call model inti
		$this->load->model('initdata_model');
		$this->load->model('product_serial_model');
		$this->load->model('products_model');
		$this->load->library('pagination');
		$this->isLoggedIn();

	}

	//page view
	public function index($page=0)
	{

		$config['base_url'] = base_url('product_serial/index');
		$config['total_rows'] = $this->product_serial_model->get_product_serial_count();
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
		$data['product_serial_list'] = $this->product_serial_model->get_product_serial($page, $config['per_page']);
		$data['links_pagination'] = $this->pagination->create_links();

		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);
		$data['type_list'] = $this->products_model->get_type();

		//call script
        $data['menu_id'] ='24';
		$data['content'] = 'product_serial';
		$data['script_file']= "js/serial_js";
		$data['header'] = array('title' => 'product_serial| '.$this->config->item('sitename'),
								'description' =>  'product_serial| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);
	}

	//page search
	public function search()
	{

		$return_data = $this->product_serial_model->get_product_serial_search();
		$data['product_serial_list'] = $return_data['result_product_serial'];
		$data['data_search'] = $return_data['data_search'];
		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);

        $data['menu_id'] ='24';
		$data['content'] = 'product_serial';
		$data['script_file']= "js/serial_js";
		$data['header'] = array('title' => 'product_serial| '.$this->config->item('sitename'),
								'description' =>  'product_serial| '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);

	}

	public function get_product_serial_history()
	{
		$value = json_decode(file_get_contents("php://input"));
		$data['serial'] =  $this->product_serial_model->get_product_serial_history($value->product_id, $value->serial_number);
		print json_encode($data['serial']);

	}


}

/* End of file product_serial.php */
/* Location: ./application/controllers/product_serial.php */
