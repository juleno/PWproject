<?php

Class Skill_model extends CI_Model
{
    public function get_skill($idclub = FALSE)
    {
        if ($idclub === FALSE) {
            $query = $this->db->get('skill');
            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('skill');
        $this->db->join('skillclub', 'skillclub.idskill = skill.id');
        $this->db->where('skillclub.idclub', $idclub);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_skill_label($idclub)
    {
        $skills = $this->get_skill($idclub);
        $strlabel = '';
        foreach ($skills as $skill) {
            $strlabel .= '<span class="label label-' . $skill['color'] . '">' . $skill['name'] . '<span class="hide">lang' . $skill['name'] . '~</span></span>&nbsp;';
        }
        return $strlabel;
    }
}

?>