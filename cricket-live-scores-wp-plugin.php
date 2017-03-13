<?php

/*
   Plugin Name: Cricket live score plugin
   Author: Akash Panda  
   Author URI: http:/akashpanda.com/
 */

add_action("wp_enqueue_scripts" , "ap_ls_add_scrips_styles");

function ap_ls_add_scrips_styles() {
	        wp_enqueue_script("live-cricket-score",plugins_url("cricket-live-scores-wp-plugin/static/js/live_cricket_score.js"),array("jquery"));
		wp_enqueue_style("live-cricket-score",plugins_url("cricket-live-scores-wp-plugin/static/css/style.css"));
}


class ap_livefeeds extends WP_Widget
{
        function ap_livefeeds()
        {
                $args=array(
                                "classname"=>"acs_widget",
                                "description"=>"Widget to show live cricket score akashpanda."
                           );
                parent::WP_Widget("ap_livefeeds","Cricket Live Feeds",$args);
        }
        function widget($args,$instance)
        {
                echo "<style>
                #cricket-score-container
                {
                color:".$instance['lks_text_color'].";
                background-color:".$instance['lks_body_color'].";
                }
                #cricket-score-score
                {
                color:".$instance['lks_score_color'].";
                }
                .match_head{
                background-color:".$instance['lks_bg_color'].";
                }

                </style>";

                extract($args);
                echo $before_widget;
                echo $before_title.$after_title;
                echo "<div class='cricket-live-feeds-ap-plugin'></div>";
                echo $after_widget;
        }
}

function ap_ls_reg_widget()
{
        register_widget("ap_livefeeds");
}

add_action("widgets_init",'ap_ls_reg_widget');
add_action("wp_head",'ap_ls_add_ajax_url');

function ap_ls_add_ajax_url()
{
                echo "<script> 
                      var ap_ls_ajaxURL='".plugins_url("cricket-live-scores-wp-plugin/fetch-data.php?page=home")."';
                     </script>";
}
