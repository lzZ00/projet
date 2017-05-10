
<div class="col-lg-6">
    <table class="table-bordered table-responsive table col-lg-6 "style="float: right">
        <caption style="text-align: center"> test </caption>
        <thead>
        <tr><th>photo</th><th>nom</th><th>prix</th>
        </tr>
        </thead>
        <?php foreach ($produits as $donnes): ?>
        <tbody>
        <tr>
            <td><img src="<?php echo base_url()?>assets/img/<?php echo $donnes['photo']?>" width="50" alt="photo"/></td>
            <td><?php echo $donnes['nom']?> </td>
            <td><?php echo $donnes['prix']?></td>
        </tr><!-- {% endfor %}-->
        <?php endforeach; ?>
        <tbody>

    </table>
    <?php echo $this->pagination->create_links(); ?>
    </div>