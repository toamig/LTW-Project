function loadFirstTab(){
    let elems = document.getElementsByClassName('account-dash-board');

    for(let i = 0; i < elems.length; ++i){
        if(elems[i].id == 'profile')
            elems[i].style.display = 'grid';

        else elems[i].style.display = 'none';
    }
}

function changeTab(btnName){
    let elems = document.getElementsByClassName('account-dash-board');
    console.log(elems);

    for(let i = 0; i < elems.length; ++i){
        if(elems[i].id == btnName)
            elems[i].style.display = 'grid';

        else elems[i].style.display = 'none';
    }

    if(btnName == "profile"){
        document.querySelector('#edit-btn').style.display = 'flex';
        document.querySelector('#personal-info-set').style.display = 'grid';

        document.querySelector('#make-changes-btn').style.display = 'none';
        document.querySelector('#cancel-changes-btn').style.display = 'none';
        document.querySelector('#personal-info-change').style.display = 'none';

        document.querySelector('#password-set').style.display = 'grid';
        document.querySelector('#password-change').style.display = 'none';
    }
}

function changePersonalInfo(){
    let editBtn = document.querySelector('#edit-btn');
    editBtn.style.display = 'none';

    let changeBtn = document.querySelector('#make-changes-btn');
    changeBtn.style.display = 'flex';

    let cancelChangeBtn = document.querySelector('#cancel-changes-btn');
    cancelChangeBtn.style.display = 'flex';;

    let wrapperSet = document.querySelector('#personal-info-set');
    wrapperSet.style.display = 'none';

    let wrapperChange = document.querySelector('#personal-info-change');
    wrapperChange.style.display = 'grid';
}

function cancelChangePersonalInfo(){
    event.preventDefault();

    document.querySelector('#edit-btn').style.display = 'flex';
    document.querySelector('#personal-info-set').style.display = 'grid';

    document.querySelector('#make-changes-btn').style.display = 'none';
    document.querySelector('#cancel-changes-btn').style.display = 'none';
    document.querySelector('#personal-info-change').style.display = 'none';
}

function changePassword(){
    let passSet = document.querySelector('#password-set');

    passSet.style.display = 'none';

    let elem = document.querySelector('#password-change');
        
    elem.style.display = 'grid';
}

function cancelChangePassword(){
    document.querySelector('#password-set').style.display = 'grid';
    document.querySelector('#password-change').style.display = 'none';
}

function loadConversation(){
    let elem = document.getElementsByClassName('conversation');

    for(let i = 0; i < elem.length; ++i)
        elem[i].style.display = 'none';
    // first found user
    if(elem.length != 1) elem[1].style.display = 'grid';

    else elem[0].style.display = 'grid';
}

function contactWrapper(username){
    let listElements = document.getElementsByClassName("conversation");

    for(let i = 0; i < listElements.length; ++i){
        if(listElements[i].id != username[0].id){
            listElements[i].style.display = "none";
        }
        else listElements[i].style.display = "grid";
    }
}

function createNewMessage(){
    let elem = document.getElementsByClassName('conversation');

    for(let i = 0; i < elem.length; ++i)
        elem[i].style.display = 'none';

    let newMessage = document.getElementById('newMessage');

    newMessage.style.display = 'grid';
}

function sendMessage(){

    event.preventDefault();

    let msg = document.querySelector('#message-input');

    let divArray = document.getElementsByClassName("conversation");

    let id;
    let ul;

    for(let conversation of divArray){
        if(conversation.style.display != 'none'){
            id = conversation.id;
            if(id == 'newMessage'){
                let addressee = document.querySelector('.chat-user');
                if(addressee.value == ""){
                    alert('Missing addressee username!');
                    return;
                }
                ul = document.querySelector('#'+addressee.value+' ul');
            }
            else ul = document.querySelector('#'+id+' ul');
        }   
    }

    let li = document.createElement("li");
    li.setAttribute("class", "reply"); // added line

    let p = document. createElement("p");
    p.setAttribute('class', 'message-p');
    p.innerHTML = msg.value;

    li.appendChild(p);
    ul.appendChild(li);

    let request = new XMLHttpRequest();
    request.open("POST", "../actions/send_message_action.php", true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.send(JSON.stringify({'id': id, 'msg': msg.value}));

    msg.value = "";
}

function refresh(){
    console.log('olaa');
}