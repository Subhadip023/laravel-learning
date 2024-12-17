$(document).ready(function () {
    const submitForm = $('#submitForm');
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    const progressBar = $('#progressBar');

    $('#uploadButton').on('click', function () {
        const fileInput = $('<input>', {
            type: 'file',
            name: 'file',
            accept: 'image/*',
            style: 'display:none',
        });

        submitForm.append(fileInput);
        fileInput.click();

        // Handle file selection
        fileInput.on('change', function () {
            const file = this.files[0];
            if (!file) {
                alert('No file selected!');
                return;
            }

            // Show image preview
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-container').html('<img src="' + e.target.result + '" class="image-preview" />');
            };
            reader.readAsDataURL(file);

            uploadFile(file);
        });
    });

    // **File Upload Function**
    const uploadFile = (file) => {
        const formData = new FormData();
        formData.append('file', file);
        formData.append('_token', csrfToken);

        // Perform the AJAX request to upload the file
        $.ajax({
            url: submitForm.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function () {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        const percent = (e.loaded / e.total) * 100;
                        progressBar.css('width', percent + '%').attr('aria-valuenow', percent);
                    }
                });
                return xhr;
            },
            success: function (response) {
                if (response.file_path) {
                    alert('Upload complete! File saved at ' + response.file_path);
                } else {
                    alert('Upload successful, but no file path returned.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('Failed to upload the file. Please try again.');
            },
        });
    };
});
