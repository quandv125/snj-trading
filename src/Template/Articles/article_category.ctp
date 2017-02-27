
<div class="content-page">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4 col-sm-12">
				<?php echo $this->element('font-end/sidebar-left-articles') ?>
			</div>
			<div class="col-md-9 col-sm-8 col-sm-12">
				<div class="masonry-list-post">

					<?php foreach ($articles as $key => $article): ?>

						<div class="item-post-masonry">
							<div class="blog-post-thumb">
								<div class="post-info-extra">
									<div class="post-date"><?php echo $article->created; ?></div>
									<div class="post-format"><i class="fa fa-picture-o"></i></div>
								</div>
								<div class="zoom-image-thumb">
									<?php if (empty($article->picture)): ?>
										<?php echo $this->Html->image('images/photos/blog/1.jpg') ?>
									<?php else: ?>
										<?php echo $this->Html->image($article->picture) ?>
									<?php endif ?>
								</div>
							</div>
							<div class="blog-post-info">

								<h3 class="post-title">
								<?php echo $this->Html->link(substr($article->title,0,35).'...', ['controller' => 'articles','action' => 'details', $article->id]) ?>
								</h3>
								<!-- <ul class="post-date-author">
									<li>By: <a href="#">Admin</a></li>
									<li><a href="#comment">03 Comment</a></li>
								</ul> -->
								<p class="desc"><?= substr($article->content,0,100).'...' ?></p>
								
								<?php echo $this->Html->link('Read More', ['controller' => 'articles','action' => 'details', $article->id],['class'=> 'post-readmore']) ?>
							</div>
						</div>
					<?php endforeach ?>
					
					
				</div>	
				<!-- <div class="post-paginav masonry-paginav">
					<a href="#" class="curent-page">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">next <i class="fa fa-angle-double-right"></i></a>
				</div> -->
			</div>
		</div>
	</div>
</div>
<!-- End Content Page -->