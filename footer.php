    <footer class="footer">
        <section id="footer" class="p-5">
            <div class="text-center">
                <div class="mt-3 mb-2 mb-sm-5">
                    <p>PHIÊN BẢN THỬ NGHIỆM CÔNG TY</br>CỔ PHẦN INDOCHINE MEDIA VENTURES VIỆT NAM</br>GCNĐT số: 411032000105</p>
                </div>
                <div">
                    <p>Địa chỉ liên hệ: Tầng 7, Số 7, Đường D2, Khu phức hợp sông Sài Gòn, 92 Nguyễn Hữu Cảnh, Q. Bình Thạnh, Thành phố Hồ Chí Minh</p>
                    <p>Email: info@indochinemedia.com</p>
                    <img src="https://robbreport.com.vn/_next/image?url=%2Flib%2Flogo%2FlogoSaleNoti.png&w=256&q=75" alt="" width="100">
                </div>
            </div>
        </section>
    </footer>
    <section class="bg-black">
        <div class="container text-white p-4 footer-menu">
            <div class="row">
                <div class="col-md-2">
                    <div class="text-center text-md-start">
                        <a href="<?= site_url() ?>" class="text-decoration-none">
                            <img class="img-fluid" src="https://robbreport.com.vn/_next/image?url=%2Flib%2Flogo%2FLogo-White%402x.png&w=640&q=75" alt="" width="200">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="my-3 my-sm-0">
                        <div class="d-flex flex-column align-self-center">
                            <?php $footerMenus = wp_get_nav_menu_items('footer-menu'); ?>
                            <?php if ($footerMenus): ?>
                                <ul class="list-group d-flex flex-row lh-1 m-0 justify-content-between justify-content-sm-start footer-menu">
                                    <?php foreach ($footerMenus as $menu): ?>
                                        <li class="list-group-item px-0 me-4 border-0 bg-transparent">
                                            <a class="text-decoration-none text-white text-uppercase" aria-current="page" href="<?= $menu->url ?>"><?= $menu->title ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <p class="fst-italic">Published by Robb Report Vietnam under license from Robb Report Media, LLC, a subsidiary of Penske Media Corporation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center text-md-start">
                        <div class="d-flex align-self-center justify-content-between">
                            <span class="fs-6">FOLLOW US</span>
                            <ul class="list-group d-flex flex-row lh-1">
                                <li class="list-group-item ps-0 border-0 bg-transparent text-white"><i class="fa-brands fa-facebook-f"></i></li>
                                <li class="list-group-item ps-0 border-0 bg-transparent text-white"><i class="fa-brands fa-instagram"></i></li>
                                <li class="list-group-item ps-0 border-0 bg-transparent text-white"><i class="fa-brands fa-youtube"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php wp_footer(); ?>
</body>

</html>