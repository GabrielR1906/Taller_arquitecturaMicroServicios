<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class UserService
{
    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        // CORRECCIÓN: Usamos env() directamente en lugar de config()
        $this->baseUri = env('USERS_SERVICE_BASE_URL');
        $this->secret = env('USERS_SERVICE_SECRET');
    }

    public function obtainUser($id)
    {
        return $this->performRequest('GET', "/users/{$id}");
    }
}