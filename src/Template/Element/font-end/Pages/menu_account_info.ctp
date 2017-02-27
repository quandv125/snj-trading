<ul class="menu-account-info">
	<li><?php echo $this->Html->link(__("Account Dashboard"), ['controller'=>'pages','action' => 'accounts']);?></li>
	<li><?php echo $this->Html->link(__("Products"), ['controller'=>'pages','action' => 'ProductsOfSuppliers', $user_info['id']]);?></li>
	<!-- <li><?php echo $this->Html->link(__("Messages"), ['controller'=>'pages','action' => 'accounts']);?></li> -->
	<!--<li><?php echo $this->Html->link(__("Cancellations"), ['controller'=>'pages','action' => 'accounts']);?></li>
	<li><?php echo $this->Html->link(__("Payment Methods"), ['controller'=>'pages','action' => 'accounts']);?></li> -->
	<!-- <li><?php echo $this->Html->link(__("Personal Information"), ['controller'=>'pages','action' => 'PersonalInformation']);?></li> -->
	<!-- <li><?php echo $this->Html->link(__("Address Book"), ['controller'=>'pages','action' => 'accounts']);?></li>
	<li><?php echo $this->Html->link(__("Vouchers"), ['controller'=>'pages','action' => 'accounts']);?></li>
	<li><?php echo $this->Html->link(__("Invitations"), ['controller'=>'pages','action' => 'accounts']);?></li> -->
</ul>	

<?php if ($this->request->params['action'] == 'productsOfSuppliers'): ?>
	

<div class="sidebar-shop sidebar-left">
	<div class="widget widget-filter">
		<div class="box-filter">
			<h2 class="widget-title">Search</h2>
			<ul>
				<li> 
					<input id="search-highlight" class="form-control" name="search-highlight" type="text" data-list=".highlight_list" autocomplete="off">
				</li>
				<br/>
				<li>
					<select class="live-search-box form-control">
                    	<option value="all">All</option>
                    	<option value="active1">Active</option>
                    	<option value="active0">Deactive</option>
                    </select>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php endif ?>