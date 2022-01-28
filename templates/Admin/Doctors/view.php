<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">

        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="one_half view content">
            <h3><?= h($doctor->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($doctor->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= $doctor->has('department') ? $this->Html->link($doctor->department->name, ['controller' => 'Departments', 'action' => 'view', $doctor->department->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($doctor->email) ?></td>
                </tr>
                
            </table>
            <div class="related">
                <h4><?= __('Related Appoints') ?></h4>
                <?php if (!empty($doctor->appoints)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Patient Name') ?></th>
                           
                            <th><?= __('Appoint Date') ?></th>
                            <th><?= __('Payment') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($doctor->appoints as $appoints) : ?>
                        <tr>
                            <td><?= h($appoints->id) ?></td>
                            <td><?= h($appoints->patient->name) ?></td>
                           
                            <td><?= h($appoints->appoint_date) ?></td>
                            <td><?php if($appoints->payment == 0){
                                echo "Pending";
                            
                            }else {
                                echo "Completed";
                            } ?></td>
                            <td><?php if($appoints->status == 0){
                                echo "Pending";
                            
                            }else {
                                echo "Completed";
                            } ?></td>
                            <td class="actions">
                                
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Appoints', 'action' => 'edit', $appoints->id]) ?>
                               
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
