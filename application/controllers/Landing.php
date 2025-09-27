<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function index()
	{
		$data['page_title'] = "Home";
		$data['active_menu'] = "home";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/index');
		$this->load->view('templates/landing/landing_footer');
	}

	public function detailproduct()
	{
		$data['page_title'] = "Detail Product";
		$data['active_menu'] = "home";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/detail-product/index');
		$this->load->view('templates/landing/landing_footer');
	}

	public function about()
	{
		$data['page_title'] = "Tentang Kami";
		$data['active_menu'] = "about";


		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/about/index');
		$this->load->view('templates/landing/landing_footer');
	}


	public function stocks()
	{
		// ini nanti di query

		$data['page_title'] = "Stok Mobil";
		$data['active_menu'] = "stok";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/stocks/index');
		$this->load->view('templates/landing/landing_footer');
    }

	public function terms()
	{
		$data['page_title'] = "Syarat Ketentuan";
		$data['active_menu'] = "terms";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/terms/index');
		$this->load->view('templates/landing/landing_footer');
	}

	public function contact()
	{
		$data['page_title'] = "Kontak";
		$data['active_menu'] = "contact";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/contact/index');
		$this->load->view('templates/landing/landing_footer');
	}
}

