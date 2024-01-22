<main id="main" class="main">
    <div class="pagetitle">
        <h1>My Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASEURL ?>home/index">Home</a></li>
                <li class="breadcrumb-item active">My Profile</li>


            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section masterdata">
        <div class="row">
            <!-- Start Ngoding Disini -->
            <?= Util::flash() ?>
            <div class="card">

                <div class="card-header">
                    <span class="card-title">Detail User</span>
                </div>
                <form action="<?= BASEURL ?>user/update_profile" method="post" enctype="multipart/form-data">
                <input type="hidden" name="role" value = <?= $data['user']['role_tmu'] ?> >
                <input type="hidden" name="status" value = <?= $data['user']['status_tmu'] ?> >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card col-lg-10">
                                    <div class="card-body d-flex justify-content-center align-items-center px-4 py-4">
                                        <img class="img-fluid" width="412px "
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
                                    <label class="form-label">Nama Lengkap</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="name" name='name' class="form-control"
                                            value="<?= $data['user']['name_tmu'] ?>" disabled>
                                    </div>

                                </div>


                                <label class="form-label mt-2">Nomor Telepon</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="text" id="phone" name="phone_number" class="form-control"
                                            value="<?= $data['user']['phone_number_tmu'] ?>" disabled>
                                    </div>

                                </div>
                                <label class="form-label mt-2">Email</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="text" id="email" name="email" class="form-control"
                                            value="<?= $data['user']['email_tmu'] ?>" disabled>
                                    </div>

                                </div>
                                <label class="form-label mt-2">Role</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" id = "role" disabled>
                                            <option value="ADMIN">Admin</option>
                                            <option value="OWNER">Owner</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="form-label mt-2" for="" id = "passLabel">Password</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="password" name="old_password" id="password" class="form-control" disabled>
                                    </div>
                                    <div class="col-lg-2 ">
                                        <button type="button" class="btn btn-warning col-lg-7" id="passButton"
                                            style="display : none" onclick="setPassword()"><i
                                                class="bx bxs-edit"></i></button>
                                    </div>
                                </div>
                                <div class="col" id = "changePassword" style = "display : none">
                                    <label class="form-label mt-2" for="">Password Baru</label>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <input type="password" name="new_password" id="newPassword" class="form-control " disabled >
                                        </div>
                                    </div>

                                    <label class="form-label mt-2" for="">Konfirmasi</label>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <input type="password" name="confirm" id="confirm" class="form-control" disabled >
                                        </div>
                                        <div class="col-lg-2" style = "display : none;" id = "check">
                                                <button type = "button" class = "btn text-success fw-bold" style = "border:transparent;" disabled>
                                                    <i class = "bi bi-check-lg "></i>
                                                </button>
                                            
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?= $data['user']['id_user_tmu'] ?>">

                                <button type="submit" class="btn btn-success col-lg-3 mt-4 " style="display : none;"
                                    id="submit">Simpan Perubahan</button>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-warning col-lg-7  d-flex justify-content-center" onclick="removeAttr()"><i
                                        class="bx bxs-edit"></i></button>
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
        role.value = '<?= $data['user']['role_tmu'] ?>';

        function removeAttr() {

            var name = document.getElementById('name');
            var phone = document.getElementById('phone');
            var email = document.getElementById('email');
            var passButton = document.getElementById('passButton');
            var imageInput = document.getElementById('imageInput');
            var submit = document.getElementById('submit');
            var changePassword =document.getElementById('changePassword')

            if (name.hasAttribute('disabled')) {
                name.removeAttribute('disabled');
                phone.removeAttribute('disabled');
                email.removeAttribute('disabled');
                imageInput.removeAttribute('disabled');
                submit.style.display = 'block'
                passButton.style.display = 'block'
              
            } else {
                name.setAttribute('disabled', 'true');
                phone.setAttribute('disabled', 'true');
                email.setAttribute('disabled', 'true');
                imageInput.setAttribute('disabled', 'true');
                submit.style.display = 'none';
                passButton.style.display = 'none'
                if (changePassword.style.display == 'block'){
                    setPassword();
                }
            }

        }

        function setPassword() {
            var password = document.getElementById('password');
            var changePassword =document.getElementById('changePassword')
            var passLabel =document.getElementById('passLabel')
            var newPassword =document.getElementById('newPassword');
            var confirm =document.getElementById('confirm')
            if (password.hasAttribute('disabled')) {
                password.removeAttribute('disabled')
                newPassword.removeAttribute('disabled')
                confirm.removeAttribute('disabled')
                changePassword.style.display = 'block'
                passLabel.innerHTML = "Password Lama"
                password.focus()
            } else {
                changePassword.style.display = 'none'
                passLabel.innerHTML = "Password"
                changePassword.setAttribute('disabled', 'true')
                password.setAttribute('disabled', 'true')
                newPassword.setAttribute('disabled', 'true')
                confirm.setAttribute('disabled', 'true')
                password.value = '';
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

        var newPassword =document.getElementById('newPassword');
        var confirm =document.getElementById('confirm')
        var check =document.getElementById('check')

        confirm.addEventListener('input', function ()  {
            if (confirm.value == newPassword.value) {
                check.style.display = 'block';
            }else{
                check.style.display = 'none';
                
            }
            
        })





    </script>