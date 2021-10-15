<?php
// Check that the post has a 'score-*' tag
function lamb_check_review_rating( $style ) {

	$output = "";

	for ( $count = 1; $count <= 10; $count++ ) {

		// Does the post include the review tag prefix specified on the Theme Settings page?
		if ( has_tag( get_theme_mod( 'theme_mod_review_rating_tag' ) . '-' . $count ) ) {

			$output .= lamb_show_review_score( $review_rating=$count, $style=$style );

		}

	}

	return $output;

}

// Front-end Review Functions
function lamb_show_review_score( $review_rating, $style ) {

	if ( $style == 'full' ) {
		$extra_css = ' medium-margin-bottom';
	} else {
		$extra_css = ' ';
	}

	$review_score_metric = get_theme_mod( 'theme_mod_review_rating_metric' );

	if ( $review_score_metric == 'thumbs' ) {

		if ( $review_rating >= 6 ) {
			$review_rating_display = '<i class="fas fa-thumbs-up"></i>';
		} else {
			$review_rating_display = '<i class="fas fa-thumbs-down"></i>';
		}

	} else if ( $review_score_metric == 'stars' ) {

		$formatted_score = $review_rating / 2;
		$review_rating_suffix = ' out of 5 stars';

		$star = '<span class="gold-text"><i class="fas fa-star"></i></span>';
		$half_star = '<span class="gold-text"><i class="fas fa-star-half-alt"></i></span>';
		$empty_star = '<span class="gold-text"><i class="far fa-star"></i></span>';

		if ( $review_rating == 1 ) {

			$review_rating_display = $half_star . $empty_star . $empty_star . $empty_star . $empty_star;
			$review_rating_in_a_nutshell = "Dreadful";

		} else if  ($review_rating == 2 ) {

			$review_rating_display = $star . $empty_star . $empty_star . $empty_star . $empty_star;
			$review_rating_in_a_nutshell = "Awful";

		} else if ( $review_rating == 3 ) {

			$review_rating_display = $star . $half_star . $empty_star . $empty_star . $empty_star;
			$review_rating_in_a_nutshell = "Very poor";

		} else if ( $review_rating == 4 ) {

			$review_rating_display = $star . $star . $empty_star . $empty_star . $empty_star;
			$review_rating_in_a_nutshell = "Poor";

		} else if ( $review_rating == 5 ) {

			$review_rating_display = $star . $star . $half_star . $empty_star . $empty_star;
			$review_rating_in_a_nutshell = "Average";

		} else if ( $review_rating == 6 ) {

			$review_rating_display = $star . $star . $star . $empty_star . $empty_star;
			$review_rating_in_a_nutshell = "Okay";

		} else if ( $review_rating == 7 ) {

			$review_rating_display = $star . $star . $star . $half_star . $empty_star;
			$review_rating_in_a_nutshell = "Good";

		} else if ( $review_rating == 8 ) {

			$review_rating_display = $star . $star . $star . $star . $empty_star;
			$review_rating_in_a_nutshell = "Very good";

		} else if ( $review_rating == 9 ) {

			$review_rating_display = $star . $star . $star . $star . $half_star;
			$review_rating_in_a_nutshell = "Outstanding";

		} else if ( $review_rating == 10 ) {

			$review_rating_display = $star . $star . $star . $star . $star;
			$review_rating_in_a_nutshell = "Flawless";

		}

	} else { // if unselected or default, use 10-point scale

		$formatted_score = $review_rating;
		$review_rating_suffix = '/10';
		$review_rating_display = $review_rating . $review_rating_suffix;

	}

	$output = "";

	$output .= '<div class="brand--primary-background-color cool-box review-score-container review-score-style-' . $style . ' score-' . $review_rating . ' ' . $extra_css . '" id="review-' . get_the_ID() . '">';

		//$output .= '<div class="fill-area sheen"></div>';

		$output .= '<div class="has-big-font-size review-score">';
			$output .= '<span>';
				$output .= $review_rating_display;
			$output .= '</span>';
		$output .= '</div>';

		if ($style == 'full') {

			$output .= '<div class="brand--primary-background-color-lighter review-score__summary">';
				$output .= '<div class="has-big-font-size">';
					$output .= $review_rating_in_a_nutshell;
				$output .= '</div>';
				$output .= '<div class="">';
					$output .= 'This product scored ';
					$output .= $formatted_score;
					$output .= $review_rating_suffix;
				$output .= '</div>';
			$output .= '</div>';

		}

	$output .= '</div>';

	return $output;

}
