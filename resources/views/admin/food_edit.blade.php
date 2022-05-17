<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.csslink')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')
        <div class="col-md-1"></div>
        <div class="col-md-6 ">
            <br><br>
            <h3 class="display-3 text-center">Edit Food</h3>
            <hr class="text-info">
            <form action="{{ url('/food_update/'.$food_edit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label>Food Title</label>
              <input type="text" name="title" value="{{ $food_edit->title }}" class="form-control text-white" id="">
            </div>
            <div class="mb-3">
                <label>Food Price</label>
                <input type="number" name="price" value="{{ $food_edit->price }}" class="form-control text-white" id="">
            </div>
            <div class="mb-3">
                <label>Food Image</label>
                <input type="file" name="image" class="form-control text-white" id="">
                <td><img src="/foodimage/{{ $food_edit->image }}" width="200" height="150" alt=""></td>
              </div>
            <div class="mb-3">
                <label>Food Description</label>
                <input type="text" name="description" value="{{ $food_edit->description }}" class="form-control text-white" id="">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    @include('admin.jslink')
  </body>
  </html>