<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 * @var \Cake\Collection\CollectionInterface|string[] $departments
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="one_half form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Forget Password ') ?></legend>
                <?php
                    echo $this->Form->control('email');
                ?>

            </fieldset>
         
           
            <?= $this->Form->button(__('Submit'))?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
