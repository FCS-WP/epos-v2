<?php

function hubspot_register_api_endpoints()
{
  register_rest_route('hubspot/v1', '/form', array(
    'methods'  => 'POST',
    'callback' => 'callback_send_data_to_form',
    'permission_callback' => '__return_true', // Public access (change for security)
  ));
}

function callback_send_data_to_form(WP_REST_Request $request)
{
  $fields = $request->get_param('fields');

  if (empty($fields)) {
    wp_send_json_error(["error" => "Missing fields data"], 400);
  }

  $portal_id = sanitize_text_field($fields['portal_id']['value'] ?? '');
  $form_id   = sanitize_text_field($fields['form_id']['value'] ?? '');
  $page_name = sanitize_text_field($fields['page_name']['value'] ?? '');
  $page_url  = esc_url_raw($fields['page_url']['value'] ?? '');

  if (empty($portal_id) || empty($form_id)) {
    wp_send_json_error(["error" => "Missing portal_id or form_id"], 400);
  }

  $endpoint = "https://api.hsforms.com/submissions/v3/integration/submit/$portal_id/$form_id";

  $context = [
    "pageUri"  => $page_url,
    "pageName" => $page_name
  ];

  $body = [
    'fields'  => [],
    'context' => $context
  ];

  // Remove unnecessary fields
  unset($fields['portal_id'], $fields['form_id'], $fields['page_name'], $fields['page_url']);

  foreach ($fields as $name => $value) {
    $body['fields'][] = [
      'name'  => sanitize_text_field($value['id'] ?? ''),
      'value' => sanitize_text_field($value['value'] ?? '')
    ];
  }

  $response = wp_remote_post($endpoint, [
    'body'    => wp_json_encode($body),
    'headers' => [
      'Content-Type' => 'application/json'
    ],
    'method'  => 'POST'
  ]);

  $response_code = wp_remote_retrieve_response_code($response);

  if (is_wp_error($response) || $response_code !== 200) {
    wp_send_json_error(["error" => "Failed to submit data to HubSpot"], 500);
  }

  // Log the request for debugging
  $log_data = json_encode([
    "body"       => $body,
    "portal_id"  => $portal_id,
    "timestamp"  => current_time('mysql')
  ]);

  $log_file = get_stylesheet_directory() . "/webhook_log.txt";
  file_put_contents($log_file, $log_data . "\n", FILE_APPEND);

  wp_send_json_success(["message" => "Webhook received successfully!"]);
}

// Hook into WordPress REST API
add_action('rest_api_init', 'hubspot_register_api_endpoints');
