<?php
    require_once("..\config\conexion.php");
    require_once("..\models\Producto.php");
    //se llaman los required cuando vamos a necesitar clases-metodos que creamos alli, para evitar la molestia de volver a crear ese codigo que ya esta hecho en otra parte es mejor instanciarlo, para que fluya el proceso y evitar tanto codigo que ya ha sido creado 

    $producto = new Producto();

    switch ($_GET["op"]) {
        
        case "listar":
            
            $datos=$producto->get_product();
            $data=Array();

            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["name"];
                $sub_array[] = '<button type="button" onClick="edit('.$row["product_id"].');" id="'.$row["product_id"].'" class="btn btn-outline-info" /><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="delete('.$row["product_id"].');" id="'.$row["product_id"].'" class="btn btn-outline-info" /><div><i class="fa fa-edit"></i></div></button>';

            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);

            echo json_encode($results);
            
        break;
        
        
    }
    

?>