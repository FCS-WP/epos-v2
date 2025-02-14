<?php


function hotspot_business_map_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'image' => 'http://epos.theshin.info/possystem/wp-content/uploads/2025/02/Customer-Journey-1.webp',
        ),
        $atts,
        'business_map'
    );

    ob_start();
?>
    <div class="business-container">
        <div class="business-map">
           <img src="<?php echo esc_url($atts['image']); ?>" alt="Business Map">
            <!-- Hotspots -->
            <div class="hotspot-container">
                <div class="hotspot pulse" style="top: 60%; left: 18%;" data-target="supermarket"></div>
                <div class="hotspot pulse" style="top: 29%; left: 43%;" data-target="inventory"></div>
                <div class="hotspot pulse" style="top: 90%; left: 35%;" data-target="omnichannel"></div>
                <div class="hotspot pulse" style="top: 63%; left: 52%;" data-target="business"></div>
                <div class="hotspot pulse" style="top: 75%; left: 76%;" data-target="customers"></div>
                <div class="hotspot pulse" style="top: 60%; left: 90%;" data-target="newcustomers"></div>
            </div>
        </div>

        <!-- Info Boxes in 6 Columns -->
        <div class="info-box-container">
            <div class="info-box" id="supermarket">
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
            <div class="info-box" id="inventory">
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
            <div class="info-box" id="omnichannel">
                <div class="info-title">Omnichannel Retail</div>
                <div class="info-content">
                    <ul>
                        <li>Brand.com Ecommerce Store</li>
                        <li>EPOS Ecommerce</li>
                        <li>Marketplace Management</li>
                    </ul>
                </div>
            </div>
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
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('business_map', 'hotspot_business_map_shortcode');