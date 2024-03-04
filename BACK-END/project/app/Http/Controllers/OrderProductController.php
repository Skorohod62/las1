<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\OrderProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelPdf\Facades\Pdf;
use App\Mail\MyCustomMail;
use Illuminate\Support\Facades\Mail;
class OrderProductController extends Controller
{ public function __construct(private readonly OrderProductService $orderProductService)
{

}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orderProducts = OrderProduct::paginate();

        return view('admin_panel.product_orders.index', compact('orderProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();

        return view('admin_panel.product_orders.create', compact(['orders','products']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->orderProductService->create($request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'subtotal_price' => 'required'
        ]));

        return redirect()->route('admin.order-products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderProduct = $this->orderProductService->firstById($id);
        return view('admin_panel.product_orders.show', compact('orderProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin_panel.product_orders.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->orderProductService->update($id, $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'subtotal_price' => 'required'
        ]));

        return redirect()->route('admin.order-products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OrderProduct::destroy($id);
        return redirect()->route('admin.order-products.index');
    }

    public function destroyInKorzina(string $id)
    {
        $product_order = OrderProduct::find($id);
        $product = Product::find($product_order->product_id);
        $product->increment('stock', $product_order->quantity);
        OrderProduct::destroy($id);
        return redirect()->route('korzina');
    }

    public function pdf()
    {
        $user = Auth::user();
        $order =  $user->orders()->where('status', '1')->first();
        $order->update(['status'=>2]);
        $emailUser = $user->email;
        Mail::to($emailUser)->send(new MyCustomMail);
        return Pdf::view('otchet', compact('order'))->download('otchet');
    }

}
