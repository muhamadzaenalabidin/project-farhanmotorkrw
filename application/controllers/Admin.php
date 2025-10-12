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

    // public function do_upload(){
    // $id_unit = $this->input->post('id_unit');
    // $count   = count($_FILES['images']['name']);

    // $config['upload_path']   = './storage/units/';
    // $config['allowed_types'] = 'jpg|jpeg|png';
    // $config['max_size']      = 2048; // 2MB

    // $this->load->library('upload');

    // var_dump($count);
    // die();

    // $errors = [];
    // $uploaded_count = 0;

    // for ($i = 0; $i < $count; $i++) {
    //     if (!empty($_FILES['images']['name'][$i])) {
    //         // Set ulang untuk tiap file
    //         $_FILES['file']['name']     = $_FILES['images']['name'][$i];
    //         $_FILES['file']['type']     = $_FILES['images']['type'][$i];
    //         $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
    //         $_FILES['file']['error']    = $_FILES['images']['error'][$i];
    //         $_FILES['file']['size']     = $_FILES['images']['size'][$i];

    //         // Nama file unik
    //         $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    //         $new_name = $id_unit . '_' . time() . '_' . uniqid() . '.' . $ext;
    //         $config['file_name'] = $new_name;

    //         $this->upload->initialize($config);

    //         if ($this->upload->do_upload('file')) {
    //             $data_upload = $this->upload->data();
    //             $nama_file   = $data_upload['file_name'];

    //             $data_insert = [
    //                 'id_unit'     => $id_unit,
    //                 'nama_gambar' => $nama_file,
    //                 'thumbnail'   => 0
    //             ];

    //             $this->AdminGambar->insert_gambar($data_insert);
    //             $uploaded_count++;
                
    //         } else {
    //             $errors[] = $_FILES['file']['name'] . ': ' . strip_tags($this->upload->display_errors('', ''));
    //         }
    //     }
    // }

    // // ✅ Balikin ke form upload kalau ada error
    // if (!empty($errors)) {
    //     $error_message = 'Gagal upload beberapa file:<br>' . implode('<br>', $errors);
    //     $this->session->set_flashdata('error', $error_message);
    //     redirect('admin/product_images/' . $id_unit);
    // } else {
    //     $this->session->set_flashdata('success', $uploaded_count . ' gambar berhasil diupload!');
    //     redirect('admin/product_images/' . $id_unit);
    // }
// }

public function uploadImage() { 
        $id_unit = $this->input->post('id_unit');
        $files = $_FILES;

        $count = count($_FILES['files']['name']);
        $upload_path = './storage/units/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }

        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload');

        $errors = [];
        $uploaded = 0;

        for($i = 0; $i < $count; $i++){
            if(!empty($files['files']['name'][$i])){

                // Set data upload per file
                $_FILES['file']['name']     = $files['files']['name'][$i];
                $_FILES['file']['type']     = $files['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['files']['tmp_name'][$i];
                $_FILES['file']['error']    = $files['files']['error'][$i];
                $_FILES['file']['size']     = $files['files']['size'][$i];

                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('img_').'.'.$ext;
                $config['file_name'] = $newName;

                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $file_name  = $uploadData['file_name'];

                    $this->db->insert('gambar', [
                        'id_unit'     => $id_unit,
                        'nama_gambar' => $file_name,
                        'thumbnail'   => base_url('storage/units/'.$file_name)
                    ]);

                    $uploaded++;
                } else {
                    $errors[] = $_FILES['file']['name'].' : '.$this->upload->display_errors('', '');
                }
            }
        }

        if (!empty($errors)) {
            $this->session->set_flashdata('error', implode('<br>', $errors));
        } else {
            $this->session->set_flashdata('success', $uploaded.' gambar berhasil diupload!');
        }

        redirect('admin/product_images/'.$id_unit);
    }









    // private function uploadImages($id_unit){
    //     $files = $_FILES;
    //     $thumbnail_index = $this->input->post('thumbnail'); // index dari JS
    //     $count = count($_FILES['foto']['name']);

    //     for ($i = 0; $i < $count; $i++) {
    //         if ($files['foto']['name'][$i]) {
    //             $_FILES['file']['name'] = $files['foto']['name'][$i];
    //             $_FILES['file']['type'] = $files['foto']['type'][$i];
    //             $_FILES['file']['tmp_name'] = $files['foto']['tmp_name'][$i];
    //             $_FILES['file']['error'] = $files['foto']['error'][$i];
    //             $_FILES['file']['size'] = $files['foto']['size'][$i];

    //             $config['upload_path']   = './storage/units/';
    //             $config['allowed_types'] = 'jpg|jpeg|png';
    //             $config['max_size']      = 2048;
    //             $config['encrypt_name']  = TRUE;

    //             $this->load->library('upload', $config);
    //             $this->upload->initialize($config);

    //             if ($this->upload->do_upload('file')) {
    //                 $fileData = $this->upload->data();
    //                 $thumbnail_status = ($i == $thumbnail_index) ? 1 : 0;

    //                 $data_gambar = [
    //                     'id_unit' => $id_unit,
    //                     'nama_gambar' => $fileData['file_name'],
    //                     'thumbnail' => $thumbnail_status
    //                 ];
    //                 $this->db->insert('gambar', $data_gambar);
    //             }
    //         }
    //     }
    // }

    // private function uploadImages($id_unit){
    //     $tempDir = './storage/temp/';
    //     $finalDir = './storage/units/';

    //     if (!is_dir($finalDir)) {
    //         mkdir($finalDir, 0777, true);
    //     }

    //     $fotoList = $this->input->post('foto_terupload'); // array dari hidden input
    //     if (!empty($fotoList)) {
    //         foreach ($fotoList as $index => $fileName) {
    //             $source = $tempDir . $fileName;
    //             $dest   = $finalDir . $fileName;
    //             if (file_exists($source)) {
    //                 rename($source, $dest);
    //                 $this->db->insert('gambar', [
    //                     'id_unit' => $id_unit,
    //                     'nama_gambar' => $fileName,
    //                     'thumbnail' => $index == 0 ? 1 : 0 // default thumbnail pertama
    //                 ]);
    //             }
    //         }
    //     }
    // }



    // public function upload_foto_produk(){
    //     $config['upload_path']   = './storage/temp/'; // simpan sementara dulu
    //     $config['allowed_types'] = 'jpg|jpeg|png';
    //     $config['max_size']      = 2048;
    //     $config['encrypt_name']  = TRUE;

    //     if (!is_dir($config['upload_path'])) {
    //         mkdir($config['upload_path'], 0777, true);
    //     }

    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('file')) {
    //         $data = $this->upload->data();
    //         echo json_encode(['status' => 'success', 'file' => $data['file_name']]);
    //     } else {
    //         echo json_encode(['status' => 'error', 'msg' => $this->upload->display_errors()]);
    //     }
    // }


}