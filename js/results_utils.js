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
        let priceArray = [];
        for(let i=0; i<houses.length; i++){
            priceArray[i] = houses[i].getElementsByClassName('price-amount')[0].innerText;
        }

        console.log(priceArray);

        if(priceArray[3] > priceArray[1])
            console.log(priceArray[0]);
        else console.log(priceArray[1]);
    }
}