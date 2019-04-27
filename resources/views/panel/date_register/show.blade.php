@extends('panel.layouts.master')
@section('css')
    <link href="{{ asset('plugins/DateTimePicker.css') }}" rel="stylesheet">
    <style>
        #client-register{
            height: 364px;
            overflow: scroll;
        }
    </style>
@endsection
@section('content')
<div class="row">
      @if (session('flash_message'))
        <div class="alert alert-success" role="alert">
            {{ session('flash_message') }}
        </div>
      @endif
    <div class="col-md-6">
        <div class="box" id="client-register">
            <div class="box-header">
              <h3 class="box-title">Client Register In the same day</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appoint)
                        <tr>
                        <td>
                            <a href="{{ route('date-register.show', $appoint->id) }}">
                                {{$appoint->name}}
                            </a>
                        </td>
                        <td>{{$appoint->email}}</td>
                        <td>
                            <label for="register_at" class="label label-{{$appoint->doctor_approve ? 'success' : 'danger'}}">
                                    {{$appointment->register_at}}
                            </label>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
              </table>
            </div>
        </div>

    </div>
    <div class="col-md-6">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="{{ asset('panel/dist/img/user1-128x128.jpg')}}" alt="User Image">
                <span class="username"><a href="#">{{ $appointment->name }}</a></span>
                <span class="description">Requested Time - {{ $appointment->created_at }}</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p>{{ $appointment->info }}</p>

              <!-- Attachment -->
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="{{ asset('panel/dist/img/photo1.png')}}" alt="client Image">

                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="maito:{{ $appointment->email }}">{{ $appointment->email }}</a></h4>
                  <div class="attachment-text">
                    Choosen Date: {{ $appointment->register_date }},
                    <br>
                    Phone: {{ $appointment->phone }}
                  </div>
                  <!-- /.attachment-text -->
                </div>
                <!-- /.attachment-pushed -->
              </div>
              <!-- /.attachment-block -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="{{ route('date-register.update', $appointment->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                <input type="checkbox" name="noteByEmail"> Send an email to the user.
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                    <h6>Choose New data</h6>
                    <input type="datetime" name="register_at" value="{{old('register_at')}}"  require class="form-control{{ $errors->has('register_at') ? ' is-invalid' : '' }}" min="{{ date('Y-m-d') }}" require readonly>
                    <div id="dtBox"></div>
                    <br>
                    <button class="btn btn-success">
                        <i class="fa fa-share"></i>
                    </button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/DateTimePicker.js') }}" ></script>
    <!-- page script -->
    <script type="text/javascript">
		
        $(document).ready(function()
        {
            $("#dtBox").DateTimePicker();
        });
    
    </script>
@endsection
