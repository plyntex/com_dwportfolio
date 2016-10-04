<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_dwportfolio
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder = $this->escape($this->filter_order);
$listDirn = $this->escape($this->filter_order_Dir);

?>
<form action="index.php?option=com_dwportfolio&view=dwitems" method="post" id="adminForm" name="adminForm">
    <div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
    
    <div id="j-main-container" class="span10">
       <?php
		// Search tools bar
		echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
		?>
        <table class="table table-striped table-hover">
		<!--  HEAD -->
		<thead>
			<tr>
				<th width="1%"><?php echo JText::_('COM_DWPORTFOLIO_NUM'); ?></th>
				<th width="2%">
					<?php echo JHtml::_('grid.checkall'); ?>
				</th>
				<th width="90%">
					<?php echo JHtml::_('grid.sort', 'COM_DWPORTFOLIO_DWITEMS_NAME', 'title', $listDirn, $listOrder); ?>
				</th>
				<th width="5%">
					<?php echo JHtml::_('grid.sort', 'COM_DWPORTFOLIO_PUBLISHED', 'published', $listDirn, $listOrder); ?>
				</th>
				<th width="2%">
					<?php echo JHtml::_('grid.sort', 'COM_DWPORTFOLIO_ID', 'id', $listDirn, $listOrder); ?>
				</th>
			</tr>
		</thead>
		
		<!--  FOOTER -->
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		
		<!-- BODY -->
		<tbody>
			<?php if( !empty($this->items) ): ?>
				<?php foreach ($this->items as $i => $row ): ?>
					<?php $link = JRoute::_('index.php?option=com_dwportfolio&task=dwportfolio.edit&id=' . $row->id); ?>
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_DWPORTFOLIO_EDIT_DWPORTFOLIO'); ?>">
								<?php echo $row->title; ?>
							</a>
						</td>
						<td align="center">
							<?php echo JHtml::_('jgrid.published', $row->published, $i, 'dwitems.', true, 'cb'); ?>
						</td>
						<td>
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
    </div>
    
	
	
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>	
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>