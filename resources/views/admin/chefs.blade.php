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
    <div class="col-md-6">
            <br><br>
            <h3 class="display-3 text-center">Add Chefs</h3>
            <hr class="text-info">
            <form action="{{ url('/add_chefs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label>Chef Name</label>
              <input type="text" name="name" class="form-control text-white" id="">
            </div>
            <div class="mb-3">
                <label>Chef Speciality</label>
                <input type="text" name="speciality" class="form-control text-white" id="">
            </div>
            <div class="mb-3">
                <label>Chef Image</label>
                <input type="file" name="image" class="form-control text-white" id="">
              </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
    @include('admin.jslink')
  </body>
</html>