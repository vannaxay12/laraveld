<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- Include CSS styles for admin panel -->
  @include('admin.css')
  </head>
  <body>
    <!-- Include sidebar component for admin panel -->
    @include('admin.sidebar')

    <!-- Include navbar component for admin panel -->
    @include('admin.navbar')

    <!-- Main content area -->
    <div style="padding-bottom: 30px" class="container-fluid page-body-wrapper">
        <!-- Display success message if exists in session -->
       

        <!-- Product display table -->
        <!-- Product display table -->
<div class="container" align="center">
    @if(@session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{(session()->get('message'))}}
    </div>
@endif
    <br>
    <h1 style="font-size: 20px;">ສີນຄ້າທັງໝົດ</h1>
    <br>
    
    <!-- Scrollable Table Container -->
    <div style="max-height: 500px; overflow-y: auto; border: 2px solid white; width: 90%;">
        <table style="width: 100%; border-collapse: collapse;">
            <!-- Table header -->
            <thead style="background-color: grey; position: sticky; top: 0; z-index: 1;">
                <tr>
                    <th style="padding: 20px; border: 2px solid white;">Title</th>
                    <th style="padding: 20px; border: 2px solid white;">Description</th>
                    <th style="padding: 20px; border: 2px solid white;">Quantity</th>
                    <th style="padding: 40px; border: 2px solid white;">Price</th>
                    <th style="padding: 20px; border: 2px solid white;">Image</th>
                    <th style="padding: 20px; border: 2px solid white;">Update</th>
                    <th style="padding: 20px; border: 2px solid white;">Delete</th>
                </tr>
            </thead>

            <!-- Table body -->
            <tbody>
                @foreach ($data as $product)
                    <tr align="center" style="background-color: black;">
                        <td style="border: 2px solid white;">{{$product->title}}</td>
                        <td style="border: 2px solid white;">{{ $product->description }}</td>
                        <td style="border: 2px solid white;">{{$product->quantity}}</td>
                        <td style="border: 2px solid white;">{{$product->price}}</td>
                        <td style="border: 2px solid white;">
                            <img src="/productimage/{{$product->image}}" width="100" height="100">
                        </td>
                        <td style="border: 2px solid white;">
                            <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a>
                        </td>
                        <td style="border: 2px solid white;">
                            <a class="btn btn-danger" href="{{url('deleteproduct',$product->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    <!-- Include JavaScript for admin panel -->
    @include('admin.script')
  </body>
</html>
