 <div class="site-section site-section-sm site-blocks-1">
     <div class="container">
         <div class="row">
             <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                 <div class="card card-primary">

                     <div class="card-header">
                         <h4 class="m-0 pt-1 text-black text-center">UBAH PASSWORD</h4>
                     </div>

                     <div class="card-body">
                         <?php App\Core\Session::getFlash(); ?>
                         <form method="POST" action="<?= url('auth/updatepassword') ?>">


                             <div class="form-group">
                                 <label for="password" class="control-label">Password Lama</label>
                                 <input type="password" class="form-control" name="old_password" required>
                             </div>

                             <div class="form-group">
                                 <label for="password" class="control-label">Password Baru</label>
                                 <input type="password" class="form-control" name="new_password" required>
                             </div>

                             <div class="form-group">
                                 <label for="password" class="control-label">Konfirmas Password Baru</label>
                                 <input type="password" class="form-control" name="re_newpassword" required>
                             </div>


                             <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-lg btn-block">
                                     Reset Password
                                 </button>
                             </div>

                         </form>
                     </div>

                 </div>


             </div>
         </div>
     </div>
 </div>