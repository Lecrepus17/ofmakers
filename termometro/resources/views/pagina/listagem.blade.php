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
          <li class="breadcrumb-item active">temperatura</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


<div class="col-12">


    <div class="card ">



      <div class="card-body">
        <h5 class="card-title">Temperatura recente <span>| Hoje</span></h5>
        <div class="form-container">
          <form method="POST" action="{{ route('index') }}">
              @csrf
              <input type="date" name="busca" id="pesquisaData">
              <select name="ord">
                  <option value="desc">Decrescente</option>
                  <option value="asc">Crescente</option>
              </select>
              <input type="submit" value="Pesquisar">
          </form>

          <form method="GET" action="{{ route('index') }}">
              @csrf
              <input type="submit" value="Paginado">
          </form>
      </div>

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
        @if($dados instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $dados->links('vendor.pagination.default') }}
    @endif

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
