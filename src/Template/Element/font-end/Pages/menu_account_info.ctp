<ul class="menu-account-info">
	<li><?= $this->Html->link(__("Accounts"), ['controller'	=>'pages','action'=>'accounts']);?></li>
	<li><?= $this->Html->link(__("Products"), ['controller'	=>'pages','action'=>'ProductsOfSuppliers', $user_info['id']]);?></li>
	<li><?= $this->Html->link(__("Orders"), ['controller'	=>'pages','action' => 'orders']);?></li> 
	<li><?= $this->Html->link(__("Inquiry"), ['controller'	=>'Invoices','action' => 'inquiry']);?></li> 
	<li><?= $this->Html->link(__("WishList"), ['controller'	=>'pages','action' => 'wishlists']);?></li>
	
</ul>	

<!-- <?php //if ($this->request->params['action'] == 'productsOfSuppliers'): ?>
<?php //endif ?> -->