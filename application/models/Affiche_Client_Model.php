<?php
class Affiche_Client_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_client($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('Client');
            return $query->result_array();
        }

        $query = $this->db->get_where('Client', array('slug' => $slug));
        return $query->row_array();
    }

}
