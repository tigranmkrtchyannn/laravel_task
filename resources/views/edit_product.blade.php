<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        /* Hide number input arrows in Chrome, Safari, and Edge */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hide number input arrows in Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        form {
            margin-top: 20px;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>


</head>
<body>
<div class="container">
    <h2>Edit Product</h2>
    <form action='' method="post">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name"  required><br>
        @error('name')
        <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="price">Price:</label>
        <input type="number" id="price" name="price"  required><br>
        @error('price')
        <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br>
        @error('category')
        <div class="error-message">{{ $message }}</div>
        @enderror
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br>
        @error('image')
        <div class="error-message">{{ $message }}</div>
        @enderror
        <label for="count">Count:</label>
        <input type="number" id="count" name="count" required><br>
        @error('count')
        <div class="error-message">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn">Update</button>
    </form>
</div>
</body>
</html>
