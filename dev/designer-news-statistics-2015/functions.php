<?php

function get_data ($file) {
	$data = file("data/".$file.".csv");

	$data_array = array();

	foreach ($data as $i => $row) {

		$data_array[$i] = str_getcsv($row);
	}

	return $data_array;
}

function show_top_posts ($file) {

	$data_array = get_data($file);

	$data_count = count($data_array);

	if ($data_count > 50 ) $data_count = 50;

	foreach ($data_array as $i => $post) {

		if ($i < 50) {
			$post_title = $post[0];
			$post_number = $post[1];
			$post_url = $post[2];
			$post_source = $post[3];

			if ($i == 0) {
				$output = '<ul class="items-list">';
			}

			if ($i == 30) {
				$output .= '<ul class="items-list is-hidden">';
			}

			$output .= '	<li class="items-list__item item"><span class="item__number">'.$post_number.'</span><a href="'.$post_url.'" class="item__link" target="_blank"><span class="item__title">'.$post_title.'</span>';

			if ($post_source) {
				$output .= '&nbsp;<span class="item__info">('.$post_source.')</span>';
			}

			$output .= '</a></li>';

			if ($i == 29 || $i == $data_count - 1) {
				$output .= '</ul>';
			}
		}

	}

	if ($data_count == 50) {
		$output .= '<p class="show-more"><a href="#" class="show-more__button button">Show 20 more</a></p>';
	}

	echo $output;

}

function show_source_posts ($file) {

	$data_array = get_data($file);

	$data_count = count($data_array);

	if ($data_count > 30 ) $data_count = 30;

	foreach ($data_array as $i => $post) {

		if ($i < 30) {
			$post_title = $post[0];
			$post_number = $post[1];
			$post_url = $post[2];

			if ($i == 0) {
				$output = '<ul class="items-list">';
			}

			$output .= '	<li class="items-list__item item"><span class="item__number">'.$post_number.'</span><a href="'.$post_url.'" class="item__link" target="_blank"><span class="item__title">'.$post_title.'</span>';

			$output .= '</a></li>';

			if ($i == $data_count - 1) {
				$output .= '</ul>';
			}
		}

	}

	echo $output;

}

function show_users ($file) {

	$data_array = get_data($file);

	$data_count = count($data_array);

	if ($data_count > 50 ) $data_count = 50;

	foreach ($data_array as $i => $user) {

		if ($i < 50) {
			$user_number = $user[0];
			$user_url = $user[1];
			$user_name = $user[2];
			$user_position = $user[3];
			$user_work = $user[4];

			if ($i == 0) {
				$output = '<ul class="items-list">';
			}

			if ($i == 30) {
				$output .= '<ul class="items-list is-hidden">';
			}

			$output .= '	<li class="items-list__item item"><span class="item__number">'.$user_number.'</span><a href="'.$user_url.'" class="item__link" target="_blank"><span class="item__title">'.$user_name.'</span>';

			if ($user_position) {
				$output .= '&nbsp;<span class="item__info">('.$user_position;

				if ($user_work) {
					$output .= ' at '.$user_work;
				}
				$output .= ')</span>';
			}

			$output .= '</a></li>';

			if ($i == 29 || $i == $data_count - 1) {
				$output .= '</ul>';
			}
		}

	}

	if ($data_count == 50) {
		$output .= '<p class="show-more"><a href="#" class="show-more__button button">Show 20 more</a></p>';
	}

	echo $output;

}

function show_companies ($file) {

	$data_array = get_data($file);

	$data_count = count($data_array);

	if ($data_count > 20 ) $data_count = 20;

	foreach ($data_array as $i => $company) {

		if ($i < 20) {
			$company_number = $company[0];
			$company_title = $company[1];
			$company_url = $company[2];

			if ($i == 0) {
				$output = '<ul class="items-list">';
			}

			$output .= '	<li class="items-list__item item"><span class="item__number">'.$company_number.'</span><a href="'.$company_url.'" class="item__link" target="_blank"><span class="item__title">'.$company_title.'</span>';

			$output .= '</a></li>';

			if ($i == $data_count - 1) {
				$output .= '</ul>';
			}
		}

	}

	echo $output;

}

?>
