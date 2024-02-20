<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product and Category Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #007bff;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        button,
        .button{
            padding: 10px;
            margin: 5px;
            font-size: 16px;
            text-decoration: none;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }
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
    </style>
</head>
<body>

<header>
    <h1>Product and Category Management</h1>
</header>

<nav>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
</nav>

<div class="container">
    <button onclick="openModal('createProductModal')" class="btn-primary">Create Product</button>
    <button onclick="openModal('updateProductModal')" class="btn-primary">Update Product</button>
    <button onclick="openModal('createCategoryModal')" class="btn-primary">Create Category</button>
    <button onclick="openModal('updateCategoryModal')" class="btn-primary">Update Category</button>
    <a href="/show_product" class="btn-primary button">Show Product</a>
</div>



<!-- Update Product Modal -->
<div id="updateProductModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('updateProductModal')">&times;</span>
        <h2>Update Product</h2>
        <form method="post" action="#">
            @csrf
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <label for="price">Product Price:</label>
            <input type="number" id="price" name="price" required>
            @error('price')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="category">Product Category:</label>
            <input type="text" id="category" name="category" required>
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <label for="count">Product Count:</label>
            <input type="number" id="count" name="count" required>
            @error('count')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <label for="image">Product Picture:</label>
            <input type="file" id="image" name="image" accept="image/*">
            @error('image')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>
</div>

<!-- Create Category Modal -->
<div id="createCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('createCategoryModal')">&times;</span>
        <h2>Create Category</h2>
        <form method="post" action="{{route('page')}}">
            @csrf
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" required>
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>
</div>

<!-- Update Category Modal -->
<div id="updateCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('updateCategoryModal')">&times;</span>
        <h2>Update Category</h2>
        <form method="post" action="/home">
            @csrf
            @method('PUT')
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" required>
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>
</div>


<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "flex";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }
</script>

</body>
</html>
