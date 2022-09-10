<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check() && Auth()->user()->hasRole('pembeli')) {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    $checkCart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->get();
                    foreach ($checkCart as $cart) {
                        $qtyProduct = $cart->product_qty + $product_qty;
                        if ($qtyProduct > $cart->product->stoke) {
                            return response()->json([
                                'status' => "Kuantiti tidak boleh melebihi stok"
                            ]);
                        } else {
                            $updateCart = Cart::where('id', $cart->id)->first();
                            $updateCart->product_qty = $updateCart->product_qty + $product_qty;
                            $updateCart->update();
                            return response()->json([
                                'status' => $prod_check->name . " ditambahkan ke Keranjang"
                            ]);
                        }
                    }
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . " ditambahkan ke Keranjang"]);
                }
            }
        } else {
            return response()->json([
                'status' => "Silahkan login!",
            ]);
        }
    }

    public function viewCart()
    {
        $cartItem = Cart::with('product')->where('user_id', Auth::id())->latest()->get();

        foreach ($cartItem as $item) {
            $product_new = Product::with('photo_product', 'review')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.id', '!=',  $item->product_id)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
        }
        
        return view('pages.bag.index', compact('cartItem', 'product_new'));
    }

    public function deleteCartItem(Request $request)
    {
        if (Auth::check() && Auth()->user()->hasRole('pembeli')) {
            $product_id = $request->input('product_id');
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => $cartItem->product->name . " berhasil dihapus dari Keranjang!"]);
            }
        } else {
            return response()->json(['status' => "Silahkan login!"]);
        }
    }

    public function updateCartItem(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check() && Auth()->user()->hasRole('pembeli')) {
            $product_id = $request->input('product_id');
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->product_qty = $product_qty;
                $cartItem->update();
                return response()->json(['status' => "Memperbarui kuantiti!"]);
            }
        }
    }
}
