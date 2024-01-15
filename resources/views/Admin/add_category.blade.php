@extends('Admin.master')

@section('content')


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Optional: Add your custom styles here -->
  <style>
    /* Add your custom styles here */
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
          <h5 class="card-title text-center mb-4">Add Category</h5>
          
          @if (session('error'))
          <div style="color: red">{{ session('error')}}</div>
              
          @endif
          @if (session('success'))
          <div style="color: green">{{ session('success')}}</div>
              
          @endif
         
          <form action="/store_categories" method="post" enctype="multipart/form-data">
            @csrf 

           
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" class="form-control" id="category_name" name="category_name" onkeyup="return nameval()">
              <div>
                   <span id="name-error" style="color: red"></span>
              </div>
            </div>

            
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" onkeyup="return descriptionval()"></textarea>
              <div>
                <span id="description-error" style="color: red"></span>
           </div>
            </div>

            <div class="form-group">
                <label for="description">Image</label>
                <input type="file" class="form-control" id="image" name="image" onkeyup="return imageval()">
                <div>
                  <span id="image-error" style="color: red"></span>
             </div>
              </div>

            
            <button type="submit" onclick="return mainvalidation();" class="btn btn-primary btn-block">Add Category</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function mainvalidation(){
    var name = document.getElementById('category_name').value;
    var description = document.getElementById('description').value;
    var image = document.getElementById('image').value;

    if(name == "" || name == null){
      document.getElementById('name-error').innerHTML = 'This field is required';
      return false;
    }
    else if(description == "" || description == null){
      document.getElementById('description-error').innerHTML = 'This field is required';
      return false;
    }
    else if(image == "" || image == null){
      document.getElementById('image-error').innerHTML = 'This field is required';
      return false;
    }else{
      return true;
    }
  }

  function nameval(){
    var category_name = document.getElementById('category_name').value;
    if(category_name == "" || category_name == null){
      document.getElementById('name-error').innerHTML = 'This field is required';
      return false;
    }
   else{
    document.getElementById('name-error').innerHTML = '';
    }
  }
  function descriptionval(){
   
    var description = document.getElementById('description').value;
    

    if(description == "" || description == null){
      document.getElementById('description-error').innerHTML = 'This field is required';
      return false;
    }
    else{
      document.getElementById('description-error').innerHTML = '';
    }
  }
  function imageval(){
   
    var image = document.getElementById('image').value;

   if(image == "" || image == null){
      document.getElementById('image-error').innerHTML = 'This field is required';
      return false;
    }else{
      document.getElementById('image-error').innerHTML = '';
    }
  }
</script>





@endsection