<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nouvelle Déclaration</h3>
				<p>
					Indiquez votre Votre Numéro d'identification <b>Assujetti</b> pour vérifier 
					avant de proceder a la validation
				</p>
				<hr>
				<?php $attributes= array('method'=>'get'); 
					echo form_open('authenticate/searchContributor', $attributes); 
				?>
					<div class="row">
						<div class="col-md-8">
							<input type="text" name="code" title="Votre Numéro Contribuable"
							placeholder="Numéro contribuable: Ex: 12345"
								value="<?php echo $this->input->get('code'); ?>" class="form-control" 
								id="code" autofocus/>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i> Vérifier
							</button>
						</div>
					</div>
				<?php echo form_close(); ?>
				<p class="text-danger text-center h4">
					<?= (isset($failed) && (!empty($failed))) ? $failed: ''; ?>
				</p>
            </div>
            <?php 
			if(isset($client) && (!empty($client))):
			echo form_open('authenticate/assujettis/'.$client['client_code']); ?>
          	<div class="box-body">
				<div class="row clearfix">
					<input type="hidden" name="client_sid" value="<?php echo $client['client_id']; ?>" class="form-control" id="client_sid" />
						
					<div class="text-center">
						<h3>Coordonnées de l'assujetti</h3>
					</div>
					<div class="col-md-4">
						<label for="noms_complet" class="control-label"><span class="text-danger">*</span>Noms Complet</label>
						<div class="form-group">
							<input type="text" name="noms_complet" readonly
							value="<?php echo ($this->input->post('noms_complet') ? $this->input->post('noms_complet') : $client['noms_complet']); ?>" class="form-control" id="noms_complet" />
							<span class="text-danger"><?php echo form_error('noms_complet');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="telephone" class="control-label">Téléphone</label>
						<div class="form-group">
							<input type="text" readonly name="telephone" value="<?php echo ($this->input->post('telephone') ? $this->input->post('telephone') : $client['telephone']); ?>" class="form-control" id="telephone" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="profession" class="control-label">Profession</label>
						<div class="form-group">
							<input type="text" readonly name="profession" 
							value="<?php echo ($this->input->post('profession') ? $this->input->post('profession') : $client['profession']); ?>" 
							class="form-control" id="profession" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="adresse" class="control-label">Adresse du contribuable</label>
						<div class="form-group">
							<textarea name="adresse" readonly class="form-control" id="adresse"><?php echo ($this->input->post('adresse') ? $this->input->post('adresse') : $client['adresse']); ?></textarea>
						</div>
					</div>
				</div>
          		<div class="row clearfix">
					<div class="text-center">
						<h4 class="text-uppercase font-weight-bold">Formulaire de demande de la patente</h4>
					</div>
					<div class="col-md-4">
						<label for="numero_fiche" class="control-label">Numéro Fiche Souche</label>
						<div class="form-group">
							<input type="text" readonly name="numero_fiche" value="<?php echo time(); ?>" class="form-control" id="numero_fiche" />
							<span class="text-danger"><?php echo form_error('numero_fiche');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="date_fiche" class="control-label">Date Fiche</label>
						<div class="form-group">
							<input type="text" name="date_fiche" value="<?php echo date('Y-m-d H:i:s'); ?>" class="form-control" id="date_fiche" readonly/>
						</div>
					</div>
					<div class="col-md-4">
						<label for="annee" class="control-label">Année de l'exercice</label>
						<div class="form-group">
							<input type="text" name="annee" value="<?php echo date('Y'); ?>"
							 class="form-control" id="annee" readonly />
						</div>
					</div>

					<div class="col-md-4">
						<label for="ipr_numero" class="control-label">Numéro identification activité</label>
						<div class="form-group">
							<input type="text" name="ipr_numero" 
							value="<?php echo ($this->input->post('ipr_numero') ? $this->input->post('ipr_numero') : $client['id_activite']); ?>" 
							
							class="form-control" id="ipr_numero" readonly/>
							<span class="text-danger"><?php echo form_error('ipr_numero');?></span>
						</div>
					</div>
					<div class="col-md-8">
						<label for="raison_sociale" class="control-label">Nom de l'activité</label>
						<div class="form-group">
							<input type="text" name="raison_sociale" 
							value="<?php echo ($this->input->post('raison_sociale') ? $this->input->post('raison_sociale') : $client['nom_activite']); ?>" 
							
							class="form-control" id="raison_sociale" readonly/>
							<span class="text-danger"><?php echo form_error('raison_sociale');?></span></div>
					</div>
					<div class="col-md-6">
						<label for="periode" class="control-label">Categorie de votre activité</label>
						<div class="form-group">
							<select name="periode" class="form-control">
								<option value="">- selectionnez-</option>
								
								<?php foreach($categories as $category):?>
									<option value="<?= $category->code;?>">
									<?= $category->nom;?> ($<?= $category->prix;?>)
								</option>
								<?php endforeach;?>
							</select>
							<span class="text-danger"><?php echo form_error('periode');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mode_paiement" class="control-label">Mode de paiement</label>
						<div class="form-group">
							<select name="mode_paiement" class="form-control">
								<option value="">- selectionnez-</option>
								<option value="banque">Banque</option>
								<option value="cash">Cash</option>
							</select>
							<span class="text-danger"><?php echo form_error('mode_paiement');?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="observation" class="control-label">Notes d'observation </label>
						<div class="form-group">
							<textarea name="observation" class="form-control" id="observation">
								<?php echo $this->input->post('observation'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button onclick="pay(10);" class="btn btn-success btn-lg">
            		<i class="fa fa-check"></i> Proceder au paiement de la patente 
            	</button>
          	</div>
            <?php echo form_close(); ?>
			<?php endif; ?>
      	</div>
    </div>
</div>