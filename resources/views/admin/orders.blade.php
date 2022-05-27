<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.csslink')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <h2 class="text-white text-center mt-2">Customer Orders</h2>
            <hr class="bg-info">
            <table class="table">
                <tr>
                    <th>Food Name</th>
                    <th>Food Price</th>
                    <th>Food Quantity</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Customer Address</th>
                    <th>Total Price</th>
                </tr>
                @foreach ($customer_orders as $item)
                <tr>
                    <td>{{ $item->foodname }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    @include('admin.jslink')
  </body>
</html>