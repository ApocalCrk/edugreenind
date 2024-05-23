@extends('_admin.slicing.main')

@section('title', 'Dashboard | Edu Green')

@section('content')
@php
  $start = microtime(true);
@endphp
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/{{explode('/', $_SERVER['REQUEST_URI'])[1]}}">Beranda</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">

          <!-- Gabut -->
          <style>
            .rotate-cog {
              animation: rotate 1s linear infinite;
            }
            @keyframes rotate{
              0% {
                transform: rotate(0deg);
              }
              100%{
                transform: rotate(360deg);
              }
            }
          </style>
          <!-- end Gabut -->
          
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog rotate-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Web Generate</span>
              <span class="info-box-number">
                @php
                  $finish = microtime(true);
								  echo round(($finish - $start) * 1000, 2).'<small>ms</small>'; 
                @endphp
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Visitor</span>
              <span class="info-box-number">{{ $kunjungan }}</span>
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
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-table"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="/admin/agenda" style="color: #000">Post</a></span>
              <span class="info-box-number">{{ $post }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-copy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="/admin/agenda" style="color: #000">Agenda / Kegiatan</a></span>
              <span class="info-box-number">{{ $agenda }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Visitor Report</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                <p class="text-center">
                  <strong>Daily Visitor Report</strong>
                </p>
                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="kunjungan" height="180" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Monthly Visitor Report</strong>
                  </p>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Month</th>
                        <th>Hits</th>
                      </tr>
                    </thead>
                    <tbody>
                       @php $arraye = array_combine($data_month['label'], $data_month['data']); @endphp
                       @foreach($arraye as $key => $value)
                        <tr>
                          <td>{{$key}}</td>
                          <td>{{$value}}</td>
                        </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
$(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#kunjungan");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Visitor Count",
            data: cData.data,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "line",
        data: data,
        options: options
      });
 
});
</script>
@php
$finish = microtime(true);
@endphp
@endsection