<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <style>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .btn {
            padding: 10px;
            margin: 5px;
            text-decoration: none;
            font-size: 16px;
            border: 1px solid #4CAF50;
        }


    </style>
</head>
<body>
<div class="container">
    <h2>Product List</h2>
    <a href="{{route('product_form')}}" class="btn create-btn">Create Product</a>
    <a href="{{route('category_form')}}" class="btn create-btn">Create Categories</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Count</th>
            <th>Actions</th>
        </tr>
{{--        @foreach ($products as $product)--}}
            <tr>
                <td>id</td>
                <td>name</td>
                <td>price</td>
                <td>category</td>
                <td>image</td>
                <td>count</td>
                <td>
                    <a href="" class="btn">Edit</a>
                    <form action="" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Delete</button>
                    </form>
                </td>
            </tr>
{{--        @endforeach--}}
    </table>
</div>
</body>
</html>
