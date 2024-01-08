<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Paiements Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('paiement/add'); ?>" class="btn btn-success btn-sm">Enregistrer nouveau paiement</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Date</th>
						<th>Etat</th>
						<th>Note</th>
						<th>Client</th>
						<th>Banque</th>
						<th>Montant</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($paiements as $t){ ?>
                    <tr>
						<td><?php echo $t['date_paiement']; ?></td>
						<td><?php echo $t['statut_paiement']; ?></td>
						<td><?php echo $t['numero_reference_note']; ?></td>
						<td><?php echo $t['noms_complet']; ?></td>
						<td><?php echo $t['nom_banque']; ?></td>
                        <td><?php echo $t['montant_verser']; ?></td>
						<td>
                            <a href="<?php echo site_url('paiement/edit/'.$t['paiement_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modifier</a> 
                            <a href="<?php echo site_url('paiement/remove/'.$t['paiement_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Supprimer</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
