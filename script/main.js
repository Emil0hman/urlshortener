document.querySelector('.form button').addEventListener('click', _ => {
    let longURL = document.querySelector('.form input[type=text]').value; // Get long url provided

    // Make an AJAX request and add file into database
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", `http://192.168.1.17:8888/newURL.php?url=${longURL}`, true);
    xhttp.send();
    xhttp.onreadystatechange = _ => {
        if (xhttp.readyState == 4) {
            // Display URL
            let res = xhttp.responseText;
            document.querySelector('.form .newurl').innerHTML = `http://emilohman.nu/projects/url/l?l=${res}`; // I know, not very short, but this is just a proof of concept
        }
    };
});

