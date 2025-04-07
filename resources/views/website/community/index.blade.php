@extends('layouts.app')
@section('title', 'Community')
<style>
    .comments {
    width: 90%;
    padding: 15px 0;
    margin: auto;
    height: auto;
}
.form {
    width: 100%;
    height: auto;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:15px;
    padding-top:5px;
    padding-bottom: 5PX;
}
.form .text-area {
    width: 50%;
    height: auto;
    font-size:20px;
    word-spacing: -2px;
    padding-left:5px;
    padding-top:4px;
    margin-right:15px;
    border-radius:5px;
    padding: 10px;
}
.form .text-area:focus-visible{
    outline: none;
}
/* .postList{
    background-color: green;
} */
.post-btn {
    width:max-content !important;
    height: auto;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 18px;
    border: 1px solid #007BFF;
    font-size:20px;
    font-weight: 500;
    padding: 10px 25px;
    cursor: pointer;
}
.post-btn:hover{
    background: #fff;
    color: #007BFF;
    border: 1px solid #007BFF;
}
.post{
    position: relative;
    width: 60%;
    margin: auto;
    font-size: 20px;
    padding:0;
    /* border: 1px solid #262626; */
    margin-bottom: 20px;
    border-bottom: 2px solid #262626;
    padding-bottom:40px;
}
.post .delet-button{
    position: absolute;
    top: 10px;
    right: 0;
}
.post p{
    width: 100%;
    font-size: 22px;
    padding-top: 8px;
    padding-bottom:50px;
    /* border-bottom: 1px solid #262626; */
    margin-bottom: 3px;
}
.delet-button{
    font-size: 16px;
    font-weight: 600px;
    padding: 8px 10px 6px 10px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    background-color: red;
    color: #fff;
}
/* .delete-button:hover{
    background: #262626;
    color: #fff;
    border: 1px solid #fff;
} */
.comment{
    width: 100%;
    display: flex;
}
.comment textarea{
    width:100%;
    font-size: 18px;
    WORD-spacing: -2PX;
    padding-top: 5PX;
}
.comment textarea:focus-visible{
    outline: none;
}
.comment-text{
    position: relative;
    display: flex;
    padding-top: 5px;
    border-bottom: 1px solid #262626;
}
.comment-text textarea{
    width:80%;
    padding-top:15px;
    /* background: transparent;
    border: none;
    outline: none; */
    background: transparent;
    border: none;
    font-size: 18px;
}
.comment-text:last-child{
    border-bottom: 0;
}
.comment-text textarea:focus-visible{
    outline: NONE;
    background-color: #fff;
}
.reply-list{
    position: relative;
    padding-left: 51px;
    width: 91%;
}
.reply-list{
    display: flex;
}
.comment-button{
    margin-left: 10px;
    border: none;
    background-color: #007BFF;
    color: #fff;
    font-size: 16px;
    padding: 0 10px;
    border-radius: 8px;
}
.comment-text .edit-button{
    width: max-content;
    height: 40px;
    background-color: #008000;
    color: #fff;
    border: none;
    padding: 0 25px;
    border-radius: 8px;
    margin-right:5px;
    margin-top: 15px;
}
.comment-text:focus-visible{
    outline: none;
}
.reply-button{
    width: max-content;
    height: 40px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 0 25px;
    border-radius: 8px;
    margin-right:5px;
    margin-top: 15px;
}
.delete-button{
    width: max-content;
    height: 40px;
    background-color: red;
    color: #fff;
    border: none;
    padding: 0 25px;
    border-radius: 8px;
    margin-right:5px;
    margin-top: 15px;
}
.reply-list .comment-text{
    width:120% !important;
    height: auto;
    position: relative;
    padding-top: 20px;
    border-bottom: 1px solid #262626;
    padding-bottom: 20px;
}
.reply-list .comment-text .delete-button{
    position: absolute;
    right: 105px;
    top: -5px;
    width:100px;
    height: 40px;
    background-color: red;
    color: #fff;
    border: none;
    padding: 0 25px;
    border-radius: 8px;
    margin-right:5px;
    margin-top: 15px;
}
.reply-list .comment-text .edit-button{
    position: absolute;
    right: 0px;
    top: -5px;
    width:100px;
    height: 40px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 0 25px;
    border-radius: 8px;
    margin-right:5px;
    margin-top: 15px;
}
.comment-list .comment-input{
    width: 65%;
    margin-top: 20px
}
  </style>
  @section('content')
      <!-- Main content -->
      <section class="content">
        <div class="card">
          <div class="card-header">
            <div class="justify-content-between d-flex align-items-center w-100">
              <h3 class="card-title font-weight-bold">Community</h3>
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              
            <div class="comments">
                <div id="postForm" class="form">
                    <textarea id="postContent" class="text-area" placeholder="Write a post..."></textarea><br>
                    <button onclick="addPost()" class="post-btn">Post</button>
                </div>
                <div id="postList" class="postList">
        
                </div>
        
            </div>
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
  @push('scripts')
  <script>
    // Define an array to hold posts
    var posts = [];

    // Function to create a new post element
    function createPostElement(post) {
        var postContainer = document.createElement("div");
        postContainer.classList.add("post");
        postContainer.setAttribute("data-id", post.id);

        var postContent = document.createElement("p");
        postContent.textContent = post.content;

        var deletePostButton = document.createElement("button");
        deletePostButton.textContent = "Delete Post";
        deletePostButton.classList.add("delet-button");
        deletePostButton.onclick = function () {
            deletePost(post);
        };

        var commentForm = document.createElement("div");
        commentForm.classList.add("comment");
        var commentInput = document.createElement("textarea");
        commentInput.placeholder = "Write a comment...";
        commentInput.classList.add("comment-input");
        var commentButton = document.createElement("button");
        commentButton.textContent = "Comment";
        commentButton.classList.add("comment-button");
        commentButton.onclick = function () {
            addComment(post, commentInput.value);
            commentInput.value = ""; // Clear the input after adding the comment
        };
        commentForm.appendChild(commentInput);
        commentForm.appendChild(commentButton);

        var commentList = document.createElement("div");
        commentList.classList.add("comment-list");
        post.comments.forEach(function (comment) {
            var commentItem = document.createElement("div");
            commentItem.classList.add("comment-text");

            // Create textarea for editing comment
            var commentTextarea = document.createElement("textarea");
            commentTextarea.value = comment.content;
            commentTextarea.classList.add("edit-comment");
            // commentTextarea.style.display = "none"; // Initially hide textarea

            var deleteCommentButton = document.createElement("button");
            deleteCommentButton.textContent = "Delete";
            deleteCommentButton.classList.add("delete-button");
            deleteCommentButton.onclick = function () {
                deleteComment(post, comment);
            };

            var editButton = document.createElement("button");
            editButton.textContent = "Edit";
            editButton.classList.add("edit-button");
            editButton.onclick = function () {
                editComment(comment, commentTextarea);
            };

            var replyButton = document.createElement("button");
            replyButton.textContent = "Reply";
            replyButton.classList.add("reply-button");
            replyButton.onclick = function () {
                replyToComment(post, comment, commentList);
            };

            // Append textarea, edit button, delete button, and reply button to commentItem
            commentItem.appendChild(commentTextarea);
            commentItem.appendChild(deleteCommentButton);
            commentItem.appendChild(editButton);
            commentItem.appendChild(replyButton);
            commentList.appendChild(commentItem);

            // Display replies if exist
            if (comment.replies && comment.replies.length > 0) {
                var replyList = document.createElement("div");
                replyList.classList.add("reply-list");
                comment.replies.forEach(function (reply) {
                    var replyItem = document.createElement("div");
                    replyItem.classList.add("comment-text");
                    replyItem.textContent = reply.content;

                    var deleteReplyButton = document.createElement("button");
                    deleteReplyButton.textContent = "Delete Reply";
                    deleteReplyButton.classList.add("delete-button");
                    deleteReplyButton.onclick = function () {
                        deleteReply(comment, reply);
                    };

                    var editReplyButton = document.createElement("button");
                    editReplyButton.textContent = "Edit Reply";
                    editReplyButton.classList.add("edit-button");
                    editReplyButton.onclick = function () {
                        editComment(reply, replyItem, true);
                    };

                    // Append reply text, delete button, and edit button to replyItem
                    replyItem.appendChild(deleteReplyButton);
                    replyItem.appendChild(editReplyButton);
                    replyList.appendChild(replyItem);
                });
                commentList.appendChild(replyList);
            }
        });

        postContainer.appendChild(postContent);
        postContainer.appendChild(deletePostButton);
        postContainer.appendChild(commentForm);
        postContainer.appendChild(commentList);
        return postContainer;
    }

    // Function to add a new post
    function addPost() {
        var postContent = document.getElementById("postContent").value.trim();
        if (postContent !== "") {
            var post = {
                id: Date.now(), // Generate a unique ID for each post
                content: postContent,
                comments: []
            };
            posts.push(post);
            renderPosts();
            document.getElementById("postContent").value = ""; // Clear the textarea
        }
    }

    // Function to render all posts
    function renderPosts() {
        var postList = document.getElementById("postList");
        postList.innerHTML = ""; // Clear the post list

        posts.forEach(function (post) {
            var postElement = createPostElement(post);
            postList.appendChild(postElement);
        });
    }

    // Function to add a new comment
    function addComment(post, commentContent) {
        if (commentContent.trim() !== "") {
            var comment = {
                id: Date.now(), // Generate a unique ID for each comment
                content: commentContent
            };
            post.comments.push(comment);
            renderPosts();
        }
    }

    // Function to delete a comment
    function deleteComment(post, comment) {
        post.comments = post.comments.filter(function (c) {
            return c !== comment;
        });
        renderPosts();
    }

    // Function to delete a reply
    function deleteReply(comment, reply) {
        comment.replies = comment.replies.filter(function (r) {
            return r !== reply;
        });
        renderPosts();
    }

    // Function to delete a post
    function deletePost(post) {
        posts = posts.filter(function (p) {
            return p !== post;
        });
        renderPosts();
    }

    // Function to edit a comment
    function editComment(item, textarea, isReply = false) {
        // Show textarea for editing comment
        textarea.contentEditable = true;
        // Focus on textarea for editing
        textarea.focus();
        textarea.addEventListener("blur", function () {
            // Hide textarea when focus is lost
            textarea.contentEditable = false;
            // Update comment content
            item.content = textarea.value.trim(); // Update the content with the textarea value
            renderPosts(); // Re-render posts after editing
        });
    }

    // Function to reply to a comment
    // function replyToComment(post, comment, commentList) {
    //     var replyContent = prompt("Write a reply to this comment:");
    //     if (replyContent !== null && replyContent.trim() !== "") {
    //         var reply = {
    //             id: Date.now(),
    //             content: replyContent
    //         };
    //         comment.replies = comment.replies || [];
    //         comment.replies.push(reply);
    //         renderPosts();
    //     }
    // }




    function addReply(comment, replyContent) {
        if (replyContent.trim() !== "") {
            var reply = {
                id: Date.now(),
                content: replyContent
            };
            comment.replies = comment.replies || [];
            comment.replies.push(reply);
            renderPosts();
        }
    }

    function replyToComment(post, comment, commentList) {
        // Create elements for reply interface
        var replyTextarea = document.createElement("textarea");
        replyTextarea.placeholder = "Write a reply to this comment...";
        replyTextarea.classList.add("comment-input");

        var replyButton = document.createElement("button");
        replyButton.textContent = "Reply";
        replyButton.classList.add("comment-button");
        replyButton.onclick = function () {
            addReply(comment, replyTextarea.value);
            var repliedContent = document.createElement("p");
            repliedContent.textContent = replyTextarea.value;
            commentList.appendChild(repliedContent);
            commentList.removeChild(replyForm); // Remove the reply form after adding the reply
        };

        var cancelButton = document.createElement("button");
        cancelButton.textContent = "Cancel";
        cancelButton.classList.add("comment-button");
        cancelButton.onclick = function () {
            commentList.removeChild(replyForm); // Remove the reply form if canceled
        };

        // Create a container for the reply form
        var replyForm = document.createElement("div");
        replyForm.appendChild(replyTextarea);
        replyForm.appendChild(replyButton);
        replyForm.appendChild(cancelButton);

        // Append the reply form to the comment list
        commentList.appendChild(replyForm);
    }





    // Initial rendering of posts
    renderPosts();
</script>
  @endpush
