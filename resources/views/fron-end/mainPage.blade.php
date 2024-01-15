
    <style>
        /* Add your styling here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        #products {
            width: 60%;
            padding: 20px;
        }

        #user-details {
            width: 30%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product {
            border: 1px solid #680b0b;
            padding: 10px;
            margin: 10px;
            text-align: center;
            display: flex;
            background-color: rgb(228, 137, 236);
            width: 100%;
        }
        .cart {
            border: 1px solid #680b0b;
            padding: 10px;
            margin: 10px;
            text-align: center;
            display: flex;
            background-color: rgb(137, 229, 236);
            width: 80%;
        }

        .product img {
            margin-left: 40px;
        }

        .product-details {
            text-align: center;
            margin: auto;
        }

        #cart {
            border: 1px solid #790e0e;
            padding: 10px;
            margin-top: 20px;
        }

        #logout-btn {
            background-color: #d9534f;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>


    <div id="products">
        <h1>Products</h1>
        @if(isset($getcategories))
            @foreach ($getcategories as $pro )
                <div class="product">
                    <img src="/cat_images/{{$pro->Image}}" width="150" height="150" alt="{{$pro->categoryName}} Image">
                    <div class="product-details">
                        <h2>{{$pro->categoryName}}</h2>
                        <h4>{{$pro->category_desc}}</h4>
                        <h5>Price : ₹{{$pro->stock_price}}</h5>
                        <h5>Stock : {{$pro->stock}} left</h5>
                        <form action="/add_cart" method="get">
                            <input type="hidden" name="stockId" value="{{$pro->stockId}}">
                            <button type="submit" class="button" style="background-color: rgb(206, 240, 14); color : black">Add to Cart</button>
                        </form>
                        
                          
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div id="user-details">
        <h1>Shop Now</h1> <div style="text-align: right">
            <a href="/logout"><button id="logout-btn" >Logout</button></a>
        </div>
        <p>Welcome, <h2 style="color: red">{{session('name')}} </h2>

            @if (session('success'))
          <div style="color: green">{{ session('success')}}</div>
              
          @endif
       
           
            <br>
            
            <h2>Cart</h2>

            @if(isset($getCART ) && count($getCART) > 0)
            @foreach ($getCART as $crt )
                <div class="cart">
                    <img src="/cat_images/{{$crt->Image}}" width="150" height="150" alt="{{$crt->categoryName}} Image">
                    <div class="product-details">
                        <h2>{{$crt->categoryName}}</h2>
                        
                        <h5>Price : ₹{{$crt->stock_price}}</h5>
                        <h5>Stock : {{$crt->stock}} </h5>
                       
                        
                          
                    </div>
                </div>
            @endforeach
            @else
        <p style="color: rgba(138, 138, 3, 0.61)">Add items to your cart.</p>
   
        @endif
        
    </div>


