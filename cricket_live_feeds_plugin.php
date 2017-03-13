<?php

/*
   Plugin Name: Cricket live score plugin
   Author: Akash Panda  
   Author URI: http:/akashpanda.com/
 */


class ap_livefeeds extends WP_Widget
{
        function ap_livefeeds()
        {
                $args=array(
                                "classname"=>"acs_widget",
                                "description"=>"Widget to show live cricket score akashpanda."
                           );
                parent::WP_Widget("ap_livefeeds","Akashpanda",$args);
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
                echo $before_title."Cricket Live Scores".$after_title;
                echo "<div class='cricket-live-score-div-akashpanda-plugin'></div>";
                echo $after_widget;
        }
}

function akashpanda_ls_reg_widget()
{
        register_widget("akashpanda_ls_cricket_score");
}

add_action("widgets_init",'akashpanda_ls_reg_widget');
add_action("wp_head",'akashpanda_ls_add_ajax_url');

function akashpanda_ls_add_ajax_url()
{
                echo "<script> 
                      var akashpannda_ls_ajaxURL='".plugins_url("cricket-live-feeds-plugin/fetch-data.php")."';
                     </script>";
}