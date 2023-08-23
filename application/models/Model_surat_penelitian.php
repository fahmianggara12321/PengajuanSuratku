<?php

class Model_surat_penelitian extends CI_model
{
    public function allSurat()
    {
        //ambil data dari tabel join 3 table
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->join('detail_surat_tugas', 'detail_surat_tugas.id_surat=surat_masuk.id_surat');
        $this->db->join('detail_user', 'detail_user.nim=surat_masuk.nim');
        $this->db->order_by('tanggal_surat_masuk', 'DESC');
        // $this->db->where(array('dosen.nip' => $this->session->userdata('nip')));
        // $this->db->where(array('status_surat' => 'Selesai'));
        // $this->db->join('tim', 'tim.id_detail_surat=detail_surat_tugas.id_detail_surat');
        $query = $this->db->get();
        return $query->result();
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
            'nim'                 => $this->session->userdata('nim')
        );

        $this->db->insert('surat_masuk', $data_surat_masuk);
        // mengambil last insert id
        $lastidsm = $this->db->insert_id();

        

        $rekom = $this->input->post('rekom_dinas', true);
        if ($rekom === "Iya") {
            if ($upload_ktp == null || $upload_proposal == null) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-with-icon"><i class="material-icons" data-notify="icon" >info_outline</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button><span data-notify="message"> <b>Info Alert:</b> File upload kosong!</span></div>');
                redirect('ajukan_surat');
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
        } else if ($this->input->post('jenis_surat')=="Ajukan Surat PKL") {
            $data = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array(); //pengambilan tabel dosen database
            // insert ke tabel detail surat
            $data_detail_surat = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'nama' => $data['nama'], //diambil dari tabel dosen database
                'nim' => $data['nim'],
                'prodi' => $data['prodi'],
                'nim1' => $this->input->post('nim1'),
                'nama1' => $this->input->post('nama1'),
                'semester' => $this->input->post('semester'),
                'tempat_pkl' => $this->input->post('tempat_pkl'),
                'lokasi_pkl' => $this->input->post('lokasi_pkl'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'nama_wali' => $this->input->post('nama_wali'),
                'nopen' => $this->input->post('nopen'),
                'pangkat' => $this->input->post('pangkat'),
                'instansi' => $this->input->post('instansi'),
                'kegiatan' => $this->input->post('kegiatan'),
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
                'jam' => $this->input->post('jam'),
                'lokasi_pkl_industri' => $this->input->post('lokasi_pkl_industri'),
                'tujuan_penelitian' => $this->input->post('tujuan_penelitian'),
                'judul_penelitian' => $this->input->post('judul_penelitian'),
                'tempat_penelitian' => $this->input->post('tempat_penelitian'),
                'lokasi_penelitian' => $this->input->post('lokasi_penelitian'),
                // 'rekom_dinas'      => $rekom,
                // 'foto_ktp'         => $foto_ktp,
                // 'proposal'         => $proposal,
                'tgl_mulai'        => date('Y-m-d', strtotime($this->input->post('tgl_mulai', true))),
                'tgl_akhir'        => date('Y-m-d', strtotime($this->input->post('tgl_akhir', true))),
                'lama_tugas'       => $diff,
                'id_surat'         => $lastidsm
            );
            
            $this->db->insert('detail_surat_tugas', $data_detail_surat);
            
        } else if ($this->input->post('jenis_surat')=="Ajukan Surat Aktif Kuliah"){
            $data = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array(); //pengambilan tabel dosen database
        
            // insert ke tabel detail surat
             $data_detail_surat = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'nama' => $data['nama'], //diambil dari tabel dosen database
                'nim' => $data['nim'],
                'prodi' => $data['prodi'],
                'jk' => $data['jk'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tgl_lahir' => $data['tanggal_lahir'],
                'semester' => $this->input->post('semester'), //diambil dari inputan view
                'tahun_akademik_kegiatan' => $this->input->post('tahun_akademik_kegiatan'),
                'id_surat'         => $lastidsm
                
            );
            
            $this->db->insert('detail_surat_tugas', $data_detail_surat);
        }
        else if ($this->input->post('jenis_surat')=="Ajukan Surat Aktif Kuliah Dengan Ortu"){
            $data = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array(); //pengambilan tabel dosen database
        
            // insert ke tabel detail surat
             $data_detail_surat = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'nama' => $data['nama'], //diambil dari tabel dosen database
                'nim' => $data['nim'],
                'prodi' => $data['prodi'],
                'jk' => $data['jk'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tgl_lahir' => $data['tanggal_lahir'],
                'semester' => $this->input->post('semester'), //diambil dari inputan view
                'nama_wali' => $this->input->post('nama_wali'),
                'nopen' => $this->input->post('nopen'),
                'pangkat' => $this->input->post('pangkat'),
                'instansi' => $this->input->post('instansi'),
                'tahun_akademik_kegiatan' => $this->input->post('tahun_akademik_kegiatan'),
                'id_surat'         => $lastidsm
                
            );
            
            $this->db->insert('detail_surat_tugas', $data_detail_surat);
        }
        else if ($this->input->post('jenis_surat')=="Ajukan Surat Penelitian"){
            $data = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array(); //pengambilan tabel dosen database
        
            // insert ke tabel detail surat
             $data_detail_surat = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'nama' => $data['nama'], //diambil dari tabel dosen database
                'nim' => $data['nim'],
                'prodi' => $data['prodi'],
                'jk' => $data['jk'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tgl_lahir' => $data['tanggal_lahir'],
                'semester' => $this->input->post('semester'), //diambil dari inputan view
                'tempat_penelitian' => $this->input->post('tempat_penelitian'),
                'lokasi_penelitian' => $this->input->post('lokasi_penelitian'),
                'id_surat'         => $lastidsm
                
            );
            
            $this->db->insert('detail_surat_tugas', $data_detail_surat);
        }
        else if ($this->input->post('jenis_surat')=="Ajukan Surat Keterangan Izin Perusahaan"){
            $data = $this->db->get_where('detail_user', ['nim' => $this->session->userdata('nim')])->row_array(); //pengambilan tabel dosen database
        
            // insert ke tabel detail surat
             $data_detail_surat = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'nama' => $data['nama'], //diambil dari tabel dosen database
                'nim' => $data['nim'],
                'prodi' => $data['prodi'],
                'jk' => $data['jk'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_kegiatan' => date('Y/m/d', strtotime($this->input->post('tanggal_kegiatan'))),
                'jam' => $this->input->post('jam'),
                'kegiatan' => $this->input->post('kegiatan'), //diambil dari inputan view
                'semester' => $this->input->post('semester'), //diambil dari inputan view
                'tahun_akademik_kegiatan' => $this->input->post('tahunkegiatan'),

                'id_surat'         => $lastidsm
                
            );
            
            $this->db->insert('detail_surat_tugas', $data_detail_surat);
        }

        $lastiddsm = $this->db->insert_id();

        $niptim = $this->input->post('nipajukan');
        $statusdlmtim = $this->input->post('status_dlm_tim');
        $datatim = array();
        $nim1 = $this->input->post('nim1');
        $nama1 = $this->input->post('nama1');

        $index = 0;
        foreach ($niptim as $datanim) {
            array_push($datatim, array(
                'nim' => $datanim,
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
