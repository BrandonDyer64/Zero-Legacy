<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Zero Database</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <style>
  body {
      /*font: 400 15px Lato, sans-serif;*/
      font-family: 'Open Sans', sans-serif;
      font-weight: 300;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #0055ff;
      color: #fff;
      padding: 100px 25px;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .bg-grey-dark {
      background-color: #f0f0f0;
  }
  .logo-small {
      color: #0055ff;
      font-size: 50px;
  }
  .logo {
      color: #0055ff;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #0055ff;
  }
  .carousel-indicators li {
      border-color: #0055ff;
  }
  .carousel-indicators li.active {
      background-color: #0055ff;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #0055ff; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #0055ff;
      background-color: #fff !important;
      color: #0055ff;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #0055ff !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #0055ff;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #0055ff;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      /*color: #0055ff !important;*/
      background-color: #6688ff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  .panel-pricing .list-group {
    margin: auto;
    text-align: justify;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #0055ff;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: 'Open Sans', sans-serif;
  }
  b, strong {
    font-weight: 700;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  .heartbeat {
    -webkit-animation: heartbeat 1.5s ease-in-out infinite both;
          animation: heartbeat 1.5s ease-in-out infinite both;
  }
  .pulsate-fwd {
    -webkit-animation: pulsate-fwd 0.5s ease-in-out infinite both;
          animation: pulsate-fwd 0.5s ease-in-out infinite both;
  }
  /* ----------------------------------------------
 * Generated by Animista on 2017-9-9 20:12:47
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

/**
 * ----------------------------------------
 * animation heartbeat
 * ----------------------------------------
 */
@-webkit-keyframes heartbeat {
  from {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-transform-origin: center center;
            transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  10% {
    -webkit-transform: scale(0.91);
            transform: scale(0.91);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  17% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  33% {
    -webkit-transform: scale(0.87);
            transform: scale(0.87);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  45% {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
@keyframes heartbeat {
  from {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-transform-origin: center center;
            transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  10% {
    -webkit-transform: scale(0.91);
            transform: scale(0.91);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  17% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  33% {
    -webkit-transform: scale(0.87);
            transform: scale(0.87);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  45% {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
/* ----------------------------------------------
 * Generated by Animista on 2017-9-9 20:16:54
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

/**
 * ----------------------------------------
 * animation pulsate-fwd
 * ----------------------------------------
 */
@-webkit-keyframes pulsate-fwd {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.1);
            transform: scale(1.1);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes pulsate-fwd {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.1);
            transform: scale(1.1);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">ZERO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#pricing">PRICING</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <div class="container">
    <h1>Zero</h1> 
    <p>We Love <span class="glyphicon glyphicon-heart pulsate-fwd"></span> Databases</p>
  </div>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Company Page</h2><br>
      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br><a href="#pricing" class="btn btn-default btn-lg">Sign Up</a>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <div class="slideanim">
       <h3>Add: <strong>Bill of Lading</strong></h3>
       <p><a href="?p=list&amp;t=bill_of_lading"><span class="glyphicon glyphicon-th-list"></span></a></p>
       <form method="post">
          <table class="table">
             <tbody>
          </tr>

          <tr>
             <td valign="top">
                Shipping Address:
             </td>
             <td>
                   <select name="shipping_address" value="0">
          <option value="1">1234 Street St</option>
       </select>
       &nbsp;
       <a href="?p=list&amp;t=shipping_address"><span class="glyphicon glyphicon-th-list"></span></a>
       &nbsp;
       <a href="?p=add&amp;t=shipping_address"><span class="glyphicon glyphicon-plus"></span></a>
             </td>
          </tr>

          <tr>
             <td valign="top">
                Carrier:
             </td>
             <td>
                   <select name="carrier" value="0">
          <option value="1">Carrier C</option><option value="2">Carrier B</option><option value="3">Carrier A</option><option value="4">Company</option><option value="5">Company A</option>
       </select>
       &nbsp;
       <a href="?p=list&amp;t=shipping_carrier"><span class="glyphicon glyphicon-th-list"></span></a>
       &nbsp;
       <a href="?p=add&amp;t=shipping_carrier"><span class="glyphicon glyphicon-plus"></span></a>
             </td>
          </tr>

          <tr>
             <td valign="top">
                Vehicle Number:
             </td>
             <td>
                   <input type="text" name="vehicle_number" value="" placeholder="vehicle_number">
             </td>
          </tr>

          <tr>
             <td valign="top">
                Freight Charges Prepaid:
             </td>
             <td>
                   <input type="checkbox" name="freight_charges_prepaid" unchecked="">
             </td>
          </tr>
                <tr>
                   <td></td>
                   <td>
                      <input style="width: 44%;" type="number" name="-quantity" placeholder="Copies">
                   </td>
                </tr>
             </tbody>
          </table>
       </form>
      </div>
    </div>
    <div class="col-sm-8">
      <h2>Industry Leading Forms</h2><br>
      <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Top of the Line List Pages</h2><br>
      <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div class="col-sm-4">
      <div class="slideanim">
        <h3>List: <b>Time Punch Entry</b></h3>

          <p><a href="?p=add&t=time_punch_entry"><span class="glyphicon glyphicon-plus"></span></a></p>

              <div class="table-responsive">
          <table class="table table-striped table-hover">
              <tbody>
                  <tr class="list_table_header_row">
                      <th></th><th>User</th><th>Duration</th><th>Start Time</th>
                  </tr>
                  <tr class='list_table_data_row'>
                      <td align="left" valign="center">
                          <a href="?p=display&t=time_punch_entry&id=10" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                          &nbsp;
                          <a href="?p=edit&t=time_punch_entry&id=10" title="Edit"><span class="glyphicon glyphicon-edit"></a>
                          &nbsp;
                          <a href="?p=delete&t=time_punch_entry&id=10" title="Delete"><span class="glyphicon glyphicon-remove"></a>
                      </td>
                      <td><a href='?p=display&t=user&id=1'>John</a></td>
                      <td>01:24:32</td>
                      <td>Friday August 25th 2017 10:43:54 PM</td>
                  </tr>

                  <tr class='list_table_data_row'>
                      <td align="left" valign="center">
                          <a href="?p=display&t=time_punch_entry&id=9" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                          &nbsp;
                          <a href="?p=edit&t=time_punch_entry&id=9" title="Edit"><span class="glyphicon glyphicon-edit"></a>
                          &nbsp;
                          <a href="?p=delete&t=time_punch_entry&id=9" title="Delete"><span class="glyphicon glyphicon-remove"></a>
                      </td>
                      <td><a href='?p=display&t=user&id=1'>Elliot</a></td>
                      <td>00:35:49</td>
                      <td>Friday August 25th 2017 07:54:53 PM</td>
                  </tr>

                  <tr class='list_table_data_row'>
                      <td align="left" valign="center">
                          <a href="?p=display&t=time_punch_entry&id=7" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                          &nbsp;
                          <a href="?p=edit&t=time_punch_entry&id=7" title="Edit"><span class="glyphicon glyphicon-edit"></a>
                          &nbsp;
                          <a href="?p=delete&t=time_punch_entry&id=7" title="Delete"><span class="glyphicon glyphicon-remove"></a>
                      </td>
                      <td><a href='?p=display&t=user&id=1'>Sally</a></td>
                      <td>02:36:23</td>
                      <td>Saturday September 2nd 2017 12:02:12 AM</td>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <h3>QR Codes</h3>
              <table class="table">
                  <tbody><tr><td>Icon:</td><td><img src="http://zerodatabase.com/host/plugins/qr_codes/icon.jpg" width="32" height="32"></td></tr>
                  <tr><td>Name:</td><td>QR Codes</td></tr>
                  <tr><td>Headline:</td><td>Automatic QR code generation.</td></tr>
                  <tr><td>Status:</td><td>Ready to Install</td></tr>
              </tbody></table>
              <br>
            </div>
            <div class="item">
              <h3>Time Punch</h3>
              <table class="table">
                  <tbody><tr><td>Icon:</td><td><img src="http://zerodatabase.com/host/plugins/time_punch/icon.jpg" width="32" height="32"></td></tr>
                  <tr><td>Name:</td><td>Time Punch</td></tr>
                  <tr><td>Headline:</td><td>Your Employees Can Clock in From the Home Page.</td></tr>
                  <tr><td>Status:</td><td>Ready to Install</td></tr>
              </tbody></table>
              <br>
            </div>
            <div class="item">
              <h3>Slack</h3>
              <table class="table">
                  <tbody><tr><td>Icon:</td><td><img src="http://zerodatabase.com/host/plugins/slack/icon.jpg" width="32" height="32"></td></tr>
                  <tr><td>Name:</td><td>Slack</td></tr>
                  <tr><td>Headline:</td><td>Use Slack to Control Your Database.</td></tr>
                  <tr><td>Status:</td><td>Ready to Install</td></tr>
              </tbody></table>
              <br>
            </div>
            <div class="item">
              <h3>YouTube</h3>
              <table class="table">
                  <tbody><tr><td>Icon:</td><td><img src="http://zerodatabase.com/host/plugins/youtube/icon.jpg" width="32" height="32"></td></tr>
                  <tr><td>Name:</td><td>YouTube</td></tr>
                  <tr><td>Headline:</td><td>YouTube Videos Built Directly Into Your Pages.</td></tr>
                  <tr><td>Status:</td><td>Ready to Install</td></tr>
              </tbody></table>
              <br>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
            <span>&nbsp;</span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
            <span>&nbsp;</span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <h2>Game Changing Plugins</h2><br>
      <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center bg-grey-dark">
  <h2>At The Core</h2>
  <p>What comes with every new system</p>
  <br>
  <div class="row">
    <div class="col-sm-3">
      <i class="fa fa-5x fa-server text-light sr-icons logo-small"></i>
      <h4>Space</h4>
      <p>More Than 10GB of Storage</p>
    </div>
    <div class="col-sm-3">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4>LOVE</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-3">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4>CODE</h4>
      <p>2 Hours of Professional Custom Code With Standard Subscription</p>
    </div>
    <div class="col-sm-3">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>Go Green With our Paperless Solution</p>
    </div>
  </div>
</div>

<!-- Container (Pricing Section) -->
<div id="pricing" class="container">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row slideanim">
    <?php
        $values = [
          [
            "title"=>"Basic",
            'total'=>'total',
            "tier"=>"5",
            "price"=>"$99",
          ],
          [
            "title"=>"Standard",
            'total'=>'total',
            "tier"=>"10",
            "price"=>"$199",
          ],
          [
            "title"=>"Premium",
            'total'=>'',
            "tier"=>"u",
            "price"=>"$499",
          ]
        ];
        foreach ($values as $info) {
          echo <<< HTML
            <div class="col-sm-4 col-xs-12">
              <div class="panel panel-default text-center panel-pricing">
                <div class="panel-heading">
                  <h1>${info['title']}</h1>
                </div>
                <div class="panel-body">
                  <!--<p><strong>100</strong> Lorem</p>
                  <p><strong>50</strong> Ipsum</p>
                  <p><strong>25</strong> Dolor</p>
                  <p><strong>10</strong> Sit</p>
                  <p><strong>Endless</strong> Amet</p>-->
                  <table class="list-group">
                    <tr><td><i class="fa fa-check"></i></td><td>&nbsp;Unlimited Server Access</td></tr>
                    <tr><td><i class="fa fa-check"></i></td><td>&nbsp;Unlimited Servers</td></tr>
                    <tr><td><i class="fa fa-check"></i></td><td>&nbsp;Unlimited Commands</td></tr>
                    <tr><td><i class="fa fa-check"></i></td><td>&nbsp;Unlimited Community Access</td></tr>
                  </table>
                </div>
                <div class="panel-footer">
                  <h3><strong>${info['price']}</strong><small>/month</small></h3>
                  <button class="btn btn-lg">Sign Up</button>
                </div>
              </div>      
            </div>
HTML;
        }
        ?>    
  </div>
</div>

<!-- Container (Contact Section) -
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
-->
<!-- Add Google Maps -
<div id="googleMap" style="height:400px;width:100%;"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(41.878114, -87.629798);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!-
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<footer class="container-fluid text-center bg-grey">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Product of <a href="http://magentex.biz/" title="See our other products">Magentex</a></p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>