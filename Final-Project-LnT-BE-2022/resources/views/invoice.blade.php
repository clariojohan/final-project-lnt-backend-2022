{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <title>Add Item</title>
</head>

<body>
    <form class="p-5" action="{{route('createInvoice')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="invoice-header">
            <div class="form-group">
                <label for="input-invoice-address">Invoice Address</label>
                <input type="text" name="invoiceAddress" class="form-control" id="input-invoice-address" />
            </div>
            <div class="form-group">
                <label for="input-invoice-postal-code">Invoice Postal Code</label>
                <input type="text" name="invoicePostalCode" class="form-control" id="input-invoice-postal-code" />
            </div>
        </div>
        <script>
            const items = [];
            for (var i = 0; i < localStorage.length; i++) {
                var key = localStorage.key(i);
                var item = localStorage.getItem(key);

                const itemInvoice = document.createElement('div');
                const formGroup = document.createElement('div');
                const categoryLabel = document.createElement('label');
                const itemNameLabel = document.createElement('label');
                const itemPriceLabel = document.createElement('label');
                const itemQuantityLabel = document.createElement('label');
                const itemSubtotalPrice = document.createElement('p');
                const itemTotalPrice = document.createElement('p');
                const 

                itemInvoice.classList.add('item-invoice');
                formGroup.classList.add('form-group');
                label.classList.add('form-control-label');

                itemInvoice.appendChild(formGroup);
            }
        </script>
        <div class="items-invoice">
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
                <input type="file" name="itemImage" id="input-item-image" accept="image/*" />
            </div>
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

</html> --}}