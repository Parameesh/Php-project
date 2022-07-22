function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }


}
function seterror(id, error){

    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var returnval = true;
    clearErrors();

   
    var name = document.forms['myForm']["fname"].value;
    if (name.length<3){
        alert("Length of name is too short");
        returnval = false;
    }
    var name = document.forms['myForm']["fname"].value;
    if (name.search(/^[A-Za-z]+$/)){
        alert("Username only contain alphabets");
        returnval = false;
    }

   
    var email = document.forms['myForm']["femail"].value;
    if (email.length<8){
        alert("Email length is too short");
        returnval = false;
    }

   

    var password = document.forms['myForm']["fpass"].value;
    if (password.length < 8){

       
        alert("Password should be atleast 6 characters long!");
        returnval = false;
    }
    var password = document.forms['myForm']["fpass"].value;
    if (password.search(/[0-9]/)==-1){

       
        alert("At Least Contain 1 Numeric Value in password!");
        returnval = false;
    }
    var password = document.forms['myForm']["fpass"].value;
    if (password.search(/[a-z]/)==-1){

       
        alert("At Least Contain 1 Lower Case Character in Password!");
        returnval = false;
    }
    var password = document.forms['myForm']["fpass"].value;
    if (password.search(/[A-Z]/)==-1){

       
        alert("At Least Contain 1 Upper Case Character in Password!");
        returnval = false;
    }
    var password = document.forms['myForm']["fpass"].value;
    if (password.search(/[!\@\#\$\%\^\&\*\(\)\_\-\+\=\<\>\,\?\.]/)==-1){

       
        alert("At Least Contain 1 Special Character like($,%,#,@,&,* etc) in Password!");
        returnval = false;
    }



    var cpassword = document.forms['myForm']["fcpass"].value;
    if (cpassword != password){
        alert("*Password and Confirm password should match!");
        returnval = false;
    }

    return returnval;
}