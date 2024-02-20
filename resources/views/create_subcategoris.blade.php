<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <style>
        /* CSS styles here */

        form {
            margin-top: 20px;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        select {
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
    <h2>Create Subcategory</h2>
    <form action="/create_subcategories" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Subcategory Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Subcategory Image:</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" required>
            @error('image')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Subcategory</button>
    </form>

</div>


</body>
</html>
