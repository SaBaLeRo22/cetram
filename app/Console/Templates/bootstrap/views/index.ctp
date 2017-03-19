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
<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
<div class="row">
	<div class="col-sm-2">
		<ul>
			<li><?php echo "<?php echo \$this->Html->link(sprintf(__('New %s'),__('" . $singularHumanName . "')), array('action' => 'add')); ?>"; ?></li>
	<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li><?php echo \$this->Html->link(sprintf(__('List %s'),__('" . Inflector::humanize($details['controller']) . "')), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t\t<li><?php echo \$this->Html->link(sprintf(__('New %s'),__('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
	?>
		</ul>
	</div>
	
	<div class="col-sm-10">
		<div class="row">
			<div class="col-sm-4">
			<?php
					echo "\t<?php\n";
					echo "\t\t\t\t\techo \$this->Html->link(sprintf(__('New %s'),__('" . $singularHumanName . "')).'&nbsp'.\$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-plus')),array('action'=>'add'),array('type'=>'button', 'class'=>'btn btn-success btn-sm', 'escape' => false));\n";
					echo "\t\t\t\t?>";
			?>			
			</div>
			<div class="col-sm-4 col-sm-offset-4 text-right">	
				<ul class="pagination pagination-sm">
				<?php
					echo "<?php\n";
					echo "\t\t\t\t\techo \$this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));\n";
					echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '','currentClass' => 'active','currentTag' => 'a','tag' => 'li'));\n";
					echo "\t\t\t\t\techo \$this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));\n";
					echo "\t\t\t\t?>\n";
				?>
				</ul>
			</div>
		</div>
		
		<table class="table table-striped table-bordered table-condensed">
			<thead>
			<tr>
			<?php foreach ($fields as $field): ?>
				<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
			<?php endforeach; ?>
				<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
			</tr>
			</thead>
			<tbody>
			<?php
			echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
			echo "\t\t\t\t<tr>\n";
				foreach ($fields as $field) {
					$isKey = false;
					if (!empty($associations['belongsTo'])) {
						foreach ($associations['belongsTo'] as $alias => $details) {
							if ($field === $details['foreignKey']) {
								$isKey = true;
								echo "\t\t\t\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
								break;
							}
						}
					}
					if ($isKey !== true) {
						echo "\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
					}
				}
		
				echo "\t\t\t\t\t<td class=\"actions\">\n";
				echo "\t\t\t\t\t\t<?php echo \$this->Form->button(\$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-eye-open')), array('type' => 'button','class' => 'btn btn-info btn-xs', 'onclick' => 'location.href=\''.\$this->Html->url(array('action' => 'view',\${$singularVar}['{$modelClass}']['{$primaryKey}']), true).'\'')); ?>\n";
				echo "\t\t\t\t\t\t<?php echo \$this->Form->button(\$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-pencil')), array('type' => 'button','class' => 'btn btn-primary btn-xs', 'onclick' => 'location.href=\''.\$this->Html->url(array('action' => 'edit',\${$singularVar}['{$modelClass}']['{$primaryKey}']), true).'\'')); ?>\n";
				echo "\t\t\t\t\t\t<?php echo \$this->Html->link(\$this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-trash')),'#', array('class'=>'btn btn-danger btn-xs btn-confirm','data-toggle'=> 'modal','data-target' => '#myModal','data-text' => sprintf('Desea confirmar eliminar el registro: %d?',\${$singularVar}['{$modelClass}']['{$primaryKey}']), 'data-action'=> Router::url( array('action'=>'delete',\${$singularVar}['{$modelClass}']['{$primaryKey}'])),'escape' => false), false); ?>\n";
				echo "\t\t\t\t\t</td>\n";
			echo "\t\t\t\t</tr>\n";		
			echo "\t\t\t<?php endforeach; ?>\n";
			?>
			</tbody>
		</table>
	</div>
	
	<div class="col-sm-12">
		<div class="text-right">		
			<ul class="pagination pagination-sm">
			<?php
				echo "<?php\n";
				echo "\t\t\t\techo \$this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));\n";
				echo "\t\t\t\techo \$this->Paginator->numbers(array('separator' => '','currentClass' => 'active','currentTag' => 'a','tag' => 'li'));\n";
				echo "\t\t\t\techo \$this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));\n";
				echo "\t\t\t?>\n";
			?>
			</ul>
		</div>
	</div>
</div>	
