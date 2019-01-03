    new Clipboard('a');


    new WOW().init();

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });


    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });


    function btnRejoinusIn() {
        document.getElementById("btn-rejoinus").classList.add('theme-color-text');
    }

    function btnRejoinusOut() {
        document.getElementById("btn-rejoinus").classList.remove('theme-color-text');
    }

    function iconSocialIn() {
        document.getElementById("icon-social").classList.add('socialiconhover');
    }

    function iconSocialOut() {
        document.getElementById("icon-social").classList.remove('socialiconhover');
    }

    var dropdownClass = document.querySelectorAll('.dropdown');
    var dropdownMenuClass = document.querySelectorAll('.dropdown-menu');

    if (eyweklapute == 1) {
        document.querySelector(".header-desktop").classList.add('theme-color-background');
        for (var i = 0; i < dropdownMenuClass.length; i++) {
            dropdownMenuClass[i].classList.add('theme-color-background');

        }
    }

    /* Hide UserBar when DropDown is active */

    var indexDropdown = 0;


    for (var i = 0; i < dropdownClass.length; i++) {
        dropdownClass[i].addEventListener('click', function () {
            if (indexDropdown == 0) {
                document.querySelector('.user-bar').classList.add('user-bar-none');
                indexDropdown = 1;
                return;
            }
            if (indexDropdown == 1) {
                document.querySelector('.user-bar').classList.remove('user-bar-none');
                indexDropdown = 0;
                return;
            }
        });
    }


    window.addEventListener('click', function (e) {
        for (var i = 0; i < dropdownClass.length; i++) {
            if (indexDropdown == 1) {
                if (dropdownClass[i].contains(e.target)) {
                    document.querySelector('.user-bar').classList.remove('user-bar-none');
                    indexDropdown = 0;
                } else {
                    document.querySelector('.user-bar').classList.remove('user-bar-none');
                    indexDropdown = 0;
                }
            }
        }
    });

/* Hide Pre-footer when Header only is active */

if(headerOnly == true){
    document.querySelector('.pre-footer-margin').style.display = "none";
    document.querySelector('.pre-footer').style.display = "none";
}
