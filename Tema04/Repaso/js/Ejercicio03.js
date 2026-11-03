const PRODUCTO_IN = document.getElementById('producto');
const PRECIO_IN = document.getElementById('precio');
const PRIORIDAD_SELECT = document.getElementById('prioridad');
const CREAR_BTN = document.getElementById('crear');
const CUERPO_TABLA = document.getElementById('cuerpo');

if(CREAR_BTN) {
    CREAR_BTN.addEventListener('click', () => {
        var producto = PRODUCTO_IN.value.trim();
        var precio = parseInt(PRECIO_IN.value);
        var prioridad = PRIORIDAD_SELECT.value.trim();
        if(producto === '' || prioridad === '') return;
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open('POST', '/php/Ejercicio03.php', true);
        xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlHttp.send(`producto=${encodeURIComponent(producto)}&precio=${encodeURIComponent(precio)}&prioridad=${encodeURIComponent(prioridad)}`);

        xmlHttp.onreadystatechange = () => {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                var xmlDoc = (new DOMParser()).parseFromString(xmlHttp.responseText, 'application/xml');
                var data = xmlDoc.getElementsByTagName('data');
                var html = '';
                Array.from(data).forEach((d) => {
                    html += `
                    <tr>
                        <td>${d.getElementsByTagName('producto')[0]?.textContent || ''}</td>
                        <td>${d.getElementsByTagName('precio')[0]?.textContent || '0'} €</td>
                        <td>${d.getElementsByTagName('prioridad')[0]?.textContent || ''}</td>
                    </tr>
                    `;
                });
                CUERPO_TABLA.innerHTML += html;
            }
        }
    });
}