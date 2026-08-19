<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$testimonials = isset( $attributes['testimonials'] ) && is_array( $attributes['testimonials'] ) ? $attributes['testimonials'] : array();
$total        = count( $testimonials );

wp_interactivity_state(
	'testimonial-carousel',
	array(
		'isCurrent' => static function () {
			$context = wp_interactivity_get_context( 'testimonial-carousel' );
			return isset( $context['index'], $context['currentIndex'] ) && $context['index'] === $context['currentIndex'];
		},
		'isFirst'   => static function () {
			$context = wp_interactivity_get_context( 'testimonial-carousel' );
			return empty( $context['currentIndex'] );
		},
		'isLast'    => static function () {
			$context = wp_interactivity_get_context( 'testimonial-carousel' );
			return isset( $context['currentIndex'], $context['total'] ) && $context['currentIndex'] >= $context['total'] - 1;
		},
		'statusTemplate' => esc_html__( 'Testimonial %1$d of %2$d', 'testimonial-carousel' ),
		'statusText'     => static function () {
			$context = wp_interactivity_get_context( 'testimonial-carousel' );
			return sprintf(
				/* translators: 1: current testimonial number, 2: total testimonials. */
				esc_html__( 'Testimonial %1$d of %2$d', 'testimonial-carousel' ),
				( $context['currentIndex'] ?? 0 ) + 1,
				$context['total'] ?? 0
			);
		},
	)
);
?>

<section
	<?php echo get_block_wrapper_attributes( array( 'class' => 'testimonial-carousel' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	data-wp-interactive="testimonial-carousel"
	<?php echo wp_interactivity_data_wp_context( array( 'currentIndex' => 0, 'total' => $total ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
>
	<span class="testimonial-carousel__code testimonial-carousel__code--top" aria-hidden="true">&lt;AI /&gt;</span>
	<span class="testimonial-carousel__code testimonial-carousel__code--bottom" aria-hidden="true">{ workflow: 'optimized' }</span>
	<div class="testimonial-carousel__inner">
		<header class="testimonial-carousel__header">
			<div class="testimonial-carousel__eyebrow">
				<span class="testimonial-carousel__spark" aria-hidden="true"></span>
				<span><?php echo wp_kses_post( $attributes['eyebrow'] ?? '' ); ?></span>
			</div>
			<h2><?php echo wp_kses_post( $attributes['heading'] ?? '' ); ?></h2>
			<p class="testimonial-carousel__description"><?php echo wp_kses_post( $attributes['description'] ?? '' ); ?></p>
		</header>

		<div class="testimonial-carousel__cards">
			<?php foreach ( $testimonials as $index => $testimonial ) : ?>
				<article
					class="testimonial-carousel__card<?php echo 0 === $index ? ' is-current' : ''; ?>"
					<?php echo wp_interactivity_data_wp_context( array( 'index' => $index ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					data-wp-class--is-current="state.isCurrent"
				>
					<div class="testimonial-carousel__stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'testimonial-carousel' ); ?>">
						<?php for ( $star = 0; $star < 5; $star++ ) : ?>
							<span aria-hidden="true"></span>
						<?php endfor; ?>
					</div>
					<blockquote><?php echo wp_kses_post( $testimonial['quote'] ?? '' ); ?></blockquote>
					<div class="testimonial-carousel__author">
						<span class="testimonial-carousel__avatar testimonial-carousel__avatar--<?php echo esc_attr( $index + 1 ); ?>"><?php echo wp_kses_post( $testimonial['initials'] ?? '' ); ?></span>
						<div class="testimonial-carousel__author-copy">
							<strong><?php echo wp_kses_post( $testimonial['name'] ?? '' ); ?></strong>
							<span><?php echo wp_kses_post( $testimonial['role'] ?? '' ); ?></span>
							<span class="testimonial-carousel__company"><?php echo wp_kses_post( $testimonial['company'] ?? '' ); ?></span>
						</div>
					</div>
					<div class="testimonial-carousel__metric">
						<span class="testimonial-carousel__bolt" aria-hidden="true"></span>
						<span><?php echo wp_kses_post( $testimonial['metric'] ?? '' ); ?></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="testimonial-carousel__controls">
			<button type="button" data-wp-on--click="actions.previous" data-wp-bind--disabled="state.isFirst">
				<span aria-hidden="true">&#8592;</span>
				<span class="screen-reader-text"><?php esc_html_e( 'Previous testimonial', 'testimonial-carousel' ); ?></span>
			</button>
			<p aria-live="polite" data-wp-text="state.statusText"><?php echo esc_html( sprintf( __( 'Testimonial %1$d of %2$d', 'testimonial-carousel' ), 1, $total ) ); ?></p>
			<button type="button" data-wp-on--click="actions.next" data-wp-bind--disabled="state.isLast">
				<span aria-hidden="true">&#8594;</span>
				<span class="screen-reader-text"><?php esc_html_e( 'Next testimonial', 'testimonial-carousel' ); ?></span>
			</button>
		</div>

		<p class="testimonial-carousel__footer"><span><?php echo wp_kses_post( $attributes['footer'] ?? '' ); ?></span></p>
	</div>
</section>
