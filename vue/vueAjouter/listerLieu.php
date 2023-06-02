<table class="table">
        <thead class="thead-dark" style="background-color:black; color:white; text-align:center;">
          <tr>
            <th>Lieu(x)</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody style='text-align:center;'>
                    <?php
                    if(isset($lister))
                      foreach($lister as $ligne){
                        echo "<tr>
                          <td>".$ligne['LibelleLieu']."</td>
                          
                          <td>
                          
                            <a href=index.php?ctl=Ajouter&action=supprimerLieu&IdLieu=".$ligne['IdLieu']."><img class='crx' src='./vue/image/croix.png'></a>
                      
                          </td> 
                          </tr>";		
                      }
                    ?>
        </tbody>
      </table>