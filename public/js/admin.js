$(document).ready(function(){

    $('select').select2();
        // $(this).eq(key).select2({
        //     tags: '',
        //     multiple: '',
        //     placeholder: $('select').eq(key).attr('placeholder'),
        //     allowClear: '1',
        //     width: '100%',
        //     minimumInputLength: '1',
        //     minimumResultsForSearch: '10',
        // });
    // $('.data-table-container').DataTable();
    // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    //     var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    //     return new bootstrap.Tooltip(tooltipTriggerEl)
    // })
})

// Image upload and preview

window.onload = function() {
    if (window.File && window.FileList && window.FileReader) {
        $('.img-preview-upload').on("change", function(event,key) {
            var files = event.target.files;
            indexData  = $(this).attr('data-index');
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image'))
                continue;
                var picReader = new FileReader();
                picReader.addEventListener("load", function(event) {
                    const indexList = i - 1;
                    var div = document.createElement("div");
                    div.classList="me-2 mb-2 position-relative view-added-image";
                    div.innerHTML += "<img class='object-fit-cover ' width='70px' height='70px'  src=\"" + event.target.result + "\"   />";
                    div.innerHTML += "<span data-index="+indexList+" class='remove-btn-img position-absolute rounded-circle' type='button'><i class='bi bi-x-circle-fill'></i></span>";
                    $('.output-img').eq(indexData).append(div).removeClass('d-none');
                });
                picReader.readAsDataURL(file);
            }
        });
    } else {
      console.log("Your browser does not support File API");
    }
}

$(document).on('click','.remove-btn-img',function(){
    var childLen = $(this).parent().parent().find(".view-added-image").length - 1;
    if($(childLen).length<=0){
        $(this).parent().parent().addClass('d-none');
    }
    $(this).parent(".view-added-image").remove();
    $(".featured_image").attr("src", "");
});