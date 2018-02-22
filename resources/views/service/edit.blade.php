@extends('layouts.mast1')
@section('content')
        <!-- Page Content -->
        <div id="">

            <div class="row">
			<div class="col-md-12">
				<div class="white-box">

                                         <section class="content-header">
      <h3>
       Servicing Edit
        <small>Management</small>
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update Content</a></li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
    <div class="box container box-success"  style="border-top-color: #efefef"><br>

        <a href="../../service" class="btn btn-success btn-xs">Back to Servicing</a><br><br>
            {!! Form::model($editid, ['method' => 'PATCH','route' => ['service.update', $editid->id]]) !!}


                 <div class="form-group">
                <label for="title">Servicing Name</label>
                <input class="form-control input-sm" name="name" type="text" value="{{$editid->name}}" id="title" required>
                </div>

              <div class="form-group">
                <label for="title">Bike Model</label>
                <input class="form-control input-sm" name="model" type="text" value="{{$editid->bike_model}}" id="title" required>
                </div>
        <div class="form-group">
                <label for="title">Servicing Type</label>
                <input class="form-control input-sm" name="type" type="text" value="{{$editid->type}}" id="title" required>
                </div>
                <div class="form-group">
                <label for="title">Time(in Days)</label>
                <input class="form-control input-sm" name="timeinterval" type="number"  value="{{$editid->timeinterval}}" required>
                </div>

                <div class="form-group">
                <label for="title"> Servicing Cost</label>
                <input class="form-control input-sm" name="cost" type="number" value="{{$editid->cost}}" id="title" required>
                </div>
                 <div class="form-group">
                <label for="title"> Message</label> <br/>
                    <textarea name="message" class=" form-contol input-sm" style="width:400px;">{{ $editid->message }}
                </textarea>
                </div>




           <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <input type="hidden" name="editid" value="{{$editid->id}}"/>
            <button class="btn btn-danger btn-xs" type="reset" value="Reset">Clear </button>
            <input class="btn btn-primary btn-xs" type="submit" value="Submit" name="addcontent"> <br><br>
       {!! Form::close() !!}

    </div>
</section><!-- /.content -->





					</div>
				</div>
			</div>



</div>
@endsection
