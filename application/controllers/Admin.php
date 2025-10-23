<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('AdminKelolaProducts');
        $this->load->model('AdminMerk');
        $this->load->model('AdminTahun');
        $this->load->model('AdminGambar');
        $this->load->model('AdminKelolaMerk');
    }

    public function index()
    {   
        $this->load->model('AdminDashboard');
        $data['page'] = 'dashboard';

        $data['totalunits'] = $this->AdminDashboard->getCountAllUnits();
        $data['totalmerk'] = $this->AdminDashboard->getCountAllMerk();
        $data['totalsliders'] = $this->AdminDashboard->getCountAllSlider();


        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/admin_footer');
    }


    public function products() {
        $data['page'] = 'stocks';
        $data['products'] = $this->AdminKelolaProducts->getAllProducts();

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/stock-mobil/index', $data);
        $this->load->view('templates/admin/admin_footer');
    }


    public function tambah_product(){

        $data['page'] = 'stocks';
        $data['progress'] = 'data_unit';

        // Validasi form input teks
        $this->form_validation->set_rules('namaUnit', 'name of unit', 'required');
        $this->form_validation->set_rules('merk', 'merk', 'required');
        $this->form_validation->set_rules('warna', 'warna', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('transmisi', 'transmisi', 'required');


        $data['merk']  = $this->AdminMerk->getAllMerk();
        $data['years'] = $this->AdminTahun->getYears();

        if ($this->form_validation->run() == FALSE) {

            // Reload form beserta value yang udah diketik user
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/stock-mobil/tambah-mobil/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {
            $id_unit = $this->AdminKelolaProducts->insertUnit();
            redirect('admin/product_images/'.$id_unit);
        }
    }

    public function product_images($id_unit){
        $data['page'] = 'stocks';
        $data['progress'] = 'gambar_unit';

        $data['units'] = $this->AdminKelolaProducts->GetNameUnit($id_unit);

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/stock-mobil/tambah-mobil/add_images', $data);
        $this->load->view('templates/admin/admin_footer');
    }

    
    public function uploadImage() { 
        $id_unit = $this->input->post('id_unit');
        $files   = $_FILES;

        $count = count($_FILES['files']['name']);
        $upload_path = './storage/units/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }

        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;

        $allowed_extensions = ['jpg','jpeg','png']; // ✅ list ekstensi yang boleh
        $this->load->library('upload');

        $errors   = [];
        $uploaded = 0;
        $hasFile  = false;

        // ✅ Cek apakah user memilih file
        for ($i = 0; $i < $count; $i++) {
            if (!empty($files['files']['name'][$i])) {
                $hasFile = true;
                break;
            }
        }

        if (!$hasFile) {
            $this->session->set_flashdata('error', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Terjadi Kesalahan, silahkan coba lagi.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('admin/product_images/'.$id_unit);
            return;
        }

        // Proses upload
        for ($i = 0; $i < $count; $i++) {
            if (!empty($files['files']['name'][$i])) {

                $originalName = $files['files']['name'][$i];
                $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

                // Validasi ekstensi manual
                if (!in_array($ext, $allowed_extensions)) {
                    $errors[] = "$originalName : ekstensi file tidak diizinkan.";
                    continue;
                }

                $_FILES['file']['name']     = $files['files']['name'][$i];
                $_FILES['file']['type']     = $files['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
                $_FILES['file']['error']    = $files['files']['error'][$i];
                $_FILES['file']['size']     = $files['files']['size'][$i];

                $newName = uniqid('img_').'.'.$ext;
                $config['file_name'] = $newName;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $file_name  = $uploadData['file_name'];

                    $this->db->insert('gambar', [
                        'id_unit'     => $id_unit,
                        'nama_gambar' => $file_name,
                        'thumbnail'   => 'not_set',
                        'status_gambar' => 'deactive'
                    ]);

                    $uploaded++;
                } else {
                    $errors[] = $originalName.' : '.$this->upload->display_errors('', '');
                }
            }
        }

        // Tampilkan pesan sesuai hasil upload
        if ($uploaded === 0) {
            $this->session->set_flashdata('error', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                . (!empty($errors) ? implode('<br>', $errors) : 'Tidak ada file yang berhasil diupload.') .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            $alertMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            '.$uploaded.' gambar berhasil diupload!';
            if (!empty($errors)) {
                $alertMsg .= '<br><span class="text-danger">'.implode('<br>', $errors).'</span>';
            }
            $alertMsg .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            $this->session->set_flashdata('success', $alertMsg);
        }

        redirect('admin/product_thumbnail/'.$id_unit);
    }




    public function product_thumbnail($id_unit){
        $data['page'] = 'stocks';;

        $data['units']    = $this->AdminKelolaProducts->GetNameUnit($id_unit);
        $data['gambars']  = $this->AdminGambar->getGambarByUnit($id_unit);

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/stock-mobil/tambah-mobil/set_thumbnail', $data);
        $this->load->view('templates/admin/admin_footer');
    }


    public function set_thumbnail(){
        $id_unit    = $this->input->post('id_unit');
        $id_gambar  = $this->input->post('thumbnail');

        // Cek kalau gak ada yang dipilih
        if (empty($id_gambar)) {
            $this->session->set_flashdata('error', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Gagal! Kamu belum memilih gambar untuk thumbnail.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('admin/product_thumbnail/'.$id_unit);
            return;
        }

        // Reset semua gambar unit jadi 'not_set'
        $this->db->where('id_unit', $id_unit);
        $this->db->update('gambar', ['thumbnail' => 'not_set', 'status_gambar' => 'deactive']);

        // Set thumbnail yang dipilih
        $this->db->where('id_gambar', $id_gambar);
        $this->db->update('gambar', ['thumbnail' => 'set', 'status_gambar' => 'active']);
        $this->AdminKelolaProducts->updateStatusUnit($id_unit);

        // Flash message sukses
        $this->session->set_flashdata('flash', 'Unit baru berhasil ditambahkan!.');
        $this->session->set_flashdata('flash_type', 'success');
        redirect('admin/products');
    }


    public function hapus_unit($id_unit){
        $hapus = $this->AdminKelolaProducts->delete_unit($id_unit);

        if ($hapus) {
            $this->session->set_flashdata('flash', 'Unit berhasil dihapus!.');
            $this->session->set_flashdata('flash_type', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Unit gagal dihapus!.');
            $this->session->set_flashdata('flash_type', 'warning');
        }

    redirect('admin/products');
    }



    // edit unit
    public function edit_data_unit($id_unit){
        $data['page'] = 'stocks';
        $data['merk']  = $this->AdminMerk->getAllMerk();
        $data['years'] = $this->AdminTahun->getYears();
        $data['units'] = $this->AdminKelolaProducts->GetUnitById($id_unit);

        // Validasi form input teks
        $this->form_validation->set_rules('namaUnit', 'name of unit', 'required');
        $this->form_validation->set_rules('merk', 'merk', 'required');
        $this->form_validation->set_rules('warna', 'warna', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('transmisi', 'transmisi', 'required');
        if ($this->form_validation->run() == FALSE) {

            // Reload form beserta value yang udah diketik user
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/stock-mobil/edit-mobil/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {
            $this->AdminKelolaProducts->updateUnit($id_unit);
            $this->session->set_flashdata('flash', 'Data unit berhasil diperbarui!.');
            $this->session->set_flashdata('flash_type', 'success');
            redirect('admin/products');
        }
    }



    public function edit_images($id_unit){
        $data['page'] = 'stocks';

        $data['units']  = $this->AdminKelolaProducts->GetNameUnit($id_unit);
        $data['images'] = $this->AdminGambar->getGambarByUnit($id_unit);
        $data['thumbnail'] = $this->AdminGambar->getThumbnailByUnit($id_unit);

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/stock-mobil/edit-mobil/edit_images', $data);
        $this->load->view('templates/admin/admin_footer');
    }



    public function updateImage() 
{
    $id_unit = $this->input->post('id_unit');
    $files   = $_FILES;
    $count   = count($_FILES['files']['name']);
    $upload_path = './storage/units/';

    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, TRUE);
    }

    $config['upload_path']   = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $allowed_extensions = ['jpg','jpeg','png'];
    $this->load->library('upload');

    $errors   = [];
    $uploaded = 0;
    $hasFile  = false;

    // ✅ Cek apakah user memilih file
    for ($i = 0; $i < $count; $i++) {
        if (!empty($files['files']['name'][$i])) {
            $hasFile = true;
            break;
        }
    }

    if (!$hasFile) {
        $this->session->set_flashdata('error', 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Terjadi Kesalahan, silahkan pilih file gambar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('admin/edit_images/'.$id_unit);
        return;
    }

    // 🧹 1. Hapus gambar lama dari folder & database
    $oldImages = $this->db->get_where('gambar', ['id_unit' => $id_unit])->result();
    if (!empty($oldImages)) {
        foreach ($oldImages as $img) {
            $filePath = $upload_path . $img->nama_gambar;
            if (file_exists($filePath)) {
                unlink($filePath); // hapus file fisik
            }
        }
        // hapus dari database
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('gambar');
    }

    // 📸 2. Upload gambar baru
    for ($i = 0; $i < $count; $i++) {
        if (!empty($files['files']['name'][$i])) {
            $originalName = $files['files']['name'][$i];
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            // Validasi ekstensi manual
            if (!in_array($ext, $allowed_extensions)) {
                $errors[] = "$originalName : ekstensi file tidak diizinkan.";
                continue;
            }

            $_FILES['file']['name']     = $files['files']['name'][$i];
            $_FILES['file']['type']     = $files['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
            $_FILES['file']['error']    = $files['files']['error'][$i];
            $_FILES['file']['size']     = $files['files']['size'][$i];

            $newName = uniqid('img_').'.'.$ext;
            $config['file_name'] = $newName;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                // ✅ Simpan ke database
                $this->db->insert('gambar', [
                    'id_unit' => $id_unit,
                    'nama_gambar' => $newName,
                    'thumbnail' => 'not_set'
                ]);
                $uploaded++;
            } else {
                $errors[] = $this->upload->display_errors('', '');
            }
        }
    }

    // 📢 3. Flash message
    if ($uploaded > 0) {
        $this->session->set_flashdata('flash', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Gambar berhasil diperbarui!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    }

    if (!empty($errors)) {
        $this->session->set_flashdata('error', 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
            . implode('<br>', $errors) .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
    }

    redirect('admin/updateThumbnail/'.$id_unit);
    }


    public function updateThumbnail($id_unit){
        $data['page'] = 'stocks';

        $data['units']  = $this->AdminKelolaProducts->GetNameUnit($id_unit);
        $data['images'] = $this->AdminGambar->getGambarByUnit($id_unit);

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/stock-mobil/edit-mobil/update_thumbnail', $data);
        $this->load->view('templates/admin/admin_footer');

    }


    public function detailUnit($id_unit){
        $data['page'] = 'stocks';

        $data['units']  = $this->AdminKelolaProducts->getUnitByIdJoinMerk($id_unit);
        $data['gambar'] = $this->AdminGambar->getGambarByUnit($id_unit);
        $data['thumbnail'] = $this->AdminGambar->getThumbnailByUnit($id_unit);

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/stock-mobil/detail-unit/index', $data);
        $this->load->view('templates/admin/admin_footer');

    }



    // Menu Merk Unit
    public function merk(){
        $data['page'] = 'merk';
        $data['merks'] = $this->AdminKelolaMerk->getAllMerk();

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/master-merk/index', $data);
        $this->load->view('templates/admin/admin_footer');
    }


    public function tambah_merk(){
        $data['page'] = 'merk';

        // Validasi form input teks
        $this->form_validation->set_rules('namaMerk', 'name of merk', 'required|is_unique[mstr_merk.nama_merk]', [
            'is_unique' => 'Merk ini sudah ada. Silahkan masukkan merk lain.'
        ]);

        if ($this->form_validation->run() == FALSE) {

            // Reload form beserta value yang udah diketik user
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/master-merk/tambah-merk/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {
            $this->AdminKelolaMerk->insertMerk();
            $this->session->set_flashdata('flash', 'Merk ditambahkan!');
            redirect('admin/merk');
        }
    }


    public function edit_merk($id_merk){
        $data['page'] = 'merk';
        $data['merk'] = $this->AdminKelolaMerk->getMerkById($id_merk);

        // Validasi form input teks
        $this->form_validation->set_rules('namaMerk', 'name of merk', 'required|is_unique[mstr_merk.nama_merk]', [
            'is_unique' => 'Merk ini sudah ada. Silahkan masukkan merk lain.'
        ]);

        if ($this->form_validation->run() == FALSE) {

            // Reload form beserta value yang udah diketik user
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/master-merk/edit-merk/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {
            $this->AdminKelolaMerk->updateMerk($id_merk);
            $this->session->set_flashdata('flash', 'Merk berhasil diperbarui!.');
            $this->session->set_flashdata('flash_type', 'success');
            redirect('admin/merk');
        }
    }


    public function hapus_merk($id_merk){
        $hapus = $this->AdminKelolaMerk->delete_merk($id_merk);

        if ($hapus) {
            $this->session->set_flashdata('flash', 'Merk berhasil dihapus!.');
            $this->session->set_flashdata('flash_type', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Merk ini tidak bisa dihapus karena masih dipakai unit.');
            $this->session->set_flashdata('flash_type', 'warning');
        }
    redirect('admin/merk');
    }



    // kelola slider
    public function slider(){

    $this->load->model('AdminKelolaSlider');

    $data['page'] = 'slider';
    $data['sliders'] = $this->AdminKelolaSlider->getAllSliders();

    $this->load->view('templates/admin/admin_top');
    $this->load->view('templates/admin/admin_header');
    $this->load->view('templates/admin/admin_aside', $data);
    $this->load->view('admin/slider/index', $data);
    $this->load->view('templates/admin/admin_footer');

    
    }

    public function tambah_slider(){
        $this->load->model('AdminKelolaSlider');

        $data['page'] = 'slider';

        // === VALIDASI FORM ===
        $this->form_validation->set_rules('judulslider', 'Judul Slider', 'required|trim');
        $this->form_validation->set_rules('deskripsislider', 'Deskripsi Slider/Banner', 'trim|max_length[255]');

        if ($this->form_validation->run() == FALSE) {
            // TAMPILKAN VIEW JIKA VALIDASI GAGAL
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/slider/tambah-slider/index', $data);
            $this->load->view('templates/admin/admin_footer');
            return; // stop di sini biar gak lanjut ke upload
        }

        // === PROSES UPLOAD GAMBAR ===
        if (!empty($_FILES['gambar_slider']['name'])) {

            $uploadPath = FCPATH . 'storage/sliders/';

            // Pastikan folder ada
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, TRUE);
            }

            $config['upload_path']   = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048; // 2MB
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar_slider')) {
                $uploadData = $this->upload->data();

                $insertData = [
                    'judul'     => $this->input->post('judulslider', TRUE),
                    'deskripsi' => $this->input->post('deskripsislider', TRUE),
                    'image'     => $uploadData['file_name'],
                    'create_at' => date('Y-m-d H:i:s')
                ];

                $this->AdminKelolaSlider->insertSlider($insertData);
                $this->session->set_flashdata('flash', 'Slider / Banner berhasil ditambahkan!');
                $this->session->set_flashdata('flash_type', 'success');
                redirect('admin/slider');
                return; // 🛑 stop di sini biar gak render ulang view
            } else {
                // TAMPILKAN ERROR UPLOAD
                $data['error'] = $this->upload->display_errors('<small class="text-danger">', '</small>');
            }

        } else {
            // Jika gambar kosong
            $data['error'] = '<small class="text-danger">Gambar slider wajib diunggah.</small>';
        }

        // Kalau upload gagal / gambar kosong → render ulang view
        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/slider/tambah-slider/index', $data);
        $this->load->view('templates/admin/admin_footer');
    }


    public function edit_slider($id){
    
    $data['page'] = 'slider';

    $this->form_validation->set_rules('judulslider', 'Judul Slider', 'required|trim');
    $this->form_validation->set_rules('deskripsislider', 'Deskripsi Slider', 'trim');

    $slider = $this->db->get_where('sliders', ['id_slider' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $data['slider'] = $slider;

            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/slider/edit-slider/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {
            $judul = $this->input->post('judulslider');
            $deskripsi = $this->input->post('deskripsislider');

            // Cek apakah user upload gambar baru atau tidak
            if (!empty($_FILES['gambar_slider']['name'])) {
                $config['upload_path']   = './storage/sliders/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 2048;
                $config['encrypt_name']  = true;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar_slider')) {
                    $gambarBaru = $this->upload->data('file_name');

                    // Hapus gambar lama kalau ada
                    if (!empty($slider['image']) && file_exists('./storage/sliders/' . $slider['image'])) {
                        unlink('./storage/sliders/' . $slider['image']);
                    }

                    $this->db->set('image', $gambarBaru);
                } else {
                    // Kalau upload gagal
                    $data['slider'] = $slider;
                    $data['error']  = $this->upload->display_errors();
                    $this->load->view('templates/admin/admin_top');
                    $this->load->view('templates/admin/admin_header');
                    $this->load->view('templates/admin/admin_aside', $data);
                    $this->load->view('admin/slider/edit-slider/index', $data);
                    $this->load->view('templates/admin/admin_footer');
                    return;
                }
            }

            // Update judul & deskripsi
            $this->db->set('judul', $judul);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('id_slider', $id);
            $this->db->update('sliders');

            $this->session->set_flashdata('flash', 'Slider berhasil diperbarui!');
            $this->session->set_flashdata('flash_type', 'success');
            redirect('admin/slider');
        }
    }


    public function hapus_slider($id)
    {
        $this->load->model('AdminKelolaSlider');
        $slider = $this->AdminKelolaSlider->getSliderById($id);

        if ($slider) {
            // Hapus gambar dari folder
            if (!empty($slider['image']) && file_exists('./storage/sliders/' . $slider['image'])) {
                unlink('./storage/sliders/' . $slider['image']);
            }

            // Hapus data slider dari database
            $this->AdminKelolaSlider->deleteSlider($id);

            $this->session->set_flashdata('flash', 'Slider berhasil dihapus!');
            $this->session->set_flashdata('flash_type', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Slider tidak ditemukan!');
            $this->session->set_flashdata('flash_type', 'warning');
        }

        redirect('admin/slider');
    }




    // profile
    public function profile(){
        $this->load->model('AdminProfile');

        $data['page'] = 'profile';

        $data['profiles'] = $this->AdminProfile->getProfiles();

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/profile/index', $data);
        $this->load->view('templates/admin/admin_footer');
    }

    public function update_profile(){
        $this->load->model('AdminProfile');
        // Ambil data dari form
        $nama_showroom = $this->input->post('nama_showroom', true);
        $alamat        = $this->input->post('alamat', true);

        // Siapkan data awal untuk update
        $updateData = [
            'nama_showroom' => $nama_showroom,
            'alamat'        => $alamat
        ];

        // === LOGO UPLOAD HANDLING ===
        if (!empty($_FILES['logo_showroom']['name'])) {
            $config['upload_path']   = './assets/images/logos/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = 'logo_' . time();

            $this->upload->initialize($config);

            if ($this->upload->do_upload('logo_showroom')) {
                $uploadData = $this->upload->data();

                // Hapus logo lama
                $oldLogo = $this->AdminProfile->getProfiles()['logo'];
                if ($oldLogo && file_exists('./assets/images/logos/' . $oldLogo)) {
                    unlink('./assets/images/logos/' . $oldLogo);
                }

                $updateData['logo'] = $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/profile');
            }
        }

        // === UPDATE DATA PROFILE ===
        $this->db->where('id_profile', 1);
        $this->db->update('profiles', $updateData);

        $this->session->set_flashdata('success', 'Profile berhasil diperbarui ✅');
        redirect('admin/profile');
    }


    public function contacts(){
        $this->load->model('AdminContacts');

        $data['page'] = 'contacts';

        $data['contacts'] = $this->AdminContacts->getAllContacts();
        $data['whatsapp'] = $this->AdminContacts->getWhatsapp();

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/contacts/index', $data);
        $this->load->view('templates/admin/admin_footer');
    }


    public function tambah_contact(){
        $this->load->model('AdminContacts');

        $data['page'] = 'contacts';

        // Validasi form input teks
        $this->form_validation->set_rules('labelKontak', 'label of contact', 'required');
        $this->form_validation->set_rules('nomorKontak', 'number of contact', 'required');

        if ($this->form_validation->run() == FALSE) {

            // Reload form beserta value yang udah diketik user
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/contacts/tambah-kontak/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {

            $status = $this->input->post('tampilLanding', TRUE) ? 'on' : 'off';

            $data = [
                'nama_kontak' => $this->input->post('labelKontak', TRUE),
                'nomor_kontak' => $this->input->post('nomorKontak', TRUE),
                'status' => $status,
                'wa_floating' => 'not_set',
                'create_at'   => date('Y-m-d H:i:s')
            ];

            $this->AdminContacts->insertContact($data);
            $this->session->set_flashdata('flash', 'Kontak berhasil ditambahkan!.');
            $this->session->set_flashdata('flash_type', 'success');
            redirect('admin/contacts');
        }
    }

    public function ubah_contact($id_kontak){
        $this->load->model('AdminContacts');

        $data['page'] = 'contacts';
        $data['contact'] = $this->AdminContacts->getContactById($id_kontak);

        // Validasi form input teks
        $this->form_validation->set_rules('labelKontak', 'label of contact', 'required');
        $this->form_validation->set_rules('nomorKontak', 'number of contact', 'required');

        if ($this->form_validation->run() == FALSE) {

            // Reload form beserta value yang udah diketik user
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/contacts/edit-kontak/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {


            $id_kontak = $this->input->post('id_kontak', TRUE);
            $status = $this->input->post('tampilLanding', TRUE) ? 'on' : 'off';

            $data = [
                'nama_kontak' => $this->input->post('labelKontak', TRUE),
                'nomor_kontak' => $this->input->post('nomorKontak', TRUE),
                'status' => $status,
            ];

            $this->AdminContacts->updateContact($id_kontak, $data);
            $this->session->set_flashdata('flash', 'Kontak berhasil diperbarui!.');
            $this->session->set_flashdata('flash_type', 'success');
            redirect('admin/contacts');
        }
    }


    public function hapus_contact($id_kontak){
        $this->load->model('AdminContacts');

        $hapus = $this->AdminContacts->deleteContact($id_kontak);

        if ($hapus) {
            $this->session->set_flashdata('flash', 'Kontak berhasil dihapus!.');
            $this->session->set_flashdata('flash_type', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Kontak gagal dihapus!.');
            $this->session->set_flashdata('flash_type', 'warning');
        }
    redirect('admin/contacts');
    }

    public function whatsapp(){
        $data['page'] = 'contacts';

        $this->load->model('AdminContacts');
        $data['daftarkontak'] = $this->AdminContacts->getAllContacts();

        
        $this->form_validation->set_rules('whatsapp', 'number', 'required');

        if($this->form_validation->run() == FALSE){

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/contacts/whatsapp/index', $data);
        $this->load->view('templates/admin/admin_footer');
        } else {
            $id_kontak =  $this->input->post('whatsapp', TRUE);
            if ($this->AdminContacts->setToWhatsapp($id_kontak)) {
                $this->session->set_flashdata('flash', 'Kontak berhasil dijadikan tombol WhatsApp floating!');
                $this->session->set_flashdata('flash_type', 'success');
            } else {
                $this->session->set_flashdata('flash', 'Gagal mengubah status kontak!');
                $this->session->set_flashdata('flash_type', 'error');
            }

            redirect('admin/contacts');
        }
        
    }


    public function sosmed(){
        $this->load->model('AdminMedsos');

        $data['page'] = 'sosialmedia';
        $data['platform'] = $this->AdminMedsos->GetAllPlatform();
        $data['medsos'] = $this->AdminMedsos->getAllMedsos();

        $this->form_validation->set_rules(
            'platform',
            'Platform',
            'required|trim',
            array(
                'required' => 'Platform harus dipilih dahulu!'
            )
        );

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            array(
                'required' => 'Silahkan isi kolom username!'
            )
        );

        $this->form_validation->set_rules(
            'url',
            'URL',
            'required|trim',
            array(
                'required' => 'Silahkan isi kolom URL!'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            // simpan error ke flashdata
            $this->session->set_flashdata('flashsoc', validation_errors());

            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/media-sosial/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {
            $username = '@' . ltrim($this->input->post('username', TRUE), '@'); // auto @
            $dataInsert = [
                'id_platform' => $this->input->post('platform', TRUE),
                'username'    => $username,
                'url'         => $this->input->post('url', TRUE),
                'create_at'   => date('Y-m-d H:i:s')
            ];

            
            if($this->AdminMedsos->insertMedsos($dataInsert)){
                $this->session->set_flashdata('flash', 'Berhasil menambah Akun Sosial Media!');
                $this->session->set_flashdata('flash_type', 'success');
            } else {
                $this->session->set_flashdata('flash', 'Gagal menambah Akun Sosial Media!');
                $this->session->set_flashdata('flash_type', 'warning');
            }

            redirect('admin/sosmed');
        }
    }


    public function edit_sosmed($id_sosmed){
        $this->load->model('AdminMedsos');

        $data['page'] = 'sosialmedia';
        $data['platform'] = $this->AdminMedsos->GetAllPlatform();
        $data['medsos'] = $this->AdminMedsos->getMedsosById($id_sosmed);

        $this->form_validation->set_rules('platform', 'platform', 'required|trim');
        $this->form_validation->set_rules('username', 'username of sosmed', 'required|trim|callback_check_username_format');
        $this->form_validation->set_rules('url', 'url of sosmed', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/admin_top');
            $this->load->view('templates/admin/admin_header');
            $this->load->view('templates/admin/admin_aside', $data);
            $this->load->view('admin/media-sosial/edit-sosial/index', $data);
            $this->load->view('templates/admin/admin_footer');
        } else {

            $username = '@' . ltrim($this->input->post('username', TRUE), '@'); // auto @
            
            $update = [
                'id_platform' => $this->input->post('platform'),
                'username'    => $username,
                'url'         => $this->input->post('url')
            ];

            $this->AdminMedsos->UpdateSosmed($update, $id_sosmed);

            $this->session->set_flashdata('flash', 'Kontak berhasil dihapus!.');
            $this->session->set_flashdata('flash_type', 'success');
            redirect('admin/sosmed');
        }
    }

    public function check_username_format($username){
        if (strpos($username, '@') !== 0) {
            $this->form_validation->set_message('check_username_format', 'Username harus diawali dengan tanda "@"');
            return FALSE;
        }
        return TRUE;
    }

    public function hapus_sosmed($id_sosmed){
        $this->load->model('AdminMedsos');

        $hapus = $this->AdminMedsos->deleteSosmed($id_sosmed);

        if ($hapus) {
            $this->session->set_flashdata('flash', 'Akun Sosial Media Dihapus!');
            $this->session->set_flashdata('flash_type', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Akun Sosial Media gagal dihapus!.');
            $this->session->set_flashdata('flash_type', 'warning');
        }
    redirect('admin/sosmed');
    }


}

