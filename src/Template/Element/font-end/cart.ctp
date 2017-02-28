

<div class="mini-cart mini-cart-2">
 
    <?php echo $this->Html->link('<span class="total-mini-cart-icon"><i class="fa fa-shopping-basket"></i></span>
        <span class="total-mini-cart-item">'.count($this->request->session()->read('Cart')).'</span>',
            ['controller'=>'pages','action'=> 'view_cart'],
            ['escape'=> false,'class'=>'header-mini-cart2']); 
    ?>
  
     <?php if (!empty($this->request->session()->read('Cart'))): ?>
        <div class="content-mini-cart">
            <h2>(<?php echo count($this->request->session()->read('Cart')) ?>) ITEMS IN MY CART</h2>
            <ul class="list-mini-cart-item">
                 
                     <?php foreach ($this->request->session()->read('Cart') as $key => $products): ?>
                <li>
                    <div class="mini-cart-thumb">
                        <?php echo $this->Html->link($this->Html->image($products[3],['width'=>70]), ['controller'=>'pages','action'=>'products',$products[0]], array('escape' => false)); ?>
                    </div>
                    <div class="mini-cart-info">
                        <h3><a href="#"><?php echo $products[1] ?></a></h3>
                    </div>
                </li>
                  <?php endforeach ?>
               
            </ul>
        
            <div class="mini-cart-button">
             <?php echo $this->Html->link('view my cart',
                        ['controller'=>'pages','action'=> 'view_cart'],
                        ['escape'=> false,'class'=>'mini-cart-view']); 
                ?>
                
                <a class="mini-cart-checkout" href="#">Checkout</a>
            </div>
        </div>
       <?php endif ?>
</div>