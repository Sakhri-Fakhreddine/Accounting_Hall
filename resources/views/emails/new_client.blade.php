<!DOCTYPE html>
<html>
<head>
    <title>Your Account Details</title>
</head>
<body>
    <p>Hello {{ $email }},</p>
    <p>Your account has been created. Here are your account details:</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p>Please login and change your password after your first login.</p>
</body>
</html>
