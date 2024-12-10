<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::all();
            return DataTables::of($products)->make(true);
        }
    }
}
