<?php
session_start();
require_once("db/config.php");

$database = new Database();
$conn = $database->connect();
?>
 
                     
        <div class="search_ajaxdetails">
        	<div class="is-ajax-search-posts">
            
            <?php 
            $sql ="SELECT count(`pro_id`) as totalProduct FROM `product_details` where `pro_name` like '%".$_POST['search']."%' || `pro_description` like  '%".$_POST['search']."%' ";
            $query2 = $conn->query($sql);
            $proTotalData = $query2->fetch(PDO::FETCH_LAZY); 
            
            if($proTotalData['totalProduct'] > 0){ 
                
            $sql ="SELECT * FROM `product_details` where `pro_name` like '%".$_POST['search']."%' || `pro_description` like  '%".$_POST['search']."%' ";
            $query2 = $conn->query($sql);
            $productSearchData = $query2->fetchAll(PDO::FETCH_ASSOC); 
            
            foreach ($productSearchData as $product){ 
            
            $sql ="SELECT * FROM `product_image` WHERE `pro_id` = '". $product['pro_id']."' && `image_position` = '1' ";
            $query2 = $conn->query($sql);
            $proImageData = $query2->fetch(PDO::FETCH_LAZY);     
            
            $sql ="SELECT * FROM `product_category` WHERE `cat_id` = '". $product['cat_id']."' ";
            $query2 = $conn->query($sql);
            $proCatData = $query2->fetch(PDO::FETCH_LAZY);     
            
            ?>
            	<div class="is-items-search-post is-product">
                	<div class="is-search-sections">
                    	<div class="left-section">
                        	<div class="thumbimg">
                            	<a href="product_details.php?id=<?php echo $product['pro_id'];?>">
                                    <img class="img-fluid" src="<?php echo $database->base_url . $database->document_path_site_image . $proImageData['product_img']; ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="right-section">
                        	<div class="is-title">
									<a href="product_details.php?id=<?php echo $product['pro_id'];?>"><?php echo $product['pro_name'];?></a>
                             </div>
                             <div class="meta">
                              <span class="is-meta-category"> <i>Categories:</i> <span class="is-cat-links"> 
                              <a href="product_listing.php?ID=<?php echo $proCatData['cat_id'];?>" rel="tag"><?php echo $proCatData['cat_name'];?></a> </span> </span> 
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <?php } else { ?>
                        <p style="color: red;margin-top: 10px;margin-left: 10px;">No Match Found</p>
                <?php } ?>
            </div>
        </div>
                                        
                                        