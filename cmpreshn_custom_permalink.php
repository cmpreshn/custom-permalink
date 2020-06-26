<?php

  /*

    Plugin Name: Cmpreshn Custom Permalink
    Plugin URI: https://github.com/cmpreshn/custom-permalink
    Description: Allows you to customize the permalink using a custom URL field.
    Version: 1.0
    Date: 26 June 2020
    Author: Scott Benton
    Author URI: https://cmpreshn.com/

    NOTE: The code below was lifted from the article linked below.
    Thanks to Jason Yingling for a great article and explanation.

    For a little more idiot-proofing, I've added WordPress' esc_url
    which should sanitize the custom URL prior to output.

    Also, I'm retrieving the custom field using WordPress native get_post_meta,
    instead of using get_field, which relied on the ACF plugin.

    https://jasonyingling.me/dynamically-overwrite-wordpress-permalinks-with-filters/

  */

  function cmpreshn_custom_permalink ( $url, $post ) {

      // get custom url field if set
      $custom = get_post_meta( $post->ID, 'url', true);

      // If value is not false, return it
      if ( $custom ) {
        return esc_url($custom);
      }

      // return the original unfiltered URL
      return $url;

  }

  //  Add filters for post_link, page_link, and post_type_link
  foreach ( [ 'post', 'page', 'post_type' ] as $post_type ) {
      add_filter( $post_type . '_link', 'cmpreshn_custom_permalink', 10, 2 );
  }

?>
