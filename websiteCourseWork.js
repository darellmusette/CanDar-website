
function validation(){
	checkInputs();
	checkNumber();
}

	

function checkInputs() {

	let fName = document.getElementById("fullname").value.trim();
	let lengthFName = fName.length;
	var format = /^[A-Za-z]+$/;
	let formatOfName = format.test(fName);
	

	//check name and its format
	if(lengthFName != 0) {
		document.getElementById("errorInFullName").innerHTML='';

		if(formatOfName == true){
			document.getElementById("errorInFullName").innerHTML=' ';
		}else{
			document.getElementById("errorInFullName").innerHTML='Alphabets only !';
		}
	} else {
		document.getElementById("errorInFullName").innerHTML='This field cannot be blank !';
	}


	//check address
	let location = document.getElementById("address").value.trim();
	let lengthOfLoc = location.length;

	if(lengthOfLoc == 0){
		document.getElementById("errorInAddress").innerHTML = "This field cannot be blank !";
	}else{
		document.getElementById("errorInAddress").innerHTML = " ";
	}

	//check email

	let email= document.getElementById("email").value.trim();
	let lengthOfEmail= email.length;

	if(lengthOfEmail==0){
		document.getElementById("errorInEmail").innerHTML="This field cannot be blank !";
	}else{
		document.getElementById("errorInEmail").innerHTML="";
	}
}

function checkNumber(){
	let PhoneNumber= document.getElementById("phonenumber").value.trim();
	var format=/^[0-9]+$/;
	let FormatOfNumber=format.test(PhoneNumber);

	if(FormatOfNumber==true){
		document.getElementById("errorInNumber").innerHTML="";
	}else{
		document.getElementById("errorInNumber").innerHTML="Number only!";
	}
}


