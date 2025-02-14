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
                <button class="nav-button prev"><img src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/left-arrow.png"></button>
                <button class="nav-button next"><img src="http://epos.theshin.info/possystem/wp-content/uploads/2025/02/right-arrow.png"></button>
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
                <div class="hotspot-wrapper hotspot-newcustomers" style="top: 29%; left: 75%; z-index: 4;">
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
<?php
    return ob_get_clean();
}
add_shortcode('business_map', 'hotspot_business_map_shortcode');
