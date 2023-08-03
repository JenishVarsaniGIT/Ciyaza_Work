<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <div class="container my-2" align="center">
    <h3 class="text-center">User forgot password</h3>
        <h3>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h3>
        <form action="login.php">
                <div class="form-group my-4">
                    <label for="email" class="form-label"><sub><b>Email:</b></sub>*</label>
                    <input type="email" class="form-control" id="email" name="email" /*autocomplete="off"*/ :value="old('email')" required autofocus autocomplete="username" placeholder="Enter Your Email" required>
                </div>

                <div class="flex items-center justify-end mt-4">
                     <button type="submit" class="btn btn-primary">submit
            </div>
            </form>
    </div>
</body>
</html>