<?php

namespace App\Transformers;

use App\Models\ModelInterface;

class AnswersTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $data): array
    {
        return [
            'answer' => $data->answer,
            'creator' => UserTransformer::transformSingle($data->answerer),
            'created_at' => $data->created_at,
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (ModelInterface $answer) {
            return [
                'answer' => $answer->answer,
                'creator' => UserTransformer::transformSingle($answer->answerer),
                'created_at' => $answer->created_at,
            ];
        }, $data);
    }
}