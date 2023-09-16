document.addEventListener('DOMContentLoaded', function() {
    const profileImageInput = document.getElementById('file-image');
    const previewImage = document.getElementById('file-preview');

    function setupImageInput(input, preview) {
        if(input) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
    
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
    
                    reader.readAsDataURL(file);
                }
            });
        }
    }

    setupImageInput(profileImageInput, previewImage);


    jQuery(".show-password").click(function() {
        let inputField = jQuery(this).siblings(".input-password");
        if (inputField.attr("type") === "text") {
            inputField.attr("type", "password");
        } else {
            inputField.attr("type", "text");
        }

        if (jQuery(this).hasClass("fa-eye")) {
            jQuery(this).removeClass("fa-eye");
            jQuery(this).addClass("fa-eye-slash");
        } else {
            jQuery(this).removeClass("fa-eye-slash");
            jQuery(this).addClass("fa-eye");
        }
    });
});