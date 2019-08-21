<?php
global $fdata;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head >
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900|Dancing+Script:400,700|Lato:300,400,700,900&display=swap" rel="stylesheet">
    <?php if( $fdata['favicon-logo']) {echo '<link rel="shortcut icon" href="'.$fdata['favicon-logo']['url'].'" />';}?>
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
  <?php echo wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
      <div class="top-head">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php
                         if( $fdata['site-logo']['url']){
                            $img_src = $fdata['site-logo']['url'];
                        }
                        else {
                            $default_logo = get_bloginfo( 'template_url' ).'/img/logo.png';
                            $img_src = '';
                            if(file_exists( $default_logo ) ) {
                            $img_src = $default_logo;
                            }
                        }
                        echo '<img class="img-responsive check" src="'. $img_src .'" alt="'.get_bloginfo( 'name' ).'"/>';
                        ?>
                        </a>
                    </div>
            </div>
            <div class="col-sm-9">
                <div class="top-bar">
                  <ul>
                    <li><a href="#"><i class="fa fa-phone-alt"></i><?php echo $fdata['phone']; ?></a></li>
                    <li><a href="#"><i class="far fa-envelope"></i><?php echo $fdata['email']; ?></a></li>
                  </ul>
                </div><!--top-bar-->

                <div class="main-nav" id="main-nav">
                    <?php /* Primary navigation */
                    wp_nav_menu( array(
                    'menu' => 'menu-1',
                    )
                    );
                    ?>
                </div><!-- -->
            </div><!--col-sm-9-->
          </div>
        </div>
      </div><!--top-head-->

