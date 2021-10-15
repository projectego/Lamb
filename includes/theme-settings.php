<?php
/***************************************************************************************
* Tidbits

To retrieve a value use: get_theme_mod( 'test_setting' ); 
To retrieve a type=option value use: get_option( 'test_setting' ); 

Default Section IDS:

Site Identity:          title_tagline
Colors:                 colors
Header Image:           header_image
Background Image:       background_image
Menus:                  nav_menus
Widgets:                widgets
Static Front Page:      static_front_page

Priority values and approximately where sections will be displayed:

Priority 0-19: Above Site Identity (default highest Section)
Priority 20-39: Above Colors
Priority 40-59: Above Header Image
Priority 60-79: Above Background Image
Priority 80-99: Above Menus
Priority 100-109: Above Widgets
Priority 110-119: Above Homepage Settings
Priority 120-199: Above Additional CSS

***************************************************************************************/

/*-----------------------------------------------------------------------------------*/
/* Register a custom Range customisation class
/*-----------------------------------------------------------------------------------*/

if ( class_exists( 'WP_Customize_Control' ) ) {
	class WP_Customize_Range_Control extends WP_Customize_Control {
		public $type = 'range';

        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
            $defaults = array(
                'min' => 0,
                'max' => 10,
                'step' => 1
            );
            $args = wp_parse_args( $args, $defaults );

            $this->min = $args['min'];
            $this->max = $args['max'];
            $this->step = $args['step'];
        }

		public function render_content() {

            $value = $this->value();
            if ( ! $value ) {
                $value = "Not set yet";
            }
            ?>

            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

            <span class="description customize-control-description" id="_customize-description-theme_mod_font_awesome_source_url"><?php echo $this->description ?></span>

            <label class="range-control" style="align-items: center; display: flex">

                <input class="range-input" max="<?php echo $this->max ?>" min="<?php echo $this->min ?>" step="<?php echo $this->step ?>" style="margin-right: 10px;" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $value ); ?>" oninput="jQuery(this).next('span').text( jQuery(this).val() )">

                <span class="range-value"><?php echo esc_attr( $value ); ?></span>

            </label>

            <!--<hr style="margin-top: 15px;">-->

		<?php }
	}
}

/*-----------------------------------------------------------------------------------*/
/* Theme setting function
/*-----------------------------------------------------------------------------------*/

function lamb_theme_setting_media( $id, $label, $description, $section, $type ) {

    global $wp_customize;

    $wp_customize->add_setting( $id, array(
        'default'       => '',
        'transport'     => 'refresh',
        'type'          => 'theme_mod',
    ) );

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $id, array(
        'button_labels' => array( // Optional
            'change' => __( 'Change File' ),
            'default' => __( 'Default' ),
            'frame_button' => __( 'Choose File' ),
            'frame_title' => __( 'Select File' ),
            'placeholder' => __( 'No file selected' ),
            'remove' => __( 'Remove' ),
            'select' => __( 'Select File' ),
        ),
        'label' => __( $label ),
        'description' => esc_html__( 'This is the description for the Media Control' ),
        'mime_type' => $type,  // Required. Can be image, audio, video, application, text
        'priority' => '',
        'section' => $section
    ) ) );

}

function lamb_theme_setting_text( $id, $label, $description, $section, $type ) {

    global $wp_customize;

    $wp_customize->add_setting( $id, array(
        'default'       => $default_choice,
        'transport'     => 'refresh',
        'type'          => 'theme_mod',
    ) );

    $wp_customize->add_control( $id, array(
        'choices'       => $choices,
        'description'   => esc_html__( $description ),
        'label'         => esc_html__( $label ),
        'priority'      => '',
        'section'       => $section,
        'settings'      => $id,
        'type'          => $type
    ) );

}

function lamb_theme_setting_options( $id, $label, $description, $section, $type, $choices, $default_choice ) {

    global $wp_customize;

    $wp_customize->add_setting( $id, array(
        'default'       => $default_choice,
        'transport'     => 'refresh',
        'type'          => 'theme_mod',
    ) );

    $wp_customize->add_control( $id, array(
        'choices'       => $choices,
        'description'   => esc_html__( $description ),
        'label'         => esc_html__( $label ),
        'priority'      => '',
        'section'       => $section,
        'settings'      => $id,
        'type'          => $type
    ) );

}

function lamb_theme_setting_color( $id, $label, $description, $section, $default_color ) {

    global $wp_customize;

    $wp_customize->add_setting( $id, array(
        'default'       => $default_color,
        'transport'     => 'refresh',
        'type'          => 'theme_mod',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
        'choices'       => $choices,
        'description'   => esc_html__( $description ),
        'label'         => esc_html__( $label ),
        'priority'      => '',
        'section'       => $section,
        'settings'      => $id
    ) ) );

}

function lamb_theme_setting_range( $id, $label, $description, $section, $min, $max, $step ) {

    global $wp_customize;

    $wp_customize->add_setting( $id, array(
        'default'       => $default_choice,
        'transport'     => 'refresh',
        'type'          => 'theme_mod',
    ) );

    $wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, $id, array(
        'description'   => esc_html__( $description ),
        'label'         => esc_html__( $label ),
        'max'           => $max,
        'min'           => $min,
        'priority'      => '',
        'section'       => $section,
        'step'          => $step
    ) ) );

}

/*-----------------------------------------------------------------------------------*/
/* The theme settings
/*-----------------------------------------------------------------------------------*/

function theme_mod_register( $wp_customize ) {

    /*-----------------------------------------------------------------------------------*/
    /* Setting up all of the Theme Customiser PANELS
    /*-----------------------------------------------------------------------------------*/

    // Theme Options Panel
    $wp_customize->add_panel( 'lamb_panel_design', array(
        'description'       => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'nd_dosth' ),
        'priority'          => 1,
        'title'             => __( '[' . LAMB_THEME_TITLE . '] Design', 'nd_dosth' ),
    ) );

    /*-----------------------------------------------------------------------------------*/
    /* Remove sections we don't like
    /*-----------------------------------------------------------------------------------*/

    $wp_customize->remove_section( 'colors' ); //Modify this line as needed

    /*-----------------------------------------------------------------------------------*/
    /* Setting up all of the Theme Customiser SECTIONS
    /*-----------------------------------------------------------------------------------*/

    $wp_customize->add_section( 'lamb_section_general', array(
        'description'       => '',
        'panel'             => '',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] General',
    ) );

    $wp_customize->add_section( 'lamb_section_layout', array(
        'description'       => '',
        'panel'             => 'lamb_panel_design',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Layout',
    ) );

    $wp_customize->add_section( 'lamb_section_typography', array(
        'description'       => '',
        'panel'             => 'lamb_panel_design',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Typography',
    ) );

    $wp_customize->add_section( 'lamb_section_colors', array(
        'description'       => '',
        'panel'             => 'lamb_panel_design',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Colors',
    ) );

    $wp_customize->add_section( 'lamb_section_login_page', array(
        'description'       => '',
        'panel'             => 'lamb_panel_design',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Login &amp; Registration',
    ) );

    $wp_customize->add_section( 'lamb_section_svg_waves', array(
        'description'       => '',
        'panel'             => 'lamb_panel_design',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] SVG Waves',
    ) );

    $wp_customize->add_section( 'lamb_section_site_head', array(
        'description'       => '',
        'panel'             => '',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Site Head &amp; Footer',
    ) );

    $wp_customize->add_section( 'lamb_section_posts', array(
        'description'       => '',
        'panel'             => '',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Posts &amp; Pages',
    ) );

    $wp_customize->add_section( 'lamb_section_membership_page', array(
        'description'       => '',
        'panel'             => '',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Membership',
    ) );

    $wp_customize->add_section( 'lamb_section_reviews', array(
        'description'       => '',
        'panel'             => '',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Reviews',
    ) );

    if ( class_exists( 'woocommerce' ) ) {
        $wp_customize->add_section( 'lamb_section_woocommerce', array(
            'description'       => '',
            'panel'             => '',
            'priority'          => 1,
            'title'             => '[' . LAMB_THEME_TITLE . '] WooCommerce',
        ) );
    }

    $wp_customize->add_section( 'lamb_section_misc', array(
        'description'       => '',
        'panel'             => '',
        'priority'          => 1,
        'title'             => '[' . LAMB_THEME_TITLE . '] Misc.',
    ) );

    /* --------------------------------------------------------------
    Section: General
    Tags: 
    Notes: Usage:
    
    lamb_theme_setting(
        $id = 'lamb_theme_setting_id',
        $label = 'This is the Title',
        $description = 'This is the description',
        $section = 'lamb_section_',
        $type = 'select',
        $choices = array(
            'default' => 'default',
            'value-2' => 'yes',
            'value-3' => 'no'
        ),
        $default_choice = ''
    );
    -------------------------------------------------------------- */

    // new section
    $section = 'lamb_section_general';

    lamb_theme_setting_text(
        $id = 'theme_mod_font_awesome_source_url',
        $label = 'Font Awesome Integration',
        $description = 'Input your FontAwesome kit URL or leave blank to use the standard CDN (https://cdnjs.com/libraries/font-awesome).',
        $section = $section,
        $type = 'text'
    );

    // new section
    $section = 'lamb_section_layout';

    // 
    lamb_theme_setting_options(
        $id = 'theme_mod_main_menu_behavior',
        $label = 'Main Menu Behavior',
        $description = 'This setting will allow you to specify how the main menu will behave when viewed on desktop displays. When viewed on a mobile, the behavior will always be \'absolute\' as that is the specified position of the admin bar.',
        $section = $section,
        $type = 'select',
        $choices = array(
            '' => 'Fixed (Default)',
            'absolute' => 'Absolute'
        ),
        $default_choice = ''
    );

    lamb_theme_setting_range(
        $id = 'theme_mod_logo_height',
        $label = 'Site Logo Height',
        $description = 'This only affects the height of the site logo found in the site header.',
        $section = $section,
        $min = 28,
        $max = 56,
        $step = 1,
        $default_value = 32
    );

    // new section
    $section = 'lamb_section_typography';

    lamb_theme_setting_text(
        $id = 'theme_mod_font_family_embed_code',
        $label = 'Font Family Embed Code',
        $description = 'Enter your font embed HTML code here to have it injected into the <head>.',
        $section = $section,
        $type = 'textarea'
    );

    lamb_theme_setting_text(
        $id = 'theme_mod_main_font_family',
        $label = 'Main Body Font Family (Title)',
        $description = 'Please input in the following format: \'font-family: \'Syne\', sans-serif;\'.',
        $section = $section,
        $type = 'text'
    );

    lamb_theme_setting_text(
        $id = 'theme_mod_heading_font_family',
        $label = 'Heading Font Family (Title)',
        $description = 'Please input in the following format: \'font-family: \'Syne\', sans-serif;\'.',
        $section = $section,
        $type = 'text'
    );

    lamb_theme_setting_text(
        $id = 'theme_mod_button_font_family',
        $label = 'Button Font Family (Title)',
        $description = 'Please input in the following format: \'font-family: \'Syne\', sans-serif;\'.',
        $section = $section,
        $type = 'text'
    );

    // new section
    $section = 'lamb_section_colors';

    lamb_theme_setting_color(
        $id = 'theme_mod_page_background_color',
        $label = '[LAYOUT] Page Background Color',
        $description = 'The <body> color.',
        $section = $section,
        $default_color = LAMB_PAGE_BACKGROUND_COLOR
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_content_background_color',
        $label = '[LAYOUT] Content Background Color',
        $description = 'The background color of the post/page body.',
        $section = $section,
        $default_color = LAMB_CONTENT_BACKGROUND_COLOR
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_text_color_500',
        $label = '[TEXT] Regular Text Color (Main)',
        $description = 'The main text color.',
        $section = $section,
        $default_color = LAMB_TEXT_COLOR_500
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_text_color_300',
        $label = '[TEXT] Regular Text Color (Lighter)',
        $description = 'The main text color (lighter).',
        $section = $section,
        $default_color = LAMB_TEXT_COLOR_300
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_text_link_color_500',
        $label = '[TEXT] Regular Text Link Color (Main)',
        $description = 'The main text link color.',
        $section = $section,
        $default_color = LAMB_TEXT_LINK_COLOR_500
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_primary_brand_color_500',
        $label = '[BRAND] Primary Brand Color (Main)',
        $description = 'The primary brand color.',
        $section = $section,
        $default_color = LAMB_PRIMARY_BRAND_COLOR_500
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_primary_brand_color_700',
        $label = '[BRAND] Primary Brand Color (Darker)',
        $description = 'The primary brand color (darker).',
        $section = $section,
        $default_color = LAMB_PRIMARY_BRAND_COLOR_700
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_primary_brand_color_300',
        $label = '[BRAND] Primary Brand Color (Lighter)',
        $description = 'The primary brand color (lighter).',
        $section = $section,
        $default_color = LAMB_PRIMARY_BRAND_COLOR_300
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_secondary_brand_color_500',
        $label = '[BRAND] Secondary Color (Main)',
        $description = 'The secondary brand color.',
        $section = $section,
        $default_color = LAMB_SECONDARY_BRAND_COLOR_500
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_secondary_brand_color_700',
        $label = '[BRAND] Secondary Color (Darker)',
        $description = 'The secondary brand color (darker).',
        $section = $section,
        $default_color = LAMB_SECONDARY_BRAND_COLOR_700
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_secondary_brand_color_300',
        $label = '[BRAND] Secondary Color (Lighter)',
        $description = 'The secondary brand color (lighter).',
        $section = $section,
        $default_color = LAMB_SECONDARY_BRAND_COLOR_300
    );

    // new section
    $section = 'lamb_section_login_page';

    lamb_theme_setting_color(
        $id = 'theme_mod_login_page_background_color',
        $label = 'Login Page Background Color',
        $description = 'The <body> color of the login/registration page.',
        $section = $section,
        $default_color = LAMB_PRIMARY_BRAND_COLOR_500
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_login_page_text_color',
        $label = 'Login Page Text Color',
        $description = 'The text color of the login/registration page.',
        $section = $section,
        $default_color = LAMB_TEXT_COLOR_500
    );

    lamb_theme_setting_color(
        $id = 'theme_mod_login_page_text_link_color',
        $label = 'Login Page Text Link Color',
        $description = 'The link text color of the login/registration page.',
        $section = $section,
        $default_color = LAMB_PRIMARY_BRAND_TEXT_LINK_COLOR
    );

    // new section
    $section = 'lamb_section_svg_waves';

    lamb_theme_setting_text(
        $id = 'theme_mod_svg_waves',
        $label = 'SVG Waves',
        $description = 'SVGWave.in provides a great SVG wave generation tool. Copy/paste your SVG code into this section.',
        $section = $section,
        $type = 'textarea'
    );

    // new section
    $section = 'lamb_section_membership_page';

    /*
    lamb_theme_setting_text(
        $id = 'theme_mod_login_page_css',
        $label = 'Login Page CSS',
        $description = 'Noteworth items to modify: body | .login #backtoblog a, .login #nav a, a.privacy-policy-link.',
        $section = $section,
        $type = 'textarea'
    );
    */

    lamb_theme_setting_text(
        $id = 'theme_mod_members_only_content_tag',
        $label = 'Tag to Determine Members-only Content',
        $description = 'Enter the tag (by name) that will be manually assigned to content that requires the user be logged in to view.',
        $section = $section,
        $type = 'text'
    );

    // new section
    $section = 'lamb_section_site_head';

    lamb_theme_setting_text(
        $id = 'theme_mod_site_head_metadata',
        $label = 'HTML Head Content',
        $description = 'Any content entered here will be included in the <head> area of your website.',
        $section = $section,
        $type = 'textarea'
    );

    lamb_theme_setting_text(
        $id = 'theme_mod_jquery_source_url',
        $label = 'Preferred jQuery CDN',
        $description = 'Input your preferred URL to serve the main jQuery file. Leaving blank will cause the jQuery file to continue being served via your original WordPress server. Recommend leaving blank unless you know what you\'re doing.',
        $section = $section,
        $type = 'text'
    );

    lamb_theme_setting_text(
        $id = 'theme_mod_site_footer_content',
        $label = 'Footer Text',
        $description = 'Ideal for brief copyright information.',
        $section = $section,
        $type = 'textarea'
    );

    // new section
    $section = 'lamb_section_posts';

    /*
    lamb_theme_setting_options(
        $id = 'theme_mod_disable_html_in_comments',
        $label = 'Disable HTML markup when commenting',
        $description = 'Disallows users from including HTML markup in their comments.',
        $section = $section,
        $type = 'checkbox',
        $choices = '',
        $default_choice = ''
    );
    */

    // new section
    $section = 'lamb_section_reviews';

    // If disabled, we can exclude the function file from executing
    lamb_theme_setting_options(
        $id = 'theme_mod_review_rating_metric',
        $label = 'Review Score Metric',
        $description = 'Example description',
        $section = $section,
        $type = 'select',
        $choices = array(
            '' => '— Disabled —',
            'points' => '10-point scale (1-10)',
            'stars' => '5 Stars',
            'thumbs' => 'Thumbs up/down'
        ),
        $default_choice = ''
    );

    // 
    lamb_theme_setting_options(
        $id = 'theme_mod_review_rating_tag',
        $label = 'Review Rating Tag Prefix',
        $description = 'A rating will show on a post only if the post contains a [keyword]-[number] tag is present. For example, if you choose \'rating\' as your keyword, you would assign the tag \'rating-10\' to display a perfect rating, or \'rating-1\' to display a very poor rating.',
        $section = $section,
        $type = 'select',
        $choices = array(
            '' => '— Disabled —',
            'rating' => 'rating',
            'score' => 'score',
            'verdict' => 'verdict'
        ),
        $default_choice = ''
    );

    // new section
    $section = 'lamb_section_misc';

    lamb_theme_setting_options(
        $id = 'theme_mod_developer_credit',
        $label = 'Show Theme Developer Credit',
        $description = 'Display an unintrusive link to the theme developer\'s website in the footer.',
        $section = $section,
        $type = 'checkbox',
        $choices = '',
        $default_choice = ''
    );

}
add_action( 'customize_register', 'theme_mod_register' );


