<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(Request $request)
{
    $query = Product::query();

    if ($request->has('search') && $request->search != '') {
        $searchKeyword = $request->search;

        $query->where(function($q) use ($searchKeyword) {
            $q->where('name', 'like', '%' . $searchKeyword . '%')

            ->orWhere('description', 'like', '%' . $searchKeyword . '%')

            ->orWhereHas('category', function($catQuery) use ($searchKeyword) {

                $catQuery->where('name', 'like', '%' . $searchKeyword . '%');

            });
        });
    }

    $products = $query->get();

    return view('home.index', compact('products'));
}

}
