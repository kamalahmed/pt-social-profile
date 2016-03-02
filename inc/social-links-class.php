<?php

class PT_Social_Link_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        parent::__construct(
            'pt_social_profile_widget', // Base ID
            __( 'PT Social Profile', 'PTSP' ), // Name
            array( 'description' => __( 'A beautiful and clean widget to show social profile', 'PTSP' ), ) // Args
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
      ?>

        test front end
        <?php
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        //call to a from function and display form
        $this->ptsp_display_form($instance);
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }

    public function ptsp_display_form($instance)
    {
        //GET ALL SOCIAL LINKS FROM DB IF EXISTS
        // get facebook link
        if (isset($instance['facebook_link'])){
            $facebook = esc_attr($instance['facebook_link']);
        }else{
            $facebook = 'http://www.facebook.com';
        }


        // get twitter link
        if (isset($instance['twitter_link'])){
            $twitter = esc_attr($instance['twitter_link']);
        }else{
            $twitter = 'http://www.twitter.com';
        }


        // get linkedin link
        if (isset($instance['linkedin_link'])){
            $linkedin = esc_attr($instance['linkedin_link']);
        }else{
            $linkedin = 'http://www.linkedin.com';
        }


        //
        if (isset($instance['google_plus_link'])){
            $google_plus = esc_attr($instance['google_plus_link']);
        }else{
            $google_plus = 'http://plus.google.com';
        }



        //GET ICONS
        //get facebbok icon
        if (isset($instance['facebook_icon'])){
            $facebook_icon = esc_attr($instance['facebook_icon']);
        }else{
            $facebook_icon = plugins_url(). '/PT-Social-Profile/img/facebook.png';
        }


        // get twitter icon
        if (isset($instance['twitter_icon'])){
            $twitter_icon = esc_attr($instance['twitter_icon']);
        }else{
            $twitter_icon = plugins_url(). '/PT-Social-Profile/img/twitter.png';
        }

        // get linkedin icon
        if (isset($instance['linkedin_icon'])){
            $linkedin_icon = esc_attr($instance['linkedin_icon']);
        }else{
            $linkedin_icon = plugins_url(). '/PT-Social-Profile/img/linkedin.png';
        }


        // get googleplus icon
        if (isset($instance['google_plus_icon'])){
            $google_plus_icon = esc_attr($instance['google_plus_icon']);
        }else{
            $google_plus_icon = plugins_url(). '/PT-Social-Profile/img/googleplus.png';
        }


        // GET ICON SIZE
        if (isset($instance['icon_size'])){
            $icon_size = (int) esc_attr($instance['icon_size']);
        }else{
            $icon_size = 32;
        }
        ?>
    <h4>Facebook</h4>
    <p>
        <label for="<?php echo $this->get_field_id('facebook_link'); ?>"> <?php _e('Facebook Link', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('facebook_link');?>"
            name="<?php echo $this->get_field_name('facebook_link');?>"
            value="<?php echo esc_attr($facebook);?>"
        >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('facebook_icon'); ?>"> <?php _e('Icon', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('facebook_icon');?>"
            name="<?php echo $this->get_field_name('facebook_icon');?>"
            value="<?php echo esc_attr($facebook_icon);?>"
            >
    </p>


    <h4>Twitter</h4>
    <p>
        <label for="<?php echo $this->get_field_id('twitter_link'); ?>"> <?php _e('Twitter Link', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('twitter_link');?>"
            name="<?php echo $this->get_field_name('twitter_link');?>"
            value="<?php echo esc_attr($twitter);?>"
            >
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('twitter_icon'); ?>"> <?php _e('Icon', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('twitter_icon');?>"
            name="<?php echo $this->get_field_name('twitter_icon');?>"
            value="<?php echo esc_attr($twitter_icon);?>"
            >
    </p>


    <h4>LinkedIn</h4>
    <p>
        <label for="<?php echo $this->get_field_id('linkedin_link'); ?>"> <?php _e('LinkedIn Link', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('linkedin_link');?>"
            name="<?php echo $this->get_field_name('linkedin_link');?>"
            value="<?php echo esc_attr($linkedin);?>"
            >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('linkedin_icon'); ?>"> <?php _e('Icon', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('linkedin_icon');?>"
            name="<?php echo $this->get_field_name('linkedin_icon');?>"
            value="<?php echo esc_attr($linkedin_icon);?>"
            >
    </p>


    <h4>Google Plus</h4>
    <p>
        <label for="<?php echo $this->get_field_id('google_plus'); ?>"> <?php _e('Google Plus Link', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('google_plus');?>"
            name="<?php echo $this->get_field_name('google_plus');?>"
            value="<?php echo esc_attr($google_plus);?>"
            >
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('google_plus_icon'); ?>"> <?php _e('Icon', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('google_plus_icon');?>"
            name="<?php echo $this->get_field_name('google_plus_icon');?>"
            value="<?php echo esc_attr($google_plus_icon);?>"
            >
    </p>

<!--        Icon Size-->
        <h4>Icon Size </h4>
    <p>
        <label for="<?php echo $this->get_field_id('icon_size'); ?>"> <?php _e('Icon width', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('icon_size');?>"
            name="<?php echo $this->get_field_name('icon_size');?>"
            value="<?php echo esc_attr($icon_size);?>"
            >
    </p>
<?php
    }
}