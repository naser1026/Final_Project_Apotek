<main id="main" class="main">
    <div class="pagetitle">
        <h1>Master User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>user/index">Master User</a></li>
                <li class="breadcrumb-item active">
                    <?= $data['user']['name_tmu'] ?>
                </li>


            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
        <div class="row">
            <!-- Start Ngoding Disini -->
            <?=Util::flash()?>
            <div class="card">

                <div class="card-header">
                    <span class="card-title">Detail User</span>
                </div>
                <form action="<?= BASEURL ?>user/user_edit" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card col-lg-10">
                                    <div class="card-body d-flex justify-content-center align-items-center px-4 py-4">
                                        <img class="img-fluid" width="400px "
                                            src="<?= BASEURL ?>img/profile/<?= $data['user']['img_tmu'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-10 mt-3">
                                    <label class="form-label mt-3">Ubah Foto Profil</label>
                                    <input class="form-control" type="file" id="imageInput" name="img" accept="image/*"
                                        onchange="validateImage()" disabled>
                                    </br>
                                    <span id="errorMessage" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="row">
                                    <label class="form-label mt-3">Nama Lengkap</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="name" name='name' class="form-control"
                                            value="<?= $data['user']['name_tmu'] ?>" disabled>
                                    </div>

                                </div>


                                <label class="form-label mt-3">Nomor Telepon</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="text" id="phone" name="phone_number" class="form-control"
                                            value="<?= $data['user']['phone_number_tmu'] ?>" disabled>
                                    </div>

                                </div>
                                <label class="form-label">Email</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="text" id="email" name="email" class="form-control"
                                            value="<?= $data['user']['email_tmu'] ?>" disabled>
                                    </div>

                                </div>
                                <label class="form-label mt-3">Role</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" id="role" name="role" disabled>
                                            <option value="ADMIN">Admin</option>
                                            <option value="OWNER">Owner</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="form-label mt-3">Status</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" id="status" name="status" disabled>
                                            <option value="ACTIVE">Aktif</option>
                                            <option value="NONACTIVE">Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="form-label mt-3" for="">Password Baru</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="password" name="password" id="password"  class="form-control" disabled>
                                    </div>
                                    <div class="row col-lg-2">
                                    <button type="button" class="btn col-lg-6" id = "showPass" style="display : none" onclick="togglePassword()"><i
                                        class="bi bi-eye-fill"></i></button>
                                    <button type="button" class="btn btn-warning col-lg-6" id = "passButton" style="display : none" onclick="setPassword()"><i
                                        class="bx bxs-edit"></i></button>
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?= $data['user']['id_user_tmu'] ?>">

                                <button type="submit" class="btn btn-success col-lg-3 mt-4 " style="display : none;"
                                    id="submit">Simpan Perubahan</button>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <button type="button" class="btn btn-warning col-lg-3" onclick="removeAttr()"><i
                                        class="bx bxs-edit"></i></button>
                                <a class="btn btn-danger col-lg-3" href = "<?=BASEURL?>user/user_delete/<?=$data['user']['id_user_tmu']?>" onclick = "confirm('Hapus <?=$data['user']['name_tmu']?>')"><i class="bi bi-trash"></i></a>
                            </div>

                        </div>
                    </div>
                    <hr>

                </form>
            </div>
            <!-- End Ngoding Disini -->

        </div>
    </section>

    <script>

        var role = document.getElementById('role');
        var status_user = document.getElementById('status');
        status_user.value = '<?= $data['user']['status_tmu'] ?>';
        role.value = '<?= $data['user']['role_tmu'] ?>';

        function removeAttr() {

            var name = document.getElementById('name');
            var phone = document.getElementById('phone');
            var email = document.getElementById('email');
            var role = document.getElementById('role');
            var status = document.getElementById('status');
            var passButton = document.getElementById('passButton');
            var imageInput = document.getElementById('imageInput');
            var submit = document.getElementById('submit');

            if(name.hasAttribute('disabled')){
                name.removeAttribute('disabled');
                phone.removeAttribute('disabled');
                email.removeAttribute('disabled');
                role.removeAttribute('disabled');
                status.removeAttribute('disabled');
                imageInput.removeAttribute('disabled');
                submit.style.display = 'block'
                passButton.style.display = 'block'
            }else {
                name.setAttribute('disabled', 'true');
                phone.setAttribute('disabled', 'true');
                email.setAttribute('disabled', 'true');
                role.setAttribute('disabled', 'true');
                status.setAttribute('disabled', 'true');
                imageInput.setAttribute('disabled', 'true');  
                submit.style.display = 'none';
                passButton.style.display = 'none'
            }

        }

        function setPassword() 
        {
            var password =document.getElementById('password');
            var showPass = document.getElementById('showPass');
            if(password.hasAttribute('disabled'))
            {
                password.removeAttribute('disabled')
                showPass.style.display = 'block';
                password.focus()
            }else {
            password.setAttribute('disabled', 'true')
            password.value = '';
            showPass.style.display = 'none';
            }
        }

        function validateImage() {
            var fileInput = document.getElementById('imageInput');
            var errorMessage = document.getElementById('errorMessage');

            // Reset error message
            errorMessage.textContent = '';

            // Check if a file is selected
            if (fileInput.files.length === 0) {
                errorMessage.textContent = 'Masukan file bertipe gambar.';
                return;
            }

            // Check the file type
            var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (allowedTypes.indexOf(fileInput.files[0].type) === -1) {
                errorMessage.textContent = 'Invalid file type. Masukan file bertipe gambar.';
                fileInput.value = ''; // Clear the file input
                return;
            }
        }
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