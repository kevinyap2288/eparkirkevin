<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail = 'tesforweb595@gmail.com'; // Ganti dengan email Anda
    public $fromName = 'E-parkir'; // Nama pengirim
    public $protocol = 'smtp';
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser  = 'tesforweb595@gmail.com'; // Ganti dengan email Anda
    public $SMTPPass = 'jvyo iogu vgjq feha'; // Ganti dengan password email Anda
    public $SMTPPort = 587; // Port untuk TLS
    public $SMTPCrypto = 'tls'; // Gunakan TLS
    public $mailType = 'html'; // Jika Anda mengirim email dalam format HTML
    public $charset = 'UTF-8';
    public $wordWrap = true;
    public $validate = true; // Validasi email
    public $priority = 3;
    public $newline = "\r\n";
    public $CRLF = "\r\n";
}