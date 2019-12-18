/*
* When the pages loads, display the first div created (profile).
*/
function loadFirstTab(){
    let elems = document.getElementsByClassName('account-dash-board');

    for(let i = 0; i < elems.length; ++i){
        if(elems[i].id == 'profile')
            elems[i].style.display = 'grid';

        else elems[i].style.display = 'none';
    }
}

/*
* Manages the display of the tabs according to the chosen option.
*/
function changeTab(btnName){
    let elems = document.getElementsByClassName('account-dash-board');

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

/*
* Displays the change personal information field.
*/
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

/*
* Hides the change personal information field.
*/
function cancelChangePersonalInfo(){
    event.preventDefault();

    document.querySelector('#edit-btn').style.display = 'flex';
    document.querySelector('#personal-info-set').style.display = 'grid';

    document.querySelector('#make-changes-btn').style.display = 'none';
    document.querySelector('#cancel-changes-btn').style.display = 'none';
    document.querySelector('#personal-info-change').style.display = 'none';
}

/*
* Displays the change password field.
*/
function changePassword(){
    let passSet = document.querySelector('#password-set');

    passSet.style.display = 'none';

    let elem = document.querySelector('#password-change');
        
    elem.style.display = 'grid';
}

/*
* Hides the change password field.
*/
function cancelChangePassword(){
    document.querySelector('#password-set').style.display = 'grid';
    document.querySelector('#password-change').style.display = 'none';
}

/*
* When the pages loads, displays the first conversation found.
*/
function loadConversation(){
    let elem = document.getElementsByClassName('conversation');

    for(let i = 0; i < elem.length; ++i)
        elem[i].style.display = 'none';
    // first found user
    if(elem.length != 1) elem[1].style.display = 'grid';

    else elem[0].style.display = 'grid';
}

/*
* Manages the display of the chat boxes according to the chosen contact.
*/
function contactWrapper(username){
    let listElements = document.getElementsByClassName("conversation");

    for(let i = 0; i < listElements.length; ++i){
        if(listElements[i].id != username[0].id){
            listElements[i].style.display = "none";
        }
        else listElements[i].style.display = "grid";
    }
}

/*
* Displays the new message element. 
*/
function createNewMessage(){
    let elem = document.getElementsByClassName('conversation');

    for(let i = 0; i < elem.length; ++i)
        elem[i].style.display = 'none';

    let newMessage = document.getElementById('newMessage');

    newMessage.style.display = 'grid';
}

/*
* Sends a message to the chat box owner and display that message.
*/
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
                else{
                    console.log(addressee.value);
                    let verifyAddresse = new XMLHttpRequest();
                    verifyAddresse.open("POST", "../actions/verify_addressee_action.php", true);
                    verifyAddresse.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            let verify = JSON.parse(this.response);
                            if(!verify){
                                alert('Addressee doesn\'t exist!');
                                return;
                            }
                        }
                    };
                    verifyAddresse.setRequestHeader('Content-Type', 'application/json');
                    verifyAddresse.send(JSON.stringify({'id': addressee.value}));
                }
                ul = document.querySelector('#'+id+' ul');
                id = addressee.value;
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

/*
* Deletes all the messages exchanged with the chosen user
* @param deleteBtn 
*/
function deleteConversation(deleteBtn){
    let username = deleteBtn.parentNode.parentNode.id;

    console.log(username);

    let contact = document.querySelectorAll('#'+username);

    for(let i = 0; i < contact.length; ++i){
        contact[i].remove();
    }

    let list = document.querySelectorAll('.conversation');

    if(list.length == 1) list[0].style.display = 'grid';
    else{
        for(let i = 1; i < list.length; ++i){
            if(list[i].id != username){
                list[i].style.display = 'grid';
                break;
            }
        }
    }

    let request = new XMLHttpRequest();
    request.open("POST", "../actions/delete_conversation_action.php", true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.send(JSON.stringify({'username': username}));
}