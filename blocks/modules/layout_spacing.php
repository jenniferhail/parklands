<?php
	$inline_style = '';
	$styles = get_sub_field('layout_spacing');
	foreach($styles as $style => $value) {
		if($value !== null && $value !== '') {
			$attr = str_replace('_','-',$style);
			$inline_style .= $attr . ': ' . $value . 'px; ';
		}
	}
?>