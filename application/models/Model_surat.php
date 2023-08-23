<?php

class Model_surat extends CI_model
{
    public function allSurat()
    {
        //ambil data dari tabel join 3 table
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->join('detail_surat_tugas', 'detail_surat_tugas.id_surat=surat_masuk.id_surat');
        $this->db->join('detail_user', 'detail_user.nim=surat_masuk.nim');
        $this->db->order_by('tanggal_surat_masuk', 'DESC');
        // $this->db->where(array('dosen.nim' => $this->session->userdata('nip')));
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
        //get datas
        $this->db->select('*');
        $this->db->from('detail_surat_tugas');
        $this->db->where('id_surat', $id);
        $query = $this->db->get()->result();

        $date = getdate();
        $nosurat = $this->input->post('nomor_surat');

        $status = array(
            'status_surat'  => 'Disposisi',
        );

        $this->db->where('id_surat', $id);
        $this->db->update('surat_masuk', $status);

        // informatika PKL

        if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //informatika aktif kuliah

        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //informatika aktif kuliah ortu
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //informatika surat penelitian

        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //informatika surat izin perusahaan

        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="informatika" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.04/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //industri PKL

        if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

       //industri aktif kuliah

        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/I/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/II/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/III/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/IV/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/V/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/VI/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/VII/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/VIII/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/IX/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/X/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/XI/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/XII/' . $date['year']
            );

            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //industri aktif kuliah ortu
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //industri surat penelitian

        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //industri surat izin perusahaan

        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="industri" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.03/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }


        //mesin PKL

        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //mesin aktif kuliah

        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //mesin aktif kuliah ortu

        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        // mesin surat penelitian

        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        //mesin surat izin perusahaan

        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="mesin" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.02/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //elektro PKL

        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //elektro aktif kuliah

        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //elektro aktif kuliah ortu

        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //elektro surat penelitian

        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //elektro surat izin perusahaan

        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="elektro" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.01/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //teknologi hasil pertanian PKL

        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //tekonologi hasil pertanian aktif kuliah

        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //teknologi hasil pertanian aktif kuliah ortu

        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //teknologi hasil pertanian surat penelitian
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //teknologi hasil pertanian surat izin perusahaan

        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Teknologi Hasil Pertanian" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.05/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //Agroteknologi PKL

        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat PKL" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //Agroteknologi aktif kuliah

        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //Agroteknologi aktif kuliah ortu

        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Aktif Kuliah Dengan Ortu" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/I/KET/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //agroteknologi surat penelitian

        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Penelitian" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }

        //Agroteknologi Surat izin perusahaan

        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==1){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/I/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==2){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/II/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==3){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/III/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==4){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/IV/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==5){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/V/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==6){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/VI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==7){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/VII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==8){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/VIII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==9){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/IX/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==10){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/X/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==11){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/XI/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else if ($query[0]->prodi=="Agroteknologi" && $query[0]->jenis_surat=="Ajukan Surat Keterangan Izin Perusahaan" && date('m')==12){
            $no_surat = array(
                'no_surat'      =>  $nosurat . '/' . 'II.3.AU/06.06/B/IZN/XII/' . $date['year']
            );
    
            $this->db->where('id_surat', $id);
            $this->db->update('detail_surat_tugas', $no_surat);
        }
        else{
            echo $query[0]->prodi;
            echo $query[0]->jenis_surat;
        }
        
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

        // lakukan pengecekan untuk file upload ktp dan proposal
        $upload_ktp = $_FILES['foto_ktp']['name'];
        $upload_proposal = $_FILES['proposal']['name'];

        if ($upload_ktp) {
            $config['upload_path']          = './assets/upload/ktp/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_ktp')) {
                $foto_ktp = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        if ($upload_proposal) {
            $config['upload_path']          = './assets/upload/proposal/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2048; // 2MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('proposal')) {
                $proposal = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

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
                    'foto_ktp'         => $foto_ktp,
                    'proposal'         => $proposal,
                    'tgl_mulai'        => date('Y-m-d', strtotime($this->input->post('tgl_mulai', true))),
                    'tgl_akhir'        => date('Y-m-d', strtotime($this->input->post('tgl_akhir', true))),
                    'lama_tugas'       => $diff,
                    'id_surat'         => $lastidsm
                );
            }
        } else {
            // insert ke tabel detail surat
            $data_detail_surat = array(
                'jenis_surat' => $this->input->post('jenis_surat'),
                'nama' => $this->input->post('nama'),
                'nim' => $this->input->post('nim'),
                'prodi' => $this->input->post('prodi'),
                'semester' => $this->input->post('semester'),
                'tahun_akademik' => $this->input->post('tahun_akademik'),
                'tempat_pkl' => $this->input->post('tempat_pkl'),
                'lokasi_pkl' => $this->input->post('lokasi_pkl'),
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
        }

        $this->db->insert('detail_surat_tugas', $data_detail_surat);
        $lastiddsm = $this->db->insert_id();

        $niptim = $this->input->post('nipajukan');
        $statusdlmtim = $this->input->post('status_dlm_tim');
        $datatim = array();

        $index = 0;
        foreach ($niptim as $datanip) {
            array_push($datatim, array(
                'nim' => $datanip,
                'status_dlm_tim' => $statusdlmtim[$index],
                'id_detail_surat' => $lastiddsm
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
}
