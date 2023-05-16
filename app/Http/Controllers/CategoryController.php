<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(string $code, Request $request)
    {
        $category = Category::where('code', $code)->firstOrFail();

        if (!$category || !$category->active) {
            abort(404);
        }

        // Получим параметры фильтрации
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Получим список товаров с учетом фильтров и постраничной навигации
        $products = $category->products()
            ->when($minPrice, function ($query) use ($minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query) use ($maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->paginate(5);

        // Выведем шаблон с передачей переменной категории и списка товаров
        return view('category.show', compact('category', 'products'));
    }
}
