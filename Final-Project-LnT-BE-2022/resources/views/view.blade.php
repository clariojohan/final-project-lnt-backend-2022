<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catalog') }}
        </h2>
    </x-slot>

    @foreach ($categories as $category)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                <td>{{ $item->itemQuantity }}</td>
                                <td><img src="{{$item->itemImage}}" /></td>
                                {{-- <td>{{ $item->itemImage }}</td> --}}
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
                                            <i class="fa-solid fa-trash" style="color: white; margin: auto 10px;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            {{-- @else
                            <tr>
                                <td>There is no item in this category.</td>
                            </tr> --}}
                            @endif
                            @endforeach
                            <tr>
                                <td style="display: flex; justify-content: center;">
                                    <a href="/create">
                                        <i class="fa-solid fa-plus-square" style="color: white"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
</x-app-layout>