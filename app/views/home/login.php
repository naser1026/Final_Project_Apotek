
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Apotek Havie Farma</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=BASEURL?>img/icon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=BASEURL?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=BASEURL?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=BASEURL?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="<?=BASEURL?>css/style.css" rel="stylesheet">
  <script type="text/javascript" src="./assets/js/jquery.js"></script>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?=BASEURL?>img/logoapotek.png" alt="">
                  <span class="d-none d-lg-block">Havie Farma</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Selamat Datang</h5>
                    <p class="text-center small">Masukan email dan password untuk login</p>
                  </div>
                  
                  <form class="row g-3 needs-validation" action ="<?=BASEURL?>home/validateLogin" method = 'post' novalidate>

                  <div class="col-lg-12">
                    <?php Util::flash()?>
                  </div>

                    <div class="col-12">
                      <label for="userEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="userEmail" required>
                        <div class="invalid-feedback">Masukan Email</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="userPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="userPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class = "input_wrap">
                      <span class = "error_msg" style ="display : none;">Username atau password salah</span>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name = 'submit' id = "submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="<?=BASEURL?>js/main.js"></script>

</body>

</html>