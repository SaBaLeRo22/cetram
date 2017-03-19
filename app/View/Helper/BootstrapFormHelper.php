<?php
/**
 * Created by javier
 * Date: 14/05/14
 * Time: 18:33
 */

App::uses( 'FormHelper', 'View/Helper' );

/**
 * Class BootstrapFormHelper
 */
class BootstrapFormHelper extends FormHelper {
    /**
     * @var array
     */
    protected $_bootstrapDefaults = array(
        'label'     => false,
        'div'       => array('class' => 'col-xs-9'),
        'class'     => 'form-control',
        'separator' => ''
    );

    /**
     * @param string $fieldName
     * @param array  $options
     *
     * @return string
     */
    public function input( $fieldName, $options = array() ) {
        return parent::input( $fieldName, array_merge( $this->_bootstrapDefaults, $options ) );
    }

	/**
	 * @param string $title
	 * @param null   $url
	 * @param array  $options
	 * @param bool   $confirmMessage
	 *
	 * @return string
	 */
	public function postLink( $title, $url = null, $options = array(), $confirmMessage = false ) {
		return parent::postLink( $title, $url, $options + array('escape' => false), $confirmMessage ); 
	}

    /**
     * @param       $title
     * @param array $options
     *
     * @return string
     */
    public function inputRadio( $title, $options = [] ) {
        $_radio_options = [
            'type' => 'radio',
            'legend' => false,
            'before' => '<div class="form-options"><label class="form-option-single">',
            'after' => '</label></div>',
            'separator' => '</label><label class="form-option-single">'
        ];

        return $this->input( $title, array_merge_recursive( $_radio_options, $options ) );
    }
} 