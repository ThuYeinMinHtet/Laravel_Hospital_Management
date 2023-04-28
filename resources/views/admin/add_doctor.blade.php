
<!DOCTYPE html>
<html lang="en">
  <head>
  <style type="text/css">
          label{
              display: inline-block;
              width: 200px;
          }
  
  </style>
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

            <div class="container" align="center" style="padding-top:100px">
                        @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                     x
            </button>
                  {{session()->get('message')}}
            </div>
      
      @endif
                  <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
                  @csrf
                         <div>
                            <label>Doctor Name</label>
                            <input type="text" style="color:blue" name="name" placeholder="Write the name" required>
                         </div>
                                                  <div style="padding:15px">
                            <label>Phone number</label>
                            <input type="number" style="color:blue" name="phone" placeholder="Write the phone number" required>
                         </div>
                                                  <div style="padding:15px">
                            <label>Speciality</label>
                           <select style="color:blue;width:200px;" name="speciality">
                                   <option>--Select--</option>
                                   <option value="skin">Skin</option>
                                   <option value="heart">Heart</option>
                                   <option value="eye">Eye</option>
                                   <option value="bone">Bone</option>
                           </select>
                         </div>
                                                  <div style="padding:15px">
                            <label>Room No</label>
                            <input type="text" style="color:blue" name="room" placeholder="Write the Room Number">
                         </div>
                                                  <div style="padding:15px">
                            <label>Doctor Image</label>
                            <input type="file" name="file">
                         </div>
                         
                         <div style="padding:15px">
                            
                            <input type="submit" class="btn btn-success">
                         </div>
                  
                  </form>
            </div>
      </div>
                
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
