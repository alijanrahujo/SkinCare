<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo text-center">
                        <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt=""
                                width="50%"></a>
                    </div>
                    <ul>
                        <li>Address: Shop 16/17 Underground Quaid e Azam Complex Doctor Line, Hyderabad, Pakistan</li>
                        <li>Phone: +92 333 6857367</li>
                        <li>Email: info@arskincare.pk</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ Route('shop') }}">Shop</a></li>
                        <li><a href="{{ Route('contactus') }}">Contact us</a></li>
                        <li><a href="{{ Route('myorder') }}">My Orders</a></li>
                    </ul>
                    <x-category-menu />
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="https://www.facebook.com/profile.php?id=61552649396438&mibextid=LQQJ4d"><i
                                class="fa fa-facebook"></i></a>
                        <a href="https://instagram.com/arskincare.pk?igshid=OGQ5ZDc2ODk2ZA=="><i class="fa fa-instagram"
                                aria-hidden="true"></i></a>
                        <a href="https://wa.me/923336857367"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        <a href="https://www.tiktok.com/@ar.skincare?_t=8hSxynKwcB0&_r=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12.25" height="14" viewBox="0 0 448 512">
                                <path fill="black"
                                    d="M448 209.91a210.06 210.06 0 0 1-122.77-39.25v178.72A162.55 162.55 0 1 1 185 188.31v89.89a74.62 74.62 0 1 0 52.23 71.18V0h88a121.18 121.18 0 0 0 1.86 22.17A122.18 122.18 0 0 0 381 102.39a121.43 121.43 0 0 0 67 20.14Z" />
                            </svg>
                        </a>
                        {{-- <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            2023 All rights reserved | Developed by <a href="https://oradotint.com"
                                target="_blank">Ora-Dot International</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img src="{{ asset('frontend/img/payment-item.png') }}"
                            alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
