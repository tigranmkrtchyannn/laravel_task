<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<div class="login-container">
    @if(session('loginError'))
        <div class="error-message">{{ session('loginError') }}</div>
    @endif
    <form action="{{route('login')}}" method="post" class="login-form">
        @csrf
        <h2>Login</h2>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror

        </div>

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
