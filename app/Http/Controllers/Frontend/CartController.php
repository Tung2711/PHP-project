<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\OrderDetailService;

class CartController extends Controller
{
    protected $cartService;

    protected $customerService;

    protected $orderService;

    protected $orderDetailService;

    public function __construct(CartService $cartService,CustomerService $customerService,OrderService $orderService,OrderDetailService $orderDetailService){
        $this->cartService     = $cartService;
        $this->customerService = $customerService;
        $this->orderService    = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $products = $this->cartService->all();

        return view('frontend.carts.index', [
            'products' => $products
        ]);
    }

     public function update(Request $request)
    {
        $this->cartService->update($request->qty);
        return redirect()->to(route('cart.index'));
    }

    public function store($productId)
    {
        //dd(session()->all());
        $this->cartService->store($productId);
        return redirect()->to(route('frontend.home'));
    }

    public function destroy($productId)
    {
        $this->cartService->delete($productId);

        return redirect()->to(route('cart.index'));
    }

    public function checkout(Request $request)
    {   
        try {
            if(empty(session()->get('cart'))) {
                 return response()->json([
                'status' => false,
            ]);
            }

            $customer = $this->customerService->save($request->all());
            $order = $this->orderService->save(['customer_id' => $customer->id]);
            $this->orderDetailService->store($order->id , session()->get('cart'));

           session()->forget('cart');

            return response()->json([
                //'customer' => $customer,
                'message' => 'Store successfully',
                'status'  => true,
            ]);
        } catch(\Exception $e){
             return response()->json([
                'message' => $e->getMessage(),
                'status'=> false,
            ]);
        }
        //return response()->json([
        //     'products' => session()->get('cart'),
        //     'data' => $request->all(),
        // ]);
    }
}
