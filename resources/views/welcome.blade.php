<?php
Use App\Models\Candidates;
Use App\Models\Users;
?>
@extends('layouts.layout_login')
@section('content')

{{ Sentinel::check() }}
    <div class="content_body_one">
    <div class="col-xs-1">
    </div>
      <div class="col-xs-5"><h2>e-<strong>PILKETOS</strong></h2>
      <h3><strong>SMK </strong><small style="color:white">PGRI 1 Cimahi</small></h3>
          <h4>Kepemimpinan dalam kepengurusan OSIS yang berperan sebagai salah satu jalur pembinaan siswa harus mampu mewujudkan tugas pokok dan fungsinya, secara teratur dan terencana. Suarakan aspirasimu!
          </h4>
      </div>
      <div class="col-xs-5">
      <center>
         <img src="assets/img/home/home_page_epilketos12.png" width="630px" height="502px"  media="(style="width:auto;")" class="img-responsive">
      </center>
      </div>
      <div class="col-xs-1">
      </div>
    </div>
    <hr>
    <div class="content_body_candidates">
      @if(count($list_candidates) == 0)
      <br><br><br><br><br><h4 align="center">Maaf data kandidat OSIS tidak ditemukan, mohon masukan data kandidat terlebih dahulu</h4>
      @else
      <h3><center>Calon Ketua OSIS SMK PGRI 1 CIMAHI</center></h3>
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
      @endforeach
      <?php
      $total_suara = 0;
      foreach ($list_candidates as $key => $votescandidates) {
        $total_suara = $total_suara + count($votescandidates->votes);
      }
      $tes2 = Users::where('status', '=', '1')->get();
      $tes = Users::where('status', '!=', '2')->get();
      ?>
      <div class="row_one">
        <div class="col-lg-12">
          <center>
            <p><i>Jumlah Pemilih sebesar :{{ count($tes2) }} dari {{ count($tes) }}</i></p>
          </center>
        </div>
      </div>
      @endif
    </div>
    <div class="content_body_three">
      <div class="col-xs-5">
      <center>
      <font color="white"> Tsani, Ari &copy; 2016</font>
      </center>
      </div>
    </div>
@stop