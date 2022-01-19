<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appoint $appoint
 * @var string[]|\Cake\Collection\CollectionInterface $patients
 * @var string[]|\Cake\Collection\CollectionInterface $doctors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            
        </div>  
    </aside>
    <div class="column-responsive column-80">
        <div class="one_half form content">
            <?= $this->Form->create($appoint) ?>
            <fieldset>
                <legend><?= __('Edit Appoint') ?></legend>
                <?php
                    
                    echo $this->Form->label('payment');
                    echo $this->Form->radio('payment',['Pending','Completed']);
                    echo $this->Form->label('status');
                    echo $this->Form->radio('status',['Pending','Completed']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
