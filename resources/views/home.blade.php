@extends('admin.dashboard')

@section('content')
<div class="container-fluid "style="margin-top:50px">
  <div class="row">

      <!-- small box -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3 id="TotalCases"></h3>

            <p class="font-weight-bold">Total Cases</p>
          </div>
          <div class="icon">

          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3 id="NewCases"></h3>

        <p class="font-weight-bold">New Cases</p>
      </div>
      <div class="icon">

      </div>
      <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box    bg-success">
        <div class="inner">
          <h3 id="Recovered"></h3>

          <p class="font-weight-bold">Recovered</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3 id="Deaths"></h3>

          <p class="font-weight-bold">Deaths</p>
        </div>
        <div class="icon">

        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

    <div class="row justify-content-between">
      <div class="col-6">
    <!-- Left col -->

      <!-- Custom tabs (Charts with tabs)-->
      <div class="card mt-4 " style="border-radius:8px;background-color:rgba(248, 249, 250, 0.01)">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Result Diagnostics Stats
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active " id="revenue-chart"
                 style="position: relative; height: 242px;">
                <canvas id="lineChart" height="190" style="height: 247px;"></canvas>
             </div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height:245px;">
              <canvas id="Doughnut" height="150" style="height: 150px;"></canvas>
            </div>
          </div>



        </div>


      <!-- /.card-body -->
      </div>
    </div>
        <div class="col-6">
          <div class="thevirustracker-widget mt-4"  data-ccountryid="MA" data-base="ALLDATA"></div>
        </div>
      </div>




    </div>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}" ></script>
    <script type="text/javascript">
    var getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        callback(null, xhr.response);
      } else {
        callback(status, xhr.response);
      }
    };
    xhr.send();
    };
    getJSON('https://api.covid19api.com/summary',
    function(err, dataGlobal) {
    if (err !== null) {
    alert('Something went wrong: ' + err);
    } else {
    var NewCases =  document.getElementById("NewCases");
    NewCases.innerText =  dataGlobal.Global.NewConfirmed ;
    var NewCases =  document.getElementById("Recovered");
    Recovered.innerText = dataGlobal.Global.TotalRecovered;
    var NewCases =  document.getElementById("TotalCases");
    TotalCases.innerText = dataGlobal.Global.TotalConfirmed ;
    var NewCases =  document.getElementById("Deaths");
    Deaths.innerText = dataGlobal.Global.TotalDeaths ;
    var NewCases =  document.getElementById("LastUpdate");
    LastUpdate.innerText = "Last Update : " + dataGlobal.Countries[0].Date.slice(0,10);
    }
    });





    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new   Chart(ctxL, {
    type: 'line',
    data: {
    labels: [ "March", "April", "May", "June", "July"],
    datasets: [{
    label: "Infected",
    data: [85, 66, 86, 60, 80],
    backgroundColor: [
    'rgba(105, 0, 132, .2)',
    ],
    borderColor: [
    'rgba(200, 99, 132, .7)',
    ],
    borderWidth: 2
    },
    {
    label: "Recovered",
    data: [ 20, 60, 56, 55, 30],
    backgroundColor: [
    'rgba(0, 137, 132, .2)',
    ],
    borderColor: [
    'rgba(0, 10, 130, .7)',
    ],
    borderWidth: 2
    }
    ]
    },
    options: {
    responsive: true
    }
    });
    var ctx = document.getElementById("Doughnut").getContext('2d');

    var data1 = {

        data: {
          labels: ['Negative', 'Positive'],
        datasets: [
          {


            data: [({{$NFiches}}/({{$NFiches}}+{{$PFiches}}))*100,({{$PFiches}}/({{$NFiches}}+{{$PFiches}}))*100],
            backgroundColor: [
              "#007bff",
              "#DC143C",

            ],
            borderColor: [
              "#007bff",
              "#CB252B",
            ],
            borderWidth: [1, 1, 1, 1, 1],

          }
        ],
      }
      };

      var options = {

          responsive: true,
          title: {
            display: true,
            position: "top",
            text: "Test Result",
            fontSize: 18,
            fontColor: "#111",
            },
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  return data['labels'][tooltipItem['index']] +  ':'+data['datasets'][0]['data'][tooltipItem['index']] + '%';
                }
              }
            },

          legend: {
            display: true,
            position: "bottom",
            labels: {
              fontColor: "#333",
              fontSize: 16
            }
          }
        };
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data1.data,
            options: options
        });
    </script>
    <script type="text/javascript" src="https://embed.thevirustracker.com/embed.js"></script>
@endsection
