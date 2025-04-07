<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>منـــذر الزنايــــدي</title>
    <link rel="icon" type="image/x-icon" href="{{asset('monzer_website/assets/imgs/logo.png')}}" style="transform: scale(1.2);">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .counter-container {
            text-align: center;
            background-color:transparent;
            padding:5px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            align-items: center;
        }
        .buttons h3{
            font-size: 22px;
            font-weight: 500;
            color: #121212;
        }

        .buttons button {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            font-size:20px;
            cursor: pointer;
            border: none;
        }

        #incrementBtn {
            background-color: #007bff;
            color: #fff;
        }

        #incrementBtn:hover {
            background-color: #0056b3;
        }

        #decrementBtn {
            background-color: #007bff;
            color: #fff;
        }

        #decrementBtn:hover {
            background-color: #0056b3;
        }
    </style>
    <style>
        .popup {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(
                0,
                0,
                0,
                0.4
            );
            display: none;
        }
        .popup-content {
            background-color: white;
            margin: 10% auto;
            padding: 1%;
            border: 1px solid #888888;
            width: 30%;
            font-weight: bolder;
        }
        .popup-content button {
            display: block;
            margin: 0 auto;
        }
        .show {
            display: block;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav id="navbar" class="nav-ar">
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
            <a href="{{url('/')}}"><img alt="" loading="lazy" src="{{asset('website/assets/imgs/logo.png')}}" /></a>
        </div>
        <div class="nav-items">
            <li class="active"><a href="#">الرئيسية</a></li>
            <li><a class="n-item-4" href="#contact">التواصل</a></li>

        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
    </nav>
    <div class="welcome">
        <div class="wel-right">
            <h1>مرحـــباً بكـــم في الموقـــع<br /> الرسمي لمرشـح الرئاســة
                <br />منـــذر الزنايــــدي
            </h1>
            <p>محمد المنذر بن عبدالعزيز الزنايدي سياسي تونسي تولى مناصب وزارية دون انقطاع بين 1994 و2011.</p>
            <a href="#contact">
                <button type="button" style="margin-bottom:10px;">تواصـــل معــنا</button>
            </a>
            <a href="{{asset('/website/assets/sheet.pdf')}}" download title="Download Sheet">
                <button type="button">نموزج التزكية <i class="bi bi-download"></i></button>
            </a>

        </div>
        <div class="wel-img">
            <img src="{{asset('website/assets/imgs/img1.png')}}" />
        </div>
        <div class="abs"></div>
    </div>
    <div class="content">
        <div class="sec-6 contact" id="contact">
            <div class="sec6-content">
                <div class="form" >
                    <form id="contact-form-container">
                        <h5>تواصــل معــنا</h5>
                        <p>نريــد مســاعدتك تواصــل معـنا الآن</p>
                        <div class="form-inputs" style="display: block;margin-bottom: 20px;">
                            <input id="name" placeholder="الاسم" type="text" style="margin-bottom: 0px;"/>
                            <span id="name-error" class="error-message"></span>
                        </div>
                        <div class="form-inputs" style="display: block;margin-bottom: 20px;">
                            <input id="place" placeholder="المنطقة" type="text" style="margin-bottom: 0px;"/>
                            <span id="place-error" class="error-message"></span>
                        </div>
                        <div class="form-inputs" style="display: block;margin-bottom: 20px;">
                            <input id="state" placeholder="الولاية" type="text" style="margin-bottom: 0px;"/>
                            <span id="state-error" class="error-message"></span>
                        </div>
                        <div class="form-inputs" style="display: block;margin-bottom: 20px;">
                            <input id="area" placeholder="المعتمدية" type="text" style="margin-bottom: 0px;"/>
                            <span id="area-error" class="error-message"></span>
                        </div>
                        <div class="form-inputs" style="display: block;margin-bottom: 20px;">
                            <input id="phone" placeholder="رقـم الهاتف" type="number" style="margin-bottom: 0px;"/>
                            <span id="phone-error" class="error-message"></span>
                        </div>
                        <div class="form-inputs count" style="display: block;margin-bottom: 20px;">
                            <input id="models-number" placeholder="عدد النماذج (التزكيات) التي تم جمعها" type="number" style="margin-bottom: 0px;" />
                            <div class="counter">
                                <div class="counter-container">
                                    <div class="buttons">
                                        <button type="button" id="incrementBtn">+</button>
                                        <h3 id="counter">0</h3>
                                        <button type="button" id="decrementBtn">-</button>
                                    </div>
                                </div>
                            </div>
                            <span id="models-number-error" class="error-message"></span>
                        </div>

                        <a><button>إرســــــــــال</button></a>
                    </form>
                </div>
                <div id="map" class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10719061.68683256!2d5.741965652196076!3d33.88691781452308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb01bf81e691%3A0xe1d4e8993b274a0!2sTunisia!5e0!3m2!1sen!2stn!4v1680058413310!5m2!1sen!2stn"
                        width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    <br />
                    <small>
                        <a
                            href="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d907.599901678322!2d54.3752128!3d24.5062513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e66f6caee33ab%3A0x369d0fdb4e3a8571!2sZEE+Group+for+Management+of+Companies!5e0!3m2!1sen!2sae!4v1530600046123"></a>
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div id="myPopup" class="popup">
        <div class="popup-content" style="text-align: center;">
            <h1 style="color: green">
                شكرا لمشاركتكم
            </h1>
            
            
        </div>
    </div>
    <div class="footer">
        <div class="links">
            <a href="#">اتصل بنا</a>
            <a href="#">خريطة الموقع</a>
            <a href="#">شروط و أحكام</a>
        </div>
        <div class="social">
            <a><img src="{{asset('website/assets/imgs/x.png')}}" /></a>
            <a><img src="{{asset('website/assets/imgs/facebook.png')}}" /></a>
        </div>
    </div>


    <script src="{{asset('website/js/index.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="{{asset('website/js/stylish-portfolio.min.js')}}"></script>
    <script>
        $(document).ready(function() {
           $('#contact-form-container').on('submit', function(event) {
              event.preventDefault(); // Prevent default form submission
     
              var isValid = validateForm();
                if (!isValid) {
                    return; // If validation fails, do not proceed
                }
              // Get form data
              var csrfToken = $('meta[name="csrf-token"]').attr('content');
              var formData = {
                 _token: csrfToken,
                 name: $('#name').val(),
                 state: $('#state').val(),
                 area: $('#area').val(),
                 phone: $('#phone').val(),
                 city: $('#place').val(),
                 models_num:$('#models-number').val()
              };
     
              // Submit form data via AJAX
              $.ajax({
                 url: '/contact-us', // Replace with your actual controller route
                 type: 'POST',
                 data: formData,
                 success: function(response) {
                   
                    let myPopup = $('#myPopup');
                    myPopup.addClass("show");
                    $('#contact-form-container')[0].reset();
                    let counterElement = document.getElementById("counter");
                    counterElement.textContent = 0;
                    setTimeout(function() {
                           
                                myPopup.removeClass("show"); // Remove the popup after 3 seconds
                            
                        }, 3500); 
                 },
                 error: function(xhr, status, error) {
                    // Handle the error response here
                    console.error(error);
                 }
              });
           });

            // Set the duration for the popup to disappear (in milliseconds)
            function validateForm() {
                var isValid = true;

                // Clear previous error messages
                $('.error-message').text('');

                // Check if first name is empty
                if ($('#name').val().trim() === '') {
                    isValid = false;
                    $('#name-error').text('الاسم مطلوب.');
                    $('#name').css('border-color', 'red');
                } else {
                    $('#name').css('border-color', '');
                }

                // Check if last name is empty
                if ($('#state').val().trim() === '') {
                    isValid = false;
                    $('#state-error').text('الولاية مطلوبة.');
                    $('#state').css('border-color', 'red');
                } else {
                    $('#state').css('border-color', '');
                }

                // Check if email is valid
                

                // Check if phone is empty
                if ($('#phone').val().trim() === '') {
                    isValid = false;
                    $('#phone-error').text('رقم الهاتف مطلوب.');
                    $('#phone').css('border-color', 'red');
                } else {
                    $('#phone').css('border-color', '');
                }

                // Check if message is empty
                if ($('#area').val().trim() === '') {
                    isValid = false;
                    $('#area-error').text('المعتمدية مطلوبة.');
                    $('#area').css('border-color', 'red');
                } else {
                    $('#area').css('border-color', '');
                }

                if ($('#place').val().trim() === '') {
                    isValid = false;
                    $('#place-error').text('المنطقة مطلوبة.');
                    $('#place').css('border-color', 'red');
                } else {
                    $('#place').css('border-color', '');
                }

                if ($('#models-number').val().trim() === '' || $('#models-number').val().trim() == 0) {
                    isValid = false;
                    $('#models-number-error').text('عدد التزكيات مطلوب.');
                    $('#models-number').css('border-color', 'red');
                } else {
                    $('#models-number').css('border-color', '');
                }

                return isValid;
            }
        
            
        });
        
    </script>
</body>

</html>