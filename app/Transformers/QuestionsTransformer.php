<?php

namespace App\Transformers;

use App\Models\ModelInterface;
use App\Models\Question;
use Illuminate\Support\Carbon;

class QuestionsTransformer implements TransformerInterface
{
    public static function transformSingle(ModelInterface $question): array
    {
        return [
            'id' => $question->id,
            'created_at' => (new Carbon($question->created_at))->format(' jS F Y h:i:s A'),
            'title' => $question->title,
            'description' => $question->description,
            'creator' => UserTransformer::transformSingle($question->creator),
            'categories' => CategoriesTransformer::transformArray($question->category()->getEager()->all()),
            'answers' => AnswersTransformer::transformArray($question->answers()->getEager()->all()),
        ];
    }

    public static function transformArray(array $data): array
    {
        return array_map(function (Question $question) {
            return self::transformSingle($question);
        }, $data);
    }
}