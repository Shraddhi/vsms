@extends('layouts.mast')
@section('content')

@include('sale.commonFormHeader');

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
                     <pre style="background:#09649a !important; color:white;">   Bike Sales </pre>
                     </div>
                        <div class="white-box" style=" height: 440px; padding:0 !important; margin-top: 40px;">
                            <div class="col-in row">
                               <div class="col-md-12">
                                 <div class="box container box-success" style="border-top-color: #efefef"><br>

                                     <a href="home" class="btn btn-success btn-xs">Back to Dashboard</a><br><br>
                                       <div class="box-body">
                                           <table id="example1" class="display compact table-bordered table-striped" cellspacing="0" width="100%">
                                             <thead>
                                             <tr>
                                               <th>Name</th>
                                               <th>Address</th>
                                               <th>Phone</th>
                                               <th>Bike Model</th>
                                               <th>Bike Price</th>
                                               <th>Date</th>


                                               <th>Action</th>
                                             </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach($cs as $c)
                                                 <tr>
                                                 <td>{{$c->cusname}}</td>
                                                 <td>{{$c->cusaddres}}</td>
                                                 <td>{{$c->cusphone}}</td>
                                                 <td>{{$c->bike_model}}</td>
                                                 <td>{{$c->price}}</td>
                                                 <td>{{$c->created_at}}</td>
                                                 <td>Check</td>

                                                 </tr>
                                                @endforeach

                                               </tbody>
                                           </table>
                                     </div>

                                 </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>


            </div>



            <script type="application/javascript">

$("#treeview").hummingbird();
$(".documents").click(function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $("#mainbody").load(url);
    });
</script>

@endsection
