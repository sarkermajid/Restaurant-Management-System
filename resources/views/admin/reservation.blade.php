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
        <div>
          <div class="col-md-2"></div>
            <div class="col-md-6">
              <h2 class="text-white text-center mt-2">Reservation</h2>
                <div class="mb-5">
                    <table class="table table-stripe">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Guest</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th class="text-center">Action</th>
                      </tr>
        
                      @foreach ($view_reservation as $item)
                      <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->guest }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->time }}</td>
                        <td>{{ $item->message }}</td>
                        <td>
                          <a href="{{ url('/delete_reservation/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
        
                    </table>
                  </div>
            </div>
        </div>

    </div>
    @include('admin.jslink');
  </body>
</html>