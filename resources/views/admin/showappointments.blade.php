
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
            <div align="center" style="padding:100px;">
                  <table>
                          <tr style="background-color:black;">
                          <th style="padding:12px;">Customer Name</th>
                          <th style="padding:12px;">Email</th>
                          <th style="padding:12px;">Phone</th>
                          <th style="padding:12px;">Doctor Name</th>
                          <th style="padding:12px;">Date</th>
                          <th style="padding:12px;">Message</th>
                          <th style="padding:12px;">Status</th>
                          <th style="padding:12px;">Approve</th>
                          <th style="padding:12px;">Cancel</th>
                          <th style="padding:12px;">Send Mail</th>
                          </tr>
                              @foreach($data as $appoint)
                          <tr align="center" style="background-color:white; color:darkblue; margin-top:10px;" >
                          <td>{{$appoint->name}}</td>
                          <td>{{$appoint->email}}</td>
                          <td>{{$appoint->phone}}</td>
                          <td>{{$appoint->doctor}}</td>
                          <td>{{$appoint->date}}</td>
                          <td>{{$appoint->message}}</td>
                          <td>{{$appoint->status}}</td>
                          <td>
                          <a class="btn btn-success" href="{{url('approve',$appoint->id)}}">Approve</a>
                          </td>
                          <td>
                          <a class="btn btn-danger" href="{{url('cancel',$appoint->id)}}">Cancel</a>
                          </td>
                          <td>
                          <a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Mail</a>
                          </td>
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
