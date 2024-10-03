<div class="container">
    <div class="max-w-sm mx-auto py-8">
        <form action="/documents" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="AavntXPqZev6O7H0OogtgELn0jw6DciW5DQTIPN0" autocomplete="off">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <button type="submit">Submit</button>
            <button type="button" id="transferButton">Transfer to Form 2</button>
        </form>
    </div>
</div>