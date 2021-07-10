<?php


namespace App\Transformers;


use App\Models\User;

trait UserTransformer
{
    public function transformUser(User $user): array
    {
        return [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ];
    }
}