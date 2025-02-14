<?php

/**
 * Buttons Categories 
 */
add_shortcode('buttons_categories', 'butons_categories_callback');

function butons_categories_callback()
{
    $categories = get_categories(array('hide_empty' => true, 'orderby' => 'count'));

?>

    <div class="wrapper-button-categories">
        <div class="wrapper-button">
            <?php
            wp_list_categories(array(
                'show_option_all' => 'All Articles',
                'class' => 'post-category flex',
                'show_count' => true,
                'title_li' => ''
            ));
            ?>
        </div>
    </div>

<?php

}

function hotspot_business_map_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'image' => 'http://epos.theshin.info/possystem/wp-content/uploads/2025/02/Customer-Journey-1-1-1.webp',
        ),
        $atts,
        'business_map'
    );

    ob_start();
?>
    <div class="business-container">
        <div class="business-map">
            <img src="<?php echo esc_url($atts['image']); ?>" alt="Business Map" class="background-image">

            <div class="nav-button-container">
                <button class="nav-button prev">&#9665;</button>
                <button class="nav-button next">&#9655;</button>
            </div>

            <div class="hotspot-container">
                <div class="hotspot-wrapper hotspot-supermarket" style="top: 21%; left: 0%;z-index: 2;">
                    <img class="hotspot-icon supermarket" src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/1.-Point-of-Sale-1.png" data-target="info-supermarket">
                    <div class="info-box" id="info-supermarket">
                        <div class="info-title">Point of Sale</div>
                        <div class="info-content">
                            <ul>
                                <li>Cashiering</li>
                                <li>Barcode Management</li>
                                <li>Integrated Payments</li>
                                <li>Self-Checkout</li>
                                <li>Queue Busters</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="hotspot-wrapper hotspot-inventory" style="top: 0%; left: 27%;z-index: 1;">
                    <img class="hotspot-icon" src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/2.-Inventory-Management-1-1.png" data-target="info-inventory">
                    <div class="info-box" id="info-inventory">
                        <div class="info-title">Inventory Management</div>
                        <div class="info-content">
                            <ul>
                                <li>Warehouse Management</li>
                                <li>Multi-Outlet Inventory</li>
                                <li>Supplier Management</li>
                                <li>Mobile Stock Device</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hotspot-wrapper hotspot-omnichannel" style="top: 73%; left: 24%; z-index: 4;">
                    <img class="hotspot-icon omnichannel" src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/3.-Omnichannel-Retail-1.png" data-target="info-omnichannel">
                    <div class="info-box" id="info-omnichannel">
                        <div class="info-title">Omnichannel Retail</div>
                        <div class="info-content">
                            <ul>
                                <li>Brand.com Ecommerce Store</li>
                                <li>EPOS Ecommerce</li>
                                <li>Marketplace Management</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hotspot-wrapper hotspot-business" style="top: 39%; left: 34%; z-index: 2;">
                    <img class="hotspot-icon business" src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/4.-Business-Management-1.png" data-target="business">
                    <div class="info-box" id="business">
                        <div class="info-title">Business Management</div>
                        <div class="info-content">
                            <ul>
                                <li>Business Planning</li>
                                <li>Accounting</li>
                                <li>Data Analytics</li>
                                <li>AI Surveillance</li>
                                <li>ERP Integration</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hotspot-wrapper hotspot-customers" style="top: 46%; left: 61%; z-index: 3;">
                    <img class="hotspot-icon customers" src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/5.-Customer-Management-1-1.png" data-target="customers">
                    <div class="info-box" id="customers">
                        <div class="info-title">Customer Management</div>
                        <div class="info-content">
                            <ul>
                                <li>Marketing Automation</li>
                                <li>WhatsApp Marketing</li>
                                <li>Customer Loyalty</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hotspot-wrapper hotspot-newcustomers" style="top: 29%; left: 75%; z-index: 1;">
                    <img class="hotspot-icon newcustomers" src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/6.-New-Customers-1-1.png" data-target="newcustomers">
                    <div class="info-box" id="newcustomers">
                        <div class="info-title">New Customers</div>
                        <div class="info-content">
                            <ul>
                                <li>Marketing</li>
                                <li>Website</li>
                                <li>Social Media</li>
                                <li>ROI Tracking</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- End hotspot-container -->

            <!-- Mobile info-box -->
            <div class="mobile-info-box">
                <div class="info-box-content"></div>
            </div>
        </div>
    </div>

    <style>
        .business-map {
            width: 100%;
            position: relative;
            margin-bottom: 50px;
            max-width: 1240px;
        }

        .background-image {
            width: 100%;
            border-radius: 10px;
            opacity: 0.1;
            transition: filter 0.3s ease;
        }

        .hotspot-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .hotspot-wrapper {
            position: absolute;
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 5px;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.4s ease-in-out, transform 0.3s ease-in-out;
        }

        .hotspot-wrapper.active {
            opacity: 1;
            transform: scale(1);
            z-index: 8 !important;
        }

        .hotspot-wrapper:hover {
            opacity: 1;
            transform: scale(1.05);
            z-index: 9 !important;
        }

        .hotspot-icon {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .info-box {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            width: max-content;
        }



        .info-box .info-title,
        .info-box-content .info-title {
            font-weight: bold;
            color: #001a32;
            margin-bottom: 10px;
        }

        .info-box ul,
        .info-content ul {
            list-style: none;
            padding: 0;
        }

        .info-box ul li,
        .info-content ul li {
            padding: 5px;
            border-bottom: 1px solid #dfdfdf;
        }

        .info-box ul li:last-child,
        .info-content ul li:last-child {
            border-bottom: none;
        }

        .info-box.active {
            opacity: 1;
            visibility: visible;
        }

        .nav-button-container {
            position: absolute;
            top: -20%;
            right: 0;
        }

        @media screen and (max-width: 1024px) {
            .business-container {
                padding-top: 100px;
            }

            .hotspot-container .info-box {
                display: none;
            }

            .hotspot-wrapper {
                display: block;
            }

            .mobile-info-box {
                display: block;
                margin: 50px 20px 30px 20px;
                height: 250px;
            }

            .mobile-info-box .info-box-content {
                width: 100%;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                background: white;
            }

            .hotspot-supermarket {
                top: 10% !important;
            }

            .hotspot-supermarket img {
                width: 60%;
            }

            .hotspot-inventory img {
                width: 67%;
            }

            .hotspot-omnichannel {
                top: 42% !important;
            }

            .hotspot-omnichannel img {
                width: 70%;
            }

            .hotspot-business {
                top: 23% !important;
            }

            .hotspot-business img {
                width: 60%;
            }

            .hotspot-customers {
                top: 27% !important;
                left: 59% !important;
            }

            .hotspot-customers img {
                width: 65%;
            }

            .hotspot-newcustomers {
                top: 17% !important;
            }
        }

        /* Mobile View */
        @media screen and (max-width: 768px) {
            .business-container {
                padding-top: 80px;
            }

            .hotspot-container .info-box {
                display: none;
            }

            .hotspot-wrapper {
                display: block;
            }

            .info-box-content {
                display: none;
            }

            .info-box-content.active {
                display: block;
            }

            .hotspot-supermarket {
                top: 7% !important;
            }

            .hotspot-supermarket img {
                width: 41%;
            }

            .hotspot-inventory img {
                width: 67%;
            }

            .hotspot-omnichannel {
                top: 25% !important;
            }

            .hotspot-omnichannel img {
                width: 30%;
            }

            .hotspot-business {
                top: 12% !important;
            }

            .hotspot-business img {
                width: 47%;
            }

            .hotspot-customers {
                top: 15% !important;
                left: 58% !important;
            }

            .hotspot-customers img {
                width: 65%;
            }

            .hotspot-newcustomers {
                top: 9% !important;
            }
        }

        @media screen and (width: 768px) and (height: 1024px) {
            .business-container {
                padding-top: 80px;
            }

            .hotspot-container .info-box {
                display: none;
            }

            .hotspot-wrapper {
                display: block;
            }

            .info-box-content {
                display: none;
            }

            .info-box-content.active {
                display: block;
            }

            .hotspot-supermarket {
                top: 11% !important;
            }

            .hotspot-supermarket img {
                width: 55%;
            }

            .hotspot-inventory img {
                width: 67%;
            }

            .hotspot-omnichannel {
                top: 38% !important;
            }

            .hotspot-omnichannel img {
                width: 57%;
            }

            .hotspot-business {
                top: 12% !important;
            }

            .hotspot-business img {
                width: 47%;
            }

            .hotspot-customers {
                top: 25% !important;
                left: 58% !important;
            }

            .hotspot-customers img {
                width: 65%;
            }

            .hotspot-newcustomers {
                top: 15% !important;
                left: 72% !important;
            }
        }
    </style>

    <script>
        jQuery(document).ready(function($) {
            const $hotspots = $(".hotspot-wrapper");
            const $prevButton = $(".nav-button.prev");
            const $nextButton = $(".nav-button.next");
            const $mobileInfoBox = $(".mobile-info-box .info-box-content");
            let currentIndex = 0;

            function showHotspot(index) {
                $(".hotspot-wrapper, .info-box").removeClass("active");

                const $newHotspot = $hotspots.eq(index);
                const targetId = $newHotspot.find(".hotspot-icon").data("target");
                const $targetBox = $("#" + targetId);

                if ($newHotspot.length && $targetBox.length) {
                    $newHotspot.addClass("active");
                    $targetBox.addClass("active");

                    if ($(window).width() <= 1024) {
                        $mobileInfoBox.html($targetBox.html()).addClass("active");
                    }
                }
            }

            $prevButton.on("click", function() {
                currentIndex = (currentIndex - 1 + $hotspots.length) % $hotspots.length;
                showHotspot(currentIndex);
            });

            $nextButton.on("click", function() {
                currentIndex = (currentIndex + 1) % $hotspots.length;
                showHotspot(currentIndex);
            });

            $hotspots.each(function(index) {
                $(this).on("click", function(event) {
                    event.stopPropagation();
                    currentIndex = index;
                    showHotspot(currentIndex);
                });
            });

            showHotspot(currentIndex);
        });
    </script>

<?php
    return ob_get_clean();
}
add_shortcode('business_map', 'hotspot_business_map_shortcode');
