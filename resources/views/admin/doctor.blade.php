
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
      <!-- partial -->
       
     @include('admin.navbar')
      <!-- page-body-wrapper ends -->
      <div class="container-fluid page-body-wrapper">  
              <div align="center" style="padding-top:100px">
                       <table>
                          <tr style="background-color:black;">
                          <th style="padding:12px;">Doctor Name</th>
                          <th style="padding:12px;">Phone</th>
                          <th style="padding:12px;">Speciality</th>
                          <th style="padding:12px;">Room</th>
                          <th style="padding:12px;">Image</th>
                          <th style="padding:12px;">Delete</th>
                          <th style="padding:12px;">Update</th>
                          </tr>
                             @foreach($data as $doctor)
                          <tr>
                          <td>{{$doctor->name}}</td>
                          <td>{{$doctor->phone}}</td>
                          <td>{{$doctor->speciality}}</td>
                          <td>{{$doctor->room}}</td>
                          <td><img height="100" width="100" src="doctorimage/{{$doctor->image}}"></td>
                          <td><a onclick="return confirm('are you sure to delete?')" class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
                          <td><a class="btn btn-success" href="{{url('update_doctor',$doctor->id)}}">Update</a></td>
                          </tr>
                          @endforeach
                          </table>
              </div>
      </div>
                
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
