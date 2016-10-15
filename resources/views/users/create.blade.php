@extends('layouts.layout')
@section('content')
<br>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
         <div class="header">
            <h3 class="title"><font color="white">Tambah Siswa</font></h3>
         </div>
        <div class="content">
        <div class="row">
        {{ Form::open(['route' => 'users.store']) }}
        <div class="col-lg-4">
            <div class="form-group">
                {{ Form::text('nisn', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'NISN')) }}
                {{ $errors->first('nisn') }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
            {{ Form::text('gender', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Jenis Kelamin')) }}
            {{ $errors->first('gender') }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
            {{ Form::text('name', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Nama')) }}
            {{ $errors->first('name') }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
            {{ Form::text('born_date', $value = null, $attributes = array('required', 'class' => 'form-control', 'id' => 'datepicker','placeholder' => 'yyyy/mm/dd')) }}
            </div>
        </div>
           <div class="col-lg-8">
                <div class="form-group">
                {{ Form::textarea('address', $value = null, $attributes = array('required', 'class' => 'form-control','placeholder' => 'Alamat')) }}
                {{ $errors->first('address') }}
                </div>
            </div>
             <div class="col-lg-4">
                <div class="form-group">
                {{ Form::text('status', $value = null, $attributes = array('required', 'class' => 'form-control', 'placeholder' => 'Status')) }}
                {{ $errors->first('status') }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::password('', ['class' => 'form-control', 'placeholder' => 'PASSWORD']) }}
                {{ $errors->first('password') }}
                </div>
            </div>
            <div class="col-lg 4">
              {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
</div>
</div>
<!-- JS Custom -->
<script type="text/javascript">
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy/mm/dd'
    });
  } );
</script>
@stop