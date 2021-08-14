<?php
namespace Models;

use \Core\Model;

class Item extends Model {

    public function getItens()
    {
        $array = [];

        // $sql ="SELECT * FROM product_options as po INNER JOIN category_option as co ON(po.id_category_option = co.id_category_option) INNER JOIN products as p ON(po.id_product = p.id_product) ORDER BY co.category_name_option";
        $sql ="SELECT
            po.id_option,
            po.name_option,
            po.price_option,
            po.available,
            co.id_category_option,
            co.category_name_option,
            p.name_product,
            p.id_product
            FROM product_options as po INNER JOIN category_option as co ON(po.id_category_option = co.id_category_option) INNER JOIN products as p ON(po.id_product = p.id_product)";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function getItemId($id)
    {
        $array = [];

        // $sql ="SELECT * FROM product_options as po INNER JOIN category_option as co ON(po.id_category_option = co.id_category_option) INNER JOIN products as p ON(po.id_product = p.id_product) ORDER BY co.category_name_option";
        $sql ="SELECT
            po.id_option,
            po.name_option,
            po.price_option,
            po.available,
            co.id_category_option,
            co.category_name_option,
            p.name_product,
            p.id_product
            FROM product_options as po INNER JOIN category_option as co ON(po.id_category_option = co.id_category_option) INNER JOIN products as p ON(po.id_product = p.id_product) WHERE po.id_option = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function saveItem($nome, $id_category, $id_product, $price_option, $available)
    {
        $sql ="INSERT INTO product_options SET id_category_option = :ico, id_product = :id, name_option = :n, price_option = :po, available = :a";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':ico', $id_category);
        $sql->bindValue(':id', $id_product);
        $sql->bindValue(':n', $nome);
        $sql->bindValue(':po', $price_option);
        $sql->bindValue(':a', $available);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;>
									<< class="fa fa-times"></>
									</button>
									<span>
									<b> Sucesso - </b> Item cadastrado com sucesso!</span>
								  </div>';
        } else {
            $_SESSION['alert'] = '<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;>
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Erro - </b> Algo deu errado tente novamente!</span>
								  </div>';
        }
    }

    public function editItem($nome, $id_category, $id_product, $price_option, $id_option, $status)
    {
        $sql ="UPDATE product_options SET id_category_option = :ico, id_product = :id, name_option = :n, price_option = :po, available = :s WHERE id_option = :idp";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':ico', $id_category);
        $sql->bindValue(':id', $id_product);
        $sql->bindValue(':n', $nome);
        $sql->bindValue(':po', $price_option);
        $sql->bindValue(':s', $status);
        $sql->bindValue(':idp', $id_option);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;>
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Item Editado com sucesso!</span>
								  </div>';
        } else {
            $_SESSION['alert'] = '<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;>
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Erro - </b> Algo deu errado tente novamente!</span>
								  </div>';
        }
    }

    public function active($id_option)
    {
        $new_status = 0;
        $sql ="UPDATE product_options SET available = :a WHERE id_option = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':a', $new_status);
        $sql->bindValue(':id', $id_option);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inactive($id_option)
    {
        $new_status = 1;
        $sql ="UPDATE product_options SET available = :a WHERE id_option = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':a', $new_status);
        $sql->bindValue(':id', $id_option);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delItem($id)
	{
		$sql ="DELETE FROM product_options WHERE id_option = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
            $_SESSION['alert'] = '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:10px;">
									<i class="fa fa-times"></i>
									</button>
									<span>
									<b> Sucesso - </b> Item apagado com sucesso!</span>
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
}