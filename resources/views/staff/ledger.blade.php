@extends('layouts.mast1')
@section('content')
        <!-- Page Content -->
        <div id="">
        
              
            <div class="row">
			<div class="col-md-12">
				<div class="white-box">
								
                                         <section class="content-header">
      <h1>
       Ledger History
        <small>Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer</a></li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">
    <div class="box container box-success"><br>
     
        <a href="../../staff" class="btn btn-success">Back to Staff</a><br><br>
        <a  href="#bikemodal" data-toggle="modal" data-target="#ledgermodal"  ><button class="btn btn-info">Add Ledger</button> </a>
        <div class="modal fade" id="ledgermodal" role="dialog">

                <div class="modal-dialog">
<!--                    modal content-->
                    <div class="modal-content">


                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Ledger</h4>
                    </div>
                    <div class="modal-body">

                        <form id="" method="POST" action="{{action('StaffledgerController@saveledger')}}" enctype="multipart/form-data">

                        <fieldset>
                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-first-order">&nbsp;Purpose</i></span>
                                        <input type="text"  placeholder="Enter Purpose" name="purpose" class="form-control" required />

                                      </div>
                                    <br/>

                                   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt">&nbsp;Credit</i></span>
                <input type="text" class="form-control" placeholder="Enter Credit Rs." name="credit" required >
              </div><br/>
                                     <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list">&nbsp;Debit</i></span>
                <input type="text" class="form-control" placeholder="Enter Debit Rs." name="debit" required ><br/>
              </div><br/>

                                   
                                     <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="addcategory">Submit</button>
              </div>
            <input type="hidden" name="userid" value="{{Auth::user()->id}}"/>
            <input type="hidden" name="staffid" value="{{$sid}}"/>
           <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                </fieldset>


                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

          <div class="box-body">
              <p>
                  Name:&nbsp;{{$d->name}}<br/>
                  Address:&nbsp;{{$d->address}}<br/>
                  Phone:&nbsp;{{$d->phone}}<br/>
                  Post:&nbsp;{{$d->spost}}<br/>
              
              </p>
             
          <h2 style="text-align:center;color:green;">*** Ledger history ***</h2>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Ledger No</th>
                 
                  <th>Credit (Lageko)</th>
                  <th>purpose</th>
                  <th>Debit (Baki)</th>
                  <th>Date</th>
                 
                  
                 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $amount=0;
                    ?>
                    @foreach($staffledgerid as $dd)
                    <tr>
                    
                 
                    <td>{{$dd->id}}</td>
                    <td>{{$dd->credit}}</td>
                    <td>{{$dd->purpose}}</td>
                    <td>{{$dd->debit}}</td>
                    <td>{{$dd->created_at}}</td>
                   
                   
                    <td>check</td>
                   
                  
                 
                    <?php  
                        $amount=($amount+$dd->debit)-$dd->credit;
                        ?>
                    </tr>
                   @endforeach
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4">Total</td>
                        <td colspan="2" class="total"><?php 
                            echo "Nrs. ";
                            if($amount >0 ){
                            echo abs($amount); 
                                echo " Debit";
                            }
                            else
                            {
                            echo abs($amount); 
                                echo " Credit";
                            }
                            
                            
                            ?></td>
                      </tr>
                  </tfoot>
              </table>
              
        </div>
    
    </div>
</section><!-- /.content -->
								
								
                                        
							
					
					</div>
				</div>
			</div>
								
		

           
</div>
@endsection
