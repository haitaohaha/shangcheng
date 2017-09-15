@extends('seller.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <small>
          @if(session('info'))
            <p class="text-info">{{ session('info') }}</p>
          @endif
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>

    <div  style="width:300px"> 
      <img src="{{ asset('./images/6.jpg') }}" alt="">
    </div>



@endsection