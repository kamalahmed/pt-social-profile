<?php

class PT_Social_Link_Widget extends WP_Widget {

    /**
     * Sets up PT Social Link Widget
     */
    public function __construct() {
        parent::__construct(
            'pt_social_profile_widget', // Base ID
            __( 'PT Social Profile', 'PTSP' ), // Name and text domain
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
        // get the title from the database
        $title = esc_attr($instance['title']);
        // get all links from the database
        $links = [
          'facebook' => esc_attr($instance['facebook_link']),
          'twitter' => esc_attr($instance['twitter_link']),
          'linkedin' => esc_attr($instance['linkedin_link']),
          'googleplus' => esc_attr($instance['google_plus_link']),
        ];
        // get all icons from the database
        $icons = [
            'facebook' => esc_attr($instance['facebook_icon']),
            'twitter' => esc_attr($instance['twitter_icon']),
            'linkedin' => esc_attr($instance['linkedin_icon']),
            'googleplus' => esc_attr($instance['google_plus_icon']),
        ];

        // get the icon size from the database
        $icon_size = (int) esc_attr($instance['icon_size']);
        //before widget data or classes
        echo $args['before_widget'];
      // display the front end widget's data
        $this->ptsp_get_social_links($args, $title, $links, $icons, $icon_size);
        // after widget data or classes
        echo $args['after_widget'];

    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        //call to a from function and display form
        $this->ptsp_admin_form($instance);
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     * @return array It returns an array of new data
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        // add the options to $instance from $new_instance to save
        $instance = [
            'title'             => (! empty($new_instance['title']))? strip_tags($new_instance['title']) : "",
            'facebook_link'     => (! empty($new_instance['facebook_link']))? strip_tags($new_instance['facebook_link']) : "",
            'twitter_link'      => (! empty($new_instance['twitter_link']))? strip_tags($new_instance['twitter_link']) : "",
            'linkedin_link'     => (! empty($new_instance['linkedin_link']))? strip_tags($new_instance['linkedin_link']) : "",
            'google_plus_link'  => (! empty($new_instance['google_plus_link']))? strip_tags($new_instance['google_plus_link']) : "",
            'facebook_icon'     => (! empty($new_instance['facebook_icon']))? strip_tags($new_instance['facebook_icon']) : "",
            'twitter_icon'      => (! empty($new_instance['twitter_icon']))? strip_tags($new_instance['twitter_icon']) : "",
            'linkedin_icon'     => (! empty($new_instance['linkedin_icon']))? strip_tags($new_instance['linkedin_icon']) : "",
            'google_plus_icon'  => (! empty($new_instance['google_plus_icon']))? strip_tags($new_instance['google_plus_icon']) : "",
            'icon_size'         => (! empty($new_instance['icon_size']))? strip_tags($new_instance['icon_size']) : "",
        ];
        return $instance;

    }


    /**
     * Build the option forms for displaying in the admin
     * @param array $instance The Widget Options
     */
    public function ptsp_admin_form($instance)
    {
        // get the title of the widget
        $title = (isset($instance['title']))? esc_attr($instance['title']): "";
        //GET ALL SOCIAL LINKS FROM DB IF EXISTS else set default
        // get facebook link
        $facebook = (isset($instance['facebook_link'])) ? esc_attr($instance['facebook_link']) : 'http://www.facebook.com';
        // get twitter link
        $twitter = (isset($instance['twitter_link'])) ? esc_attr($instance['twitter_link']) : 'http://www.twitter.com';
        // get linkedin link
        $linkedin = (isset($instance['linkedin_link'])) ? esc_attr($instance['linkedin_link']) : 'http://www.linkedin.com';
        // get googleplus link
        $google_plus = (isset($instance['google_plus_link'])) ? esc_attr($instance['google_plus_link']) : 'http://plus.google.com';




        //GET ICONS
        //get facebbok icon
        $facebook_icon = (isset($instance['facebook_icon'])) ? esc_attr($instance['facebook_icon']) : plugins_url(). '/PT-Social-Profile/img/facebook.svg';
        // get twitter icon
        $twitter_icon = (isset($instance['twitter_icon'])) ? esc_attr($instance['twitter_icon']) : plugins_url(). '/PT-Social-Profile/img/twitter.svg';
        // get linkedin icon
        $linkedin_icon = (isset($instance['linkedin_icon'])) ? esc_attr($instance['linkedin_icon']) : plugins_url(). '/PT-Social-Profile/img/linkedin.svg';
        // get googleplus icon
        $google_plus_icon = (isset($instance['google_plus_icon'])) ? esc_attr($instance['google_plus_icon']) : plugins_url(). '/PT-Social-Profile/img/googleplus.svg';



        // GET ICON SIZE
            $icon_size = (isset($instance['icon_size'])) ? (int) esc_attr($instance['icon_size']) : 32;

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input
                class="widefat"
                id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title');?>"
                type="text"
                value="<?php echo esc_attr($title);?>"
            >
        </p>
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
        <label for="<?php echo $this->get_field_id('google_plus_link'); ?>"> <?php _e('Google Plus Link', 'PTSP');?></label>
        <input
            type="text"
            class="widefat"
            id="<?php echo $this->get_field_id('google_plus_link');?>"
            name="<?php echo $this->get_field_name('google_plus_link');?>"
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


    /** Display All Social links
     * @param array $links All Social links from Database
     * @param array $icons All Social icons from Database
     * @param Int $icon_size The size of the icon to display from the Database
     * @return void
     */
    public function ptsp_get_social_links($args, $title, $links, $icons, $icon_size)
    {
        ?>

            <?php echo $args['before_title']; ?>
            <?php echo $title;?>
            <?php echo $args['after_title']; ?>

            <a href="<?php echo esc_attr($links['facebook']);?>" target="_blank">
                <img src="<?php echo esc_attr($icons['facebook']); ?>" alt="facebook icon" width="<?php echo $icon_size."px"; ?>">
            </a>
            <a href="<?php echo esc_attr($links['twitter']);?>" target="_blank" width="<?php echo $icon_size."px"; ?>">
                <img src="<?php echo esc_attr($icons['twitter']); ?>" alt="twitter icon" width="<?php echo $icon_size."px"; ?>">
            </a>
            <a href="<?php echo esc_attr($links['linkedin']);?>" target="_blank">
                <img src="<?php echo esc_attr($icons['linkedin']); ?>" alt="linkedin icon" width="<?php echo $icon_size."px"; ?>">
            </a>
            <a href="<?php echo esc_attr($links['googleplus']);?>" target="_blank">
                <img src="<?php echo esc_attr($icons['googleplus']); ?>" alt="google plus icon" width="<?php echo $icon_size."px"; ?>">
            </a>

    <?php
    }
}