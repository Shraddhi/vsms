@extends('layouts.mast1')
@section('content')
        <!-- Page Content -->
        <div id="">

            <div class="row">
			<div class="col-md-12">
				<div class="white-box">

                                         <section class="content-header">
      <h1>
       Ledger Edit
        <small>Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update Content</a></li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
    <div class="box container box-success"><br>

        <a href="../../ledger" class="btn btn-success">Back to Ledger</a><br><br>
            {!! Form::model($editid, ['method' => 'PATCH','route' => ['ledgers.update', $editid->id]]) !!}
            
                                <fieldset>
                                    <div class="input-group">
               
                                        <span class="input-group-addon"><i class="fa fa-first-order">&nbsp;Customer Name</i></span>
                                        {{$cusid->cusname}}
                                       
                                      </div>
                                    <br/>
                                  
                                   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt">&nbsp;Credit</i></span>
                <input type="text" class="form-control" placeholder="Credit Nrs." name="credit" value="{{$editid->credit}}" >
              </div><br/>
                                     <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list">&nbsp;Purpose</i></span>
                <input type="text" class="form-control" placeholder="Purpose" name="purpose" value="{{$editid->purpose}}"  ><br/>
              </div><br/>

                                    <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money">&nbsp;Debit</i></span>
                <input type="text" class="form-control" placeholder="Debit Nrs." name="debit"  value="{{$editid->debit}}"><br/>
              </div><br/>
           

                     <br/>   
                                     
                            


           <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <input type="hidden" name="editid" value="{{$editid->id}}"/>
            <input class="btn btn-danger" type="reset" value="Clear">
            <input class="btn btn-primary" type="submit" value="Submit" name="addcontent"> <br><br>
                                     </fieldset>
       {!! Form::close() !!}

    </div>
</section><!-- /.content -->





					</div>
				</div>
			</div>



</div>
@endsection
