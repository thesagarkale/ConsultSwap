<?php

namespace App\Transformers;

use App\Models\ModelInterface;
use Illuminate\Support\Carbon;

class AnswersTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $data): array
    {
        return [
            'id' => $data->id,
            'answer' => $data->answer,
            'creator' => UserTransformer::transformSingle($data->answerer),
            'created_at' => (new Carbon($data->created_at))->format(' jS F Y h:i:s A'),
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (ModelInterface $answer) {
            return self::transformSingle($answer);
        }, $data);
    }
}