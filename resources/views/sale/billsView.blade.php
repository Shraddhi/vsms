

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
                     <pre style="background:#09649a !important; color:white;">   ITEMS INFORMATION </pre>
                     </div>
                        <div class="white-box" style=" height: 440px; padding:0 !important; margin-top: 40px;">
                            <div class="col-in row">
                               <div class="col-md-12">
                                 <div class="tab" style="margin:0 !important;">
                                   <ul id="myTab" class="nav nav-tabs">
                                          <li class="active"><a href="#home" data-target="#home, #home_else" data-toggle="tab">Bikes</a></li>
                                          <li><a href="#profile" data-target="#profile, #profile_else" data-toggle="tab">Parts</a></li>
                                          <!-- <li><a href="#bikeupdate" data-target="#bikeupdate" data-toggle="tab">Bike Update</a></li> -->
                                      </ul>

                                     </div>




                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="home_else">
                                     
                                     <div class="box container box-success " style="border-top-color: #efefef">
          <div class="box-body">
              <table id="example1" class="display compact table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>


                  <th>Invoice No</th>
                  <th>Bike Model</a></th>
                  <th>Customer Name</th>
                  <th> Pan </th>
                  <th> Bill Amount </th>
                  <th> Date </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($bs as $b)
                    <tr>
                    <td> <a href="{{ url('printBikeBill/'.$b->ordername ) }}" > {{ $b->ordername }}</a></td>
                    <td>{{ $b->bike_model }}</td>
                    <td>{{ $b->cusname }}</td>
                    <td>{{ $b->pan }}</td>
                    <td>{{ $b->price }}</td>
                    <td>{{ substr($b->created_at,0,10)}}</td>
                    </tr>
                  @endforeach               
                 </tbody>
              </table>
        </div>

    </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile_else">
                                     
                                      
                                      <div class="box container box-success " style="border-top-color: #efefef">
                                            <div class="box-body">
              <table id="example3" class="display compact table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>Invoice No</th>
                  <th>Bike Model</th>
                  <th>Parts Model</th>
                   <th>Quantity</th>
                   <th>Customer Name</th>
                  <th> Pan </th>
                  <th> Bill Amount </th>
                  <th> Date </th>
                </tr>
                </thead>
                <tbody>
                   
                    @foreach($ps as $b)
                    <tr>
                    <td> <a href="{{ url('printBikeBill/'.$b->ordername ) }}" > {{ $b->ordername }}</a></td>
                    <td>{{ $b->bike_model }}</td>
                    <td>{{ $b->parts_name }}</td>
                    <td>{{ $b->units }}</td>
                    <td>{{ $b->cusname }}</td>
                    <td> </td>
                    <td>{{ $b->price }}</td>
                    <td>{{ substr($b->created_at,0,10)}}</td>
                    </tr>
                  @endforeach               
                 </tbody>

              </table>
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
