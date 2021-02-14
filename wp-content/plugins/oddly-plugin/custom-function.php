<?php
    function create_history_table() {
        global $wpdb;
        $table_name = $wpdb->prefix. "history";
        global $charset_collate;
        $charset_collate = $wpdb->get_charset_collate();
        global $db_version;

        if( $wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") !=  $table_name){   
            $create_sql = "CREATE TABLE " . $table_name . " (
                id BIGINT(20) NOT NULL auto_increment,
                url VARCHAR(200) NOT NULL,
                no_of_posts INT NOT NULL,
                timestamp DATETIME NOT NULL,
                PRIMARY KEY (id))$charset_collate;";
        }
        require_once(ABSPATH . "wp-admin/includes/upgrade.php");
        dbDelta( $create_sql );

        //register the new table with the wpdb object
        if (!isset($wpdb->history))
        {
            $wpdb->history = $table_name;
            //add the shortcut so you can use $wpdb->stats
            $wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
        }
    }

    add_action( 'init', 'create_history_table');

     
    function diwp_create_shortcode_post_type(){
     
        $args = array(
            'post_type'      => 'publication',
            'posts_per_page' => '20',
            'publish_status' => 'published',
            'orderby' => 'date',
            'order' => 'DESC'
         );
     
        $query = new WP_Query($args);
     
        if($query->have_posts()) :
     
            while($query->have_posts()) :
     
                $query->the_post() ;
                         
                $result .= '<div class="items">';
                $result .= '<div class="title"><h3>' . get_the_date() . '</h3></div>';
                $result .= '<div class="title"><h2>' . get_the_title() . '</h2></div>';
                $result .= '<div class="content">' . get_the_content() . '</div>'; 
                $result .= '</div>';
     
            endwhile;
     
            wp_reset_postdata();
     
        endif;    
     
        return $result;            
    }
     
    add_shortcode( 'awesome-post', 'diwp_create_shortcode_post_type' ); 
?>