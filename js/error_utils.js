function loginErrorMessage(){

    event.preventDefault();
    
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    console.log(email);
    console.log(password);

    let xmlHTTPrequest = new XMLHttpRequest();
    xmlHTTPrequest.onreadystatechange = function () {
        console.log(this.responseText);
    };
    xmlHTTPrequest.open("POST", "../actions/login_action.php", true);
    xmlHTTPrequest.setRequestHeader('Content-Type', 'application/json');
    xmlHTTPrequest.send(JSON.stringify({"email": email, "password": password}));
}