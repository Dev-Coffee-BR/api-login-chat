<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Os nomes dos cookies que não devem ser criptografados.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
