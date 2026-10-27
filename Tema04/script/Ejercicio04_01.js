const SPANISH_RB = document.getElementById('spanish');
const ENGLISH_RB = document.getElementById('english');
const LANGUAGES = document.querySelectorAll('input[name="language"]');
const NAME_LABEL = document.getElementById('name-label');
const PWD_LABEL = document.getElementById('pwd-label');
const NAME_IN = document.getElementById('name');
const PWD_IN = document.getElementById('password');
const LOGIN_BTN = document.getElementById('login');
const ERROR_LABEL = document.getElementById('error');

let selectedLanguage = document.querySelector('input[name="language"]:checked').value;
setLanguage(selectedLanguage);

if(LANGUAGES) {
    LANGUAGES.forEach(l => {
        l.addEventListener('change', (event) => {
            selectedLanguage = event.target.value;
            setLanguage(selectedLanguage);
        })
    });
}

if(LOGIN_BTN) {
    LOGIN_BTN.addEventListener('click', () => {
        var user = NAME_IN.value.trim();
        if(user === '') {
            alert('The name cannot be empty');
            return;
        }
        var pwd = PWD_IN.value.trim();
        if(pwd === '') {
            alert('The password cannot be empty');
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', '/php/Ejercicio04_01.php?user=' + encodeURIComponent(user) + '&password=' + encodeURIComponent(pwd), true);
        xmlhttp.send();

        xmlhttp.onreadystatechange = () => {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var xmlDoc = (new DOMParser()).parseFromString(xmlhttp.responseText, 'application/xml');
                if(xmlDoc.getElementsByTagName('login').length > 0) window.location.href = 'Ejercicio04_02.html';
            }
        }
    });
}

function setLanguage(language) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', '/php/Ejercicio04_01.php?language=' + encodeURIComponent(language), true);
    xmlhttp.send();

    xmlhttp.onreadystatechange = () => {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var xmlDoc = (new DOMParser()).parseFromString(xmlhttp.responseText, 'application/xml');
            if(xmlDoc.getElementsByTagName('error').length > 0) {
                ERROR_LABEL.innerHTML = xmlDoc.getElementsByTagName('error')[0]?.textContent;
            } else {
                NAME_LABEL.innerHTML = xmlDoc.getElementsByTagName('name')[0]?.textContent;
                PWD_LABEL.innerHTML = xmlDoc.getElementsByTagName('pwd')[0]?.textContent;
                LOGIN_BTN.value = xmlDoc.getElementsByTagName('login')[0]?.textContent;
                ERROR_LABEL.innerHTML = '';
            }
        }
    }
}