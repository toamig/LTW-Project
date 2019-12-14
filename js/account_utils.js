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

    for(let i = 0; i < elems.length; ++i){
        if(elems[i].id == btnName)
            elems[i].style.display = 'grid';

        else elems[i].style.display = 'none';
    }
}

function changePersonalInfo(){
    let editBtn = document.querySelector('#edit-btn');
    editBtn.style.display = 'none';

    let changeBtn = document.querySelector('#make-changes-btn');
    changeBtn.style.display = 'flex';

    let wrapperSet = document.querySelector('#personal-info-set');
    wrapperSet.style.display = 'none';

    let wrapperChange = document.querySelector('#personal-info-change');
    wrapperChange.style.display = 'grid';
}

function changePassword(){
    let passSet = document.querySelector('#password-set');

    passSet.style.display = 'none';

    let elem = document.querySelector('#password-change');
        
    elem.style.display = 'grid';
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

function loadConversation(){
    let elem = document.getElementsByClassName('conversation');

    for(let i = 0; i < elem.length; ++i)
        elem[i].style.display = 'none';

    
    // first found user
    if(elem.length != 0) elem[1].style.display = 'grid';

    else elem[0].style.display = 'grid';
}

function createNewMessage(){
    let elem = document.getElementsByClassName('conversation');

    for(let i = 0; i < elem.length; ++i)
        elem[i].style.display = 'none';

    let newMessage = document.getElementById('newMessage');

    newMessage.style.display = 'grid';
}