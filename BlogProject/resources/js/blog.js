// Fetch blog posts using Axios
axios.get('/blog-posts')
    .then(response => {
        const blogPosts = response.data;
        let blogPostsHTML = '';

        // Generate HTML for each blog post
        blogPosts.forEach(blogPost => {
            blogPostsHTML += `
                <div>
                    <h2>${blogPost.title}</h2>
                    <p>${blogPost.content}</p>
                    <a href="/blog-posts/${blogPost.id}">Read more</a>
                </div>
            `;
        });

        // Append the generated HTML to the blog-posts container
        document.getElementById('blog-posts').innerHTML = blogPostsHTML;
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
                <div>
                    <h4>${comment.author}</h4>
                    <p>${comment.content}</p>
                </div>
            `;
        });

        // Append the generated HTML to the comments container
        document.getElementById('comments').innerHTML = commentsHTML;
    })
    .catch(error => {
        console.error('Error:', error);
    });
