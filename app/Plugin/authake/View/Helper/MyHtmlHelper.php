<?php
/**
 * Created by javier
 * Date: 26/09/14
 * Time: 00:41
 */
App::uses( 'HtmlHelper', 'View/Helper' );

/**
 * Class MyHtmlHelper
 */
class MyHtmlHelper extends HtmlHelper {
	/**
	 * @param string $title
	 * @param null   $url
	 * @param array  $options
	 * @param bool   $confirmMessage
	 *
	 * @return string
	 */
	public function link( $title, $url = null, $options = array(), $confirmMessage = false ) {
		return parent::link( $title, $url, $options + array('escape' => false), $confirmMessage ); 
	}
} 