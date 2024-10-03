
    <div class="container">
        <div class="max-w-sm mx-auto py-8">
            <form action="/documents" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="document" id="document">
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
