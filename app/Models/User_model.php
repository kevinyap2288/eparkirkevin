<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model {
     protected $table = 'pengguna';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['email', 'password'];

    public function get_user_by_email($email) {
    return $this->where('email', trim($email))->first(); // Trim untuk menghilangkan spasi
    }


    public function save_token($email, $token) {
        $db = \Config\Database::connect();
        $db->table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function get_email_by_token($token) {
        $db = \Config\Database::connect();
        $result = $db->table('password_resets')->where('token', $token)->get()->getRow();
        return $result ? $result->email : false;
    }

    public function update_password($email, $new_password) {
    $db = \Config\Database::connect();
    $hashed_password = MD5($new_password); // Pakai md5 sesuai permintaan
    $db->table('pengguna')->where('email', $email)->update(['password' => $hashed_password]);
    $db->table('password_resets')->where('email', $email)->delete(); // Hapus token setelah digunakan
    }


}
