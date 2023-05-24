<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use App\Policies\OrderPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = OrderCollection::make($request->user()->orders);
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $data = [
          'user_id' => Auth::id(),
          'product_id' => $request->product,
          'col' => rand(1, 50),
          'address' => fake()->address(),
          'status' => '',
        ];
        $order = Order::create($data);
        return redirect()->route('user.ls');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = OrderResource::make(Order::findOrFail($id));
        return $order;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('viewAny', Auth::user());
        $order = Order::find($id);
        $order->update(['status' => 'Отправлено']);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if (Auth::user()->cannot('delete', Order::find($id))){
            abort(403);
        }
        Order::destroy($id);
        return redirect()->back();
        return response(['message' => __('OK')], 200);
    }
}
