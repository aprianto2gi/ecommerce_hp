    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="<?php echo base_url(); ?>img/slider_xs.jpg" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">XS <strong>Max</strong></span>
							</h2>
							<h4 class="caption subtitle">eSIM</h4>
							<a class="caption button-radius" href="<?php echo base_url(); ?>shop/bnd/1"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="<?php echo base_url(); ?>img/slider_xsmax.jpg" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								by one <span class="primary">10% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">iPhone XS Max*</h4>
							<a class="caption button-radius" href="<?php echo base_url(); ?>/productDetail/23"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="<?php echo base_url(); ?>img/slider_note_10.jpg" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Samsung <span class="primary">Note <strong>10+</strong></span>
							</h2>
							<h4 class="caption subtitle">Infinity O Display</h4>
							<a class="caption button-radius" href="<?php echo base_url(); ?>shop/bnd/2"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="<?php echo base_url(); ?>img/slider_iphone11.jpg" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Apple <span class="primary">iPhone <strong>11</strong></span>
							</h2>
							<h4 class="caption subtitle">Coming Soon</h4>							
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">

                            <?php foreach ($product_data as $rows) {?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo base_url(); ?>img/products/<?php echo $rows['gambar1'] ?>" alt="<?php echo $rows['product_name']; ?>" title="<?php echo $rows['product_name']; ?>">
                                    <div class="product-hover">
                                        <?php //if($this->session->has_userdata("customer_name")){?>
                                        <!=======addto CART========>
                                        <form action="<?php echo base_url(); ?>cart/addtocart" method="post">
                                        <div class="quantity">
                                            <input type="hidden" name="id" value="<?php echo $rows['product_id']; ?>">
                                            <input type="hidden" name="name" value="<?php echo $rows['product_name']; ?>">
                                            <input type="hidden" name="price" value="<?php echo $rows['price']; ?>">
                                            <input type="hidden" name="qty" value="1"> 
                                            <input type="hidden" name="maxqty" value="<?php echo $rows['stock']; ?>"></input>
                                        </div>
                                           
                                            <div class="atchdiv">
                                                <a class="add-to-cart-link" style="padding: 0px !important;">
                                                <i class="fa fa-shopping-cart"><input type="submit" name="action" class="terserah" value="Add to Cart" style="bottom: -25%;">
                                                </i>
                                                </a>
                                            </div>
                                            
                                        
                                        </form>
                                        <?php //}?>
                                        <!-- <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                        
                                        <!=======addto CART========>
                                        <a style="text-decoration: none" href="<?php echo base_url(); ?>productDetail/<?php echo $rows["product_id"]; ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="<?php echo base_url(); ?>productDetail/<?php echo $rows["product_id"]; ?>"><?php echo $rows["product_name"]; ?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>Rp<?php echo number_format($rows["price"],0,',','.'); ?></ins> 
                                    <?php $mahal=$rows["price"]; $sd=$mahal + 0.1*($rows["price"]); ?>
                                    <del>Rp<?php echo number_format($sd,0,',','.'); ?></del>
                                </div> 
                            </div>
                            <?php }?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                        <?php foreach($brand_data as $bnd) {?>
                            <a <?php $q=$bnd['brand_id']; ?> 
                                    href="<?php echo base_url(); ?>shop/bnd/<?php echo $bnd["brand_id"]; ?>"
                               <?php ?>>
                            <img src="<?php echo base_url(); ?>/img/<?php echo $bnd["brand_gambar"]; ?>" alt="<?php echo $bnd["brand_name"]; ?>" title="<?php echo $bnd['brand_name']; ?>"></a>
                        <?php }?>         
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sellers</h2>
                        <?php foreach($top_seller as $top){ ?>
                        <a href="<?php echo base_url(); ?>shop/seller" class="wid-view-more">View All</a>
                        
                        <div class="single-wid-product">
                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $top["product_id"];?>"><img src="<?php echo base_url();?>img/products/<?php echo $top['gambar1']; ?>" alt="<?php echo $top["product_name"];?>" title="<?php echo $top["product_name"];?>" class="recent-thumb"></a>
                            <h2><a href="<?php echo base_url();?>productDetail/<?php echo $top["product_id"]; ?>"><?php echo $top["product_name"]; ?></a></h2>
                            <div class="product-wid-rating">
                                
                                <i class="fa fa-star"></i>
                                
                            </div>
                            <div class="product-wid-price">
                                <ins>Rp<?php echo number_format($top["price"],0,',','.'); ?></ins> 
                                <?php $mahal=$top["price"]+0.1*($top["price"]); ?>
                                <del>Rp<?php echo number_format($mahal,0,',','.'); ?></del>
                            </div>                            
                        </div>
                        <?php }?>
                        
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        <a href="<?php echo base_url(); ?>shop" class="wid-view-more">View All</a>
                        <?php foreach($product as $rows){ ?>
                        <div class="single-wid-product">
                            <a href="<?php echo base_url();?>productDetail/<?php echo $rows["product_id"] ?>"><img src="<?php echo base_url();?>img/products/<?php echo $rows['gambar1']; ?>" alt="<?php echo $rows["product_name"] ?>" title="<?php echo $rows["product_name"] ?>" class="recent-thumb"></a>
                            <h2><a href="<?php echo base_url();?>productDetail/<?php echo $rows["product_id"] ?>"><?php echo $rows['product_name']; ?></a></h2>
                            <div class="product-wid-rating">
                                
                                <i class="fa fa-star"></i>

                                
                            </div>
                            <div class="product-wid-price">
                                <ins>Rp<?php echo number_format($rows["price"],0,',','.');?></ins> 
                                <?php $mahal=$rows['price']+0.1*($rows["price"]);?>
                                <del>Rp<?php echo number_format($mahal,0,',','.'); ?></del>
                            </div>                            
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

    <!===================EXPIRED===========================>
    <?php 
    // foreach($expired as $ex){

    //     if($ex['expired']<=date('Y-m-d H:i:sa')){
    //         $id=$ex['order_id'];
    //         $sql="update order_tbl set status='Gagal' where order_id=".$id;
    //         $query=$this->db->query($sql); 

    //     }
    //         // echo $sql;
    //          //exit;
    // }

    ?>
    <!===================EXPIRED===========================>
    
    <script type="text/javascript"> 
    $(document).ready(function () { 
          $(".navi li").removeClass("active");  
          $('#home').addClass('active'); 
    }); 
    </script>