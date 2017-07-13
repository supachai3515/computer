<?php
defined('BASEPATH') OR exit('No direct script access allowed'); require APPPATH . '/libraries/BaseController.php';

class Slider extends BaseController {
	public function __construct(){
		parent::__construct();
		//call model inti
		$this->load->model('initdata_model');
		$this->load->model('slider_model');
		$this->load->library('pagination');
		$this->isLoggedIn();

	}

	//page view
	public function index($page=0)
	{

		$config['base_url'] = base_url('slider/index');
		$config['total_rows'] = $this->slider_model->get_slider_count();
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
		$data['slider_list'] = $this->slider_model->get_slider($page, $config['per_page']);
		$data['links_pagination'] = $this->pagination->create_links();

		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);

		//call script
        $data['menu_id'] ='29';
		$data['content'] = 'slider';
		$data['header'] = array('title' => 'slider | '.$this->config->item('sitename'),
								'description' =>  'slider | '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);
	}


	//page edit
	public function edit($slider_id)
	{
		$this->isLoggedIn();
		$data['global'] = $this->global; $data['menu_list'] = $this->initdata_model->get_menu($data['global']['menu_group_id']);
		$data['slider_data'] = $this->slider_model->get_slider_id($slider_id);
        $data['menu_id'] ='29';
		$data['content'] = 'slider_edit';
		$data['header'] = array('title' => 'slider | '.$this->config->item('sitename'),
								'description' =>  'slider | '.$this->config->item('tagline'),
								'author' => $this->config->item('author'),
								'keyword' =>  'cyberbatt');
		$this->load->view('template/layout', $data);

	}

	// update
	public function update($slider_id)
	{
		date_default_timezone_set("Asia/Bangkok");
		//save slider
		$this->slider_model->update_slider($slider_id);

		if($slider_id!=""){
			redirect('slider/edit/'.$slider_id);
		}
		else {
			redirect('slider');
		}

	}


}

/* End of file slider.php */
/* Location: ./application/controllers/slider.php */