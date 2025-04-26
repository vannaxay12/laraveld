

<!DOCTYPE html>
<html lang="en">
  <head>
  
  @include('admin.css')

  <style>
    .title{
        color: white; 
        padding-top: 25px;
         font-size:25px;
         text-shadow: @livewireScriptConfig('text-shadow');
         font-weight: bold;
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

   <h1 class="title">Add product</h1>


   @if(@session()->has('message'))

   <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert">x</button>
     {{(session()->get('message'))}}
   </div>
       
   {{-- @endsession --}}
   
   @endif
   <form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">

    @csrf
   
<div style="padding: 15px">
    <label for="">Product title</label>
    <input style="color: black;" type="text" name="title" placeholder="Give a product title" required>
</div>

<div style="padding: 15px">
    <label for="price">Price</label>
    <input id="price" style="color: black;" type="text" name="price" placeholder="Enter price" required oninput="formatCurrency(this)">
</div>

<div style="padding: 15px">
    <label for="">Description</label>
    <input style="color: black;" type="text" name="des" placeholder="Give a description" required>
</div>

<div style="padding: 15px">
    <label for="">Quantity</label>
    <input style="color: black;" type="text" name="quantity" placeholder="Product Quantity" required>
</div>

<div style="padding: 15px">
    <input type="file" name="file" id="fileInput" required>
    <p id="fileWarning" style="color: red; display: none;">Please select a file.</p>
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
function validateForm(event) {
          var fileInput = document.getElementById('fileInput');
          var fileWarning = document.getElementById('fileWarning');

          if (fileInput.files.length === 0) {
            event.preventDefault(); // Prevent form submission
            fileWarning.style.display = 'block'; // Show warning message
          } else {
            fileWarning.style.display = 'none'; // Hide warning message if file is selected
          }
        }

            </script>

  </body>
</html>