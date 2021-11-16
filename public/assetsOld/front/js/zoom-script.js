(function() {
    'use-script';

    var iconOneElement = document.getElementById('iconOne');
    var iconTwoElement = document.getElementById('iconTwo');
    var iconThreeElement = document.getElementById('iconThree');
    var iconFourElement = document.getElementById('iconFour');
    var iconFiveElement = document.getElementById('iconFive');
    var iconSixElement = document.getElementById('iconSix');
    var iconSevenElement = document.getElementById('iconSeven');
    var iconEightElement = document.getElementById('iconEight');

    var imageDivElement = document.getElementById('imageDiv');


    iconOneElement.onclick = function () {
        var imageUrl = iconOneElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

    iconTwoElement.onclick = function () {
        var imageUrl = iconTwoElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

    iconThreeElement.onclick = function () {
        var imageUrl = iconThreeElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

    iconFourElement.onclick = function () {
        var imageUrl = iconFourElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

    iconFiveElement.onclick = function () {
        var imageUrl = iconFiveElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

    iconSixElement.onclick = function () {
        var imageUrl = iconSixElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

    iconSevenElement.onclick = function () {
        var imageUrl = iconSevenElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

    iconEightElement.onclick = function () {
        var imageUrl = iconEightElement.getAttribute('src');
        var mainImageMenu = document.getElementById('imageDiv');
        mainImageMenu.setAttribute('src', imageUrl);
    }

})();