<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        button {
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Create Category</h2>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" required>
        @error('name')
        <div class="error-message">{{ $message }}</div>
        @enderror
        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        @error('image')
        <div class="error-message">{{ $message }}</div>
        @enderror
        <label for="parent_id">Parent Category (Optional):</label>
        @if(isset($categories) && count($categories) > 0)
            <select name="parent_id" id="parent_id">
                <option value="">Select Parent Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        @else
            <p>No categories available.</p>
        @endif
        @error('parent_id')
        <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit">Create Category</button>

    </form>
</div>
</body>
</html>
