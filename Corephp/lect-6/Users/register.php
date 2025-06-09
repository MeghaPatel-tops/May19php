<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 700px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;           
        }
        .conatiner{
            height: 450px;
            width: 700px;
            display: flex;
            border: 1px solid black;
            overflow: hidden;
            
        }
        .form-div{
        height: 100%;
        width: 50%;
         background-color: black;
         background-size: 100% 100%;
         padding: 20px;
         color: white;
         display: flex;
         align-items: center;
         box-shadow: 0px 1px 5px white;
         z-index: 1;

        }
        
        .form-content{
           
            width: 100%;
        }
        
        .input-div{
            margin: 5px;
            display: flex;
            flex-direction: column;
            padding: 10px;
            position: relative;
            /* border:1px solid white; */
        }
        .input-div input{
            height: 30px;
            width: 100%;
            background-color: white;
            border-bottom: 1px solid white;
            border-radius: 20px;
            padding-left: 20px;
        }



        .input-div label{
            color: black;
            position: absolute;
            top: 15px;
            left: 25px;
            
        }
        /* .input-div input:focus{
            background-color: white;
            color: black;
            padding: 10px;
        } */
    .input-div input:focus+  label ,.input-div input:not(:placeholder-shown) +label {
        color: white;
        top:-15px;
        left: 20px;
         position: absolute;
    }
 

        .button-div{
             padding: 10px;
        }
        .button-div .btn{
            padding: 10px;
            background-color:rgb(2, 2, 62);
            color: white;
            width: 100%;
            border-radius: 20px;
        }
        .div-info{
            text-align: center;
        }
        .form-div h1{
            text-align: center;
        }
        .info{
            padding: 10px;
            width: 50%;
            background-color: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative;
        }
        ::placeholder{
            color: transparent;
        }
        .circle{
            position: absolute;
            left: 0;
            top: 0;
            height: 200px;
            width: 200px;
            background-color: white;
            border-radius: 50%;
            
            translate: 90px -90px ;
        }

    </style>
</head>
<body>
    <div class="conatiner">
         <div class="info">
            <div class="circle"></div>
            <h1>Welcome To App</h1>
            <p>Lorem ipsum dolor sit amet </p>
        </div>
        
        <div class="form-div">
            <div class="form-content">
                <h1>Register Form</h1>
                <form action="commancode.php" method="POST" >
                <div class="input-div">
                
                <input type="text" name="uname" id="" placeholder="enter" required>
                <label for="">Username</label>
            </div>
            <div class="input-div">
                
                <input type="email" name="email" id="" placeholder="enter" required>
                <label for="">Email</label>
            </div>
            
                 <div class="input-div">
                
                <input type="text" name="contact" id="" placeholder="enter" required>
                <label for="">Contact</label>
                </div>
            <div class="input-div">
               
                <input type="password" name="pwd" id="" placeholder="enter" required>
                 <label for="">Password</label>
            </div>
            <div class="button-div">
                <input type="submit" value="Submit" name="register" class="btn">
            </div>
            </form>
            <div class="div-info">
                <span>Already User??? </span><a href="login.php">Login</a>
            </div>
            </div>
        </div>
       
    </div>
    
</body>
</html>