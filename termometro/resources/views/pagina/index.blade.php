<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->









    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Estação metereológica</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Estação metereológica</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
        if ({{$tempMaxToday}} >= 13) {
          $('#temperature-icon').removeClass('bi-thermometer-snow').addClass('bi-thermometer-sun');
        } else {
          $('#temperature-icon').removeClass('bi-thermometer-sun').addClass('bi-thermometer-snow');
        }
        break;
      case 'media':
        // Atualizar valores para o caso "media"
        $('#temperature-value').text('{{$tempAvgToday}} °C');
        if ({{$tempAvgToday}} >= 13) {
          $('#temperature-icon').removeClass('bi-thermometer-snow').addClass('bi-thermometer-sun');
        } else {
          $('#temperature-icon').removeClass('bi-thermometer-sun').addClass('bi-thermometer-snow');
        }
        break;
      case 'menor':
        // Atualizar valores para o caso "menor"
        $('#temperature-value').text('{{$tempMinToday}} °C');
        if ({{$tempMinToday}} >= 13) {
          $('#temperature-icon').removeClass('bi-thermometer-snow').addClass('bi-thermometer-sun');
        } else {
          $('#temperature-icon').removeClass('bi-thermometer-sun').addClass('bi-thermometer-snow');
        }
        break;
    }



    var option2 = $(this).data('target2');
    $('#filtroOp2').text(option2);

    switch (option2) {
      case 'maior':
        $('#tempMonth').text('{{$tempMaxMonth}} °C');
      break;

      case 'menor':
        $('#tempMonth').text('{{$tempMinMonth}} °C');
      break;

      case 'media':
        $('#tempMonth').text('{{$tempAvgMonth}} °C');

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
                        <h6>Filter</h6>
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
                        <span class="text-success small pt-1 fw-bold">16%</span>
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
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#" data-target2="maior">Maior</a></li>
                      <li><a class="dropdown-item" href="#" data-target2="menor">Menor</a></li>
                      <li><a class="dropdown-item" href="#" data-target2="media">Média</a></li>
                  </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Temperatura do Mês <span>| <span id="filtroOp2">Maior</span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i id="caldendar" class="bi bi-calendar"></i>
                      </div>

                    <div class="ps-3">
                      <h6 id="tempMonth" class="tempMonth">{{$tempMaxMonth}} °C</h6>
                      <span class="text-success small pt-1 fw-bold">17%</span> <span class="text-muted small pt-2 ps-1">Umidade</span>

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
                      <i class="bi bi-thermometer-sun"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{!! json_encode($temperaturaNow) !!}°C</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">Umidade</span>

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
        <h5 class="card-title">Gráfico<span>/Hoje</span></h5>

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
        <h5 class="card-title">Line Chart</h5>

        <!-- Line Chart -->
        <div id="lineChart"></div>

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





            <!-- Recent Sales -->
            <div class="col-12">


              <div class="card ">



                <div class="card-body">
                  <h5 class="card-title">Temperatura recente <span>| Hoje</span></h5>
                    <form method="POST" action="{{ route('index') }}">
                        @csrf
                        <input type="date" name="busca" id="pesquisaData">
                        <select name="ord">
                            <option value="desc">Decrescente</option>
                            <option value="asc">Crescente</option>
                        </select>
                        <input type="submit" placeholder="Pesquisar">
                    </form>
                  <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Temperatura</th>
                        <th scope="col">Umidade</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $dado)
                            <tr>
                                <th scope="row"><a href="#">{{ $dado->id }}</a></th>
                                <td>{{ $dado->temperatura }} ºC</td>
                                <td>{{ $dado->umidade }}%</td>
                                <td>{{ $dado->tempo }}</td>
                                <td>
                                    <a href="{{ route('delete', ['dado' => $dado->id]) }}" class="delete-button" id="deleteButton{{$dado->id}}">
                                        <span class="badge bg-danger">Apagar</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->

          </div>
        </div><!-- End Left side columns -->



      </div>
    </section>

<!-- Script para lidar com a janela de confirmação -->
<!-- Inclua as bibliotecas necessárias -->
<script src="{{ asset('assets/js/sweetalert.all.js') }}"></script>
<!-- Seus scripts -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Coloque suas interações do SweetAlert aqui
        const deleteButtons = document.querySelectorAll(".delete-button");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function(event) {
                event.preventDefault();

                Swal.fire({
                    title: "Você tem certeza?",
                    text: "Esta ação não pode ser desfeita!",
                    icon: "warning",
                    showCancelButton: true, // Mostrar o botão "Cancelar"
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Confirmar",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = this.getAttribute('href');
                    } else {
                        Swal.fire("Operação cancelada!", "", "info");
                    }
                });
            });
        });
    });
</script>

Ao adicionar showCancelButton: true na configuração do Swal.fire, você estará instruindo o SweetAlert a mostrar o botão "Cancelar". Além disso, ajustamos as cores dos botões de confirmação e cancelamento usando confirmButtonColor e cancelButtonColor, respectivamente, e definimos os textos dos botões com confirmButtonText e cancelButtonText.

Essa configuração permitirá que o usuário escolha entre "Cancelar" e "Confirmar". Se o usuário clicar em "Confirmar", a ação será executada, caso contrário, a mensagem "Operação cancelada!" será exibida.


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
