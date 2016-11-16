<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Anastud
 * @author     Todaro Giovanni - Consiglio Nazionale delle Ricerche -  Istituto per le Tecnologie Didattiche <giovanni.todaro@itd.cnr.it>
 * @copyright  2016 Todaro Giovanni - Consiglio Nazionale delle Ricerche -  Istituto per le Tecnologie Didattiche
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Anastud', JPATH_COMPONENT);
JLoader::register('AnastudController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Anastud');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
