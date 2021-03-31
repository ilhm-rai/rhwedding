<footer>
    <div class="main-footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-2">
                    <img src="/img/logo-white.png" class="w-100" alt="Titani Indonesia">
                </div>
                <div class="col-lg-9">
                    <div class="row justify-content-around">
                        <div class="col-lg-2">
                            <div class="footer-menu">
                                <div class="footer-menu-title">RH Wedding</div>
                                <a href="" class="menu">About Us</a>
                                <a href="" class="menu">Careers</a>
                                <a href="" class="menu">Service</a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="footer-menu">
                                <div class="footer-menu-title">Brides-To-Be</div>
                                <a href="" class="menu">Inspirations</a>
                                <a href="" class="menu">Blogs</a>
                                <a href="" class="menu">Evens</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer-menu">
                                <div class="footer-menu-title">Businesses</div>
                                <a href="" class="menu">Become A Vendor</a>
                                <a href="" class="menu">Upgrade My Vendor</a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer-menu">
                                <div class="footer-menu-title">Social Media</div>
                                <a href="#" class="btn btn-sosmed btn-circle mr-3"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-sosmed btn-circle mr-3"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="btn btn-sosmed btn-circle mr-3"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="btn btn-sosmed btn-circle"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer text-right">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y'); ?> RH Wedding. All right reserved.</p>
        </div>
    </div>
</footer>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        getItemInUserCart();
    });

    function getItemInUserCart() {
        $.ajax({
            url: "<?= base_url('cart/get_item_in_user_cart'); ?>",
            type: 'GET',
            success: function(data) {
                var html = "";
                var items = JSON.parse(data);

                items.forEach(item => {
                    html += `
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="dropdown-list-image">
                                    <img class="rounded-circle object-fit" src="<?= base_url('/img/products/main-img'); ?>/${item['product_main_image']}" alt="${item['product_name']}">
                                </div>
                            </div>
                            <div>
                                <span class="font-weight-bold">${item['product_name']}</span>
                                <div class="small text-gray-500">
                                ${( parseInt( item['price'] ) ).toLocaleString( 'id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                } )}
                                </div>
                            </div>
                        </a>
                    `;
                });

                $('.js-item-cart').html(html);
            }
        });
    }
</script>
<?= $this->endSection(); ?>