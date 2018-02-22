@extends('layouts.mast')
@section('content')
        <!-- Page Content -->
        <div id="">
        <div class="row">
			<div class="col-md-12">
			<div class="white-box">
				<section class="content-header">
      <h1>
       Staff
        <small>Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff</a></li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
    <div class="box container box-success"  style="border-top-color: #efefef"><br>
        <div class="col-md-8">


        <a href="addstaff" class="btn btn-success btn-xs">Add New Staff</a><br><br>
          <div class="box-body">
              <table id="example1" class="display compact table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Post</th>

                  <th>Ledger</th>
                  <th>Start Date</th>
                  <th>Attendence</th>
                  <th>Ledger</th>

                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                        @foreach($data as $d)
                    <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->spost}}</td>

                   <td> <a  href="{{route('staffledger.edit',$d->id)}}"><button class="btn btn-primary btn-xs">View</button></a></td>
                    <td>{{$d->phone}}</td>
                    <td>{{$d->sdate}}</td>
                    <td>
                        <?php
                        $cn=0;
                        foreach($data1 as $d1){
                          if($d->id==$d1->staff_id){



                        $cn++;
                          }
                        }
                        echo $cn;
                        ?>
                        </td>
                    <td>
                      <div class="col-md-4">
                        <a  href="{{ route('staff.edit',$d->id) }}">
                          <button class="btn btn-info btn-xs"> Edit </button></a>
                      
                    </div>
                    <div class="col-md-4">
                        <a>
                            {!! Form::open(['method'=>'DELETE', 'route'=>['staff.destroy',$d->id],'style'=>'display:inline-block']) !!}
                            {!! Form::submit('DELETE',['class'=>'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                            </a> 
                          </div></tr>
                    @endforeach



                  </tbody>
              </table>
        </div>
              </div>
       <div class="col-md-4" style="overflow-y:scroll; height: 440px;" >
                  <div class="title" >
                   <pre style="background:#09649a !important; color:white">   Attendance </pre>
                   </div>
                  <div class="white-box" >

                    <form class="form" action="{{route('attendence.add')}}" method="post">
                        <div class="form-group">
                                <h2>Today's Attendence</h2>
                            <label>Select Staff</label>
<!--                    <input type="text" name="scode" placeholder="Enter Staff Code"/>-->
                            <select name="scode" required>
                                <option>Select</option>
                                @foreach($sids as $sid)
                            <option value="{{ $sid->id }}" >{{ $sid->name }}</option>
                                @endforeach
                            </select>


                        </div>
                        <input type="hidden" name="userid" value="{{Auth::user()->id}}"/>
      <input type="hidden" name="_token" value="{{csrf_token()}}"/>

       <input class="btn btn-danger btn-xs" type="reset" value="Clear">
       <input class="btn btn-primary btn-xs" type="submit" value="Submit" name="addcontent"> <br><br>
                       </form>
                       <table class="display compact table-bordered table-striped" cellspacing="0" width="100%">
                       <thead >
                       <th style="text-align:left; color:black;">SN</th>
                       <th style="text-align:left; color:black;">Name</th>
                       <th style="text-align:left; color:black">Status</th>
                       </thead>
                       <tbody>
                       <div style="display:none;"> {{$i=1}}</div>
                       @foreach($att as $at )

                       <tr>
                       <td>{{ $i++ }}</td>
                       <td>

                       <div style="display:none;">{{$id1=$at->staff_id}}
                           @foreach($sids as $sid )
                          {{ $id2=$sid->id}}

                        </div>
                       @if($id1==$id2){{$sid->name}}
                        @endif
                       <div style="display:none">  @endforeach</div>

                        </td>

                       <td>

                       <p>Present</p>


                        </td>
                       </tr>

                       @endforeach

                       </tbody>

                       </table>

              </div>
            </div>

    </div>
</section><!-- /.content -->





					</div>
				</div>
			</div>





</div>
@endsection
