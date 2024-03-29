<?php

class Pages extends CI_Controller {

	public function view($page = 'home')
	{
			
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// 哇勒!我們沒有這個頁面!
			show_404();
		}

		$data['title'] = ucfirst($page); // 第一個字母大寫
		

		$this->load->helper('url');
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');

	}
}
?>
