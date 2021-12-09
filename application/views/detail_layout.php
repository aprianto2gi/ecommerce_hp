  
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Detail Product</h2>
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
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="<?php echo site_url('Shop/search_keyword');?>" method="post">
                            <input type="text" name="keyword" placeholder="Search products...">
                            <input type="submit" value="search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">New Products</h2>
                        <?php foreach($product_data as $product){ ?>
                        <div class="thubmnail-recent">
                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $product['product_id']; ?>"><img src="<?php echo base_url(); ?>img/products/<?php echo $product['gambar1']; ?>" class="recent-thumb" alt="<?php echo $product['product_name']; ?>" title="<?php echo $product['product_name']; ?>"></a>
                            <h2><a href="<?php echo base_url(); ?>productDetail/<?php echo $product['product_id']; ?>"><?php echo $product["product_name"]; ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins>Rp<?php echo number_format($product["price"],0,',','.'); ?></ins> 
                                <?php $mahal=$product["price"]+ 0.1*($product["price"]); ?>
                                <del>Rp<?php echo number_format($mahal,0,',','.'); ?></del>
                            </div>                             
                        </div>
                        <?php }?>
                    </div>
                    
                    
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="<?php echo base_url(); ?>home">Home</a>
                            
                            <?php if(isset($product_det)){ ?>

                            <a href="<?php echo base_url(); ?>shop/bnd/<?php echo $product_det->brand_id; ?>"><?php echo $product_det->brand_name; ?></a>
                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $product_det->product_id; ?>"><?php echo $product_det->product_name; ?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
<!============================================TAMPILAN GAMBAR=================================================>
<style>
.mySlides {display:none}
.demo {cursor:pointer}
</style>

<div class="w3-content col-xs-12" style="max-width:1200px">
    <img class="mySlides" src="<?php echo base_url(); ?>img/products/<?php echo $product_det->gambar1; ?>" style="width:100%">
    <img class="mySlides" src="<?php echo base_url(); ?>img/products/<?php echo $product_det->gambar2; ?>" style="width:100%">
    <img class="mySlides" src="<?php echo base_url(); ?>img/products/<?php echo $product_det->gambar3; ?>" style="width:100%">

    <div class="product-gallery">
        <div class="w3-col">
          <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo base_url(); ?>img/products/<?php echo $product_det->gambar1; ?>" onclick="currentDiv(1)">
        </div>
    
        <div class="w3-col">
          <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo base_url(); ?>img/products/<?php echo $product_det->gambar2; ?>" onclick="currentDiv(2)">
        </div>
    
        <div class="w3-col">
          <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo base_url(); ?>img/products/<?php echo $product_det->gambar3; ?>" onclick="currentDiv(3)">
    
        </div>
    </div>
</div> 

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>                               

<!============================================================================================================>
                            </div>
                            
                            <div class="col-sm-6">
                                
                                <div class="product-inner">

                                    <?php $id=$product_det->product_id; 
                                          $name=$product_det->product_name;
                                          $price=$product_det->price;
                                          
                                    ?>
                                    <h2 class="product-name" id='name'><?php echo $product_det->product_name; ?></h2>
                                    <div class="product-inner-price" id="price">
                                        <ins>Rp<?php echo number_format($product_det->price,0,',','.'); ?></ins> 
                                        <?php $mahal=$product_det->price+ 0.1*($product_det->price); ?>
                                        <del>Rp<?php echo number_format($mahal,0,',','.') ?></del>
                                    </div>    
                                    <?php //if($this->session->has_userdata("customer_name")){?>
                                        <?php foreach($stock as $stock){?>

                                        <form <?php if($this->session->has_userdata("customer_name")){ ?> action="<?php echo base_url(); ?>cart/addtocart" method="post" <?php }else{ ?> onclick="document.getElementById('id01').style.display='block'" <?php } ?> />
                                        <div class="quantity">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <input type="hidden" name="name" value="<?php echo $name ?>">
                                            <input type="hidden" name="price" value="<?php echo $price ?>">
                                            <input type="number" size="4" class="input-text qty text" id="qty" name="qty" title="Qty" value="1" min="1" max="<?php echo $stock; ?>" step="1" onKeyPress="return goodchars(event,'1234567890',this)" required> 
                                            <input type="hidden" name="maxqty" value="<?php echo $stock; ?>"></input>
                                        </div>
                                        <div id='add_button'>
                                            <input <?php if($this->session->has_userdata("customer_name")){ ?> type="submit" <?php }else{ ?> type="button" onclick="document.getElementById('id01').style.display='block'" <?php } ?> name="action" class="add_to_cart_button" value="Add to Cart">
                                        </div>
                                        </form> 
                                        <?php }?>
                                    <?php //}?>   
                                    
                                    <!--<div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div>-->
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#desc" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <?php if($this->session->has_userdata("customer_name")){?>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li><?php }?>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="desc">
                                                <h2>Product Description</h2>  
                                                <p><?php echo $product_det->product_description; ?></p>
                                            </div><?php }?>
                                            <?php if($this->session->has_userdata("customer_name")){?>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" id="name" type="text" value="<?php echo $this->session->userdata('customer_name'); ?>" <?php echo !is_int($this->session->userdata('customer_name')) ? ' disabled="disabled"' : ''; ?>></p>
                                                    <p><label for="email">Email</label> <input name="email" id="email" type="email" value="<?php echo $this->session->userdata('customer_email'); ?>"<?php echo !is_int($this->session->userdata('customer_email')) ? ' disabled="disabled"' : ''; ?>></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                    <form> 
                                                        <!-- Change starability-basic to different class to see animations. --> 
                                                        <fieldset class="starability-basic"> 
                                                          <!--<legend>Basic star rating:</legend> -->
                                                          <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." /> 

                                                          <input type="radio" id="rate1" name="rating" value="1" /> 
                                                          <label for="rate1">1 star.</label> 

                                                          <input type="radio" id="rate2" name="rating" value="2" /> 
                                                          <label for="rate2">2 stars.</label> 

                                                          <input type="radio" id="rate3" name="rating" value="3" /> 
                                                          <label for="rate3">3 stars.</label> 

                                                          <input type="radio" id="rate4" name="rating" value="4" /> 
                                                          <label for="rate4">4 stars.</label> 

                                                          <input type="radio" id="rate5" name="rating" value="5" /> 
                                                          <label for="rate5">5 stars.</label> 
                                                        </fieldset> 
                                                    </form>
                                                    </div>      

                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div><?php }?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                <?php foreach($related_data as $rlt){ ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo base_url(); ?>img/products/<?php echo $rlt["gambar1"]; ?>" alt="<?php echo $rlt["product_name"]; ?>" title="<?php echo $rlt["product_name"]; ?>">
                                        <div class="product-hover">                                            
                                            <!-- <a <?php //if($this->session->has_userdata("customer_name")){?> href="<?php //echo base_url(); ?>cart/<?php //$rlt['product_id'] ?>" <?php //}else{ ?> onclick="document.getElementById('id01').style.display='block'" <?php //} ?> class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                            <a href="<?php echo base_url(); ?>productDetail/<?php echo $rlt['product_id']; ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="<?php echo base_url(); ?>productDetail/<?php echo $rlt['product_id']; ?>"><?php echo $rlt["product_name"]; ?></a></h2>

                                    <div class="product-carousel-price">
                                        <ins>Rp<?php echo number_format($rlt['price'],0,',','.'); ?></ins> 
                                        <?php $mahal=$rlt['price'] + 0.1*($rlt['price']); ?>
                                        <del><?php echo number_format($mahal,0,',','.'); ?></del>
                                    </div> 
                                </div>
                                <?php }?>
                                                               
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
          $('#shop').addClass('active'); 
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