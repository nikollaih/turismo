<div class="row g-0">
    <div class="col-lg-12 bg-indigo">
    <div class="p-5">
        <h3 class="fw-normal mb-5 no-top text-center">Información de la finca</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group text-center">
                    <label for=""><i class="fa-regular fa-pen-to-square"></i> Seleccionar imagen de finca</label><br>
                    <label for="logo-image" style="cursor: pointer;">
                        <img id="logo-preview" src="<?= get_company_logo($FORM_DATA["company"]["id_company"], $FORM_DATA["company"]["cus_company_logo"]) ?>" alt="Vista previa de la imagen" class="img-thumbnail custom-image-profile">
                    </label>
                    <input name="logo" type="file" class="form-control-file" id="logo-image" accept="image/*" style="display: none;">
                    <input type="hidden" value="<?= (isset($FORM_DATA["company"]["cus_company_logo"]) ? $FORM_DATA["company"]["cus_company_logo"] : "") ?>" name="company[cus_company_logo]">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
            <label for="nameActivityRoute">Nombre <b class="text-danger">*</b></label>
                <div class="form-outline form-white">
                <input required value="<?= (isset($FORM_DATA["company"]["name"]) ? $FORM_DATA["company"]["name"] : "") ?>" name="company[name]" placeholder="" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Facebook o Instagram</label>
                <input value="<?= (isset($FORM_DATA["company"]["web"]) ? $FORM_DATA["company"]["web"] : "") ?>" name="company[web]" placeholder="" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Número de whatsapp <b class="text-danger">*</b></label>
                <input minlength="10" required value="<?= (isset($FORM_DATA["company"]["whatsapp"]) ? $FORM_DATA["company"]["whatsapp"] : "") ?>" name="company[whatsapp]" placeholder="" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Municipio <b class="text-danger">*</b></label>
                <select name="company[city]" id="">
                    <option value="null">- Seleccionar municipio</option>
                    <?php
                        if(count($cities) > 0){
                            for ($i=0; $i < count($cities); $i++) { 
                    ?>
                        <option <?= (isset($FORM_DATA["company"]["city"]) == $cities[$i]["city_id"]) ? "selected" : "" ?>  value="<?= $cities[$i]["city_id"] ?>"><?= $cities[$i]["city_name"] ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Dirección <b class="text-danger">*</b></label>
                <input required value="<?= (isset($FORM_DATA["company"]["address"]) ? $FORM_DATA["company"]["address"] : "") ?>" name="company[address]" placeholder="" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Latitud (opcional)</label>
                <input value="<?= (isset($FORM_DATA["company"]["latitude"]) ? $FORM_DATA["company"]["latitude"] : "") ?>" name="company[latitude]" placeholder="" type="number" id="form3Examplea4" class="form-control form-control-lg" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Longitud (opcional)</label>
                <input value="<?= (isset($FORM_DATA["company"]["longitude"]) ? $FORM_DATA["company"]["longitude"] : "") ?>" name="company[longitude]" placeholder="" type="number" id="form3Examplea4" class="form-control form-control-lg" />
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Descripción corta (Maximo 50 caracteres)<b class="text-danger">*</b></label>
                <input maxlength="50" value="<?= (isset($FORM_DATA["company"]["short_description"]) ? $FORM_DATA["company"]["short_description"] : "") ?>" name="company[short_description]" placeholder="" type="text" id="form3Examplea4" class="form-control form-control-lg" />
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Descripción</label>
                <textarea minlength="20" name="company[description]" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="" name="textarea-message"><?= (isset($FORM_DATA["company"]["description"]) ? $FORM_DATA["company"]["description"] : "") ?></textarea>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>