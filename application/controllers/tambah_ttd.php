<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tambah_ttd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_upload_ttd', '', TRUE);
        // $this->load->model('model_detail_surat', '', TRUE);
        $this->load->model('model_tim', '', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
        // if ($this->session->userdata('id_user_type') == 1) {
        //     redirect('auth/blocked');
        // }
    }
    // public function tambah()
    // {
    //     $data['judul'] = 'Form Tambah ttd';
    //     $data['user'] = $this->db->get_where('dosen', ['nip' => $this->session->userdata('nip')])->row_array();
    //     $data['akun'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
    //     $data['ttd'] = $this->Model_upload_ttd->getAllttd();
    //     $this->form_validation->set_rules('prodi','prodi','required');
    //     $this->form_validation->set_rules('nama_kaprodi','nama kaprodi','required');
    //     $this->form_validation->set_rules('foto_ttd','Foto ttd','required');
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/main_header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('surat/tambah_ttd', $data);
    //         $this->load->view('templates/main_footer');
    //     } else {
    //             if($_SERVER['REQUEST_METHOD']==='POST'){
    //             $niptim = $this->input->post('nipajukan');
    //             // cek pengajuan surat
    //             // var_dump($this->input->post());
    //             // die;
    //             foreach ($niptim as $data) {
    //                 $nipajukan = $this->db->get_where('dosen', ['nip' => $data])->row_array();
    //                 if (!$nipajukan || $nipajukan === $data) {
    //                     $this->session->set_flashdata('nipajukan', '<div class="alert alert-warning alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> NIP/NIK yang anda masukkan salah atau sama!</span></div>');
    //                     redirect('upload_ttd');
    //                 }
    //             }
    //             // jika validasinya sukses
    //             $this->_save();
    //             }
    //         }
    //     }
    //     private function _save()
    //  {
    //      $tgl_mulai = $this->input->post('tgl_mulai');
    //      $tgl_akhir = $this->input->post('tgl_akhir');

    //      // cek rentang tangal yang diinputkan
    //      if ($tgl_mulai <= $tgl_akhir || $tgl_akhir >= $tgl_mulai) {
    //          $this->session->set_flashdata('time', '<div class="alert alert-warning alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> Rentang waktu yang anda masukkan salah!</span></div>');
    //          redirect('upload_ttd');
    //      } else {
    //          $this->Model_upload_ttd->tambahTTD();
    //          $this->session->set_flashdata('message', '<div class="alert alert-success alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> Berhasil Mengajukan Surat</span></div>');
    //          redirect('semua_surat');
    //      }
    // }
    public function index() 
     {
        //$this->form_validation->set_rules('foto_ttd', 'Foto ttd', 'trim|required');

            $data['judul'] = 'Form Tambah ttd';
            $data['user'] = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array();
            $data['akun'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
            $data['ttd'] = $this->Model_upload_ttd->getAllttd();
            $this->form_validation->set_rules('prodi','prodi','required');
            $this->form_validation->set_rules('nama_kaprodi','nama kaprodi','required');
            $this->form_validation->set_rules('nik','nik','required');
            // $this->form_validation->set_rules('foto_ttd','Foto ttd','required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/main_header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('surat/tambah_ttd', $data);
                $this->load->view('templates/main_footer');
            } else {
                $config['upload_path']          = './upload/surat/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['overwrite']			= true;
                // $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 1024;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    // $uploaded_data = $this->upload->data();

                    if($this->Model_upload_ttd->donothing()){
                    redirect('tambah_ttd'); //redirect belom jalan
                    }
                    $this->_save();
                }
            }
        }
    
        
        private function _save()
         {
             $tgl_mulai = $this->input->post('tgl_mulai');
             $tgl_akhir = $this->input->post('tgl_akhir');
    
             // cek rentang tangal yang diinputkan
             if ($tgl_mulai <= $tgl_akhir || $tgl_akhir >= $tgl_mulai) {
                 $this->session->set_flashdata('time', '<div class="alert alert-warning alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> Rentang waktu yang anda masukkan salah!</span></div>');
                 redirect('upload_ttd');
             } else {
                $uploaded_data = $this->upload->data();
                ($this->Model_upload_ttd->tambahTTD($uploaded_data['file_name']));
                 $this->session->set_flashdata('message', '<div class="alert alert-success alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> Berhasil Tambah TTD</span></div>');
                 redirect('tambah_ttd');
             }
        }


    // fungsi untuk autoselecet
    function get_nip_dosen()
    {
        if (isset($_GET['term'])) {
            $result = $this->model_surat->get_nip_dosen($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $result_array[] = array(
                        'label' => $row->nim
                    );
                $json = json_encode($result_array);
                echo $json;
            }
        }
    }
}
