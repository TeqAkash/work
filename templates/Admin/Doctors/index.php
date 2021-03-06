<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor[]|\Cake\Collection\CollectionInterface $doctors
 */
?>
<div class="three_quarter index content">
   
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?= $this->Number->format($doctor->id) ?></td>
                    <td><?= h($doctor->name) ?></td>
                    
                    <td><?= h($doctor->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['prefix' =>false,'action' => 'view', $doctor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['prefix' =>false,'action' => 'edit', $doctor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['prefix' =>false,'action' => 'delete', $doctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
