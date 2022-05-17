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
        <div class="col-md-6 ">
            <br><br>
            <h3 class="display-3 text-center">Add Food</h3>
            <hr class="text-info">
            <form action="{{ url('/upload_food') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label>Food Title</label>
              <input type="text" name="title" class="form-control text-white" id="">
            </div>
            <div class="mb-3">
                <label>Food Price</label>
                <input type="number" name="price" class="form-control text-white" id="">
            </div>
            <div class="mb-3">
                <label>Food Image</label>
                <input type="file" name="image" class="form-control text-white" id="">
              </div>
            <div class="mb-3">
                <label>Food Description</label>
                <input type="text" name="description" class="form-control text-white" id="">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
          <br>
          <h3 class="display-3 text-center">Food List</h3>
          <hr class="text-info">
          <div class="mb-5">
            <table class="table table-stripe">
              <tr>
                <th>Food Title</th>
                <th>Food Price</th>
                <th>Food Description</th>
                <th>Food Image</th>
                <th class="text-center">Action</th>
              </tr>

              @foreach ($all_food as $item)
              <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
                <td><img src="/foodimage/{{ $item->image }}" alt=""></td>
                <td>
                  <a href="{{ url('/food_edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ url('/food_delete/'.$item->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach

            </table>
          </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    @include('admin.jslink')
  </body>
  </html>