

<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

  @include('admin.css')

  <style>
    .title{
        color: white; 
        padding-top: 25px;
         font-size:25px;
    }
    label{
        display: inline-block;
        width: 200px;

    }
  </style>


  </head>
  <body>
   

      <!-- partial -->
      @include('admin.sidebar')

  @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center">

   <h1 class="title">Update product</h1>


   @if(@session()->has('message'))

   <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert">x</button>
     {{(session()->get('message'))}}
   </div>
       
   {{-- @endsession --}}
   
   @endif
   <form action="{{ url('updateproduct',$data->id) }}" method="post" enctype="multipart/form-data">

    @csrf
   
<div style="padding: 15px">
    <label for="">Product title</label>
    <input style="color: black;" type="text" name="title" value="{{$data->title}}" placeholder="Give a product title" required>
</div>

<div style="padding: 15px">
    <label for="price">Price</label>
    <input id="price" style="color: black;" type="text" value="{{$data->price}}" name="price" placeholder="Enter price" required oninput="formatCurrency(this)">
</div>

<div style="padding: 15px">
    <label for="">Description</label>
    <input style="color: black;" type="text" value="{{$data->description}}" name="des" placeholder="Give a description" required>
</div>

<div style="padding: 15px">
    <label for="">Quantity</label>
    <input style="color: black;" type="text" value="{{$data->quantity}}" name="quantity" placeholder="Product Quantity" required>
</div>

<div style="padding: 15px">
    <label for="">Old Image</label>
    <img height="300" width="100" src="/productimage/{{$data->image}}" alt="">
</div>

<div style="padding: 15px">
    <label for="">Change the Image</label>
    <input type="file" name="file">
</div>

<div style="padding: 15px">
    <input class="btn btn-success" type="submit" >
</div>

   </form>

         </div>

        </div>

          <!-- partial -->
       
          @include('admin.script')

          <script>
            function formatCurrency(input) {
     let value = input.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
     if (value) {
         input.value = parseInt(value, 10).toLocaleString('en-US') + ' LAK';
     }
 }
             </script>

  </body>
</html>