
<table class="table table-hover">
    <tr><th>nom</th><th>prix</th>
    </tr>
    </thead>

<?php foreach ($produits as $donnes): ?>
    <tr>
  <td> <?php echo $donnes['nom']?> </td>
    <td><?php echo $donnes['prix']?></td>
        </tr>

<?php endforeach; ?>

    </table>
