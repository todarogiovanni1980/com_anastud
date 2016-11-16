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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_anastud', JPATH_SITE);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/media/com_anastud/js/form.js');

$user    = JFactory::getUser();
$canEdit = AnastudHelpersAnastud::canUserEdit($this->item, $user);


?>

<?php if ( $this->params->get('show_page_heading')!=0) : ?>
    <h1>
<?php echo $this->escape($this->params->get('page_heading')); ?>
    </h1>
<?php endif; ?>

<div class="studente-edit front-end-edit">
	<?php if (!$canEdit) : ?>
		<h3>
			<?php throw new Exception(JText::_('COM_ANASTUD_ERROR_MESSAGE_NOT_AUTHORISED'), 403); ?>
		</h3>
	<?php else : ?>
		<?php if (!empty($this->item->id)): ?>
			<h1><?php echo JText::sprintf('COM_ANASTUD_EDIT_ITEM_TITLE', $this->item->id); ?></h1>
		<?php else: ?>
			<h1><?php echo JText::_('COM_ANASTUD_ADD_ITEM_TITLE'); ?></h1>
		<?php endif; ?>

		<form id="form-studente"
			  action="<?php echo JRoute::_('index.php?option=com_anastud&task=studente.save'); ?>"
			  method="post" class="form-validate form-horizontal" enctype="multipart/form-data">

	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />

	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php echo $this->form->getInput('created_by'); ?>
				<?php echo $this->form->getInput('modified_by'); ?>
	<?php echo $this->form->renderField('cognome'); ?>

	<?php echo $this->form->renderField('nome'); ?>

	<?php echo $this->form->renderField('matricola'); ?>

	<?php echo $this->form->renderField('foto'); ?>

	<?php if (!empty($this->item->foto)) :
		foreach ((array) $this->item->foto as $singleFile) :
			if (!is_array($singleFile)) :
				echo '<a href="' . JRoute::_(JUri::root() . '/fotostudenti' . DIRECTORY_SEPARATOR . $singleFile, false) . '">' . $singleFile . '</a> ';
			endif;
		endforeach;
	endif; ?>
	<input type="hidden" name="jform[foto_hidden]" id="jform_foto_hidden" value="<?php echo str_replace('Array,', '', implode(',', (array) $this->item->foto)); ?>" />
			<div class="control-group">
				<div class="controls">

					<?php if ($this->canSave): ?>
						<button type="submit" class="validate btn btn-primary">
							<?php echo JText::_('JSUBMIT'); ?>
						</button>
					<?php endif; ?>
					<a class="btn"
					   href="<?php echo JRoute::_('index.php?option=com_anastud&task=studenteform.cancel'); ?>"
					   title="<?php echo JText::_('JCANCEL'); ?>">
						<?php echo JText::_('JCANCEL'); ?>
					</a>
				</div>
			</div>

			<input type="hidden" name="option" value="com_anastud"/>
			<input type="hidden" name="task"
				   value="studenteform.save"/>
			<?php echo JHtml::_('form.token'); ?>
		</form>
	<?php endif; ?>
</div>
