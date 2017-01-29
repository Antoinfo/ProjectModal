<?php

echo <<<FIN
<div class="container">

       

  <h1>Création d'un compte</h1>

            </br>
            </br>

            <div class="col-md-12">

                    <div class="caption-full">
                        
                           </br>
                              
                             <form class action="index.php?todo=creercompte" method="post"
                             oninput="up2.setCustomValidity(up2.value != mdp.value ? 'Les mots de passe diffèrent.' : '')">
                            <fieldset>

                            <!-- Form Name -->
                                <legend>Nouveau Compte</legend>
                        </br>





  <!-- Text input-->

<div class="form-group">
                                        
                                    <label>Login</label>
                                    <input type="text" placeholder="Votre nom d'utilisateur" id="login" name="login"  class="form-control" required>
                                  
                                </div>


<div class="form-group">
                                        
                                    <label>Nom</label>
                                    <input type="text" placeholder="Votre nom de famille" id="nom" name="nom"  class="form-control" required>
                                  
                                </div>
                                          

<div class="form-group">
                                        
                                    <label>Email</label>
                                    <input type="text" placeholder="Votre adresse électronique" id="email" name="email" class="form-control" required>
                                  
                                </div>
                                    
<div class="form-group">
                                        
                                    <label for="password1">Password</label>
                                    <input type="password"  placeholder="Votre mot de passe (au moins 8 caractères)" id="password1" name="mdp"  class="form-control" required>
                                  
                                </div>

<div class="form-group">
                                        
                                    <label for="password2">Confirm password</label>
                                    <input type="password" placeholder="Le même mot de passe (au moins 8 caractères)" id="password2" name="up2"  class="form-control" required>
                                  
                                </div>
 
   
   <!-- Button -->
                                <div class="form-group">
                                        <div class="col-md-4">
                                            <button name="singlebutton" class="btn btn-primary">Créer votre compte</button>
                                            </br></br>
                                            </div>
                                            


                                    </div>
                                 </fieldset>
                                </form>
            </div>
            </div>
            </div>

FIN;

?>