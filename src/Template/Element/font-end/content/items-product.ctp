<!-- <button type="button" class="btn btn-primary"  data-whatever="@mdo">Open modal</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
-->


<div role="tabpanel" class="tab-pane fade in active" id="product-grid">
    <ul class="row product-grid live-search-list vertical highlight_list" >
        <?php foreach ($products as $key => $product): ?>
            <li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search col-md-3 col-sm-6 col-xs-12">
                <div class="item-product">
                    <div class="product-thumb">
                        <a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->id]) ?>">
                        <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb','width' => 193]); ?>
                        <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb','width' => 193]); ?>
                        </a>
                        <div class="product-info-cart">
                            <div class="product-extra-link">
                                <span class="wishlist-link" product_id="<?= $product->id;?>" href="#"><i class="fa fa-heart-o"></i></span>
                                <span class="compare-link" href="#"><i class="fa fa-toggle-on"></i></span>
                                <span class="quickview-link1 fancybox.ajax" href="quick-view.html"><i class="fa fa-search"></i></span>
                            </div>
                            <span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?php echo $product->images[0]['thumbnail'] ?>">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </span>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="title-product"><?php echo $this->Html->link(ucfirst($product->product_name),[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?></h3>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>
<div role="tabpanel" class="tab-pane fade" id="product-list">
    <ul class="product-list vertical highlight_list">
        <?php foreach ($products as $key => $product): ?>
            <li data-search-term="supplier<?= $product->supplier['id'];?> active<?= $key?>" class="supplier-search-<?= $product->supplier['id'];?> supplier-search">
                <div class="item-product">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="product-thumb">
                                <a class="product-thumb-link" href="<?= $this->Url->build(['controller'=>'pages','action'=>'products', $product->id]) ?>">
                                    <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'first-thumb']); ?>
                                    <?php echo $this->Html->image($product->images[0]['thumbnail'],['class'=>'second-thumb']); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="product-info">
                                <h3 class="title-product"><?php echo $this->Html->link($product->product_name,[ 'controller' => 'Pages',  'action' => 'products',$product->id]) ?> </h3>
                               <div class="info-category">
                                    <label><b>Maker's name:</b> </label> 
                                    <span><?php echo $this->Html->link($product->supplier['name'],['controller'=>'Pages','action'=>'Categories',$product->category['id']])?></span>
                                </div>
                                <div class="info-category">
                                    <label><b>Categories:</b> </label> 
                                    <span><?php echo $this->Html->link($product->category['name'],['controller'=>'Pages','action'=>'Categories',$product->category['id']])?></span>
                                </div>
                                <div class="info-category">
                                    <label><b>Part No: </b></label> 
                                    <span><?php echo $product->sku; ?></span>
                                </div>
                                <div class="info-category">
                                    <label><b>Availability:</b> </label> <span>In stock</span>
                                </div>
                                <div class="info-category">
                                    <label>Serial No: </label> <span><?php echo $product->serial_no ?></span>
                                </div>
                                <div class="info-category">
                                    <label>Type Model: </label> <span><?php echo $product->type_model ?></span>
                                </div>
                                <div class="info-category">
                                    <label>Quantity: </label> <span><?php echo $product->quantity ?></span>
                                </div>
                                <div class="info-category">
                                    <label>Origin: </label> <span><?php echo $product->origin ?></span>
                                </div>
                                <div class="product-info-cart">
                                    <span class="addcart-link cursor-point" price="<?= $product->retail_price;?>" name="<?= $product->product_name; ?>" product_id="<?= $product->id; ?>" picture="<?php echo $product->images[0]['thumbnail'] ?>">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </span>
                                   
                                </div>
                            </div>
                            <label><b>Remark:</b> </label> <div class="clearfix"></div>
                            <p class="product-description"><?= $product->short_description; ?> </p>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
</div>