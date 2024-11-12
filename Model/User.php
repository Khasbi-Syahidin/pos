<?php

require_once __DIR__ . '/Model.php';

class User extends Model
{
    protected $table = 'users';
    public function create($datas)
    {
        return parent::create_data($datas, $this->table);
    }

    public function all()
    {
        return parent::all_data($this->table);
    }

    public function find($id)
    {
        return parent::find_data($id, $this->table);
    }

    public function update($id, $datas)
    {
        return parent::update_data($id, $datas, $this->table);
    }

    public function delete($id)
    {
        return parent::delete_data($id, $this->table);
    }


    public function register($datas)
    {
        $email = $datas['post']['email'];
        $name = $datas['post']['full_name'];
        $password = $datas['post']['password'];
        $gender = $datas['post']['gender'];

        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) > 0) {
            return "Email sudah terdaftar";
        }

        $nama_file = $datas["files"]["avatar"]["name"];
        $tmp_name = $datas["files"]["avatar"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'heic', 'raw'];
        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "Ekstensi file tidak sesuai";
        }
        if ($datas["files"]["avatar"]["size"]  > 5000000) {
            return "Size file tidak boleh lebih dari 5MB";
        }
        $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "../public/img/users/" . $nama_file);

        $password = base64_encode($password);
        $query_register = "INSERT INTO {$this->table} (name, email, password, avatar, gender) VALUES ('$name', '$email', '$password', '$nama_file', '$gender')";
        $result = mysqli_query($this->db, $query_register);

        if (!$result) {
            return "Register gagal";
        }
        $_SESSION['full_name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['avatar'] = $nama_file;

        $detail_user = [
            'full_name' =>  $name,
            'email' => $email,
            'avatar' => $nama_file
        ];
        return $detail_user;
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) == 0) {
            return "User tidak ditemukan";
        }

        $user = mysqli_fetch_assoc($result);
        if (base64_decode($user['password'], false) == $password) {
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['avatar'] = $user['avatar'];

            $detail_user = [
                'full_name' => $user['full_name'],
                'email' => $user['email'],
                'avatar' => $user['avatar']
            ];
            return $detail_user;
        } else {
            return "Password salah";
        }
    }

    public function logout()
    {
        session_destroy();
        return "Logout berhasil";
    }
}
