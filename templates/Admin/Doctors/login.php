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
                <legend><?= __('Add Doctor') ?></legend>
                <?php
                    //echo $this->Form->control('name');
                    //echo $this->Form->control('department_id', ['options' => $departments]);
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                ?>

            </fieldset>
            <button><a href="/doctors/forget" class="btn-primary"> Forget Password  </a></button>
           
            <?= $this->Form->button(__('Submit'))?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
