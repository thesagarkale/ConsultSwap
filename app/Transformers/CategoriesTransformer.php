<?php


namespace App\Transformers;


use App\Models\Category;

trait CategoriesTransformer
{
    public function transformCategories(array $categories): array
    {
        return array_map(function (Category $category) {
            return [
                'id' => $category->id,
                'label' => $category->label,
                'slug' => $category->slug,
            ];
        }, $categories);
    }
}