@extends('panel.layouts.master')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('panel/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Client Date Register</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="page-data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                <tr>
                  <td>{{$appointment->id}}</td>
                  <td>{{$appointment->name}}</td>
                  <td>{{$appointment->email}}</td>
                  <td>
                      <label for="register_at" class="label label-{{$appointment->doctor_approve ? 'success' : 'danger'}}">
                            {{$appointment->register_at}}
                      </label>
                 </td>
                  <td>
                      <a href="#" data-id="{{$appointment->id}}" class="btn btn-danger delete-appointment">
                          <i class="fa fa-trash"></i>
                      </a>
                      <a href="{{ route('date-register.show', $appointment->id) }}" class="btn btn-primary">
                          <i class="fa fa-eye"></i>
                      </a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
</div>
@endsection

@section('js')
  <!-- DataTables -->
    <script src="{{ asset('panel/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('panel/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- page script -->
<script>
  $(function () {
    $('#page-data').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

  $('.delete-appointment').on('click', function(e){
    e.preventDefault();
    if(confirm("Are You sure ??")){
      var id = $(this).attr('data-id');
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax(
      {
          url: "{{url('doctor/date-register')}}/" + id,
          type: 'delete', 
          dataType: "JSON",
          data: {
              "id": id 
          },
          success: function (response)
          {
              alert(response);
              location.reload();
          },
          error: function(xhr) {
          console.log(xhr.responseText)
        }
      });
    }
  })
</script>
@endsection
