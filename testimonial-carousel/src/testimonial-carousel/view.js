import { getContext, store } from '@wordpress/interactivity';

const { state } = store( 'testimonial-carousel', {
	state: {
		get isCurrent() {
			const context = getContext();
			return context.index === context.currentIndex;
		},
		get isFirst() {
			return getContext().currentIndex === 0;
		},
		get isLast() {
			const { currentIndex, total } = getContext();
			return currentIndex >= total - 1;
		},
		get statusText() {
			const { currentIndex, total } = getContext();
			return state.statusTemplate
				.replace( '%1$d', currentIndex + 1 )
				.replace( '%2$d', total );
		},
	},
	actions: {
		previous() {
			const context = getContext();
			context.currentIndex = Math.max( 0, context.currentIndex - 1 );
		},
		next() {
			const context = getContext();
			context.currentIndex = Math.min(
				context.total - 1,
				context.currentIndex + 1
			);
		},
	},
} );
