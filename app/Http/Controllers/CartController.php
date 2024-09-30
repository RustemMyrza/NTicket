<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart ($routeId)
    {
        $userId = Auth::user()->id;
        $route = new Cart();
        $route->route = $routeId;
        $route->user = $userId;
        $route->save();
        return redirect()->back()->with('success_message', 'Маршрут успешно добавлен в корзину.');
    }

    public function cartPage ()
    {
        $userId = Auth::user()->id;
        $routes = Cart::query()->where('user', $userId)->with(['getRoute', 'getUser'])->get();
        // return $routes;
        return view('pages.cart', compact('routes'));
        return $routes;
    }

    public function deleteFromCart ($routeId)
    {
        $route = Cart::find($routeId);
        $route->delete();
        return redirect()->back()->with('success_message', 'Маршрут успешно удален из корзины.');
    }
}
