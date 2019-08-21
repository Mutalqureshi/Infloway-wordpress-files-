
    <?php
global $fdata;
?>
    <footer> 
            <div class="our-process">
              <div class="container">
                <div class="row">
                  <div class="col-sm-8 offset-sm-2">
                    <div class="our-head">
                       <h1>Our<sub>process</sub></h1>
                            <div class="our-content">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent erat orci,
                              aliquam pretium iaculis nec,</p>
                            </div>
                    </div> 
                  </div><!-- offset-->
                    
                    <!-- fr-col-->
                </div><!--row-->
                    <div class="fr-col">
                    <div class="row"> 
                            <div class="col-lg-3 col-md-6 col-sm-6 center">
                                  <div class="circle-shaped"></div>
                              <div class="circle-shape">
                                  <h1>Stage #1</h1>
                                  <div class="fr-pera">
                                    <p>Initial 
                                    consultation </p>
                                  </div>
                              </div>
                            </div>
                            <!--  -->
                            <div class="col-lg-3 col-md-6 col-sm-6 center">
                                  <div class="circle-shaped"></div>
                              <div class="circle-shape">
                                  <h1>Stage #2</h1>
                                  <div class="fr-pera">
                                    <p>Involves the Event
                                    Coordinator</p>
                                  </div>
                              </div>
                            </div>
                            <!--  -->
                            <div class="col-lg-3 col-md-6 col-sm-6 center">
                                  <div class="circle-shaped"></div>
                              <div class="circle-shape">
                                  <h1>Stage #3</h1>
                                  <div class="fr-pera">
                                    <p>Hands-on planning
                                    experience </p>
                                  </div>
                              </div>
                            </div>
                            <!--  -->
                            <div class="col-lg-3 col-md-6 col-sm-6 center">
                                  <div class="circle-shaped"></div>
                              <div class="circle-shape">
                                  <h1>Stage #4</h1>
                                  <div class="fr-pera">
                                    <p>The day of
                                    the event</p>
                                  </div>
                              </div>
                            </div>
                        </div>
                </div><!-- fr-->
              </div><!-- container -->
            </div><!--ourprocess-->
            <div class="quick-inq">
              <div class="container"> 
                      <h1>QUICK INQUIRY</h1>
                      <div class="inq"> 
                          <p>TELL US YOUR STORY OR JUST SAY HELLO.</p>
                      </div>
                <div class="row"> 
                    <div class="col-md-8">
                      <?php echo do_shortcode('[contact-form-7 id="181" title="Contact form 1"]'); ?>
                      
                    </div>
                    <div class="col-md-4">
                      <?php if ( is_active_sidebar( 'iframe-map' ) ) :  // get shipping widget ?>
                              <?php dynamic_sidebar( 'iframe-map' ); ?>
                          <?php endif; ?>
                    </div>
                </div>
              </div>
            </div><!--quick inq-->
                <div class="foot-2">  
                    <div class="container"> 
                          <div class="row">
                            <div class="col-lg-6">
                            <div class="sec-nav">
                           <?php if ( is_active_sidebar( 'foot-sec-1' ) ) :  // get shipping widget ?>
                              <?php dynamic_sidebar( 'foot-sec-1' ); ?>
                          <?php endif; ?>
                              
                            </div><!--nav-->
                            </div>
                            <div class="col-lg-6 foot-sec-2">

                                  <?php if ( is_active_sidebar( 'foot-sec-2' ) ) :  // get shipping widget ?>
                                      <?php dynamic_sidebar( 'foot-sec-2' ); ?>
                                  <?php endif; ?>

                            </div><!--col-->
                          </div>
                    </div>           
                </div><!--foot -2-->
                <div class="last-foot">
                  <div class="container">
                    <div class="row">
                      <div class="policy">
                        <ul>
                          <li><?php echo $fdata['foot-text'] ; ?> <a href="<?php echo get_home_url() ?>">TheLadonaGroup.com</a> </li>
                          <li><a href="#">Privacy Policy</a></li>
                          <li>|</li>
                          <li><a href="#">Terms of Use</a></li>
                        </ul>
                      </div><!--policy-->
                      <div class="last-foot-social">
                          <ul>
                            <li>Follow us</li>
                           <!--  -->
                   <?php if( $fdata['linkedin']) {?><li><a target="_blank" href="<?php echo $fdata['linkedin']; ?>"><i class="fab fa-linkedin-in"></i>&nbsp;</a></li><?php } ?>

                           <?php if( $fdata['facebook']) {?><li><a target="_blank" href="<?php echo $fdata['facebook']; ?>"><i class="fab fa-facebook-f"></i>&nbsp;</a></li><?php } ?>

                    <?php if( $fdata['twitter']) {?><li><a target="_blank" href="<?php echo $fdata['twitter']; ?>"><i class="fab fa-twitter"></i>&nbsp;</a></li><?php } ?>

                    <?php if( $fdata['google-plus']) {?><li><a target="_blank" href="<?php echo $fdata['google-plus']; ?>"><i class="fab fa-google-plus"></i>&nbsp;</a></li><?php } ?>

                   <?php if( $fdata['youtube']) {?><li><a target="_blank" href="<?php echo $fdata['youtube']; ?>"><i class="fa fa-youtube"></i>&nbsp;</a></li><?php } ?>

                   <?php if( $fdata['instagram']) {?><li><a target="_blank" href="<?php echo $fdata['instagram']; ?>"><i class="fa fa-instagram"></i>&nbsp;</a></li><?php } ?>

                   <?php if( $fdata['pinterest']) {?><li><a target="_blank" href="<?php echo $fdata['pinterest']; ?>"><i class="fa fa-pinterest"></i>&nbsp;</a></li><?php } ?>

                          </ul>
                      </div><!--last-foot-social-->
                    </div>
                  </div>
                </div><!--last-foot-->
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <!-- -- -->
    <?php echo wp_footer(); ?>
  </body>
</html>