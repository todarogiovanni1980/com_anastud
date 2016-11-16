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

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_anastud');

if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_anastud'))
{
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>

<?php if ( $this->params->get('show_page_heading')!=0) : ?>
    <h1>
<?php echo $this->escape($this->params->get('page_heading')); ?>
    </h1>
<?php endif; ?>

<div class="item_fields">

	<table class="table">


		<tr>
			<th><?php echo JText::_('COM_ANASTUD_FORM_LBL_STUDENTE_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ANASTUD_FORM_LBL_STUDENTE_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ANASTUD_FORM_LBL_STUDENTE_MODIFIED_BY'); ?></th>
			<td><?php echo $this->item->modified_by_name; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ANASTUD_FORM_LBL_STUDENTE_COGNOME'); ?></th>
			<td><?php echo $this->item->cognome; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ANASTUD_FORM_LBL_STUDENTE_NOME'); ?></th>
			<td><?php echo $this->item->nome; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ANASTUD_FORM_LBL_STUDENTE_MATRICOLA'); ?></th>
			<td><?php echo $this->item->matricola; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_ANASTUD_FORM_LBL_STUDENTE_FOTO'); ?></th>
			<td>
			<?php
			foreach ((array) $this->item->foto as $singleFile) :
				if (!is_array($singleFile)) :
					$uploadPath = '/fotostudenti' . DIRECTORY_SEPARATOR . $singleFile;
					 echo '<a href="' . JRoute::_(JUri::root() . $uploadPath, false) . '" target="_blank">' . $singleFile . '</a> ';
				endif;
			endforeach;
		?></td>
		</tr>

	</table>

</div>

<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn" href="<?php echo JRoute::_('index.php?option=com_anastud&task=studente.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_ANASTUD_EDIT_ITEM"); ?></a>

<?php endif; ?>

<?php if (JFactory::getUser()->authorise('core.delete','com_anastud.studente.'.$this->item->id)) : ?>

	<a class="btn" href="<?php echo JRoute::_('index.php?option=com_anastud&task=studente.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_ANASTUD_DELETE_ITEM"); ?></a>

<?php endif; ?>
