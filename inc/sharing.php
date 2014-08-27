<div id="social-sharing">
    <span>Share This:</span>
 
    <span class="sharing-icon facebook-icon">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php if(is_home()){echo home_url();}else{the_permalink();} ?>" target="_blank" title="Share this page on Facebook">
            <i class="fa fa-facebook"></i>
        </a>
    </span>
 
    <span class="sharing-icon twitter-icon">
        <a href="http://twitter.com/share?url=<?php if(is_home()){echo home_url();}else{the_permalink();} ?>&text=<?php the_title(); ?>&via=<?php $options = get_option('whimsy_twitter');echo $options['whimsy_twitter'];?>&hashtags=
            <?php 
                $categories = get_the_category();
                $seperator = ', ';  
                $output = '';
                if($categories){    
                    foreach($categories as $category) { 
                        $output .= $category->cat_name . $seperator; 
                    }
                
                echo trim($output, $seperator);
                }
                ?>" target="_blank" title="Tweet this post on Twitter">
                <i class="fa fa-twitter"></i>
        </a>
    </span>
    
    <span class="sharing-icon gplus-icon"> 
        <a href="https://plusone.google.com/_/+1/confirm?hl=en&url=
            <?php if(is_home()){echo home_url();}else{the_permalink();} ?>" target="_blank" title="Plus one this page on Google">
            <i class="fa fa-google-plus"></i>
        </a>
    </span>

    <span class="sharing-icon pinterest-icon"> 
        <a href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" class="pin-it-button" data-pin-do='buttonPin' data-pin-config='above'>
            <i class="fa fa-pinterest"></i></span>
        </a>
    </span>
</div>