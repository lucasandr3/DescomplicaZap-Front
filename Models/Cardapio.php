<?php
namespace Models;

use \Core\Model;

class Cardapio extends Model {

    public function getAll()
    {
        $array = array();
        $sql ="SELECT * FROM acessos as a INNER JOIN usuarios as u on a.id_user = u.id_user";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0) {
           $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function isExists($slug)
    {
        $array = array();
        $sql ="SELECT * FROM companies WHERE slug = :slug";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':slug', $slug);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $store = $sql->fetch(\PDO::FETCH_ASSOC);
            $store['config'] = $this->getConfigStore($store['id']);
            $store['information'] = $this->getInfoStore($store['id']);
            setStore($store);
            return true;
        } else {
            return false;
        }
        // return $array;
    }
    
    public function getConfigStore($id)
    {
        $sql ="SELECT * FROM config_menu WHERE id_company = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
           return $sql->fetch(\PDO::FETCH_ASSOC);
        }
    }

    public function getInfoStore($id)
    {
        $sql ="SELECT * FROM store_info WHERE id_company = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
           return $sql->fetch(\PDO::FETCH_ASSOC);
        }
    }

    public function getCategories($id_company)
    {
        $item = [];
        $sql ="SELECT id, name_category, cover_category FROM categories WHERE id_company = :id_company AND category_status = :ois";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_company', $id_company);
        $sql->bindValue(':ois', 'ACTIVE');
        $sql->execute();
        $items = $sql->fetchAll(\PDO::FETCH_ASSOC);

        return $items;
    }

    public function getProductOptions($id_company)
    {
        $options = [];
        $sql ="SELECT * FROM products WHERE id_company = :id_company";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        

        if($sql->rowCount() > 0) {
            $options = $sql->fetchAll(\PDO::FETCH_ASSOC);
            //$options[$key]['options'] = $this->getCategoryOptions('4,5', $id_company);
    
            //dd($options);
            $ids = [];
            foreach ($options as $key => $id_value) {
                $ids[$key] = $id_value['id'];
                $options[$key]['options'] = [];
            }
            
            // foreach ($options as $key => $value) {
                $categories = $this->getCategoryOptions(implode(',',$ids), $id_company);
                foreach ($categories as $value) {
                    
                    $id_product_categories = explode(',',$value['id_product']);
                    //$d = array_intersect_assoc($id_product_categories, $ids);
                   //$d = array_diff_assoc($id_product_categories, $ids);
                    // $cat_op = [];
                    
                    // if(in_array($ids,$id_product_categories)) {
                    //     dd('tem');
                    // } else {
                    //     dd('diferente');
                    // }
                  // dd(array_diff_assoc($id_product_categories, $ids));
                    foreach ($ids as $key => $id_verify) {
                           
                        if($options[$key]['id'] === $id_verify) {
                            
                            $options[$key]['options'] = $categories;
                        }
                    }
                    // if(in_array($ids, $id_product_categories)) {
                    //     dd('aqui');
                    // }
                    //dd($options);
                }
           // dde($options);
            // }
        }

        return $options;
    }

    public function getCategoryOptions($ids, $id_company)
    {
        
        $sql ="SELECT id, id_product, name_option FROM options_product WHERE id_product IN(".$ids.") AND id_company = :id_company AND option_status = :stopen";
        $sql = $this->db->prepare($sql);
        //$sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->bindValue(':stopen', "ACTIVE");
        $sql->execute();
        $categories = $sql->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($categories as $key => $value) {
            $categories[$key]['options_categorie_item'] = $this->getCOptions($value['id'], $id_company);
        }
//  dde($categories);
        return $categories;
    }

    public function getCOptions($id, $id_company)
    {
        $sql ="SELECT name_option_item, price_option_item, option_item_status FROM options_product_item WHERE id_option_product = :id AND id_company = :id_company AND option_item_status = :ois";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->bindValue(':ois', 'ACTIVE');
        $sql->execute();
        $items = $sql->fetchAll(\PDO::FETCH_ASSOC);

        return $items;
    }

    public function getMenu($id_company)
    {
        $categories = [];
        $sql ="SELECT id, name_category, cover_category FROM categories WHERE id_company = :id_company AND category_status = 'ACTIVE'";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        

        if($sql->rowCount() > 0) {
            $categories = $sql->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($categories as $key => $value) {
                $categories[$key]['products'] = $this->getProductsCategories($value['name_category'], $id_company);
                // $options[$key]['teste'] = $this->getOptions($value['id_product']);
            }
        }
        
        return $categories;
    }

    public function getProductsCategories($name_category, $id_company)
    {
        $sql ="SELECT * FROM products WHERE category = :category AND id_company = :id_company AND status = 'PACTIVE'";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':category', $name_category);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        $products = $sql->fetchAll(\PDO::FETCH_ASSOC);
 
        return $products;
    }

    public function getConfig($id_company)
    {
        $sql ="SELECT * FROM config_menu WHERE id_company = :id_company";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        return $config = $sql->fetch(\PDO::FETCH_ASSOC);
    }


    public function SearchProducts($company, $v)
	{
//         echo "<pre>";
// print_r($company);
// exit;
        // if(getStore()->information['id_company'] == $id_company) {
        //     echo "igual";
        //     exit;
        // } else {
        //     echo "diferente";
        //     exit;
        // }

		$sql = $this->db->prepare("SELECT * FROM products WHERE name_product LIKE :name_product AND id_company = :id_company");
		$sql->bindValue(':name_product', '%'.$v.'%');
		$sql->bindValue(':id_company', $company);
		$sql->execute();
		return $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
	}

    public function getBairros($id_company)
    {
        $bairros = [];
        $sql ="SELECT nome_bairro, taxa_entrega FROM bairros WHERE id_company = :id_company";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        $bairros = $sql->fetchAll(\PDO::FETCH_ASSOC);

        return $bairros;
    }

    public function newPedido($companie, $namecompany, $order_object, $order_address, $total_order, $subtotal_order, $delivery, $tip, $payment, $date_order)
    {
        $sql ="INSERT INTO orders SET id_company = :idc, name_company = :namec, order_object = :odb, order_address = :oda, total_order = :total_order,
        subtotal_order = :sbt, delivery = :d, tip = :t, payment = :pay, date_order = :dtor";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':idc', $companie);
        $sql->bindValue(':namec', $namecompany);
        $sql->bindValue(':odb', $order_object);
        $sql->bindValue(':oda', $order_address);
        $sql->bindValue(':total_order', $total_order);
        $sql->bindValue(':sbt', $subtotal_order);
        $sql->bindValue(':d', $delivery);
        $sql->bindValue(':t', $tip);
        $sql->bindValue(':pay', $payment);
        $sql->bindValue(':dtor', $date_order);
        $sql->execute();

        if($sql->rowCount() > 0) {

//            $idcat = 6;
//            $descricao = 'Pedidos';
//            $conta = 'Empresa';
//            $id_pedido = $this->db->lastInsertId();
//
//            $sqle ="INSERT INTO receita SET id_cat = :ic, descricao = :d, valor = :v, data_d = :dt, conta = :ct, id_pedido = :i";
//            $sqle = $this->db->prepare($sqle);
//            $sqle->bindValue(':ic', $idcat);
//            $sqle->bindValue(':d', $descricao);
//            $sqle->bindValue(':v', $total);
//            $sqle->bindValue(':dt', $data);
//            $sqle->bindValue(':ct', $conta);
//            $sqle->bindValue(':i', $id_pedido);
//            $sqle->execute();
//
//            foreach (json_decode($ids) as $value) {
//                $sqlm ="INSERT INTO mais_vendidos SET id_prod = :id_prod, qt_prod = :qt_prod, id_pedido = :id";
//                $sqlm = $this->db->prepare($sqlm);
//                $sqlm->bindValue(':id_prod', $value->id);
//                $sqlm->bindValue(':qt_prod', $value->qt);
//                $sqlm->bindValue(':id', $id_pedido);
//                $sqlm->execute();
//            }
            $_SESSION['pedido_client_new'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }
    
    public function changeLayout($company, $layout)
    {
        $sql = "UPDATE config_menu SET view_products = :vp WHERE id_company = :c";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':vp', $layout);
        $sql->bindValue(':c', $company);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getOrder($id)
    {
        $sql ="SELECT * FROM orders WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        

        if($sql->rowCount() > 0) {
            
            return arrayToObj($sql->fetch(\PDO::FETCH_ASSOC));
        }
    }
}