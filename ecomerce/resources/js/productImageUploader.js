document.addEventListener("DOMContentLoaded", () => {
    window.previewImage22 = function (input, previewId, deleteBtnId, uploadBtnId) {
        // Get the file from the input
        if (input.files && input.files[0]) {
            const file = input.files[0];
    
            // Check file size (2MB limit)
            if (file.size > 2 * 1024 * 1024) {
                alert('File size should not exceed 2MB.');
                input.value = ''; // Clear the input
                return;
            }
    
            // Get the preview element and update its background
            const previewElement = document.getElementById(previewId);
            const reader = new FileReader();
    
            reader.onload = (e) => {
                previewElement.style.backgroundImage = `url(${e.target.result})`;
                previewElement.style.backgroundSize = "cover";
                previewElement.style.backgroundPosition = "center";
            };
    
            reader.readAsDataURL(file);
        }
    
        // Show or hide buttons
        document.getElementById(deleteBtnId).style.display = 'block';
        document.getElementById(uploadBtnId).style.display = 'none';
    };
    


//  privew image for eidted product image page 
window.previewImageEdited = function (input, imgId, changeBtnId) {
    const imgElement = document.getElementById(imgId);
    const changeButton = document.getElementById(changeBtnId);

    if (!imgElement || !changeButton) {
        console.error('Invalid IDs provided.');
        return;
    }

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imgElement.src = e.target.result; // Set preview image
        };
        reader.readAsDataURL(input.files[0]);

        changeButton.style.display = 'block'; // Show the change button
    } else {
        imgElement.src = ''; // Reset image preview
        changeButton.style.display = 'none'; // Hide the button
    }
};




    window.deleteImagePreview = function (divId, inputId) {

        if (divId=='imagePreview1'){
return
        } 



        document.getElementById(inputId).value = "";
        document.getElementById(divId).remove();
    };

    // Get references to the form and add button
    const addImageBtn = document.getElementById("addImageBtn");
    const imageInputsContainer = document.querySelector(".image-inputs");
    let inputCount = 1;

    addImageBtn.addEventListener("click", () => {
        inputCount++;
        const newInput = document.createElement("div");
        newInput.classList.add("image-input-box");
        newInput.innerHTML = `
         
                    <div class="bg-gray-300 w-72 h-72 rounded-lg   flex items-center justify-center"   id="imagePreview${inputCount}" >
                        
                        <input type="file" name="images[]" id="image${inputCount}" accept="image/*" required hidden onchange="{previewImage22(this,'imagePreview${inputCount}','deleteBtn${inputCount}','uploadBtn${inputCount}')}">
                         <button type="button" class= "flex gap-x-3 items-center rounded-lg text-white bg-green-600 p-2 px-5" id="uploadBtn${inputCount}" onclick="document.getElementById('image${inputCount}').click()"><svg class="text-white scale-150" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                              </svg>Upload </button>



                              
                        <button id="deleteBtn${inputCount}" type="button" onclick="deleteImagePreview('imagePreview${inputCount}','image${inputCount}')" class="bg-red-500 text-white px-4 py-2 rounded mt-2"  style="display: none" >
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash scale-150" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                              </svg>
                        </button>
                                          
                    
                    </div>
     `;
        imageInputsContainer.appendChild(newInput);
    });

    //  const imageuploadeBtn = document.getElementById('imageuploadeBtn');

    //  document.addEventListener('click',()=>{
    //     document.getElementById('image1').click();
    //  })
});


const productName=document.getElementById('productName');
productName.addEventListener('input',function(){
    const name = this.value.replace(/\s+/g, '-').toLowerCase(); // Convert name to slug
    const uuid = crypto.randomUUID().split('-')[0]; // Generate a short UUID
    document.getElementById('product_sku').value = `${name}-${uuid}`;
})


// const slides = document.getElementById('slides');
// const prev = document.getElementById('prev');
// const next = document.getElementById('next');

// let index = 0;

// prev.addEventListener('click', () => {
//     index = (index > 0) ? index - 1 : slides.children.length - 1;
//     slides.style.transform = `translateX(-${index * 100}%)`;
// });

// next.addEventListener('click', () => {
//     index = (index < slides.children.length - 1) ? index + 1 : 0;
//     slides.style.transform = `translateX(-${index * 100}%)`;
// });


