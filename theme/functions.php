<?php
/**
 * Theme related functions. 
 *
 */
 
/**
 * Get title for the webpage by concatenating page specific title with site-wide title.
 *
 * @param string $title for this page.
 * @return string/null whether the favicon is defined or not.
 */
function get_title($title) {
  global $masan;
  return $title . (isset($masan['title_append']) ? $masan['title_append'] : null);
}
