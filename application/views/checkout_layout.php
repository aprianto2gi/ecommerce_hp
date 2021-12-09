    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Check Out</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
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
                        <?php foreach($get_product as $prod){?>
                        <div class="thubmnail-recent">
                            <img src="<?php echo base_url(); ?>img/products/<?php echo $prod['gambar1']; ?>" class="recent-thumb" alt="">
                            <h2><a href="<?php echo base_url(); ?>detailProduct/<?php echo $prod['product_id']; ?>"><?php echo $prod['product_name']; ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins>Rp<?php echo number_format($prod['price'],0,',','.'); ?></ins> 
                                <?php $mahal=$prod["price"]+ 0.1*($prod["price"]); ?>
                                <del>Rp<?php echo number_format($mahal,0,',','.'); ?></del>
                            </div>                             
                        </div>
                        <?php }?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                           

                            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>Checkout/save_order" class="checkout" method="post" name="checkout">

                                <input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('customer_id'); ?>">
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                            <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                            <?php if($this->session->has_userdata("customer_name")){?>    

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name"> Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $this->session->userdata('customer_name'); ?>" <?php echo !is_int($this->session->userdata('customer_name')) ? ' disabled="disabled"' : ''; ?> placeholder="" id="customer_name" name="customer_name" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">City <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" required placeholder="City" id="city" name="city" class="input-text ">
                                            </p>

                                           
                                            <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                <label class="" for="billing_postcode">Postcode <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Postcode Hanya Angka" id="postcode" name="postcode" class="input-text" required onkeypress="return isNumberKey(event)">
                                            </p>

                                            <div class="clear"></div>


                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Phone Hanya Angka" required onkeypress="return isNumberKey(event)" id="phone" name="phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                           

                                        </div>
                                    </div>

                                   <div class="col-2">
                                        <div class="woocommerce-shipping-fields" style="margin-top: 50px;">
                                            
                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" required placeholder="Street address" id="address" name="address" class="input-text ">
                                            </p>

                                             <p id="billing_province_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-province">
                                                <label class="" for="billing_province">Province</label>
                                                <input type="text" id="province" name="province" required placeholder="Province" value="" class="input-text ">
                                            </p>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $this->session->userdata('customer_email'); ?>" <?php echo !is_int($this->session->userdata('customer_email')) ? ' disabled="disabled"' : ''; ?>" placeholder="" id="email" name="email" class="input-text " >
                                            </p>
                                            <?php }?>
                                        </div>

                                    </div>

                                </div>

                                <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--<tr class="cart_item">
                                                <td class="product-name">
                                                    Ship Your Idea <strong class="product-quantity"></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp</span> </td>
                                            </tr>-->
                                        </tbody>
                                        <tfoot>
                                        <?php
                                          $cart_check=$this->cart->contents();
                                        
                                          if($cart=$this->cart->contents()):
                                            $subtotal=0;
                                            $total=0;
                                            foreach ($cart as $item):  

                                                 $subtotal=$item['price'] * $item['qty'] ; 
                                                 $total=$total+$subtotal;
                
                                        ?>
                                        <input type="hidden" name="product_id[]" value="<?php echo $item['id'];  ?>">
                                        <input type="hidden" name="rowid[]" value="<?php echo $item['rowid'];  ?>">
                                        <input type="hidden" name="product_name[]" value="<?php echo $item['name'];  ?>">
                                        <input type="hidden" name="price[]" value="<?php echo $item['price'];  ?>">
                                        <input type="hidden" name="total" value="<?php echo $this->cart->total(); ?>">

                                            <tr class="cart-subtotal">
                                                <th style="font-weight:normal;"><?php echo $item['name'];  ?></th>
                                                <td><span class="amount">Rp <?php echo number_format($subtotal,0,',','.'); ?></span>
                                                </td>
                                            </tr>                                            

                                        <?php endforeach; ?>
                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><span class="amount"><h4><b>Rp <?php echo number_format($total,0,',','.'); ?></b></h4></span></td>
                                            </tr>
                                        </tfoot>

                                <?php endif; ?>
                                    
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                            <!--<li class="payment_method_cheque">
                                                <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_cheque">Cheque Payment </label>
                                                <div style="display:none;" class="payment_box payment_method_cheque">
                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_paypal">
                                                <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                                                <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What is PayPal?</a>
                                                </label>
                                                <div style="display:none;" class="payment_box payment_method_paypal">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </li>-->
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"> 
    $(document).ready(function () { 
          $(".navi li").removeClass("active");  
          $('#checkout').addClass('active'); 
    }); 
    </script>

    <script language="Javascript">
        function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }
    </script>