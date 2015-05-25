<?php
/**
 * Whimsy tests - DELETE ME
 * 
 * whimsy_body_start
 * whimsy_header_before
 * whimsy_header_after
 * whimsy_header_inside_before
 * whimsy_header_inside_after
 * whimsy_nav_before
 * whimsy_nav_after
 * whimsy_nav_inside_before
 * whimsy_nav_inside_after
 *
 */
function whimsy_test_whimsy_body_start() {	echo '<p class="whimsy-hook-test">whimsy_body_start</p>'; }
add_action( 'whimsy_body_start', 'whimsy_test_whimsy_body_start', 10 );

function whimsy_test_whimsy_header_before() {	echo '<p class="whimsy-hook-test">whimsy_header_before</p>'; }
add_action( 'whimsy_header_before', 'whimsy_test_whimsy_header_before', 10 );

function whimsy_test_whimsy_header_after() {	echo '<p class="whimsy-hook-test">whimsy_header_after</p>'; }
add_action( 'whimsy_header_after', 'whimsy_test_whimsy_header_after', 10 );

function whimsy_test_whimsy_header_inside_before() {	echo '<p class="whimsy-hook-test">whimsy_header_inside_before</p>'; }
add_action( 'whimsy_header_inside_before', 'whimsy_test_whimsy_header_inside_before', 10 );

function whimsy_test_whimsy_header_inside_after() {	echo '<p class="whimsy-hook-test">whimsy_header_inside_after</p>'; }
add_action( 'whimsy_header_inside_after', 'whimsy_test_whimsy_header_inside_after', 10 );

function whimsy_test_whimsy_nav_before() {	echo '<p class="whimsy-hook-test">whimsy_nav_before</p>'; }
add_action( 'whimsy_nav_before', 'whimsy_test_whimsy_nav_before', 10 );

function whimsy_test_whimsy_nav_after() {	echo '<p class="whimsy-hook-test">whimsy_nav_after</p>'; }
add_action( 'whimsy_nav_after', 'whimsy_test_whimsy_nav_after', 10 );

function whimsy_test_whimsy_nav_inside_before() {	echo '<p class="whimsy-hook-test">whimsy_nav_inside_before</p>'; }
add_action( 'whimsy_nav_inside_before', 'whimsy_test_whimsy_nav_inside_before', 10 );

function whimsy_test_whimsy_nav_inside_after() {	echo '<p class="whimsy-hook-test">whimsy_nav_inside_after</p>'; }
add_action( 'whimsy_nav_inside_after', 'whimsy_test_whimsy_nav_inside_after', 10 );
/**
 * 
 * whimsy_content_before
 * whimsy_content_after
 * whimsy_main_before
 * whimsy_main_after
 * whimsy_main_inside_before
 * whimsy_main_inside_after
 * whimsy_post_before
 * whimsy_post_after
 * whimsy_post_meta_before
 * whimsy_post_meta_after
 * whimsy_post_footer_before
 * whimsy_post_footer_after
 *
 */

function whimsy_test_whimsy_content_before() {	echo '<p class="whimsy-hook-test">whimsy_content_before</p>'; }
add_action( 'whimsy_content_before', 'whimsy_test_whimsy_content_before', 10 );

function whimsy_test_whimsy_content_after() {	echo '<p class="whimsy-hook-test">whimsy_content_after</p>'; }
add_action( 'whimsy_content_after', 'whimsy_test_whimsy_content_after', 10 );

function whimsy_test_whimsy_main_before() {	echo '<p class="whimsy-hook-test">whimsy_main_before</p>'; }
add_action( 'whimsy_main_before', 'whimsy_test_whimsy_main_before', 10 );

function whimsy_test_whimsy_main_after() {	echo '<p class="whimsy-hook-test">whimsy_main_after</p>'; }
add_action( 'whimsy_main_after', 'whimsy_test_whimsy_main_after', 10 );

function whimsy_test_whimsy_main_inside_before() {	echo '<p class="whimsy-hook-test">whimsy_main_inside_before</p>'; }
add_action( 'whimsy_main_inside_before', 'whimsy_test_whimsy_main_inside_before', 10 );

function whimsy_test_whimsy_main_inside_after() {	echo '<p class="whimsy-hook-test">whimsy_main_inside_after</p>'; }
add_action( 'whimsy_main_inside_after', 'whimsy_test_whimsy_main_inside_after', 10 );

function whimsy_test_whimsy_page_before() {	echo '<p class="whimsy-hook-test">whimsy_page_before</p>'; }
add_action( 'whimsy_page_before', 'whimsy_test_whimsy_page_before', 10 );

function whimsy_test_whimsy_page_after() {	echo '<p class="whimsy-hook-test">whimsy_page_after</p>'; }
add_action( 'whimsy_page_after', 'whimsy_test_whimsy_page_after', 10 );

function whimsy_test_whimsy_post_before() {	echo '<p class="whimsy-hook-test">whimsy_post_before</p>'; }
add_action( 'whimsy_post_before', 'whimsy_test_whimsy_post_before', 10 );

function whimsy_test_whimsy_post_after() {	echo '<p class="whimsy-hook-test">whimsy_post_after</p>'; }
add_action( 'whimsy_post_after', 'whimsy_test_whimsy_post_after', 10 );

function whimsy_test_whimsy_post_meta_before() {	echo '<p class="whimsy-hook-test">whimsy_post_meta_before</p>'; }
add_action( 'whimsy_post_meta_before', 'whimsy_test_whimsy_post_meta_before', 10 );

function whimsy_test_whimsy_post_meta_after() {	echo '<p class="whimsy-hook-test">whimsy_post_meta_after</p>'; }
add_action( 'whimsy_post_meta_after', 'whimsy_test_whimsy_post_meta_after', 10 );

function whimsy_test_whimsy_post_footer_before() {	echo '<p class="whimsy-hook-test">whimsy_post_footer_before</p>'; }
add_action( 'whimsy_post_footer_before', 'whimsy_test_whimsy_post_footer_before', 10 );

function whimsy_test_whimsy_post_footer_after() {	echo '<p class="whimsy-hook-test">whimsy_post_footer_after</p>'; }
add_action( 'whimsy_post_footer_after', 'whimsy_test_whimsy_post_footer_after', 10 );

/**
 * 
 * whimsy_sidebar_before
 * whimsy_sidebar_inside_before
 * whimsy_sidebar_inside_after
 * whimsy_sidebar_after
 * whimsy_sidebar_inside_widget_before
 * whimsy_sidebar_inside_widget_after
 *
 */

function whimsy_test_whimsy_sidebar_inside_before() {	echo '<p class="whimsy-hook-test">whimsy_sidebar_inside_before</p>'; }
add_action( 'whimsy_sidebar_inside_before', 'whimsy_test_whimsy_sidebar_inside_before', 10 );

function whimsy_test_whimsy_sidebar_inside_after() {	echo '<p class="whimsy-hook-test">whimsy_sidebar_inside_after</p>'; }
add_action( 'whimsy_sidebar_inside_after', 'whimsy_test_whimsy_sidebar_inside_after', 10 );

 /**
  * 
 * whimsy_footer_before
 * whimsy_footer_after
 * whimsy_footer_inside_after
 * whimsy_footer_inside_before
 * whimsy_body_end
 */

function whimsy_test_whimsy_footer_before() {	echo '<p class="whimsy-hook-test">whimsy_footer_before</p>'; }
add_action( 'whimsy_footer_before', 'whimsy_test_whimsy_footer_before', 10 );

function whimsy_test_whimsy_footer_after() {	echo '<p class="whimsy-hook-test">whimsy_footer_after</p>'; }
add_action( 'whimsy_footer_after', 'whimsy_test_whimsy_footer_after', 10 );

function whimsy_test_whimsy_footer_inside_after() {	echo '<p class="whimsy-hook-test">whimsy_footer_inside_after</p>'; }
add_action( 'whimsy_footer_inside_after', 'whimsy_test_whimsy_footer_inside_after', 10 );

function whimsy_test_whimsy_footer_inside_before() {	echo '<p class="whimsy-hook-test">whimsy_footer_inside_before</p>'; }
add_action( 'whimsy_footer_inside_before', 'whimsy_test_whimsy_footer_inside_before', 10 );

function whimsy_test_whimsy_body_end() {	echo '<p class="whimsy-hook-test">whimsy_body_end</p>'; }
add_action( 'whimsy_body_end', 'whimsy_test_whimsy_body_end', 10 );