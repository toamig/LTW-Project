function date(priceDay){
var checkin = document.getElementById('checkin').value;
var checkout = document.getElementById('checkout').value;
var x = new Date(checkin);
var y = new Date(checkout);
    // console.log(1 + x.getMonth());
    // console.log(x.getDate());
    // console.log(x.getFullYear());

    var inDay = x.getDate();
    var inMonth = 1 + x.getMonth();
    var inYear = x.getFullYear();

    var outDay = y.getDate();
    var outMonth = 1 + y.getMonth();
    var outYear = y.getFullYear();



    if (y>x){
		var february = (outYear % 4 == 0 && outYear % 100 != 0) || outYear % 400 == 0 ? 29 : 28;
	    var daysOfMonth = [31, february, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

	    var startDateNotPassedInEndYear = (outMonth < inMonth) || outMonth == inMonth && outDay < inDay;
	    var years = outYear - inYear - (startDateNotPassedInEndYear ? 1 : 0);

	    var months = (12 + outMonth - inMonth - (outDay < inDay ? 1 : 0)) % 12;

	    var days = inDay <= outDay ? outDay - inDay : daysOfMonth[(12 + outMonth - 1) % 12] - inDay + outDay;

	    console.log("Ok");
	    var qnt_days = years*365+months*30+days;
	    console.log(qnt_days);

	    let table = document.getElementById("table");
		let row1 = table.insertRow(table.length);
		let cel1 = row1.insertCell(0);
		let cel2 = row1.insertCell(1);
		let row2 = table.insertRow(table.length);
		let cel3 = row2.insertCell(0);
		let cel4 = row2.insertCell(1);
		// let cel3 = row.insertCell(2);
		cel1.innerHTML = "Days: ";
		cel2.innerHTML = qnt_days;
    	cel3.innerHTML = "Total price: ";
    	cel4.innerHTML = "$" + qnt_days* priceDay;
    }
    else{
    	alert("Checkout date must be after checkin date");
    }



}