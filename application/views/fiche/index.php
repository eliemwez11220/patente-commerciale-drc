<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Déclarations d'impôts</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('fiche/add'); ?>" 
                    class="btn btn-success btn-sm">Créer une nouvelle déclaration</a> 
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-sm table-striped">
                    <tr>
                        <th>Contribuable</th>
                        <th>FicheID</th>
						<th>Date</th>
                        <th>N° IPR</th>
						<th>Année</th>
						<th>Revenue</th>
                        <th>Etat</th>
                        <th>Validation</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($fiches as $t){ ?>
                    <tr>
                        <td>
                            <a href="<?php echo site_url('client/edit/'.$t['client_id']); ?>">
                            <span class="fa fa-info-circle"></span>  <?php echo $t['noms_complet']; ?></a>
                           </td>
						<td><?php echo $t['numero_fiche']; ?></td>
						<td><?php echo $t['date_creation']; ?></td>
						<td><?php echo $t['numero_impot']; ?></td>
						<td><?php echo $t['annee']; ?></td>
                        <td><?php echo $t['revenue']; ?> </td>
						<td><?php echo $t['statut_declaration']; ?></td>
                        <td><?php echo $t['date_validation']; ?></td>
						<td>
                           <a href="<?php echo site_url('fiche/edit/'.$t['fiche_id']); ?>" class="btn btn-info btn-xs">
                           <span class="fa fa-pencil"></span> Editer</a> 
                            <a href="<?php echo site_url('fiche/remove/'.$t['fiche_id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cette fiche? notez que cette opéation est irreversible') ">
                            <span class="fa fa-trash"></span> Supprimer</a>
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
