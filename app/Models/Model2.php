<?php

namespace App\Models;
use CodeIgniter\Model;

class Model2 extends Model
{

public function tampil($table, $by)
{
	return $this ->db->table($table)
	->orderby($by, 'desc')
	->get()
	->getResult();
	}
	public function join($table, $table2, $on)
	{
	return $this ->db->table($table)
	->join($table2,$on)
	->get()
	->getResult();
	}
	public function filter($table, $table2, $on, $filter1,$filter2,$awal,$akhir)
	{
	return $this ->db->table($table)
	->join($table2,$on)
	->where($filter1,$awal)
	->where($filter2,$akhir)
	->get()
	->getResult();
	}
	public function joinw($table,$table2,$on,$w){
		return $this->db->table($table)
		->join($table2,$on)
		->where($w)
		->get()
		->getRow();
	}
	public function input($table, $data)
	{
	return $this ->db->table($table)->insert($data);
	}
	public function hapus($table,$where)
	{
 		return $this->db
 		->table($table)->delete($where);
	}
		public function getWhere($table, $where)
		{
    return $this->db->table($table)
        ->where($where)
        ->get()
        ->getRow();
	}

	public function edit($table, $data, $where)
	{	
    return $this->db->table($table)->where($where)->update($data);
	}	

	public function getMenuItems()
	{
		return $this->findAll();
	}
	public function getOrderById($id_order)
    {
        return $this->where('id_order', $id_order)->first();
    }
    public function countData($table)
	{
    	return $this->db->table($table)->countAll();
	}

	public function sumColumn($table, $column)
	{
    $query = $this->db->table($table)->selectSum($column)->get();
    
    if (!$query) {
        return 0; // Return 0 if the quer      
	}
	}
}