function openModalImage() {
    var image = document.getElementById('bx-pager');
    iamgeSrc = image.getElementsByClassName('active')[0].href;
    // Get the modal
    var modal = document.getElementById("modal-image-preview");
    var modalImg = document.getElementById("image-on-modal");
    modal.style.display = "block";
    modalImg.src = iamgeSrc;
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-modal-image")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
}