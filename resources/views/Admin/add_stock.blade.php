@extends('Admin.master')

@section('content')




  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <style>
  
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>


<div class="container mt-5">
  <div class="row justify-content-left">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">Add Stock</h5>
          
          @if (session('error'))
          <div style="color: red">{{ session('error')}}</div>
              
          @endif
          @if (session('success'))
          <div style="color: green">{{ session('success')}}</div>
              
          @endif
         
          <form action="/store_stock" method="post" >
            @csrf 

           
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <select class="form-control" id="category_name" name="category_name" >
                <option selected disabled value=" ">-- select category--</option>
                @if(isset($categories))
                
                @foreach ($categories as $cat)
                
                <option value="{{$cat->categoryId}}">{{$cat->categoryName}}</option>
                    
                @endforeach
                @endif
               
              </select>
              <div>
                <span id="name-error" style="color: red"></span>
           </div>
            </div>

            
            <div class="form-group">
              <label for="description">Stock</label>
              <input type="number" class="form-control" id="stockname" name="stockname" >
              <div>
                <span id="stockname-error" style="color: red"></span>
           </div>
            </div>

            <div class="form-group">
                <label for="description">Price</label>
                <input type="number" class="form-control" id="price" name="price" >
                <div>
                  <span id="price-error" style="color: red"></span>
             </div>
              </div>

            
            <button type="submit" class="btn btn-primary btn-block" onclick="return mainvalidation()">Add Category</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
  function mainvalidation(){
    var name = document.getElementById('category_name').value;
    var stockname = document.getElementById('stockname').value;
    var price = document.getElementById('price').value;

    if(name == " " || name == null){
      document.getElementById('name-error').innerHTML = 'This field is required';
      return false;
    }
    else if(stockname == "" || stockname == null){
      document.getElementById('stockname-error').innerHTML = 'This field is required';
      return false;
    }
    else if(price == "" || price == null){
      document.getElementById('price-error').innerHTML = 'This field is required';
      return false;
    }else{
      return true;
    }
  }
  </script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>





@endsection