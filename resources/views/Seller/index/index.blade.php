@extends('seller.layout')


@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

        <small>
          @if(session('info'))
            <p class="text-info">{{ session('info') }}</p>
          @endif
        </small>
      </h1>

    </section>



@endsection