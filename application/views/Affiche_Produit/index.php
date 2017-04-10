
<table class="table table-hover">
    <tr><th>nom</th><th>prix</th><th>operation</th>
    </tr>
    </thead>

<?php foreach ($produits as $donnes): ?>
    <tr>
  <td> <?php echo $donnes['nom']?> </td>
    <td><?php echo $donnes['prix']?></td>
        <td>
            <a href=" ">modifier</a>
            <a href=>supprimer</a>
        </td>
        </tr>

<?php endforeach; ?>

    </table>
