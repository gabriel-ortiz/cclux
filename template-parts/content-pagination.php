<?php
/**
 * 
 * Returns pagination that is shared among index, archive, and search
 * 
 */
 
 the_posts_pagination(
	array(
		'prev_text'	=> __('Newer', 'cclux'),
		'next_text'	=> __('Older', 'cclux'),
		'before_page_number'	=> '<span class=screen-reader-text>'.__('Page', 'cclux'). '</span>'
		
	)
);