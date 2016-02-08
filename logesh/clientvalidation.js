/*
setting the paragraph tag is empty when clicking the textfield 
using validatefocus() function
*/
function validatefocus()
{
	document.getElementById("pid1").innerHTML = "";
 	document.getElementById("pid2").innerHTML= " ";
  	document.getElementById("pid3").innerHTML= " ";
}
/*
compulsory to enter the field by giving onblur function 
in function validateform()
*/

function validateForm() {
  
   var x1 = document.getElementById("username");  //first name
    if (x1.value == null || x1.value == "") 
    {
            document.getElementById("pid1").innerHTML = "* This field is required";
            document.getElementById("pid1").style.fontSize="smaller";
            document.getElementById("pid1").style.color="blue";
            // alert("First Name must be filled out");
            return false;
    }

   var x2 = document.getElementById("password");  //first name
    if (x2.value == null || x2.value == "") 
    {
            document.getElementById("pid2").innerHTML = "* This field is required";
            document.getElementById("pid2").style.fontSize="smaller";
            document.getElementById("pid2").style.color="blue";
            // alert("First Name must be filled out");
            return false;
    }
   var x3 = document.getElementById("confirm_password");  //first name
    if (x3.value == null || x3.value == "") 
    {
            document.getElementById("pid3").innerHTML = "* This field is required";
            document.getElementById("pid3").style.fontSize="smaller";
            document.getElementById("pid3").style.color="blue";
            // alert("First Name must be filled out");
            return false;
    }
}