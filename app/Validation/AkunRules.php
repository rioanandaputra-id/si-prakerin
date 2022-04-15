<?php

namespace App\Validation;

use App\Models\AkunModel;

class AkunRules
{
    public function validateAkun(string $str, string $fields, array $data)
    {
        $model = new AkunModel();
        $akun = $model->where('username', $data['username'])
            ->first();

        if (!$akun) {
            return false;
        }

        return password_verify($data['password'], $akun['password']);
    }
}
