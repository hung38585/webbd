<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\InfomationInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    private $infomationRepo;
    private $productRepo;
    private $cartModel;
    private $orderModel;
    public function __construct(InfomationInterface $infomationRepository, ProductInterface $ProductRepository)
    {
        $this->infomationRepo = $infomationRepository;
        $this->productRepo = $ProductRepository;
        $this->cartModel = new Cart();
        $this->orderModel = new Order();
        $infomation = $this->infomationRepo->getAll();
        view()->share(compact('infomation'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = session()->get('cart');
        return view('client.cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->product_id;
        if(!$id) {
            abort(404);
        }
        $product = $this->productRepo->getById($id); 
        if (!$product) {
            return redirect()->back()->with('already_exist', 'Sản phẩm không tồn tại!');
        }
        if (!(int)$request->product_quantity) {
            return redirect()->back()->with('already_exist', 'Hãy chọn số cho số lượng sản phẩm!');
        }
        if ($request->product_quantity < 1 || $request->product_quantity > 100) {
            return redirect()->back()->with('already_exist', 'Hãy chọn số lượng sản phẩm từ 1 đến 100!');
        }
        $cart = $this->cartModel->addToCart($product, $request->product_quantity);
        if ($cart == 2) {
            return redirect()->back()->with('already_exist', 'Sản phẩm đã có trong giỏ hàng!');
        }
        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->product_quantity > 100 || $request->product_quantity < 1) {
            return redirect()->back()->with('false', 'Xin vui lòng chọn số lượng sản phẩm từ 1 đến 100!');
        }
        $cart = $this->cartModel->updateCart($request->product_update, $request->product_quantity);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cart = $this->cartModel->removeCart($request->product_delete);
        return redirect()->back();
    }

    public function checkout()
    {
        $carts = session()->get('cart');
        return view('client.cart.checkout', compact('carts'));
    }

    public function order(Request $request)
    {
        $order = $this->orderModel->create($request->all());
        if ($order) {
            $request->session()->forget('cart');
            return redirect('/gio-hang')->with('order_success', 'Đặt hàng thành công!');
        }
    }
}
