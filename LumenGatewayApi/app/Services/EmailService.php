<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class EmailService
{
    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        // Usamos la configuración que ya definiste en config/services.php
        // pero le agregamos un respaldo directo con env() por si acaso.
        $this->baseUri = config('services.emails.base_uri') ?: env('EMAILS_SERVICE_BASE_URL');
        $this->secret = config('services.emails.secret') ?: env('EMAILS_SERVICE_SECRET');
    }

    /**
     * Obtener la lista de correos
     */
    public function obtainEmails()
    {
        return $this->performRequest('GET', '/emails');
    }

    /**
     * Crear un nuevo correo
     */
    public function createEmail($data)
    {
        return $this->performRequest('POST', '/emails', $data);
    }
}