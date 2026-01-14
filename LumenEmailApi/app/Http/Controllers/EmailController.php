<?php

namespace App\Http\Controllers;

use App\Email;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UserService;

class EmailController extends Controller
{
    use ApiResponser;

    /**
     * El servicio para consumir usuarios (si lo necesitamos a futuro)
     */
    public $userService;

    /**
     * Crear una nueva instancia del controlador
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Listar el historial de correos enviados
     */
    public function index()
    {
        $emails = Email::all();
        return $this->successResponse($emails);
    }

    /**
     * Simular el envío de un correo y guardarlo en historial
     */
    public function send(Request $request)
    {
        // 1. Validar los datos que nos envían
        $rules = [
            'recipient' => 'required|email', // Debe ser un email válido
            'subject' => 'required|max:255',
            'content' => 'required|max:1000',
        ];

        $this->validate($request, $rules);

        // 2. Aquí iría la lógica real de envío (SMTP, Mailgun, etc.)
        // Por ahora, simulamos que siempre se envía correctamente.

        // 3. Guardar el registro en la base de datos
        $data = $request->all();
        $data['status'] = 'sent'; // Forzamos el estado a enviado

        $email = Email::create($data);

        // 4. Retornar respuesta
        return $this->successResponse($email, Response::HTTP_CREATED);
    }
}