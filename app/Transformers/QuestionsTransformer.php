<?php

namespace App\Transformers;

use App\Models\ModelInterface;
use App\Models\Question;

class QuestionsTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $question): array
    {
        return [
            'title' => $question->title,
            'description' => $question->description,
            'category' => CategoriesTransformer::transformArray($question->category()->getEager()->all()),
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (Question $question) {
            return [
                'id' => $question->id,
                'title' => $question->title,
                'description' => $question->description,
                'creator' => UserTransformer::transformSingle($question->creator),
                'category' => CategoriesTransformer::transformArray($question->category()->getEager()->all()),
            ];
        }, $data);
    }
}