const dropZone = document.getElementById('dropZone');
const imageInput = document.getElementById('imageInput');
const previewImage = document.getElementById('previewImage');

// Click to trigger file input
dropZone.addEventListener('click', () => imageInput.click());

// Drag events
dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('dragover');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('dragover');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('dragover');

    const files = e.dataTransfer.files;
    if (files.length > 0) {
        imageInput.files = files;
        previewImageFile(files[0]);
    }
});

imageInput.addEventListener('change', () => {
    if (imageInput.files.length > 0) {
        previewImageFile(imageInput.files[0]);
    }
});

function previewImageFile(file) {
    const reader = new FileReader();
    reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewImage.classList.remove('d-none');
    };
    reader.readAsDataURL(file);
}












const availability = document.getElementById('availability');
const availabilityHidden = document.getElementById('availability_hidden');

availability.addEventListener('change', () => {
    availabilityHidden.value = availability.checked ? "1" : "0";
});











$(document).ready(function(){
    var loader = $('#loader'); 
    var category = $('#category');

    loader.hide();

    category.change(function(){
        var categoryId = $(this).val();
        console.log("Selected Category ID:", categoryId);

        if(!categoryId) {
            $("#subCategory").html("<option disabled selected>-- Select Sub-Category --</option>");
        } else {
            loader.show();

            $.ajax({
                url: "/get-SubCategory/" + categoryId,
                type: "GET",
                success: function(data){
                    var subCategory = data.subCategory;
                    var html = "<option disabled selected>-- Select Sub Category --</option>";

                    for(let i = 0; i < subCategory.length; i++){
                        html += `<option value="${subCategory[i].id}">${subCategory[i].name}</option>`;
                    }

                    $("#subCategory").html(html);
                    loader.hide();
                },
                error: function(){
                    alert('Failed to fetch subcategories.');
                    loader.hide();
                }
            });
        }
    });
});