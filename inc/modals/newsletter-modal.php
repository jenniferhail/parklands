<div id="modal-1" class="modal newsletter micromodal-slide block basic-content one-col" aria-hidden="true">
	<div class="modal__overlay" tabindex="-1" data-micromodal-close>
		<div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
			<div class="modal__wrapper">
				<header class="modal__header">
					<h2 class="title h3" id="modal-1-title"><?php the_field( 'newsletter_title', 'option' ); ?>
</h2>
					<button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
				</header>
				<main class="modal__content" id="modal-1-content">
                    <?php the_field( 'newsletter_content', 'option' ); ?>
                    <?php gravity_form( get_field( 'gravity_forms_form_id', 'option' ), false, false, false, '', false ); ?>
				</main>
			</div>
		</div>
	</div>
</div>