var Input = []; 
var items; 

function checkName() 
{
    event.preventDefault();
    var allFieldsFilled = false;
    var section1 = document.querySelector('.section1');
    var section2 = document.querySelector('.section2');

    Input[0] = document.getElementById("fname").value;
    Input[1] = document.getElementById("lname").value;
    Input[2] = document.getElementById("dob").value;

    if(Input[0] != "" && Input[1] != "" && Input[2] != "")
        allFieldsFilled = true;


    if (allFieldsFilled) 
    {
        changesection(section1,section2);
    } 
    else 
        AlertF();
    
}


function checkEmail()
{
    event.preventDefault();
    var section2 = document.querySelector('.section2');
    var section3 = document.querySelector('.section3');
    var allFieldsFilled2 = false;

    Input[3] = document.getElementById("username").value;
    Input[4] = document.getElementById("Phone").value;

    if(Input[3] != "" && Input[4] != "")
        allFieldsFilled2 = true;

    if (allFieldsFilled2) 
        changesection(section2, section3);
    else 
        AlertF();
}

function CheckPassword(){
    event.preventDefault();

    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("passwordC").value;

    

    if (password !== "" && confirmPassword === password) {
        
        if(password.length>=8){
            document.getElementById('signupForm').submit();
        }
        else{
            alert("The passwords must have 8 or more characters");
        }
    } else {
        
        alert("The passwords do not match");
    }
}



/*function goTo(sectionfrom, sectionto) 

{
    var currentSection = document.getElementById(sectionfrom);
    var nextSection = document.getElementById(sectionto);
    
    alert(currentSection.outerHTML);
}

*/
function changesection(sectionFrom,sectionTo){
    
    sectionFrom.style.display='none';
    sectionTo.style.display='block';
    
}
function BackSec1(){
    event.preventDefault();
    var section1 = document.querySelector('.section1');
    var section2 = document.querySelector('.section2');
    changesection(section2,section1);
}
function BackSec2(){
    event.preventDefault();
    var section2 = document.querySelector('.section2');
    var section3 = document.querySelector('.section3');
    changesection(section3,section2);
}
function AlertF()
{
    alert("Please fill in all the boxes");
}