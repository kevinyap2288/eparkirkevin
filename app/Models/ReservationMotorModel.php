<?php

namespace App\Models;
use CodeIgniter\Model;

class ReservationMotorModel extends Model
{
    protected $table = 'reservasi_motor';  // Reservation table
    protected $primaryKey = 'id_reservasi';
    protected $allowedFields = [
    'id_user',
    'id_parkir',
    'kendaraan',
    'awal_waktu_reservasi',
    'akhir_waktu_reservasi',
    'total_tagihan',
    'bukti_pembayaran',
    'waktu_reservasi',
    'status'
];
    // Insert a new reservation record
    public function insertReservation($data)
    {
        return $this->insert($data);
    }

    // Update reservation with payment method
    public function updateReservation($id, $data)
    {
        return $this->update($id, $data);
    }
}