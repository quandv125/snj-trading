<div class="content-page">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-sm-12">
						<?php echo $this->element('font-end/sidebar-left-articles') ?>
					</div>
					<div class="col-md-9 col-sm-8 col-sm-12">
						<div class="main-single-post">
							<div class="single-post-leading">
							<?php if (!empty($articles->picture)): ?>
								<div class="zoom-image-thumb">
									<?php echo $this->Html->image('images/blog/single1.png') ?>
								</div>
							<?php endif ?>
								
								<h2><?php echo $articles->title; ?></h2>
							<!-- 	<ul class="post-date-author">
									<li><?php //echo $articles->created; ?></li>
									<li>By: <a href="#">Admin</a></li>
									<li><a href="#comment">03 Comment</a></li>
								</ul> -->
							</div>
							
							
							<p class="desc"><?php echo $articles->content; ?> </p>
							
							<div class="tabs-share">
								<div class="row">
									<!-- <div class="col-md-6 col-sm-12 col-xs-12">
										<div class="single-post-tabs">
											<label>Tags: </label>
											<a href="#">Photos, </a>
											<a href="#">Headphone, </a>
											<a href="#">Audio, </a>
											<a href="#">Techonology,</a>
											<a href="#">Iphone</a>
										</div>
									</div> -->
									<!-- <div class="col-md-6 col-sm-12 col-xs-12">
										<div class="single-post-share">
											<label>Share</label>
											<a href="#"><i class="fa fa-facebook"></i></a>
											<a href="#"><i class="fa fa-twitter"></i></a>
											<a href="#"><i class="fa fa-linkedin"></i></a>
											<a href="#"><i class="fa fa-pinterest"></i></a>
											<a href="#"><i class="fa fa-google-plus"></i></a>
										</div>
									</div> -->
								</div>
							</div>
							
						<!-- 	<div class="single-related-post">
								<h2 class="title">Relatest posts</h2>
								<div class="single-related-post-slider">
									<div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1],[480,2],[1024,3]]">
										<div class="item">
											<div class="item-single-related-post">
												<div class="zoom-image-thumb">
													<a href="#"><img src="images/blog/re1.png" alt="" /></a>
												</div>
												<div class="single-related-post-info">
													<h3><a href="#">Lorem Khaled Ipsum is a major </a></h3>
													<ul class="post-date-author">
														<li>February 20 2016</li>
														<li>By: <a href="#">Admin</a></li>
													</ul>
													<p>Porem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut </p>
													<a href="#" class="readmore">Read More</a>
													<a href="#" class="related-comment"><i class="fa fa-comment-o"></i> 03</a>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-single-related-post">
												<div class="zoom-image-thumb">
													<a href="#"><img src="images/blog/re2.png" alt="" /></a>
												</div>
												<div class="single-related-post-info">
													<h3><a href="#">Lorem Khaled Ipsum is a major </a></h3>
													<ul class="post-date-author">
														<li>February 20 2016</li>
														<li>By: <a href="#">Admin</a></li>
													</ul>
													<p>Porem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut </p>
													<a href="#" class="readmore">Read More</a>
													<a href="#" class="related-comment"><i class="fa fa-comment-o"></i> 11</a>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-single-related-post">
												<div class="zoom-image-thumb">
													<a href="#"><img src="images/blog/re3.png" alt="" /></a>
												</div>
												<div class="single-related-post-info">
													<h3><a href="#">Lorem Khaled Ipsum is a major </a></h3>
													<ul class="post-date-author">
														<li>February 20 2016</li>
														<li>By: <a href="#">Admin</a></li>
													</ul>
													<p>Porem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut </p>
													<a href="#" class="readmore">Read More</a>
													<a href="#" class="related-comment"><i class="fa fa-comment-o"></i> 07</a>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-single-related-post">
												<div class="zoom-image-thumb">
													<a href="#"><img src="images/blog/re1.png" alt="" /></a>
												</div>
												<div class="single-related-post-info">
													<h3><a href="#">Lorem Khaled Ipsum is a major </a></h3>
													<ul class="post-date-author">
														<li>February 20 2016</li>
														<li>By: <a href="#">Admin</a></li>
													</ul>
													<p>Porem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut </p>
													<a href="#" class="readmore">Read More</a>
													<a href="#" class="related-comment"><i class="fa fa-comment-o"></i> 03</a>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-single-related-post">
												<div class="zoom-image-thumb">
													<a href="#"><img src="images/blog/re2.png" alt="" /></a>
												</div>
												<div class="single-related-post-info">
													<h3><a href="#">Lorem Khaled Ipsum is a major </a></h3>
													<ul class="post-date-author">
														<li>February 20 2016</li>
														<li>By: <a href="#">Admin</a></li>
													</ul>
													<p>Porem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut </p>
													<a href="#" class="readmore">Read More</a>
													<a href="#" class="related-comment"><i class="fa fa-comment-o"></i> 03</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							<!-- End Related Comment -->
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Content Page -->