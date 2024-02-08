<?php

if (!function_exists('user')) {
    /**
     * Retorna o usuário logado.
     *
     * @return object|null
     */
    function user()
    {
        return (object) session()->get('user');
    }
}
