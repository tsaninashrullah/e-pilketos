<?php
Use App\Models\Candidates;
?>
@extends('layouts.layout_login')
@section('content')
<div class="container-fluid">
<div class="col-xs-12">
    <div class="card">
     <div class="header">
        <h3 class="title"><font color="white">Info Kandidat</font></h3>
     </div>
        <div class="content" >
        <div class="row" style="width:100%;">
            <div class="col-xs-8">
                <div class="form-group">
                    <small>Lahir : {{ $candidate->born }}</small> 
                    <br>
                    <small> VISI : {{ $candidate->visi }} </small>
                    <br>
                     <small>MISI : {{ $candidate->misi }}</small>
                    <br>
                    <small>Alamat : {{ $candidate->address }}</small>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <div class="image">
                        <center>
                        <img class="avatar border-gray" src="{{ asset('uploads/images/' . $candidate->id . '/' . $candidate->image) }}" alt="..."/ width="100%">
                        <h4 class="title">{{ $candidate->name }}<br /></h4>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

@stop