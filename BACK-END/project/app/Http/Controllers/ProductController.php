<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate();

        return view('admin_panel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_panel.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $this->productService->create($request->validate([
            'name' => 'required',
            'image' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required'
        ]));

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->productService->firstById($id);
        return view('admin_panel.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin_panel.products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $this->productService->update($id, $request->validate([
            'name' => 'required',
            'image' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required'
        ]));

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }

    public function kartohka(string $id)
    {
        $product = Product::query()->find($id);

        return view('kartohka', compact('product'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name','LIKE','%'.$request->name.'%')->paginate();
        return view('katalog', compact('products'));
    }
    public function SortByASC(Request $request)
    {
        $sortBy = $request->input('sort_by', 'name'); // По умолчанию сортируем по названию
        $sortDirection = $request->input('sort_direction', 'asc'); // По умолчанию сортируем по возрастанию
        $products = Product::orderBy($sortBy, $sortDirection)->paginate();
        return view('katalog', compact('products'));
    }

    public function SortByDESC(Request $request)
    {
        $sortBy = $request->input('sort_by', 'name'); // По умолчанию сортируем по названию
        $sortDirection = $request->input('sort_direction', 'desc'); // Теперь сортируем по убыванию
        $products = Product::orderBy($sortBy, $sortDirection)->paginate();
        return view('katalog', compact('products'));
    }
    public function sortByPriceDescending(Request $request)
    {
        $products = Product::orderByRaw('CAST(price AS UNSIGNED) DESC')->paginate();
        return view('katalog', compact('products'));
    }
    public function sortByPriceAscending(Request $request)
    {
        $products = Product::orderByRaw('CAST(price AS UNSIGNED) ASC')->paginate();
        return view('katalog', compact('products'));
    }

    public function sortByWeight(Request $request)
    {
        $grams = $request->input('grams');
        $products = Product::when($grams, function ($query, $grams) {
            return $query->where('weight', $grams);
        })->get();

        return view('katalog', compact('products'));
    }
}
