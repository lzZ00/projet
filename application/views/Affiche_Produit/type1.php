<table class="table table-hover">
    <tr><th>nom</th><th>prix</th>
    </tr>
    <?php foreach ($type as $donnes): ?>
        <tr>
            <td><?php echo $donnes['nom']?> </td>
            <td><?php echo $donnes['prix']?></td>
    <?php endforeach;?>
</table>

