@extends('layouts.mast')
@section('content')

 <!--modal-->
            <div class="modal fade" id="ledg" role="dialog">

                <div class="modal-dialog">
<!--                    modal content-->
                    <div class="modal-content">


                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Ledger</h4>
                    </div>
                    <div class="modal-body">

                           <form id="" method="POST" action="{{route('ledger.add')}}" enctype="multipart/form-data">

                                                                      <fieldset>
                                                                          <div class="input-group">

                                                                              <span class="input-group-addon"><i class="fa fa-first-order">&nbsp;Customer Name</i></span>
                                                                              <select name="customer" class="form-control">
                                                                                  <option>Select</option>
                                                                                  @foreach($cuse as $cse)
                                                                                  <option value="{{$cse->id}}">{{$cse->cusname}}</option>
                                                                                  @endforeach
                                                                              </select>

                                                                            </div>
                                                                          <br/>

                                                                         <div class="input-group">
                                                      <span class="input-group-addon"><i class="fa fa-product-hunt">&nbsp;Credit</i></span>
                                                      <input type="text" class="form-control" placeholder="Credit Nrs." name="credit" value="0.0" >
                                                    </div><br/>
                                                                           <div class="input-group">
                                                      <span class="input-group-addon"><i class="fa fa-list">&nbsp;Purpose</i></span>
                                                      <input type="text" class="form-control" placeholder="Purpose" name="purpose"  ><br/>
                                                    </div><br/>

                                                                          <div class="input-group">
                                                      <span class="input-group-addon"><i class="fa fa-money">&nbsp;Debit</i></span>
                                                      <input type="text" class="form-control" placeholder="Debit Nrs." name="debit"  value="0.0"><br/>
                                                    </div><br/>


                                                           <br/>
                                                                           <div class="box-footer">
                                                      <button type="submit" class="btn btn-primary" name="addcategory">Submit</button>
                                                    </div>
                                                  <input type="hidden" name="userid" value="{{Auth::user()->id}}"/>
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

			<!--END OF MODEL-->


			<!--Parts Model-->
			<!--            modal-->
            <div class="modal fade" id="bikeParts" role="dialog">

                <div class="modal-dialog">
<!--                    modal content-->
                    <div class="modal-content">


                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add New Bike Parts</h4>
                    </div>
                    <div class="modal-body">

                        <form id="" method="POST" action="{{route('bikeparts.add')}}" enctype="multipart/form-data">

                                <fieldset>
                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-first-order">&nbsp;Bike Model Name</i></span>
                                        <input type="text" name="model_name" class="form-control" required />

                                      </div>
                                    <br/>
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th-list">&nbsp;Color</i></span>
                                     <select class="form-control select2" style="width: 100%;    height: 30px;" name="color" id="" required >


                                          <option>Select</option>
                                          <option value="black">Black</option>
                                          <option value="mattblack">Matt Black</option>
                                          <option value="red">Red</option>
                                          <option value="mattred">Matt Red</option>
                                          <option value="blue">Blue</option>
                                          <option value="gray">Gray</option>
                                          <option value="white">White</option>



                                        </select>
                                  </div>
                                    <br/>
                                   <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt">&nbsp;Parts Number</i></span>
                <input type="text" class="form-control" placeholder="Parts Number" name="partsno" required >
              </div><br/>
                                    <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt">&nbsp;Parts Name</i></span>
                <input type="text" class="form-control" placeholder="Parts Name" name="partsname" required >
              </div><br/>

                                    <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o">&nbsp;Quantity</i></span>
                 <input type="number" class="form-control" placeholder="Quantity" name="quantity" required ><br/>
              </div><br/>
                                    <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o">&nbsp;Purchase Price in NRS</i></span>
                 <input type="text" class="form-control" placeholder="Unit Price" name="purchaseprice" required ><br/>
              </div><br/>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o">&nbsp;Sale Price in NRS</i></span>
                 <input type="text" class="form-control" placeholder="Unit Price" name="unitprice" required ><br/>
              </div><br/>
                                      <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o">&nbsp;Date Taken</i></span>
                 <input type="date" class="form-control"  name="datetaken" required ><br/>
              </div><br/>
<!--
                <div class="input-group">
                                                  <span class="input-group-addon"><i class="fa fa-info-circle">&nbsp;Product Status</i></span>
                                                <select class="form-control" id="Bike_status" name="Bike_status">


                                                  <option value="Available">~Available~</option>
                                                  <option valu="Not Available">~Not Available~</option>

                                                </select>

                </div>
-->
                     <br/>
                                     <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="addcategory">Submit</button>
              </div>
            <input type="hidden" name="userid" value="{{Auth::user()->id}}"/>
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
       <!--End of Part's MODEL-->


			<!--Product Pricing Model-->
			<!--            modal-->
            <div class="modal fade" id="productPricing" role="dialog">

                <div class="modal-dialog">
<!--                    modal content-->
                    <div class="modal-content" style="    margin-left: -132px;
    width: 882px;">


                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Adjust Price of Items</h4>
                    </div>
                    <div class="modal-body">

							<a href="#"><i class="fa fa-plus">Add Row</i></a>
							<hr/>
                        <form id="" method="POST" action="{{route('bikeparts.add')}}" enctype="multipart/form-data">
                              <table style="width:100%;" border=1px;>
							  <tr><th style="width:100%;">Description of Goods</th>
							  <th>Old Price</th>
							  <th>Cost</th>
							  <th>New Price </th>

							  </tr>
							  <tr>

								<td style="width: 30px;"><select style="width:100%;"/></td>
								<td><input style="font-family: preeti" /></td>
								<td><input /></td>
								<td><input /></td>
							</tr>

                              </table>
							  <div class="adjustment" style="margin-top:10px;">
							  <label>Adjustment Type: </label>
							  <select>
									<option>Plus</option>
									<option>Minus</option>
							  </select>

							   <label>Amount: </label> <input/>
							  <div class="pull-right" style="margin-top: 30px;">

							  <button class="btn-warning">Adjust</button>
							  <button class="btn-danger">Cancel</button>
							  </div>
							  </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
       <!--End of Pricing's MODEL-->
   <div id="wrapper">
        <!-- Navigation -->

        <!-- Page Content -->
        <div class="navbar-static-top" id="wrapper" style="    top: 10%;
    overflow: hidden;
    position: fixed;
    z-index: 0;">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Inventory <small>ITEMS</small></h4> </div>
                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">

                        </div>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active"><a href="#">Purchase</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
</div>
                <!-- row -->
                <div id="page-wrapper">
                  <div class=" panel left-panel cf col-md-2" style="margin: 0px; left: 0%; top: 19%; position: fixed;">
                      <div class="pull-right col-md-12" style="padding: 0px; height: 440px;">
                      <div class="title" style="position:fixed; width: 16%; z-index:1;">
                       <pre style="background:#09649a !important; color:white">     OPERATIONS    </pre>
                       </div>
                      <div class="white-box" style="height:440px; padding: 15px 3px 3px 3px !important; z-index:0;">

                        <style>
                        /* Style the tab */
                        div.tab {
                            overflow: hidden;
                            border: 1px solid #ccc;
                            background-color: #f1f1f1;
                            margin-top: 9%;
                        }

                        /* Style the buttons inside the tab */
                        div.tab button {
                            background-color: inherit;
                            float: left;
                            border: none;
                            outline: none;
                            cursor: pointer;
                            padding: 14px 16px;
                            transition: 0.3s;
                            font-size: 14px;
                            padding: 5px;
                        }

                        /* Change background color of buttons on hover */
                        div.tab button:hover {
                            background-color: #ddd;
                        }

                        /* Create an active/current tablink class */
                        div.tab button.active {
                            background-color: #ccc;
                        }

                        /* Style the tab content */
                        .tabcontent {
                            display: none;
                            padding: 6px 12px;
                            border: 1px solid #ccc;
                            border-top: none;
                        }
						ul, li{
							list-style-type: none;
						}
						li:hover{
							cursor:pointer;
						}
                        </style>
						<div class="services" style="margin-top:16%">

						<ul id="treeview" style="">
              <li> <i class="fa fa-minus"></i>
              <label>
                <i class="fa fa-folder" style="color:rgba(237, 166, 90, 1);"></i>
               <a  href="inventory"   >
                Inventory Details </a></label>
  <li> <i class="fa fa-plus"></i>
    <label>
      <i class="fa fa-folder" style="color:rgba(237, 166, 90, 1);"></i>
      ADD ITEM </label>
    <ul>
      <li>
        <label>
          <i class="fa fa-file"style="color:rgba(237, 166, 90, 1);"></i>
          <a  href="#bikemodal" data-toggle="modal" data-target="#bikemodal"  >Bikes </a></label>


      </li>


      <li>
        <label>
          <i class="fa fa-file"style="color:rgba(237, 166, 90, 1);"></i>
          <a  href="#bikeParts" data-toggle="modal" data-target="#bikeParts"  > Parts </a></label>

      </li>
    </ul>
  </li>
                                                          <!-- <li> <i class="fa fa-plus"></i> -->
   <!--  <label>
      <i class="fa fa-folder" style="color:rgba(237, 166, 90, 1);"></i>
	   <a  href="#bikeupdate" data-toggle="modal" data-target="#bikeupdate"  >
      Update Bike Details </a></label> -->

  </li>
                                                        
 <!--    <li> <i class="fa fa-plus"></i>

      <i class="fa fa-folder" style="color:rgba(237, 166, 90, 1);"></i>
     <a class="button documents" href="ledger">LEDGER</a>
 <div>
            <br clear="change" />
        </div>


  </li> -->
<!-- 
<li> <i class="fa fa-plus"></i> -->
    <label>
      <i class="fa fa-folder" style="color:rgba(237, 166, 90, 1);"></i>
      Ledger Information </label>
    <ul>
                                                           </li>
    <li>
      <i class="fa fa-file"style="color:rgba(237, 166, 90, 1);"></i>
     <a class="button documents" href="ledger">LEDGER VIEW</a>



  </li>
        <li>
                                                           <label>
          <i class="fa fa-file"style="color:rgba(237, 166, 90, 1);"></i>
          <a  href="#ledg" data-toggle="modal" data-target="#ledg"  > Add New Ledger </a></label>

                                                          </li>
    </ul>
  </li>
 <div>
            <br clear="change" />
        </div>

  <li> <i class="fa fa-plus"></i>
    <label>
      <i class="fa fa-folder" style="color:rgba(237, 166, 90, 1);"></i>
	   <a  href="#productPricing" data-toggle="modal" data-target="#productPricing"  >
      PRODUCT PRICING </a></label>

  </li>


<!--
      <i class="fa fa-folder" style="color:rgba(237, 166, 90, 1);"></i>
	   <a class="button documents" href="ledger">LEDGER</a>
-->
 <div>
            <br clear="change" />
        </div>


  </li>
</ul>


						</div>


                  </div>
                </div>
              </div>
              <div class="col-md-10" id="mainbody" style="left: 17%; top: 19%; position: fixed;">
                <div class="row col-md-12 change"  style="height: 440px; overflow-y: scroll;">
                  <style>
                  .form-group{
                    margin: 5px;
                  }
                  .form-control{
                    height:25px;
                  }
                  .col-in{
                    margin:5px;
                    padding: 0;
                  }
                  </style>
                    <!--col -->
                    <div class="title" style="z-index:1; position:fixed; width:80%" >
                     <pre style="background:#09649a !important; color:white;"> LEDGER INFORMATION </pre>
                     </div>
                        <div class="white-box" style=" height: 440px; padding:0 !important; margin-top: 40px;">
                            <div class="col-in row">
                               <div class="col-md-12">




                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="home_else">

                                              <!-- Page Content -->
                                              <div id="">


                                                  <div class="row">
                                      			<div class="col-md-12">
                                      				<div class="white-box">

                                      <!-- Main content -->
                                      <section class="content">
                                          <div class="box container box-success" style="border-top-color: #efefef" ><br>

<!--
                                                      <div class="" >
                                                          <a  href="#ledgermodal" data-toggle="modal" data-target="#ledgermodal"  >Bikes </a>
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ledgermodal" >Add New Ledger</button>
                                                      </div>
-->

                                      <!--            modal-->
                                                  <div class="modal fade" id="ledgermodal" role="dialog">

                                                      <div class="modal-dialog">
                                      <!--                    modal content-->
                                                          <div class="modal-content">


                                                          <div class="modal-header">
                                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  <h4 class="modal-title">Add New Ledger</h4>
                                                          </div>
                                                          <div class="modal-body">

                                                              <form id="" method="POST" action="{{route('ledger.add')}}" enctype="multipart/form-data">

                                                                      <fieldset>
                                                                          <div class="input-group">

                                                                              <span class="input-group-addon"><i class="fa fa-first-order">&nbsp;Customer Name</i></span>
                                                                              <select name="customer" class="form-control">
                                                                                  <option>Select</option>
                                                                                  @foreach($cuse as $cse)
                                                                                  <option value="{{$cse->id}}">{{$cse->cusname}}</option>
                                                                                  @endforeach
                                                                              </select>

                                                                            </div>
                                                                          <br/>

                                                                         <div class="input-group">
                                                      <span class="input-group-addon"><i class="fa fa-product-hunt">&nbsp;Credit</i></span>
                                                      <input type="text" class="form-control" placeholder="Credit Nrs." name="credit" value="0.0" >
                                                    </div><br/>
                                                                           <div class="input-group">
                                                      <span class="input-group-addon"><i class="fa fa-list">&nbsp;Purpose</i></span>
                                                      <input type="text" class="form-control" placeholder="Purpose" name="purpose"  ><br/>
                                                    </div><br/>

                                                                          <div class="input-group">
                                                      <span class="input-group-addon"><i class="fa fa-money">&nbsp;Debit</i></span>
                                                      <input type="text" class="form-control" placeholder="Debit Nrs." name="debit"  value="0.0"><br/>
                                                    </div><br/>


                                                           <br/>
                                                                           <div class="box-footer">
                                                      <button type="submit" class="btn btn-primary" name="addcategory">Submit</button>
                                                    </div>
                                                  <input type="hidden" name="userid" value="{{Auth::user()->id}}"/>
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
                                                    <table id="example1" class="display compact table-bordered table-striped" cellspacing="0" width="100%" >
                                                      <thead>
                                                      <tr>
                                                        <th>Customer Name</th>
                                                        <th>Credit</th>
                                                        <th>Debit</th>
                                                        <th>Latest Date</th>


                                                        <th>Action</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                          @foreach($ledger as $ld)
                                                       @foreach($cus as $cu)
                                                                 <?php
                                                                 if($cu->id==$ld->cid){
                                                                 ?>

                                                         <tr>
                                                             <td>

                                                                 {{$cu->cusname}}

                                                             </td>

                                                             <td>{{$ld->credit}}</td>
                                                             <td>{{$ld->debit}}</td>
                                                             <td>{{$ld->created_at}}</td>

                                                              <td>
                                                                <div class="col-sm-6">
                                                                  <a  href="{{route('ledgerview.edit',$ld->cid)}}">
                                                            <button class="btn btn-primary btn-xs"> View </button>
                                                                  </a>
                                                            <a  href="{{route('ledgers.edit',$ld->id)}}"><button class="btn btn-info  btn-xs">Edit</button></a>
                                                            <div class="col-sm-2">
                                                              <a>
                                                                  {!! Form::open(['method'=>'DELETE', 'route'=>['ledgers.destroy',$ld->id],'style'=>'float:right']) !!}
                                                                  {!! Form::submit('Delete',['class'=>'btn btn-danger  btn-xs']) !!}
                                                                  {!! Form::close() !!}
                                                                  </a>
                                                                </div>

                                                             </td>
                                                          </tr>
                                                          <?php
                                                                 }
                                                                 ?>
                                                              @endforeach
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






                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>


            </div>



            <script type="application/javascript">
            $(document).ready(function(){

              document.getElementById("Bikes").style.display = "block";
              evt.currentTarget.className += " active";
            });

$("#treeview").hummingbird();
$(".documents").click(function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $("#mainbody").load(url);
    });
</script>

@endsection
