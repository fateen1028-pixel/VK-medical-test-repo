<div class="col-md-5 col-lg-4 col-xl-4 theiaStickySidebar">
							
							<div class="card post-widget">
								<div class="card-body">
									<h5 class="mb-3">Our Services</h5>
									<ul class="latest-posts">
										
                                        <?php
										$iCnt = "0"; 
										$query ="select * from `email2` order by id asc";
										$rsquery = mysqli_query(dbcon(),$query);
										while(@$rsdata = mysqli_fetch_object($rsquery))
										{ 
										  $iCnt++;
										?>
                                        
                                        <li>
											<div class="post-thumb">
												<a href="<?php echo str_replace(" ","_",$rsdata->cat); ?>/">
													<img class="img-fluid" src="Products/Large/<?php echo $rsdata->banner_img; ?>" alt="blog-image">
												</a>
											</div>
											<div class="post-info">
												<a href="<?php echo str_replace(" ","_",$rsdata->cat); ?>/"><h4>
													<?php echo $rsdata->cat; ?> <br> 
												</h4>
                                                <?php echo $rsdata->email; ?></a>
											</div>
										</li>
                                        
                                        <?php } ?>
										
									</ul>
								</div>
							</div>
                            
                            
							
							<!-- /Right Details -->
							
						</div>