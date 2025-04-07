<?php

namespace App\Models;
use CodeIgniter\Model;

class ParkingMotorModel extends Model
{
    protected $table = 'parkir_motor';  // Table for parking spaces
    protected $primaryKey = 'id_parkir';
    protected $allowedFields = ['id_parkir', 'lokasi', 'status'];  // Fields for parking spaces

    // Fetch all parking spaces
    public function getAllSpaces()
    {
        return $this->findAll();  // Fetch all parking spaces from the table
    }

    // Find a specific parking space by ID (Updated to match CodeIgniter's find method signature)
    public function find($id = null)
    {
        if ($id === null) {
            return null; // Return null if no ID is provided
        }

        return $this->where('id_parkir', $id)->first();  // Find a parking space by ID
    }

    // Book a parking space (update its status)
    public function bookSpace($id)
    {
        $data = ['status' => 'booked'];  // Change status to 'booked'
        return $this->update($id, $data);  // Update the parking space record in the database
    }
}