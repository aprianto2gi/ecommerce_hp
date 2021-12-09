    <style>
        .chc:hover{
            background: #000 !important;
        }
    </style>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!================================================================================>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="<?php echo site_url('Shop/search_keyword');?>" method="post">
                            <input type="text" name="keyword" placeholder="Search products...">
                            <input type="submit" value="search">
                        </form>
                    </div>
                    <!================================================================================>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">New Products</h2>
                        <?php foreach($product_data as $prl){ ?>
                        <div class="thubmnail-recent">
                            <img src="<?php echo base_url(); ?>img/products/<?php echo $prl["gambar1"]; ?>" class="recent-thumb" alt="<?php echo $prl["product_name"]; ?>" title="<?php echo $prl["product_name"]; ?>">
                            <h2><a href="<?php echo base_url(); ?>productDetail/<?php echo $prl['product_id']; ?>"><?php echo $prl["product_name"]; ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins>Rp<?php echo number_format($prl["price"],0,',','.'); ?></ins> 
                                <?php $mahal=$prl["price"]+ 0.1*($prl["price"]); ?>
                                <del>Rp<?php echo number_format($mahal,0,',','.'); ?></del>
                            </div>                             
                        </div>
                        <?php }?>
                        
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="<?php echo base_url(); ?>cart/update_cart">
                                <?php 
                                   // var_dump($this->cart->contents());
                                  //  exit();
                                    $cart_check=$this->cart->contents();
                                    if(empty($cart_check)){
                                        //echo "CART KOSONG";
                                    }
                                ?>
                                <table cellspacing="0" class="shop_table cart">
                                
                <?php   
                    if($cart=$this->cart->contents()):
                ?>
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <!-- <th class="product-thumbnail">&nbsp;</th> -->
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                //var_dump($stk);
                                // foreach ($stk[0] as $max) {
                                //                       //foreach ($max[0] as $mak) {
                                //                           // echo $max['stock'];
                                //                            //var_dump($max[0]);
                                //                       // }
                                                    
                                // }
                                    echo form_open('cart/update_cart');

                                        $subtotal=0; $total=0;              
                                        foreach ($cart as $item):  
                                        /*echo form_hidden('cart[' . $item['id'] . '][product_id]', $item['id']);
                                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                        echo form_hidden('cart[' . $item['id'] . '][product_name]', $item['name']);
                                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']); 
                                       */

                                       
                                        //$i++;
                                        //$stock=$this->cart->getTotal($item['id']);
                                        //echo $stock;exit;                   
                                    ?>  

                                       <input type="hidden" name="product_id[]" value="<?php echo $item['id'];  ?>">
                                       <input type="hidden" name="rowid[]" value="<?php echo $item['rowid'];  ?>">
                                       <input type="hidden" name="product_name[]" value="<?php echo $item['name'];  ?>">
                                       <input type="hidden" name="price[]" value="<?php echo $item['price'];  ?>">
                                                                             

                                        <tr class="cart_item">
                                            <td class="product-remove">
                                               <?php $path = "<img src='http://localhost/web/img/cart_cross.jpg' width='25px' height='20px'>";
                                                echo anchor('cart/remove/' . $item['rowid'], $path); ?>
                                            </td>

                                            <!-- <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php //echo base_url(); ?>img/product-thumb-2.jpg"></a>
                                            </td> -->

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo $item['name']; ?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">Rp <?php echo number_format($item['price'],0,',','.'); ?></span> 
                                            </td>
                                            
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                   
                                                   
                                                    <input type="number" name="qty[]" size="4" class="input-text qty text" title="Qty" value="<?php echo $item['qty']; ?>" min="1" max="<?php echo $item['maxqty']; ?>" step="1" id="qty" onKeyPress="return goodchars(event,'1234567890',this)" required>
                                                   
                                                </div>
                                            </td>
                                           
                                            <td class="product-subtotal">
                                                <?php $subtotal=$item['price'] * $item['qty'] ; ?>
                                                <span class="amount">Rp <?php echo number_format($subtotal,0,',','.'); ?></span> 
                                            </td>
                                        </tr>
                                           <?php 
                                           //$i++;
                                           $total=$total + $subtotal;
                                            ?>
                                        <?php endforeach; ?>
                                        
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <!--<div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div>-->
                                                <!==update CART==>
                                                
                                                <input type="submit" value="Update Cart" name="update_cart" class="button" onclick="window.location='cart/update_cart'">
                                                <?php // echo form_submit('$cart','Update Cart'); ?>
                                                
                                                <a class="checkout-button button alt wc-forward" href="<?php echo base_url(); ?>Checkout"><input type="button" value="Checkout" name="proceed" class="chc" style="background: none repeat scroll 0 0 #5a88ca; border: medium none; color: #fff; padding: 11px 20px; text-transform: uppercase;"></a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <p style="color: red; margin-top: -48px; margin-bottom: 40px; font-style: italic;">*Sebelum Checkout, Klik Tombol Update Cart Terlebih Dahulu</p>
                            </form>
                            <!==clear CART==>
                            <!--<form method="post" action="<?php echo base_url(); ?>cart/remove/all">-->
                            <form name="clr" method="post">
                                <input type="button" class="chc button" name="clear" value="Clear Cart" onclick="clear_cart();" style="background: none repeat scroll 0 0 #5a88ca; border: medium none; color: #fff; padding: 11px 20px; text-transform: uppercase;">
                            </form>
                            <?php echo form_close(); ?>  

                            <div class="cart-collaterals">


                            <div class="cross-sells col-xs-12">
                                <h2>You may be interested in...</h2>
                                <ul class="products col-xs-6">
                                    <?php foreach($top_seller as $seller){ ?>
                                    <li class="product">
                                        <a href="<?php echo base_url(); ?>productDetail/<?php echo $seller['product_id']; ?>">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" title="<?php echo $seller["product_name"]; ?>" src="<?php echo base_url(); ?>img/products/<?php echo $seller['gambar1']; ?>">
                                            <h3><?php echo $seller["product_name"]; ?></h3>
                                            <span class="price"><span class="amount">Rp<?php echo number_format($seller["price"],0,',','.'); ?></span></span>
                                        </a>

                                        <!--<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>-->
                                    </li>
                                    <?php }?>
                                    
                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Rp <?php echo number_format($total,0,',','.'); ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><span class="amount"><h4><b>Rp <?php echo number_format($this->cart->total(),0,',','.'); //echo number_format($total,0,',','.'); ?></b></h4></span></td>
                                        </tr>
                                    </tbody>
                <?php else: ?>  <h2 style="margin-bottom: 20px;" class="sidebar-title">Troli Belanja Kosong</h2>
                                <a href="<?php echo base_url(); ?>shop" style="color: blue; margin-left: 20px;">Belanja Sekarang</a>
                <?php endif; ?>
                                </table>
                            </div>


                           


                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"> 
    $(document).ready(function () { 
          $(".navi li").removeClass("active");  
          $('#cart').addClass('active'); 
    }); 
    </script>
    
        <script>
             $(function () {
           $( "#qty" ).change(function() {
              var max = parseInt($(this).attr('max'));
              var min = parseInt($(this).attr('min'));
              if ($(this).val() > max)
              {
                  alert("Out Stock");
                  $(this).val(max);
              }
              else if ($(this).val() < min)
              {
                alert("Min 1 Product");
                  $(this).val(min);
              }       
            }); 
        });
        </script>
       <!============================================================================================>
    <script type="text/javascript">
        // To conform clear all data in cart.
           function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>cart/remove/all";
                } else {
                    return false; // cancel button
                }
            }
    </script>
    <!============================================================================================>

    <script language="javascript">
            function getkey(e)
            {
                if(window.event)
                    return window.event.keyCode;
                else if (e)
                    return e.which;
                else
                    return null;    
            }
            function goodchars(e,goods,field)
            {
                var key,keychar;
                key = getkey(e);
                if(key==null) return true;
                keychar = String.fromCharCode(key);
                keychar = keychar.toLowerCase();
                goods = goods.toLowerCase();
                
                if(goods.indexOf(keychar)!=-1)
                    return true;
                if(key==null || key==0 || key==8 || key==9 || key==27)
                    return true;
                if(key==13){
                    var i;
                    for(i=0;i<field.form.elements.lenght;i++)
                        if(field==field.form.elements[i])
                            break;
                        i=(i+1)% field.form.elements[i].focus();
                    return false;   
                }
                return false;
            }
    </script>
