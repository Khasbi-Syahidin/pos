<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/modules/jquery-selectric/selectric.css">



  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include('../components/layout/navbar.php'); ?>

      <?php include('../components/layout/sidebar.php'); ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ganti Password</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Hi, Admin!</h2>
            <p class="section-lead">
              Ganti Pasword kamu dengan aman
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5 p-2 d-flex justify-content-center align-items-center">
                <div class="">
                  <img src="../assets/img/illustrations/fastfood.png" style="width: 300px;" alt="">
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-6">
                <div class="card profile-widget">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Ganti Password</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-12">
                          <label>Password Lama</label>
                          <input type="password" class="form-control" value="Ujang" required="">
                          <div class="invalid-feedback">
                            Please fill this input
                          </div>
                        </div>
                        <div class="form-group col-12">
                          <label>Password Baru</label>
                          <input type="password" class="form-control" value="Ujang" required="">
                          <div class="invalid-feedback">
                            Please fill this input
                          </div>
                        </div>
                        <div class="form-group col-12">
                          <label>Konfirmasi Password Baru</label>
                          <input type="password" class="form-control" value="Ujang" required="">
                          <div class="invalid-feedback">
                            Please fill this input
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('../components/layout/footer.php'); ?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

</html>