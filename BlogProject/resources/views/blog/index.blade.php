<!DOCTYPE html>
<html>

<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
<div class="container">
    <h1>Blog Posts</h1>
    <div id="blog-posts">
        <!-- Display the blog posts dynamically -->
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Fetch and display the blog posts
    axios.get('/blog-posts')
        .then(function (response) {
            var blogPosts = response.data;
            var blogPostsContainer = document.getElementById('blog-posts');

            blogPosts.forEach(function (blogPost) {
                var blogPostElement = document.createElement('div');
                blogPostElement.innerHTML = `
                        <h2>${blogPost.title}</h2>
                        <p>${blogPost.content}</p>
                        <a href="/blog-posts/${blogPost.id}">Read more</a>
                        <hr>
                    `;

                blogPostsContainer.appendChild(blogPostElement);
            });
        })
        .catch(function (error) {
            console.log(error);
        });
</script>
</body>

</html>
