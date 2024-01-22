<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item active">Master User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
        <div class="row">
            <!-- Start Ngoding Disini -->
            <?= Util::flash() ?>
            <div class="col-lg-2 my-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah
                    User</button>
            </div>
            <div class="card ms-2">
                <div class="card-header">
                    <span class="card-title">Daftar User</span>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">ROLE</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">STATUS AKUN</th>
                                <th class="text-center">MENU</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data['users'] as $row):

                                $no++; ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['role_tmu'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['email_tmu'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['name_tmu'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= strtolower($row['status_tmu']) ?>
                                    </td>
                                    <td class="text-center" width="20%">
                                        <a href="<?= BASEURL ?>user/detail/<?= $row['id_user_tmu'] ?>"
                                            class="btn btn-warning"><i class="bx  bx-detail"></i></a>
                                    </td>


                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Ngoding Disini -->
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL ?>user/addUser" method="post" enctype="multipart/form-data">
                        <label class="form-label mt-2">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" required>
                        <label class="form-label mt-2">Email</label>
                        <input type="email" class="form-control" name="email" required>
                        <label class="form-label mt-2">No Telepon</label>
                        <input type="text" class="form-control" name="phone_number" required>
                        <label class="form-label mt-2">Password</label>
                        <div class = "row">
                            <div class = "col-lg-11">
                                <input type="password" id = "password" class="form-control col-lg-10" name="password" required>
                            </div>
                        <button type = "button"onclick= "togglePassword()" class = "btn col-lg-1"><i class = "bi bi-eye-fill"></i></button>
                        </div>
                        <label class="form-label mt-2">Role</label>
                        <select name="role" class="form-control" required>
                            <option selected disabled>Pilih role</option>
                            <option value="ADMIN">Admin</option>
                            <option value="OWNER">Owner</option>
                        </select>
                        <label class="form-label mt-2">Foto Profil</label>
                        <input type="file" class="form-control" name="img"  id="inputImage">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambahkan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
  <script>
    function togglePassword() {
      var passwordInput = document.getElementById("password");
      
      // Periksa tipe input
      if (passwordInput.type === "password") {
        // Jika tipe adalah password, ubah menjadi teks
        passwordInput.type = "text";
      } else {
        // Jika tipe adalah teks, ubah menjadi password
        passwordInput.type = "password";
      }
    }
  </script>
