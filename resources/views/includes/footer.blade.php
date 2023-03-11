<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <div class="footer-social-link">
                            <h3>Follow us</h3>
                            <ul>
                                <li>
                                    <a href="http://www.facebook.com">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.twitter.com">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://github.com/tingkn">
                                        <i class="fa fa-github"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/ting-ke-ni-64b18b233/">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.instagram.com">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">
                        <p>Plastic Recycle-It-Up</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>
                                <div class="contact-info">
                                    <h3>Ting Ke Ni</h3>
                                    <p>SEGi University</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>
                                <div class="contact-info">
                                    <h3>60 12 372 6621</h3>
                                    <p>Give us a call</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget footer-left-widget">
                                <div class="section-heading">
                                    <h3>Useful Links</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <ul>
                                    <li>
                                        <a href="HTRecycle">How to Recycle</a>
                                    </li>
                                    <li>
                                        <a href="blog">Blog</a>
                                    </li>
                                    <li>
                                        <a href="forum">Forum</a>
                                    </li>
                                    <li>
                                        <a href="quiz">Quiz</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="WTRecycle">Where to Recycle</a>
                                    </li>
                                    <li>
                                        <a href="contactus">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">
                                <div class="section-heading">
                                    <h3>Subscribe Newsletter</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <form id="newsletter-form" method="POST" action="/newsletter">
                                    <div class="form-row">
                                        <div class="col dk-footer-form">
                                            @csrf
                                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                                            <button type="submit">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <script>
    // Add an event listener to the form submit event
    document.getElementById('newsletter-form').addEventListener('submit', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Send an AJAX request to the server
        axios.post('/newsletter', new FormData(this))
            .then(function(response) {
                // Display the success message in a popup window
                alert('Email is saved successfully');
                    form.reset();
            })
            .catch(function(error) {
                // Display the error message in a popup window
                alert(error.response.data.message);
            });
    });
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>© 2023 Plastic Recycle-It-Up™. All Rights Reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-dark" title="Back to Top" style="display: block;">
            <a href="#"><i class="fa fa-angle-up font-green"></i></a>
            </button>
        </div>
        <!-- End Back to top -->
</footer>





