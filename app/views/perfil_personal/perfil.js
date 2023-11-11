    // Get the modals
    var imageModal = document.getElementById("changeImageModal");
    var passwordModal = document.getElementById("changePasswordModal");

    // Get the button that opens each modal
    var imageBtn = document.getElementById("changeImageButton");
    var passwordBtn = document.getElementById("changePasswordButton");

    // Get the <span> element that closes the modals
    var closeBtn = document.getElementsByClassName("close");

    // When the user clicks on the buttons, open the corresponding modal
    imageBtn.onclick = function() {
        imageModal.style.display = "block";
    }

    passwordBtn.onclick = function() {
        passwordModal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modals
    for (var i = 0; i < closeBtn.length; i++) {
        closeBtn[i].onclick = function() {
            imageModal.style.display = "none";
            passwordModal.style.display = "none";
        }
    }

    // When the user clicks anywhere outside of the modals, close them
    window.onclick = function(event) {
        if (event.target == imageModal) {
            imageModal.style.display = "none";
        } else if (event.target == passwordModal) {
            passwordModal.style.display = "none";
        }
    }