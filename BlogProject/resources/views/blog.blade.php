<!DOCTYPE html>
<html>

<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Blog Posts</h1>
    <div id="blog-posts">
        <!-- Display the blog posts dynamically -->
    </div>
    <hr class="my-8">
    <h2 class="text-2xl font-bold mb-4">Comments</h2>
    <div id="comments">
        <!-- Display the comments dynamically -->
    </div>
    <form id="comment-form" class="mt-8">
        <h3 class="text-lg font-bold mb-2">Leave a Comment</h3>
        <div>
            <label for="author" class="block mb-2">Name:</label>
            <input type="text" id="author" name="author" class="border border-gray-300 px-4 py-2 w-full rounded focus:outline-none focus:border-blue-500" required>
        </div>
        <div class="mt-4">
            <label for="content" class="block mb-2">Comment:</label>
            <textarea id="content" name="content" class="border border-gray-300 px-4 py-2 w-full rounded focus:outline-none focus:border-blue-500" required></textarea>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </div>
    </form>
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
                        <h2 class="text-2xl font-bold mb-2">${blogPost.title}</h2>
                        <p>${blogPost.content}</p>
                        <a href="/blog-posts/${blogPost.id}" class="text-blue-500 hover:text-blue-600">Read more</a>
                        <hr class="my-4">
                    `;

                blogPostsContainer.appendChild(blogPostElement);
            });
        })
        .catch(function (error) {
            console.log(error);
        });

    // Fetch and display the comments
    axios.get('/comments')
        .then(function (response) {
            var comments = response.data;
            var commentsContainer = document.getElementById('comments');

            comments.forEach(function (comment) {
                var commentElement = document.createElement('div');
                commentElement.innerHTML = `
                        <h4 class="font-bold mb-1">${comment.author}</h4>
                        <p>${comment.content}</p>
                        <hr class="my-4">
                    `;

                commentsContainer.appendChild(commentElement);
            });
        })
        .catch(function (error) {
            console.log(error);
        });

    // Handle comment submission
    var commentForm = document.getElementById('comment-form');

    commentForm.addEventListener('submit', function (e) {
        e.preventDefault();

        var authorInput = document.getElementById('author');
        var contentInput = document.getElementById('content');

        var commentData = {
            author: authorInput.value,
            content: contentInput.value
        };

        axios.post('/comments', commentData)
            .then(function (response) {
                var newComment = response.data;

                var commentElement = document.createElement('div');
                commentElement.innerHTML = `
                        <h4 class="font-bold mb-1">${newComment.author}</h4>
                        <p>${newComment.content}</p>
                        <hr class="my-4">
                    `;

                var commentsContainer = document.getElementById('comments');
                commentsContainer.appendChild(commentElement);

                authorInput.value = '';
                contentInput.value = '';
            })
            .catch(function (error) {
                console.log(error);
            });
    });
</script>
</body>

</html>
