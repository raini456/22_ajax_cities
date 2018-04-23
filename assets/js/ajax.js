function ajax(method, url, params, callback) {
    var xhr, propName, paramString = '';
    for (propName in params) {//gibt die Keys des Objekt zurück
        paramString += propName + "=" + params[propName] + "&";
    }
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {//Eventhandler wartet ob sich der Readystate ändert
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        }
    };
    if (method === 'get') {
        xhr.open(method, url + '?' + paramString, true); //Parameter sind: Art der Fetch-Methode/Dateiquelle/asynchron oder synchron                  
        xhr.send(null); //sendet die Dateien
    } else if (method === 'post') {
        xhr.open(method, url, true); //Parameter sind: Art der Fetch-Methode/Dateiquelle/asynchron oder synchron                  
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.send(paramString); //sendet die Dateien
    }
    else{
        return false;
    }
}



