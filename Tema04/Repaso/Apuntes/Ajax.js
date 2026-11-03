var xmlHttp = new XMLHttpRequest();
xmlHttp.open('POST', '/php/Ajax.php', true); //Ruta a la que se hace, esto mediante POST
xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); //Especifica que enviamos info y como
xmlHttp.send(`producto=${encodeURIComponent(producto)}&precio=${encodeURIComponent(precio)}&prioridad=${encodeURIComponent(prioridad)}`); //Lo que enviamos al servidor

xmlHttp.onreadystatechange = () => {
    if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        var xmlDoc = (new DOMParser()).parseFromString(xmlHttp.responseText, 'application/xml');
        var data = xmlDoc.getElementsByTagName('data');
        var html = '';
        Array.from(data).forEach((d) => { //Iteramos sobre las etiquetas data si solo hay una pues es una interación
            html += `
            <tr>
                <td>${d.getElementsByTagName('producto')[0]?.textContent || ''}</td>
                <td>${d.getElementsByTagName('precio')[0]?.textContent || '0'} €</td>
                <td>${d.getElementsByTagName('prioridad')[0]?.textContent || ''}</td>
            </tr>
            `; //Accedemos a cada etiqueta dentro, como es un array, pues a 0, pero si tenemos varias etiquetas con el mismo nombre, pues el índice que necesitemos, pero en principio 0 siempre
        });
        CUERPO_TABLA.innerHTML += html;
    }
}

//MEDIANTE GET Y DEVOLVIENDO DIRECTAMENTE HTML
var xmlHttp = new XMLHttpRequest();
xmlHttp.open('GET', '/php/Ejercicio03.php?llave1=valor1&llave2=valor2', true);
xmlHttp.send();
xmlHttp.onreadystatechange = () => {
    if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        var html = xmlHttp.responseText; //Si devolvemos HTML directamente
    }
}