<?php

namespace App\Transformers;

use App\Models\ModelInterface;

class NotificationsTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $data): array
    {
        return [
            'id' => $data->id,
            'user' => UserTransformer::transformSingle($data->user),
            'related_to' => $data->related_to,
            'related_id' => $data->related_id,
            'notification' => $data->notification,
            'url' => $data->url,
            'read_at' => $data->read_at,
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (ModelInterface $notification) {
            return self::transformSingle($notification);
        }, $data);
    }
}