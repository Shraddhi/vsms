@extends('layouts.mast')
@section('content')
        <!-- Page Content -->
        <div id="">


            <div class="row">
			<div class="col-md-12">
				<div class="white-box">

                                         <section class="content-header">
      <h1>
       Purchase Bike
        <small>Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Bike Servicings</a></li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
    <div class="box container box-success" style="border-top-color: #efefef"><br>

                <div class="" >

                    <button type="button" class="btn btn-success btn-xs" ><a href="addserv" style="color:#fff;">Add  Servicing</a></button>
                </div>
                <div>
        <h4>Import File Directly:</h4>
        <table width= 100%  style="border: 0px !important">
          <tr  >
            <td  style="border: 0px !important" >
          <a href="{{ asset('resources/service.ods') }}">See Demo</a>


        </td>
        <td  style="border: 0px !important" >

        <form style="border: 1px solid #a1a1a1;margin-top: 3px;padding: 10px;" action="{{ URL::to('importExcelService') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

          <input type="file" name="import_file" style="margin: 0;    display: inline-block;
        margin-top: -12px;
        padding: 0;
        height: 20px;" />
          {{ csrf_field() }}


          <button class="btn btn-primary" style="    display: inline-block;">Import CSV or Excel File</button>

        </form>
        </td>
        </tr>
        </table>
        </div>

          <div class="box-body">
            <table id="example1" class="display compact table-bordered table-striped" cellspacing="0" width="100%">

                <thead>
                <tr>
                  <th>Bike Model</th>
                  <th>Serving Name</th>
                  <th>Type</th>
                  <th>Time Interval</th>
                  <th>Message</th>

                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($s as $bb)
                    <tr>
                    <td>{{ $bb->bike_model }}</td>
                    <td>{{ $bb->name}}</td>
                    <td>{{$bb->type}}</td>
                    <td>{{$bb->timeinterval}}</td>
                    <td>{{$bb->message}}</td>
                    <td>
                        <a  href="{{route('service.edit',$bb->id)}}"><button class="btn btn-info btn-xs">Edit</button></a>
                        <a>
                            {!! Form::open(['method'=>'DELETE', 'route'=>['service.destroy',$bb->id],'style'=>'display:inline-block']) !!}
                            {!! Form::submit('DELETE',['class'=>'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                            </a>
                        </td>

                    </tr>
                    @endforeach
                  </tbody>
              </table>
        </div>

    </div>
</section><!-- /.content -->





					</div>
				</div>
			</div>





</div>
@endsection
