<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập | Tròn Design</title>

    <!-- Bootstrap -->
    <link href="/public/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/public/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/public/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/public/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/public/admin/assets/css/custom.min.css" rel="stylesheet">


    <link rel="icon" href="http://www.trondesign.vn/media/favicon/default/favicon_1.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://www.trondesign.vn/media/favicon/default/favicon_1.ico" type="image/x-icon" />
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Đăng nhập</h1>
              <?php if(isset($error)): ?>
                <p style="color: red"><?php echo $error ?></p>
              <?php endif; ?>
              <div>
                <input type="text" class="form-control" placeholder="Email" required name="email" value="<?php echo isset($form['email']) ? $form['email'] : '' ?>" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required name="password" value="<?php echo isset($form['password']) ? $form['password'] : '' ?>" />
              </div>
              <div>
                <button class="btn btn-default submit" name="submit" value="TRUE">Đăng nhập</button>
                <a class="reset_pass" href="#">Quên mật khẩu ?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">Thành viên mới
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Tròn Design</h1>
                  <p>©2016 All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>