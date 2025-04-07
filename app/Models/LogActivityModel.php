<?php

namespace App\Models;

use CodeIgniter\Model;

class LogActivityModel extends Model
{
    protected $table = 'activity_log'; // Nama tabel di database
    protected $primaryKey = 'id_log';
    protected $allowedFields = ['id_user', 'username', 'action', 'ip_address', 'timestamp'];

    // Fungsi untuk menyimpan log aktivitas
    public function saveLog($id_user, $username, $action, $ip_address = null)
    {
    return $this->insert([
        'id_user' => $id_user,
        'username' => $username,
        'action' => $action,
        'ip_address' => $ip_address ?? $_SERVER['REMOTE_ADDR'], // Gunakan IP otomatis jika tidak diberikan
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    }
    // Fungsi untuk mengambil log (Admin lihat semua, user lihat miliknya)
    public function getLogs($id_user = null, $is_admin = false)
    {
        if ($is_admin) {
            return $this->orderBy('timestamp', 'DESC')->findAll();
        }
        return $this->where('id_user', $id_user)->orderBy('timestamp', 'DESC')->findAll();
    }
}
