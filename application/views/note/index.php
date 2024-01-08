<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Listing Notes Perception</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('note/add'); ?>" class="btn btn-success btn-sm">Creer nouvelle note perception</a> 
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-sm table-striped">
                    <tr>
						<th>Contribuable</th>
						<th>N°Note </th>
						
						<th>N° Impot</th>
						<th>N° Compte</th>
						<th>Banque</th>
						<th>Montant</th>
                        <th>Date</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($notes as $t){ ?>
                    <tr>
						<td><?php echo $t['numero_fiche']; ?> - <?php echo $t['noms_complet']; ?></td>
						<td><?php echo $t['numero_reference_note']; ?></td>
						<td><?php echo $t['numero_impot']; ?></td>
						<td><?php echo $t['numero_compte_bancaire']; ?></td>
						<td><?php echo $t['nom_banque']; ?></td>
						<td><?php echo $t['montant_impot_du']; ?> <?php echo $t['devise_compte']; ?></td>
						<td><?php echo $t['date_creation']; ?></td>
						<td>
                            <a href="<?php echo site_url('note/edit/'.$t['note_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modifier</a> 
                            <a href="<?php echo site_url('note/remove/'.$t['note_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Supprimer</a>
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
