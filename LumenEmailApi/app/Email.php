<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * Los atributos que son asignables masivamente.
     */
    protected $fillable = [
        'recipient',
        'subject',
        'content',
        'status',
    ];
}