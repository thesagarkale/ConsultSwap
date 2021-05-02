<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Categories extends Controller
{
    public function get(Request $request): JsonResponse
    {
        $categories = Category::query()->where('deleted_at','=', null)->get();

        return Response::json($categories);
    }
}
