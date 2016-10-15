<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- <meta name="csrf-token" content="<?php echo csrf_token() ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <!-- image favicon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico')}}">
              
        <title>Laravel 5.2</title>
   
        <!-- Bootstrap core CSS     -->
        <link href="<?php echo asset('assets/css/bootstrap.min.css')?>" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="<?php echo asset('assets/library/light_bootstrap/css/animate.min.css')?>" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="<?php echo asset('assets/library/light_bootstrap/css/light-bootstrap-dashboard.css')?>" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo asset('assets/library/light_bootstrap/css/pe-icon-7-stroke.css')?>" rel="stylesheet" />

        <!-- Material Icon  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>   
          
          /* CSS custom for welcome page */

             .main-panel {
              background: rgba(203, 203, 210, 0.15);
              position: relative;
              z-index: 2;
              width: calc(100%);
              min-height: 100%;
              padding-top: 70px;
            }
            #bg {
              background: url("<?php echo asset('assets/img/home_page_epilketos.gif')?>") no-repeat center center fixed;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
            }

            .card-user {
              background-color: #ecf0f1;
            }
            .btn-primary {
            border-color: transparent;
             color: #FFFFFF;
             background-color: #34495e;
            }
            
            .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .btn-primary.dropdown-toggle {
              background-color: #34495e;
              color: #FFFFFF;
              border-color: transparent;
            }
            
            /* End CSS */
        </style>

    </head>
    <body>
    <!--   Core JS Files   -->
    <script src="<?php echo asset('assets/library/jquery/jquery-1.10.2.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/bootstrap-notify.js')?>"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/bootstrap-checkbox-radio-switch.js')?>"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/chartist.min.js')?>"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/library/light_bootstrap/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo asset('assets/library/light_bootstrap/js/light-bootstrap-dashboard.js')?>"></script>
     <div class="wrapper">
    <div class="main-panel" id="bg">
   <div class="content">
   <div class="col-xs-12">
    <h3 align="center">
       <font color = "white">
        Silahkan login untuk memilih ketua OSIS tahun ajaran 2016-2017.
       </font>
   </h3>
   </div>
   <div class="col-xs-4">
   </div>
     <div class="col-lg-4">
        <br>
        <div class="card card-user">
        <div class="container-fluid">
            <div class="header">
            </div>
            {{ Form::open(array('url' => 'auth', 'files' => true)) }}
            <div class="row">
              <div class="col-lg-12">
              <hr>
                <div class="form-group">
                {{ Sentinel::check() }}
                mantap
                {{ Form::text('nisn', $value = null, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'NISN', 'maxlength'=>'10')) }}
                {{ $errors->first('nisn') }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'PASSWORD']) }}
                    {{ $errors->first('password') }}
                </div>
              </div>
            </div>
            {{ Form::submit('Masuk', array('class' => 'btn btn-primary btn-lg btn-block')) }}
            {{ Form::close() }}
            <br>
          </div>
        </div>
        </div>
      <div class="col-xs-4">
      </div>
  </div>
  </div>
  </div>
  </body>
</html>