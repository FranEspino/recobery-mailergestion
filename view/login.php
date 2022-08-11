
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../src/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../src/img/favicon.png">
  <title>
    Mailer Gestion
  </title>
  <link id="pagestyle" href="../src/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>
<?php

       if(isset($_SESSION['email'] )){
        header("location: ../index.php");
        die();
      }else{
        include('../controller/login.php');
      }
  

?>
<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Mailer Gestion 📬</h4>
                  <p class="mb-0">Plataforma para la gestión de correos masivos efectivos.</p>
                </div>
                <div class="card-body">
                  <form role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                  <div class="mb-3">

                  <input 
                        name="correo"
                       type="email"
                       class="form-control form-control-lg" 
                       placeholder="Usuario" aria-label="Email">
                    </div>
                    <div class="mb-3">
                      <input type="password"
                       name="password"
                       class="form-control form-control-lg"
                        placeholder="Contraseña"
                         aria-label="Password">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Recordarme</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" 
                      name="send"
                      class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Iniciar Sesion</button>
                    </div>
                    <?php if(!empty($errores)): ?>
                      <div class="alert alert-danger text-light mt-4" role="alert">
                      <?php echo $errores; ?>
                    </div>
                    
                 
                  <?php endif ?>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                   No tienes una cuenta?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Registrarse</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://res.cloudinary.com/frapoteam/image/upload/v1657654981/sue-hughes-toQNPpuDuwI-unsplash_tlqd7a.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Envia correos masivos con un solo click"</h4>
                <p class="text-white position-relative">La manera mas facil de gestionar correos y enviar correos con componentes html, css personalizables.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

</body>

</html>