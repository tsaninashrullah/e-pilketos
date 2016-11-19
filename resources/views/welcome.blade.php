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
           <div class="row" id="alert">
            <div class="col-xs-5">
              <div class="alert alert-success">
                <center><span>{{ session('status') }}</span></center> 
              </div>
            </div>
          </div>
          @endif
      <!-- end notice -->
      <!-- error voted -->
           @if (session('error'))
           <div class="row" id="alert">
            <div class="col-xs-5">
              <div class="alert alert-danger">
                <center><span>{{ session('error') }}</span></center> 
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
<div class="row" style=" width:auto;">
  <div class="content_body_candidates">
    @if(count($list_candidates) == 0)
    <br><br><br><br><br><h4 align="center">Maaf data kandidat OSIS tidak ditemukan, mohon masukan data kandidat terlebih dahulu</h4>
    @else
    <h3><center>Calon Ketua OSIS SMK PGRI 1 CIMAHI</center></h3>
    <br>
    <br>
    @foreach($list_candidates as $candidates)
    <center>
      <div class="col-xs-6 col-xs-4">
        <div class="thumbnail">
          <center>
          <h3>{{ $candidates->name }}</h3>
          </center>
          <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->image) }}" style="width:auto;" class="img-circle">
          <div class="caption">
          <center>
            <p><a href="show_candidate/{{$candidates->id}}" class="btn btn-primary" role="button">Profil</a></p>
            <h2>Polling Suara</h2>
            <?php
            $voting = Candidates::find($candidates->id)->votes;
            if (count($voting) > 0) {
              $total = (count($voting)/count($votes))*100;
                echo number_format((float)$total, 2, '.', '') . '%';
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
     <?php
      $total_suara = 0;
      foreach ($list_candidates as $key => $votescandidates) {
        $total_suara = $total_suara + count($votescandidates->votes);
      }
      $tes2 = Users::where('status', '=', '1')->get();
      $tes = Users::where('status', '!=', '2')->get();
      ?>
    <br>
    <center>
    Jumlah siswa yang sudah memilih:
    {{ count($tes2) }}
     dari 
    {{ count($tes) }}
    </center>
    @endif
  </div>
</div>
<div class="row" style=" width:auto;">
  <div class="content_body_three">
    <br>
      <center><font color="white"> Tsani, Ari &copy; 2016</font></center>
    <br>
  </div>
</div>
@stop

