<!DOCTYPE html> 
<html> 
  
<head> 
    <title> 
        JQuery | 
      detect a textbox's content has changed. 
    </title> 
    <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> 
    </script> 
  
</head> 
  
<body style="text-align:center;" 
      id="body"> 
    <h1 style="color:green;">   
            GeeksForGeeks   
        </h1> 
    <p>  
      Change the text of input text  
      and click outside of it to see. 
    </p> 
    <input id="input" 
           name="input" /> 
    <br> 
    <br> 
    <script> 
        $("#input").on( 
          "propertychange change keyup paste input", function() { 
            alert('Text content changed!'); 
        }); 
    </script> 
</body> 
  
</html> 