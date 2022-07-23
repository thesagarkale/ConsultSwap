<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Transformers\CategoriesTransformer;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class Welcome extends Controller
{
    public function index(): View
    {
        $categories = Category::inRandomOrder()->limit(20)->get();

        return view('welcome', [
            'categories' => $categories->all()
        ]);
    }
}
