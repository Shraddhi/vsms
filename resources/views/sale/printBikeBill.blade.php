
        <!-- Page Content -->
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  
  <title>TVS SHOWROOM SINDHULI</title>
  
  <link rel='stylesheet' type='text/css' href="{{ asset('print/style.css')}}" />
  <link rel='stylesheet' type='text/css' href="{{ asset('print/print.css')}}" media="print" />
  <script type='text/javascript' src="{{ asset('print/jquery-1.3.2.min.js')}}"></script>
  <script type='text/javascript' src="{{ asset('print/example.js')}}"></script>

</head>

<body>

	<input type="button" onclick="printForm('printableForm')"
		value="Print this bill" />
<div id="printableForm">

  <div id="page-wrap">

    <textarea id="header">BILL</textarea>
    
    <div id="identity">
     <textarea id="address">Customer Name: {{ $bs[0]->cusname }}
Street Name: {{ $bs[0]->cusaddres }}
Location: {{ $bs[0]->location }}
Phone: {{ $bs[0]->cusphone }} </textarea>
<div id="pan">
<textarea>
PAN: @if( $bs[0]->pan ) {{ $bs[0]->pan }} @endif </textarea>
</div>
 <div class="seller">
<textarea id="logo">Seller's Name & Address:
TVS SHOWROOM SINDHULI NEPAL
PAN NO: 23749277
Branch:Sindhuli  Phone:9843837438
E-mail:tvs@hotmail.com </textarea>
            </div>
    
    </div>
    
    <div style="clear:both"></div>
    <div class="manual_date">
      <textarea id="today_date">Date: {{ substr($bs[0]->created_at,0,10)}} </textarea>
     </div>
    <div id="customer">
     <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>{{ $bs[0]->ordername }}</textarea></td>
                </tr>
                </table>
    
    </div>
    
    <table id="items">
    <table class="" id="items">
    <thead>
    <th>SN</th>
    <th>Bike Model</th>
    <th>Price</th>
    <th>Discount</th>
    <th>Amount</th>
    </thead>
    <tbody class="body" >
        <tr>
        <th class="no">1</th>
            <td> {{ $bs[0]->bike_model }}  </td>

            <td> {{ $bs[0]->price }} </td>
            <td> {{ $bs[0]->discount }} </td>
            <td>  </td>


        </tr>
        <tr>
        <td colspan="3" class="blank" ></td>
        <td colspan="2" class="total-line" style="text-align:left;height: 40px;" > Subtotal Rs. <b class="" >{{ $bs[0]->price  }}</b> </td>

        </tr>
    </tbody>
    </table>
    
    <!-- <div id="terms">
      <h5>Terms</h5>
      <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
    </div> -->
  
  </div>
</div>
  
</body>

</html>
<script>
		function printForm(printName) {
			var printContents = document.getElementById(printName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>