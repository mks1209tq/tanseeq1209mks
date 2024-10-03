<div class="container">
        <div class="max-w-sm mx-auto py-8">
            <form action="/documents" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <button type="submit">Submit</button>
            </form>
        </div>
</div>
