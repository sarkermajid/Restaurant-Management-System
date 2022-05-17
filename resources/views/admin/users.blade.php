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
        <div class="col-md-8 text-center ">
            <h1 class="display-2">All USERS</h1>
            <hr class="bg-info">
            <hr class="bg-info">
            <table class="table table-stripe">
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
                @foreach ($all_user as $all_users)
                <tr>
                    <td>{{ $all_users->name }}</td>
                    <td>{{ $all_users->email }}</td>
                    @if ($all_users->usertype == '0')
                    <td><a class="btn btn-danger" href="{{ url('/user_delete/'.$all_users->id) }}">Delete</a></td>
                    @else
                    <td><p class="text-white">Not Allow</p></td>         
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>


        @include('admin.jslink')
  </body>
</html>