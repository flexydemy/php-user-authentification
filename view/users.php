<?php require 'header.php'; ?>
<div class="view full-page-intro" style="background-image: url('https://www.google.com.np/imgres?imgurl=https%3A%2F%2Fwww.w3schools.com%2Fw3css%2Fimg_lights.jpg&imgrefurl=https%3A%2F%2Fwww.w3schools.com%2Fw3css%2Fw3css_images.asp&docid=R0KnAtfyBDsyiM&tbnid=kwgHAQqTiLQXLM%3A&vet=10ahUKEwj5z9nr277bAhWBbX0KHZzyAS8QMwitASgBMAE..i&w=600&h=400&bih=702&biw=1366&q=image&ved=0ahUKEwj5z9nr277bAhWBbX0KHZzyAS8QMwitASgBMAE&iact=mrc&uact=8'); background-repeat: no-repeat; background-size: cover;">
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row wow fadeIn">
                <div class="col-md-6 mb-4 white-text text-center text-md-left">
                    <h1 class="display-4 font-weight-bold"><?= ucfirst($value->username); ?></h1>
                    <hr class="hr-light">
                    <p>
                        <strong>For the more information</strong>
                    </p>
                    <div class="modal-body text-info">
                        <p>
                            <?php
                            if (isset($errors)) {
                                echo $errors;
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-5 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" cible="#">
                                <p class="h4 text-center mb-4 font-weight-bold  ">Modifier vos parametres</p>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="username" readonly id="materialFormRegisterNameEx" class="form-control" value="<?= $value->username ?>">
                                    <label for="materialFormRegisterNameEx">Your username</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="email" name="email" id="materialFormRegisterEmailEx" class="form-control" value="<?= $value->email ?>">
                                    <label for="materialFormRegisterEmailEx">Your email</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" name="password" id="materialFormRegisterPasswordEx" class="form-control" value="<?= $value->password ?>">
                                    <label for="materialFormRegisterPasswordEx">Your password</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                                    <input type="password" name="new_password" id="materialFormRegisterConfirmEx" class="form-control">
                                    <label for="materialFormRegisterPasswordEx">New Your password</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                                    <input type="password" name="news_password" id="materialFormRegisterConfirmEx" class="form-control"  >
                                    <label for="materialFormRegisterPasswordEx">Confirm Your password</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="first_name" id="materialFormRegisterNameEx" class="form-control" value="<?= $value->first_name ?>">
                                    <label for="materialFormRegisterNameEx">Your name</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="last_name" id="materialFormRegisterNameEx" class="form-control" value="<?= $value->last_name ?>">
                                    <label for="materialFormRegisterNameEx">Your last name</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck12">
                                    <label for="defaultCheck12" class="grey-text">Accept the
                                        <a href="#" class="blue-text"> Terms and Conditions</a>
                                    </label>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal" name="update">Modifier</button>
                                
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>