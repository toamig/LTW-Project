function arraymove(arr, fromIndex, toIndex) {
    var element = arr[fromIndex];
    arr.splice(fromIndex, 1);
    arr.splice(toIndex, 0, element);
}

function sortBy(option){
    console.log(option);

    let houses = document.getElementsByClassName('house-item');

    console.log(houses);

    if(option == 'price-high-to-low'){
        for(let i=0; i<houses.length; ++i){
            let price = false;
            let request = new XMLHttpRequest();
            request.open("POST", "../actions/sort_by_action.php", true);
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    price.apply(this, this.response);
                }
            };
            request.setRequestHeader('Content-Type', 'application/json');
            request.send(JSON.stringify({'id': houses[i].id, 'param': 'price'}));

            console.log(price);
        }
    }
}