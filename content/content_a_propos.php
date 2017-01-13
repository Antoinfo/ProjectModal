<?php

echo <<<FIN
<div class="row">
<div class="col-md-7 col-md-offset-2">
    <h2>Le principe</h2>
<p>
  Notre site vous permet de créer des votes qui ne pourront pas être interceptés par quelqu'un d'autre.
</p>
<p> En effet, vous choissisez: <p>-la ou les questions que vous désirez poser.</p>
   <p> -l'ensemble des indivus que vous désirez soumettre au test.</p> 
<p> Puis en envoyant un lien à l'ensemble des votants (éventuellement modifier cette partie: envoie direct et création du token après envoie et non avant ?), vous leur permettez d'aller répondre à vos questions et de soumettre leur vote.</p>
<p></p>
<p></p>
<p> Afin de répondre au vote, les votants doivent entrer (le numéro de question,) ainsi que la clé publique, puis cliquer sur chiffrer dans l'onglet vote disponible.</p>
<p> Ils doivent ensuite entrer ce chiffré ainsi que leur token pour soumettre leur vote. </p>
<p></p>
<p></p>
<p></p>
<p>Dans un second temps, une fois l'ensemble des votes réalisés, le sondeur peut aller récupérer le résultat du vote dans l'onglet résultat.</p>

<p>Pour cela il rentre l'identifiant de sa question (faire une partie direct numéro de question au lieu de passer par le résulat) et récupére le chiffré associé.</p>

<p>Il ajoute ce dernier à résultat et entre sa clé privé et sa clé publique (peut être faire en sorte de ne pas avoir à réécrire la clé publique à chaque fois) et clique sur déchiffré.</p>
<p>Il obtient  la somme des votes (pour l'instant nous avons que des zéros et des uns, il suffit de diviser la somme par le nombre de votant, puis de comparer ce dernier résultat à 1/2 pour obtenir le résultat (si <1/2 le 0 l'emporte sinon c'est le 1).</p>

 </p>
</div>
</div>

 
FIN;
?>


