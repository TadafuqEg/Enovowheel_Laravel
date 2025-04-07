@extends('layouts.app')
@section('title', 'Community')
<style>
.container {
  max-width: 100%;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 10px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 100%;
  height: 6rem;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="button"] {
  background-color: #1200b3;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.setting_post{
  color:#fff;
  padding-left: 5px;
}
.setting_post:hover{
  background-color:#777777;
  color:#fff;
  cursor: pointer;
}
button[type="button"]:hover {
  background-color: #0077ff;
}
  </style>
  @section('content')
      <!-- Main content -->
      <section class="content">
        <div class="card" id="postContainer">
          <div class="card-header">
            <div class="justify-content-between d-flex align-items-center w-100">
              <h3 class="card-title font-weight-bold">Community</h3>
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" id="create_post">
              
            <div class="container"style="max-width: 100%; padding-bottom:0.5px;">
              
              <form id="post_form">
                
                <div class="form-group">
                  
                  <textarea id="content" name="content" placeholder="What's on your mind ..?"></textarea>
                  <div id="div_image_model2" style="position: relative; display:none;">
                    <img id="editImage2"  style="width:100%;">
                    <button type="button" class="btn btn-danger" id="removeImageButton_2" style="position: absolute; top: 0; right: 0;">X</button>
                </div>
                </div>
                <label for="file_input">
                  <svg stroke="currentColor" title="Upload image" fill="none" viewBox="0 0 48 48" style="width: 3rem;" class="w-12 h-12 mx-auto text-gray-400"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0
                    01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4
                    4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </label>
                <input id="file_input" name="image"type="file" style="display: none;">
                <button type="button" onclick="addPost()" class="ddd" style="float: right;">Post</button>
              </form>
            </div>
           
          </div>
         @foreach($posts as $post)
          <div style="margin: 0px 20px 20px 20px;" data-id="{{$post->id}}">
            <div style="margin-bottom: 10px;">
              <img src="{{ asset('logos/user_logo.png') }}" class="img-circle elevation-2" alt="User Image"style="height: 2rem;width: 2rem;">
              <label style="margin-left: 10px;">{{$post->user->first_name}} {{$post->user->last_name}}</label>
              <label class="dd_click" onclick="open_list(event)" style="float: right; cursor: pointer;font-size: 1.5rem;">&#8230;</label>
              <!-- Post settings list -->
              
              <ul class="postSettingsList" style="display:none; list-style-type: none; margin: 0; padding: 0; background-color:#343a40;width: 100px;
              position: absolute;     border-radius: 5px;margin-left:92%;">
                @if(auth()->user()->id==$post->user->id)
                  <li class="setting_post"   onclick="openEditModal({{ $post->id }})"><span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span> Edit</li>
                @endif
                  <li class="setting_post" data-id="{{$post->id}}" onclick="deletePost(event)"><span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span> Delete</li>
              </ul>
            </div>
            <div id="div_postContent_id_{{$post->id}}" style="background-color:#eef0f0;margin-left:3%; border-radius:5px;">
                <p id="post_desc_{{$post->id}}" style="margin-left:5px;">{{$post->description}}</p>
                @if($post->image!=null)
                <div style="text-align: center;">
                  <img id="post_image_{{$post->id}}" src="{{$post->image}}"style="width:90%;">
                </div>
                
                @endif
               
            </div>
            <div style="background-color:#eef0f0">
              
              <label onclick="openCommentsModal(this)" data-id="{{$post->id}}" class="comments_count"  style="float:right;">{{$post->comments_count}} comments</label>
            </div>
          </div>
          @endforeach
          

          


          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <div class="modal" id="editModal">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color:#000">&times;</button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            
                            <textarea class="form-control" id="editDescription" name="description" style="height: 6rem;"></textarea>
                            <div id="div_image_model" style="position: relative; display:none;">
                              <img id="editImage" src="{{asset('/images/6LJWYE3bhzr5R1714378899.png')}}" style="width:100%;">
                              <button type="button" class="btn btn-danger" id="removeImageButton" style="position: absolute; top: 0; right: 0;">X</button>
                          </div>
                            <label for="file_input_model">
                              <svg stroke="currentColor" title="Upload image" fill="none" viewBox="0 0 48 48" style="width: 3rem;" class="w-12 h-12 mx-auto text-gray-400"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0
                                01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4
                                4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </label>
                            <input id="file_input_model" name="image"type="file" style="display: none;">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="postComments">
      <div class="modal-dialog" style="max-width: 50%;">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h5 class="modal-title">Post Comments</h5>
                  <button type="button" class="close" data-dismiss="modal" style="color:#000">&times;</button>
              </div>
              <div id='all_comments' style="width: 100%; margin-top:1%">

                
              </div>

              <!-- Modal Body -->
              <div class="modal-body">
                  <form id="create_comment"style="display:inline-flex;width:100%">
                      <input hidden value="غ" name="post_id" id="post_id">
                      <div class="form-group" style="width:95%;margin-bottom:0px;">
                          
                          <textarea class="form-control" id="commentDescription" name="description"style="height: 3rem;"placeholder="Write your comment"></textarea>
                          
                          
                      </div>
                      <button type="button" onclick="addComment()" class="btn btn-primary"><img src="{{ asset('logos/arro.webp') }}" class="img-circle elevation-2" alt="User Image"
                        style="height: 2rem;
                    width: 2rem;">
                </button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <div class="modal" id="editCommentModal">
    <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Edit Comment</h5>
                <button type="button" class="close" data-dismiss="modal" style="color:#000">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editCommentForm">
                  <input hidden value="غ" name="comment_id" id="comment_id">
                    <div class="form-group">
                        
                        <textarea class="form-control" id="editCommentDescription" name="description" style="height: 6rem;"></textarea>
                        
                        
                        
                    </div>
                    <button type="button" onclick="updateComment()" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="editReplayModal">
  <div class="modal-dialog" style="max-width: 30%;">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h5 class="modal-title">Edit Replay</h5>
              <button type="button" class="close" data-dismiss="modal" style="color:#000">&times;</button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body">
              <form id="editReplayForm">
                <input hidden value="غ" name="replay_id" id="replay_id">
                  <div class="form-group">
                      
                      <textarea class="form-control" id="editReplayDescription" name="description" style="height: 6rem;"></textarea>
                      
                      
                      
                  </div>
                  <button type="button" onclick="updateReplay()" class="btn btn-primary">Save Changes</button>
              </form>
          </div>
      </div>
  </div>
</div>
  @endsection
  @push('scripts')
    <script>
      $('#removeImageButton_2').click(function() {
        document.getElementById('file_input').value='';
        
        $('#div_image_model2').hide();
      
      
      
      });
      document.getElementById('file_input').addEventListener('change', function(event) {
        $('#div_image_model2').show();
        var file = event.target.files[0];
        var reader = new FileReader();
        
        reader.onload = function(e) {
            var img = document.getElementById('editImage2');
            img.src = e.target.result;
            
            
        }
        
        reader.readAsDataURL(file);
      });
      $('#postComments').on('hidden.bs.modal', function (e) {
        $('#editDescription').val('');
        $('#all_comments').empty();
        
      });
      $('#editModal').on('hidden.bs.modal', function (e) {
        $('#commentDescription').val('');
        $('#editImage').attr('src', '');
        $('#file_input_model').val('');
        $('#div_image_model').css('display', 'none');
      });
      $('#file_input_model').change(function() {
          // Get the selected file
          var file = $(this)[0].files[0];

          // Create a FileReader object
          var reader = new FileReader();
          $('#div_image_model').css('display', 'block');
          // Set the callback function when file is loaded
          reader.onload = function(e) {
              // Update the src attribute of the image with the loaded file data
              $('#editImage').attr('src', e.target.result);
          };

          // Read the file as Data URL
          reader.readAsDataURL(file);
      });
      document.addEventListener('click', function(event) {
          if (event.target.closest('.dd_click')) {
              return; // Don't hide the post settings lists
          }
          var postSettingsLists = document.querySelectorAll('.postSettingsList');
          
          postSettingsLists.forEach(function(postSettingsList) {
           
              if (!postSettingsList.contains(event.target)) {
                  postSettingsList.style.display = 'none';
              }
          });
          var postSettingsLists2 = document.querySelectorAll('.postSettingsList_comment2');
          
          postSettingsLists2.forEach(function(postSettingsList) {
            
              if (!postSettingsList.contains(event.target)) {
                  postSettingsList.style.display = 'none';
              }
          });
          var postSettingsLists3 = document.querySelectorAll('.postSettingsList_comment3');
          
          postSettingsLists3.forEach(function(postSettingsList) {
           
              if (!postSettingsList.contains(event.target)) {
                  postSettingsList.style.display = 'none';
              }
          });
      });
      function open_list(event) {
        let parent = event.target.parentNode;
        let up_parent = event.target.parentNode.parentNode;
        let id = up_parent.dataset.id;
        let list = parent.querySelector('ul');
        var postSettingsLists = document.querySelectorAll('.postSettingsList');
        
        postSettingsLists.forEach(function (postSettingsList) {
         // console.log(postSettingsList);
            let postSettingsList_parent = postSettingsList.parentNode.parentNode;
            let postSettingsList_id = postSettingsList_parent.dataset.id;
           // console.log(id,postSettingsList_id);
            if (!postSettingsList_parent.contains(event.target) && id != postSettingsList_id) {
              
                postSettingsList.style.display = 'none';
            }
        });

        if (list.style.display === 'none') {
            list.style.display = 'block';
        } else {
            list.style.display = 'none';
        }
      }
      
      function addPost() {
        var content = document.getElementById('content').value;
        var fileInput = document.getElementById('file_input');
        if(content==''){
          alert('Please write your post');
        }else{
          var formData = new FormData();
        
        formData.append('post', content);
        formData.append('image', fileInput.files[0]);

        fetch('/admin-dashboard/create_post', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include the CSRF token in the request headers
          },
          body: formData
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          // Handle the response data as needed
          console.log(data.data);
          // For example, you could display a success message
          alert('Post created successfully');
          // Clear the form
          document.getElementById('content').value = '';
          fileInput.value = '';
          $('#create_post').after(` <div style="margin: 0px 20px 20px 20px;"data-id="${data.data.id}">
                <div style="margin-bottom: 10px;">
                  <img src="{{ asset('logos/user_logo.png') }}" class="img-circle elevation-2" alt="User Image"style="height: 2rem;width: 2rem;">
                  <label style="margin-left: 10px;">${data.data.user.first_name} ${data.data.user.last_name}</label>
                  <label class="dd_click" onclick="open_list(event)" style="float: right; cursor: pointer;font-size: 1.5rem;">&#8230;</label>
                  <!-- Post settings list -->
                  
                  <ul class="postSettingsList" style="display:none; list-style-type: none; margin: 0; padding: 0; background-color:#343a40;width: 100px;
                    position: absolute;     border-radius: 5px;margin-left:92%;">
                    
                      <li class="setting_post"   onclick="openEditModal(${data.data.id })"><span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span> Edit</li>
                    
                      <li class="setting_post" data-id="${data.data.id }" onclick="deletePost(event)"><span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span> Delete</li>
                </ul>
                </div>
                <div id="div_postContent_id_${data.data.id }"style="background-color:#eef0f0;margin-left:3%; border-radius:5px;">
                    <p id="post_desc_${data.data.id }"style="margin-left:5px;">${data.data.description}</p>
                    ${data.data.image ? `<div style="text-align: center;"><img id="post_image_${data.data.id}" src="${data.data.image}" style="width:90%;"></div>` : ''}
                  
                </div>
                <div>
                  
                  <label onclick="openCommentsModal(this)" data-id="${data.data.id}" class="comments_count" style="float:right;">0 comments</label>
                </div>
              </div>`);
              $('#div_image_model2').hide();
        })
        .catch(error => {
        
          // Handle any errors that occurred during the fetch
          console.error('Error:', error);
          alert('An error occurred while creating the post');
        });
        }
        
      }

      function deletePost(event){
        let id=event.target.dataset.id;
        $.ajax({
                        type: 'GET',
                        url: '{{ route('delete_post') }}',
                        data: { id: id },
                        success: function(response) {
                          let up_parent=event.target.parentNode.parentNode.parentNode;
                         
                          up_parent.remove();
                          
                          
                        }
                    });
      }

      function deleteComment(event){
        let id=event.target.dataset.id;
        $.ajax({
                        type: 'GET',
                        url: '{{ route('delete_comment') }}',
                        data: { id: id },
                        success: function(response) {
                          let up_parent=event.target.parentNode.parentNode.parentNode.parentNode;
                         
                          up_parent.remove();
                          
                          
                        }
                    });
      }

      function deleteReplay(event){
        let id=event.target.dataset.id;
        $.ajax({
                        type: 'GET',
                        url: '{{ route('delete_replay') }}',
                        data: { id: id },
                        success: function(response) {
                          let up_parent=event.target.parentNode.parentNode.parentNode;
                         
                          up_parent.remove();
                          
                          
                        }
                    });
      }

      function openEditModal(postId) {
        let x=true;
      
        $('#editModal').modal('show');
        $('#editDescription').val($('#post_desc_' + postId).text());
        let image=document.getElementById('post_image_'+postId);
        
        if(image!=null){
          
          document.getElementById('div_image_model').style.display='block';
          
          document.getElementById('editImage').setAttribute('src', image.getAttribute('src'));
        }else{
          
          document.getElementById('div_image_model').style.display='none'
        }
        $('#removeImageButton').click(function() {
          document.getElementById('file_input_model').value='';
          x=false;
          $('#div_image_model').hide();
        
        
        });
        //$('#div_image_model').show();
        $('#editForm').submit(function(event) {
            event.preventDefault();

            // Perform AJAX request to update the post
            // $.ajax({
            //     type: 'POST',
            //     url: '{{ route('update_post') }}',
            //     data: {
            //         _token: '{{ csrf_token() }}',
            //         id: postId,
            //         post: $('#editDescription').val(),
            //         image: document.getElementById('file_input_model').files[0],
            //         key:x
            //     },
            //     success: function(response) {
            //         // Close the modal
            //         $('#editModal').modal('hide');
            //         // Optionally, update the post content on the page
            //     }
            // });
            var content = document.getElementById('editDescription').value;
            var fileInput = document.getElementById('file_input_model');
            if(content==''){
              alert('Please write your post');
            }else{
              var formData = new FormData();
            
            formData.append('post', content);
            formData.append('image', fileInput.files[0]);
            formData.append('key', x);
            formData.append('id', postId);

            fetch('/admin-dashboard/update_post', {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include the CSRF token in the request headers
              },
              body: formData
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              
              return response.json();
            })
            .then(data => {
          // Handle the response data as needed
          
          
          // For example, you could display a success message
          //alert('Post updated successfully');
          // Clear the form
            document.getElementById('editDescription').value = '';
            fileInput.value = '';
            $('#editModal').modal('hide');
            if(data.data.image==null){
              $('#post_image_'+postId).remove();
            }else{
              let img=document.getElementById('post_image_'+postId);
              if(img){
                img.setAttribute('src', data.data.image);
              }else{
                
                document.getElementById('div_postContent_id_' + postId).innerHTML += `<img id="post_image_${postId}" src="${data.data.image}" style="height: 700px; width: 100%;">`;
              }
              
            }
            $('#post_desc_' + postId).html(data.data.description);
        })
        .catch(error => {
        
          // Handle any errors that occurred during the fetch
          console.error('Error:', error);
          alert('An error occurred while creating the post');
        });
        }
        });
      }

      function open_comment_list(event) {
        let parent = event.target.parentNode.parentNode;
        let up_parent = event.target.parentNode.parentNode.parentNode;
        let id = up_parent.dataset.id;
        let list = parent.querySelector('ul');
        var postSettingsLists = document.querySelectorAll('.postSettingsList_comment2');

        postSettingsLists.forEach(function (postSettingsList) {
            let postSettingsList_parent = postSettingsList.parentNode.parentNode;
            let postSettingsList_id = postSettingsList_parent.dataset.id;
          
            if (!postSettingsList_parent.contains(event.target) && id != postSettingsList_id) {
                postSettingsList.style.display = 'none';
            }
        });

        if (list.style.display === 'none') {
            list.style.display = 'block';
        } else {
            list.style.display = 'none';
        }
      }

      function open_replay_list(event) {
        let parent = event.target.parentNode.parentNode;
        let up_parent = event.target.parentNode.parentNode.parentNode;
        let id = up_parent.dataset.id;
        let list = parent.querySelector('ul');
        var postSettingsLists = document.querySelectorAll('.postSettingsList_comment3');

        postSettingsLists.forEach(function (postSettingsList) {
            let postSettingsList_parent = postSettingsList.parentNode.parentNode;
            let postSettingsList_id = postSettingsList_parent.dataset.id;
          
            if (!postSettingsList_parent.contains(event.target) && id != postSettingsList_id) {
                postSettingsList.style.display = 'none';
            }
        });

        if (list.style.display === 'none') {
            list.style.display = 'block';
        } else {
            list.style.display = 'none';
        }
      }

      function openCommentsModal(element) {
        let post_id= element.dataset.id;
        $.ajax({
            url: 'admin-dashboard/post_comments/'+post_id, // Replace with the actual API endpoint URL
            method: 'GET',
            success: function(response) {
                    // Handle the response
                    //console.log(response);
                    var comments = response.data; 
                    // Assuming the response is an object with a 'posts' property
                    element.innerHTML=comments.length + ' comments';
                    // Append the posts to the specified div
                    $('#postComments').modal('show');
                    var postContainer = $('#all_comments');
                    comments.forEach(function(comment) {
                      postContainer.append(`<div style="margin-bottom:1%;">
                          <div style="display:flex;width:100%" data-id="${comment.id }">
                            <div style="width:4%;">
                              <img src="{{ asset('logos/user_logo.png') }}" class="img-circle elevation-2" alt="User Image"style="height: 2rem;width: 2rem;">
                            </div>
                            <div style="background-color: #eef0f0;width:95%;border-radius:10px;">
                              <p style="margin-left: 10px;"><b>${comment.user.first_name} ${comment.user.last_name}</b> 
                                <label class="dd_click" onclick="open_comment_list(event)" style="float: right; cursor: pointer;font-size: 1.5rem;margin: -10px 5px 0px 0px;">&#8230;</label>
                              </p>
                              <ul class="postSettingsList_comment2" style="display:none; list-style-type: none; margin-top: -1.5%; padding: 0; background-color:#343a40;width: 100px;
                                  position: absolute;     border-radius: 5px;margin-left:84%;">
                                  
                                    
                                    ${comment.auth_user_id== comment.user.id? `<li class="setting_post"  onclick="openEditCommentModal(${comment.id })" ><span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span> Edit</li>` : ''}
                                    <li class="setting_post" data-id="${comment.id }" onclick="deleteComment(event)"><span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span> Delete</li>
                              </ul>
                              <p id="comment_desc_${comment.id}" style="margin-left: 10px;">${comment.description}</p>
                            </div>
                          </div>
                          
                          <label style="float: right; margin-right:1%;" onclick="showReplies(this,'${comment.id}','${comment.replies_count}')">${comment.replies_count} replies</label>
                          <div style="display:none;width:100%;margin-bottom:2%;" data-id="${comment.id }" id="div_replies_${comment.id}">
                            <div style="width:4%;">

                            </div>
                            <div style="width:96%;">
                              ${comment.replayes.map(function(replay) {
                                    return `<div style="display:flex; margin-bottom:1%" data-id="${replay.id }">
                                        <div style="width:4%;">
                                            <img src="{{ asset('logos/user_logo.png') }}" class="img-circle elevation-2" alt="User Image"style="height: 2rem;width: 2rem;">
                                        </div>
                                        <div style="background-color: #eef0f0;width:95%;border-radius:10px;">
                                            <p style="margin-left: 10px;"><b>${replay.user.first_name} ${replay.user.last_name}</b> 
                                                <label class="dd_click" onclick="open_replay_list(event)" style="float: right; cursor: pointer;font-size: 1.5rem;margin: -10px 5px 0px 0px;">&#8230;</label>
                                            </p>
                                            <ul class="postSettingsList_comment3" style="display:none; list-style-type: none; margin-top: -1.5%; padding: 0; background-color:#343a40;width: 100px;
                                                position: absolute;     border-radius: 5px;margin-left:84%;">
                                                ${comment.auth_user_id == replay.user.id ? `<li class="setting_post"  onclick="openEditReplayModal(${replay.id})" ><span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span> Edit</li>` : ''}
                                                <li class="setting_post" data-id="${replay.id}" onclick="deleteReplay(event)"><span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span> Delete</li>
                                            </ul>
                                            <p id="replay_desc_${replay.id}" style="margin-left: 10px;">${replay.description}</p>
                                        </div>
                                    </div>`;
                                }).join('')
                              }
                              <div class="modal-body">
                                <form id="create_replay"style="display:inline-flex;width:100%">
                                  
                                  <div class="form-group" style="width:95%;margin-bottom:0px;">
                                      
                                      <textarea class="form-control" id="replayDescription" name="description"style="height: 2.5rem;"placeholder="Write your replay"></textarea>
                                      
                                      
                                  </div>
                                  <button type="button" onclick="addReplay(this,'${comment.id }')" class="btn btn-primary"><img src="{{ asset('logos/arro.webp') }}" class="img-circle elevation-2" alt="User Image"
                                    style="height: 1.4rem;
                                    width: 2rem;">
                                  </button>
                                </form>
                              </div>
                            </div>
                            
                          </div>
                          

                        </div>`);
                    });
                    
                    document.getElementById('post_id').value = post_id;
                    //console.log(post_id,document.getElementById('post_id').value);
                    
            },
            error: function(xhr, status, error) {
              // Handle the error
              console.error(error);
            }
          });
        

      }
      function showReplies(event,id,replies_count){
        
          event.style.display='none';
          document.getElementById('div_replies_'+id).style.display='flex';
          document.getElementById('div_replies_'+id).style.marginTop='1%';
        
        
      }

      function addReplay(event,commentID){
        
        var parent1=event.parentNode.parentNode;
        var content = parent1.querySelector('#replayDescription').value;
        if(content==''){
          alert('Please write your comment');
        }else{
          var formData = new FormData();
        
          formData.append('replay', content);
          formData.append('comment_id', commentID);
          
          

          fetch('/admin-dashboard/create_replay', {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include the CSRF token in the request headers
            },
            body: formData
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            
            return response.json();
          })
          .then(data => {
            // Handle the response data as needed
            
            
            // For example, you could display a success message
            //alert('Post updated successfully');
            // Clear the form
            parent1.querySelector('#replayDescription').value = '';
            parent1.insertAdjacentHTML('beforebegin',`<div style="display:flex; margin-bottom:1%" data-id="${data.data.id }">
                                        <div style="width:4%;">
                                            <img src="{{ asset('logos/user_logo.png') }}" class="img-circle elevation-2" alt="User Image"style="height: 2rem;width: 2rem;">
                                        </div>
                                        <div style="background-color: #eef0f0;width:95%;border-radius:10px;">
                                            <p style="margin-left: 10px;"><b>${data.data.user.first_name} ${data.data.user.last_name}</b> 
                                                <label class="dd_click" onclick="open_comment_list(event)" style="float: right; cursor: pointer;font-size: 1.5rem;margin: -10px 5px 0px 0px;">&#8230;</label>
                                            </p>
                                            <ul class="postSettingsList_comment3" style="display:none; list-style-type: none; margin-top: -1.5%; padding: 0; background-color:#343a40;width: 100px;
                                                position: absolute;     border-radius: 5px;margin-left:84%;">
                                                <li class="setting_post"  onclick="openEditReplayModal(${data.data.id})" ><span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span> Edit</li>
                                                <li class="setting_post" data-id="${data.data.id}" onclick="deleteReplay(event)"><span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span> Delete</li>
                                            </ul>
                                            <p id="replay_desc_${data.data.id}" style="margin-left: 10px;">${data.data.description}</p>
                                        </div>
                                    </div>` );
            
          })
          .catch(error => {
          
            // Handle any errors that occurred during the fetch
            console.error('Error:', error);
            alert('An error occurred while creating the replay');
          });
        }
      }
      function addComment() {
        var content = document.getElementById('commentDescription').value;
        var post_id = document.getElementById('post_id').value
        if(content==''){
          alert('Please write your comment');
        }else{
          var formData = new FormData();
        
          formData.append('comment', content);
          formData.append('post_id', post_id);
          
          

          fetch('/admin-dashboard/create_comment', {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include the CSRF token in the request headers
            },
            body: formData
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            
            return response.json();
          })
          .then(data => {
            // Handle the response data as needed
            
            
            // For example, you could display a success message
            //alert('Post updated successfully');
            // Clear the form
            document.getElementById('commentDescription').value = '';
            var postContainer = $('#all_comments');
            postContainer.append(`<div style="margin-bottom:1%;">
                <div style="display:flex;width:100%" data-id="${data.data.id }">
                  <div style="width:4%;">
                    <img src="{{ asset('logos/user_logo.png') }}" class="img-circle elevation-2" alt="User Image"style="height: 2rem;width: 2rem;">
                  </div>
                  <div style="background-color: #eef0f0;width:95%;border-radius:10px;">
                    
                    <p style="margin-left: 10px;"><b>${data.data.user.first_name} ${data.data.user.last_name}</b> 
                                <label class="dd_click" onclick="open_comment_list(event)" style="float: right; cursor: pointer;font-size: 1.5rem;margin: -10px 5px 0px 0px;">&#8230;</label>
                              </p>
                              <ul class="postSettingsList_comment2" style="display:none; list-style-type: none; margin-top: -1.5%; padding: 0; background-color:#343a40;width: 100px;
                                  position: absolute;     border-radius: 5px;margin-left:84%;">
                                  
                                    <li class="setting_post" onclick="openEditCommentModal(${data.data.id })"  ><span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span> Edit</li>
                                  
                                    <li class="setting_post" data-id="${data.data.id }" onclick="deleteComment(event)" ><span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span> Delete</li>
                              </ul>
                    <p id="comment_desc_${data.data.id}" style="margin-left: 10px;">${data.data.description}</p>
                  </div>
                </div>
                
                <label style="float: right; margin-right:1%;" onclick="showReplies(this,'${data.data.id}','${data.data.replies_count}')">0 replies</label>
                <div style="display:none;width:100%;margin-bottom:2%;" data-id="${data.data.id }" id="div_replies_${data.data.id}">
                            <div style="width:4%;">

                            </div>
                            <div style="width:96%;">
                              <div class="modal-body">
                                <form id="create_replay"style="display:inline-flex;width:100%">
                                  
                                  <div class="form-group" style="width:95%;margin-bottom:0px;">
                                      
                                      <textarea class="form-control" id="replayDescription" name="description"style="height: 2.5rem;"placeholder="Write your replay"></textarea>
                                      
                                      
                                  </div>
                                  <button type="button" onclick="addReplay(this,'${data.data.id }')" class="btn btn-primary"><img src="{{ asset('logos/arro.webp') }}" class="img-circle elevation-2" alt="User Image"
                                    style="height: 1.4rem;
                                    width: 2rem;">
                                  </button>
                                </form>
                              </div>
                            </div>
                            
                          </div>

              </div>`);
          })
          .catch(error => {
          
            // Handle any errors that occurred during the fetch
            console.error('Error:', error);
            alert('An error occurred while creating the comment');
          });
        }
        
      }

      function openEditCommentModal(commentId) {
 
        $('#editCommentModal').modal('show');
        $('#editCommentDescription').val($('#comment_desc_' + commentId).text());
        document.getElementById('comment_id').value = commentId;
         
      }
      function openEditReplayModal(replayId){
        $('#editReplayModal').modal('show');
        $('#editReplayDescription').val($('#replay_desc_' + replayId).text());
        document.getElementById('replay_id').value = replayId;
      }
      function updateComment(){
        var content = document.getElementById('editCommentDescription').value;
        var commentId =  document.getElementById('comment_id').value
            if(content==''){
              alert('Please write your comment');
            }else{
              var formData = new FormData();
            
            formData.append('comment', content);
            
            formData.append('id', commentId);

            fetch('/admin-dashboard/update_comment', {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include the CSRF token in the request headers
              },
              body: formData
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              
              return response.json();
            })
            .then(data => {
          
            document.getElementById('editCommentDescription').value = '';
            
            $('#editCommentModal').modal('hide');
            
            $('#comment_desc_' + commentId).html(data.data.description);
          })
          .catch(error => {
          
            // Handle any errors that occurred during the fetch
            console.error('Error:', error);
            alert('An error occurred while creating the comment');
          });
          }
      }
      function updateReplay(){
        var content = document.getElementById('editReplayDescription').value;
        var replayId =  document.getElementById('replay_id').value
            if(content==''){
              alert('Please write your replay');
            }else{
              var formData = new FormData();
            
            formData.append('replay', content);
            
            formData.append('id', replayId);

            fetch('/admin-dashboard/update_replay', {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include the CSRF token in the request headers
              },
              body: formData
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              
              return response.json();
            })
            .then(data => {
          
            document.getElementById('editReplayDescription').value = '';
            
            $('#editReplayModal').modal('hide');
            
            $('#replay_desc_' + replayId).html(data.data.description);
          })
          .catch(error => {
          
            // Handle any errors that occurred during the fetch
            console.error('Error:', error);
            alert('An error occurred while creating the replay');
          });
          }
      }
      
      setInterval(function() {
        $.ajax({
            url: 'admin-dashboard/unseen_posts', // Replace with the actual API endpoint URL
            method: 'GET',
            success: function(response) {
              // Handle the response
              //console.log(response);
              var posts = response.data; // Assuming the response is an object with a 'posts' property

              // Append the posts to the specified div
              var postContainer = $('#postContainer');
              posts.forEach(function(post) {
                postContainer.append(` <div style="margin: 0px 20px 20px 20px;"data-id="${post.id}">
                <div style="margin-bottom: 10px;">
                  <img src="{{ asset('logos/user_logo.png') }}" class="img-circle elevation-2" alt="User Image"style="height: 2rem;width: 2rem;">
                  <label style="margin-left: 10px;">${post.user.first_name} ${post.user.last_name}</label>
                  <label class="dd_click" onclick="open_list(event)" style="float: right; cursor: pointer;font-size: 1.5rem;">&#8230;</label>
                  <!-- Post settings list -->
                  
                  <ul class="postSettingsList" style="display:none; list-style-type: none; margin: 0; padding: 0; background-color:#343a40;width: 100px;
                    position: absolute;     border-radius: 5px;margin-left:92%;">
                    
                      
                    
                      <li class="setting_post" data-id="${post.id }" onclick="deletePost(event)"><span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span> Delete</li>
                </ul>
                </div>
                <div id="div_postContent_id_${post.id }"style="background-color:#eef0f0;margin-left:3%; border-radius:5px;">
                    <p id="post_desc_${post.id }"style="margin-left:5px;">${post.description}</p>
                    ${post.image ? `<div style="text-align: center;"><img id="post_image_${post.id}" src="${post.image}" style="width:90%;"></div>` : ''}
                  
                </div>
                <div>
                  
                  <label onclick="openCommentsModal(this)" data-id="${post.id}" class="comments_count" style="float:right;">${post.comments_count} comments</label>
                </div>
              </div>`);
                // Modify the above line based on the structure of your posts
              });
            },
            error: function(xhr, status, error) {
              // Handle the error
              console.error(error);
            }
          });

      }, 8000);

    </script>
  @endpush
