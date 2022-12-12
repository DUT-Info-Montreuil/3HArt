<?php

  class vue_accueil extends vue_generique {

      function __construct(){
        parent::__construct();
      }
      // public function formulaireSuppression(){
      //     echo "<form method = POST action = \" index.php?module=accueil&action=suppression \" >";
      //         echo "<label>Entrez l'indice de l'image à supprimer</label> ";
      //         echo "<input type=text id= num name=id></input>";
      //         echo "<br>";
      //         echo "<br>";
      //         echo "<input type =\"submit\" name = envoyer >";
      //     echo "</form>";

      // }

      public function menu() {
      ?>
        <div id="accueil-list-image" class="list-image-scroll">
            <ul class="row-list">
              <li class="inline">
                <a href="index.php?module=image&nom=6356cfeea83ca.webp&action=image">
                  <img class="inline grande-image-pour-list" src="./imageTest/6356cfeea83ca.webp" alt="">
                </a>
              </li>
              <li class="inline">
                <a href="index.php?module=image&nom=628b1ba0599c7.webp&action=image">
                  <img class="inline grande-image-pour-list" src="./imageTest/628b1ba0599c7.webp" alt="">
                </a>
              </li>
              <li class="inline">
                <a href="index.php?module=image&nom=6313b92632599.webp&action=image">
                  <img class="inline grande-image-pour-list" src="./imageTest/6313b92632599.webp" alt="">
                </a>
              </li>
            </ul>
        </div>

        <div id="option">
          <div>
            <a href="index.php?module=image&action=upload">
              <img class="icon" src="./publicImage/upload.svg" alt="Poster une image"></img>
              <p>Poster Image</p>
            </a>
          </div>
          <div>
            <a href="">
              <img src="" alt=""></img>
              <p></p>
            </a>
          </div>
          <div>
            <a href="">
              <img src="" alt=""></img>
              <p></p>
            </a>
          </div>
          <div>
            <a href="">
              <img src="" alt=""></img>
              <p>Plus</p>
            </a>
          </div>
        </div>

        <div id="album">
          <div><a href=""><img src="" alt=""></a></div>
          <div><a href=""><img src="" alt=""></a></div>
          <div><a href=""><img src="" alt=""></a></div>
          <div><a href=""><img src="" alt=""></a></div>
        </div>

        <div id="decouvrir"><a href=""><img src="" alt=""></a></div>

        <div id="listAbonnement">
          <ul></ul>
        </div>
      <?php
      }
  }
?>