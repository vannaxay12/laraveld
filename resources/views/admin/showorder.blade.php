<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <!-- Add some custom CSS for better table styling -->
    <style>
        .table-container {
            max-height: 500px;
            overflow-y: auto;
            width: 90%;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        .order-table th {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            border: 1px solid #ddd;
            text-transform: uppercase;
            font-size: 14px;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .order-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
            color: #333;
        }

        .order-table tbody tr {
            background-color: #ffffff;
            transition: background-color 0.3s;
        }

        .order-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .order-table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            .table-container {
                width: 100%;
            }
            
            .order-table th,
            .order-table td {
                padding: 8px;
                font-size: 12px;
            }
        }
    </style>
  </head>
  <body>
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <br>
            <h1 style="font-size: 30px; color: #fefeff; margin-bottom: 20px;">ບິນສັ່ງ Order</h1>
            
            <!-- Improved Table Wrapper -->
            <div class="table-container">
                <table class="order-table">
                    <!-- Table Header -->
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($order as $orders)
                        <tr>
                            <td>{{ $orders->name }}</td>
                            <td>{{ $orders->phone }}</td>
                            <td>{{ $orders->address }}</td>
                            <td>{{ $orders->product_name }}</td>
                            <td>{{ $orders->price }} ₭</td>
                            <td>{{ $orders->quantity }}</td>
                            <td>{{ $orders->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.script')
  </body>
</html>