/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { RichText, useBlockProps } from '@wordpress/block-editor';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @param {Object}   props               Properties passed to the function.
 * @param {Object}   props.attributes    Available block attributes.
 * @param {Function} props.setAttributes Function that updates individual attributes.
 *
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { eyebrow, heading, description, footer, testimonials } = attributes;
	const blockProps = useBlockProps( {
		className: 'testimonial-carousel',
	} );
	const updateTestimonial = ( index, key, value ) => {
		const updatedTestimonials = testimonials.map(
			( testimonial, itemIndex ) =>
				itemIndex === index
					? { ...testimonial, [ key ]: value }
					: testimonial
		);
		setAttributes( { testimonials: updatedTestimonials } );
	};

	return (
		<section { ...blockProps }>
			<span
				className="testimonial-carousel__code testimonial-carousel__code--top"
				aria-hidden="true"
			>
				&lt;AI /&gt;
			</span>
			<span
				className="testimonial-carousel__code testimonial-carousel__code--bottom"
				aria-hidden="true"
			>
				&#123; workflow: &apos;optimized&apos; &#125;
			</span>
			<div className="testimonial-carousel__inner">
				<header className="testimonial-carousel__header">
					<div className="testimonial-carousel__eyebrow">
						<span
							className="testimonial-carousel__spark"
							aria-hidden="true"
						/>
						<RichText
							tagName="span"
							value={ eyebrow }
							onChange={ ( value ) =>
								setAttributes( { eyebrow: value } )
							}
							placeholder={ __(
								'Eyebrow',
								'testimonial-carousel'
							) }
						/>
					</div>
					<RichText
						tagName="h2"
						value={ heading }
						onChange={ ( value ) =>
							setAttributes( { heading: value } )
						}
						placeholder={ __( 'Heading', 'testimonial-carousel' ) }
					/>
					<RichText
						tagName="p"
						className="testimonial-carousel__description"
						value={ description }
						onChange={ ( value ) =>
							setAttributes( { description: value } )
						}
						placeholder={ __(
							'Description',
							'testimonial-carousel'
						) }
					/>
				</header>

				<div className="testimonial-carousel__cards">
					{ testimonials.map( ( testimonial, index ) => (
						<article
							className="testimonial-carousel__card"
							key={ index }
						>
							<div
								className="testimonial-carousel__stars"
								aria-label={ __(
									'5 out of 5 stars',
									'testimonial-carousel'
								) }
							>
								{ Array.from(
									{ length: 5 },
									( item, starIndex ) => (
										<span
											key={ starIndex }
											aria-hidden="true"
										/>
									)
								) }
							</div>
							<RichText
								tagName="blockquote"
								value={ testimonial.quote }
								onChange={ ( value ) =>
									updateTestimonial( index, 'quote', value )
								}
								placeholder={ __(
									'Testimonial quote',
									'testimonial-carousel'
								) }
							/>
							<div className="testimonial-carousel__author">
								<RichText
									tagName="span"
									className={ `testimonial-carousel__avatar testimonial-carousel__avatar--${
										index + 1
									}` }
									value={ testimonial.initials }
									onChange={ ( value ) =>
										updateTestimonial(
											index,
											'initials',
											value
										)
									}
									placeholder={ __(
										'Initials',
										'testimonial-carousel'
									) }
								/>
								<div className="testimonial-carousel__author-copy">
									<RichText
										tagName="strong"
										value={ testimonial.name }
										onChange={ ( value ) =>
											updateTestimonial(
												index,
												'name',
												value
											)
										}
									/>
									<RichText
										tagName="span"
										value={ testimonial.role }
										onChange={ ( value ) =>
											updateTestimonial(
												index,
												'role',
												value
											)
										}
									/>
									<RichText
										tagName="span"
										className="testimonial-carousel__company"
										value={ testimonial.company }
										onChange={ ( value ) =>
											updateTestimonial(
												index,
												'company',
												value
											)
										}
									/>
								</div>
							</div>
							<div className="testimonial-carousel__metric">
								<span
									className="testimonial-carousel__bolt"
									aria-hidden="true"
								/>
								<RichText
									tagName="span"
									value={ testimonial.metric }
									onChange={ ( value ) =>
										updateTestimonial(
											index,
											'metric',
											value
										)
									}
								/>
							</div>
						</article>
					) ) }
				</div>

				<RichText
					tagName="p"
					className="testimonial-carousel__footer"
					value={ footer }
					onChange={ ( value ) => setAttributes( { footer: value } ) }
					placeholder={ __( 'Footer text', 'testimonial-carousel' ) }
				/>
			</div>
		</section>
	);
}
