<?php

namespace App\Services;

class QRCodeService
{
    public function __construct()
    {
        // Cargar solo una vez la librería
        if (!class_exists('QRcode')) {
            require_once app_path('Libraries/phpqrcode/qrlib.php');
        }
    }

    public function generar(string $url, string $filename)
    {
        $ruta = public_path("qrcodes/" . $filename);

        // Crear carpeta si no existe
        if (!file_exists(public_path('qrcodes'))) {
            mkdir(public_path('qrcodes'), 0777, true);
        }

        // Generar QR
        \QRcode::png($url, $ruta);

        return "qrcodes/" . $filename;
    }
}
