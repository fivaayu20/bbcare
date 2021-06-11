<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pengasuh_Model extends CI_Model {
        
        public function getPengasuh(){
            return ($this->db->get('pengasuh')->result_array());

        //     $results = array();
        //     $this->db->select('id, nama_pengasuh, alamat, email, telepon, kategori, nik, tgl_lahir, agama, status, foto, pendidikan');
        //     $this->db->from('pengasuh');

        //     $query = $this->db->get();

        //     if($query->num_rows() > 0) {
        //     $results = $query->result();
        // }
        //     return $results;
        }

        public function getPengasuhId($id_pengasuh){
            return $this->db->where('id_pengasuh', $id_pengasuh)->get('pengasuh')->row();
        }

        public function updatePengasuh($id_pengasuh){
            $post = $this->input->post();
            $this->telepon = $post['telepon'];
            $this->tgl_lahir = $post['tgl_lahir'];
            $this->agama = $post['agama'];
            
            if (!empty($_FILES["foto"]["name"])) {
                $this->foto = $this->_UploadImage();
            } else {
                $this->foto = $post["foto_lama"];
            }

            $this->kategori = $post['kategori'];
            $this->alamat = $post['alamat'];
            $this->pendidikan = $post['pendidikan'];
            $this->status = $post['status'];

            var_dump($this->db->where('id_pengasuh', $id_pengasuh)->update('pengasuh', $this));
            die();
            
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
            // var_dump($post);
            // die();
        }

        private function UploadImage() {
            
            $config['upload_path'] = './upload/pengasuh';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name']    = $this->id_pengasuh;
            $config['max_size']  = '8192';
            $config['overwrite'] = true;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('foto')){
                return $this->upload->data("file_name");
            }
            return "default.png";
        }

        public function insertPengasuh($id) {
            if ($this->input->post('submit')) {
            $array = array(
                // "id"=>$this->input->post('id', TRUE),
                // "nama_pengasuh"=>$this->input->post('nama_pengasuh', TRUE),
                // "telepon"=>$this->input->post('telepon', TRUE),
                "telepon"=>$this->input->post('telepon', TRUE),
                "tgl_lahir"=>$this->input->post('tgl_lahir', TRUE),
                "agama"=>$this->input->post('agama', TRUE),
                "alamat"=>$this->input->post('alamat', TRUE),
                "pendidikan"=>$this->input->post('pendidikan', TRUE),
                "status"=>$this->input->post('status', TRUE),
                // "id_store"=>$id
            );
            }
            $this->db->insert('pengasuh', $array);
        }

    }
?>