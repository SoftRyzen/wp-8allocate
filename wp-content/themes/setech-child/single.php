<?php
defined( 'ABSPATH' ) or die();

?>
	<?php get_header() ?>
	<style type="text/css">
		span.post-date {
			display: none !important;
		}
		.post-date {
		    display: unset;
   			position: unset !important;
    		background-color: transparent !important;
    		font-size: 14px!important;
		}
		.post-date::before {
			display: none;
		}
		.post-title {
            min-height: unset;
            font-size: 16px !important;
    		line-height: 19px !important;
    		font-weight: 400 !important;
        }
        .page_title_container {
    		display: none;
		}
		.post-format img {
    		-webkit-border-radius: 0px;
    		border-radius: 0px;
		}
	</style>
		<?php if ( have_posts() ): ?>
			<div class="single_content">

				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part( 'tmpl/post/content', 'single' ) ?>
				<?php endwhile ?>

				<?php get_template_part( 'tmpl/post/content-navigator' ) ?>

				<?php setech__related_posts() ?>

				<?php setech__comments_list() ?>
			</div>
		<?php endif ?>

		<div class="get-help-container">
			<div class="rb_textmodule with_icon align_center mobile_align_center">
				<h3 class="rb_textmodule_title ">8allocate team will have your back</h3>
				<div class="rb_textmodule_content_wrapper">
					<p style="text-align: center; color: black;">Don’t wait until someone else will benefit from your project ideas. Realize it now.</p>
					<div id="gtx-trans" style="position: absolute; left: 364px; top: 38px;">
						<div class="gtx-trans-icon"></div>
					</div>
				</div>
			</div>
			<div class="rb_button_wrapper ">
				<a class="rb_button simple large" href="/contact/">
					<span>Let's start!</span>
				</a>
			</div>
		</div>
		<div class="vc_row-full-width vc_clearfix"></div>

	<?php get_footer() ?>
