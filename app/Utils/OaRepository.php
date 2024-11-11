<?php

namespace App\Utils;

use Illuminate\Support\Arr;

class OaRepository
{
    /**
     * @param array $request
     * @param string $key
     * @param string $default
     * @return array|\ArrayAccess|mixed|string
     */
    static public function store(
        array  $request,
        string $key,
               $default = null
    )
    {
        return Arr::has($request, $key) ? Arr::get($request, $key) : $default;
    }

    /**
     * @param array $request
     * @param string $key
     * @param $db_model
     * @return array|\ArrayAccess|mixed
     */
    static public function update(
        array  $request,
        string $key,
               $db_model
    )
    {
        return Arr::has($request, $key) ? Arr::get($request, $key) : $db_model->$key;
    }
}
