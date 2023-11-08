@extends('school.master')
@section('title')
<title>RG School Bus Messages List</title>
@stop
@section('content')
<div class="dash_tab_2 dash_tab_5">
  <div class="row align-items-center">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <div class="parent">
        <h4>Group Messages</h4>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    </div>
  </div>
  <hr>
  <div class="row">


    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
      <div class="chat_left_tabs">
        <div class="fill_div">
          <input type="text" placeholder="Search" id="search_text">
          <button type="button" id="search_user"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">





        </ul>
      </div>
    </div>



    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
      <div class="chat_right_tabs">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home_chat" role="tabpanel" aria-labelledby="home-tab_chat">
            <div class="textarea_main">
              <div class="chat_right_main">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 id="user_detail"> </h3>
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="chat_messages">



                </div>
              </div>
            </div>
            <div class="row">
              <div class="chat_input">
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 centerCol">
                  <div class="form-group">
                    <input type="text" id="message" placeholder="Your message here...!">
                    <button id="send_message"><i class="fas fa-paper-plane"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>


<!-- Button trigger modal -->
@stop

@section('footer-script')
<script src="https://cdn.socket.io/4.4.1/socket.io.min.js" integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    var group_id;
    var inboxes ;
    var user_id = "{{auth()->id()}}"

    var protocol = window.location.protocol;
    
    base_path = "{{url('/')}}";
    local_image = "{{asset('assets/images/abc.png')}}";

    user_image = "{{asset('assets/images/tb_1.png')}}"

    const socket = io.connect(protocol == "http:" ?"http://localhost:3000":"https://server1.appsstaging.com:3001");
    
    socket.on("connect", () => {
      console.log(socket.connected); // true
    });

    socket.on("error", (error_messages) => {
      not('Something went wrong', 'error');
    });



    socket.on("disconnect", () => {
      console.log(socket.connected); // false
    });


    // send_message
    socket.on("response", (messages) => {

      // append single msg for chat
      if (messages.object_type == "get_message") {
        $("#chat_messages").append(generateChat([messages.data]));
        $("#message").val('');
      } else if (messages.object_type == "get_messages") {
        // all chat append
        $("#chat_messages").html(generateChat(messages.data));
      }

    });


    function generateChat(chatData) {
      return chatData.map(chat => {
        image_url = `${chat.avatar?base_path+chat.avatar:user_image}`;

        return `<div class="chat_1  ${chat.chat_sender_id == user_id ? 'chat_2' : ''}">
            <img src="${image_url}" style="width: 50px; height: auto;" class="img-fluid" alt="">

              <h4>${chat.first_name} ${chat.last_name}</h4>
              <p>${chat.chat_message}</p>
              <div class="clearfix"></div>
              <span>${getTimeDifference(chat.created_at)}</span>
          </div>
      `
      }).join('');
    }

    // Function to calculate time difference
    function getTimeDifference(mysqlDatetime) {
      const now = new Date();
      const dateTime = new Date(mysqlDatetime);
      const timeDifference = now - dateTime;

      const seconds = Math.floor(timeDifference / 1000);
      if (seconds < 60) {
        return `${seconds} sec ago`;
      }

      const minutes = Math.floor(timeDifference / (1000 * 60));
      if (minutes < 60) {
        return `${minutes} min ago`;
      }

      const hours = Math.floor(timeDifference / (1000 * 60 * 60));
      if (hours < 24) {
        return `${hours} hours ago`;
      }

      const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
      return `${days} days ago`;
    }


    function generateInboxList(inboxArray) {
      if (inboxArray.length === 0) {
        return '<p>Your inbox is empty.</p>';
      }

      let html = '';

      inboxArray.forEach((message, index) => {
        let isActive = index === 0 ? 'active' : '';
        let time = message?.time_ago;
        let groupName = message?.name;
        let messagePreview = message?.message;
        let imageSrc = message?.image;

        image_url = `${message.image?base_path+message.image:local_image}`;

        var messagePreviewLimit = 25;
        if (messagePreview?.length > messagePreviewLimit) {
          messagePreview = messagePreview.substring(0, messagePreviewLimit) + '...';
        }

        html += `<li class="inbox-item ${isActive}" id="user" data-name=${groupName} data-image=${image_url} data-id=${message.id}>
                        <a href="#" class="nav-link" id="home-tab_chat" role="tab">
                            <span>${time??""}</span>
                            <img src="${image_url}" class="img-fluid" alt="${groupName}">
                            <h4>${groupName}</h4>
                            <p>${messagePreview??"No Message"}</p>
                        </a>
                    </li>`;
      });

      return html;
    }



    const filterItems = (needle, heystack) => {
			let query = needle.toLowerCase();
			return heystack.filter(item => item.name?.toLowerCase().indexOf(query) >= 0);
		}

		// $('#search').keyup(function(e) {
		
		// 	inboxes = filterItems(search, users);
		// 	$("#chat_inbox").html(generateChatInbox(inboxes));

		// 	if (e.keyCode == 8) {
		// 		// $('#inbox_html').html(generateChatInbox(filterItems(search, users)))
		// 	}
		// })


    $(document).on('click', '#user', function() {
      groupName = $(this).attr('data-name')
      image_url = $(this).attr('data-image')
      var html = '<img src="' + image_url + '" height="25" class="img-fluid" alt="">' + groupName;
      $("#user_detail").html(html);
      group_id = $(this).attr('data-id')
      socket.emit("group_get_messages", {
        "group_id": group_id,
        "sender_id": user_id
      })

    });

    $(document).on('click', '#search_user', function() {
      search = $('#search_text').val()
      new_inboxes = filterItems(search, inboxes);

      const inboxListHtml = generateInboxList(new_inboxes);
      $('#myTab').html(inboxListHtml);

    });
    

    $(document).on('click', '#send_message', function() {
      var message = $('#message').val()

      if (!message) {
        alert('Message can not be empty')
        return;
      }

      if (!group_id) {
        alert('Please Select')
        return;

      }


      socket.emit('group_send_message', {
        "group_id": group_id,
        "sender_id": user_id,
        "message": message
      });

    });

    $.ajax({
      url: "{{route('inbox')}}",
      type: 'GET',
      data: {},
      success: function(response) {
        // console.log(response.data,'d')
        inboxes = response.data;
        const inboxListHtml = generateInboxList(inboxes);
        $('#myTab').html(inboxListHtml);

      },
      error: function(jqXHR, textStatus, errorThrown) {
        swal("Error", "Something went wrong :)", "error");
      }
    });
  })
</script>
@stop