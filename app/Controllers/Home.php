<?php

namespace App\Controllers;

use CodeIgniter\Email\Email;
use App\Models\Model2;
use App\Models\User_model;
use App\Models\ParkingModel;
use App\Models\ParkingMotorModel;
use App\Models\ReservationModel;
use App\Models\ReservationMotorModel;
use App\Models\LogActivityModel;
use App\Models\PaymentModel;

class Home extends BaseController
{
        protected $logModel;

        public function __construct()
        {
            $this->logModel = new \App\Models\LogActivityModel();
        }

        private function logActivity($action)
        {
            if (session()->has('id')) {
                $this->logModel->insert([
                    'id_user'   => session()->get('id'),
                    'username'  => session()->get('u'),
                    'action'    => $action,
                    'ip_address' => $_SERVER['REMOTE_ADDR'],
                    'timestamp' => date('Y-m-d H:i:s')
                ]);
            }
        }
        // Index / Landing Page
        public function index()
        {
            if (session()->has('id')) {
                return redirect()->to('home/dashboard');
            }

        // Check remember_user cookie
            if (isset($_COOKIE['remember_user'])) {
                $username = $_COOKIE['remember_user'];
                $asc = new Model2();
                $cek = $asc->getWhere('pengguna', ['nama' => $username]);

                if ($cek != null) {
                    session()->set([
                        'id' => $cek->id_user,
                        'u' => $cek->nama,
                        'level' => $cek->level
                    ]);
                    return redirect()->to('home/dashboard');
                }
            }

        // Jika tidak login, tampilkan dashboard tamu
            echo view('header');
            return view('dashboard_guest', ['cek' => $cek]);
            echo view('footer');
        }


        // Register Page
        public function register()
        {
            echo view('header');
            echo view('sign-up');
            echo view('footer');
        }

        // Handle Registration
        public function aksi_register()
    {
    $asc = new Model2();
    $data = [
        'nama' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'password' => MD5($this->request->getPost('password')),
        'level' => 2, // Default user level
        'created_at' => date('Y-m-d H:i:s'), // Waktu saat dibuat
        'created_by' => 1, // Ganti dengan ID admin atau pengguna yang membuat
        'updated_at' => date('Y-m-d H:i:s'), // Waktu saat dibuat (awal)
        'updated_by' => 1 // Ganti dengan ID admin atau pengguna yang membuat
    ];

    $asc->input('pengguna', $data);
    $cek = $asc->getWhere('pengguna', ['email' => $data['email']]); // Cek berdasarkan email

    if ($cek != null) {
        session()->set([
            'id' => $cek->id_user ?? null, // Pastikan kunci ini ada
            'u' => $cek->nama ?? null, // Ganti dengan nama yang sesuai
            'level' => $cek->level
        ]);
        $this->logActivity("User  terdaftar dengan nama: " . $this->request->getPost('name'));
        return redirect()->to('home/login');
    }
    }

        // Login Page
        public function login()
        {
            if (session()->has('isLoggedIn') && session()->get('isLoggedIn')) {
                return redirect()->to('home/dashboard');
            }
            echo view('header');
            echo view('sign-in');
            echo view('footer');
        }
        public function resetpw()
        {
            if (session()->has('isLoggedIn') && session()->get('isLoggedIn')) {
                return redirect()->to('home/dashboard');
            }
            echo view('header');
            echo view('recover-password');
            echo view('footer');
        }
        
   public function send_reset_link() {
    helper('url'); // Load helper URL
    $emailService = \Config\Services::email(); // Gunakan service email
    $userModel = new User_model();

    $email = $this->request->getPost('email');

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }

    $user = $userModel->get_user_by_email($email);

    if ($user) {
        $token = bin2hex(random_bytes(50)); // Generate token unik
        $userModel->save_token($email, $token);

        $reset_link = base_url("home/reset_password/$token");
        $message = "Click the link to reset your password: <a href='$reset_link'>$reset_link</a>";

        // Konfigurasi Email
        $emailService->setFrom($this->email->fromEmail, $this->email->fromName);
        $emailService->setTo($email);
        $emailService->setSubject('Reset Your Password');
        $emailService->setMessage($message);

        if ($emailService->send()) {
            return "Check your email for the password reset link.";
        } else {
            // Debugging: tampilkan kesalahan
            return $emailService->printDebugger(['headers']);
        }
    } else {
        return "Email not registered.";
    }
}

    public function reset_password($token) {
        $userModel = new User_model(); // Buat instance dari User_model
        $email = $userModel->get_email_by_token($token);

        if (!$email) {
            echo "Invalid or expired token.";
            return;
        }
        echo view('header');
            echo view('reset_password');
            echo view('footer');

        // Lanjutkan dengan logika reset password
    }
   public function reset_pass($token = null)
    {
    $userModel = new \App\Models\User_model();

    if (!$token) {
        return redirect()->to('/home/login')->with('error', 'Invalid request.');
    }

    $email = $userModel->get_email_by_token($token);
    if (!$email) {
        return redirect()->to('/home/login')->with('error', 'Invalid or expired token.');
    }

    if ($this->request->getMethod() === 'post') {
        $password = $this->request->getPost('password');
        $userModel->update_password($email, $password);

        return redirect()->to('/home/login')->with('success', 'Password berhasil diperbarui! Silakan login.');
    }

    // Tampilkan view lengkap dengan header/footer
    echo view('header');
    echo view('reset_password', ['token' => $token]);
    echo view('footer');
    }


        // Handle Login
        public function aksi_login()
        {
            $recaptcha_secret = "6LeF9ugqAAAAALYEZDv-25Ozc7UXzTBhhX-XhLsW"; // Replace with your actual secret key
            $recaptcha_response = $_POST['g-recaptcha-response'];

        // Verify with Google
            $verify_url = "https://www.google.com/recaptcha/api/siteverify";
            $response = file_get_contents($verify_url . "?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response);
            $response_keys = json_decode($response, true);

            if (!$response_keys["success"]) {
                echo "reCAPTCHA verification failed. Please try again.";
                exit();
            }
            $asc = new Model2();
            $data = [
                'nama' => $this->request->getPost('name'),
                'password' => MD5($this->request->getPost('password'))
            ];
            
            $cek = $asc->getWhere('pengguna', $data);
            if ($cek != null) {
                session()->set([
                    'id' => $cek->id_user,
                    'u' => $cek->nama,
                    'level' => $cek->level,
                    'isLoggedIn' => true
                ]);
                
                if ($this->request->getPost('remember')) {
                    setcookie('remember_user', $cek->nama, time() + (86400 * 7), "/");
                }
                $this->logActivity("User login");   
                return redirect()->to('home/dashboard');
            }
            
            return redirect()->to('home/login')->with('error', 'Username atau Password salah!');
        }

        // Logout Function
        public function logout()
        {
            $this->logActivity("User logout");
            session()->destroy();
            setcookie('remember_user', '', time() - 3600, "/");
            return redirect()->to('home/login');
        }

        // Dashboard Page
        public function dashboard()
        {
        // Check if user is logged in
            if (!session()->has('isLoggedIn') || !session()->get('isLoggedIn')) {
                return redirect()->to('home/login')->with('error', 'Silakan login dulu!');
            }

        // Load your model (assuming Model2 is your generic model)
            $this->logActivity("User mengakses dashboard");
            echo view('header');
            echo view('menu_hal');
        echo view('index'); // Pass the fetched data to the view
        echo view('footer');
    }


        // About Page
    public function user()
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
    return redirect()->to('home/dashboard');
    }
        $this->logActivity("User mengakses table User");

        $asc = new Model2();
        $asfe['takdirestui'] = $asc->tampil('pengguna', 'id_user');

        echo view('header');
        echo view('menu_hal', $asfe);
        echo view('about');
        echo view('footer');
    }
    public function restoreuser()
    {
        if (!session()->has('level') || session()->get('level') != 0) {
            return redirect()->to('home/dashboard');
        }
        $this->logActivity("User mengakses table Restore User");

        $asc = new Model2();
        $asfe['takdirestui'] = $asc->tampil('pengguna', 'id_user');

        echo view('header');
        echo view('menu_hal', $asfe);
        echo view('restoreuser');
        echo view('footer');
    }


    public function simpanPengguna()
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
        return redirect()->to('home/dashboard');
        }
        {
            $Joyce = new Model2();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'kendaraan' => $this->request->getPost('kendaraan'),
                'level' => $this->request->getPost('level'),
                'email' => $this->request->getPost('email'),
                'password' => md5($this->request->getPost('password')), // Menggunakan MD5 untuk password
            ];

            // Menambahkan data pengguna ke dalam tabel
            $Joyce->input('pengguna', $data);
            return redirect()->to('home/user');
        }
    }

    public function hapusPengguna($id_user)
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
    return redirect()->to('home/dashboard');
        }

        {

            $Joyce = new Model2();

                // Cek apakah id_user ada
            $cek = $Joyce->db->table('pengguna')->where('id_user', $id_user)->get()->getRow();

            if (!$cek) {
                die('ID user tidak ditemukan!');
            }
            $data = ['delete_status' => '1'];
            $where = ['id_user' => $id_user];

            $Joyce->edit('pengguna', $data, $where);

            return redirect()->to('home/user');
        }
    }

    public function aksirestore($id_user)
    {
        if (session()->get('level') == 0) {
            $Joyce = new Model2();

                // Cek apakah id_user ada
            $cek = $Joyce->db->table('pengguna')->where('id_user', $id_user)->get()->getRow();

            if (!$cek) {
                die('ID user tidak ditemukan!');
            }
            $data = ['delete_status' => '0'];
            $where = ['id_user' => $id_user];

            $Joyce->edit('pengguna', $data, $where);

            return redirect()->to('home/user');
        } 
    }
    public function aksirestoreall()
    {
            if (session()->get('level') == 0) { // Hanya level 0 yang bisa restore
                $Joyce = new Model2();
                
                // Update semua pengguna dengan level 1 menjadi level 0
                $data = ['delete_status' => '0'];
                $where = ['delete_status' => '1'];

                $Joyce->edit('pengguna', $data, $where); // Pastikan `edit` bisa menangani update banyak data

                return redirect()->to('home/user')->with('success', 'Semua user level 1 berhasil diubah ke level 0');
            } else {
                return redirect()->to('home')->with('error', 'Akses ditolak');
            }
        }   

        public function hapusPenggunaril($id_user)
        {
         if (session()->get('level') == 0) {
            $Joyce = new Model2();
            $where = ['id_user' => $id_user];
            $Joyce->hapus('pengguna', $where);
            return redirect()->to('home/user');
        } else {
            return redirect()->to('home');
        }

    }

    public function editPengguna($id_user)
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
        return redirect()->to('home/dashboard');
        }
    {
            $Joyce = new Model2();
            $data['pengguna'] = $Joyce->getWhere('pengguna', ['id_user' => $id_user]);

            // Cek apakah pengguna ditemukan
            if ($data['pengguna']) {
                echo view('header');
                echo view('menu_hal');
                echo view('pengguna_edit', $data);
                echo view('footer');
            } else {
                return redirect()->to('home/user');
            }
        }
    }

    public function updatePengguna($id_user)
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
        return redirect()->to('home/dashboard');
        }
   {
            $Joyce = new Model2();

            // Ambil data dari form
            $data = [
                'nama' => $this->request->getPost('nama'),
                'kendaraan' => $this->request->getPost('kendaraan'),
                'level' => $this->request->getPost('level'),
                'email' => $this->request->getPost('email'),
            ];

            // Cek apakah ada password yang diubah
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $data['password'] = md5($password); // Gunakan md5 jika memang ingin menggunakan md5
            }

            // Update pengguna berdasarkan id
            $Joyce->edit('pengguna', $data, ['id_user' => $id_user]);

            // Redirect setelah update
            return redirect()->to(base_url('home/pengguna'));
        } 
    }

    public function showParkingMap()
    {
        if (!session()->has('id')) {
            return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $parkingModel = new ParkingModel();
        $spaces = $parkingModel->getAllSpaces();
        $data = ['spaces' => $spaces, 'user' => session()->get('user')];

        echo view('header', $data);
        echo view('menu_hal', $data);
        echo view('book_parkir', $data);
        echo view('footer', $data);
    }
    public function showParkingMapMotor()
    {
        if (!session()->has('id')) {
            return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $parkingModel = new ParkingMotorModel();
        $spaces = $parkingModel->getAllSpaces();
        $data = ['spaces' => $spaces, 'user' => session()->get('user')];

        echo view('header', $data);
        echo view('menu_hal', $data);
        echo view('motor_parkir', $data);
        echo view('footer', $data);
    }

        // Book a Parking Spot
    public function bookParking()
    {
        $reservationModel = new ReservationModel();
        $parkingModel = new ParkingModel();
        $paymentModel = new PaymentModel();

        $file = $this->request->getFile('bukti_pembayaran');
        $buktiPembayaran = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);
            $buktiPembayaran = 'uploads/' . $newName;
        } else {
            return redirect()->back()->with('error', 'Upload gagal! Pastikan file sesuai.');
        }

            // Insert reservation
        $reservationData = [
            'id_user' => $this->request->getPost('id_user'),
            'id_parkir' => $this->request->getPost('id_parkir'),
            'kendaraan' => $this->request->getPost('kendaraan'),
            'awal_waktu_reservasi' => date('Y-m-d H:i:s', strtotime($this->request->getPost('awal_waktu_reservasi'))),
            'akhir_waktu_reservasi' => date('Y-m-d H:i:s', strtotime($this->request->getPost('akhir_waktu_reservasi'))),
            'waktu_reservasi' => date('Y-m-d H:i:s'),
            'status' => 'Terbayar'
        ];
        $reservationModel->insert($reservationData);
        $idReservasi = $reservationModel->getInsertID();

            // Insert payment data
        $paymentData = [
            'id_reservasi' => $idReservasi,
            'total_tagihan' => $this->request->getPost('total_tagihan'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'bukti_pembayaran' => $buktiPembayaran,
            'status' => 'Lunas'
        ];
        $paymentModel->insert($paymentData);

            // Update parking space status to booked
        $idParkir = $this->request->getPost('id_parkir');
        $parkingModel->update($idParkir, ['status' => 'booked']);

        return redirect()->to('/home/showParkingMap')->with('success', 'Reservasi berhasil!');
    }
    public function bookParkingMotor()
    {
        $reservationModel = new ReservationMotorModel();
        $parkingModel = new ParkingMotorModel();
        $paymentModel = new PaymentModel();

        $file = $this->request->getFile('bukti_pembayaran');
        $buktiPembayaran = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);
            $buktiPembayaran = 'uploads/' . $newName;
        } else {
            return redirect()->back()->with('error', 'Upload gagal! Pastikan file sesuai.');
        }

            // Insert reservation
        $reservationData = [
            'id_user' => $this->request->getPost('id_user'),
            'id_parkir' => $this->request->getPost('id_parkir'),
            'kendaraan' => $this->request->getPost('kendaraan'),
            'awal_waktu_reservasi' => date('Y-m-d H:i:s', strtotime($this->request->getPost('awal_waktu_reservasi'))),
            'akhir_waktu_reservasi' => date('Y-m-d H:i:s', strtotime($this->request->getPost('akhir_waktu_reservasi'))),
            'waktu_reservasi' => date('Y-m-d H:i:s'),
            'status' => 'Terbayar'
        ];
        $reservationModel->insert($reservationData);
        $idReservasi = $reservationModel->getInsertID();

            // Insert payment data
        $paymentData = [
            'id_reservasi' => $idReservasi,
            'total_tagihan' => $this->request->getPost('total_tagihan'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'bukti_pembayaran' => $buktiPembayaran,
            'status' => 'Lunas'
        ];
        $paymentModel->insert($paymentData);

            // Update parking space status to booked
        $idParkir = $this->request->getPost('id_parkir');
        $parkingModel->update($idParkir, ['status' => 'booked']);

        return redirect()->to('/home/showParkingMap')->with('success', 'Reservasi berhasil!');
    }

    public function showParkingHistory()
    {
        if (!session()->has('id')) {
            return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        
        $reservationModel = new ReservationModel();
        $db = \Config\Database::connect();
        
        $userId = session()->get('id');
        $level = session()->get('level');
        
        $builder = $db->table('reservasi')
        ->select('reservasi.*, parkir.lokasi, pembayaran.id_pembayaran, pembayaran.total_tagihan, pembayaran.metode_pembayaran, pembayaran.bukti_pembayaran')
        ->join('parkir', 'parkir.id_parkir = reservasi.id_parkir', 'left')
        ->join('pembayaran', 'pembayaran.id_reservasi = reservasi.id_reservasi', 'left')
        ->orderBy('reservasi.waktu_reservasi', 'DESC');
        
            // Jika level == 2, hanya tampilkan reservasi user yang sedang login
        if ($level == 2) {
            $builder->where('reservasi.id_user', $userId);
        }
        
        $reservations = $builder->get()->getResultArray();
        $data = [
            'reservations' => $reservations
        ];
        
        echo view('header', $data);
        echo view('menu_hal', $data);
        echo view('parking_history', $data);
        echo view('footer', $data);
    }


    public function updateStatusReservasi($id)
    {
    $reservationModel = new ReservationModel();
    $parkingModel = new ParkingModel();
    $paymentModel = new PaymentModel();

    $reservation = $reservationModel->find($id);
    if (!$reservation) {
        return redirect()->back()->with('error', 'Reservation not found.');
    }

    $payment = $paymentModel->where('id_reservasi', $id)->first();
    $statusSekarang = $reservation['status'];
    $statusBaru = '';
    date_default_timezone_set('Asia/Jakarta');
    $waktuSekarang = date('Y-m-d H:i:s');
    $akhirReservasi = $reservation['akhir_waktu_reservasi'];

    if ($statusSekarang == 'Terbayar') {
        if (!$payment) {
            return redirect()->back()->with('error', 'Reservation has no payment record.');
        }
        $statusBaru = 'Confirmed';
    } elseif ($statusSekarang == 'Terkonfirmasi') {
        $statusBaru = 'Checked-in';
    } elseif ($statusSekarang == 'Checkin') {
        if ($waktuSekarang > $akhirReservasi) {
            $denda = 15000;
            $paymentModel->where('id_reservasi', $id)->set([
                'total_denda' => $denda,
                'bukti_pembayaran_denda' => null
            ])->update();
            $reservationModel->update($id, [
                'status' => 'Waiting for Fine Payment',
                'total_denda' => $denda
            ]);

            // Log activity
            $userId = session()->get('id_user');
            $logMessage = "User ID $userId exceeded reservation time. Fine imposed: Rp$denda.";
            $this->logModel->log_activity($userId, $logMessage);

            return redirect()->back()->with('error', 'Check-out exceeded reservation time! Please upload fine payment proof.');
        } else {
            $statusBaru = 'Checked-out';
            $parkingModel->update($reservation['id_parkir'], ['status' => 'available']);
            $reservationModel->update($id, ['waktu_checkout' => $waktuSekarang]);
        }
    } else {
        return redirect()->back()->with('error', 'Status update failed.');
    }

    $reservationModel->update($id, ['status' => $statusBaru]);

    $userId = session()->get('id_user');

    return redirect()->back()->with('success', 'Status successfully updated to ' .$statusBaru);
    }

    public function cctv()
    {
        if (!session()->has('id')) {
            return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        $this->logActivity("User melihat CCTV");
        echo view('header');
        echo view('menu_hal');
        echo view('cctv_view'); 
        echo view('footer');
    }

    public function showPaymentHistory()
    {
        if (!session()->has('id')) {
            return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        
        $reservationModel = new ReservationModel();
        $db = \Config\Database::connect();
        
        $userId = session()->get('id');
        $level = session()->get('level');
        
        $builder = $db->table('reservasi')
        ->select('reservasi.*, parkir.lokasi, pembayaran.id_pembayaran, pembayaran.total_tagihan, pembayaran.metode_pembayaran, pembayaran.bukti_pembayaran')
        ->join('parkir', 'parkir.id_parkir = reservasi.id_parkir', 'left')
        ->join('pembayaran', 'pembayaran.id_reservasi = reservasi.id_reservasi', 'left')
        ->orderBy('reservasi.waktu_reservasi', 'DESC');
        
            // Jika level == 2, hanya tampilkan reservasi user yang sedang login
        if ($level == 2) {
            $builder->where('reservasi.id_user', $userId);
        }
        
        $reservations = $builder->get()->getResultArray();
        
        $data = [
            'reservations' => $reservations
        ];

        echo view('header', $data);
        echo view('menu_hal', $data);
        echo view('payment_history', $data);
        echo view('footer', $data);
    }

        public function viewLog()
    {
    if (!session()->has('id')) {
        return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    $logModel = new LogActivityModel();
    $level = session()->get('level');
    $userId = session()->get('id');
    $selectedUsername = $this->request->getGet('username'); // Ambil username dari GET

    // Ambil daftar user untuk dropdown
    $users = $logModel->select('username')->distinct()->findAll();

    // Ambil log sesuai level user
    if ($level == 1) {
        if (!empty($selectedUsername)) {
            $logs = $logModel->where('username', $selectedUsername)->findAll();
        } else {
            $logs = $logModel->findAll();
        }
    } else {
        $logs = $logModel->where('id_user', $userId)->findAll();
    }

    // Catat aktivitas user
    $this->logActivity("User melihat Logs");

    $data = [
        'logs' => $logs,
        'users' => $users,
        'selectedUsername' => $selectedUsername // Tambahkan ini agar bisa dipakai di view
    ];

    echo view('header', $data);
    echo view('menu_hal', $data);
    echo view('log_activity', $data);
    echo view('footer', $data);
    }
    public function pengaturan()
    {
        $db = db_connect();
        $pengaturan = $db->table('pengaturan_app')->get()->getRow();
        echo view('header');
        echo view('pengaturan', ['pengaturan' => $pengaturan]);
        echo view('footer');
    }
    public function simpan_pengaturan()
    {
        $db = db_connect();
    
        // Ambil file yang diunggah untuk logo header
        $fileLogo = $this->request->getFile('logo');
    
        // Ambil file yang diunggah untuk logo favicon
        $fileLogoWeb = $this->request->getFile('logo_web');
    
        // Ambil data pengaturan saat ini
        $pengaturan = $db->table('pengaturan_app')->get()->getRow();
    
        // Inisialisasi variabel untuk nama file
        $logoName = $pengaturan->logo; // Gunakan logo lama sebagai default
        $logoWebName = $pengaturan->logo_web; // Gunakan logo_web lama sebagai default
    
        // Proses logo header
        if ($fileLogo && $fileLogo->isValid() && !$fileLogo->hasMoved()) {
            // Validasi tipe file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($fileLogo->getMimeType(), $allowedTypes)) {
                return redirect()->back()->with('error', 'Hanya file gambar yang diperbolehkan (JPG, PNG, GIF).');
            }
    
            // Generate nama file unik dan pindahkan file
            $logoName = $fileLogo->getRandomName();
            $fileLogo->move(FCPATH . 'uploads', $logoName);
    
            // Hapus logo lama jika ada
            if ($pengaturan->logo && file_exists(FCPATH . 'uploads/' . $pengaturan->logo)) {
                unlink(FCPATH . 'uploads/' . $pengaturan->logo);
            }
        }
    
        // Proses logo favicon
        if ($fileLogoWeb && $fileLogoWeb->isValid() && !$fileLogoWeb->hasMoved()) {
            // Validasi tipe file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/x-icon'];
            if (!in_array($fileLogoWeb->getMimeType(), $allowedTypes)) {
                return redirect()->back()->with('error', 'Hanya file gambar yang diperbolehkan (JPG, PNG, GIF, ICO).');
            }
    
            // Generate nama file unik dan pindahkan file
            $logoWebName = $fileLogoWeb->getRandomName();
            $fileLogoWeb->move(FCPATH . 'uploads', $logoWebName);
    
            // Hapus logo_web lama jika ada
            if ($pengaturan->logo_web && file_exists(FCPATH . 'uploads/' . $pengaturan->logo_web)) {
                unlink(FCPATH . 'uploads/' . $pengaturan->logo_web);
            }
        }
    
        // Ambil data dari input form
        $data = [
            'judul' => $this->request->getPost('judul'),
            'logo' => $logoName, // Simpan nama file logo header ke database
            'logo_web' => $logoWebName, // Simpan nama file logo favicon ke database
        ];
    
        // Update ke database
        $db->table('pengaturan_app')->update($data);
    
        return redirect()->to('home/dashboard')->with('success', 'Pengaturan berhasil diperbarui!');
    }
    
}
