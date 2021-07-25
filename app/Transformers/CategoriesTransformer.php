<?php

namespace App\Transformers;

use App\Models\Category;
use App\Models\ModelInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoriesTransformer implements TransformerInterface
{
    public static function transformArray(array $categories): array
    {
        return array_map(function (Category $category) {
            return [
                'id' => $category->id,
                'label' => $category->label,
                'slug' => $category->slug,
            ];
        }, $categories);
    }

    public static function transformSingle(ModelInterface $category): array
    {
        return [
            'id' => $category->id,
            'label' => $category->label,
            'slug' => $category->slug,
        ];
    }
}