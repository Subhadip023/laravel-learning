import './bootstrap';


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



    // const imageUploadBtn = document.getElementById('image_uploadBtn');
    // const imageUploadInput = document.getElementById('image_upload_input');
    // const imagePreview = document.getElementById('image_preview');
    // const dropBox = document.getElementById('drop-box');



    // imageUploadBtn.addEventListener('click', () => {
    //     imageUploadInput.click();
    // });

    // imageUploadInput.addEventListener('change', () => {
    //     const file = imageUploadInput.files[0];
    //     if (file) {
    //         const reader = new FileReader();
    //         reader.onload = (e) => {

    //             imagePreview.src = e.target.result;
    //             imagePreview.classList.remove('hidden');
    //             imagePreview.classList.add('block');
    //         };

    //         reader.readAsDataURL(file);
    //     }
    // });

    // dropBox.addEventListener('dragover', (e) => {
    //     e.preventDefault(); 
    //     dropBox.classList.add('bg-gray-400'); 
    // });

    // // Remove highlight when leaving drop zone
    // dropBox.addEventListener('dragleave', () => {
    //     dropBox.classList.remove('bg-gray-400');
    // });

    // // Handle the drop event
    // dropBox.addEventListener('drop', (e) => {
    //     e.preventDefault();
    //     dropBox.classList.remove('bg-gray-400'); 

    //     const files = e.dataTransfer.files;
    //     if (files && files[0]) {
    //         imageUploadInput.files = files;
    //         imageUploadInput.dispatchEvent(new Event('change')); 
    //     }
    // });
