<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Creation nouvelle déclaration</h3>
            </div>
            <?php echo form_open('fiche/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
						<label for="numero_fiche" class="control-label">Numéro Fiche</label>
						<div class="form-group">
							<input type="text" readonly name="numero_fiche" value="<?php echo time(); ?>" class="form-control" id="numero_fiche" />
						<span class="text-danger"><?php echo form_error('numero_fiche');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="date_fiche" class="control-label">Date Fiche</label>
						<div class="form-group">
							<input type="text" name="date_fiche" value="<?php echo date('Y-m-d H:i:s'); ?>" class="form-control" id="date_fiche" readonly/>
						<span class="text-danger"><?php echo form_error('date_fiche');?></span></div>
					</div>
					<div class="col-md-4">
						<label for="annee" class="control-label">Année de déclaration</label>
						<div class="form-group">
							<input type="text" name="annee" value="<?php echo date('Y'); ?>"
							 class="form-control" id="annee" readonly />
						<span class="text-danger"><?php echo form_error('annee');?></span></div>
					</div>
					<div class="col-md-6">
						<label for="raison_sociale" class="control-label">Raison sociale</label>
						<div class="form-group">
							<input autofocus type="text" name="raison_sociale" value="<?php echo $this->input->post('raison_sociale'); ?>" class="form-control" id="raison_sociale" />
						<span class="text-danger"><?php echo form_error('raison_sociale');?></span></div>
					</div>
					<div class="col-md-6">
						<label for="client_sid" class="control-label">Contribuable concerné</label>
						<div class="form-group">
							<select name="client_sid" class="form-control">
								<option value="">sélectionner un contribuable</option>
								<?php 
								foreach($all_clients as $vehicule)
								{
									$selected = ($vehicule['client_id'] == $this->input->post('client_sid')) ? ' selected="selected"' : "";
									echo '<option value="'.$vehicule['client_id'].'" '.$selected.'>'.$vehicule['noms_complet'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="ipr_numero" class="control-label">Numéro Impôt</label>
						<div class="form-group">
							<input type="text" name="ipr_numero" value="<?php echo $this->input->post('ipr_numero'); ?>" class="form-control" id="ipr_numero" />
						<span class="text-danger"><?php echo form_error('ipr_numero');?></span></div>
					</div>
					
					<div class="col-md-4">
						<label for="revenue" class="control-label">Revenue en CDF</label>
						<div class="form-group">
							<input type="text" name="revenue" value="<?php echo $this->input->post('revenue'); ?>" class="form-control" id="revenue" />
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
					<div class="col-md-12">
						<label for="observation" class="control-label">Observation</label>
						<div class="form-group">
							<textarea name="observation" class="form-control" id="observation"><?php echo $this->input->post('observation'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Valider la déclaration
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>