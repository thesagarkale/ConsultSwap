<?php

namespace App\Transformers;

use App\Models\ModelInterface;

class MessagesTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $data): array
    {
        return [
            'from' => UserTransformer::transformSingle($data->sender),
            'to' => UserTransformer::transformSingle($data->receiver),
            'message' => $data->message,
            'created_at' => $data->created_at,
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (ModelInterface $message) {
            return [
                'from' => UserTransformer::transformSingle($message->sender),
                'to' => UserTransformer::transformSingle($message->receiver),
                'message' => $message->message,
                'created_at' => $message->created_at,
            ];
        }, $data);
    }
}