<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = [
        'id_reservasi', 
        'total_tagihan', 
        'metode_pembayaran', 
        'bukti_pembayaran', 
        'status'
    ];
    // public function updateReservation($id, $data)
    // {
    //     return $this->update($id, $data);}
}   