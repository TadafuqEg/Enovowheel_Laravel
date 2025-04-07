<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>منـــذر الزنايــــدي</title>
    <link rel="icon" type="image/x-icon" href="{{asset('new_website/assets/imgs/logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('new_website/css/style.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

<body dir="rtl">
    <nav id="navbar" class="nav-ar">
        <div class="flexxx">
            <div class="menu-icon">
                <span class="fas fa-bars"></span>
            </div>
            <div class="logo">
                <a href="{{url('/index2')}}"><img alt="" loading="lazy" src="{{asset('new_website/assets/imgs/logo.png')}}" /></a>
            </div>
            <div class="nav-items">
                <li class="active cc n-item-1"><a href="#">الرئيسية</a></li>
                <li><a class="" href="#about">عن المرشح</a></li>


            </div>
            <a class="nav-contact" href="#contact"><button>اتصــل بنــا</button></a>
            <div class="cancel-icon">
                <span class="fas fa-times"></span>
            </div>
        </div>
    </nav>

    <section id="home" class="home">
        <!--  -->
        <div class="home-content">
            <img loading="lazy" alt="" src="{{asset('new_website/assets/imgs/img1.png')}}" />
            <div class="join">
                
                <form id="contact-form2">
                    <h5>انضــم الينــا</h5>
                    <input type="text" placeholder="ادخل البريد الالكتروني" id="email" />
                    <span id="email-error" class="error-message"></span>
                    <a><button>انضــم إلينــا</button></a>
                </form>
            </div>
        </div>
    </section>
    <section id="services" class="sec-2">
        <div class="sec1-top">
            <div class="top-right">
                <h5>الطـــاقــم</h5>
                <p>موقع حملتنا للانتخابات التونيسية<br /> 2024</p>
            </div>
            <div class="top-left">
                <a href="#contact"><button>سجــل الآن</button></a>
            </div>
        </div>
        <div class="sec1-bottom" id="socials">
            <h5>تابعــونا</h5>
            <p>لكي لا تفوت أي من أخبارنا</p>
            <a href="">تابعــنا هنـــا</a>
            <div class="bottom-social">
                <a href="https://x.com/MondherZenaidi" target="_blank"><img loading="lazy"
                        src="{{asset('new_website/assets/imgs/x.png')}}" /></a>
                <a href="https://www.facebook.com/Mondher.Zenaidi1/?locale=ar_AR" target="_blank"><img loading="lazy"
                        src="{{asset('new_website/assets/imgs/facebook.png')}}" /></a>
            </div>
        </div>
    </section>
    <section class="sec-3">
        <div class="sec3-content">
            <h5>قيمـــنا</h5>
            <h4>إلتزاماتنـــا</h4>
            <p>إن ميثاق قيمنا هو نص تمت صياغته بالاشتراك مع جميع مؤسسي الحزب. فهو يُلزم كل عضو في عصر النهضة بـ 8 قيم
                أساسية
                لعائلتنا السياسية:</p>
            <div class="flex" id="imageContainer">
                <div class="fl">
                    <img loading="lazy" alt="التقــدم" src="{{asset('new_website/assets/imgs/img2.png')}}" />
                    <h5>التقــدم</h5>
                </div>
                <div class="fl">
                    <img loading="lazy" alt="المبــادرة الإقليميـة" src="{{asset('new_website/assets/imgs/img3.png')}}" />
                    <h5>المبــادرة الإقليميـة</h5>
                </div>
                <div class="fl">
                    <img loading="lazy" alt="النســوية" src="{{asset('new_website/assets/imgs/img4.png')}}" />
                    <h5>النســوية</h5>
                </div>
                <div class="fl hidden">
                    <img loading="lazy" alt="Image 5" src="{{asset('new_website/assets/imgs/img14.png')}}" />
                    <h5>تكــافؤ <br />الفــرص</h5>
                </div>
                <div class="fl hidden">
                    <img loading="lazy" alt="Image 6" src="{{asset('new_website/assets/imgs/img15.png')}}" />
                    <h5>سلطــة<br /> الدولــــة</h5>
                </div>
                <div class="fl hidden">
                    <img loading="lazy" alt="Image 7" src="{{asset('new_website/assets/imgs/img16.png')}}" />
                    <h5>العمــــل</h5>
                </div>
                <div class="fl hidden">
                    <img loading="lazy" alt="Image 8" src="{{asset('new_website/assets/imgs/img17.png')}}" />
                    <h5>الحريـــة</h5>
                </div>
                <div class="fl hidden">
                    <img loading="lazy" alt="Image 9" src="{{asset('new_website/assets/imgs/img18.png')}}" />
                    <h5>الجمهورية</h5>
                </div>
            </div>
            <button id="toggleButton">شــاهد المـــزيد</button>
        </div>
    </section>
    <section class="sec-4" id="about">
        <div class="sec-card">
            <h5>المنــــذر</h5>
            <h3>الزنــايـــدي</h3>
            <h4>المرشــح الرئاســي</h4>
            <p>ولد المنذر الزنايدي في مدينة تونس، وترجع أصول والده إلى سبيبة من ولاية القصرين في حين تنتمي والدته إلى
                عائلة البحري من العاصمة. درس في المدرسة الصادقية ثم زاول تعليمه العالي في المدرسة المركزية بباريس التي
                تخرج منها عام 1973 كما تحصل عام 1976 على شهادة من المدرسة القومية للإدارة في فرنسا.</p>

            <h2>المنذر الزنــايـــدي</h2>
        </div>
    </section>
    <section class="sec-5">
        <div class="sec-card">
            <h5>المنــــذر</h5>
            <h3>الزنــايـــدي</h3>
            <h4>المرشــح الرئاســي</h4>
            <p>وفي 1989 انتخب عضوا في مجلس النواب الذي تولى فيه منصب نائب الرئيس بين 1991 و1994. كلف في 30
                ماي 1994 بوزراة النقل ثم عين على التوالي وزيرا للتجارة في 13 جوان 1996 ثم وزيرا للسياحة والترفيه
                والصناعات التقليدية في 24 جانفي 2001 ووزيرا للسياحة والتجارة والصناعات التقليدية في 4 سبتمبر 2002 فوزيرا
                للتجارة في 22 مارس 2004 ثم وزيرا للتجارة والصناعات التقليدية في 17 أوت 2005. وفي 3 سبتمبر 2007 عين كوزير
                للصحة العمومية وبقي في المنصب حتى 14 جانفي 2011 تاريخ حل الحكومة.</p>

            <h2>المنذر الزنــايـــدي</h2>
        </div>
    </section>
    <section id="contact" class="sec-6">
        <div class="sec6-content">
            <div class="form">
                <form id="contact-form-container">
                    <h5>تواصــل معــنا</h5>
                    <p>نريــد مســاعدتك تواصــل معـنا الآن</p>
                    <div class="form-inputs" style="display: block;margin-bottom: 20px;">
                        <input id="name" placeholder="الاسم" type="text" style="margin-bottom: 0px;"/>
                        <span id="name-error" class="error-message"></span>
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
                        <input id="place" placeholder="المنطقة" type="text" style="margin-bottom: 0px;"/>
                        <span id="place-error" class="error-message"></span>
                    </div>
                    
                    <div class="form-inputs" style="display: block;margin-bottom: 20px;">
                        <input id="phone" placeholder="رقـم الهاتف" type="number" style="margin-bottom: 0px;"/>
                        <span id="phone-error" class="error-message"></span>
                    </div>
                   <!-- <div class="form-inputs count" style="display: block;margin-bottom: 20px;">
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
                    </div>-->

                    <a><button>إرســــــــــال</button></a>
                </form>
               
                
            </div>
            <div class="contact-img">
                <img loading="lazy" src="{{asset('new_website/assets/imgs/img19.png')}}" />
            </div>
        </div>
        <div class="contact-abs"></div>
    </section>
    <div id="myPopup" class="popup">
        <div class="popup-content" style="text-align: center;">
            <h1 style="color: green">
                شكرا لمشاركتكم
            </h1>
            
            
        </div>
    </div>
    <section class="footer">
        <img loading="lazy" alt="" src="{{asset('new_website/assets/imgs/Mask group.png')}}" />
        <div class="footer-content">
            <div class="footer-div">
                <h5>الحملـــة</h5>
                <ul>
                    <li><a href="">حمــلتنا</a></li>
                    <li><a href="">أقســامنا</a></li>
                    <li><a href="">اتصــل بنــا</a></li>
                </ul>
            </div>
            <div class="footer-div">
                <h5>الالتحــاق بنــا</h5>
                <ul>
                    <li><a href="#home">انضــم إلينــا</a></li>
                    <li><a href="#socials">تابعـــنا</a></li>
                </ul>
            </div>
            <div class="footer-div">
                <h5>سياستنــا</h5>
                <ul>
                    <li><a href="">سياسة الخصوصية</a></li>
                    <li><a href="">البنود و الظروف</a></li>
                </ul>
            </div>
        </div>
        <div class="goin-us">
            <h4>انضــم الينــا</h4>
            <div class="join-submit">
                <input type="text" placeholder="ادخل البريد الالكتروني" />
                <button class="register">سجــل الآن</button>
            </div>
        </div>
    </section>
    <script src="{{asset('new_website/js/index.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="{{asset('new_website/js/stylish-portfolio.min.js')}}"></script>
    <script>
        // Select all nav items
        const navItems = document.querySelectorAll('.nav-items li');

        // Function to remove 'active' class from all nav items
        function removeActiveClass() {
            navItems.forEach(item => item.classList.remove('active'));
        }

        // Function to add 'active' class to the current nav item
        function setActiveClass() {
            const sections = document.querySelectorAll('section');
            let currentIndex = sections.length;

            while (--currentIndex && window.scrollY + 50 < sections[currentIndex].offsetTop) { }

            removeActiveClass();
            navItems[currentIndex].classList.add('active');
        }

        // Function to handle nav item click
        function handleNavItemClick(event) {
            removeActiveClass();
            event.currentTarget.classList.add('active');
        }

        // Add event listener for scroll event
        // window.addEventListener('scroll', setActiveClass);

        // Add click event listener for each nav item
        navItems.forEach(item => {
            item.addEventListener('click', handleNavItemClick);
        });
    </script>
    <script>
        const imageContainer = document.getElementById('imageContainer');
        const toggleButton = document.getElementById('toggleButton');
        let isExpanded = false;

        toggleButton.addEventListener('click', function() {
            const allImages = imageContainer.querySelectorAll('.fl');
            if (isExpanded) {
                // Hide extra images
                for (let i = 3; i < allImages.length; i++) {
                    allImages[i].classList.add('hidden');
                }
                toggleButton.textContent = 'شــاهد المـــزيد';
            } else {
                // Show all images
                for (let i = 3; i < allImages.length; i++) {
                    allImages[i].classList.remove('hidden');
                }
                toggleButton.textContent = 'إظهار أقل';
            }
            isExpanded = !isExpanded;
        });
    </script>
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
                    if ($('#phone').val().trim().length !== 8 || !/^\d{8}$/.test($('#phone').val().trim())) {
                        isValid = false;
                        $('#phone-error').text('يجب أن يكون رقم الهاتف مكون من ٨ أرقام.');
                        $('#phone').css('border-color', 'red');
                    } else {
                        $('#phone').css('border-color', '');
                    }
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

               

                return isValid;
            }
            function isValidEmail(email) {
                // Simple email validation regex
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailPattern.test(email);
            }
            $('#contact-form2').on('submit', function(event) {
                event.preventDefault(); 
                $('.error-message').text('');
                
                var email = $('#email').val().trim();
                if (email === '' || !isValidEmail(email)) {
                    
                    $('#email-error').text('يرجى إدخال بريد إلكتروني صالح.');
                    $('#email').css('border-color', 'red');
                    return;
                } else {
                    $('#email').css('border-color', '');
                }
                    // Prevent default form submission
            
                
              // Get form data
              var csrfToken = $('meta[name="csrf-token"]').attr('content');
              var formData = {
                 _token: csrfToken,
                 email: $('#email').val()
                
              };
     
              // Submit form data via AJAX
              $.ajax({
                 url: '/join-us', // Replace with your actual controller route
                 type: 'POST',
                 data: formData,
                 success: function(response) {
                   
                    let myPopup = $('#myPopup');
                    myPopup.addClass("show");
                    $('#contact-form2')[0].reset();
                    
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
            
        });
        
    </script>
</body>

</html>