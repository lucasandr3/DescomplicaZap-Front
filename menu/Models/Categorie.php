<?php
namespace Models;

use \Core\Model;

class Categorie extends Model {

    public function all()
    {
        // $sql ="SELECT * FROM categories";
        $sql ="SELECT c.id, c.name_category, c.waiting, c.obs_waiting, c.cover, count(p.name_product) as total_prods FROM categories as c LEFT JOIN products as p ON(c.name_category = p.category) WHERE p.status = 0 GROUP BY c.id";
        $sql = $this->db->query($sql);
        return $categories = $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}