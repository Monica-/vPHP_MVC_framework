if (error) {
    let errorCont = document.querySelector('#error-cont');
    errorCont.querySelector('.message').innerHTML = error;
    errorCont.style.display = 'flex';
}

if (controllerType == 'RestController') {
    document.querySelector('#rest-cont').style.display = 'block';
    let button = document.querySelector('button');
    button.addEventListener('click', () => {
        let uri = document.querySelector('#uri').value.trim();
        let method = document.querySelector('#select-method').value;
        sendQuery(uri, method);
    });
} else if (controllerType == 'VerbController') {
    document.querySelector('#verb-cont').style.display = 'block';
}

function sendQuery(uri, method) {
    fetch(uri, {
        headers: {
            'Content-type': 'application/json'
        },
        method: method.toUpperCase(),
    })
        .then(response => response.json())
        .then(data => {
            document.querySelector('#answer').innerHTML = '<pre>' + JSON.stringify(data, null, 4) + '</pre>';
        })
}