<html>
<head>
    <title>User Login and Registration</title>
    <link rel = "stylesheet" type = "tetx/css" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

</head>
<body>
    
    <div class = "container">
        <div class="row">
            <div class="col-md-6">
                <h2>Login here</h2>
                <form action="validation.php" method = "post" onsubmit = "return validation()>
                    <p>  
                        <label> UserName: </label>  
                        <input type = "text" id ="user" name  = "user" />  
                    </p>  
                    <p>  
                        <label> Password: </label>  
                        <input type = "password" id ="pass" name  = "pass" />  
                    </p>  
                    <p>     
                        <input type =  "submit" id = "btn" value = "Login" />  
                    </p> 
                </form>
            </div>

        </div>
    </div>
</body>

</html>

 
        <script>  
                function validation()  
                {  
                    var id=document.f1.user.value;  
                    var ps=document.f1.pass.value;  
                    if(id.length=="" && ps.length=="") {  
                        alert("User Name and Password fields are empty");  
                        return false;  
                    }  
                    else  
                    {  
                        if(id.length=="") {  
                            alert("User Name is empty");  
                            return false;  
                        }   
                        if (ps.length=="") {  
                        alert("Password field is empty");  
                        return false;  
                        }  
                    }                             
                }  
            </script>  
    </body>     
    </html>  

    