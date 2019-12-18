function sendMessage(){
    event.preventDefault();

    let id = document.querySelector('#owner-id').value;
    let msg = document.querySelector('#msg').value;

    console.log(msg);

    let request = new XMLHttpRequest();
    request.open("POST", "../actions/send_message_action.php", true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.send(JSON.stringify({'id': id, 'msg': msg}));
}