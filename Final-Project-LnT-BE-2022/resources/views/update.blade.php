{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <title>Edit a Book</title>
</head>

<body>
    <form class="p-5" action="{{route('updateBook', ['id' => $book->id])}}" method="POST" enctype="multipart/form-data">
        @csrf @method('patch')

        <div class="form-group">
            <label for="input-book-title">Book Title</label>
            <input type="text" name="title" minlength="5" maxlength="20" class="form-control"
                value="{{ $book->bookTitle }}" id="input-book-title" />
        </div>

        <div class="form-group">
            <label for="input-book-author">Book Author</label>
            <input type="text" name="author" minlength="5" maxlength="20" class="form-control"
                value="{{ $book->bookAuthor }}" id="input-book-author" />
        </div>

        <div class="form-group">
            <label for="input-book-pages">Number of Pages</label>
            <input type="number" name="pages" min="1" class="form-control" value="{{ $book->bookPages }}"
                id="input-book-pages" />
        </div>

        <div class="form-group">
            <label for="input-book-year">Book Publish Year</label>
            <input type="number" name="year" min="2000" max="2021" class="form-control" value="{{ $book->bookYear }}"
                id="input-book-year" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/boostrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html> --}}