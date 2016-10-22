<?php
Use App\Models\Candidates;
Use App\Models\Users;
?>
@extends('layouts.layout_login')
@section('content')

{{ Sentinel::check() }}
<div class="row" style="width:auto;">
    <div class="content_body_one">
      <div class="col-xs-12">
       <!-- notice voted -->
           @if (session('status'))
           <div class="row">
            <div class="col-xs-5">
              <div class="alert alert-success">
                <center><span>{{ session('status') }}</span></center> 
              </div>
            </div>
          </div>
          @endif
      <!-- end notice -->
      </div>
      <div class="col-xs-5">
      <h2>e-<strong>PILKETOS</strong></h2>
      <h3><strong>SMK </strong><small style="color:white">PGRI 1 Cimahi</small></h3>
          <h4>Kepemimpinan dalam kepengurusan OSIS yang berperan sebagai salah satu jalur pembinaan siswa harus mampu mewujudkan tugas pokok dan fungsinya, secara teratur dan terencana. Suarakan aspirasimu!
          </h4>
      </div>
      <div class="col-xs-7">
         <img src="assets/img/home/home_page_epilketos12.png" class="img-responsive" >
      </div>
    </div>
</div>
@stop