const LANGUAGE_FORM = document.getElementById('language-form');
const WORD_LABEL = document.getElementById('word');
const TRANSALTION_LABEL = document.getElementById('translation');
const SHOW_BTN = document.getElementById('show');

changeLanguage('spanish');

if(LANGUAGE_FORM) {
    LANGUAGE_FORM.addEventListener('change', (event) => {
        var langauge = event.target.value;
        changeLanguage(langauge);
    });
}

function changeLanguage(language) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', '/php/Ejercicio03.php?language=' + encodeURIComponent(language), true);
    xmlhttp.send();

    xmlhttp.onreadystatechange = () => {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var xmlDoc = (new DOMParser()).parseFromString(xmlhttp.responseText, 'application/xml');
            WORD_LABEL.innerHTML = xmlDoc.getElementsByTagName('word')[0].textContent;
            TRANSALTION_LABEL.innerHTML = xmlDoc.getElementsByTagName('translation')[0].textContent;
            SHOW_BTN.value = xmlDoc.getElementsByTagName('show')[0].textContent;
        }
    }
}