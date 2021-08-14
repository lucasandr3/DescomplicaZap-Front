<?php
namespace Models;

use \Core\Model;

class Menu extends Model {

    public function getAll()
    {
        $sql ="SELECT * FROM products";
        $sql = $this->db->query($sql);
        return $products = $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCategories()
    {
        $array = [];
        $sql ="SELECT * FROM categories";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }
    
    public function getAllCat()
    {
        $sql ="SELECT * FROM products INNER JOIN categories ON products.category = categories.name_category WHERE products.status = 0";
        $sql = $this->db->query($sql);
        return $products = $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function saveProduct($nome, $category, $descricao, $price, $img, $status)
    {
        $sql ="INSERT INTO products SET category = :c, name_product = :np, description = :d, actual_price = :ap, image = :im, status = :s";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':c', $category);
        $sql->bindValue(':np', $nome);
        $sql->bindValue(':d', $descricao);
        $sql->bindValue(':ap', $price);
        $sql->bindValue(':im', $img);
        $sql->bindValue(':s', $status);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Produto cadastrado com sucesso!</span>
								  </div>';
        } else {
            $_SESSION['alert'] = '<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Erro - </b> Algo deu errado tente novamente!</span>
								  </div>';
        }
    }

    public function editProduct($nome, $category, $descricao, $price, $promo, $img=NULL, $status, $id)
    {
        if ($img) {
            
            $sql ="UPDATE products SET category = :c, name_product = :np, description = :d, actual_price = :ap, sale_price = :pr, image = :im, status = :s WHERE id_product = :idp";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':c', $category);
            $sql->bindValue(':np', $nome);
            $sql->bindValue(':d', $descricao);
            $sql->bindValue(':ap', $price);
            $sql->bindValue(':pr', $promo);
            $sql->bindValue(':im', $img);
            $sql->bindValue(':s', $status);
            $sql->bindValue(':idp', $id);
            $sql->execute();

        } else {
            
            $sql ="UPDATE products SET category = :c, name_product = :np, description = :d, actual_price = :ap, sale_price = :pr, status = :s WHERE id_product = :idp";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':c', $category);
            $sql->bindValue(':np', $nome);
            $sql->bindValue(':d', $descricao);
            $sql->bindValue(':ap', $price);
            $sql->bindValue(':pr', $promo);
            $sql->bindValue(':s', $status);
            $sql->bindValue(':idp', $id);
            $sql->execute();
        }
        

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Produto editado com sucesso!</span>
								  </div>';
        } else {
            $_SESSION['alert'] = '<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Erro - </b> Algo deu errado tente novamente!</span>
								  </div>';
        }
    }

    public function active($id_product)
    {
        $new_status = 0;
        $sql ="UPDATE products SET status = :status WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', $new_status);
        $sql->bindValue(':id', $id_product);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inactive($id_product)
    {
        $new_status = 1;
        $sql ="UPDATE products SET status = :status WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':status', $new_status);
        $sql->bindValue(':id', $id_product);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getOptions($id_product)
    {
        $sql ="SELECT
        c.id_category_option,
        c.category_name_option,
        o.id_option,
        o.id_product,
        o.name_option,
        o.price_option,
        o.available
    FROM
        category_option AS c
    LEFT JOIN product_options AS o ON o.id_category_option = c.id_category_option
    WHERE
        c.id_product = :id AND o.available = 0
    GROUP BY
        c.id_category_option,
        c.category_name_option,
        o.id_option,
        o.id_product,
        o.name_option,
        o.price_option";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_product);
        $sql->execute();
        $dados = $sql->fetchAll(\PDO::FETCH_ASSOC); 
        
        $options = [];
        $currentId = 0;
        $prevId = 0;
        $counter = 0;

        // monta o cabeçalho
        foreach ($dados as $key => $value) {
           
            $currentId = $value['id_category_option'];

            if ($currentId !== $prevId) {
                $options[$counter]['id_category_option'] = $value['id_category_option'];
                $options[$counter]['category_name_option'] = $value['category_name_option'];
                $counter++;
            }

            $prevId = $value['id_category_option'];

        }

        // monta os options
        foreach ($dados as $key => $value) {
            
            foreach ($options as $k => $v) {
                if ($value['id_category_option'] === $v['id_category_option']) {
                    $options[$k]['options'][] = $value['name_option'];
                    $options[$k]['price'][] = $value['price_option'];
                    $options[$k]['id_option'][] = $value['id_option'];
                    $options[$k]['available'][] = $value['available'];
                }
            }
        }

        return $options;
        
    }

    public function getProdutoId($id)
    {
        $sql ="SELECT * FROM products WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        return $produto = $sql->fetch(\PDO::FETCH_ASSOC);
    }

}