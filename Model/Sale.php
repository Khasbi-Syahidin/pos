<?php

require_once __DIR__ . '/Model.php';

class Sale extends Model
{

    protected $table = 'sales';
    protected $primary_key = 'id_sale';
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
        return parent::find_data($id, $this->primary_key, $this->table);
    }

    public function update($id, $datas)
    {
        return parent::update_data($id, $this->primary_key, $datas, $this->table);
    }

    public function delete($id)
    {
        return parent::delete_data($id, $this->primary_key, $this->table);
    }

    public function search($keyword)
    {
        $keyword = " WHERE category_name LIKE '%{$keyword}%'";
        return parent::search_data($keyword, $this->table);
    }

    public function paginate($start, $limit)
    {
        return parent::paginate_data($start, $limit, $this->table);
    }

    public function all2($start, $limit)
    {
        $query = "SELECT sales.id_sale, sales.name_customer, sales.note, sales.status, sales.amount, sales.user_id, sales.created_at_sale, items.id_item, items.name_item, items.attachment, items.price, users.id_user, users.full_name, users.avatar FROM sales 
JOIN pivot_items_sales ON sales.id_sale = pivot_items_sales.sale_id_pivot 
JOIN items ON items.id_item = pivot_items_sales.item_id_pivot 
JOIN users ON users.id_user = sales.user_id LIMIT $start, $limit";

        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }
}
