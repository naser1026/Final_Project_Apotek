<?php

class User_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM tbl_m_user");
        return $this->db->resultSet();
    }

    public function getUser($email, $password)
    {
        $this->db->query("SELECT * FROM tbl_m_user WHERE email_tmu = :email");
        $this->db->bind("email", $email);
        $user = $this->db->single();


        if ($user['status_tmu'] != 'ACTIVE') {
            $_SESSION['login_error'] = "akun anda dinonaktifkan";
            return false;
        }


        if ($this->db->rowCount() > 0) {

            if (password_verify($password, $user["password_tmu"])) {
                $_SESSION['name'] = $user['name_tmu'];
                $_SESSION['role'] = $user['role_tmu'];
                $_SESSION['id_user'] = $user['id_user_tmu'];
                return $user;

            } else {
                $_SESSION['login_error'] = "password salah";
                return false;
            }

        } else {
            $_SESSION['login_error'] = "email tidak terdaftar";
            return false;

        }

    }

    public function userLogout()
    {
        session_unset();
    }

    public function addUser($post, $files)
    {

        $password = password_hash($post['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO tbl_m_user(name_tmu, phone_number_tmu, email_tmu, password_tmu,img_tmu, role_tmu, created_by_tmu, created_date_tmu) 
                    VALUES (:name,:phone_number,:email,:password, :img,:role, :created_by, :created_date)";

        $img = 'default.png';
        if ($files['img']['name'] != '') {
            $img = uniqid() . '_' . $files['img']['name'];
            $upload_dir = "img/profile/";
            $upload_file = $upload_dir . $img;
            move_uploaded_file($files['img']['tmp_name'], $upload_file);

        }
        $this->db->query($query);
        $this->db->bind("password", $password);
        $this->db->bind("name", $post["name"]);
        $this->db->bind("phone_number", $post["phone_number"]);
        $this->db->bind("email", $post["email"]);
        $this->db->bind("img", $img);
        $this->db->bind("role", $post['role']);
        $this->db->bind("created_date", Util::date());
        $this->db->bind("created_by", $_SESSION['name']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM tbl_m_user WHERE id_user_tmu = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function editUser($post, $files)
    {
        $query = "UPDATE tbl_m_user SET name_tmu = :name, phone_number_tmu = :phone, email_tmu = :email, role_tmu = :role, status_tmu = :status, img_tmu = :img, update_by_tmu = :update_by, update_date_tmu = :update_date WHERE id_user_tmu = :id";

        $data = $this->getUserById($post['id']);
        $img = $data['img_tmu'];
        if ($files['img']['name'] != '') {
            $img = uniqid() . '_' . $files['img']['name'];
            $upload_dir = "img/profile/";
            $upload_file = $upload_dir . $img;
            move_uploaded_file($files['img']['tmp_name'], $upload_file);

        }
        $this->db->query($query);
        $this->db->bind('id', $post['id']);
        $this->db->bind('name', $post['name']);
        $this->db->bind('phone', $post['phone_number']);
        $this->db->bind('email', $post['email']);
        $this->db->bind('role', $post['role']);
        $this->db->bind('status', $post['status']);
        $this->db->bind('img', $img);
        $this->db->bind('update_by', $_SESSION['name']);
        $this->db->bind('update_date', Util::date());

        $this->db->execute();

        if (!empty($post['password'])) {
            $query = "UPDATE tbl_m_user SET password_tmu = :password WHERE id_user_tmu = :id";
            $this->db->query($query);
            $this->db->bind('id', $post['id']);
            $this->db->bind('password', password_hash($post['password'], PASSWORD_DEFAULT));
            $this->db->execute();
        }

        if ($data['id_user_tmu'] == $_SESSION['id_user'])
        {
            if ($data['name_tmu'] != $post['name'])
            {
                $_SESSION['name'] = $post['name'];
            }
            if ($post['status'] == 'NONACTIVE')
            {
                $this->userLogout();
            }
            $_SESSION['role'] = $post['role'];
            if ($post['role'] == 'ADMIN')
            {
                header("Location: ".BASEURL."home");
                exit;
            }
        }
        return $this->db->rowCount();
    }

    public function deleteUserById($id)
    {
        $query = "DELETE FROM tbl_m_user WHERE id_user_tmu = :id";
        $this->db->query($query);

        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update_profile($post, $files)
    {
        $user = $this->getUserById($post['id']);
        
        if (isset($post['old_password'])) {
            if ($post['confirm'] != $post['new_password']) {
                $_SESSION['error_massage'] = "Konfirmasi password tidak sesuai";
                return 0;
            }
            if (!password_verify($post['old_password'], $user['password_tmu'])) {
                $_SESSION['error_massage'] = "Password lama tidak sesuai";
                return 0;
            }
            $post['password'] = $post['new_password'];
        }
        if ($post['name'] != $user['name_tmu']){
            unset($_SESSION['name']);
            $_SESSION['name'] = $post['name'];
        }
        return $this->editUser($post, $files);
    }

}