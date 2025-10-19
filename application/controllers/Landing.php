<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('ModelLanding');
    }

	public function index()
	{
		$data['page_title'] = "Home";
		$data['active_menu'] = "home";
		$data['sliders'] = $this->ModelLanding->getAllSliders();
		$data['units'] = $this->ModelLanding->getAllUnits();
		$data['merks'] = $this->ModelLanding->getAllMerks();
		$data['profiles'] = $this->ModelLanding->getMyProfile();
		$data['numberactive'] = $this->ModelLanding->getActiveNumber();
		$data['whapsapp'] = $this->ModelLanding->getActiveWhatsapp();



		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', $data);
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('templates/landing/landing_footer');
	}

	public function detailproduct($id_unit)
	{
		$data['produk'] = $this->ModelLanding->getUnitById($id_unit);
		$data['merks'] = $this->ModelLanding->getAllMerks();
		$data['profiles'] = $this->ModelLanding->getMyProfile();
		$data['numberactive'] = $this->ModelLanding->getActiveNumber();
		$data['whapsapp'] = $this->ModelLanding->getActiveWhatsapp();
		
		

		if (!$data['produk']) {
			show_404();
		}

		// Ambil produk related berdasarkan merk yang sama
		$data['related'] = $this->ModelLanding->getRelatedUnits($data['produk']['id_merk'], $id_unit);
		$data['numberactive'] = $this->ModelLanding->getActiveNumber();
		$data['whapsapp'] = $this->ModelLanding->getActiveWhatsapp();

		$data['page_title'] = "Detail Product";
		$data['active_menu'] = "home";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', $data);
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/detail-product/index');
		$this->load->view('templates/landing/landing_footer');
	}

	public function about()
	{
		$data['merks'] = $this->ModelLanding->getAllMerks();
		$data['profiles'] = $this->ModelLanding->getMyProfile();
		$data['numberactive'] = $this->ModelLanding->getActiveNumber();
		$data['whapsapp'] = $this->ModelLanding->getActiveWhatsapp();
		$data['page_title'] = "Tentang Kami";
		$data['active_menu'] = "about";
		


		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/about/index');
		$this->load->view('templates/landing/landing_footer');
	}


	public function stocks($id_merk)
	{	
		$data['stocksbymerk'] = $this->ModelLanding->getUnitsByMerk($id_merk);
		$data['merk'] = $this->ModelLanding->getMerkById($id_merk);
		// ini nanti di query
		$data['merks'] = $this->ModelLanding->getAllMerks();
		$data['profiles'] = $this->ModelLanding->getMyProfile();
		$data['numberactive'] = $this->ModelLanding->getActiveNumber();
		$data['whapsapp'] = $this->ModelLanding->getActiveWhatsapp();

		$data['page_title'] = "Stok Mobil";
		$data['active_menu'] = "stok";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/stocks/index');
		$this->load->view('templates/landing/landing_footer');
    }

	public function terms(){
		$data['merks'] = $this->ModelLanding->getAllMerks();
		$data['profiles'] = $this->ModelLanding->getMyProfile();
		$data['numberactive'] = $this->ModelLanding->getActiveNumber();
		$data['whapsapp'] = $this->ModelLanding->getActiveWhatsapp();
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
		$data['merks'] = $this->ModelLanding->getAllMerks();
		$data['profiles'] = $this->ModelLanding->getMyProfile();
		$data['numberactive'] = $this->ModelLanding->getActiveNumber();
		$data['whapsapp'] = $this->ModelLanding->getActiveWhatsapp();
		$data['page_title'] = "Kontak";
		$data['active_menu'] = "contact";

		$this->load->view('templates/landing/landing_top_header', $data);
		$this->load->view('templates/landing/landing_header', );
		$this->load->view('templates/landing/landing_nav', $data);
		$this->load->view('landing/contact/index');
		$this->load->view('templates/landing/landing_footer');
	}
}

