<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <title>Add Item</title>
</head>

<body>
    <form class="p-5" action="{{route('createItem')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="input-item-category">Category</label>
            <input type="text" name="category" class="form-control" id="input-item-category" />
        </div>

        <div class="form-group">
            <label for="input-item-name">Item Name</label>
            <input type="text" name="itemName" class="form-control" id="input-item-name" />
        </div>

        <div class="form-group">
            <label for="input-item-price">Item Price</label>
            <input type="text" name="itemPrice" class="form-control" id="input-item-price" />
        </div>

        <div class="form-group">
            <label for="input-item-quantity">Item Quantity</label>
            <input type="number" name="itemQuantity" class="form-control" id="input-item-quantity" />
        </div>

        <div class="form-group">
            <label for="input-item-image">Item Image</label>
            <input type="file" name="itemImage" class="form-control" id="input-item-image" accept="image/*" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>