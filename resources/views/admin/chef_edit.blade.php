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
    <div class="col-md-6">
        <br><br>
        <h3 class="display-3 text-center">Edit Chef</h3>
        <hr class="text-info">
        <form action="{{ url('/chef_update/'.$chef_edit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label>Chef Name</label>
          <input type="text" name="name" value="{{ $chef_edit->name }}" class="form-control text-white" id="">
        </div>
        <div class="mb-3">
            <label>Chef Speciality</label>
            <input type="text" name="speciality" value="{{ $chef_edit->speciality }}" class="form-control text-white" id="">
        </div>
        <div class="mb-3">
            <label>Chef Image</label>
            <input type="file" name="image" class="form-control text-white" id="">
            <td><img src="/chefsimage/{{ $chef_edit->image }}" alt="" width="200" height="150"></td>
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    </div>
    @include('admin.jslink')
  </body>
</html>