<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * Os nomes dos atributos que não devem ser aparados.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
