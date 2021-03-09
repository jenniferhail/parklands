<?php if(get_field('enable_donate_block', 'option')) : ?>

	<!-- This will use basic content as a starting point -->
	<section class="block basic-content donate bg">
		<?php $image = get_field( 'image', 'option' ); ?>
		<?php if ( $image ) : ?>
			<div class="bg-image" style="background-image:url(<?php echo esc_url( $image['url'] ); ?>);">
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="visually-hidden"/>
			</div>
		<?php endif; ?>
		<div class="wrapper">
			<div class="row">
				<div class="col">
					<div class="graph">
						<div class="left">

							<span class="text"><?php the_field( 'to-date_text', 'option' ); ?></span>

							<?php $to_date_amount = get_field( 'to-date_amount', 'option' ); ?>
							<?php $goal_amount = get_field( 'goal_amount', 'option' ); ?>

							<?php $percent_to_goal = ($to_date_amount / $goal_amount) * 100; ?>

							<span class="number">$</span><span id="goal-number" class="number" data-count="<?php echo $to_date_amount; ?>"
								data-speed="3"><?php echo number_format($to_date_amount); ?></span>
								
						</div>
						<div class="center">
							<div class="donations">
								<!-- Print out the percentage in the css variable and the number span -->
								<div class="amount-bubble" style="--amount: <?php echo $percent_to_goal; ?>%;"><span id="bubble-number" class="number"
										data-count="9" data-speed="3"><?php echo $percent_to_goal; ?></span><span class="percent">%</span>
								</div>
								<div class="container">
									<div class="goal">
										<span class="marker"></span>
										<span class="marker"></span>
										<span class="marker"></span>
										<span class="marker"></span>
									</div>
									<!-- Calculate and print out the percetage in this css variable -->
									<!-- The percentage needs to be -100 + the percentage of donations
										So, 9% is -100 + 9, which equals -91% -->
									<?php $remaining_precent = (-100 + $percent_to_goal); ?>

									<div class="amount" style="--percentage: <?php echo $remaining_precent; ?>%;"></div>
								</div>


							</div>
						</div>
						<div class="right">

							<span class="text"><?php the_field( 'goal_text', 'option' ); ?></span>

							<span class="number">$<?php echo number_format($goal_amount); ?></span>

						</div>
					</div>
					<div class="content">
						<?php if ( have_rows( 'donate_title_title', 'option' ) ) : ?>
							<h2 class="title">
								<?php while ( have_rows( 'donate_title_title', 'option' ) ) : the_row(); ?>
									<span class="line <?php the_sub_field( 'font_size' ); ?> <?php the_sub_field( 'line_break' ); ?> <?php the_sub_field( 'font_color' ); ?>"><?php the_sub_field( 'line' ); ?></span>
								<?php endwhile; ?>
							</h2>
						<?php endif; ?>
						<?php the_field( 'content', 'option' ); ?>
					</div>
					<?php if ( have_rows( 'buttons', 'option' ) ) : ?>
						<div class="wp-block-buttons">
							<?php while ( have_rows( 'buttons', 'option' ) ) : the_row(); ?>
								<?php $link = get_sub_field( 'link' ); ?>
								<?php if ( $link ) : ?>
									<div class="wp-block-button">
										<a href="<?php echo esc_url( $link['url'] ); ?>" class="wp-block-button__link" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

          