const SEARCH_BTN = document.getElementById('search');
const FILTER_SELECT = document.getElementById('filter');
const TEXT_SEARCH_IN = document.getElementById('text-search');
const TABLE_BODY = document.getElementById('table-body');

if(SEARCH_BTN) {
    SEARCH_BTN.addEventListener('click', () => {
        var filter = FILTER_SELECT.value.trim();
        var textToSearch = TEXT_SEARCH_IN.value.trim();
        if(textToSearch === ''){
            alert('Debes introducir un valor para buscar');
            return;
        }
        if(filter === 'number' && !textToSearch.match(/[0-9]/)) {
            alert('Para buscar por número de teléfono solo puedes usar número');
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', '/php/Ejercicio05.php?filter=' + encodeURIComponent(filter) + '&text=' + encodeURIComponent(textToSearch), true);
        xmlhttp.send();

        xmlhttp.onreadystatechange = () => {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var xmlDoc = (new DOMParser()).parseFromString(xmlhttp.responseText, 'application/xml');
                var data = xmlDoc.getElementsByTagName('person');
                let rowsHtml = '';
                Array.from(data).forEach((p) => {
                    rowsHtml += `
                        <tr>
                            <td>${p.getElementsByTagName('name')[0]?.textContent || ''}</td>
                            <td>${p.getElementsByTagName('surname')[0]?.textContent || ''}</td>
                            <td>${p.getElementsByTagName('number')[0]?.textContent || ''}</td>
                        </tr>
                    `;
                });
                TABLE_BODY.innerHTML = rowsHtml;
            }
        }
    });
}