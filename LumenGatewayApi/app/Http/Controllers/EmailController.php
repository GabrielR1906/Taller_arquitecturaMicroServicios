<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmailController extends Controller
{
    use ApiResponser;

    /**
     * El servicio que consume el microservicio de emails
     */
    public $emailService;

    /**
     * Inyectamos el servicio en el constructor
     */
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Retorna la lista de correos (GET /emails)
     */
    public function index()
    {
        return $this->successResponse($this->emailService->obtainEmails());
    }

    /**
     * Envía un nuevo correo (POST /emails)
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->emailService->createEmail($request->all()), Response::HTTP_CREATED);
    }
}