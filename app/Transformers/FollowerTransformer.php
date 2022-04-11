<?php

namespace App\Transformers;

use App\Models\ModelInterface;
use Illuminate\Support\Carbon;

class FollowerTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $data): array
    {
        return [
            'user_id' => $data->user_id,
            'follower_id' => $data->follower_id,
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (ModelInterface $answer) {
            return self::transformSingle($answer);
        }, $data);
    }
}