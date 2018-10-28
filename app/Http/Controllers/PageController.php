<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Brand;
use App\Category;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Session;
use Hash;
use Auth;

session_start();
class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('publication_status',1)->paginate(12);
        $sale_product = Product::where('price_sale','<>',0)->paginate(8);
        return view('pages.trangchu',compact('slide','new_product','sale_product'));
    }

    public function getLoaiSp($id_cate)
    {
        $theloai = Category::all();
        $product = Product::where('id_category','=',$id_cate)->get();
        $sp_khac = Product::where('id_category','<>',$id_cate)->get();
        return view('pages.loai_sanpham',compact('sp_khac','product','theloai'));
    }

    public function getChitiet(Request $request)
    {
        $sanpham = Product::where('id', $request->id)->first();
        $sp_tuongtu = Product::where('id_category', $sanpham->id_category)->paginate(3);
        $new_product = Product::where('publication_status',1)->get();
        $sale_product = Product::where('price_sale','<>',0)->get();
        return view('pages.chitiet_sanpham',compact('sanpham','sp_tuongtu','new_product','sale_product'));
    }

    public function getLienHe()
    {
        return view('pages.lienhe');
    }

    public function getGioiThieu()
    {
        return view('pages.gioithieu');
    }

    public function getAddtoCart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->Session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        // return redirect()->back();
    }

    public function getCheckout()
    {   
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('pages.dat_hang',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
        else
        {
            return view('pages.dat_hang');
        }
    }

    public function postCheckout(Request $request)
    {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();

        }
       
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Bạn đã đặt hàng thành công - Chúc bạn một ngày vui vẻ');
    }

    public function getLogin()
    {
        return view('pages.dang_nhap');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, 
        [
            'email'=>'required|email|',
            'password'=>'required|min:4|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.requried'=>'Vui lòng nhập password',
            'password.min'=>'Mật khẩu chứa ít nhất 4 kí tự',
            'password.max'=>'Mật khẩu không quá 20 kí tự'
        ]);
        $credentials = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($credentials))
        {
            return redirect()->route('trang-chu')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else
        {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSignup()
    {
        return view('pages.dang_ki');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, 
        [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|max:20',
            'name'=>'required',
            'repassword'=>'required:same:password',
        ], 
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'repassword.same'=>'Mật khẩu không giống nhau',
            'password.min'=>'Mật khẩu phải có độ dài từ 4 đến 20 kí tự',
            'password.max'=>'Mật khẩu phải có độ dài từ 4 đến 20 kí tự'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('thongbao','Bạn đã đăng kí tài khoản thành công');
    }

    public function getSearch(Request $request)
    {
        $product = Product::where('name','like','%'.$request->key.'%')
                        ->orWhere('price', $request->key)
                        ->get();
        return view('pages.search',compact('product'));
    }
}
