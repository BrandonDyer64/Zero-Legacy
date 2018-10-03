<?php

if ($page == 'bill_of_lading') {
  $stmt = db_select('bill_of_lading',['*'],['id'=>$id]);
  $info = $stmt->fetch();
  $bol_config = json_decode(file_get_contents("config/plugins/bill_of_lading.json"), true);
  $home_addr = $bol_config['origin'];
  $stmt = db_select('shipping_address',['*'],['id'=>$info['shipping_address']]);
  $to_info = $stmt->fetch();
  $stmt = db_select('shipping_carrier',['*'],['id'=>$info['carrier']]);
  $carrier_info = $stmt->fetch();
  $date = $info['date_recorded'];//date('m/d/y',$info['date_recorded']);
  $cod_prepaid = $info['c_o_d_fee_prepaid'] ? 'check' : 'unchecked';
  $cod_collect = $info['c_o_d_fee_collect'] ? 'check' : 'unchecked';
  $freight_prepaid = $info['freight_charges_prepaid'] ? 'check' : 'unchecked';
  $freight_collect = $info['freight_charges_collect'] ? 'check' : 'unchecked';
  $info_lines = explode("\n", $info['info_lines']);
  $info_lines_raw_html = [];
  $info_lines_html = '';
  foreach ($info_lines as $line) {
    $first_val = explode(' ', $line);
    $first_val = $first_val[0];
    if ($first_val == '-') {
      end($info_lines_raw_html);
      $key = key($info_lines_raw_html);
      $info_lines_raw_html[$key]['text'] .= "\n<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>$line</small>";
    } else {
      $info_lines_raw_html[] = [
        'units' => $first_val,
        'text' => $line
      ];
    }
  }
  foreach ($info_lines_raw_html as $value) {
    $info_lines_html .= "<tr><td>${value['units']}</td><td></td><td>${value['text']}</td><td></td><td></td><td></td></tr>";
  }
  $content = <<<HTML
  <html>
    <head>
      <title>Bill of Lading: $id</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="plugins/bill_of_lading/document.css">
    </head>
    <body>
      <!-- Header -->
      <div class="container" style="margin-top:2em;">
        <div class="row">
          <div class="col-xs-4">
            <h3>BILL OF LADING</h3>
            <p class="small">NOTICE: Shippers of hazardous materials must enter 24-hour emergency response telephone number under "Emergency Response Phone Number".</p>
          </div>
          <div class="col-xs-8">
            <div class="row">
              <div class="col-xs-3">
                Date:
              </div>
              <div class="col-xs-3 line">
                $date
              </div>
              <div class="col-xs-3">
                 Bill of Lading No:
              </div>
              <div class="col-xs-3 line">
                $id
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3"></div><div class="col-xs-3"></div>
              <div class="col-xs-3">
                 Shipper No:
              </div>
              <div class="col-xs-3 line">
                &nbsp;
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                Carrier:
              </div>
              <div class="col-xs-3 line">
                ${carrier_info['name']}&nbsp;
              </div>
              <div class="col-xs-3">
                 Carrier No:
              </div>
              <div class="col-xs-3 line">
                ${carrier_info['id']}&nbsp;
              </div>
            </div>
          </div>
        </div>
        <!-- Addresses -->
        <section>
          <br>
          <div class="row line">
            <div class="col-xs-1">
              To:
            </div>
            <div class="col-xs-5">
              ${to_info['name']}
            </div>
            <div class="col-xs-1">
               From:
            </div>
            <div class="col-xs-5">
              ${home_addr['name']}
            </div>
          </div>
          <div class="row line">
            <div class="col-xs-1">
              Street:
            </div>
            <div class="col-xs-5">
              ${to_info['street']}
            </div>
            <div class="col-xs-1">
               Street:
            </div>
            <div class="col-xs-5">
              ${home_addr['street']}
            </div>
          </div>
          <div class="row line">
            <div class="col-xs-1">
              Destination:
            </div>
            <div class="col-xs-2">
              ${to_info['city']}
            </div>
            <div class="col-xs-1">
              Zip:
            </div>
            <div class="col-xs-2">
              ${to_info['zip']}
            </div>
            <div class="col-xs-1">
               Origin:
            </div>
            <div class="col-xs-2">
              ${home_addr['city']}
            </div>
            <div class="col-xs-1">
               Zip:
            </div>
            <div class="col-xs-2">
              ${home_addr['zip']}
            </div>
          </div>
          <div class="row line">
            <div class="col-xs-1">
              Route:
            </div>
            <div class="col-xs-2">
              ${info['route']}
            </div>
            <div class="col-xs-1">
              Vehicle&nbsp;No:
            </div>
            <div class="col-xs-2">
              ${info['vehicle_number']}
            </div>
            <div class="col-xs-1">
              SCAC:
            </div>
            <div class="col-xs-2">
              ${info['scac']}
            </div>
            <div class="col-xs-2">
              <small>Emergency Response<br>Phone Number:</small>
            </div>
            <div class="col-xs-1">
              
            </div>
          </div>
        </section>
        <section>
          <br>
          <table class="table">
            <tr>
              <th>Shipping Units</th><th>+HM</th><th>Description</th><th>Weight</th><th>Rate or Class</th><th>CHARGES</th>
            </tr>
            $info_lines_html
          </table>
        </section>
        <section>
          <div class="row line">
            <div class="col-xs-3">
              <small>*If the shipment moves between two ports by a carrier by water, the law requires that the bill of lading state whether weight is "carrier's or shippers weight".</small>
            </div>
            <div style="display: none"></div>
            <div class="col-xs-1">
              Remit C.O.D. to Address
            </div>
            <div class="col-xs-1">
              <small>${info['remit_c_o_d_to_address']}</small>
            </div>
            <div class="col-xs-1">
              C.O.D. Amt.
            </div>
            <div class="col-xs-1">
              \$${info['c_o_d_amount']}
            </div>
            <div class="col-xs-1">
              C.O.D.&nbsp;Fee:<br>
              <span class="nobreak"><span class="glyphicon glyphicon-$cod_prepaid"></span> Preepaid</span>
              <span class="nobreak"><span class="glyphicon glyphicon-$cod_collect"></span> Collect</span>
            </div>
            <div class="col-xs-1">
            </div>
            <div class="col-xs-1">
              Total Charges&nbsp;
            </div>
            <div class="col-xs-1">
              \$${info['total_charges']}
            </div>
          </div>
        </section>
        <section>
          <br>
          <div class="row">
            <div class="col-xs-4">
              <p><small>
                Note–Where the rate is dependent on value, shippers are required to state specifically in writing the agreed or declared value of the property.
              </small></p>
              <p><small>
                The agreed or declared value of the property is hereby specifically stated by the shipper to be not exceeding
              </small></p>
            </div>
            <div style="display: none;"></div>
            <div class="col-xs-6">
              <p><small>
                Subject to Section 7 of the conditions, if this shipment is to be delivered to the consignee without recourse on the consignor, the consignor shall sign the following statement.
              </small></p>
              <p><small>
                The carrier shall not make delivery of this shipment without payment of freight and all other charges.
              </small></p>
            </div>
            <div class="col-xs-2">
              Freight Charges<br>
              <span class="glyphicon glyphicon-$freight_prepaid"></span> Freight prepaid<br>
              <span class="glyphicon glyphicon-$freight_collect"></span> Collect
            </div>
          </div>
          <div class="row">
            <div class="col-xs-1">
              \$
            </div>
            <div class="col-xs-1 line">
              &nbsp;
            </div>
            <div class="col-xs-1">
              per
            </div>
            <div class="col-xs-1 line">
              &nbsp;
            </div>
            <div class="col-xs-1">
              Consignor
            </div>
            <div class="col-xs-5 line">
              &nbsp;
            </div>
          </div>
        </section>
        <section>
          <br>
          <p><small>
            &nbsp;&nbsp;&nbsp;&nbsp;RECEIVED, subject to the classification and lawfully filed tariffs in effect on the date of the issue of this Bill of Lading, the property described above and in apparent good order, except as noted (contents and condition of contents of packages unknown), marked, consigned, and destined, as indicated above which said carrier (the word carrier being understood throughout this contract as meaning any person in possession of the property under the contract), agrees to carry to its usual place of delivery of sad destination, if on its route, otherwise to deliver to another carrier on the route to said destination. It is mutually agreed to ach carrier of all or any of said property over all or any portion of said route to destination and as to each party at any time interested in all or any of said property, that very service to be performed hereunder shall be subject to all the conditions not prohibited by law, whether printed or written, herein contained, including the conditions on the back hereof, which are hereby agreed to by the shipper and accepted for himself and his assigns. 
          </small></p>
        </section>
        <section>
          <div class="row">
            <div class="col-xs-5">
              <small>
                Mark with “RQ” if appropriate to designate Hazardous Materials as defined in the U.S. Department of Transportation Regulations governing the transportation of hazardous materials. The use of this column is an optional method for identifying hazardous materials on Bills of Lading per 172.201(a)(1) (iii) of Title 49 Code of Federal Regulations. Also when shipping hazardous materials, the shipper’s certification statement prescribed in section 172.204(a) of the Federal Regulations, as indicated on the Bill of Lading does apply, unless a specific exception from the requirement is provided in the Regulation for a particular material.
              </small>
            </div>
            <div class="col-xs-5">
              <small>
                The format and content of hazardous item list is the responsibility of individual company interpretation of requirements as described in 49 Code of Federal Regulations 172, Subpart C-Shipping Papers. Such description consists of the following per Sections 172.201 (Hazardous Material Table) and Sections 172.202 and 172.203: Proper shipping name, hazardous class, UN identification number, packing group, and subsidiary class(es).
              </small>
            </div>
            <div class="col-xs-2">
              <small>
                Note: Liability limitation for loss or damage in this shipment may be applicable. See 49 United States Code, Sections 14706(c (1)(A) and (B).
              </small>
            </div>
          </div>
        </section>
        <section>
          <br><br>
          <div class="row">
            <div class="col-xs-1">
              Shipper
            </div>
            <div class="col-xs-5 line">
              &nbsp;
            </div>
            <div class="col-xs-1">
              Carrier
            </div>
            <div class="col-xs-5 line">
              &nbsp;
            </div>
          </div>
        </section>
      </div>
    </body>
  </html>
HTML;
  echo $content;
  exit;
}