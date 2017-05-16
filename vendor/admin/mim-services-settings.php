<?php
if( ! defined( 'ABSPATH' ) ) exit();

require_once dirname( __FILE__ ) . '/class.settings-api.php';

if ( ! class_exists( 'MIM_Services_Settings' ) ) :

class MIM_Services_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_menu' ), 51 );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_submenu_page( 'edit.php?post_type=mim-services', 'Settings', 'Settings' , 'manage_options', 'portfolio-settings', array( $this, 'option_page' ) );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'mim_services',
                'title' => 'General Settings',
            ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            
            'mim_services' => array(
                array(
                    'name'    =>  'title',
                    'label'   =>  'Title',
                    'type'    =>   'text',
                    'desc'    =>  'Your Services Title'
                ),
                array(
                    'name'    =>  'background',
                    'label'   =>  'Background Color',
                    'type'    =>   'color',
                    'desc'    =>  '',
                    'default' =>  'transparent',
                ),
                array(
                    'name'    =>  'color',
                    'label'   =>  'Fonts Color',
                    'type'    =>   'color',
                    'desc'    =>  '',
                    'default' =>  '#5b777f',
                ),
                array(
                    'name'    =>  'textposition',
                    'label'   =>  'Position of Text',
                    'type'    =>   'radio',
                    'default' =>  'center',
                    'options' => array( 'left' => 'Left', 'center' => 'Center', 'right' => 'Right' )
                ),
                array(
                    'name'    =>  'rownumber',
                    'label'   =>  'Grid Layouts',
                    'type'    =>   'radio',
                    'default' =>  'center',
                    'options' => array( '100%' => '1 Column Grid','50%' => '2 Column Grid', '33.33%' => '3 Column Grid', '25%' => '4 Column Grid', '20%' => '5 Column Grid', '16.66%' => '1 Column Grid' )
                ),
                array(
                    'name'    =>  'servicesstyle',
                    'label'   =>  'Layouts Style',
                    'type'    =>   'radio',
                    'default' =>  'style1',
                    'options' => array( 'style1' => 'Layouts 1', 'style2' => 'Layouts 2', 'style3' => 'Layouts 3', 'style4' => 'Layouts 4', 'style5' => 'Layouts 5', 'style6' => 'Layouts 6' )
                ),
            ),

        );

        return $settings_fields;
    }

    function option_page() {
        echo '<div class="wrap">';
        ?>
        
            <div class="scroll-to-up-setting-page-title">
                <h1><i>Services</i> Settings</h1>
            </div>

        <div class="stp-col-left">
            <?php 
            $this->settings_api->show_navigation();
            $this->settings_api->show_forms(); ?>
        </div>


    <?php echo '</div>';
    }

}

new MIM_Services_Settings;
endif;

if( ! function_exists( 'mdc_get_option' ) ) :
function mdc_get_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
 
    return $default;
}
endif;
