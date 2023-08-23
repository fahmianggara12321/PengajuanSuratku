<?php

class Model_upload_ttd extends CI_model
{
    public function getAllttd()
    {
        return $this->db->get('ttd');
    }

    public function tambahTTD($namaFileFoto)
    {

      $data = [
        "prodi" => $this->input->post('prodi',true),
        "nama_kaprodi" => $this->input->post('nama_kaprodi',true),
        // "foto_ttd" => $this->input->post('foto_ttd',true),
        // "foto_ttd" => file_get_contents($_FILES['foto_ttd']['tmp_name']),
        "nik" => $this->input->post('nik',true),
        "foto_ttd" => $namaFileFoto,
        
      ];

      $this->db->insert('ttd', $data);
    }
    public function donothing()
    {
        
    }
    public function ubahTTD($namaFileFoto)
    {
        $data = [
            "nama_kaprodi" => $this->input->post('nama_kaprodi',true),
            "nik" => $this->input->post('nik',true),
            "foto_ttd" => $namaFileFoto,
            ];
            $this->db->where('id_ttd', $this->input->post('id_ttd'));
            $this->db->update('ttd', $data);
    }
    public function ubahTTD1()//tanpa foto
    {
        $data = [
            "nama_kaprodi" => $this->input->post('nama_kaprodi',true),
            "nik" => $this->input->post('nik',true),
            ];
            $this->db->where('id_ttd', $this->input->post('id_ttd'));
            $this->db->update('ttd', $data);
    }
    public function statusSuratCount()
    {
        $query = $this->db
            ->select('status_surat, COUNT(status_surat) as total')
            ->group_by('status_surat')
            // ->order_by('num_of_time', 'desc')
            ->get('surat_masuk');
        return $query->result();
    }

    public function surat_saya()
    {
        //ambil data dari tabel join 3 table
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->join('detail_surat_tugas', 'detail_surat_tugas.id_surat=surat_masuk.id_surat');
        $this->db->join('detail_user', 'detail_user.nim=surat_masuk.nim');
        $this->db->where(array('detail_user.nim' => $this->session->userdata('nim')));
        $this->db->order_by('tanggal_surat_masuk', 'DESC');
        // $this->db->where(array('status_surat' => 'Pending'));
        // $this->db->join('tim', 'tim.id_detail_surat=detail_surat_tugas.id_detail_surat');
        $query = $this->db->get();
        return $query->result();
    }

    public function surat_selesai()
    {
        //ambil data dari tabel join 3 table
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->join('detail_surat_tugas', 'detail_surat_tugas.id_surat=surat_masuk.id_surat');
        $this->db->join('detail_user', 'detail_user.nim=surat_masuk.nim');
        // $this->db->where(array('dosen.nip' => $this->session->userdata('nip')));
        $this->db->where(array('status_surat' => 'Selesai'));
        // $this->db->join('tim', 'tim.id_detail_surat=detail_surat_tugas.id_detail_surat');
        $query = $this->db->get();
        return $query->result();
    }

    public function surat_masuk()
    {
        //ambil data dari tabel join 3 table
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->join('detail_surat_tugas', 'detail_surat_tugas.id_surat=surat_masuk.id_surat');
        $this->db->join('detail_user', 'detail_user.nim=surat_masuk.nim');
        $this->db->where(array('status_surat' => 'Pending'));
        $this->db->order_by('tanggal_surat_masuk', 'DESC');
        // $this->db->join('tim', 'tim.id_detail_surat=detail_surat_tugas.id_detail_surat');
        $query = $this->db->get();
        return $query->result();
    }
    //surat masuk tampil untuk pimpinan
    public function surat_masukP()
    {
        //ambil data dari tabel join 3 table
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->join('detail_surat_tugas', 'detail_surat_tugas.id_surat=surat_masuk.id_surat');
        $this->db->join('detail_user', 'detail_user.nim=surat_masuk.nim');
        $this->db->where(array('status_surat' => 'Disposisi'));
        $this->db->order_by('tanggal_surat_masuk', 'DESC');
        // $this->db->join('tim', 'tim.id_detail_surat=detail_surat_tugas.id_detail_surat');
        $query = $this->db->get();
        return $query->result();
    }

    public function disposisi_surat($id)
    {
        $date = getdate();
        $nosurat = $this->input->post('nomor_surat');

        // var_dump($id);
        // die();

        $status = array(
            'status_surat'  => 'Disposisi',
        );

        $this->db->where('id_surat', $id);
        $this->db->update('surat_masuk', $status);

        $no_surat = array(
            'no_surat'      => 'Un.04/L.1/TL.01/' . $nosurat . '/' . $date['year']

        );

        $this->db->where('id_surat', $id);
        $this->db->update('detail_surat_tugas', $no_surat);
    }

    public function buat_surat($id)
    {
        $status = array(
            'status_surat'           => 'Selesai'
        );
        $this->db->where('id_surat', $id);
        $this->db->update('surat_masuk', $status);
    }

    public function setujui_surat($id)
    {
        $status = array(
            'status_surat'           => 'Disetujui'
        );
        $this->db->where('id_surat', $id);
        $this->db->update('surat_masuk', $status);
    }

    public function statusSelesai($id)
    {
        $status = array(
            'status_surat'           => 'Selesai'
        );
        $this->db->where('id_surat', $id);
        $this->db->update('surat_masuk', $status);
    }

    // public function tolak_surat($id)
    // {
    //     $status = array(
    //         'status_surat'           => 'Ditolak'
    //     );
    //     $this->db->where('id_surat', $id);
    //     $this->db->update('surat_masuk', $status);
    // }

    public function ajukan_surat($id)
    {
        $status = array(
            'status_surat'           => 'Pending'
        );
        $this->db->where('id_surat', $id);
        $this->db->update('surat_masuk', $status);
    }

    public function ajukan_surat_pkl($id)
    {
        $status = array(
            'status_surat'           => 'Pending'
        );
        $this->db->where('id_surat', $id);
        $this->db->update('surat_masuk', $status);
    }

    // public function batal_surat($id)
    // {
    //     $status = array(
    //         'status_surat'           => 'Batal'
    //     );
    //     $this->db->where('id_surat', $id);
    //     $this->db->update('surat_masuk', $status);
    // }

    public function delete_surat($id)
    {
        $data['surat'] = $this->db->get_where('detail_surat_tugas', ['id_surat' => $id])->row_array();
        $old_ktp = $data['surat']['foto_ktp'];
        $old_proposal = $data['surat']['proposal'];
        unlink(FCPATH . 'assets/upload/ktp/' . $old_ktp);
        unlink(FCPATH . 'assets/upload/proposal/' . $old_proposal);
        // var_dump($old_proposal);
        // die;
        $this->db->where('id_surat', $id);
        $this->db->delete('surat_masuk');
    }



    public function insert_surat()
    {
        $tglnow = date('Y-m-d');
        $tglawal = $this->input->post('tgl_mulai', true);
        $tglakhir = $this->input->post('tgl_akhir', true);
        $diff = ((abs(strtotime($tglawal) - strtotime($tglakhir))) / (60 * 60 * 24));

        $data_surat_masuk = array(
            'tanggal_surat_masuk' => $tglnow,
            'status_surat'        => 'Pending',
            'nip'                 => $this->session->userdata('nim')
        );

        $this->db->insert('ttd', $data_surat_masuk);
        // mengambil last insert id
        $lastidsm = $this->db->insert_id();

        

        $rekom = $this->input->post('rekom_dinas', true);
        if ($rekom === "Iya") {
            if ($upload_ktp == null || $upload_proposal == null) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> File upload kosong!</span></div>');
                redirect('semua_surat');
            } else {
                // insert ke tabel detail surat
                $data_detail_surat = array(
                    'nama' => $this->input->post('nama'),
                    'nim' => $this->input->post('nim'),
                    'tujuan_penelitian' => $this->input->post('tujuan_penelitian'),
                    'judul_penelitian' => $this->input->post('judul_penelitian'),
                    'lokasi_penelitian' => $this->input->post('lokasi_penelitian'),
                    'rekom_dinas'      => $rekom,
                    // 'foto_ktp'         => $foto_ktp,
                    // 'proposal'         => $proposal,
                    'tgl_mulai'        => date('Y-m-d', strtotime($this->input->post('tgl_mulai', true))),
                    'tgl_akhir'        => date('Y-m-d', strtotime($this->input->post('tgl_akhir', true))),
                    'lama_tugas'       => $diff,
                    'id_surat'         => $lastidsm
                );
            }
        } else {
            // insert ke tabel detail surat
            $data_detail_surat = array(
                
                // 'rekom_dinas'      => $rekom,
                'foto_ttd'         => $foto_ttd,
                // 'proposal'         => $proposal,
                'tgl_mulai'        => date('Y-m-d', strtotime($this->input->post('tgl_mulai', true))),
                'tgl_akhir'        => date('Y-m-d', strtotime($this->input->post('tgl_akhir', true))),
            );
        }

        // $this->db->insert('detail_surat_tugas', $data_detail_surat);
        $lastiddsm = $this->db->insert_id();

        $niptim = $this->input->post('nipajukan');
        $statusdlmtim = $this->input->post('status_dlm_tim');
        $datatim = array();
        $nim1 = $this->input->post('nim1');
        $nama1 = $this->input->post('nama1');

        $index = 0;
        foreach ($niptim as $datanip) {
            array_push($datatim, array(
                'nip' => $datanip,
                'status_dlm_tim' => $statusdlmtim[$index],
                'id_detail_surat' => $lastiddsm,
                'nim1' => $nim1,
                'nama1' => $nama1
            ));
            $index++;
        }

        $this->db->insert_batch('tim', $datatim);
    }


    // ini digunakan nantinya untuk autoselect option
    public function get_nip_dosen($title)
    {
        $this->db->like('nim', $title, 'both');
        $this->db->order_by('nim', 'ASC');
        $this->db->limit(10);
        return $this->db->get('detail_user')->result();
    }

    public function get_nama_dosen($title)
    {
        $this->db->like('nama', $title, 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('detail_user')->result();
    }
}
