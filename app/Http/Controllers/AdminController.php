<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;


use App\Models\AdminloginModel;
use App\Models\ctaegoryModel;
use App\Models\stockModel;
use App\Models\cartModel;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;




class AdminController extends Controller
{
    private $currentDate;
    private $currentTime;
    private $currentDateTime;

    public function __construct()
    {

        date_default_timezone_set("Asia/Calcutta");   

        $currentDateTime = date('Y-m-d H:i:s');
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');

        $this->currentDate = $currentDate;
        $this->currentTime = $currentTime;
        $this->currentDateTime = $currentDateTime;


    }


    public function login(){
        return view('Admin.adminlogin');
    }

   

    public function adminlogin(Request $request){
        $username = request('username');
        $password = request('password');
        

        $check_login=AdminloginModel::select()->where('username',$username)
        ->where('password',$password)->where('userType',0)->first();
        $check_login_users=AdminloginModel::select()->where('username',$username)
        ->where('password',$password)->where('userType',1)->first();
       // print_r($check_login);die;

        if($check_login){
       
            $aId=$check_login->aId;
            $name=$check_login->adName;
            
        Session::put('aId',$aId); 
        Session::put('name',$name); 
            
            return redirect('/dashboard');

        }else if($check_login_users){
       
            $aId=$check_login_users->aId;
            $name=$check_login_users->adName;
            
        Session::put('aId',$aId); 
        Session::put('name',$name); 
            
            return redirect('/front-end');

        }else{
            
            return redirect('/')->with('error', 'Invalid username or password');
        }

        



    }


    public function dashboard(){


        return view('Admin.dashboard');
    }
        
    public function logout(Request $request){
        session::get('aId');
        $request->session()->flush();
        return redirect('/');
    }
   

    public function add_categoryform(Request $request){
        return view('Admin.add_category');
    }

    public function store_categories(Request $request){
        $catName=request('category_name');
        $description=request('description');
        $image = $request->file('image');

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('cat_images'), $imageName);

        if($image){
            $add_cat = new ctaegoryModel();
            $add_cat->categoryName =$catName;
            $add_cat->category_desc =$description;
            $add_cat->Image =$imageName;
            $add_cat->save();
            return redirect('/add_categoryform')->with('success','Record added successfully');
        }else{
            return redirect('/add_categoryform')->with('error', 'image is required');
        }

       
        
    }

    public function add_stock(){
        $categories = ctaegoryModel::select('category.categoryId', 'category.categoryName')
        ->leftJoin('stock_details', 'stock_details.categoryId', '=', 'category.categoryId')
        ->whereNull('stock_details.categoryId')
        ->get();
    
        return view('Admin.add_stock',compact('categories'));
    }

    
    public function store_stock(Request $request){

        $catId= request('category_name');
        $stockname= request('stockname');
        $price= request('price');

        $add_stock= new stockModel();
        $add_stock->categoryId =$catId;
        $add_stock->stock=$stockname;
        $add_stock->stock_price =$price;
        $add_stock->save(); 

        return redirect('/add_stock')->with('success','Record added successfully');
    }


    public function register(Request $request){
        $name=request('name');
        $regusername=request('reg-username');
        $regpassword=request('reg-password');

        $addusers= new AdminloginModel();
        $addusers->adName =$name;
        $addusers->username =$regusername;
        $addusers->password =$regpassword;
        $addusers->save();
        return redirect()->back()->with('success','Registered successfully');
    }



    public function front_end(Request $request){

        $getcategories=ctaegoryModel::select('category.categoryId','category.categoryName','category.category_desc','category.Image','stock_details.stock','stock_details.stock_price','stock_details.stockId')
        ->join('stock_details','stock_details.categoryId','=','category.categoryId')
        ->get();

        $aId=session('aId');
        $getCART=ctaegoryModel::select('category.categoryName','category.Image','stock_details.stock','stock_details.stock_price')
        ->join('stock_details','stock_details.categoryId','=','category.categoryId')
        ->join('cart_details','cart_details.stockId','=','stock_details.stockId')
        ->where('cart_details.aId','=',$aId)
        ->get();
       
       
       
        return view('fron-end.mainPage',compact('getcategories','getCART'));
    }


    public function add_cart(Request $request){
        $stockId= request('stockId');
        $aId = session('aId');

        $add_cart= new cartModel();
        $add_cart->stockId =$stockId;
        $add_cart->aId =$aId;
        $add_cart->save();

        return redirect()->back()->with('success','product added to the cart');

    }




}
