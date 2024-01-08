<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modification de la déclaration</h3>
            </div>
            <?php 
				if(isset($fiche) && (! empty($fiche))):
				echo form_open('fiche/edit/'.$fiche['fiche_id']); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
						<label for="numero_fiche" class="control-label">Numéro Fiche</label>
						<div class="form-group">
							<input type="text" readonly name="numero_fiche" value="<?php echo $fiche['numero_fiche']; ?>" class="form-control" id="numero_fiche" />
						<span class="text-danger"><?php echo form_error('numero_fiche');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="date_fiche" class="control-label">Date Fiche</label>
						<div class="form-group">
							<input type="text" name="date_fiche" value="<?php echo $fiche['date_creation']; ?>" class="form-control" id="date_fiche" readonly/>
						<span class="text-danger"><?php echo form_error('date_fiche');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="annee" class="control-label">Année de déclaration</label>
						<div class="form-group">
							<input type="text" name="annee" value="<?php echo $fiche['annee']; ?>"
							 class="form-control" id="annee" readonly />
						<span class="text-danger"><?php echo form_error('annee');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="raison_sociale" class="control-label">Raison sociale</label>
						<div class="form-group">
							<input autofocus type="text" name="raison_sociale" value="<?php echo $fiche['raison_sociale']; ?>" class="form-control" id="raison_sociale" />
						<span class="text-danger"><?php echo form_error('raison_sociale');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="client_sid" class="control-label">Contribuable concerné</label>
						<div class="form-group">
							<select name="client_sid" class="form-control">
								<option value="">sélectionner un contribuable</option>
								<?php 
								$client =  $fiche['client_sid'];
								foreach($all_clients as $client)
								{
									$selected = ($fiche['client_sid'] == $client['client_id']) ? ' selected="selected"' : "";
									echo '<option value="'.$client['client_id'].'" '.$selected.'>'.$client['noms_complet'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="ipr_numero" class="control-label">Numéro Impôt</label>
						<div class="form-group">
							<input type="text" name="ipr_numero" value="<?php echo $fiche['numero_impot']; ?>" class="form-control" id="ipr_numero" />
						<span class="text-danger"><?php echo form_error('ipr_numero');?></span></div>
					</div>
					
					<div class="col-md-4">
						<label for="revenue" class="control-label">Revenue en CDF</label>
						<div class="form-group">
							<input type="text" name="revenue" value="<?php echo $fiche['revenue']; ?>" class="form-control" id="revenue" />
						<span class="text-danger"><?php echo form_error('revenue');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="mode_paiement" class="control-label">Mode de paiement</label>
						<div class="form-group">
							<select name="mode_paiement" class="form-control">
								<option disabled >- selectionnez-</option>
								<option value="banque" <?= set_select('mode_paiement', 'banque');?>>Banque</option>
								<option value="cash" <?= set_select('mode_paiement', 'cash');?>>Cash</option>
							</select>
						<span class="text-danger"><?php echo form_error('mode_paiement');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="status" class="control-label">Etat de la déclaration</label>
						<div class="form-group">
							<select name="status" class="form-control">
								<option disabled>Sélectionnez</option>
								<?php 
								$statut_paiement_values = array(
									'valide'=>'Validé',
									'encours'=>'Non approuvée',
									'annule'=>'Annulé',
								);

								foreach($statut_paiement_values as $value => $display_text)
								{
									$selected = ($value == $fiche['statut_declaration']) ? ' selected="selected"' : "";
									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<label for="observation" class="control-label">Observation</label>
						<div class="form-group">
							<textarea name="observation" class="form-control" id="observation"><?php echo $fiche['observation']; ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Enregistrer les modifications de  la déclaration
            	</button>
          	</div>
            <?php echo form_close(); ?>
			 <?php endif; ?>
      	</div>
    </div>
</div>