
@extends('layouts.layout_votes')
@section('content')
<br>
@if(count($list_candidates) == 0)
<br>
<br>
<h4 align="center">Sorry vote doesn't available, entry candidates before vote</h4>
@else
 <h3 align="center">
 <font color = "white">
	Silahkan pilih calon ketua OSIS tahun ajaran 2016-2017.
 </font>
 </h3>
<br>
<br>
@foreach($list_candidates as $candidates)
<div class="col-sm-6 col-md-4">
<div class="thumbnail">
<br>
 <img src="{{ asset('uploads/images/' . $candidates->id . '/thumb' . $candidates->image) }}" style="max-height:200px;max-width:200px;margin-top:10px;" class="img-circle">
      <div class="caption">
  <div class="caption">
  <center>
    <h3>{{ $candidates->name }}</h3>
    <p></p>
    <p><a href="#" class="btn btn-primary" role="button">Vote</a>
  </center>
  </div>
</div>
</div>
</div>
@endforeach
@endif
<script type="text/javascript">

</script>
@stop