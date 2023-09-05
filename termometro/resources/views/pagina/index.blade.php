<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Estação meteorológica</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/estilo.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">OfMakers</span>
      </a>
    </div><!-- End Logo -->









    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Estação metereológica</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Temperatura</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

$(document).ready(function() {
  $('.dropdown-item').click(function(e) {
    e.preventDefault();


    var option = $(this).data('target');
    $('#filter-option').text(option);

    // Remover a classe do ícone anterior associado ao item de menu selecionado
    $('#temperature-icon').removeClass('bi-thermometer-sun').addClass('bi-thermometer-snow');



    // Atualizar os valores com base na opção selecionada
    switch (option) {
      case 'maior':
        $('#temperature-value').text('{{$tempMaxToday}} °C');
        $('#humidityToday').text('{{$umidMaxToday}} %'); // Update humidity

        if ({{$tempMaxToday}} >= 13) {
          $('#temperature-icon').removeClass('bi-thermometer-snow').addClass('bi-thermometer-sun');
        } else {
          $('#temperature-icon').removeClass('bi-thermometer-sun').addClass('bi-thermometer-snow');
        }
        break;
      case 'media':
        // Atualizar valores para o caso "media"
        $('#temperature-value').text('{{$tempAvgToday}} °C');
        $('#humidityToday').text('{{$umidAvgToday}} %'); // Update humidity

        if ({{$tempAvgToday}} >= 13) {
          $('#temperature-icon').removeClass('bi-thermometer-snow').addClass('bi-thermometer-sun');
        } else {
          $('#temperature-icon').removeClass('bi-thermometer-sun').addClass('bi-thermometer-snow');
        }
        break;
      case 'menor':
        // Atualizar valores para o caso "menor"
        $('#temperature-value').text('{{$tempMinToday}} °C');
        $('#humidityToday').text('{{$umidMinToday}} %'); // Update humidity

        if ({{$tempMinToday}} >= 13) {
          $('#temperature-icon').removeClass('bi-thermometer-snow').addClass('bi-thermometer-sun');
        } else {
          $('#temperature-icon').removeClass('bi-thermometer-sun').addClass('bi-thermometer-snow');
        }
        break;
    }
  });



    $('.dropdown-item-month').click(function(e) {
    e.preventDefault();

    var option2 = $(this).data('target2');
    $('#filtroOp2').text(option2);

    switch (option2) {
      case 'maior':
        $('#tempMonth').text('{{$tempMaxMonth}} °C');
        $('#humidityMonth').text('{{$umidMaxMonth}} %'); // Update humidity
        break;
      case 'menor':
        $('#tempMonth').text('{{$tempMinMonth}} °C');
        $('#humidityMonth').text('{{$umidMinMonth}} %'); // Update humidity
        break;
      case 'media':
        $('#tempMonth').text('{{$tempAvgMonth}} °C');
        $('#humidityMonth').text('{{$umidAvgMonth}} %'); // Update humidity
        break;
    }
  });

});

    </script>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filtro</h6>
                      </li>

                      <li><a class="dropdown-item" href="#" data-target="maior">Maior</a></li>
                      <li><a class="dropdown-item" href="#" data-target="menor">Menor</a></li>
                      <li><a class="dropdown-item" href="#" data-target="media">Média</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">Temperatura de Hoje <span>| <span id="filter-option">Maior</span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i id="temperature-icon" class="bi bi-thermometer-sun"></i>

                      </div>
                      <div class="ps-3">
                        <h6 id="temperature-value" class="temperature-value">{{$tempMaxToday}} °C</h6>
                        <span id="humidityToday" class="text-success small pt-1 fw-bold">{{$umidMaxToday}}%</span>
                        <span class="text-muted small pt-2 ps-1">Umidade</span>
                      </div>
                    </div>

                  </div>


              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtro</h6>
                    </li>

                    <li><a class="dropdown-item-month" href="#" data-target2="maior">Maior</a></li>
                      <li><a class="dropdown-item-month" href="#" data-target2="menor">Menor</a></li>
                      <li><a class="dropdown-item-month" href="#" data-target2="media">Média</a></li>
                  </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Temperatura do Mês <span>| <span id="filtroOp2">Maior</span>  <span>@if ($selectedAnoMes)
                        {{ \Carbon\Carbon::createFromFormat('Y-m', $selectedAnoMes)->format('F Y') }}
                    @else

                    @endif</span>
                        </span>
                        </h5>


                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i id="caldendar" class="bi bi-calendar"></i>
                      </div>


                    <div class="ps-3">
                      <h6 id="tempMonth" class="tempMonth">{{$tempMaxMonth}} °C</h6>
                      <span id="humidityMonth" class="text-success small pt-1 fw-bold">{{$umidMaxMonth}}%</span> <span class="text-muted small pt-2 ps-1">Umidade</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Temperatura atual <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        @if($temperaturaNow < 13)
                        <i class="bi bi-thermometer-snow"></i> <!-- Ícone de neve -->
                    @else
                        <i class="bi bi-thermometer-sun"></i> <!-- Ícone de sol -->
                    @endif
                    </div>
                    <div class="ps-3">
                      <h6>{{$temperaturaNow}}°C</h6>
                      <span class="text-success small pt-1 fw-bold">{{$umidadeNow}}%</span> <span class="text-muted small pt-2 ps-1">Umidade</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

<!-- Reports - Gráfico 1 -->
<div class="col-12">
    <div class="card">

      <!-- ... (código para o filtro) ... -->

      <div class="card-body">
        <h5 class="card-title">Gráfico<span> / Hoje</span></h5>

        <!-- Line Chart 1 -->
        <div id="reportsChart1"></div>
        <script>

            // Variável PHP com os dados de tempo
            var tempoToday = {!! json_encode($today) !!};
            // Função para formatar o tempo no formato desejado
            function formatarTempoParaXAxis(tempo) {
                return tempo.map(function(element) {
                return new Date(element).toISOString();
                });
            }
            // Agora, formatamos a variável tempo para o formato desejado
            var tempoFormatado = formatarTempoParaXAxis(tempoToday);

          document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart1"), {
              series: [{
                name: 'Temperatura',
                data: {!! json_encode($tempToday) !!}
              }, {
                name: 'Umidade',
                data: {!! json_encode($umidToday) !!}
              }],
              chart: {
                height: 350,
                type: 'area',
                toolbar: {
                  show: false
                },
              },
              markers: {
                size: 4
              },
              colors: ['#4154f1', '#2eca6a', '#ff771d'],
              fill: {
                type: "gradient",
                gradient: {
                  shadeIntensity: 1,
                  opacityFrom: 0.3,
                  opacityTo: 0.4,
                  stops: [0, 90, 100]
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'smooth',
                width: 2
              },
              xaxis: {
                type: 'datetime',
                categories: tempoFormatado
              },
              tooltip: {
                x: {
                  format: 'dd/MM/yy HH:mm'
                },
              }
            }).render();
          });
        </script>
        <!-- End Line Chart 1 -->

      </div>

    </div>
  </div><!-- End Reports - Gráfico 1 -->

  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Gráfico<span> / @if ($selectedAnoMes)
            {{ \Carbon\Carbon::createFromFormat('Y-m', $selectedAnoMes)->format('F Y') }}
        @else
            Mês
        @endif</span></h5>


        <!-- Line Chart -->
        <div id="lineChart">
            <form action="{{ route('index') }}" method="post" >
                @csrf
                <div class="select-container">
                    <select name="ano_mes" id="ano_mes" class="select-box">
                        @foreach ($mesesAnos as $mesAno)
                            <option value="{{ $mesAno->ano }}-{{ str_pad($mesAno->mes, 2, '0', STR_PAD_LEFT) }}"
                                @if ($selectedAnoMes === $mesAno->ano . '-' . str_pad($mesAno->mes, 2, '0', STR_PAD_LEFT))
                                selected
                            @endif
                        >



                                {{ $mesAno->ano }} - {{ $mesAno->mes }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="submit-button">Enviar</button>
                </div>
            </form>
        </div>


        <script>

            // Variável PHP com os dados de tempo
            var tempoMonth = {!! json_encode($month) !!};
            // Função para formatar o tempo no formato desejado
            function formatarTempoParaXAxis2(tempo) {
                return tempo.map(function(element) {
                return new Date(element).toISOString();
                });
            }
            // Agora, formatamos a variável tempo para o formato desejado
            var tempoFormatado2 = formatarTempoParaXAxis2(tempoMonth);

          document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#lineChart"), {
              series: [{
                name: "temperaturas",
                data: {!! json_encode($tempMonth) !!}
              }],
              chart: {
                height: 350,
                type: 'line',
                zoom: {
                  enabled: false
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'straight'
              },
              grid: {
                row: {
                  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                  opacity: 0.5
                },
              },
              xaxis: {
                type: 'datetime',
                categories: tempoFormatado2
              },
              tooltip: {
                x: {
                  format: 'dd/MM/yy HH:mm'
                },
              }
            }).render();
          });
        </script>
        <!-- End Line Chart -->

      </div>
    </div>
  </div>






            <!-- Top Selling -->

          </div>
        </div><!-- End Left side columns -->



      </div>
    </section>




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
