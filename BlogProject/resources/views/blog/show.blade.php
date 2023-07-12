<!DOCTYPE html>
<html>

<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
</head>

<body>
<div class="container">
    <h1>Blog Post Details</h1>
    <div id="blog-post">
        <!-- Display the blog post dynamically -->
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Fetch and display the blog post details
    axios.get('/blog-posts/{{ $id }}')
        .then(function (response) {
            var blogPost = response.data;
            var blogPostContainer = document.getElementById('blog-post');

            var blogPostElement = document.createElement('div');
            blogPostElement.innerHTML = `
                    <h2>${blogPost.title}</h2>
                    <p>${blogPost.content}</p>
                    <hr>
                `;

            blogPostContainer.appendChild(blogPostElement);
        })
        .catch(function (error) {
            console.log(error);
        });
</script>
</body>

</html>
