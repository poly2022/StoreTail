<!--<!doctype html>
<html>
<html lang="en">
     <head> 
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Form</title>
<link href="../css/style.css" rel="stylesheet">


</head> 
<body>
     <div class="form-container">
         <form>
             <input type="text" name="username" placeholder="Username" required> 
             <input type="email" name="email" placeholder="Email" required> 
             <input type="text" name="firstname" placeholder="Firstname" required> 
             <input type="text" name="lastname" placeholder="Lastname" required>
             <input type="password" name="password" placeholder="Password" required>
             <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
            <input type="button" name="submit">
</form>
</html>

-->
<!DOCTYPE html>
<html lang="en">
   
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="css/style.css">
</head>
    <body>
   
    <div class="form-container">
        <form id="registrationForm">
            <div class="form-group">
                <label for="username">Username: <span class="required">*</span></label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password: <span class="required">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password">
            </div>
            <button type="submit">Submit</button>
            <div id="validationErrors"></div>
        </form>
</div>
    <script src="script.js"></script>
    </body>
</html>