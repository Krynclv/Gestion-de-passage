<table class="table">
        <thead class="thead-dark" style="background-color:black; color:white; text-align:center;">
          <tr>
            <th>Évenement(s)</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody style='text-align:center;'>
                    <?php
                    if(isset($lister))
                      foreach($lister as $ligne){
                        echo "<tr>
                          <td>".$ligne['LibelleEvent']."</td>
                          
                          <td>
                          
                            <a href=index.php?ctl=Ajouter&action=supprimerEvent&IdEvent=".$ligne['IdEvent']."><img class='crx' src='./vue/image/croix.png'></a>
                      
                          </td> 
                          </tr>";		
                      }
                    ?>
        </tbody>
      </table>