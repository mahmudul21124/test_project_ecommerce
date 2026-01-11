<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Handle sorting by price
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'low_high': // Price ascending
                    $query->orderBy('price', 'asc');
                    break;
                case 'high_low': // Price descending
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->latest(); // fallback: newest
            }
        } else {
            $query->latest(); // default sort
        }

        $products       = $query->paginate(10)->withQueryString();
        $recentProducts = Product::latest()->take(3)->get();

        return view('shop', compact('products', 'recentProducts'));
    }
}
