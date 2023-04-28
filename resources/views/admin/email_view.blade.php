
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
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
                  <form action="{{url('sendmail',$data->id)}}" method="post">
                  @csrf
                         <div>
                            <label>Greeting</label>
                            <input type="text" style="color:blue" name="greeting" required>
                         </div>
                                                  <div style="padding:15px">
                            <label>Body</label>
                            <input type="text" style="color:blue" name="body" required>
                         </div>
                                         
                                                  <div style="padding:15px">
                            <label>Action Text</label>
                            <input type="text" style="color:blue" name="atext" required>
                         </div>
                         
                          <div style="padding:15px">
                            <label>Action Url</label>
                            <input type="text" style="color:blue" name="aurl" required>
                         </div>
                         
                         <div style="padding:15px">
                            <label>End Part</label>
                            <input type="text" style="color:blue" name="endpart" required>
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
