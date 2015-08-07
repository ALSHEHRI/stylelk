<?php get_header();?>
<section id="content" class="row">
	<div class="col-md-8 left-column">
		<ul id="tab-menu" class="nav nav-tabs hidden-xs">
			<li class="pull-right active"><a href="#latest-content" data-toggle="tab"><?php _e('LATEST STORIES') ?></a></li>
			<li class="pull-left"><a href="#popular-content" data-toggle="tab"><?php _e('POPULAR STORIES') ?></a></li>
		</ul>
		<div class="tab-content">
			<div id="latest-content" class="tab-pane fade in active">
				
				<?php 
				//<!-- WP Query get post follow Date posted -->
				global $wpdb;
				global $post;
				$args=array(
					'post_type' => 'post',
					'post_status'=>'publish',
					'orderby'=>'post_date',
					'order'=>'DESC',
					'posts_per_page'=>10
					);
				$the_query = new WP_Query( $args);
				if($the_query->have_posts()):
                                while ($the_query->have_posts()): $the_query->the_post();
                                    setup_postdata($post);
                                    get_template_part('content','short');
                                endwhile;
                                 wp_reset_postdata();
                else:
                                ?>
                        <p> <?php echo _e('Not have post in category'); ?></p>
                    <?php
                endif;
				 ?>
			</div>
			<div id="popular-content" class="tab-pane fade in">	
				
			<?php	
			//<!-- WP Query get post follow views -->
			$args=array(
					'post_type' => 'post',
					'post_status'=>'publish',
					'meta_key'=>'post_views_count',
					'orderby'=>'meta_value_num',
					'order'=>'DESC',
					'posts_per_page'=>10
					);
			$the_query = new WP_Query( $args);
				if($the_query->have_posts()):
                                while ($the_query->have_posts()): $the_query->the_post();
                                    setup_postdata($post);
                                    get_template_part('content','short');
                                endwhile;
                                 wp_reset_postdata();
                else:
                                ?>
                        <p> <?php echo _e('Not have post Populartes'); ?></p>
                    <?php
                endif;
			?>	
			</div>
		</div> <!-- END TABCONTENT -->
	</div>
	<div class="col-md-4 visible-md visible-lg right-column newsletter-column">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:block"
		data-ad-client="ca-pub-8242009209629639"
		data-ad-slot="8776381107"
		data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<h4><?php _e('follow us')?></h4>
		<hr>
		<?php
		// newsletter form
			$newsletter=new NewsletterWidget;
			$widget_form=$newsletter->get_widget_form();
			echo $widget_form;  
		?>
	</div>
</section>	
<?php get_footer(); ?>