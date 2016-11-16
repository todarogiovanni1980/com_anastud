<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Anastud
 * @author     Todaro Giovanni - Consiglio Nazionale delle Ricerche -  Istituto per le Tecnologie Didattiche <giovanni.todaro@itd.cnr.it>
 * @copyright  2016 Todaro Giovanni - Consiglio Nazionale delle Ricerche -  Istituto per le Tecnologie Didattiche
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Studente controller class.
 *
 * @since  1.6
 */
class AnastudControllerStudente extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'studenti';
		parent::__construct();
	}
}
