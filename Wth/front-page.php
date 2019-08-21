<?php echo get_header(); ?>
    <header><!-- header-->
      <?php  $slider = $fdata['slider_code']; ?>
        <?php echo do_shortcode($slider); ?>
    </header>
    <div class="form-content container">
                  <form action="#">
                      <div class="row">
                        <div class="one-third"> 
                            <div class="form-col">
                              <div class="events">
                                <h5>looking for</h5>
                                <input type="text" placeholder="Events">
                              </div>
                            </div> 
                              <!--  -->
                            <div class="form-col">
                              <div class="events">
                                <h5>In</h5>
                                <input type="text" placeholder="USA">
                              </div>
                            </div>
                            <!--  -->
                            <div class="last-col">
                              <div class="sec-last-col">  
                                  <div class="dates">
                                      <h5>On</h5>
                                          <div class="custom-select">
                                            <select>
                                              <option value="">Any date</option>
                                              <option value="">Any date</option>
                                              <option value="">Any date</option>
                                              <option value="">Any date</option>
                                            </select>
                                          </div>
                                          <!--cutom select-->
                                  </div>
                              </div><!--lastsec-->
                                <div class="button-sec">  
                                    <button class="submit">
                                      <a href="#">
                                        <i class="fa fa-search"></i>
                                      </a>
                                    </button>
                                </div>
                              <!--dates -->
                            </div> 
                        </div>
                      </div>
                  </form>
                </div><!--content form --->
      
<div id="primary" class="content-area">
    <main id="main" class="site-main container">
        <?php
        while ( have_posts() ) :
        the_post();

        echo '<div class="entry-content">';
        the_content();
        echo '</div><!-- .entry-content -->';

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div>
  
<?php echo get_footer(); ?>
