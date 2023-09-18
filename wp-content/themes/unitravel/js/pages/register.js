document.addEventListener('DOMContentLoaded', function() {
    const profileImageInput1 = document.getElementById('profile-image');
    const previewImage1 = document.getElementById('profile-preview');

    const profileImageInput2 = document.getElementById('logo-image');
    const previewImage2 = document.getElementById('logo-preview');

    function setupImageInput(input, preview) {
        if(input)
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

    setupImageInput(profileImageInput1, previewImage1);
    setupImageInput(profileImageInput2, previewImage2);
});