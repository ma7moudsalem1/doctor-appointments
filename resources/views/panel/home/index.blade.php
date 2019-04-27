@extends('panel.layouts.master')

@section('content')
<div class="row">
<div class="col-md-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Doctors</span>
              <span class="info-box-number">{{ $countDoctors }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Appointment</span>
              <span class="info-box-number">{{ $countAppointments }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Today's appointments</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>More Information</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($todayAppoiments as $appointment)
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
                        {{ str_limit($appointment->info, 50) }}
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
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{ route('date-register.index') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Appointments</a>
            </div>
            <!-- /.box-footer -->
          </div>
    </div>
</div>
@endsection


@section('js')

    <!-- page script -->
<script>

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