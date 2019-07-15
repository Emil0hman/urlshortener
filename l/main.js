let param = new URL(window.location.href).searchParams.get('l'); // Get the l parameter in the URL

// Make a AJAX req. and then open the window with the url that the backend provided
var xhttp = new XMLHttpRequest();
xhttp.open("GET", `http://192.168.1.17:8888/getURL.php?shortURL=${param}`, true);
xhttp.send();
xhttp.onreadystatechange = _ => {
    if (xhttp.readyState == 4) {
        let res = xhttp.responseText;
        window.open(res, '_self'); // Redirect
    }
};