<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat', '', TRUE);
        $this->load->model('model_detail_surat', '', TRUE);
        $this->load->model('model_tim', '', TRUE);
        $this->load->model('model_dosen', '', TRUE);
        $this->load->model('model_user', '', TRUE);
        $this->load->helper(array('form', 'url'));
        // $this->load->library('pdf');
        // $this->load->library('tcpdf/tcpdf_import');

        if (!$this->session->userdata('nim')) {
            redirect('auth');
        }
        if ($this->session->userdata('id_user_type') == 2) {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['cetak'] = $this->model_surat->surat_selesai();
        $data['judul'] = "SIM - Cetak Surat";
        $data['user'] = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['akun'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

        $this->load->view('templates/main_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/cetak_surat', $data);
        $this->load->view('templates/main_footer');
    }

    public function cetak()
    {
        $id = $this->uri->segment(3);
        $data['detail'] = $this->model_detail_surat->detail_suratMasuk($id)->row_array();
        $iddetailtim = $data['detail']['id_detail_surat'];
        $data['detail_tim'] = $this->model_tim->tim_id($iddetailtim)->result();
        $data['judul'] = "Cetak Surat " . $id;
        $id_detail = $data['detail']['id_detail_surat'];
        $data['detail_tanggal'] = $this->tanggal_indo($data['detail']['tanggal_kegiatan']);

        // var_dump($iddetailtim);
        // die();

        $filename = 'suratID-' . $id_detail . '.pdf';
        // var_dump($filename);
        // die();

        $mpdf = new \Mpdf\Mpdf([
            'format' => 'Folio',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 5,
            'margin_footer' => 10,
            'orientation' => 'P'
        ]);

        $location = FCPATH . "assets/fileSurat/";

        if ($data['detail']['jenis_surat']=='Ajukan Surat PKL'){
            $html = $this->load->view('surat/cetak_view_pkl', $data, TRUE);
            $mpdf->WriteHTML($html);
            echo "<script>window.close();</script>";
            $mpdf->Output($location . $filename, \Mpdf\Output\Destination::FILE);

            $this->model_detail_surat->add_file_surat($id_detail, $filename);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat surat, silahkan tandatangan dibawah</div>');
            redirect('tandatangan');
        } 
        else if ($data['detail']['jenis_surat']=='Ajukan Surat Aktif Kuliah'){
            $html = $this->load->view('surat/cetak_view_aktif_kuliah', $data, TRUE);
            $mpdf->WriteHTML($html);
            echo "<script>window.close();</script>";
            $mpdf->Output($location . $filename, \Mpdf\Output\Destination::FILE);

            $this->model_detail_surat->add_file_surat($id_detail, $filename);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat surat, silahkan tandatangan dibawah</div>');
            redirect('tandatangan');
        } else if ($data['detail']['jenis_surat']=='Ajukan Surat Aktif Kuliah Dengan Ortu'){
            $html = $this->load->view('surat/cetak_view_aktif_kuliah_ortu', $data, TRUE);
            $mpdf->WriteHTML($html);
            echo "<script>window.close();</script>";
            $mpdf->Output($location . $filename, \Mpdf\Output\Destination::FILE);

            $this->model_detail_surat->add_file_surat($id_detail, $filename);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat surat, silahkan tandatangan dibawah</div>');
            redirect('tandatangan');
        }
        else if ($data['detail']['jenis_surat']=='Ajukan Surat Penelitian'){
            $html = $this->load->view('surat/cetak_view_penelitian', $data, TRUE);
            $mpdf->WriteHTML($html);
            echo "<script>window.close();</script>";
            $mpdf->Output($location . $filename, \Mpdf\Output\Destination::FILE);

            $this->model_detail_surat->add_file_surat($id_detail, $filename);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat surat, silahkan tandatangan dibawah</div>');
            redirect('tandatangan');
        }
         else if ($data['detail']['jenis_surat']=='Ajukan Surat Keterangan Izin Perusahaan'){
            $html = $this->load->view('surat/cetak_view_izin_perusahaan', $data, TRUE);
            $mpdf->WriteHTML($html);
            echo "<script>window.close();</script>";
            $mpdf->Output($location . $filename, \Mpdf\Output\Destination::FILE);

            $this->model_detail_surat->add_file_surat($id_detail, $filename);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat surat, silahkan tandatangan dibawah</div>');
            redirect('tandatangan');
        }
        
    }

    public function tanggal_indo($tanggal)
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
}
