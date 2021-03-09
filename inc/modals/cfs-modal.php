<div id="modal-4" class="modal micromodal-slide cfs block" aria-hidden="true">
	<div class="modal__overlay" tabindex="-1" data-micromodal-close>
		<div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-4-title">
			<div class="modal__wrapper">
				<header class="modal__header">
					<button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
				</header>
				<main class="modal__content" id="modal-4-content">
					<div class="cfs-module">
						<div class="row north">
							<div class="col title">
								<h2 class="h4">North Beckley to Creekside</h2>
								<span>Peewee Valley Gauge</span>
							</div>
							<div class="col button">
								<div id="cfs-1">
									<cfs-data-1></cfs-data-1>
								</div>
							</div>
						</div>
						<div class="row line">
							<div class="col title">
								<h2 class="h4">Creekside to Seaton Valley</h2>
								<span>Fisherville Gauge</span>
							</div>
							<div class="col button">
								<div id="cfs-2">
									<cfs-data-2></cfs-data-2>
								</div>
							</div>
						</div>
						<div class="row south">
							<div class="col title">
								<h2 class="h4">Seaton Valley to Cliffside</h2>
								<span>Mt. Washington Gauge</span>
							</div>
							<div class="col button">
								<div id="cfs-3">
									<cfs-data-3></cfs-data-3>
								</div>
							</div>
						</div>
					</div>
					<?php if ( have_rows( 'cfs_buttons_buttons', 'option' ) ) : ?>
						<div class="wp-block-buttons">
							<?php while ( have_rows( 'cfs_buttons_buttons', 'option'  ) ) : the_row(); ?>
								<?php $link = get_sub_field( 'link' ); ?>
								<?php if ( $link ) : ?>
									<div class="wp-block-button">
										<a href="<?php echo esc_url( $link['url'] ); ?>" class="wp-block-button__link" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
									</div>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</main>
			</div>
		</div>
	</div>
</div>