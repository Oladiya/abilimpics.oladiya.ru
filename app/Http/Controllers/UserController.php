<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        $orders = $request->user()->orders;

        $orders->each(function ($item, $key) {
            $item->product;
        });

        return view('user', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function admin(Request $request)
    {
//        if($request->user()->cannot('viewAny')){
//            abort(403);
//        }

        $this->authorize('viewAny', User::class);

        $orders = Order::all();

        return view('admin_panel', compact('orders'));
    }
}
