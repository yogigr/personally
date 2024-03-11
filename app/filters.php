<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return boolean
 */
add_filter('excerpt_more', function () {
    return false;
});

add_filter('excerpt_length', function() {
    return 32;
});

/**
 * filter allowed blocks.
 *
 * @return array
 */
add_filter( 'allowed_block_types_all', function() {
    return [
        'core/code',
        'core/embed',
        'core/heading',  
		'core/image',      
		'core/list',   
		'core/paragraph',
        'core/quote',
        'core/table'
    ];
});