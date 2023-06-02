<form action="index.php?ctl=User&action=validLogin" method="POST">
  <section class="gradient-custom">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center" style='padding:0;'>

              <div>

                <h2 class="fw-bold mb-2 text-uppercase">Se connecter</h2>
                <p class="text-white-50 mb-4">Veuillez rentrer un Email et un Mot-de-passe valide.</p>

                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typeEmailX">Email</label>
                  <input type="email" id="email" name='email' class="form-control form-control-lg" />
                </div>

                <div class="form-outline form-white mb-4">
                  <label class="form-label" id="mdplabel" for="typePasswordX">Mot-de-Passe</label>
                  <input type="password" id="password" name='password' class="form-control form-control-lg" />
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Connexion</button>

                <?php
                  if(isset($_GET['msg']))
                  {
                ?>
                    <div class="alert alert-danger" role="alert " style='margin-top:5%;'>
                      <?php echo $_GET['msg'] ?>
                    </div>
                <?php
                  }
                ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>