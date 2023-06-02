<?php

 foreach($Passages as $ligne)
 {
    $Nom = $ligne['Nom'];
    $Prenom = $ligne['Prenom'];
 }
?>
    <h1></h1>
    <h1 style='text-align:center;'> Historique de l'élève : </h1><br>
    <h2 style='text-align:center; margin-bottom:3%;'><?php echo $Nom.' '.$Prenom ?></h2>
    <table class="table">
        <thead class="thead-dark" style="background-color:black; color:white; text-align:center;">
            <tr>
                <th>Code de l'élève</th>
                <th>Nom</th>
                <th>Prenom</th>      
                <th>Date</th>
                <th>Heure</th>
                <th>Lieu</th>
                <th>Evenement</th>
            </tr>
        </thead>
        <tbody style='text-align:center;'>
            <?php
                foreach($Passages as $ligne)
                {
                    $temp = explode(' ', $ligne['Date']);
                    $Date = $temp[0];
                    $Heure = $temp[1];

                    $temp = explode('-', $Date);
                    $Date = $temp[2].'/'.$temp[1].'/'.$temp[0];

                    $temp = explode(':',$Heure);
                    $Heure = $temp[0].':'.$temp[1]; 

                    echo "<tr>";
                    echo "<td>".$ligne['CodeEleve']."</td>";
                    echo "<td>".$ligne['Nom']."</td>";
                    echo "<td>".$ligne['Prenom']."</td>";
                    echo "<td>".$Date."</td>";
                    echo "<td>".$Heure."</td>";
                    echo "<td>".$ligne['LibLieu']."</td>";
                    echo "<td>".$ligne['LibEvent']."</td>";

                    

                    echo "</tr>";
                }
                ?>
        </tbody>
    </table>
