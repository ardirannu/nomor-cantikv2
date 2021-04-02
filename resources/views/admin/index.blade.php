@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@section('header')
    Dashboard
@endsection 

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-sim-card"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Nomor</h4>
          </div>
          <div class="card-body">
            {{ $data_nomor }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-sim-card"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Penjualan</h4>
          </div>
          <div class="card-body">
            {{ $nomor_terjual }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Penjualan (Rp)</h4>
          </div>
          <div class="card-body">
            {{ $penjualan_rupiah }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pelanggan</h4>
          </div>
          <div class="card-body">
            {{ $pelanggan }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

 