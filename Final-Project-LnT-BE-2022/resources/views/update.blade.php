<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <title>Edit a Item</title>
</head>

<body>
    <form class="p-5" action="{{route('updateItem', ['id' => $item->id])}}" method="POST" enctype="multipart/form-data">
        @csrf @method('patch')

        {{-- <script>
            alert({{$item->categoryID}});
        </script> --}}

        <div class="form-group">
            <label for="input-item-category">Category</label>
            <select name="category" id="input-item-category">
                @foreach ($categories as $category)
                {{--
                basiclly i use ternary to give "selected" parameter to which ever category is selected by the user
                https://laracasts.com/discuss/channels/laravel/how-can-i-set-the-default-value-laravel-select-element-1
                --}}
                <option value="{{ $category->id }}" {{ $item->categoryID == $category->id ? 'selected' : ''}}>
                    {{ $category->categoryName }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="input-item-name">Item Name</label>
            <input type="text" name="itemName" class="form-control" id="input-item-name"
                value="{{ $item->itemName }}" />
        </div>

        <div class="form-group">
            <label for="input-item-price">Item Price</label>
            <input type="text" name="itemPrice" class="form-control" id="input-item-price"
                value="{{ $item->itemPrice }}" />
        </div>

        <div class="form-group">
            <label for="input-item-quantity">Item Quantity</label>
            <input type="number" name="itemQuantity" class="form-control" id="input-item-quantity"
                value="{{ $item->itemQuantity }}" />
        </div>

        <div class="form-group">
            <label for="input-item-image">Item Image</label>
            <input type="file" name="itemImage" id="input-item-image" accept="image/*" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a class="p-5" href="/view"><button type="text" class="btn btn-primary">Back to Catalog</button></a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>