<?php
use App\Models\Votes;
use App\Models\Users;
?>
@extends('layouts.layout')
@section('content')
<div class="container-fluid">
<div class="col-xs-12">
  <div class="card">
     <div class="header">
        <h3 class="title"><font color="white">Quick Count</font></h3>
     </div>
    <div class="content">
      <div class="row">
      @foreach($list_candidates as $candidates)
        <div class="col-xs-4">
        	<div class="thumbnail">
        	 <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->image) }}" style="max-height:200px;max-width:200px;margin-top:10px;" class="img-circle">
          	<div class="caption">
        		  <center>
      		    <h3>{{ $candidates->name }}</h3>
      		    <p>Vote Sementara</p>
      		    <p>
                <?php
                $voting = $candidates->votes;
                if (count($voting) > 0) {
                  $total = (count($voting)/count($votes))*100;
                  echo number_format((float)$total, 2, '.', '') . '%';
                }else{
                  echo "Belum Ada Pemilihan";
                }
                ?>
        			</p>
        		  </center>
      		  </div>
        	</div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</div>
@stop