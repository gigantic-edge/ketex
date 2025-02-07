<?php
include "connection.php";
include "assets/inc/header.php";
include "product_listing.php";
 $ID = $_POST['ID'];


        $result = mysqli_query($conn,"SELECT *  FROM product_details
         INNER JOIN product_category on product_details.cat_id =product_category.cat_id 
         INNER JOIN product_image on product_details.pro_id = product_image.pro_id 
          where product_details.cat_id = $ID ORDER BY product_details.pro_id");
        while($row= mysqli_fetch_assoc($result))
        {
            $output[$row['pro_name']][]=$row; 
        //var_dump($row);
        }

        $productNameHtml="<div class=\"product-title\">%s</div>";
        $imagesHtml="<img class=\"img-fluid\" src=\"%s\">";
        
        foreach ($output as $productName => $images) {
            // code...
            $finalHtml="";
            echo "<div class=\"gallery\">";
            echo "<div class=\"hvr\"><i class=\"zmdi zmdi-zoom-in\"></i></div>";
            if(!empty($images))
            {
                $finalHtml .= vsprintf($productNameHtml, array($productName));
                foreach ($images as $image) {
                    // code...
                    $imgPath= $image['image'];
                    $finalHtml .= vsprintf($imagesHtml, array($imgPath, 'xyz'));
                }
            }
            echo $finalHtml;
            echo "</div>";
        }
        
        
        
        ?>
