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
        $data['page'] = 'dashboard';

        $this->load->view('templates/admin/admin_top');
        $this->load->view('templates/admin/admin_header');
        $this->load->view('templates/admin/admin_aside', $data);
        $this->load->view('admin/index');
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
        $data['images']  = $this->AdminGambar->getGambarByUnit($id_unit);

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

}
