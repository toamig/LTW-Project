function arraymove(arr, fromIndex, toIndex) {
    let element = arr[fromIndex];
    arr.splice(fromIndex, 1);
    arr.splice(toIndex, 0, element);
}

function sortBy(option){

    let houses =   Array.prototype.slice.call(document.getElementsByClassName('house-item'));

    let request = new XMLHttpRequest();
    request.open("POST", "../actions/sort_by_action.php", true);
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            let sortedHouses = JSON.parse(this.response);

            for(let i=0; i < sortedHouses.length; ++i){
                for(let j=0; j < houses.length; ++j){

                    if(houses[j].id == sortedHouses[i]['id']){
                        arraymove(houses, j, houses.length-1);
                        break;
                    }
                }
            }

            // reatach the sorted elements
            for(let k = 0; k < houses.length; k++) {
                let parent = houses[k].parentNode;
                let detatchedItem = parent.removeChild(houses[k]);
                parent.appendChild(detatchedItem);
            }
        }
    };
    request.setRequestHeader('Content-Type', 'application/json');
    request.send(JSON.stringify({'sort': option}));
}