<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajukan_surat_pkl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat_penelitian', '', true);
        // $this->load->model('model_detail_surat', '', TRUE);
        $this->load->model('model_tim', '', true);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
        // if ($this->session->userdata('id_user_type') == 1) {
        //     redirect('auth/blocked');
        // }
    }

    public function index()
    {
        $this->form_validation->set_rules('jenis_surat', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('semester', 'Semester', 'trim|required');
        $this->form_validation->set_rules('tempat_pkl', 'Nama Tempat PKL', 'trim|required');
        $this->form_validation->set_rules('lokasi_pkl', 'Lokasi PKL', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "SIM - Ajukan Surat PKL";
            $data['user'] = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array();
            $data['akun'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

            $this->load->view('templates/main_header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surat/ajukan_surat_pkl', $data);
            $this->load->view('templates/main_footer');
        } else {
            $niptim = $this->input->post('nipajukan');
            // cek pengajuan surat

            foreach ($niptim as $data) {
                $nipajukan = $this->db->get_where('detail_user', ['nim' => $data])->row_array();
                if (!$nipajukan || $nipajukan === $data) {
                    $this->session->set_flashdata('nipajukan', '<div class="alert alert-warning alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> NIM yang anda masukkan salah atau sama!</span></div>');
                    redirect('ajukan_surat_pkl');
                }
            }
            // jika validasinya sukses
            $this->_save();
        }
    }

    private function _save()
    {
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');

        // cek rentang tangal yang diinputkan
        if ($tgl_mulai <= $tgl_akhir || $tgl_akhir >= $tgl_mulai) {
            $this->session->set_flashdata('time', '<div class="alert alert-warning alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> Rentang waktu yang anda masukkan salah!</span></div>');
            redirect('ajukan_surat_pkl');
        } else {
            $this->model_surat_penelitian->insert_surat();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> Berhasil Mengajukan Surat</span></div>');
            redirect('surat_saya');
        }
    }


    // fungsi untuk autoselecet
    public function get_nip_dosen()
    {
        if (isset($_GET['term'])) {
            $result = $this->model_surat_penelitian->get_nip_dosen($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $result_array[] = array(
                        'label' => $row->nim,
                    );
                }
                $json = json_encode($result_array);
                echo $json;
            }
        }
    }

    public function get_nama_dosen()
    {
        if (isset($_GET['term'])) {
            $result = $this->model_surat_penelitian->get_nama_dosen($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $result_array[] = array(
                        'label' => $row->nama
                    );
                }
                $json = json_encode($result_array);
                echo $json;
            }
        }
    }
}
