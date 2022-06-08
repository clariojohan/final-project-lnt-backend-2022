<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalog') }}
        </h2>
    </x-slot>

    <script>
        window.localStorage.clear();
    </script>

    <div class="content-view d-flex flex-column mx-5">
        <div class="py-12">
            @if (Auth::user()->admin_id == NULL)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 float-right">
                <a href="/invoice" style="text-decoration: none;">
                    <x-redirect-btn>
                        {{ __('Generate Invoice') }}
                    </x-redirect-btn>
                </a>
            </div>
            @endif
            @foreach ($categories as $category)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="category">
                    <h1 style="font-weight: bold; font-size: 1em;">
                        {{$category->categoryName}}
                    </h1>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="table-responsive">
                        <table class="table table-dark table-sm table-hover table-bordered rounded">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Stock Quantity</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                @if ($item->categoryID == $category->id)
                                <tr>
                                    <td>{{ $item->itemName }}</td>
                                    <td>Rp. {{ $item->itemPrice }}</td>
                                    <td id="item-quantity">{{ $item->itemQuantity }}</td>
                                    <td><img src="{{asset('storage/images/'.$item->itemImage)}}"
                                            style="width: 200px; height: 200px;" />
                                    </td>
                                    {{--
                                    make a condition if it is admin show the create and create category navbar menu,
                                    else
                                    hides it
                                    --}}
                                    @if (Auth::user()->admin_id != NULL)
                                    <td style="display: flex; justify-content: center;">
                                        <a href="{{ route('updateItem', $item->id) }}">
                                            <i class="fa-solid fa-pen-to-square"
                                                style="color: white; margin: auto 10px;"></i>
                                        </a>
                                        <form action="{{ route('deleteItem', ['id' => $item->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf @method('delete')
                                            <button type="submit" style="
                                                            background: none;
                                                            padding: 0px;
                                                            border: none;
                                                            outline: none;
                                                        ">
                                                <i class="fa-solid fa-trash"
                                                    style="color: white; margin: auto 10px;"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @else
                                    {{-- <td style="display: flex; justify-content: center;">
                                        <form action="{{ route('deleteItem', ['id' => $item->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf @method('delete')
                                            <button type="submit" style="
                                                            background: none;
                                                            padding: 0px;
                                                            border: none;
                                                            outline: none;
                                                        ">
                                                <i class="fa-solid fa-cart-plus"
                                                    style="color: white; margin: auto 10px;"></i>
                                            </button>
                                        </form>
                                    </td> --}}
                                    <td id="cart-{{ $item->id }}" style="display: flex; justify-content: center;">
                                        <button id="cart-btn-{{ $item->id }}" type="text" style="
                                                            background: none;
                                                            padding: 0px;
                                                            border: none;
                                                            outline: none;
                                                        "
                                            onclick="addToCart({{ $item->id }}, {{ $item->itemQuantity }})">
                                            <i class="fa-solid fa-cart-plus"
                                                style="color: white; margin: auto 10px;"></i>
                                        </button>
                                        <script>
                                            function addToCart(itemID, itemQuantity) {
                                                // var cart = document.getElementsByClassName("cart");
    
    
                                                var cart = document.getElementById("cart-" + itemID);
                                                var cartBtn= document.getElementById('cart-btn-' + itemID);
                                                // var itemStock = document.getElementById('item-quantity');
    
                                                cartBtn.style.display = 'none';
    
                                                const cartQtyDiv = document.createElement('div');
                                                const ItemInc = document.createElement('button');
                                                const ItemDec = document.createElement('button');
                                                const ItemQty = document.createElement('b');
    
                                                localStorage.setItem('userQty' + itemID, '1'); // first click add to local storage
    
                                                cartQtyDiv.style.display = 'inline-block';
                                                ItemInc.innerHTML = '<i class="fa-solid fa-plus"></i>';
                                                ItemInc.style.margin = 'auto 10px';
                                                ItemDec.innerHTML = '<i class="fa-solid fa-minus"></i>';
                                                ItemDec.style.margin = 'auto 10px';
                                                ItemQty.innerText = '1';
                                                ItemQty.style.margin = 'auto 10px';
    
                                                cartQtyDiv.appendChild(ItemDec);
                                                cartQtyDiv.appendChild(ItemQty);
                                                cartQtyDiv.appendChild(ItemInc);
                                                cart.appendChild(cartQtyDiv);
    
                                                ItemInc.addEventListener('click', function() {
                                                    if (itemQuantity > ItemQty.innerText) {
                                                        ItemQty.innerText = parseInt(ItemQty.innerText) + 1;
                                                        localStorage.setItem('userQty' + itemID, ItemQty.innerText);
                                                    }
                                                    else {
                                                        alert("This item is out of stock !");
                                                    }
                                                });
    
                                                ItemDec.addEventListener('click', function() {
                                                    if (ItemQty.innerText > 1) {
                                                        ItemQty.innerHTML = parseInt(ItemQty.innerHTML) - 1;
                                                        localStorage.setItem('userQty' + itemID, ItemQty.innerText);
                                                    }
                                                    else {
                                                        cartQtyDiv.remove();
                                                        cartBtn.style.display = 'block';
                                                        localStorage.setItem('userQty' + itemID, '');
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                    @endif
                                </tr>
                                {{-- @else
                                <tr>
                                    <td>There is no item in this category.</td>
                                </tr> --}}
                                @endif
                                @endforeach

                                @if (Auth::user()->admin_id != NULL)
                                <tr>
                                    <td style="display: flex; justify-content: center;">
                                        <a href="/create">
                                            <i class="fa-solid fa-plus-square" style="color: white"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</x-app-layout>