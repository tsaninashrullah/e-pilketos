<?php
Use App\Models\Candidates;
?>
@extends('layouts.layout_votes')
@section('content')
    @if(count($list_candidates) == 0)
    <br><br><br><br><br><h4 align="center"><font color="white">Maaf data kandidat OSIS tidak ditemukan, mohon masukan data kandidat terlebih dahulu</font></h4>
    @else
    <h3><center>
    <font color="white">QUICK COUNT e-<strong>PILKETOS</strong> SMK PGRI 1 CIMAHI
    </font>
    </center></h3>
    <br>
    @foreach($list_candidates as $candidates)
    <center>
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <center>
      <h3>{{ $candidates->name }}</h3>
      </center>
      <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->image) }}" style="width:auto;" class="img-circle">
      <div class="caption">
      <center>
        
        <h2>Polling Suara</h2>
        <?php
        $voting = Candidates::find($candidates->id)->votes;
        if (count($voting) > 0) {
          $total = (count($voting)/count($votes))*100;
          echo $total.'%';
        }else{
          echo "Belum Ada Pemilihan";
        }
        ?>
      </center>
      </div>
    </div>
    </div>
    </center>
    @endforeach
    @endif
<div class="col-xs-12">
<div class="row">
<center>
<a href="/" class="btn btn-primary" role="button">Back</a>
</center>
</div>
</div>
@endsection
