@extends('layouts.layout_login')
@section('content')
{{ Sentinel::check() }}
    <div class="content_body_one">
        <div class="col-lg-4">
        <font color = "white"><h2>E-PILKETOS<h4>SMK PGRI 1 CIMAHI</h4></h2>
        <h5>Kepemimpinan dalam kepengurusan OSIS yang berperan sebagai salah satu jalur pembinaan siswa harus mampu mewujudkan tugas pokok dan fungsinya, secara teratur dan terencana. Suarakan aspirasimu!
        </h5></font>
        </div>
        <div class="col-lg-4">
        <br>
         <img src="assets/img/home/home_epilketos.png" width="400px" height="300px">
         </div>
        <div class="col-lg-4">
        <br>
        <div class="card card-user">
        <div class="container-fluid">
            <div class="header">
            <br>
              <h2 class="title" align="center">VOTE</h2>
            </div>
            {{ Form::open(array('url' => 'auth', 'files' => true)) }}
            <div class="row">
              <div class="col-lg-12">
              <hr>
                <div class="form-group">
                {{ Form::text('nisn', $value = null, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'NISN')) }}
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
    </div>
    <div class="content_body_candidates">
    @if(count($list_candidates) == 0)
    <br><br><br><br><br><h4 align="center">Maaf data kandidat OSIS tidak ditemukan, mohon masukan data kandidat terlebih dahulu</h4>
    @else
    <br>
    @foreach($list_candidates as $candidates)
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <center>
      <h3>{{ $candidates->name }}</h3>
      </center>
     <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->image) }}" style="max-height:200px;max-width:200px;margin-top:10px;" class="img-circle">
      <div class="caption">
      <center>
        <p><a href="#" class="btn btn-primary" role="button">Profil</a></p>
        <h2>Polling Suara</h2>
        0.34%
      </center>
      </div>
    </div>
    </div>
    @endforeach
    @endif
    </div>
    <div class="content_body_three">
    <div class="col-xs-5">
    </div>
    <div class="col-xs-2">
    <br>
    <!-- <font color = "white"><h6>SMK PGRI 1 CIMAHI</h6></font> -->
    </div>
    <div class="col-xs-5">
    </div>
    </div>
@stop