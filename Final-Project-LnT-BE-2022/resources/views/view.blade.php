{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>View Book(s)</title>
</head>

<body style="margin: 70px">
    <div class="table-responsive">
        <table class="table table-dark table-sm table-hover table-bordered rounded">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Number of Pages</th>
                    <th>Publish Year</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->bookTitle }}</td>
                    <td>{{ $book->bookAuthor }}</td>
                    <td>{{ $book->bookPages }}</td>
                    <td>{{ $book->bookYear }}</td>
                    <td style="display: flex; justify-content: center;">
                        <!-- BUTTON MASIH BLOM INLINE, MASIH KEBAWAH COBA CARI BIAR BISA INLINE -->
                        <!-- BUTTON MASIH BLOM INLINE, MASIH KEBAWAH COBA CARI BIAR BISA INLINE -->
                        <!-- BUTTON MASIH BLOM INLINE, MASIH KEBAWAH COBA CARI BIAR BISA INLINE -->
                        <!-- BUTTON MASIH BLOM INLINE, MASIH KEBAWAH COBA CARI BIAR BISA INLINE -->
                        <!-- BUTTON MASIH BLOM INLINE, MASIH KEBAWAH COBA CARI BIAR BISA INLINE -->
                        <a href="{{ route('updateBook', $book->id) }}">
                            <i class="fa-solid fa-pen-to-square" style="color: white; margin: auto 10px;"></i>
                        </a>
                        <form action="{{ route('deleteBook', ['id' => $book->id]) }}" method="POST"
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
                @endforeach
                <tr>
                    <td style="display: flex; justify-content: center;">
                        <a href="/create">
                            <i class="fa-solid fa-plus-square" style="color: white"></i>
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
    </div>
</body>

</html> --}}