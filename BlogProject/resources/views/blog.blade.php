<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">My Blog</a>
</nav>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h1>Blog</h1>
            <div id="blog-posts"></div>
        </div>
        <div class="col-md-4">
            <h3>Recent Posts</h3>
            <div id="recent-posts"></div>
        </div>
    </div>

    <hr>

    <h2 class="my-4">Comments</h2>
    <form id="comment-form">
        <div class="form-group">
            <label for="author">Name</label>
            <input type="text" class="form-control" id="author" required>
        </div>
        <div class="form-group">
            <label for="content">Comment</label>
            <textarea class="form-control" id="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div id="comments" class="my-4"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Fetch blog posts using Axios
    axios.get('/blog-posts')
        .then(response => {
            const blogPosts = response.data;
            let blogPostsHTML = '';

            // Generate HTML for each blog post
            blogPosts.forEach(blogPost => {
                blogPostsHTML += `
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="card-title">${blogPost.title}</h2>
                                <p class="card-text">${blogPost.content}</p>
                                <a href="/blog-posts/${blogPost.id}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    `;
            });

            // Append the generated HTML to the blog-posts container
            document.getElementById('blog-posts').innerHTML = blogPostsHTML;
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // Fetch recent posts using Axios
    axios.get('/recent-posts')
        .then(response => {
            const recentPosts = response.data;
            let recentPostsHTML = '';

            // Generate HTML for each recent post
            recentPosts.forEach(recentPost => {
                recentPostsHTML += `
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">${recentPost.title}</h5>
                            </div>
                        </div>
                    `;
            });

            // Append the generated HTML to the recent-posts container
            document.getElementById('recent-posts').innerHTML = recentPostsHTML;
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // Fetch comments using Axios
    axios.get('/comments')
        .then(response => {
            const comments = response.data;
            let commentsHTML = '';

            // Generate HTML for each comment
            comments.forEach(comment => {
                commentsHTML += `
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">${comment.author}</h5>
                                <p class="card-text">${comment.content}</p>
                            </div>
                        </div>
                    `;
            });

            // Append the generated HTML to the comments container
            document.getElementById('comments').innerHTML = commentsHTML;
        })
        .catch(error => {
            console.error('Error:', error);
        });

    // Handle comment submission
    document.getElementById('comment-form').addEventListener('submit', event => {
        event.preventDefault();

        const authorInput = document.getElementById('author');
        const contentInput = document.getElementById('content');

        const commentData = {
            author: authorInput.value,
            content: contentInput.value
        };

        // Submit comment using Axios
        axios.post('/comments', commentData)
            .then(response => {
                const newComment = response.data;

                const commentHTML = `
                        <div class="card my-2">
                            <div class="card-body">
                                <h5 class="card-title">${newComment.author}</h5>
                                <p class="card-text">${newComment.content}</p>
                            </div>
                        </div>
                    `;

                // Append the new comment HTML to the comments container
                document.getElementById('comments').insertAdjacentHTML('beforeend', commentHTML);

                // Clear the input fields
                authorInput.value = '';
                contentInput.value = '';
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
</body>

</html>
