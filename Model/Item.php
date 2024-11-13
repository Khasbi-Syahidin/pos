<?php

require_once __DIR__ . '/Model.php';

class Item extends Model
{

    protected $table = 'items';

    public function create($datas)
    {
        var_dump($datas["files"]);
        $nama_file = $datas["files"]["attachment"]["name"];
        $tmp_name = $datas["files"]["attachment"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'heic', 'raw'];
        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "Ekstensi file tidak sesuai";
        }
        if ($datas["files"]["attachment"]["size"]  > 5000000) {
            return "Size file tidak boleh lebih dari 5MB";
        }
        $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "../public/img/items/" . $nama_file);
        $datas = [
            "name_item" => $datas["post"]["name_item"],
            "attachment" => $nama_file,
            "price" => $datas["post"]["price"],
            "category_id" => $datas["post"]["category_id"],
        ];
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

    public function search($keyword)
    {
        $keyword = " WHERE name LIKE '%{$keyword}%'";
        return parent::search_data($keyword, $this->table);
    }

    public function paginate($start, $limit)
    {
       return parent::paginate_data($start, $limit, $this->table);
    }


    public function all2($start, $limit)
    {
        $query = "SELECT * FROM items INNER JOIN categories ON items.category_id = categories.id_category LIMIT $start, $limit;";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }
}
