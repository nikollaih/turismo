<div class="row g-0">
    <div class="col-lg-12">
    <div class="p-5">
        <h3 class="fw-normal mb-5 no-top text-center">Información personal</h3>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-group text-center">
                    <label for=""><i class="fa-regular fa-pen-to-square"></i> Seleccionar foto de perfil</label><br>
                    <label for="profile-image" style="cursor: pointer;">
                        <img id="profile-preview" src="<?= get_profile_image($FORM_DATA["user"]["ID"]) ?>" alt="Vista previa de la imagen" class="img-thumbnail custom-image-profile">
                    </label>
                    <input name="profile" type="file" class="form-control-file" id="profile-image" accept="image/*" style="display: none;">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Número de documento</label>
                <input readonly placeholder="" name="user[document]" type="number" id="document" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["document"]) ? $FORM_DATA["user"]["document"] : "") ?>"/>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Nombres y apellidos <b class="text-danger">*</b></label>
                <input required placeholder="" name="user[fullname]" type="text" id="fullname" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["fullname"]) ? $FORM_DATA["user"]["fullname"] : "") ?>" />
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Correo electrónico <b class="text-danger">*</b></label>
                <input minlength="8" required placeholder="" name="user[email]" type="email" id="email" class="form-control form-control-lg" value="<?= (isset($FORM_DATA["user"]["email"]) ? $FORM_DATA["user"]["email"] : "") ?>" />
                <?php if(isset($RESPONSE_CREATE_USER_COMPANY["status"]) && $RESPONSE_CREATE_USER_COMPANY["status"] == false && $RESPONSE_CREATE_USER_COMPANY["field"] == "email"){
                    echo "<span class='cus_error_field'>".$RESPONSE_CREATE_USER_COMPANY["message"]."<span/>";
                }?>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 mb-4 pb-2">
                <div class="form-outline form-white">
                <label for="nameActivityRoute">Biografía <b class="text-danger">*</b> (Máximo 250 letras)</label>
                <textarea maxlength="250" name="user[biografia]" id="" cols="30" rows="5"><?= (isset($FORM_DATA["user"]["biografia"]) ? $FORM_DATA["user"]["biografia"] : "") ?></textarea>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>