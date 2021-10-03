@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>Selamat datang, <span class="text-warning">{{Auth::user()->name}}</span>!</h5>
          
        </div>
        <!-- Info boxes -->
        <div class="row">
           
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Users</span>
                        <span class="info-box-number">{{$user}}</span>
                    </div>
                  <!-- /.info-box-content -->
                </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cogs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total LED</span>
                        <span class="info-box-number">{{$led}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cogs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total LKPS</span>
                        <span class="info-box-number">{{$lkps}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
