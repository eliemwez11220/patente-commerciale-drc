<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Paiement Add</h3>
            </div>
            <?php echo form_open('paiement/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="statut_paiement" class="control-label">Statut Paiement</label>
						<div class="form-group">
							<select name="statut_paiement" class="form-control">
								<option value="">select</option>
								<?php 
								$statut_paiement_values = array(
									'valide'=>'Valide',
									'encours'=>'Encours',
								);

								foreach($statut_paiement_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('statut_paiement')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="numero_note_sid" class="control-label">Note</label>
						<div class="form-group">
							<select name="numero_note_sid" class="form-control">
								<option value="">select note</option>
								<?php 
								foreach($all_notes as $note)
								{
									$selected = ($note['note_id'] == $this->input->post('numero_note_sid')) ? ' selected="selected"' : "";

									echo '<option value="'.$note['note_id'].'" '.$selected.'>'.$note['numero_reference_note'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="client_sid" class="control-label">Client</label>
						<div class="form-group">
							<select name="client_sid" class="form-control">
								<option value="">select client</option>
								<?php 
								foreach($all_clients as $client)
								{
									$selected = ($client['client_id'] == $this->input->post('client_sid')) ? ' selected="selected"' : "";

									echo '<option value="'.$client['client_id'].'" '.$selected.'>'.$client['noms_complet'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_paiement" class="control-label">Date Paiement</label>
						<div class="form-group">
							<input type="date" name="date_paiement" value="<?php echo $this->input->post('date_paiement'); ?>" max="<?= date('Y-m-d'); ?>" class="form-control" id="date_paiement" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="montant_verser" class="control-label">Montant Verser</label>
						<div class="form-group">
							<input type="text" name="montant_verser" value="<?php echo $this->input->post('montant_verser'); ?>" class="form-control" id="montant_verser" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="observation" class="control-label">Observation sur paiement</label>
						<div class="form-group">
							<textarea name="observation" class="form-control" id="observation"><?php echo $this->input->post('observation'); ?></textarea>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Enregistrer paiement
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>