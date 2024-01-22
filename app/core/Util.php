<?php

class Util
{
    public static function setFlash($massage , $type) 
    {
        $_SESSION['flash'] = [
            'massage'=> $massage,
            'type'=> $type
        ];

    }
    public static function flash()
    {                    
        if (isset($_SESSION['flash']))
        {
            echo '<div class="alert alert-'.$_SESSION['flash']['type'].' alert-dismissible fade show " role="alert">'.$_SESSION['flash']['massage'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

          unset($_SESSION['flash']);
        }
    }   

    public static function format_rupiah($angka) {
        return "Rp " . number_format($angka, 0, ',', '.');
    }

    public static function date() 
    {
        // Set lokal ke Indonesia
        setlocale(LC_TIME, 'id_ID');

        date_default_timezone_set('Asia/Jakarta');

        // Ambil tanggal dan waktu saat ini
        $dateTime = new DateTime('now');
        $dateTime = $dateTime->format("Y-m-d H:i:s");

        return $dateTime;
  
    }
    
    public static function compareDates($a, $b) {
    $dateA = strtotime($a['date']);
    $dateB = strtotime($b['date']);

    return $dateA - $dateB;
}
}