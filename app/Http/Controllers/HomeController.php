<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\product;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    public function redirect()
    {
       $usertype = Auth::user()->usertype;

       if($usertype == '1')
       {
           return view('admin.home');
       }
       else
       {
            $data = product::paginate(3);

            $user = auth()->user();

            $count = cart::where('phone', $user->phone)->count();

            return view('user.home', compact('data', 'count'));
       }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = product::paginate(3);

            return view('user.home', compact('data'));
        }
      
    }

    public function search(Request $request)
{
    //  search 
    $search = $request->search;

    if($search==''){
        $data = product::paginate(3);
        return view('user.home', compact('data'));
    }

    $data = product::where('title', 'like', '%'.$search.'%')->get();

    return view('user.home', compact('data'));
}

public function addcart(Request $request, $id)
{
    
    if(Auth::id())
    {
        $user = auth()->user();

        $product = product::find($id);

       $cart=new cart;

       $cart->name=$user->name;
       $cart->phone=$user->phone;
       $cart->address=$user->address;
       $cart->product_title=$product->title;
       $cart->price=$product->price;
       $cart->quantity=$request->quantity;

       $cart->save();
       
        
        return redirect()->back();   
    }
    else
    {
        
        return redirect('login');
    }
}

public function showcart()
{
    $user = auth()->user();

    $cart = Cart::where('phone', $user->phone)->get();

    $count = $cart->count();

   
    $totalPrice = $cart->sum(function ($item) {
        return floatval($item->price) * intval($item->quantity);
    });

    return view('user.showcart', compact('count', 'cart', 'totalPrice'));
}


public function deletecart($id)
{
    $data = cart::find($id);

    $data->delete();

    return redirect()->back()->with('message', 'Product Deleted Successfully');
 }
 public function confirmorder(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to place an order.');
    }

    $user = auth()->user();

    foreach ($request->productname as $key => $productname) {
        $price = floatval(str_replace(',', '', $request->price[$key])); 
        $quantity = intval($request->quantity[$key]); 
        $totalPrice = $price * $quantity; 
        Order::create([
            'product_name' => $productname,
            'price' => $totalPrice,
            'quantity' => $quantity,
            'name' => $user->name,
            'phone' => $user->phone,
            'address' => $user->address,
            'status' => 'Pending',
        ]);
    }

    Cart::where('phone', $user->phone)->delete();
     return redirect()->back()->with('message', 'ສັ່ງຊື້ສຳເລັດເເລ້ວ!');
}
}