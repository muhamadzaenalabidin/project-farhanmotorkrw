<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminContacts extends CI_Model {


    public function getAllContacts(){
        return $this->db->get('contacts')->result_array();
    }

    public function insertContact($data){
        $this->db->insert('contacts', $data);
    }

    public function getContactById($id_contact){
        return $this->db->get_where('contacts', ['id_contact' => $id_contact])->row();
    }

    public function updateContact($id_contact, $data){
        $this->db->where('id_contact', $id_contact);
        $this->db->update('contacts', $data);
    }

    public function deleteContact($id_contact){
        return $this->db->delete('contacts', ['id_contact' => $id_contact]);
    }

    public function setToWhatsapp($id_kontak){
        //Cek apakah ada kontak lain yang wa_floating = 'set'
        $existing = $this->db->where('wa_floating', 'set')->get('contacts')->row();

        if ($existing) {
            // Ubah kontak yang sebelumnya 'set' jadi 'not_set'
            $this->db->where('id_contact', $existing->id_contact)
                    ->update('contacts', ['wa_floating' => 'not_set']);
        }

        //Ubah kontak yang dipilih jadi 'set'
        $this->db->where('id_contact', $id_kontak)
                ->update('contacts', ['wa_floating' => 'set']);

        // (Optional) Return true kalau berhasil
        return $this->db->affected_rows() > 0;
    }


    public function getWhatsapp(){
        return $this->db->where('wa_floating', 'set')->get('contacts')->row();
    }
}