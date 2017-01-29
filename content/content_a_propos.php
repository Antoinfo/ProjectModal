<?php

echo <<<FIN
<div class="row">
<div class="col-md-7 col-md-offset-2">
    <h2>  Le principe</h2>
<p>
  Notre site vous permet de créer des votes qui ne pourront pas être interceptés par quelqu'un d'autre.
</p>
<p> En effet, vous choississez: <p>-la ou les questions que vous désirez poser.</p>
   <p> -l'ensemble des indivus que vous désirez soumettre au test.</p> 
<p> Puis en envoyant un lien à l'ensemble des votants (éventuellement modifier cette partie: envoie direct et création du token après envoie et non avant ?), vous leur permettez d'aller répondre à vos questions et de soumettre leur vote.</p>
<p></p>
<p></p>
<p> Afin de répondre au vote, les votants doivent entrer l'identifiant de la question, puis cliquer sur chiffrer dans l'onglet vote disponible.</p>
<p> Ils doivent ensuite entrer leur token pour soumettre leur vote. </p>
<p></p>
<p></p>
<p></p>
<p>Dans un second temps, une fois l'ensemble des votes réalisés, le sondeur peut aller récupérer le résultat du vote dans l'onglet résultat.</p>

<p>Pour cela il rentre l'identifiant de sa question et récupère le chiffré associé au résultat.</p>

<p>Il entre alors sa clé privée et clique sur Déchiffrer.</p>
<p>Il obtient finalement la somme des votes et le détail de ces derniers.</p>

</div>
</div>

FIN;


    
    
?>


