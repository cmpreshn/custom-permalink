# custom-permalink

Allows you to customize a WordPress permalink using a custom URL field.

NOTE: This code was lifted from the article linked below. Thanks to Jason Yingling for a great article and explanation.

• Added the WP esc_url function which should sanitize the custom URL prior to output

• Retrieving the custom field using WP get_post_meta, instead of get_field, to eliminate ACF dependency

https://jasonyingling.me/dynamically-overwrite-wordpress-permalinks-with-filters/
