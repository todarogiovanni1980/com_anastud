<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Anastud
 * @author     Todaro Giovanni - Consiglio Nazionale delle Ricerche -  Istituto per le Tecnologie Didattiche <giovanni.todaro@itd.cnr.it>
 * @copyright  2016 Todaro Giovanni - Consiglio Nazionale delle Ricerche -  Istituto per le Tecnologie Didattiche
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Studenti list controller class.
 *
 * @since  1.6
 */
class AnastudControllerStudenti extends AnastudController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Studenti', $prefix = 'AnastudModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
