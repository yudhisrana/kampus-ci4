<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table = 'tbl_admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['nama_admin', 'username_admin', 'password_admin', 'akses_level', 'is_delete_admin'];

    public function getDataAdmin($where = [])
    {
        $builder = $this->db->table($this->table)
            ->select('*')
            ->orderBy('nama_admin', 'ASC');

        if (!empty($where)) {
            $builder->where($where);
        }

        return $builder->get();
    }

    public function saveDataAdmin($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDataAdmin($data, $where)
    {
        return $this->db->table($this->table)->where($where)->update($data);
    }

    public function autoNumber()
    {
        return $this->db->table($this->table)
            ->select("id_admin")
            ->orderBy("id_admin", "DESC")
            ->limit(1)
            ->get();
    }
}
