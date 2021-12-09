    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!======================================================================================>
    <div class="searchxz" style=" width: 315px; margin-left: 100px; margin-top: 50px;">
            <h2 class="sidebar-title">Search Products</h2>
            <form action="<?php echo site_url('Shop/search_keyword');?>" method="post">
                <input type="text" name="keyword" placeholder="Search products...">
                <input type="submit" value="search">
            </form>
    </div>
    <!======================================================================================>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
    <?php if(isset($seller_data)){?>

                <?php foreach($seller_data as $rows){ ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $rows["product_id"]; ?>"><img src="<?php echo base_url(); ?>img/products/<?php echo $rows["gambar1"]; ?>" alt="<?php echo $rows["product_name"]; ?>" title="<?php echo $rows["product_name"]; ?>"></a>
                        </div>
                        <h2><a href="<?php echo base_url(); ?>/productDetail/<?php echo $rows["product_id"]; ?>"><?php echo $rows["product_name"]; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins>Rp <?php echo number_format($rows["price"],0,',','.'); ?></ins> 
                            <?php $mahal=$rows['price']; $sd=$mahal + 0.1*($rows["price"]);?>
                            <del>Rp <?php echo number_format($sd,0,',','.'); ?></del>
                        </div>  
                        <?php if($this->session->has_userdata("customer_name")){?>
                        <!--<div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="<?php echo base_url(); ?>/canvas/shop/?add-to-cart=70">Add to cart</a>
                        </div>--><?php }?>               
                    </div>
                </div>
    <?php }} elseif(isset($bnd_data)){?>

                <?php foreach($bnd_data as $rowa){ ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $rowa["product_id"]; ?>"><img src="<?php echo base_url(); ?>img/products/<?php echo $rowa["gambar1"]; ?>" alt="<?php echo $rowa["product_name"]; ?>" title="<?php echo $rowa["product_name"]; ?>"></a>
                        </div>
                        <h2><a href="<?php echo base_url(); ?>/productDetail/<?php echo $rowa["product_id"]; ?>"><?php echo $rowa["product_name"]; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins>Rp <?php echo number_format($rowa["price"],0,',','.'); ?></ins> 
                            <?php $mahal=$rowa['price']; $sd=$mahal + 0.1*($rowa["price"]);?>
                            <del>Rp <?php echo number_format($sd,0,',','.'); ?></del>
                        </div>  
                        <?php if($this->session->has_userdata("customer_name")){?>
                        <!--<div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="<?php echo base_url(); ?>/canvas/shop/?add-to-cart=70">Add to cart</a>
                        </div>--><?php }?>               
                    </div>
                </div>

    <?php }} elseif(isset($resul)){?>

                <?php foreach($resul as $resul){ ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $resul['product_id']; ?>"><img src="<?php echo base_url(); ?>img/products/<?php echo $resul["gambar1"]; ?>" alt="<?php echo $resul['product_name']; ?>" title="<?php echo $resul['product_name']; ?>"></a>
                        </div>
                        <h2><a href="<?php echo base_url(); ?>/productDetail/<?php echo $resul['product_id']; ?>"><?php echo $resul["product_name"]; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins>Rp<?php echo number_format($resul["price"],0,',','.'); ?></ins> 
                            <?php $mahal=$resul['price']; $sd=$mahal + 0.1*($resul["price"]);?>
                            <del>Rp<?php echo number_format($sd,0,',','.'); ?></del>
                        </div>  
                        <?php if($this->session->has_userdata("customer_name")){?>
                        <!--<div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="<?php echo base_url(); ?>/canvas/shop/?add-to-cart=70">Add to cart</a>
                        </div>--><?php }?>  
                    </div>
                </div>

    <?php }}else{?>

                <?php foreach($product_data as $rows){ ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $rows["product_id"]; ?>"><img src="<?php echo base_url(); ?>img/products/<?php echo $rows["gambar1"]; ?>" data-mouseover="<?php echo base_url(); ?>img/products/<?php echo $rows["gambar1"]; ?> <?php echo base_url(); ?>img/products/<?php echo $rows["gambar1"]; ?> <?php echo base_url(); ?>img/products/<?php echo $rows["gambar1"]; ?>" alt="<?php echo $rows["product_name"]; ?>" title="<?php echo $rows["product_name"]; ?>"></a>
                        </div>
                        <h2><a href="<?php echo base_url(); ?>/productDetail/<?php echo $rows["product_id"]; ?>"><?php echo $rows["product_name"]; ?></a></h2>
                        <div class="product-carousel-price">
                            <ins>Rp <?php echo number_format($rows["price"],0,',','.'); ?></ins> 
                            <?php $mahal=$rows['price']; $sd=$mahal + 0.1*($rows["price"]);?>
                            <del>Rp <?php echo number_format($sd,0,',','.'); ?></del>
                        </div>  
                        <?php if($this->session->has_userdata("customer_name")){?>
                        <!--<div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="<?php echo base_url(); ?>/canvas/shop/?add-to-cart=70">Add to cart</a>
                        </div>--><?php }?>             
                    </div>
                </div>
                <?php } ?>
    <?php }?>
               
            </div>
            

            <div class="cleaner"></div>
            <style type="text/css">
                .paging_item a{ color: #FFFFFF;}
                .paging_item a:hover{color: #FFFFFF;}
                .paging_item_active a{ color: #FFFFFF;}
                .paging_item_active a:hover{color: #FFFFFF;}
                .paging_item{ text-decoration: none; list-style: none; float: left; margin-left: 5px; padding: 5px; width: 30px; height: 30px; background: #5a88ca;}
                .paging_item:hover{background: #151515;}
                .paging_item_active{ text-decoration: none; float: left; background: #088A85;}
            </style>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        
                          <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                          </ul>
                                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!==============================Warna Untuk Menu===================================>
    <script type="text/javascript"> 
    $(document).ready(function () { 
          $(".navi li").removeClass("active");  
          $('#shop').addClass('active'); 
    }); 
    </script>
    <!==============================Warna Untuk Menu===================================>

    <!==============================Hover Gambar=======================================>
    <script type="text/javascript">
                                $('img').on('mouseover', function() {
                                    var self = this,
                                        i = 0,
                                        images = $(this).data('mouseover').split(/\s+/);

                                    (function nextImage() {
                                        var next = images[i++ % images.length].split('#');
                                        $(self).data('timeout', setTimeout(function() {
                                            self.src = next[0];
                                            nextImage();
                                        }, next[1] || 500));
                                    })();

                                }).on('mouseout', function() {
                                    clearTimeout($(this).data('timeout'));
                                    this.src = $(this).attr('src');
                                });
    </script>
    <!==============================Hover Gambar=======================================>