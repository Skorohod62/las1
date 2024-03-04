<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class OrderController extends Controller
{
    public function __construct(private readonly OrderService $orderService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate();

        return view('admin_panel.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('admin_panel.orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->orderService->create($request->validate([
            'user_id' => 'required|integer',
            'administrator_id' => 'required|integer',
            'total_price' => 'required|numeric',
            'address' => 'required',
            'payment_method' => 'required',
            'payment_status' => 'required',
            'date' => 'required',
            'status' => 'required',
            'order_date' => 'required'
        ]));

        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = $this->orderService->firstById($id);
        return view('admin_panel.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin_panel.orders.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->orderService->update($id, $request->validate([
            'user_id' => 'required|integer',
            'administrator_id' => 'required|integer',
            'total_price' => 'required|numeric',
            'address' => 'required',
            'payment_method' => 'required',
            'payment_status' => 'required',
            'date' => 'required',
            'status' => 'required',
            'order_date' => 'required'
        ]));

        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::destroy($id);
        return redirect()->route('admin.orders.index');
    }

    public function makeOrder(Request $request)
    {
        $user = Auth::user();
        $existingOrder = $user->orders()->where('status',1)->first();

        $productId = $request->input('id');
        $quantity = $request->input('quantity');

        $product = Product::find($productId);
        if ($product && $product->stock >= $quantity) {
            $product->decrement('stock', $quantity);


            $anyOrder = $user->orders->isNotEmpty();
            if (!$existingOrder || !$anyOrder) {
                $order = Order::query()->create([
                    'address' => fake()->address(),
                    'administrator_id' => User::all()->where('role_id' , 1)->random()->id,
                    'user_id' => Auth::user()->id,
                    'total_price' => $request->quantity * $request->price,
                    'payment_method' => 1,
                    'payment_status' => 1,
                    'status' => 1,
                    'date' => Date::now(),
                    'order_date' => Date::now()->addDay()
                ]);
            } else {
                $order = $existingOrder;
            }
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $request->id,
                'quantity' => $request->quantity,
                'subtotal_price' => $request->quantity * $request->price
            ]);

            $newTotalPrice = $order->order_products()->sum('subtotal_price');

            $order->update(['total_price' => $newTotalPrice]);

            return redirect()->route('katalog');
        }
        return redirect()->route('katalog')->with('error', 'превышено количество на складе');

    }
}
