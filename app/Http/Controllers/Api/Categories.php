<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Transformers\CategoriesTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Categories extends Controller
{
    use CategoriesTransformer;

    public function get(Request $request): JsonResponse
    {
        $categories = Category::query()->where('deleted_at','=', null)->get();

        $transformed = $this->transformCategories($categories->all());

        return Response::json($transformed);
    }
}
