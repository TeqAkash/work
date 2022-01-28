<!DOCTYPE html>
<html>

<head>
    <title>Forget Password</title>
    
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="users form">
                    <div class="card-header">
                        <?= $this->Flash->render() ?>
                        <h3 class="text-center">Reset Password</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <!-- <span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span> -->
                        </div>
                        <?= $this->Form->create(null, ['id' => 'form', 'class' => 'form-control']) ?>
                    </div>
                    <div class="card-body">



                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>

                                <?= $this->Form->control('Enter Otp', ['name'=>'token','required' => false, 'class' => 'form-control']) ?>
                            </div>


                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>

                                <?= $this->Form->control('New password', ['name'=>'password','required' => false, 'class' => 'form-control']) ?>
                            </div>


                        </div> <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>

                                <?= $this->Form->control('confirm Password', ['name'=>'cpassword','required' => false, 'class' => 'form-control']) ?>
                            </div>


                        </div>
                      

                        </div>

                        <div class="form-group">
                            <?= $this->Form->submit(__('Submit'), [' class' => 'btn float-center login_btn']); ?>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">



                       </div>

                </div>
            </div>
        </div>

</body>

</html>