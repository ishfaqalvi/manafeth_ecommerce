<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' 	=> 'per_page_items',
                'value' => '5',
            ],
            [
                'key' 	=> 'footer_logo',
                'value' => 'upload/images/settings/derivative-calculator-logo.webp',
            ],
            [
                'key'   => 'page_title_icon',
                'value' => 'upload/images/settings/derivative-favicon.png',
            ],

            [
                'key' 	=> 'website_name',
                'value' => 'Manafeth Mobility Solutions',
            ],
            [
                'key' 	=> 'website_address',
                'value' => '74 Street - Dubai Investments Park, Dubai - United Arab Emirates',
            ],
            [
                'key'   => 'website_logo',
                'value' => 'uploads/settings/logo.png',
            ],

            [
                'key' 	=> 'twilio_sid',
                'value' => '',
            ],
            [
                'key' 	=> 'twilio_token',
                'value' => '',
            ],
            [
                'key'   => 'twilio_phone_number',
                'value' => '',
            ],



            [
                'key' 	=> 'whatsapp_notification_number',
                'value' => '',
            ],
            [
                'key' 	=> 'sale_item_add_to_cart_whatsapp_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'sale_order_whatsapp_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_item_add_to_cart_whatsapp_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_order_whatsapp_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_expire_date_admin_alert',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_expire_date_admin_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_expire_date_watsapp_customer_alert',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_expire_date_watsapp_customer_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_end_date_extend_watsapp_customer_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'maintenence_request_whatsapp_notification',
                'value' => 'No',
            ],


            [
                'key' 	=> 'firebase_project_id',
                'value' => 'e-manafeth-9bd48',
            ],
            [
                'key' 	=> 'google_application_credentials',
                'value' => 'uploads/settings/google-application-credentials.json',
            ],
            [
                'key' 	=> 'firebase_topic',
                'value' => 'manafeth',
            ],
            [
                'key' 	=> 'sale_order_fcm_notification_to_customer',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_order_fcm_notification_to_customer',
                'value' => 'No',
            ],
            [
                'key' 	=> 'customer_rental_end_fcm_alert',
                'value' => 'No',
            ],
            [
                'key' 	=> 'customer_rental_end_fcm_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'maintenence_request_fcm_notification_to_customer',
                'value' => 'No',
            ],

            [
                'key' 	=> 'sale_order_fcm_notification_to_admin',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_order_fcm_notification_to_admin',
                'value' => 'No',
            ],
            [
                'key' 	=> 'rent_end_date_extend_fcm_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'admin_rental_end_fcm_alert',
                'value' => 'No',
            ],
            [
                'key' 	=> 'admin_rental_end_fcm_notification',
                'value' => 'No',
            ],
            [
                'key' 	=> 'maintenence_request_fcm_notification_to_admin',
                'value' => 'No',
            ],
            [
                'key' 	=> 'employee_task_update_fcm_notification_to_admin',
                'value' => 'No',
            ],

            [
                'key' 	=> 'employee_task_fcm_notification',
                'value' => 'No',
            ],

        ]);
    }
}
