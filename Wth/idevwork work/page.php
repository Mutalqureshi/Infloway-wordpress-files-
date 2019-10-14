<?php
/**
 * The template for displaying all pages
 *
 *
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main all-other-pages">
			<div class="other-page-title">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-title"><?php the_title(); ?></h1>
							<div class="breadcrumbs main-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
								<?php if(function_exists('bcn_display'))
								{
									bcn_display();
								}?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="container">	
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
			/* 	if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; */
			endwhile; // End of the loop.
			?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();