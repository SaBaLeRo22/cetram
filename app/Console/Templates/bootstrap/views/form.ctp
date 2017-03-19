<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row">
	<div class="col-sm-2">
		<div class="actions">
			<h3><?php echo "<?php echo __('Actions'); ?>"; ?></h3>
			<ul>
		<?php if (strpos($action, 'add') === false): ?>
				<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array(), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
		<?php endif; ?>
				<li><?php echo "<?php echo \$this->Html->link(sprintf(__('List %s'),__('" . $pluralHumanName . "')), array('action' => 'index')); ?>"; ?></li>
		<?php
				$done = array();
				foreach ($associations as $type => $data) {
					foreach ($data as $alias => $details) {
						if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
							echo "\t\t\t\t<li><?php echo \$this->Html->link(sprintf(__('List %s'),__('" . Inflector::humanize($details['controller']) . "')), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
							echo "\t\t\t\t\t\t<li><?php echo \$this->Html->link(sprintf(__('New %s'),__('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
							$done[] = $details['controller'];
						}
					}
				}
		?>
			</ul>
		</div>
	</div>
	
	<div class="col-sm-10">
		<div class="<?php echo $pluralVar; ?> form">
			<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
				<div class="row">
					<legend><?php printf("<?php echo sprintf(__('%s %s'),__('".$singularHumanName."')); ?>", Inflector::humanize($action),'%s'); ?></legend>
				<?php
					
					foreach ($fields as $field) {
						if (strpos($action, 'add') !== false && $field === $primaryKey) {
							continue;
						} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
							echo "\t\t\t\t\t<div class='form-group col-xs-8'>\n";
							echo "\t\t\t\t\t\t<?php\n";
							echo "\t\t\t\t\t\t\techo \$this->Form->input('{$field}',array('class'=>'form-control input-sm'));\n";
							echo "\t\t\t\t\t\t?>\n";
							echo "\t\t\t\t\t</div>\n";
						}
					}
					if (!empty($associations['hasAndBelongsToMany'])) {
						foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
							echo "\t\t\t\t\t<div class='form-group col-xs-8'>\n";
							echo "\t\t\t\t\t\t<?php\n";
							echo "\t\t\t\t\t\t\techo \$this->Form->input('{$assocName}',array('class'=>'form-control input-sm'));\n";
							echo "\t\t\t\t\t\t?>\n";
							echo "\t\t\t\t\t</div>\n";
						}
					}
					
				?>
				</div>
			<?php echo "<?php echo \$this->Form->button(__('Submit'), array('type' => 'submit','class'=>'btn btn-default btn-sm')); ?>\n"; ?>
			<?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
		</div>
	</div>
	
</div>
