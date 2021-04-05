@extends('adminLTE.master')
@section('content')
<div class="card bg-light mt-3 ml-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/pertanyaan')}}">Pertanyaan</a></li>
      <li class="breadcrumb-item">Show</li>
    </ol>
  </nav>
  <div class="card-header text-muted border-bottom-0">
    Pertanyaan 
  </div>
  <div class="card-body pt-0">
    <div class="row">
      <div class="col-7">
      <h2 id = "judul"><strong>{{$pertanyaan->judul}}</strong></h2>
      <p class="text-muted text-sm" id="isi">{{$pertanyaan->isi}}</p>
      </div>
      
    </div>
  </div>
</div>
@endsection