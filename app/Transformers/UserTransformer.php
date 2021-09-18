<?php


namespace App\Transformers;


use App\Models\ModelInterface;
use App\Models\User;

class UserTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $user): array
    {
        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'username' => $user->username,
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (User $user) {
            return [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'username' => $user->username,
            ];
        }, $data);
    }
}