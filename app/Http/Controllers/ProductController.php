<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Products;
use App\Models\Product;
use App\Models\User;
use Stripe;
use Exception;

class ProductController extends Controller {

    /**
     * @var $products
     */
    protected $products;

    /**
     *
     * @param Products $products
     */
    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    /**
     * Find all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = $this->products->findAll();
        return view('products/list', compact('products'));
    }

    /**
     * Show the product details by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find(1);
        $intent = $user->createSetupIntent();
        $product = $this->products->findById($id);
        return view('products/show', compact('product', 'intent'));
    }

    /**
     * Process payment and redirect.
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function payment($id, Request $request) {
        $user = User::find(1);
        $product = Product::find($id);
        $paymentMethod = $request->input('payment_method');
        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $result = $user->charge($product->price * 100, $paymentMethod);
            return redirect('/product')->with('message', 'Product purchased successfully!');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

}
