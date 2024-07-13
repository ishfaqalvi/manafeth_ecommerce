<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = array(
            array('id' => '1','brand_id' => '1','category_id' => '9','sub_category_id' => '20','name' => 'Manual Standard Wheelchair-MW01','serial_number' => 'SN-Rent-1','engine_number' => 'EN-Rent-1','model' => NULL,'thumbnail' => 'images/product/66236c0f2e2d0.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '950','discount' => '10','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Unpublish','description' => '<p>The seat cushion double layer, the upper one is soft pearl wool and lower one is oxford fabric<br>&nbsp;</p>','features' => '<ul><li>Size: 102*67*90cm</li><li>Folding width: 27cm</li><li>Seat width: 50cm</li><li>Seat height from ground: 46cm</li><li>Back height: 41cm</li><li>Front wheel: 8\'\' PU thicken wheel</li><li>Rear wheel: 24\'\' thicken PU wheel</li><li>load-bearing: 150kg</li><li>High quality brake and tyre&nbsp;</li></ul>','created_at' => '2024-04-15 20:02:53','updated_at' => '2024-05-07 21:43:26'),
            array('id' => '48','brand_id' => '1','category_id' => '3','sub_category_id' => '3','name' => 'Manual Standard Wheelchair-MW01','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661cffb4f01ba.png','quantity' => '-2','maintenance' => '0','warranty' => '1','price' => '1045','discount' => '950','delivery_charges' => '75','type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<ul><li>Size: 102*67*90cm</li><li>Folding width: 27cm</li><li>Seat width: 50cm</li><li>Seat height from ground: 46cm</li><li>Back height: 41cm</li><li>Front wheel: 8\'\' PU thicken wheel</li><li>Rear wheel: 24\'\' thicken PU wheel</li><li>load-bearing: 150kg</li><li>High quality brake and tyre&nbsp;</li></ul>','features' => '<p><strong>Foldable Frame:</strong> The wheelchair frame is often foldable, allowing for easy storage and transportation.</p><p><strong>Adjustable Seat:</strong> The seat height and angle may be adjustable to provide comfort and proper positioning for the user.</p><p><strong>Removable Footrests:</strong> Many manual wheelchairs come with removable or swing-away footrests to facilitate easier transfers and accommodate different user preferences.</p><p><strong>Push Handles:</strong> Push handles at the back of the wheelchair allow caregivers or attendants to assist in pushing the wheelchair.</p><p><strong>Wheel Locks:</strong> Wheel locks or brakes are typically included to secure the wheelchair in place when stationary or during transfers.</p><p><strong>Armrests:</strong> Padded armrests provide support and comfort for the user, and they may be either fixed or removable depending on the model.</p><p><strong>Lightweight Construction:</strong> Manual wheelchairs are often made from lightweight materials such as aluminum or titanium, making them easier to propel and transport.</p><p><strong>Puncture-Resistant Wheels:</strong> Some models may feature puncture-resistant or solid tires to minimize the risk of flat tires and reduce maintenance requirements.</p><p><strong>Adjustable Wheel Positioning:</strong> The position of the rear wheels can often be adjusted to optimize maneuverability or accommodate different user preferences.</p><p><strong>Optional Accessories:</strong> Various accessories such as seat cushions, backrests, and pouches may be available to customize the wheelchair for individual needs and preferences.</p><p>These features collectively provide mobility, comfort, and convenience for users of manual standard wheelchairs, enabling them to navigate their surroundings with greater independence and ease.</p>','created_at' => '2024-04-16 01:53:59','updated_at' => '2024-07-05 01:20:14'),
            array('id' => '49','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Thunder - Pro Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/663624f436d81.jpg','quantity' => '-3','maintenance' => '0','warranty' => '2','price' => '7500','discount' => '0','delivery_charges' => '30','type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p><strong>Introducing the Thunder - Pro Power Wheelchair</strong>, the ultimate blend of power, performance, and comfort. Engineered for those seeking unparalleled mobility, this advanced wheelchair offers a host of cutting-edge features to enhance everyday life.</p><p>Featuring a sleek design and robust construction, the Thunder - Pro is built to tackle a variety of terrains with ease. Its powerful motor and advanced suspension system ensure a <strong>smooth ride</strong>, whether navigating through busy city streets or exploring outdoor trails.</p><p>Equipped with intuitive controls and <strong>customizable settings</strong>, users can <strong>effortlessly </strong>tailor the wheelchair to their specific needs and preferences. From <strong>adjustable seating positions</strong> to programmable driving modes, the Thunder - Pro provides a personalized experience like no other.</p><p>Designed with user comfort in mind, this wheelchair boasts ergonomic seating, plush padding, and ample legroom for extended periods of use. With its ergonomic design and supportive features, the Thunder - Pro ensures <strong>maximum comfort</strong> and stability, allowing users to maintain their independence and confidence throughout the day.</p><p>Whether for everyday use or adventurous outings, the <strong>Thunder - Pro Power Wheelchair</strong> empowers users to embrace life to the fullest, breaking barriers and redefining what\'s possible. Experience freedom, <strong>performance</strong>, and innovation like never before with the <strong>Thunder - Pro Power Wheelchair</strong>.&nbsp;</p><p>Our wheelchairs are <strong>durable </strong>and <strong>lightweight </strong>and can be <strong>folded </strong>and <strong>fit in any car</strong>.</p>','features' => '<ul><li>Battery: 24V 12AH Lithium battery</li><li>Charger: DC 24V 12 Ah AC 110V-230V</li><li>Max speed: 6km/h</li><li>Driving distance: 25km</li><li>Product size: 600*980*930(mm)</li><li>Rear wheel: 10inch*3inch</li><li>Front wheel: 7inch*2.5inch</li><li>Seat width: 45cm</li><li>Seat depth: 43cm</li><li>Safe load: 130kgs</li><li>Package: 65*38*82(cm)</li><li>N.W/G. W: 26kgs/31kgs</li><li>Auto Foldable&nbsp;</li><li>Comes with Remote control as well&nbsp;</li><li>Frame Material: Aluminum&nbsp;</li><li>Motors: DC250W*2pcs&nbsp;</li><li>Brake Electromagnetic brake&nbsp;</li><li>Charging time: 6 hour&nbsp;</li></ul>','created_at' => '2024-04-16 02:33:36','updated_at' => '2024-07-04 01:56:00'),
            array('id' => '50','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Reclining Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => 'TM401','thumbnail' => 'images/product/661d03607ae1c.png','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '9500','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<ul><li>Quick and easy removable battery, Lithium battery 6Ah X 2</li><li>Brushless motor 24V 250W each</li><li>Ergonomically designed cushion with reflects, super comfortable and removable</li><li>With Medical motor and Cylinder to support smooth Reclining of backrest</li><li>Angel adjustable Headrest</li><li>Extendable and comfortable footer</li></ul>','features' => '<ul><li>Weight Capacity: 150KG</li><li>Max Speed: 6KM/hr.</li><li>Driving Range: 16-20KM (2.5-2.8hrs)</li><li>Seat Width: 49-56cm</li><li>Seat Depth: 45cm</li><li>Backrest Height: 52cm</li><li>Motor: Brushless 250W each</li><li>Battery: Lithium 5.8Ah *2</li><li>Charger: 2A</li><li>N.W: 29.75KG (w/o battery)</li><li>Fold Size: 37*60*79cm</li><li>Unfold Size: 110*60*98cm</li></ul>','created_at' => '2024-04-16 02:37:20','updated_at' => '2024-07-12 02:30:46'),
            array('id' => '51','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Power Wheelchair MM201','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d04aec2c52.png','quantity' => '8','maintenance' => '0','warranty' => '0','price' => '7500','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<ul><li>Quick and easy removable battery</li><li>Reinforced frame making the wheelchair maximum loads 150kg</li><li>Smart control system, soft and smooth.</li><li>High power motor pair, upgrade to 250W each.</li><li>Ergonomically designed cushion with reflects, super comfortable and removable.</li><li>Flip up armrest, fully foldable footrest</li></ul>','features' => '<ul><li>Weight Capacity: 150KG</li><li>Max Speed: 6KM/hr</li><li>Driving Range: 16-20KM (2.5-3.5hrs)</li><li>Seat Width: 49-56cm</li><li>Seat Depth: 45cm</li><li>Backrest Height: 52cm</li><li>Motor: Brushless 250W each</li><li>Battery: Lithium 5.8Ah X 2</li><li>Charger: 2A</li><li>N.W: 25.65KG (w/o battery)</li><li>Fold Size: 37*60*79cm</li><li>Unfold Size: 110*60*98cm</li></ul>','created_at' => '2024-04-16 02:42:54','updated_at' => '2024-07-11 21:13:52'),
            array('id' => '52','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Power Wheelchair MM101','serial_number' => NULL,'engine_number' => NULL,'model' => 'TM101','thumbnail' => 'images/product/661d070840182.png','quantity' => '9','maintenance' => '0','warranty' => '0','price' => '8800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<ul><li>Strong Aluminum frame with a total weight of 19.5kg (w/o battery)</li><li>Seat width is 45cm, comfortable cushion</li><li>Brushless motor pair, powerful and lightweight</li><li>With a lithium battery 24V 11Ah, drives up to 15-18km</li><li>Controller with USB charge port and headlight</li></ul>','features' => '<ul><li>Driving Range: 16-20KM (2.5-3.5hrs)</li><li>Weight Capacity: 125KG</li><li>Max Speed: 6KM/hr</li><li>Seat Width: 45cm</li><li>Seat Depth: 43cm</li><li>Motor: Brushless 180W each</li><li>Battery: Lithium 10.4Ah</li><li>N.W: 19.5KG (w/o battery)</li><li>Fold Size: 58*37*87cm</li><li>Unfold Size: 58*94*101cm</li></ul>','created_at' => '2024-04-16 02:52:56','updated_at' => '2024-06-14 21:46:01'),
            array('id' => '53','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Camel Hope Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => 'TM301','thumbnail' => 'images/product/661d090f18c35.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '6800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<ul><li>Strong Aluminum frame with a total weight of 24.65kg (w/o battery)</li><li>Brushed motor 24V 250W each, stable and smooth control</li><li>Suspension system on back of frame</li><li>The Unique dual base rod ensure the wheelchair go straight all the time</li><li>With a bigger seating space but a small folding size</li><li>Fold in 1s, easy and simple for passengers&nbsp;</li></ul>','features' => '<ul><li>Weight Capacity: 135KG</li><li>Max Speed: 6KM/hr</li><li>Driving Range: 13-17KM (2-2.8hrs)</li><li>Seat Width: 45cm</li><li>Seat Depth: 45cm</li><li>Backrest Height: 51cm</li><li>Motor: Brushless 250W each</li><li>Battery: Lithium 10.8Ah</li><li>Charger: 2A</li><li>N.W: 25KG (w/o battery)</li><li>Fold Size: 58*37*87cm</li><li>Unfold Size: 58*94*101cm</li></ul>','created_at' => '2024-04-16 03:01:35','updated_at' => '2024-05-02 00:38:58'),
            array('id' => '56','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Thunder Power Wheelchair-01','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d0c2ec9c78.png','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '3900','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>The Thunder PW-01 Power Wheelchair offers a range of innovative features designed to provide users with exceptional mobility and comfort:</p><p>1. <strong>Powerful Motor:</strong> Equipped with a high-performance motor, the Thunder PW-01 delivers smooth and efficient operation, effortlessly navigating various terrains and inclines.</p><p>2. <strong>Advanced Suspension System:</strong> A sophisticated suspension system ensures a comfortable ride by absorbing shocks and vibrations, allowing users to traverse uneven surfaces with confidence.</p><p>3. <strong>Adjustable Seating:</strong> The wheelchair features customizable seating options, including adjustable seat height, depth, and angle, to accommodate individual preferences and ensure proper positioning for optimal comfort and support.</p><p>4. <strong>Intuitive Controls:</strong> Easy-to-use controls allow users to navigate with precision and ease. The joystick controller offers intuitive operation, enabling smooth maneuverability in tight spaces and crowded environments.</p><p>5. <strong>Long-lasting Battery:</strong> With a high-capacity battery, the Thunder PW-01 provides extended range and dependable performance, allowing users to travel longer distances without interruption.</p><p>6. <strong>Compact Design: </strong>Despite its powerful performance, the wheelchair boasts a compact and maneuverable design, making it suitable for indoor use and easy storage in tight spaces.</p><p>7. <strong>Comfortable Seating:</strong> Ergonomically designed seating with padded cushions ensures a comfortable experience, even during extended periods of use. The adjustable armrests and footrests further enhance user comfort and support.</p><p>8. <strong>Safety Features:</strong> Built-in safety features, such as anti-tip wheels and a reliable braking system, provide added peace of mind for users and caregivers, ensuring stability and control at all times.</p><p>9. <strong>Durable Construction: </strong>Constructed from high-quality materials, the Thunder PW-01 is built to withstand daily use and rigorous conditions, ensuring long-lasting durability and reliability.</p><p>10. <strong>Versatile Use:</strong> Whether for indoor navigation, outdoor adventures, or travel, the Thunder PW-01 Power Wheelchair offers versatile functionality, empowering users to maintain their independence and explore the world with confidence.</p><p>Overall, the Thunder PW-01 combines cutting-edge technology, comfort, and durability to provide users with a premium mobility solution that enhances their quality of life.</p>','features' => '<ul><li>MOTOR&nbsp; &nbsp; &nbsp;180*2 BRUSH</li><li>BATTERY&nbsp; &nbsp; 24V 12AH LEAD ACID</li><li>CONTROLLER&nbsp; &nbsp; IMPORTEDL 360% JOYSTICK</li><li>MAX LOADING&nbsp; &nbsp; 120KG</li><li>CHARGING TIME&nbsp; &nbsp; 5-7H</li><li>SPEED&nbsp; &nbsp; &nbsp;0-6KM/H</li><li>TURNING RADIUS&nbsp; &nbsp; &nbsp;60CM</li><li>CLIMBING ABILIT&nbsp; &nbsp; &nbsp;≤13</li><li>DRIVING DISTANCE&nbsp; &nbsp; &nbsp;15~20KM</li><li>SEAT&nbsp; &nbsp; &nbsp;W44 141 T4CM</li><li>BACKREST&nbsp; &nbsp; &nbsp;W44 H30 T4CM</li><li>FRONT WHEEL&nbsp; &nbsp; 8 INCH(SOLID)</li><li>REAR WHEEL&nbsp; &nbsp; &nbsp;12 INCH(PNEUMATIC)</li><li>SIZE (UNFOLDED)&nbsp; &nbsp; &nbsp;103*55*88CM</li><li>SIZE(FOLDED)&nbsp; &nbsp; &nbsp;55*21*69CM</li><li>PACKING SIZE&nbsp; &nbsp; &nbsp;68*35*73CM</li><li>G.W.&nbsp; &nbsp; &nbsp; 36KG</li><li>N.W.(WITHBATTERY)&nbsp; &nbsp; &nbsp;31KG</li><li>N.W.(WITHOUT BATTERY) 25KG</li></ul>','created_at' => '2024-04-16 03:14:54','updated_at' => '2024-05-18 03:17:02'),
            array('id' => '57','brand_id' => '3','category_id' => '3','sub_category_id' => '4','name' => 'Alerta Car Transit Wheelchair, Crash Tested','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661e502cc6f92.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '1400','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>Introducing the Alerta Car Transit Wheelchair: rigorously crash-tested for utmost safety and equipped with essential features for comfortable and secure transportation.</p><p>This wheelchair boasts drop-down armrests, swing-away detachable footrests, arm pads, lap belt, and rear brakes, all complemented by 30cm rear wheels and 20cm front wheels, each fitted with puncture-proof tires. The seat dimensions measure 40cm in depth and 43cm in width, ensuring ample support and comfort during travel.</p><p>Mobility is not just about movement; it\'s about freedom and independence. For individuals reliant on wheelchairs, safety during transit is paramount. Enter the Alerta Car Transit Wheelchair – a game-changer in the realm of mobility aids, proudly bearing the badge of "Crash Tested."</p><p>In a world where safety certifications are crucial but often overlooked, the Alerta Car Transit Wheelchair stands out as a beacon of reassurance. This innovative wheelchair has undergone rigorous crash testing to ensure it meets stringent safety standards, providing users and caregivers with peace of mind during travel.</p><p>What sets the Alerta Car Transit Wheelchair apart is its unwavering commitment to safety without compromising on comfort or functionality. Designed with the user\'s well-being in mind, it boasts a range of features tailored to enhance both safety and convenience.</p><p>First and foremost, the Alerta Car Transit Wheelchair is engineered with robust materials and construction techniques, ensuring durability and resilience in the face of unexpected impacts. Its reinforced frame and secure fastenings are meticulously crafted to withstand the forces exerted during transit, minimizing the risk of injury to the user.</p><p>Moreover, this wheelchair prioritizes user comfort without sacrificing safety. Its ergonomic design, padded seating, and adjustable features ensure a snug and supportive fit, promoting proper posture and reducing discomfort during extended periods of use.</p><p>In addition to its crash-tested credentials, the Alerta Car Transit Wheelchair is equipped with a host of practical features to streamline the travel experience. From its lightweight and foldable design for easy storage and transport to its intuitive locking mechanisms for secure attachment in vehicles, every aspect is thoughtfully engineered for maximum convenience.</p><p>For caregivers and healthcare professionals, the Alerta Car Transit Wheelchair represents more than just a mobility aid – it\'s a symbol of trust and reliability. Its crash-tested certification offers tangible evidence of its commitment to user safety, instilling confidence in those responsible for the well-being of wheelchair users.</p><p>In a world where mobility knows no bounds, the Alerta Car Transit Wheelchair stands as a testament to innovation and excellence. By raising the bar for safety standards in mobility aids, it empowers individuals to embark on journeys with confidence, knowing that their well-being is in capable hands.</p><p>In conclusion, the Alerta Car Transit Wheelchair is not just a mobility aid; it\'s a lifeline, offering safety, comfort, and peace of mind to users and caregivers alike. With its crash-tested certification, it sets a new benchmark for excellence in mobility, ensuring that every journey is a safe and secure one.</p>','features' => '<ul><li>Crash tested</li><li>Drop down arms</li><li>Padded armrests</li><li>Lap belt</li><li>Swing away detachable footrests</li><li>Puncture proof tyres</li><li>Max user weight: 115kg</li></ul><p><br>The Alerta Car Transit Wheelchair, Crash Tested, offers a range of features tailored to ensure safety, comfort, and convenience during travel:</p><p><strong>Crash Tested Certification:</strong> Rigorously tested to meet stringent safety standards for transportation, providing assurance of reliability and durability during transit.</p><p><strong>Robust Construction:</strong> Engineered with a reinforced frame and durable materials to withstand impacts and ensure stability and security for the user.</p><p><strong>Secure Fastenings:</strong> Equipped with reliable fastening systems, including seatbelt and wheelchair tie-downs, to securely anchor the wheelchair in place within vehicles and prevent movement during transit.</p><p><strong>Ergonomic Design:</strong> Designed with user comfort in mind, featuring ergonomic seating, padded armrests, and adjustable footrests for optimal support and posture.</p><p><strong>Compact and Foldable:</strong> Compact and foldable design for easy storage and transport, allowing for convenient use in various vehicles and travel situations.</p><p><strong>Lightweight Construction:</strong> Lightweight yet sturdy construction for effortless handling and maneuverability, reducing strain for caregivers and facilitating ease of use.</p><p><strong>Adjustable Features:</strong> Adjustable seat height, backrest angle, and footrests to accommodate individual preferences and ensure a customized fit for maximum comfort.</p><p><strong>Accessible Design:</strong> Designed with accessibility in mind, featuring easy-to-operate brakes, armrests that flip up for easy transfers, and a user-friendly locking mechanism for secure attachment in vehicles.</p><p><strong>Versatile Use:</strong> Suitable for use in a variety of vehicles, including cars, vans, and buses, making it ideal for everyday commuting, medical appointments, and travel adventures.</p><p><strong>Compliance with Regulations:</strong> Designed and manufactured in accordance with relevant safety regulations and standards for wheelchair transportation, ensuring legal compliance and peace of mind for users and caregivers.</p><p>Overall, the Alerta Car Transit Wheelchair, Crash Tested, combines advanced safety features, ergonomic design, and user-friendly functionality to provide a reliable and comfortable transportation solution for individuals with mobility needs</p>','created_at' => '2024-04-16 03:16:43','updated_at' => '2024-04-27 23:10:29'),
            array('id' => '58','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Thunder Power Wheelchair-02','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d0ccac07bd.png','quantity' => '10','maintenance' => '3','warranty' => '12','price' => '3250','discount' => '2999','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>What truly sets the<strong> Thunder PW-02</strong> apart, however, is its unwavering commitment to <strong>customization </strong>and <strong>personalization</strong>. With intuitive controls and customizable settings, users have the <strong>freedom </strong>to tailor the wheelchair to their <strong>unique </strong>needs and preferences. Whether <strong>adjusting seating positions</strong>, fine-tuning driving modes, or selecting preferred accessories, the <strong>Thunder PW-02</strong> puts the power in your hands, quite literally.</p><p><strong>Safety is paramount</strong>, and the <strong>Thunder PW-02</strong> leaves no stone unturned in this regard. Built with a robust frame and equipped with advanced safety features such as <strong>anti-tip wheels</strong> and a <strong>reliable braking system</strong>, this wheelchair prioritizes user <strong>safety </strong>and peace of mind at every turn.</p><p><strong>Compact yet capable</strong>, the <strong>Thunder PW-02</strong> is designed for seamless integration into your daily life. Its sleek and modern design not only looks the part but also offers practical features such as foldable components for easy storage and transport, ensuring that you\'re always ready to embark on your next adventure, wherever it may lead.</p><p>In conclusion, the <strong>Thunder PW-02 </strong>Power Wheelchair is more than just a mobility aid – it\'s a symbol of empowerment and freedom. With its unmatched combination of power, comfort, and customization, it empowers users to embrace life on their own terms, breaking barriers and redefining what\'s possible. Experience the thrill of true mobility with the <strong>Thunder PW-02</strong> by your side, and let nothing hold you back from reaching new heights.</p>','features' => '<ul><li>Overall Length&nbsp; &nbsp; &nbsp;113cm</li><li>Vehicle Width&nbsp; &nbsp; &nbsp; 70cm</li><li>Overall Height&nbsp; &nbsp; &nbsp;90cm</li><li>Base Height&nbsp; &nbsp; &nbsp; 47cm</li><li>The Front/Rear Wheel Size&nbsp; &nbsp; &nbsp; 10/16</li><li>The Vehicle Weight&nbsp; &nbsp; &nbsp; 38kg+7kg</li><li>load weight&nbsp; &nbsp; &nbsp; 100kg</li><li>Climbing Ability&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;13</li><li>The Motor Power&nbsp; &nbsp; &nbsp; 250W*2</li><li>Battery&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 24V/12AH</li><li>Range&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;10-15KM</li><li>Per Hour&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1-6Km</li><li>High strength carbon steel frame, durable</li><li>Universal controller, 360 degrees flexible control</li><li>armrest can lift, easy to get on and off</li></ul>','created_at' => '2024-04-16 03:17:30','updated_at' => '2024-06-08 00:16:41'),
            array('id' => '60','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'I Go Fold','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d1043c7f99.jpg','quantity' => '9','maintenance' => '0','warranty' => '0','price' => '13125','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>The iGo Fold is more than just a wheelchair—it\'s a lifestyle enhancer. With its sleek design and advanced features, it\'s engineered to seamlessly integrate into your daily routine, offering unparalleled freedom and independence wherever life takes you.</p><p>One of the standout features of the iGo Fold is its portability. Designed to be lightweight and compact, it can be easily folded and stowed away in the trunk of a car or even stored in tight living spaces. Say goodbye to bulky, cumbersome wheelchairs—the iGo Fold is here to streamline your mobility needs.</p><p>But don\'t let its compact size fool you—the iGo Fold packs a punch when it comes to performance. With its powerful motor and responsive controls, it effortlessly glides over various terrains, from smooth sidewalks to uneven outdoor surfaces. Whether you\'re running errands around town or exploring new destinations, the iGo Fold ensures a smooth and comfortable ride every time.</p><p>Comfort is another area where the iGo Fold excels. Featuring ergonomic seating, adjustable armrests, and a cushioned backrest, it\'s designed with user comfort in mind. Say goodbye to discomfort and hello to hours of enjoyable mobility, whether you\'re out for a quick trip or an all-day excursion.</p><p>Safety is paramount, and the iGo Fold doesn\'t disappoint in this regard. Equipped with reliable brakes and sturdy construction, it provides users with peace of mind and confidence as they navigate their surroundings. With the iGo Fold, safety is never compromised, allowing you to focus on what truly matters—enjoying life to the fullest.</p><p>In conclusion, the Pride Mobility iGo Fold is more than just a wheelchair—it\'s a lifestyle upgrade. With its combination of portability, performance, comfort, and safety, it empowers users to live life on their own terms, without limitations. Experience the freedom of mobility like never before with the Pride Mobility iGo Fold by your side.</p>','features' => '<ul><li>Remote controlled automatic folding system</li><li>Back seat pocket for extra storage while on-the-go</li><li>Folds by simply pressing a button</li><li>Large foot platform to accommodate the user’s comfort</li><li>Specialty foam seat design for extreme comfort</li></ul><p>This product falls in the indoor product category, and is suitable for indoor use and flat pavements. It is not suitable for grass, gravel or steep slopes. The products performance may also be affected in wet weather conditions.</p>','created_at' => '2024-04-16 03:32:19','updated_at' => '2024-06-21 05:21:18'),
            array('id' => '64','brand_id' => '1','category_id' => '4','sub_category_id' => '5','name' => 'Thunder B01 - 2 Function Manual Hospital Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662ca8d2dcee5.png','quantity' => '8','maintenance' => '0','warranty' => '0','price' => '1600','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>The B01 Medical Bed is a state-of-the-art healthcare equipment designed to provide optimal comfort and care for patients in medical facilities. With advanced features such as adjustable height, backrest, and leg rest, it offers customizable positioning to accommodate various medical needs and ensure patient comfort. The bed is engineered with sturdy materials for durability and safety, with easy-to-use controls for healthcare professionals to adjust settings efficiently. Its ergonomic design promotes patient mobility and accessibility, facilitating smoother caregiving processes. The B01 Medical Bed represents a modern solution tailored to enhance patient recovery and well-being within healthcare environments. Overall, the B01 Medical Bed combines comfort, safety, and versatility to support optimal patient care and improve healthcare outcomes.</p>','features' => '<ul><li>Adjustable Positions: The bed offers customizable positioning options, including height adjustment, backrest recline, and leg rest elevation, allowing healthcare professionals to optimize patient comfort and support.</li><li>Sturdy Construction: Engineered with high-quality materials, the B01 Medical Bed ensures durability and stability, providing a secure platform for patient care.</li><li>User-Friendly Controls: Intuitive controls enable healthcare staff to easily adjust bed settings, facilitating efficient caregiving and enhancing patient experience.</li><li>Mobility and Accessibility: The bed is designed with features to promote patient mobility and accessibility, including siderails for safety and ease of movement.</li><li>Pressure Redistribution: Equipped with pressure redistribution technology, the bed helps prevent pressure ulcers by evenly distributing weight and reducing pressure points.</li><li>Integration Capabilities: Some models may offer integration with medical monitoring systems or electronic health records, allowing for seamless data collection and management.</li><li>Easy Maintenance: Designed for easy cleaning and maintenance, the bed minimizes downtime and ensures hygienic conditions in healthcare environments.</li><li>Optional Accessories: Various optional accessories, such as IV poles, bedside tables, and patient lift systems, may be available to enhance functionality and meet specific patient care needs.</li></ul>','created_at' => '2024-04-16 03:42:38','updated_at' => '2024-06-19 01:22:27'),
            array('id' => '65','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'I Go Lite','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d14607b719.jpg','quantity' => '9','maintenance' => '0','warranty' => '0','price' => '13399','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Sleek, practical and ultra-lightweight</strong></p><p>The all-new i Go®&nbsp;Lite weighs only 18 kg making it our lightest power chair yet! With a built-in USB charger, you’ll be able to travel and stay connected with the world around you. Its flight-safe batteries mean the sky is your limit - simply unfold and go, for an adventure of a lifetime.</p>','features' => '<ul><li>Large secure under-seat storage compartment</li><li>On-board USB charger</li><li>Adjustable control position</li><li>Stylish Carbon Fibre design</li><li>Simple one-touch folding system</li><li>Compact lightweight design</li></ul><p>This product falls in the indoor product category, and is suitable for indoor use and flat pavements. It is not suitable for grass, gravel or steep slopes. The products performance may also be affected in wet weather conditions.</p>','created_at' => '2024-04-16 03:49:52','updated_at' => '2024-06-14 22:40:51'),
            array('id' => '66','brand_id' => '1','category_id' => '4','sub_category_id' => '6','name' => 'Thunder B02 - 4 Function Electric Hospital Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662ca0c78fc7c.png','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '3520','discount' => '3200','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<ol><li>High-Density Memory Foam</li><li>Cooling Gel Infusion</li><li>Orthopedic Support</li><li>Hypoallergenic Cover</li><li>Durable Construction</li></ol><p><strong>High-Density Memory Foam:</strong> Sink into the plush comfort of our high-density memory foam that contours to your body, relieving pressure points and ensuring a restful night\'s sleep.&nbsp;</p><p><strong>Cooling Gel Infusion:</strong> Say goodbye to overheating during the night! Our innovative cooling gel infusion technology regulates temperature, keeping you cool and comfortable all night long.&nbsp;</p><p><strong>Orthopedic Support:</strong> Experience unparalleled support for your spine and joints. Our mattress is orthopedically designed to promote proper alignment and alleviate aches and pains.</p><p><strong>&nbsp;Hypoallergenic Cover</strong>: Sleep peacefully knowing that our hypoallergenic cover protects you from allergens and dust mites, ensuring a clean and healthy sleeping environment.&nbsp;</p><p><strong>Durable Construction:</strong> Built to last, our mattress is made from premium materials that are designed to withstand years of use without sagging or losing shape.</p>','features' => '<ul><li>High quality engineering ABS plastic head &amp; feet board</li><li>Overall punching cold carbon steel bed frame which is stable and reliable</li><li>High-quality stainless steel side rails can protect patients from falling</li><li>ABS independent locking system mute casters help to move the bed easily</li><li>ROHS &amp; CE certificated high quality and powerful electric pushrods and controllers</li><li>Electric Adjustability: Effortlessly adjust the head and foot sections of the bed with precision, allowing patients to find their preferred positions for rest, recovery, or activities.</li><li>Sturdy Construction: Built with high-quality materials, the Thunder-B02 ensures durability and stability, providing reliable support for patients of varying needs and sizes.</li><li>Quiet Operation: Equipped with electric motors that operate smoothly and quietly, minimizing disturbances during adjustments and promoting a restful environment for patients.</li><li>Easy-to-Use Controls: Intuitive controls make it simple for caregivers to operate the bed, facilitating efficient patient care and positioning adjustments.</li><li>Safety Features: Includes siderails for added patient safety, which can be easily raised or lowered as needed to prevent falls or accidents.</li><li>Compact Design: Despite its robust features, the Thunder-B02 boasts a space-saving design suitable for use in a variety of healthcare settings, including clinics, hospitals, and home care environments.</li></ul>','created_at' => '2024-04-16 03:52:00','updated_at' => '2024-07-12 02:19:29'),
            array('id' => '67','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'I Go +','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d151ad2076.jpg','quantity' => '9','maintenance' => '0','warranty' => '0','price' => '11800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>Part of the i GO range the i GO+ features front suspension, comfortable seating, convenient storage and ample foot room. The i GO+ has a compact and lightweight design and can fold in just a few simple steps for effortless transport; makes travelling a breeze. Simply unfold and travel with the i Go+.</p>','features' => '<ul><li>A compact and lightweight design makes traveling a breeze</li><li>Back seat pocket for extra storage while on-the-go&nbsp;</li><li>Folds in just a few simple steps for effortless transport</li><li>Includes convenient, under-seat mesh storage bag, mesh cup holder and 1016 mm lap belt</li><li>&nbsp;Large foot platform to accommodate the user’s comfort</li><li>&nbsp;Specialty foam seat design for extra comfort</li></ul><p>This product falls in the indoor product category, and is suitable for indoor use and flat pavements. It is not suitable for grass, gravel or steep slopes. The products performance may also be affected in wet weather conditions.</p>','created_at' => '2024-04-16 03:52:58','updated_at' => '2024-06-14 22:37:25'),
            array('id' => '68','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'Jazzy 600 ES','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d15d34a6c4.jpg','quantity' => '7','maintenance' => '0','warranty' => '0','price' => '19500','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p>Imagine waking up each morning, excited to grab the day’s adventures with the same ease and flexibility as everyone else. Nevertheless, people who are struggling to move around experience a world full of obstacles, both physical and mental. The situation involves a number of difficulties ranging from merely being able to travel through a tightly packed area to a more profound lack of freedom in life. Jazzy 600 ES electric wheelchair – a brand new mobility aid born to re-establish a sense of dignity and self-esteem. With its range of cutting-edge features and smart design, the Jazzy 600 ES has not only been substituted for a transportation medium, but it’s an invention that has the potential to make a difference. Being the promoter of comfort and support which cannot be compared with other wheelchairs, it is more than just helping with mobility but opens up the way to possibility. So, let’s begin our voyage to unveil how Jazzy 600 ES is changing lives one ride at a time. Here are some of the key advantages: Exceptional Maneuverability: Advanced drive system and OMNICaster allowed Jazzy 600 ES to become an easy-to-maneuver chair that can even move through narrow spaces. Thus it is used in indoor spaces, cramped areas, and around barriers. Superior Traction: Mounting 14” wheels and a rigid suspension system, the vehicle brings about excellent tracks that work well on all kinds of terrains, including uneven ground and outside settings. Riders can ride confidently over bumps, cracks, and any other obstacle with no compromise on stability and comfort level. Enhanced Comfort: The commercially-proven Active-Trac ATX suspension system and leg-rest- extenders with other comfort-enhancing features are the prioritized user comfort during prolonged operation. Whether you are indoors or outdoors, you will be pampered with a gentler ride without any shocks, promoting your health or reducing fatigue Accessibility and Assistance: Equipped with highly placed quick-release freewheel handles and other accessibility-centered features, the Jazzy 600 ES ensures family support with simplicity, allowing the user to remain in charge as well as ensuring he/she is safe and comfortable. A caregiver with no problems whatsoever can use the free driving mode of the wheelchair and operate the wheelchair manually as needed. Versatile Design: The Jazzy 600 ES is designed to be adapted to the needs of different users and choices. Such as the adjustable elements, customizable options, and ergonomic items in its design make for individual needs differentiation, raising comfort level, and elevating the level of user experience. Reliability and Durability: Created to endure the daily use challenges, the Jazzy 600 ES power wheelchair consists of high quality materials and components that safeguard its long-term durability. Over the years, users will be able to depend on it to have a stable design that can ensure mobility support even in the toughest conditions. Independence and Freedom: The Jazzy 600 ES folding power wheelchair improves users’ ability to move around and gain independence and thus enhances their active lifestyle. No matter if at home, in the area, or while away on a trip, individuals can be very self-sufficient and maintain their dignity and assistance in anything that is needed as they desire.</p>','features' => '<ul><li>OMNI-Casters -Spherical caster shrouding design to prevent hang-ups when climbing</li><li>&nbsp;Active-Trac® ATX Suspension -Enhances comfort and performance</li><li>Large 14” Drive Wheels- Exceptional traction on varied surfaces</li><li>Easy-Access Freewheel-Freewheel levers are easily accessed for caregiver assistance</li><li>Total Weight (without battery, base only): 56 kg</li><li>Battery Weight (each) : 16.9 kg each</li><li>Maximum Speed 4 mph: (6.4 km/h)</li><li>Weight Capacity: 21 st 6lbs: (136 kg)</li><li>Overall Width: 622 mm (24.5″)</li><li>Overall Length: 1022 mm (40.25″)</li><li>Turning Radius: 521 mm (20.5″)</li><li>Turning Radius: 521 mm (20.5″)</li><li>Battery Requirements: 2 x 50 Ah</li></ul>','created_at' => '2024-04-16 03:56:03','updated_at' => '2024-06-19 00:13:43'),
            array('id' => '69','brand_id' => '1','category_id' => '4','sub_category_id' => '6','name' => 'Thunder B05 - 5 Function Electric Hospital Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d15ff37a27.png','quantity' => '9','maintenance' => '0','warranty' => '0','price' => '7600','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<ul><li>Innovative 5-function electric medical bed</li><li>Adjustable height for customized patient positioning</li><li>Backrest and leg rest adjustments for optimal comfort</li><li>Tilt function for easy patient repositioning</li><li>Advanced Design: Engineered for superior patient comfort and caregiver convenience.</li><li>Customizable Functions: Adjustable height, backrest, leg rest, tilt, and trendelenburg positions to meet diverse patient needs.</li><li>Enhanced Mobility: Effortlessly reposition patients with precision and ease.</li><li>Optimal Comfort: Designed to provide maximum comfort during extended use.</li><li>Reliable Support: Built with quality materials for long-lasting durability and reliability.</li><li>Streamlined Care: Simplify patient care with intuitive controls and versatile functionality.</li><li>Versatile Applications: Ideal for hospitals, clinics, nursing homes, and home care settings.</li></ul>','features' => '<ol><li>Back adjustment 0~80°</li><li>Leg adjustment 0~45°</li><li>Back &amp; leg adjustment together</li><li>Height adjustment 400~700mm</li><li>Trendelenburg≤15°6. reversed trendelenburg≤15°</li></ol><ul><li>Outer Size: 2060*1000*400~700mm</li><li>Load Capacity: 250kg</li><li>Bed board: overall punching, carbon steel</li><li>Side rails: 4pcs ABS.</li><li>Casters: center control locking system.</li><li>Head &amp; feet board: high quality ABS</li><li>Mattress: high density 100% sponge with waterproof PU cover</li></ul>','created_at' => '2024-04-16 03:56:47','updated_at' => '2024-06-07 12:13:27'),
            array('id' => '70','brand_id' => '1','category_id' => '4','sub_category_id' => '6','name' => 'Thunder B03 - 4 Function Electric Hospital Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661d1719b8a3c.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '5200','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>The <strong>Thunder-B03 Electric Medical Bed</strong> boasts a versatile design that combines functionality with ergonomic <strong>comfort</strong>. Its fully <strong>adjustable </strong>positions, including head and foot elevation, allow for customized positioning to accommodate individual preferences and medical requirements. Whether it\'s facilitating comfortable rest, aiding in therapy sessions, or assisting with patient mobility, this bed offers unparalleled versatility to support various healthcare activities.</p><p>Caregivers will appreciate the <strong>user-friendly</strong> nature of the <strong>Thunder-B03 Electric Medical Bed</strong>. Equipped with intuitive controls, including a handheld remote, adjusting bed positions and settings is effortless, streamlining patient care and minimizing strain on caregivers. Additionally, the bed features locking casters for secure positioning and mobility, ensuring stability and safety during transfers and adjustments.</p><p>Constructed from high-quality materials and built to rigorous standards, the <strong>Thunder-B03 Electric Medical Bed</strong> prioritizes durability and reliability. Its sturdy frame and robust mechanisms ensure long-lasting performance, making it an ideal investment for healthcare facilities, hospitals, rehabilitation centers, and home care environments alike.</p><p>Furthermore, patient <strong>comfort </strong>is paramount with the <strong>Thunder-B03 Electric Medical Bed</strong>. The bed\'s mattress platform is designed for optimal support and pressure relief, promoting restful sleep and aiding in the prevention of bedsores. Additionally, the bed\'s sleek and modern design complements any healthcare setting, creating a welcoming and comforting environment for patients.</p><p>In conclusion, the <strong>Thunder-B03 Electric Medical Bed</strong> represents a pinnacle of innovation and <strong>quality </strong>in patient care. With its advanced features, user-friendly design, and focus on comfort and safety, it sets a new standard for electric medical beds, empowering both patients and caregivers to achieve optimal outcomes in healthcare delivery.</p>','features' => '<ul><li>Weight Capacity 200 Kg</li><li>Size: 2130x950x470/700mm</li><li>High quality engineering ABS plastic head &amp; feet board</li><li>Overall punching cold carbon steel bed frame which is stable and reliable</li><li>ABS plastic hydraulic side rails to protect patient from falling off bed</li><li>ABS double sides casters</li><li>ROHS &amp; CE certificated high quality and powerful electric pushrods and controllers</li></ul>','created_at' => '2024-04-16 04:01:29','updated_at' => '2024-05-05 00:54:53'),
            array('id' => '72','brand_id' => '2','category_id' => '2','sub_category_id' => '7','name' => 'Pride Quest Scooter','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661e5313a3a77.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '12000','discount' => '11499','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<ul><li>Compact and Portable Design: The scooter is lightweight and easily foldable, making it simple to transport and store, whether in a car trunk or on public transport.</li><li>Adjustable Tiller: The tiller can be adjusted to accommodate different user heights and preferences, ensuring a comfortable and ergonomic riding position.</li><li>Ergonomic Seating: Equipped with a comfortable seat that provides ample support for long rides, promoting a pleasant and enjoyable experience.</li><li>Long-lasting Battery: The scooter is powered by a reliable battery that offers extended range, allowing users to travel further distances without worrying about running out of power.</li><li>Dependable Performance: Designed for both indoor and outdoor use, the Pride Quest Scooter delivers smooth and reliable performance on various terrains, from city streets to park pathways.</li><li>Safety Features: Built-in safety features such as anti-tip wheels and adjustable speed settings provide peace of mind for users, ensuring stability and control during rides.</li><li>Intuitive Controls: Simple and easy-to-use controls make operating the scooter effortless, even for those with limited dexterity or mobility.</li></ul>','features' => '<ul><li>Unique folding design</li><li>Folds in just three easy steps</li><li>Adjustable tiller</li><li>Easy to transport</li><li>Can be stowed upright or laid down</li><li>Articulated front end adds greater stability</li><li>Front and rear LED lights</li></ul>','created_at' => '2024-04-17 02:29:39','updated_at' => '2024-07-04 01:58:24'),
            array('id' => '73','brand_id' => '2','category_id' => '2','sub_category_id' => '7','name' => 'Pride Go Go Elite Traveller Plus','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661e543175cd4.jpg','quantity' => '9','maintenance' => '0','warranty' => '0','price' => '7500','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<ul><li>Compact and Portable Design: Lightweight and easily disassembled into manageable pieces, making it effortless to transport and store in a car trunk or on public transport.</li><li>Comfortable Seating: Plush and contoured seat provides optimal comfort for extended rides, ensuring a pleasant experience wherever you go.</li><li>Adjustable Tiller: The tiller can be adjusted to accommodate different user heights and preferences, allowing for a personalized and ergonomic riding position.</li><li>Long-lasting Battery: Powered by a reliable battery with an extended range, enabling users to travel further distances without worrying about running out of power.</li><li>Smooth Performance: Equipped with solid tires and a robust motor, the scooter delivers smooth and dependable performance on various terrains, from smooth pavement to uneven surfaces.</li><li>Intuitive Controls: Easy-to-use controls make operating the scooter simple and straightforward, even for users with limited dexterity or mobility.</li><li>Safety Features: Built-in safety features such as anti-tip wheels and automatic braking provide stability and peace of mind, ensuring a secure ride every time.</li><li>Optional Accessories: Users can customize their scooter with optional accessories like baskets, cup holders, and additional storage compartments, adding functionality and personalization to their riding experience.</li></ul>','features' => '<ul><li>Feather-touch disassembly</li><li>Delta tiller with wraparound handles</li><li>Pride’s exclusive black, non-scuffing tyres</li><li>Auto-connecting front to rear cable</li><li>Includes 2 sets of easily changeable coloured panels – Red and Blue</li><li>Front frame-mounted seat post offers maximum stability</li><li>Frame design easily disassembles into 5 super lightweight pieces for convenient transport and storage</li><li>Modular design for easy serviceability</li><li>Microprocessor-based controller offers optimal power management and added safety features</li><li>Front tiller-mounted basket</li><li>Removable footboard basket for additional storage (4-wheel version only)</li><li>Convenient off-board dual voltage charger can charge battery pack on-board or off-board</li></ul>','created_at' => '2024-04-17 02:34:25','updated_at' => '2024-06-14 21:31:20'),
            array('id' => '74','brand_id' => '3','category_id' => '4','sub_category_id' => '8','name' => 'Alerta Sensaflex 3000 Foam Mattress','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661e55e2d4e35.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '1800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p>Its advanced design ensures superior comfort, care, and pressure redistribution, making it ideal for hospital, nursing, and care home settings.</p><p>For washing the cover in a machine, use a main wash setting of 65oC for a minimum of 10 minutes or 95oC for a minimum of 3 minutes. Tumble dry the cover on low heat, ensuring the temperature does not exceed 60oC. The foam component can be autoclaved at 134oC.</p><p>Additionally, a bariatric version measuring 120cm wide is available, identified by code: ALT-3000/4.</p>','features' => '<ul><li>Multi-stretch and vapor-permeable PU cover</li><li>Water-resistant and machine-washable cover</li><li>Antimicrobial cover with white underside</li><li>BS7177: Crib 5</li></ul>','created_at' => '2024-04-17 02:41:38','updated_at' => '2024-07-12 20:58:05'),
            array('id' => '75','brand_id' => '3','category_id' => '4','sub_category_id' => '8','name' => 'Alerta Bubble 2 Overlay Pad','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661e56bc56c9a.png','quantity' => '9','maintenance' => '0','warranty' => '0','price' => '750','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>Featuring an entry-level pump, it offers care providers essential tools for pressure care.</p><p>Equipped with user-friendly settings and functions, the Alerta Bubble 2 facilitates quick setup and optimal pressure adjustment for individual users with simplicity.</p><p>Manufactured to adhere to rigorous quality and usage standards, the Alerta Bubble 2 ensures reliability and performance.</p><p>Note: When washing, ensure the air inlet tubes are tightly sealed to prevent water entry.</p>','features' => '<ul><li>&nbsp;Tuck-in extension flaps</li><li>CPR - tubes can be easily removed</li><li>Water resistant material</li><li>Antimicrobial material</li><li>Machine washable*</li></ul>','created_at' => '2024-04-17 02:45:16','updated_at' => '2024-07-04 01:16:58'),
            array('id' => '76','brand_id' => '1','category_id' => '4','sub_category_id' => '9','name' => 'Thunder Adjustable Overbed Table','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661f876fcb819.png','quantity' => '8','maintenance' => '0','warranty' => '0','price' => '650','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>Introducing our Adjustable Overbed Table, designed for patient comfort and convenience. With its sturdy construction and adjustable height feature, it offers versatility for various activities like dining or working from bed. Its spacious surface accommodates essentials, while its sleek design complements any room decor. Upgrade your bedside experience with ease and style.</p>','features' => '<ul><li>Material: Aluminium alloy frame + wooden dining table</li><li>Size: 900*400*(740-1130)mm</li><li>Table size: 90*40cm</li><li>Packing size: 98*46*20cm, 1pc/carton, 18kg</li></ul>','created_at' => '2024-04-18 00:25:20','updated_at' => '2024-07-04 01:16:58'),
            array('id' => '77','brand_id' => '1','category_id' => '4','sub_category_id' => '10','name' => 'Patient Hoist-PH01','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/661f88d7e3542.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '7500','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>Introducing our state-of-the-art Patient Hoist, designed to revolutionize mobility assistance in healthcare settings. This cutting-edge device seamlessly lifts and transfers patients with ease, ensuring their comfort and safety throughout the process.</p><p>Crafted with precision engineering and advanced materials, our Patient Hoist prioritizes both durability and user-friendliness. Its ergonomic design minimizes strain on caregivers while maximizing support for patients, making it an indispensable tool in any medical facility or home care environment.</p><p>Whether it\'s assisting patients in and out of bed, transferring them to a wheelchair, or aiding in bathroom routines, our Patient Hoist is the ultimate solution for enhancing mobility and independence. Invest in superior care with our innovative hoisting solution today.</p>','features' => '<ol><li><strong>Effortless Lift Mechanism:</strong> Our hoist is equipped with a powerful yet whisper-quiet lift system, effortlessly raising and lowering patients with the touch of a button.</li><li><strong>Adjustable Sling Options:</strong> Versatile sling options cater to various patient needs, providing optimal support and comfort during transfers.</li><li><strong>Intuitive Controls:</strong> User-friendly controls ensure smooth operation, allowing caregivers to focus on providing attentive care to patients.</li><li><strong>Compact and Portable:</strong> With a space-saving design and easy-to-maneuver construction, our hoist offers flexibility in any environment.</li><li><strong>Safety First:</strong> Built-in safety features, including emergency stop buttons and secure locking mechanisms, prioritize patient safety at all times.</li><li><strong>Easy Maintenance:</strong> Designed for hassle-free maintenance, our hoist requires minimal upkeep, maximizing uptime and reliability.</li></ol>','created_at' => '2024-04-18 00:31:20','updated_at' => '2024-05-05 05:32:28'),
            array('id' => '79','brand_id' => '1','category_id' => '3','sub_category_id' => '4','name' => 'Alerta Self Propelled Wheelchair - Crash Tested','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6623a6fdbaf8c.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '1550','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>Presenting the Alerta Self-Propelled Wheelchair, featuring self-propelling rear wheels for enhanced mobility.</p><p>This wheelchair offers detachable arms, padded armrests, a lap belt, swing-away and detachable footrests, heel loops, and rear brakes for added safety. Equipped with 60cm rear wheels and 20cm front wheels, all with puncture-proof tires, it ensures smooth navigation over various surfaces. The seat measures 40cm in depth and 45cm in width, providing optimal comfort for users.</p>','features' => '<ul><li>60cm rear self-propelled wheels</li><li>20cm front wheels</li><li>Seat size: 40cm deep x 45cm wide</li><li>Max user weight: 115kg</li><li>Crash tested</li><li>Self-propelled rear wheels</li><li>Wave profile self-propel rim</li><li>Detachable table-entry arms</li><li>Padded armrests</li><li>Lap belt</li><li>Swing away detachable footrests</li><li>Puncture proof tyres</li><li>Rear wheel brakes</li><li>Heel loops</li></ul>','created_at' => '2024-04-20 23:41:01','updated_at' => '2024-04-21 03:29:02'),
            array('id' => '81','brand_id' => '4','category_id' => '6','sub_category_id' => '12','name' => 'Turny Evo','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6627b2f259515.jpg','quantity' => '6','maintenance' => '2','warranty' => '3','price' => '1','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<ol><li>The Turny Evo is more than just a vehicle seating solution; it represents a paradigm shift in how we approach mobility for people with disabilities. Developed with a keen understanding of the diverse needs of its users, the Turny Evo is a testament to innovation and inclusivity.</li><li>At its core, the Turny Evo is designed to simplify the process of entering and exiting vehicles for individuals with mobility challenges. Its intuitive functionality allows users to effortlessly rotate and lower the seat outside the vehicle, eliminating the need for strenuous transfers and minimizing the risk of injury. Whether it\'s a wheelchair user seeking independence or an individual with mobility impairments requiring assistance, the Turny Evo caters to a wide range of needs with its customizable features and ergonomic design.</li><li>One of the key advantages of the Turny Evo is its versatility. Compatible with a variety of vehicle models, from sedans to SUVs, this mobility solution seamlessly integrates into existing vehicles without the need for extensive modifications. This adaptability ensures that users can enjoy the benefits of the Turny Evo without compromising on their preferred mode of transportation.</li></ol>','features' => '<ul><li>Turny Evo is the next evolution in accessible vehicle seating solutions. Designed to meet the needs of individuals with limited mobility, Turny Evo offers effortless access to vehicles by rotating and lowering the seat outside the vehicle. Its innovative design enhances independence and ease of use, allowing users to enter and exit vehicles with comfort and dignity. With its advanced features and ergonomic design, Turny Evo redefines mobility solutions, making transportation more inclusive and convenient for everyone.</li><li>Moreover, safety is paramount in the design of the Turny Evo. Equipped with advanced safety features, including sensors and automatic locking mechanisms, this mobility solution prioritizes user security at every stage of operation. Whether it\'s navigating busy parking lots or traversing uneven terrain, users can trust in the Turny Evo to provide a secure and stable seating experience.</li><li>Beyond its practical functionality, the Turny Evo symbolizes a broader commitment to accessibility and inclusion. By removing barriers to transportation, it enables individuals with disabilities to participate more fully in society, whether it\'s commuting to work, running errands, or simply enjoying leisure activities with friends and family. In doing so, it fosters a more equitable and supportive community where everyone has the opportunity to thrive.</li><li>In conclusion, the Turny Evo represents a groundbreaking advancement in mobility solutions, heralding a new era of accessibility and empowerment for individuals with limited mobility. As we continue to strive for a more inclusive society, innovations like the Turny Evo serve as a beacon of hope, reminding us that with creativity, determination, and compassion, we can overcome any obstacle and build a world where everyone has the freedom to live life to the fullest.</li></ul>','created_at' => '2024-04-24 05:09:06','updated_at' => '2024-07-13 01:53:52'),
            array('id' => '82','brand_id' => '4','category_id' => '6','sub_category_id' => '13','name' => 'Turny Orbit','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6627b47a40a88.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><br><strong>Title: Unlocking Freedom: Introducing the Turny Orbit Mobility Seat</strong></p><p>In the realm of accessibility, innovation is the key to unlocking new possibilities and empowering individuals with limited mobility to navigate the world with greater independence and confidence. One such innovation that is revolutionizing the way we think about vehicle accessibility is the Turny Orbit Mobility Seat. Much more than just a seat, the Turny Orbit is a game-changer, offering a seamless and dignified solution for entering and exiting vehicles.</p><p>At the heart of the Turny Orbit is its 360-degree rotating base, which allows the seat to swivel and extend beyond the vehicle\'s door frame. This simple yet ingenious feature enables users to effortlessly transfer from a wheelchair or mobility aid into the vehicle without the need for complicated maneuvers or assistance from others. With just the push of a button, users can smoothly glide into the perfect position, ready to embark on their journey with ease.</p><p>But perhaps most importantly, the Turny Orbit represents a newfound sense of freedom and independence for individuals with limited mobility. By removing barriers to transportation, it empowers users to live life on their own terms, whether it\'s commuting to work, running errands, or embarking on adventures with friends and family. No longer confined by the limitations of traditional seating solutions, users of the Turny Orbit can embrace a world of possibilities with confidence and enthusiasm.</p><p>In conclusion, the Turny Orbit Mobility Seat is more than just a seat—it\'s a gateway to a more accessible and inclusive future. With its innovative design, versatile compatibility, and unwavering commitment to safety, the Turny Orbit is revolutionizing the way we think about vehicle accessibility, one seat rotation at a time. As we continue to strive for a world where everyone has the freedom to explore and experience life to the fullest, innovations like the Turny Orbit serve as a beacon of hope, reminding us that with determination and ingenuity, anything is possible.</p>','features' => '<ul><li>Turny Orbit redefines vehicle accessibility with its innovative design, offering seamless entry and exit for individuals with limited mobility. With its 360-degree rotating base, Turny Orbit allows effortless transfers from wheelchairs or mobility aids into a wide range of vehicles, from compact sedans to spacious vans. Safety features ensure a secure experience, while its versatility makes it compatible with various vehicle models. Turny Orbit not only enhances independence but also opens doors to new possibilities, enabling users to navigate the world with confidence and ease.</li><li>The Turny Orbit redefines what it means to travel for individuals with mobility challenges. Whether it\'s due to age, injury, or disability, getting in and out of a vehicle can be a daunting task. Traditional methods often require strenuous effort and can pose safety risks. However, the Turny Orbit eliminates these barriers with its innovative design and intuitive functionality.</li><li>At the heart of the Turny Orbit is its 360-degree rotating base, which allows the seat to swivel and extend beyond the vehicle\'s door frame. This simple yet ingenious feature enables users to effortlessly transfer from a wheelchair or mobility aid into the vehicle without the need for complicated maneuvers or assistance from others. With just the push of a button, users can smoothly glide into the perfect position, ready to embark on their journey with ease.</li><li>Safety is paramount in the design of the Turny Orbit. Equipped with state-of-the-art safety features, including sensors, interlocks, and anti-pinch technology, this mobility seat prioritizes user security at every stage of operation. From the moment the seat begins to rotate to the final position inside the vehicle, users can trust in the Turny Orbit to provide a stable and secure seating experience, minimizing the risk of accidents or injuries.</li></ul><p><br>&nbsp;</p>','created_at' => '2024-04-24 05:15:38','updated_at' => '2024-04-24 05:15:38'),
            array('id' => '83','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => '2 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662a0046d9bd3.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '650','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<ul><li><strong>Premium Quality:</strong> Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</li><li><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</li><li><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</li><li><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</li><li><strong>Expert Support:</strong> At Easy Access Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.<br>&nbsp;</li></ul><p><br>&nbsp;</p>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 10 lbs&nbsp;</li><li>Recommend Using Height: 3.9"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li></ul>','created_at' => '2024-04-25 23:03:35','updated_at' => '2024-05-23 23:39:09'),
            array('id' => '84','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => '5 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662a012f94269.jpg','quantity' => '6','maintenance' => '0','warranty' => '0','price' => '1500','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p><strong>Premium Quality:</strong> Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</p><p><br><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</p><p><br><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</p><p><br><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</p><p><br><strong>Expert Support:</strong> At Easy Access Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.</p>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 26.7 lbs&nbsp;</li><li>Recommend Using Height: 9.8"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li><li>Lock screw</li></ul>','created_at' => '2024-04-25 23:07:27','updated_at' => '2024-07-04 01:33:59'),
            array('id' => '85','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => '3 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662a01c3394ee.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '950','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Premium Quality</strong>: Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</p><p><br><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</p><p><br><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</p><p><br><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</p><p><br><strong>Expert Support:</strong> At Easy Access Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.</p>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 14.5 lbs&nbsp;</li><li>Recommend Using Height: 5.9"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li><li>Lock screw</li></ul>','created_at' => '2024-04-25 23:09:55','updated_at' => '2024-05-24 00:28:26'),
            array('id' => '86','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => '4 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662a0350847e4.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '1250','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Premium Quality</strong>: Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</p><p><br><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</p><p><br><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</p><p><br><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</p><p><br><strong>Expert Support:</strong> At Easy Access Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.</p>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 19.2 lbs&nbsp;</li><li>Recommend Using Height: 7.9"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li><li>Lock screw</li></ul>','created_at' => '2024-04-25 23:16:32','updated_at' => '2024-05-24 00:50:06'),
            array('id' => '89','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => 'Portable Wheelchair Ramp 8 Feet-PR08','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662a0cfb7cbb7.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '3400','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Portable wheelchair ramp: </strong>We all know that it’s complicated to transfer a patient or disabled person from the stairs of your home into the vehicles. So, to finish these problems, we designed such portable wheelchair ramps.</p><p><strong>Portable Ramps With Variety: </strong>This portable wheelchair ramp is there to make it wheelchair accessible for the people of determination. And don’t think that the portable wheelchair ramp is of one type. No, we are providing you with portable wheelchair ramps of different lengths and widths to meet other requirements of different people.</p><p><strong>Major Types Of Portable Wheelchair Ramps: </strong>When we talk about types of portable wheelchair ramps, there are two significant types. Some are single fold while others are multi-fold. You will not face any difficulty carrying these ramps with your car to different places as these are easy to maintain.</p>','features' => '<ul><li>&nbsp;8 Feet Portable Ramp</li><li>74×243 CM</li><li>Non-Slip</li></ul>','created_at' => '2024-04-25 23:57:47','updated_at' => '2024-04-26 22:14:29'),
            array('id' => '90','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => 'Portable Wheelchair Ramp 10 Feet-PR10','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662a0d7ee9905.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '3800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Portable wheelchair ramp: </strong>We all know that it’s complicated to transfer a patient or disabled person from the stairs of your home into the vehicles. So, to finish these problems, we designed such portable wheelchair ramps.</p><p><strong>Portable Ramps With Variety: </strong>This portable wheelchair ramp is there to make it wheelchair accessible for the people of determination. And don’t think that the portable wheelchair ramp is of one type. No, we are providing you with portable wheelchair ramps of different lengths and widths to meet other requirements of different people.</p><p><strong>Major Types Of Portable Wheelchair Ramps: </strong>When we talk about types of portable wheelchair ramps, there are two significant types. Some are single fold while others are multi-fold. You will not face any difficulty carrying these ramps with your car to different places as these are easy to maintain.</p>','features' => '<ul><li>&nbsp;10 Feet Portable Ramp</li><li>74×304 CM</li><li>Non-Slip</li></ul>','created_at' => '2024-04-25 23:59:59','updated_at' => '2024-04-26 22:14:59'),
            array('id' => '91','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => 'Fixed Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662a12afb88e1.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '13500','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Permanent Solution To All Your Problems</strong></p><p>You might have some area in your home from where it’s tough to transfer your patient onto the vehicle. So, you must be in search of some sort of permanent solution to it. Don’t worry; we are here with the permanent solution to your problem, which is well known as a fixed wheelchair ramp. These fixed wheelchair ramps are fixed ramps, as their name indicates.</p><p><strong>Fixed Wheelchair Ramp Available With Different Lengths</strong></p><p>Vans are the vehicles for which these fixed wheelchair ramps are best for use. These fixed wheelchair ramps are capable of getting fold, and these are available in different lengths.</p><p>You can easily use all kinds of wheelchairs on these fixed wheelchair ramps once these are set at the place of use.</p>','features' => '<ul><li><strong>Durable Construction:</strong> Constructed from sturdy materials such as concrete, steel, or aluminum to withstand frequent use and varying weather conditions.</li><li><strong>Non-Slip Surface:</strong> Designed with a textured surface or non-slip material to provide traction and prevent slips and falls, especially in wet or icy conditions.</li><li><strong>Permanent Installation:</strong> Installed securely in place, offering a stable and reliable solution for wheelchair users without the need for frequent setup or adjustments.</li><li><strong>Customizable Length and Width:</strong> Can be custom-built to fit the specific dimensions of the location, ensuring seamless integration with the surrounding environment and accommodating different space constraints.</li><li><strong>Handrails and Guardrails:</strong> Many fixed ramps feature integrated handrails or guardrails for added safety and stability while ascending or descending.</li><li><strong>Compliance:</strong> Designed to meet accessibility standards and regulations, including slope requirements, handrail specifications, and other relevant guidelines to ensure accessibility for individuals with disabilities.</li><li><strong>Weather-Resistant:</strong> Often equipped with weather-resistant coatings or finishes to withstand exposure to the elements and maintain durability over time.</li><li><strong>Low Maintenance:</strong> Requires minimal upkeep once installed, reducing the need for regular maintenance or adjustments.</li><li><strong>Weight Capacity:</strong> Engineered to support a specific weight capacity, accommodating users of varying sizes and mobility devices safely.</li><li><strong>Accessibility Options:</strong> May include additional features such as transition plates, threshold ramps, or landing platforms to enhance accessibility and usability for wheelchair users and individuals with mobility aids.</li></ul>','created_at' => '2024-04-26 00:22:07','updated_at' => '2024-04-26 00:22:07'),
            array('id' => '92','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => 'Portable Wheelchair Ramp 6 Feet-PR06','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662bb4ba69642.png','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '2800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>A 6 feet portable THUNDER wheelchair ramp is a handy accessibility tool designed to make buildings or vehicles more wheelchair-friendly. It provides a gradual incline for wheelchair users to easily navigate steps, curbs, or thresholds. Portable ramps are often made of lightweight materials like aluminum, making them easy to transport and set up as needed. They come in various styles and designs to accommodate different environments and user needs.</p>','features' => '<p><strong>Material</strong>: Typically made from durable and lightweight materials like aluminum or fiberglass to ensure both strength and portability.</p><p><strong>Foldable Design</strong>: Many portable ramps are designed to fold in half or retract to a compact size for easy transportation and storage.</p><p><strong>Weight Capacity</strong>: Ramps are usually rated for a specific weight capacity to accommodate various wheelchair users and mobility devices.</p><p><strong>Surface Texture</strong>: The ramp\'s surface often includes a non-slip texture or coating to provide traction and ensure safety, especially in wet conditions.</p><p><strong>Width and Length</strong>: The ramp dimensions, including width and length, are crucial to ensure compatibility with different spaces and mobility needs.</p><p><strong>Adjustable Height</strong>: Some ramps offer adjustable legs or settings to accommodate different heights and angles.</p><p><strong>Safety Features</strong>: Look for features like side rails or raised edges to prevent wheelchairs from slipping off the ramp during use.</p><p><strong>Easy Setup</strong>: Quick and easy setup is essential for portable ramps, allowing users to deploy them whenever and wherever needed without hassle.</p><p><strong>Weather Resistance</strong>: Ideally, the ramp should be weather-resistant to withstand outdoor conditions such as rain, snow, or UV exposure.</p><p><strong>Compliance</strong>: Ensure that the ramp meets relevant safety and accessibility standards, such as ADA (Americans with Disabilities Act) requirements, if applicable.</p><p>When considering a specific product like the "Thunder 6 feet portable wheelchair ramp," it\'s essential to review its detailed specifications, customer reviews, and any additional features it may offer to meet your specific needs and preferences.</p>','created_at' => '2024-04-27 06:05:46','updated_at' => '2024-04-27 06:05:46'),
            array('id' => '93','brand_id' => '1','category_id' => '5','sub_category_id' => '15','name' => 'Thunder- Portable Wheelchair Ramp- 6 feet','serial_number' => NULL,'engine_number' => NULL,'model' => 'pr06','thumbnail' => 'images/product/662c9aa569015.png','quantity' => '10','maintenance' => '2','warranty' => '12','price' => '2800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>Introducing the Thunder Portable Wheelchair Ramp, your solution to accessibility on the go! Designed with convenience and durability in mind, this 6-foot ramp provides a smooth and secure transition for wheelchair users over obstacles such as curbs, steps, and thresholds. Crafted from lightweight yet sturdy materials, it\'s easily portable and can be set up in seconds, making it ideal for both indoor and outdoor use. Whether you\'re navigating through doorways or accessing vehicles, the Thunder Ramp ensures independence and ease of movement wherever you go. Say goodbye to barriers and hello to freedom with the Thunder Portable Wheelchair Ramp!</p>','features' => '<p><strong>Sturdy Construction:</strong> Constructed from high-quality materials, the ramp provides a stable and reliable surface for wheelchair users.</p><p><strong>6-Foot Length:</strong> With a length of 6 feet, this ramp provides ample coverage for overcoming obstacles such as curbs, steps, and thresholds.</p><p><strong>Portable Design:</strong> Lightweight and easy to transport, the ramp can be folded and carried with ease, making it perfect for travel and use in various locations.</p><p><strong>Quick Setup:</strong> The ramp is designed for quick and hassle-free setup, allowing users to deploy it in seconds without the need for complex assembly.</p><p><strong>Non-Slip Surface:</strong> Equipped with a non-slip surface, the ramp offers enhanced traction and safety for wheelchair users, even in wet or slippery conditions.</p><p><strong>Versatile Use:</strong> Suitable for both indoor and outdoor use, the Thunder Ramp can be used in various environments, including homes, businesses, and public spaces.</p><p><strong>Durable and Weather-Resistant:</strong> Built to withstand the elements, the ramp is durable and weather-resistant, ensuring long-lasting performance in a range of conditions.</p><p><strong>Adjustable Height:</strong> Some models may feature adjustable height options to accommodate different thresholds or inclines, providing added flexibility for users.</p>','created_at' => '2024-04-27 22:26:45','updated_at' => '2024-06-08 03:04:20'),
            array('id' => '94','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'Thunder-B01 Manual Medical Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cbc0bdd42f.png','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '1760','discount' => '10','delivery_charges' => '40','type' => 'Rent','special' => 'Yes','status' => 'Unpublish','description' => '<p>The B01 Medical Bed is a state-of-the-art healthcare equipment designed to provide optimal comfort and care for patients in medical facilities. With advanced features such as adjustable height, backrest, and leg rest, it offers customizable positioning to accommodate various medical needs and ensure patient comfort. The bed is engineered with sturdy materials for durability and safety, with easy-to-use controls for healthcare professionals to adjust settings efficiently. Its ergonomic design promotes patient mobility and accessibility, facilitating smoother caregiving processes. The B01 Medical Bed represents a modern solution tailored to enhance patient recovery and well-being within healthcare environments. Overall, the B01 Medical Bed combines comfort, safety, and versatility to support optimal patient care and improve healthcare outcomes.</p>','features' => '<ul><li>Adjustable Positions: The bed offers customizable positioning options, including height adjustment, backrest recline, and leg rest elevation, allowing healthcare professionals to optimize patient comfort and support.</li><li>Sturdy Construction: Engineered with high-quality materials, the B01 Medical Bed ensures durability and stability, providing a secure platform for patient care.</li><li>User-Friendly Controls: Intuitive controls enable healthcare staff to easily adjust bed settings, facilitating efficient caregiving and enhancing patient experience.</li><li>Mobility and Accessibility: The bed is designed with features to promote patient mobility and accessibility, including siderails for safety and ease of movement.</li><li>Pressure Redistribution: Equipped with pressure redistribution technology, the bed helps prevent pressure ulcers by evenly distributing weight and reducing pressure points.</li><li>Integration Capabilities: Some models may offer integration with medical monitoring systems or electronic health records, allowing for seamless data collection and management.</li><li>Easy Maintenance: Designed for easy cleaning and maintenance, the bed minimizes downtime and ensures hygienic conditions in healthcare environments.</li><li>Optional Accessories: Various optional accessories, such as IV poles, bedside tables, and patient lift systems, may be available to enhance functionality and meet specific patient care needs.</li></ul>','created_at' => '2024-04-28 00:49:16','updated_at' => '2024-07-06 08:53:21'),
            array('id' => '95','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'Thunder-B02 Electric Medical Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cc15501c07.png','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '3520','discount' => '3200','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<ol><li>High-Density Memory Foam</li><li>Cooling Gel Infusion</li><li>Orthopedic Support</li><li>Hypoallergenic Cover</li><li>Durable Construction</li></ol><p><strong>High-Density Memory Foam:</strong> Sink into the plush comfort of our high-density memory foam that contours to your body, relieving pressure points and ensuring a restful night\'s sleep.&nbsp;</p><p><strong>Cooling Gel Infusion:</strong> Say goodbye to overheating during the night! Our innovative cooling gel infusion technology regulates temperature, keeping you cool and comfortable all night long.&nbsp;</p><p><strong>Orthopedic Support:</strong> Experience unparalleled support for your spine and joints. Our mattress is orthopedically designed to promote proper alignment and alleviate aches and pains.</p><p><strong>&nbsp;Hypoallergenic Cover</strong>: Sleep peacefully knowing that our hypoallergenic cover protects you from allergens and dust mites, ensuring a clean and healthy sleeping environment.&nbsp;</p><p><strong>Durable Construction:</strong> Built to last, our mattress is made from premium materials that are designed to withstand years of use without sagging or losing shape.</p>','features' => '<ul><li>High quality engineering ABS plastic head &amp; feet board</li><li>Overall punching cold carbon steel bed frame which is stable and reliable</li><li>High-quality stainless steel side rails can protect patients from falling</li><li>ABS independent locking system mute casters help to move the bed easily</li><li>ROHS &amp; CE certificated high quality and powerful electric pushrods and controllers</li><li>Electric Adjustability: Effortlessly adjust the head and foot sections of the bed with precision, allowing patients to find their preferred positions for rest, recovery, or activities.</li><li>Sturdy Construction: Built with high-quality materials, the Thunder-B02 ensures durability and stability, providing reliable support for patients of varying needs and sizes.</li><li>Quiet Operation: Equipped with electric motors that operate smoothly and quietly, minimizing disturbances during adjustments and promoting a restful environment for patients.</li><li>Easy-to-Use Controls: Intuitive controls make it simple for caregivers to operate the bed, facilitating efficient patient care and positioning adjustments.</li><li>Safety Features: Includes siderails for added patient safety, which can be easily raised or lowered as needed to prevent falls or accidents.</li><li>Compact Design: Despite its robust features, the Thunder-B02 boasts a space-saving design suitable for use in a variety of healthcare settings, including clinics, hospitals, and home care environments.</li></ul>','created_at' => '2024-04-28 01:11:49','updated_at' => '2024-07-13 02:39:59'),
            array('id' => '96','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'Thunder-B03 Electric Medical Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cc3d5765d0.png','quantity' => '8','maintenance' => '0','warranty' => '0','price' => '5200','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p>The <strong>Thunder-B03 Electric Medical Bed</strong> boasts a versatile design that combines functionality with ergonomic <strong>comfort</strong>. Its fully <strong>adjustable </strong>positions, including head and foot elevation, allow for customized positioning to accommodate individual preferences and medical requirements. Whether it\'s facilitating comfortable rest, aiding in therapy sessions, or assisting with patient mobility, this bed offers unparalleled versatility to support various healthcare activities.</p><p>Caregivers will appreciate the <strong>user-friendly</strong> nature of the <strong>Thunder-B03 Electric Medical Bed</strong>. Equipped with intuitive controls, including a handheld remote, adjusting bed positions and settings is effortless, streamlining patient care and minimizing strain on caregivers. Additionally, the bed features locking casters for secure positioning and mobility, ensuring stability and safety during transfers and adjustments.</p><p>Constructed from high-quality materials and built to rigorous standards, the <strong>Thunder-B03 Electric Medical Bed</strong> prioritizes durability and reliability. Its sturdy frame and robust mechanisms ensure long-lasting performance, making it an ideal investment for healthcare facilities, hospitals, rehabilitation centers, and home care environments alike.</p><p>Furthermore, patient <strong>comfort </strong>is paramount with the <strong>Thunder-B03 Electric Medical Bed</strong>. The bed\'s mattress platform is designed for optimal support and pressure relief, promoting restful sleep and aiding in the prevention of bedsores. Additionally, the bed\'s sleek and modern design complements any healthcare setting, creating a welcoming and comforting environment for patients.</p><p>In conclusion, the <strong>Thunder-B03 Electric Medical Bed</strong> represents a pinnacle of innovation and <strong>quality </strong>in patient care. With its advanced features, user-friendly design, and focus on comfort and safety, it sets a new standard for electric medical beds, empowering both patients and caregivers to achieve optimal outcomes in healthcare delivery.</p>','features' => '<ul><li>Weight Capacity 200 Kg</li><li>Size: 2130x950x470/700mm</li><li>High quality engineering ABS plastic head &amp; feet board</li><li>Overall punching cold carbon steel bed frame which is stable and reliable</li><li>ABS plastic hydraulic side rails to protect patient from falling off bed</li><li>ABS double sides casters</li><li>ROHS &amp; CE certificated high quality and powerful electric pushrods and controllers</li></ul>','created_at' => '2024-04-28 01:22:29','updated_at' => '2024-07-13 20:34:23'),
            array('id' => '97','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'Thunder-B05 Electric Medical Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cc7e6e6b56.png','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '7600','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'No','status' => 'Unpublish','description' => '<ul><li>Innovative 5-function electric medical bed</li><li>Adjustable height for customized patient positioning</li><li>Backrest and leg rest adjustments for optimal comfort</li><li>Tilt function for easy patient repositioning</li><li>Advanced Design: Engineered for superior patient comfort and caregiver convenience.</li><li>Customizable Functions: Adjustable height, backrest, leg rest, tilt, and trendelenburg positions to meet diverse patient needs.</li><li>Enhanced Mobility: Effortlessly reposition patients with precision and ease.</li><li>Optimal Comfort: Designed to provide maximum comfort during extended use.</li><li>Reliable Support: Built with quality materials for long-lasting durability and reliability.</li><li>Streamlined Care: Simplify patient care with intuitive controls and versatile functionality.</li><li>Versatile Applications: Ideal for hospitals, clinics, nursing homes, and home care settings.</li></ul>','features' => '<ol><li>Back adjustment 0~80°</li><li>Leg adjustment 0~45°</li><li>Back &amp; leg adjustment together</li><li>Height adjustment 400~700mm</li><li>Trendelenburg≤15°6. reversed trendelenburg≤15°</li></ol><ul><li>Outer Size: 2060*1000*400~700mm</li><li>Load Capacity: 250kg</li><li>Bed board: overall punching, carbon steel</li><li>Side rails: 4pcs ABS.</li><li>Casters: center control locking system.</li><li>Head &amp; feet board: high quality ABS</li><li>Mattress: high density 100% sponge with waterproof PU cover</li></ul>','created_at' => '2024-04-28 01:39:51','updated_at' => '2024-07-02 21:50:47'),
            array('id' => '98','brand_id' => '1','category_id' => '8','sub_category_id' => '16','name' => 'Thunder - Pro Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662ccd6605fd4.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '7500','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Unpublish','description' => '<p><strong>Introducing the Thunder - Pro Power Wheelchair</strong>, the ultimate blend of power, performance, and comfort. Engineered for those seeking unparalleled mobility, this advanced wheelchair offers a host of cutting-edge features to enhance everyday life.</p><p>Featuring a sleek design and robust construction, the Thunder - Pro is built to tackle a variety of terrains with ease. Its powerful motor and advanced suspension system ensure a <strong>smooth ride</strong>, whether navigating through busy city streets or exploring outdoor trails.</p><p>Equipped with intuitive controls and <strong>customizable settings</strong>, users can <strong>effortlessly </strong>tailor the wheelchair to their specific needs and preferences. From <strong>adjustable seating positions</strong> to programmable driving modes, the Thunder - Pro provides a personalized experience like no other.</p><p>Designed with user comfort in mind, this wheelchair boasts ergonomic seating, plush padding, and ample legroom for extended periods of use. With its ergonomic design and supportive features, the Thunder - Pro ensures <strong>maximum comfort</strong> and stability, allowing users to maintain their independence and confidence throughout the day.</p><p>Whether for everyday use or adventurous outings, the <strong>Thunder - Pro Power Wheelchair</strong> empowers users to embrace life to the fullest, breaking barriers and redefining what\'s possible. Experience freedom, <strong>performance</strong>, and innovation like never before with the <strong>Thunder - Pro Power Wheelchair</strong>.&nbsp;</p><p>Our wheelchairs are <strong>durable </strong>and <strong>lightweight </strong>and can be <strong>folded </strong>and <strong>fit in any car</strong>.</p>','features' => '<ul><li>Battery: 24V 12AH Lithium battery</li><li>Charger: DC 24V 12 Ah AC 110V-230V</li><li>Max speed: 6km/h</li><li>Driving distance: 25km</li><li>Product size: 600*980*930(mm)</li><li>Rear wheel: 10inch*3inch</li><li>Front wheel: 7inch*2.5inch</li><li>Seat width: 45cm</li><li>Seat depth: 43cm</li><li>Safe load: 130kgs</li><li>Package: 65*38*82(cm)</li><li>N.W/G. W: 26kgs/31kgs</li><li>Auto Foldable&nbsp;</li><li>Comes with Remote control as well&nbsp;</li><li>Frame Material: Aluminum&nbsp;</li><li>Motors: DC250W*2pcs&nbsp;</li><li>Brake Electromagnetic brake&nbsp;</li><li>Charging time: 6 hour&nbsp;</li></ul>','created_at' => '2024-04-28 02:03:18','updated_at' => '2024-07-13 02:40:43'),
            array('id' => '99','brand_id' => '1','category_id' => '8','sub_category_id' => '16','name' => 'Reclining Power Wheelchair MM401','serial_number' => NULL,'engine_number' => NULL,'model' => 'TM401','thumbnail' => 'images/product/662cd21b98fdf.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '9500','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<ul><li>Quick and easy removable battery, Lithium battery 6Ah X 2</li><li>Brushless motor 24V 250W each</li><li>Ergonomically designed cushion with reflects, super comfortable and removable</li><li>With Medical motor and Cylinder to support smooth Reclining of backrest</li><li>Angel adjustable Headrest</li><li>Extendable and comfortable footer</li></ul>','features' => '<ul><li>Weight Capacity: 150KG</li><li>Max Speed: 6KM/hr.</li><li>Driving Range: 16-20KM (2.5-2.8hrs)</li><li>Seat Width: 49-56cm</li><li>Seat Depth: 45cm</li><li>Backrest Height: 52cm</li><li>Motor: Brushless 250W each</li><li>Battery: Lithium 5.8Ah *2</li><li>Driving Range: 16-20KM (2.5-2.8hrs)</li><li>Charger: 2A</li><li>Max Speed: 6KM/hr</li><li>Weight Capacity: 150KG</li><li>N.W: 29.75KG (w/o battery)</li><li>Fold Size: 37*60*79cm</li><li>Unfold Size: 110*60*98cm</li></ul>','created_at' => '2024-04-28 02:23:23','updated_at' => '2024-07-13 02:40:47'),
            array('id' => '100','brand_id' => '1','category_id' => '8','sub_category_id' => '16','name' => 'Power Wheelchair MM201','serial_number' => NULL,'engine_number' => NULL,'model' => 'MM201','thumbnail' => 'images/product/662cd37c6e7ed.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '7500','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<ul><li>Quick and easy removable battery</li><li>Reinforced frame making the wheelchair maximum loads 150kg</li><li>Smart control system, soft and smooth.</li><li>High power motor pair, upgrade to 250W each.</li><li>Ergonomically designed cushion with reflects, super comfortable and removable.</li><li>Flip up armrest, fully foldable footrest</li></ul>','features' => '<ul><li>Weight Capacity: 150KG</li><li>Max Speed: 6KM/hr</li><li>Driving Range: 16-20KM (2.5-3.5hrs)</li><li>Seat Width: 49-56cm</li><li>Seat Depth: 45cm</li><li>Backrest Height: 52cm</li><li>Motor: Brushless 250W each</li><li>Battery: Lithium 5.8Ah X 2</li><li>Driving Range: 16-20KM (2.5-3.5hrs)</li><li>Charger: 2A</li><li>Max Speed: 6KM/hr</li><li>Weight Capacity: 150KG</li><li>N.W: 25.65KG (w/o battery)</li><li>Fold Size: 37*60*79cm</li><li>Unfold Size: 110*60*98cm</li></ul>','created_at' => '2024-04-28 02:29:16','updated_at' => '2024-07-13 02:40:50'),
            array('id' => '101','brand_id' => '1','category_id' => '8','sub_category_id' => '16','name' => 'Power Wheelchair MM101','serial_number' => NULL,'engine_number' => NULL,'model' => 'MM101','thumbnail' => 'images/product/662cd3f85e0c2.jpg','quantity' => '2','maintenance' => '0','warranty' => '0','price' => '8800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<ul><li>Strong Aluminum frame with a total weight of 19.5kg (w/o battery)</li><li>Seat width is 45cm, comfortable cushion</li><li>Brushless motor pair, powerful and lightweight</li><li>With a lithium battery 24V 11Ah, drives up to 15-18km</li><li>Controller with USB charge port and headlight</li></ul>','features' => '<ul><li>Driving Range: 16-20KM (2.5-3.5hrs)</li><li>Weight Capacity: 125KG</li><li>Max Speed: 6KM/hr</li><li>Seat Width: 45cm</li><li>Seat Depth: 43cm</li><li>Motor: Brushless 180W each</li><li>Battery: Lithium 10.4Ah</li><li>Driving Range: 16-20KM (2.5-3.5hrs)</li><li>Charger: 2A</li><li>Max Speed: 6KM/hr</li><li>Weight Capacity: 125KG</li><li>N.W: 19.5KG (w/o battery)</li><li>Fold Size: 58*37*87cm</li><li>Unfold Size: 58*94*101cm</li></ul>','created_at' => '2024-04-28 02:31:20','updated_at' => '2024-07-04 22:27:12'),
            array('id' => '102','brand_id' => '1','category_id' => '8','sub_category_id' => '16','name' => 'Camel Hope Power Wheelchair MM301','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cd4a48b185.jpg','quantity' => '2','maintenance' => '0','warranty' => '0','price' => '6800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<ul><li>Strong Aluminum frame with a total weight of 24.65kg (w/o battery)</li><li>Brushed motor 24V 250W each, stable and smooth control</li><li>Suspension system on back of frame</li><li>The Unique dual base rod ensure the wheelchair go straight all the time</li><li>With a bigger seating space but a small folding size</li><li>Fold in 1s, easy and simple for passengers&nbsp;</li></ul>','features' => '<ul><li>Weight Capacity: 135KG</li><li>Max Speed: 6KM/hr</li><li>Driving Range: 13-17KM (2-2.8hrs)</li><li>Seat Width: 45cm</li><li>Seat Depth: 45cm</li><li>Backrest Height: 51cm</li><li>Motor: Brushless 250W each</li><li>Battery: Lithium 10.8Ah</li><li>Driving Range: 13-17KM (2-2.8hrs)</li><li>Charger: 2A</li><li>Max Speed: 6KM/hr</li><li>Weight Capacity: 135KG</li><li>N.W: 25KG (w/o battery)</li><li>Fold Size: 58*37*87cm</li><li>Unfold Size: 58*94*101c</li></ul>','created_at' => '2024-04-28 02:34:12','updated_at' => '2024-07-04 22:27:29'),
            array('id' => '103','brand_id' => '1','category_id' => '8','sub_category_id' => '16','name' => 'Thunder PW-01','serial_number' => NULL,'engine_number' => NULL,'model' => 'PW-01','thumbnail' => 'images/product/662cd7f77092c.jpg','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '3900','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'No','status' => 'Unpublish','description' => '<p>The Thunder PW-01 Power Wheelchair offers a range of innovative features designed to provide users with exceptional mobility and comfort:</p><p>1. <strong>Powerful Motor:</strong> Equipped with a high-performance motor, the Thunder PW-01 delivers smooth and efficient operation, effortlessly navigating various terrains and inclines.</p><p>2. <strong>Advanced Suspension System:</strong> A sophisticated suspension system ensures a comfortable ride by absorbing shocks and vibrations, allowing users to traverse uneven surfaces with confidence.</p><p>3. <strong>Adjustable Seating:</strong> The wheelchair features customizable seating options, including adjustable seat height, depth, and angle, to accommodate individual preferences and ensure proper positioning for optimal comfort and support.</p><p>4. <strong>Intuitive Controls:</strong> Easy-to-use controls allow users to navigate with precision and ease. The joystick controller offers intuitive operation, enabling smooth maneuverability in tight spaces and crowded environments.</p><p>5. <strong>Long-lasting Battery:</strong> With a high-capacity battery, the Thunder PW-01 provides extended range and dependable performance, allowing users to travel longer distances without interruption.</p><p>6. <strong>Compact Design: </strong>Despite its powerful performance, the wheelchair boasts a compact and maneuverable design, making it suitable for indoor use and easy storage in tight spaces.</p><p>7. <strong>Comfortable Seating:</strong> Ergonomically designed seating with padded cushions ensures a comfortable experience, even during extended periods of use. The adjustable armrests and footrests further enhance user comfort and support.</p><p>8. <strong>Safety Features:</strong> Built-in safety features, such as anti-tip wheels and a reliable braking system, provide added peace of mind for users and caregivers, ensuring stability and control at all times.</p><p>9. <strong>Durable Construction: </strong>Constructed from high-quality materials, the Thunder PW-01 is built to withstand daily use and rigorous conditions, ensuring long-lasting durability and reliability.</p><p>10. <strong>Versatile Use:</strong> Whether for indoor navigation, outdoor adventures, or travel, the Thunder PW-01 Power Wheelchair offers versatile functionality, empowering users to maintain their independence and explore the world with confidence.</p><p>Overall, the Thunder PW-01 combines cutting-edge technology, comfort, and durability to provide users with a premium mobility solution that enhances their quality of life.</p>','features' => '<ul><li>MOTOR&nbsp; &nbsp; &nbsp;180*2 BRUSH</li><li>BATTERY&nbsp; &nbsp; 24V 12AH LEAD ACID</li><li>CONTROLLER&nbsp; &nbsp; IMPORTEDL 360% JOYSTICK</li><li>MAX LOADING&nbsp; &nbsp; 120KG</li><li>CHARGING TIME&nbsp; &nbsp; 5-7H</li><li>SPEED&nbsp; &nbsp; &nbsp;0-6KM/H</li><li>TURNING RADIUS&nbsp; &nbsp; &nbsp;60CM</li><li>CLIMBING ABILIT&nbsp; &nbsp; &nbsp;≤13</li><li>DRIVING DISTANCE&nbsp; &nbsp; &nbsp;15~20KM</li><li>SEAT&nbsp; &nbsp; &nbsp;W44 141 T4CM</li><li>BACKREST&nbsp; &nbsp; &nbsp;W44 H30 T4CM</li><li>FRONT WHEEL&nbsp; &nbsp; 8 INCH(SOLID)</li><li>REAR WHEEL&nbsp; &nbsp; &nbsp;12 INCH(PNEUMATIC)</li><li>SIZE (UNFOLDED)&nbsp; &nbsp; &nbsp;103*55*88CM</li><li>SIZE(FOLDED)&nbsp; &nbsp; &nbsp;55*21*69CM</li><li>PACKING SIZE&nbsp; &nbsp; &nbsp;68*35*73CM</li><li>G.W.&nbsp; &nbsp; &nbsp; 36KG</li><li>N.W.(WITHBATTERY)&nbsp; &nbsp; &nbsp;31KG</li><li>N.W.(WITHOUT BATTERY) 25KG</li></ul>','created_at' => '2024-04-28 02:48:23','updated_at' => '2024-07-04 22:29:34'),
            array('id' => '104','brand_id' => '1','category_id' => '9','sub_category_id' => '20','name' => 'Alerta Car Transit Wheelchair, Crash Tested','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cd8d816b00.jpg','quantity' => '2','maintenance' => '0','warranty' => '0','price' => '1400','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p>Introducing the Alerta Car Transit Wheelchair: rigorously crash-tested for utmost safety and equipped with essential features for comfortable and secure transportation.</p><p>This wheelchair boasts drop-down armrests, swing-away detachable footrests, arm pads, lap belt, and rear brakes, all complemented by 30cm rear wheels and 20cm front wheels, each fitted with puncture-proof tires. The seat dimensions measure 40cm in depth and 43cm in width, ensuring ample support and comfort during travel.</p><p>Mobility is not just about movement; it\'s about freedom and independence. For individuals reliant on wheelchairs, safety during transit is paramount. Enter the Alerta Car Transit Wheelchair – a game-changer in the realm of mobility aids, proudly bearing the badge of "Crash Tested."</p><p>In a world where safety certifications are crucial but often overlooked, the Alerta Car Transit Wheelchair stands out as a beacon of reassurance. This innovative wheelchair has undergone rigorous crash testing to ensure it meets stringent safety standards, providing users and caregivers with peace of mind during travel.</p><p>What sets the Alerta Car Transit Wheelchair apart is its unwavering commitment to safety without compromising on comfort or functionality. Designed with the user\'s well-being in mind, it boasts a range of features tailored to enhance both safety and convenience.</p><p>First and foremost, the Alerta Car Transit Wheelchair is engineered with robust materials and construction techniques, ensuring durability and resilience in the face of unexpected impacts. Its reinforced frame and secure fastenings are meticulously crafted to withstand the forces exerted during transit, minimizing the risk of injury to the user.</p><p>Moreover, this wheelchair prioritizes user comfort without sacrificing safety. Its ergonomic design, padded seating, and adjustable features ensure a snug and supportive fit, promoting proper posture and reducing discomfort during extended periods of use.</p><p>In addition to its crash-tested credentials, the Alerta Car Transit Wheelchair is equipped with a host of practical features to streamline the travel experience. From its lightweight and foldable design for easy storage and transport to its intuitive locking mechanisms for secure attachment in vehicles, every aspect is thoughtfully engineered for maximum convenience.</p><p>For caregivers and healthcare professionals, the Alerta Car Transit Wheelchair represents more than just a mobility aid – it\'s a symbol of trust and reliability. Its crash-tested certification offers tangible evidence of its commitment to user safety, instilling confidence in those responsible for the well-being of wheelchair users.</p><p>In a world where mobility knows no bounds, the Alerta Car Transit Wheelchair stands as a testament to innovation and excellence. By raising the bar for safety standards in mobility aids, it empowers individuals to embark on journeys with confidence, knowing that their well-being is in capable hands.</p><p>In conclusion, the Alerta Car Transit Wheelchair is not just a mobility aid; it\'s a lifeline, offering safety, comfort, and peace of mind to users and caregivers alike. With its crash-tested certification, it sets a new benchmark for excellence in mobility, ensuring that every journey is a safe and secure one.</p>','features' => '<ul><li>Crash tested</li><li>Drop down arms</li><li>Padded armrests</li><li>Lap belt</li><li>Swing away detachable footrests</li><li>Puncture proof tyres</li><li>Max user weight: 115kg</li></ul><p><br>The Alerta Car Transit Wheelchair, Crash Tested, offers a range of features tailored to ensure safety, comfort, and convenience during travel:</p><p><strong>Crash Tested Certification:</strong> Rigorously tested to meet stringent safety standards for transportation, providing assurance of reliability and durability during transit.</p><p><strong>Robust Construction:</strong> Engineered with a reinforced frame and durable materials to withstand impacts and ensure stability and security for the user.</p><p><strong>Secure Fastenings:</strong> Equipped with reliable fastening systems, including seatbelt and wheelchair tie-downs, to securely anchor the wheelchair in place within vehicles and prevent movement during transit.</p><p><strong>Ergonomic Design:</strong> Designed with user comfort in mind, featuring ergonomic seating, padded armrests, and adjustable footrests for optimal support and posture.</p><p><strong>Compact and Foldable:</strong> Compact and foldable design for easy storage and transport, allowing for convenient use in various vehicles and travel situations.</p><p><strong>Lightweight Construction:</strong> Lightweight yet sturdy construction for effortless handling and maneuverability, reducing strain for caregivers and facilitating ease of use.</p><p><strong>Adjustable Features:</strong> Adjustable seat height, backrest angle, and footrests to accommodate individual preferences and ensure a customized fit for maximum comfort.</p><p><strong>Accessible Design:</strong> Designed with accessibility in mind, featuring easy-to-operate brakes, armrests that flip up for easy transfers, and a user-friendly locking mechanism for secure attachment in vehicles.</p><p><strong>Versatile Use:</strong> Suitable for use in a variety of vehicles, including cars, vans, and buses, making it ideal for everyday commuting, medical appointments, and travel adventures.</p><p><strong>Compliance with Regulations:</strong> Designed and manufactured in accordance with relevant safety regulations and standards for wheelchair transportation, ensuring legal compliance and peace of mind for users and caregivers.</p><p>Overall, the Alerta Car Transit Wheelchair, Crash Tested, combines advanced safety features, ergonomic design, and user-friendly functionality to provide a reliable and comfortable transportation solution for individuals with mobility needs</p>','created_at' => '2024-04-28 02:52:08','updated_at' => '2024-07-11 21:24:46'),
            array('id' => '105','brand_id' => '1','category_id' => '8','sub_category_id' => '16','name' => 'Thunder PW-02','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cda55d55d0.jpg','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '3000','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'No','status' => 'Unpublish','description' => '<p>What truly sets the<strong> Thunder PW-02</strong> apart, however, is its unwavering commitment to <strong>customization </strong>and <strong>personalization</strong>. With intuitive controls and customizable settings, users have the <strong>freedom </strong>to tailor the wheelchair to their <strong>unique </strong>needs and preferences. Whether <strong>adjusting seating positions</strong>, fine-tuning driving modes, or selecting preferred accessories, the <strong>Thunder PW-02</strong> puts the power in your hands, quite literally.</p><p><strong>Safety is paramount</strong>, and the <strong>Thunder PW-02</strong> leaves no stone unturned in this regard. Built with a robust frame and equipped with advanced safety features such as <strong>anti-tip wheels</strong> and a <strong>reliable braking system</strong>, this wheelchair prioritizes user <strong>safety </strong>and peace of mind at every turn.</p><p><strong>Compact yet capable</strong>, the <strong>Thunder PW-02</strong> is designed for seamless integration into your daily life. Its sleek and modern design not only looks the part but also offers practical features such as foldable components for easy storage and transport, ensuring that you\'re always ready to embark on your next adventure, wherever it may lead.</p><p>In conclusion, the <strong>Thunder PW-02 </strong>Power Wheelchair is more than just a mobility aid – it\'s a symbol of empowerment and freedom. With its unmatched combination of power, comfort, and customization, it empowers users to embrace life on their own terms, breaking barriers and redefining what\'s possible. Experience the thrill of true mobility with the <strong>Thunder PW-02</strong> by your side, and let nothing hold you back from reaching new heights.</p>','features' => '<ul><li>Overall Length&nbsp; &nbsp; &nbsp;113cm</li><li>Vehicle Width&nbsp; &nbsp; &nbsp; 70cm</li><li>Overall Height&nbsp; &nbsp; &nbsp;90cm</li><li>Base Height&nbsp; &nbsp; &nbsp; 47cm</li><li>The Front/Rear Wheel Size&nbsp; &nbsp; &nbsp; 10/16</li><li>The Vehicle Weight&nbsp; &nbsp; &nbsp; 38kg+7kg</li><li>load weight&nbsp; &nbsp; &nbsp; 100</li><li>Climbing Ability&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;13</li><li>The Motor Power&nbsp; &nbsp; &nbsp; 250W*2</li><li>Battery&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 24V/12AH</li><li>Range&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;10-15KM</li><li>Per Hour&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1-6Km</li><li>High strength carbon steel frame, durable</li><li>Universal controller, 360 degrees flexible control</li><li>armrest can lift, easy to get on and off</li></ul>','created_at' => '2024-04-28 02:58:30','updated_at' => '2024-07-04 22:29:39'),
            array('id' => '106','brand_id' => '2','category_id' => '8','sub_category_id' => '17','name' => 'I Go Fold','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cdb01b60d5.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '13125','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p>The iGo Fold is more than just a wheelchair—it\'s a lifestyle enhancer. With its sleek design and advanced features, it\'s engineered to seamlessly integrate into your daily routine, offering unparalleled freedom and independence wherever life takes you.</p><p>One of the standout features of the iGo Fold is its portability. Designed to be lightweight and compact, it can be easily folded and stowed away in the trunk of a car or even stored in tight living spaces. Say goodbye to bulky, cumbersome wheelchairs—the iGo Fold is here to streamline your mobility needs.</p><p>But don\'t let its compact size fool you—the iGo Fold packs a punch when it comes to performance. With its powerful motor and responsive controls, it effortlessly glides over various terrains, from smooth sidewalks to uneven outdoor surfaces. Whether you\'re running errands around town or exploring new destinations, the iGo Fold ensures a smooth and comfortable ride every time.</p><p>Comfort is another area where the iGo Fold excels. Featuring ergonomic seating, adjustable armrests, and a cushioned backrest, it\'s designed with user comfort in mind. Say goodbye to discomfort and hello to hours of enjoyable mobility, whether you\'re out for a quick trip or an all-day excursion.</p><p>Safety is paramount, and the iGo Fold doesn\'t disappoint in this regard. Equipped with reliable brakes and sturdy construction, it provides users with peace of mind and confidence as they navigate their surroundings. With the iGo Fold, safety is never compromised, allowing you to focus on what truly matters—enjoying life to the fullest.</p><p>In conclusion, the Pride Mobility iGo Fold is more than just a wheelchair—it\'s a lifestyle upgrade. With its combination of portability, performance, comfort, and safety, it empowers users to live life on their own terms, without limitations. Experience the freedom of mobility like never before with the Pride Mobility iGo Fold by your side.</p>','features' => '<ul><li>Remote controlled automatic folding system</li><li>Back seat pocket for extra storage while on-the-go</li><li>Folds by simply pressing a button</li><li>Large foot platform to accommodate the user’s comfort</li><li>Specialty foam seat design for extreme comfort</li></ul><p>This product falls in the indoor product category, and is suitable for indoor use and flat pavements. It is not suitable for grass, gravel or steep slopes. The products performance may also be affected in wet weather conditions.</p>','created_at' => '2024-04-28 03:01:21','updated_at' => '2024-07-13 02:40:53'),
            array('id' => '107','brand_id' => '2','category_id' => '8','sub_category_id' => '17','name' => 'I Go Lite','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cdb9b78105.jpg','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '13399','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'No','status' => 'Unpublish','description' => '<p><strong>Sleek, practical and ultra-lightweight</strong></p><p>The all-new i Go®&nbsp;Lite weighs only 18 kg making it our lightest power chair yet! With a built-in USB charger, you’ll be able to travel and stay connected with the world around you. Its flight-safe batteries mean the sky is your limit - simply unfold and go, for an adventure of a lifetime.</p>','features' => '<ul><li>Large secure under-seat storage compartment</li><li>On-board USB charger</li><li>Adjustable control position</li><li>Stylish Carbon Fibre design</li><li>Simple one-touch folding system</li><li>Compact lightweight design</li></ul><p>This product falls in the indoor product category, and is suitable for indoor use and flat pavements. It is not suitable for grass, gravel or steep slopes. The products performance may also be affected in wet weather conditions.</p>','created_at' => '2024-04-28 03:03:55','updated_at' => '2024-07-04 22:38:00'),
            array('id' => '108','brand_id' => '2','category_id' => '8','sub_category_id' => '17','name' => 'I Go +','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cdc40a7b48.jpg','quantity' => '1','maintenance' => '0','warranty' => '0','price' => '11800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p>Part of the i GO range the i GO+ features front suspension, comfortable seating, convenient storage and ample foot room. The i GO+ has a compact and lightweight design and can fold in just a few simple steps for effortless transport; makes travelling a breeze. Simply unfold and travel with the i Go+.</p>','features' => '<ul><li>A compact and lightweight design makes traveling a breeze</li><li>Back seat pocket for extra storage while on-the-go&nbsp;</li><li>Folds in just a few simple steps for effortless transport</li><li>Includes convenient, under-seat mesh storage bag, mesh cup holder and 1016 mm lap belt</li><li>&nbsp;Large foot platform to accommodate the user’s comfort</li><li>&nbsp;Specialty foam seat design for extra comfort</li></ul><p>This product falls in the indoor product category, and is suitable for indoor use and flat pavements. It is not suitable for grass, gravel or steep slopes. The products performance may also be affected in wet weather conditions.</p>','created_at' => '2024-04-28 03:06:40','updated_at' => '2024-07-08 20:53:25'),
            array('id' => '110','brand_id' => '2','category_id' => '11','sub_category_id' => '19','name' => 'Pride Quest Scooter','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cdec974f2b.jpg','quantity' => '1','maintenance' => '0','warranty' => '0','price' => '11500','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p>With the Pride Quest Folding Scooter, the world is at your fingertips! With a unique folding design, this scooter folds in just three simple steps and fits easily in a car boot. Enjoy full lighting and speeds up to 4 mph.</p><p>Introducing the Pride Quest Scooter, your ticket to freedom and adventure on-the-go. This compact and portable scooter is designed to seamlessly navigate urban streets and outdoor trails alike, offering unparalleled versatility for your mobility needs. With its lightweight yet sturdy construction and convenient disassembly for transport, the Pride Quest Scooter is your ultimate companion for exploring new destinations with ease. Whether you\'re running errands in the city or enjoying a day out in nature, experience the joy of independent mobility with the Pride Quest Scooter by your side.</p>','features' => '<ul><li>Unique folding design</li><li>Folds in just three easy steps</li><li>Adjustable tiller</li><li>Easy to transport</li><li>Can be stowed upright or laid down</li><li>Articulated front end adds greater stability</li><li>Front and rear LED lights</li></ul><p>The Pride Quest Scooter offers a range of features tailored to enhance mobility and convenience for users:</p><p>1. <strong>Compact and Portable:</strong> Designed for easy transport, the Quest Scooter is lightweight and can be quickly disassembled into manageable pieces, making it ideal for travel and storage.</p><p>2. <strong>Versatile Use: </strong>Suitable for both indoor and outdoor use, the scooter is equipped to navigate various terrains, from smooth pavements to uneven surfaces, providing freedom and independence for users.</p><p>3. <strong>Adjustable Tiller:</strong> The tiller, or steering column, is adjustable to accommodate different user heights and preferences, ensuring a comfortable and ergonomic riding experience.</p><p>4. <strong>Long-lasting Battery: </strong>With a high-capacity battery, the Quest Scooter provides extended range and dependable performance, allowing users to travel longer distances without interruption.</p><p>5. <strong>Comfortable Seating: </strong>Featuring a padded seat with adjustable armrests and a swivel function, the scooter prioritizes user comfort during extended rides, reducing fatigue and promoting relaxation.</p><p>6. <strong>Intuitive Controls:</strong> Easy-to-use controls and a user-friendly interface make operating the scooter straightforward, even for first-time users, enhancing accessibility for individuals with limited dexterity or mobility.</p><p>7. <strong>Sturdy Construction:</strong> Built with quality materials and a durable frame, the Quest Scooter offers stability and reliability, ensuring a safe and secure ride for users of varying weights and sizes.</p><p>8. <strong>Convenient Storage:</strong> The scooter includes storage options such as a front basket and a seatback pouch, providing convenient space for carrying personal belongings and essentials during outings.</p><p>9. <strong>Safety Features: </strong>Equipped with features such as anti-tip wheels, rear reflectors, and a horn, the Quest Scooter prioritizes user safety and visibility, reducing the risk of accidents and promoting peace of mind for users and caregivers.</p><p>10. <strong>Customizable Accessories: </strong>Optional accessories, such as a cane holder, oxygen tank holder, or additional rear basket, allow users to customize the scooter to suit their individual needs and preferences.</p><p>Overall, the Pride Quest Scooter combines portability, comfort, and versatility to provide users with a reliable and convenient mobility solution for daily activities and adventures alike.</p>','created_at' => '2024-04-28 03:17:29','updated_at' => '2024-07-13 02:09:28'),
            array('id' => '111','brand_id' => '2','category_id' => '11','sub_category_id' => '19','name' => 'Pride Go Go Elite Traveller Plus','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662cdfe41b285.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '7500','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p><br>The Pride Go-Go Elite Traveller Plus scooter is engineered to provide users with enhanced mobility and convenience. Here are its notable features:</p><p><strong>Portability:</strong> Designed for travel, the Elite Traveller Plus is lightweight and can be easily disassembled into manageable pieces, allowing for effortless transport and storage in vehicles or luggage compartments.</p><p><strong>Extended Range:</strong> Equipped with long-lasting batteries, the scooter offers extended range and reliable performance, allowing users to travel farther distances without needing to recharge frequently.</p><p><strong>Versatile Use:</strong> Suitable for both indoor and outdoor use, the scooter is capable of navigating various terrains, including smooth pavements, shopping malls, and outdoor pathways, providing users with independence and freedom.</p><p><strong>Adjustable Features:</strong> The scooter features an adjustable tiller and padded swivel seat, allowing users to customize the seating position for optimal comfort and support during extended rides.</p><p><strong>User-Friendly Controls:</strong> With intuitive controls and a simple interface, operating the scooter is easy and straightforward, even for individuals with limited dexterity or mobility impairments.</p><p><strong>Compact Design:</strong> The Elite Traveller Plus boasts a compact design that maneuvers easily in tight spaces, making it ideal for use in crowded areas such as shopping centers or public transportation terminals.</p><p><strong>Comfortable Seating:</strong> The scooter\'s padded seat, adjustable armrests, and ergonomic design ensure a comfortable and enjoyable riding experience, reducing fatigue and discomfort during extended use.</p><p><strong>Sturdy Construction:</strong> Built with a durable frame and quality materials, the Elite Traveller Plus offers stability and reliability, providing users with a safe and secure ride.</p><p><strong>Convenient Storage:</strong> Equipped with a front basket and seatback pouch, the scooter provides convenient storage space for personal belongings and essentials while on the go.</p><p><strong>Safety Features:</strong> The scooter includes safety features such as anti-tip wheels, rear reflectors, and a horn, enhancing user safety and visibility on the road or in crowded environments.</p><p>Overall, the Pride Go-Go Elite Traveller Plus scooter combines portability, comfort, and reliability to provide users with a versatile and convenient mobility solution for everyday activities and travel adventures.</p><p>&nbsp;</p><p>&nbsp;</p><p><br>&nbsp;</p>','features' => '<ul><li>Feather-touch disassembly</li><li>Delta tiller with wraparound handles</li><li>Pride’s exclusive black, non-scuffing tyres</li><li>Auto-connecting front to rear cable</li><li>Includes 2 sets of easily changeable coloured panels – Red and Blue</li><li>Front frame-mounted seat post offers maximum stability</li><li>Frame design easily disassembles into 5 super lightweight pieces for convenient transport and storage</li><li>Modular design for easy serviceability</li><li>Microprocessor-based controller offers optimal power management and added safety features</li><li>Front tiller-mounted basket</li><li>Removable footboard basket for additional storage (4-wheel version only)</li><li>Convenient off-board dual voltage charger can charge battery pack on-board or off-board</li></ul>','created_at' => '2024-04-28 03:22:12','updated_at' => '2024-07-04 22:43:39'),
            array('id' => '112','brand_id' => '1','category_id' => '9','sub_category_id' => '20','name' => 'Alerta Self Propelled Wheelchair - Crash Tested','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662ce137cab8b.jpg','quantity' => '4','maintenance' => '0','warranty' => '0','price' => '1550','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Unpublish','description' => '<p>Introducing the Alerta Car Transit Wheelchair: rigorously crash-tested for utmost safety and equipped with essential features for comfortable and secure transportation.</p><p>This wheelchair boasts drop-down armrests, swing-away detachable footrests, arm pads, lap belt, and rear brakes, all complemented by 30cm rear wheels and 20cm front wheels, each fitted with puncture-proof tires. The seat dimensions measure 40cm in depth and 43cm in width, ensuring ample support and comfort during travel.</p><p>Mobility is not just about movement; it\'s about freedom and independence. For individuals reliant on wheelchairs, safety during transit is paramount. Enter the Alerta Car Transit Wheelchair – a game-changer in the realm of mobility aids, proudly bearing the badge of "Crash Tested."</p><p>In a world where safety certifications are crucial but often overlooked, the Alerta Car Transit Wheelchair stands out as a beacon of reassurance. This innovative wheelchair has undergone rigorous crash testing to ensure it meets stringent safety standards, providing users and caregivers with peace of mind during travel.</p><p>What sets the Alerta Car Transit Wheelchair apart is its unwavering commitment to safety without compromising on comfort or functionality. Designed with the user\'s well-being in mind, it boasts a range of features tailored to enhance both safety and convenience.</p><p>First and foremost, the Alerta Car Transit Wheelchair is engineered with robust materials and construction techniques, ensuring durability and resilience in the face of unexpected impacts. Its reinforced frame and secure fastenings are meticulously crafted to withstand the forces exerted during transit, minimizing the risk of injury to the user.</p><p>Moreover, this wheelchair prioritizes user comfort without sacrificing safety. Its ergonomic design, padded seating, and adjustable features ensure a snug and supportive fit, promoting proper posture and reducing discomfort during extended periods of use.</p>','features' => '<ul><li>60cm rear self-propelled wheels</li><li>20cm front wheels</li><li>Seat size: 40cm deep x 45cm wide</li><li>Max user weight: 115kg</li><li>Crash tested</li><li>Self-propelled rear wheels</li><li>Wave profile self-propel rim</li><li>Detachable table-entry arms</li><li>Padded armrests</li><li>Lap belt</li><li>Swing away detachable footrests</li><li>Puncture proof tyres</li><li>Rear wheel brakes</li><li>Heel loops</li></ul>','created_at' => '2024-04-28 03:27:51','updated_at' => '2024-07-13 03:30:09'),
            array('id' => '113','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Reclining Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662f6a6ecf1f8.jpg','quantity' => '1','maintenance' => '0','warranty' => '0','price' => '9500','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => '<ul><li>Quick and easy removable battery, Lithium battery 6Ah X 2</li><li>Brushless motor 24V 250W each</li><li>Ergonomically designed cushion with reflects, super comfortable and removable</li><li>With Medical motor and Cylinder to support smooth Reclining of backrest</li><li>Angel adjustable Headrest</li><li>Extendable and comfortable footer</li></ul>','features' => '<ul><li>Weight Capacity: 150KG</li><li>Max Speed: 6KM/hr.</li><li>Driving Range: 16-20KM (2.5-2.8hrs)</li><li>Seat Width: 49-56cm</li><li>Seat Depth: 45cm</li><li>Backrest Height: 52cm</li><li>Motor: Brushless 250W each</li><li>Battery: Lithium 5.8Ah *2</li><li>Driving Range: 16-20KM (2.5-2.8hrs)</li><li>Charger: 2A</li><li>Max Speed: 6KM/hr</li><li>Weight Capacity: 150KG</li><li>N.W: 29.75KG (w/o battery)</li><li>Fold Size: 37*60*79cm</li><li>Unfold Size: 110*60*98cm</li></ul>','created_at' => '2024-04-30 01:37:51','updated_at' => '2024-05-13 23:14:43'),
            array('id' => '114','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Power Wheelchair MM201','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662f977983902.jpg','quantity' => '1','maintenance' => '0','warranty' => '0','price' => '7500','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-04-30 04:50:01','updated_at' => '2024-05-13 23:14:52'),
            array('id' => '115','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Power Wheelchair MM101','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662f9a26918aa.jpg','quantity' => '1','maintenance' => '0','warranty' => '0','price' => '8800','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-04-30 05:01:26','updated_at' => '2024-05-13 23:15:01'),
            array('id' => '116','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Camel Hope Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662f9a89b1ebe.jpg','quantity' => '1','maintenance' => '0','warranty' => '0','price' => '6800','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-04-30 05:03:05','updated_at' => '2024-05-13 23:15:12'),
            array('id' => '117','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Thunder PW-01','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/662f9b19e9992.jpg','quantity' => '1','maintenance' => '0','warranty' => '0','price' => '3900','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-04-30 05:05:30','updated_at' => '2024-05-13 23:15:18'),
            array('id' => '118','brand_id' => '4','category_id' => '7','sub_category_id' => '21','name' => 'Wheelchair Lift E-1050','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6639ecc938f66.jpg','quantity' => '5','maintenance' => '0','warranty' => '5','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<h2><strong>The Essential Wheelchair Lift</strong></h2><p>The E-Series is the next generation workhorse from a brand that is synonymous with high-quality wheelchair lifts. Trusted for over 40 years, BraunAbility has reinvented the wheelchair lift. A modern take on simple, effective and reliable. But there’s one thing about the E-Series that is more than meets the eye. Its superior platform stability.</p><ul><li><strong>Premium Rigidity</strong></li></ul><p>We have revolutionised the rigidity of the platform making a performance improvement of 300 percent. The closed box design in the parallel arms is what enables this increase in rigidity.</p><p>On a standard wheelchair lift with dual parallel arms, the platform will deflect under uneven loads causing it to sway and skew. This can make anyone on the platform uneasy or even scared. Keep in mind that just by being on the platform you are already in a vulnerable position.</p><p>The E-Series wheelchair lifts completely change this, providing a stable and comfortable user experience.</p><h3><strong>Platform Types</strong></h3><p>The E-Series wheelchair lifts come in three different platform types, Folding, Split and Solid. They are all well-proven platform types that have their own benefits. Choose the platform type that best suits your application.</p><ul><li><strong>Folding platform - Maximum length, shortest height</strong></li></ul><p>As the name suggests this platform type folds horizontally when stowed. Effectively making a long platform, short when stowed and thereby making it possible to install in a vehicle with a low roof. This is useful for longer mobility devices that need the extra platform space, such as scooters and power chairs. Another use of the folding design is to keep stowed platform below the rear window. This way the vehicle\'s driver and passengers can have an unblocked view through the window.</p><ul><li><strong>Split platform - Out of sight and out of the way</strong></li></ul><p>This platform type stows by splitting down the middle with each part folding up against the sides of the vehicle. In its stowed position the wheelchair lift is out of way and out of sight. This means that the vehicle\'s entrance can always be used to get in and out of the vehicle and does not block the exit in case of an emergency evacuation.&nbsp;The vehicle floor to lift threshold is the lowest on the market making loading easy and reduces the risk of tripping to a minimum.</p><ul><li><strong>Solid platform - The standard platform type</strong></li></ul><p>The perhaps most classic design of a wheelchair lift platform. As the solid platform has less moving parts than other platform types there\'s also less adjustments during installation. Its short depth, leaves more space for seats inside the vehicle. The solid platform is designed for side and rear door installation.</p><p><strong>Designed to be a workhorse</strong></p><p>These lifts are built to be simple and reliable. To function every time they are used, regardless if it’s multiple times a day or once a year. Whether hot or cold, rain or snow, the E-Series lifts will provide accessibility in vehicles to people all over the world.&nbsp;</p><p>The goal of the E-Series is to be the essential lift. There are no unnecessary or costly exclusive features. The design is simple and spare parts are universally interchangeable over the entire series. As an added bonus this design also means fewer points of potential failure and fewer points of service.</p><p><strong>Made of Steel</strong></p><p>We manufacture the E-Series using the same well-proven steel we use in all our lifts. While steel is heavier than aluminium it has two major benefits. The first one is that steel does not flex as much as aluminium. This makes a steel lift a more robust and rigid lift. To make an aluminium lift rigid you would have to choose a thicker gauge or add strengthening elements of design. This will, of course, increase weight considerably.</p><p>The other benefit over&nbsp;aluminium is fatigue cracking. This has proven to be a serious issue with the use of aluminium in wheelchair lifts. Especially in applications where aluminium lifts see heavy use.</p><p><strong>Tested for high product quality</strong></p><p>For decades all BraunAbility inboard lifts have been tested to meet our internal requirement of 32,000 cycles, and the E-Series is no exception. In addition to this, we have also tried to closely simulate real-world conditions. We\'ve stressed the base plate welds to a maximum by performing cycle testing on both rigid and flexible floors.&nbsp;</p><p><br><br>&nbsp;</p>','features' => NULL,'created_at' => '2024-05-08 00:56:41','updated_at' => '2024-07-12 01:30:31'),
            array('id' => '119','brand_id' => '4','category_id' => '7','sub_category_id' => '21','name' => 'Braunability Under Vehilce Lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/663dbd5207ed7.png','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Cassette wheelchair lifts for coaches and transit buses.</strong></p><p>The UVL-Series are well-proven lifts for commercial use. Mounted in the step or other dedicated compartment of the bus, they stay out of sight and out of the way until called upon. The UVL-Series wheelchair lifts are fully automatic and operated by an attendant using a hand-held control.</p><p><br><strong>Reliable</strong></p><p>Our UVL lifts are high-quality well-proven workhorses. These lifts are installed in thousands of buses and used daily all over the world. Each unit goes under rigorous scrutiny both during and at the end of the production phase. We do this to ensure a lift that will do its job and continue to do so for a long, long time.</p><p><strong>Discreet installation</strong></p><p>The cassette form makes it possible to hide the lift where it won’t interfere with anyone’s view, be it passenger or driver. Nor will it take up valuable floor space giving the bus flexibility in floor plan design. A common place to install the UVL-Series is in the step of the bus, but it can also be any other dedicated compartment.</p><p><strong>Handheld control</strong></p><p>A handheld 3-button control is used to operate all lift functions. Each button is marked clearly making it easy to understand and use. The handheld control is made of durable plastic and designed to withstand weather, abuse and heavy usage.</p><p><strong>Manual Backup</strong></p><p>In the event of a complete vehicle electrical failure, the UVL-Series will still be fully operational thanks to a manual backup system. This allows the operator to manually raise and lower the platform using a hand pump. The backup system is easy to use and fully functional even under high loads. The manual backup system is a standard feature included in all UVL lifts.</p><p><strong>Anti-slip</strong></p><p>As an added safety feature the platform of the UVL-Series has been given a slip-resistant surface. This provides wheelchair users and operator with a good grip even when wet.</p><p><strong>Quiet and rattle free</strong></p><p>The UVL-Series is smooth and quiet in operation. The rattle-free design provides a pleasant ride while driving.</p><p><strong>Tested and approved</strong></p><p>We take safety very seriously. That\'s why we put all our products through rigorous testing. The UVL-Series wheelchair lifts are EMC test approved. They fulfil the requirements to bear the CE-label as well as the E5 label for type approval.</p><p>&nbsp;</p>','features' => '<h3>UVL855 R24</h3><p><br><strong>Dimension</strong></p><figure class="table"><table><tbody><tr><td>Platform width</td><td>760 mm</td></tr><tr><td>Platform length</td><td>1350 mm</td></tr><tr><td>Length</td><td>1840 mm</td></tr><tr><td>Width</td><td>1100 mm</td></tr><tr><td>Height</td><td>130 mm</td></tr><tr><td>Floor to ground</td><td>1600 mm</td></tr><tr><td>Required door width</td><td>1100 mm</td></tr><tr><td>Minimum overlap</td><td>38 mm</td></tr><tr><td>Max travel down</td><td>930 mm</td></tr><tr><td>Max travel up</td><td>670 mm</td></tr><tr><td>Min travel up</td><td>120 mm</td></tr><tr><td>Max travel out</td><td>80 mm</td></tr></tbody></table></figure><p><strong>Weights</strong></p><figure class="table"><table><tbody><tr><td>Weight capacity</td><td>340 kg</td></tr><tr><td>Unit weight</td><td>263 kg</td></tr></tbody></table></figure><h2><strong>UVL855 STEP</strong></h2><p><strong>Dimensions</strong></p><figure class="table"><table><tbody><tr><td>Platform width</td><td>800 mm</td></tr><tr><td>Platform length</td><td>1220 mm</td></tr><tr><td>Length</td><td>1950 mm</td></tr><tr><td>Width</td><td>1100 mm</td></tr><tr><td>Height</td><td>130 mm</td></tr><tr><td>Floor to ground</td><td>1240 mm</td></tr><tr><td>Required door width</td><td>1080 mm</td></tr><tr><td>Minimum overlap</td><td>38 mm</td></tr><tr><td>Max travel down</td><td>570 mm</td></tr><tr><td>Max travel up</td><td>670 mm</td></tr><tr><td>Min travel up</td><td>480 mm</td></tr><tr><td>Max travel out</td><td>300 mm</td></tr></tbody></table></figure><p><strong>Weights</strong></p><figure class="table"><table><tbody><tr><td>Weight capacity</td><td>363 kg</td></tr><tr><td>Unit weight</td><td>272 kg</td></tr></tbody></table></figure><p><br>&nbsp;</p>','created_at' => '2024-05-10 22:23:14','updated_at' => '2024-05-10 22:23:14'),
            array('id' => '120','brand_id' => '4','category_id' => '6','sub_category_id' => '12','name' => 'Turny Seat','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641bf45db177.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => '<p>-</p>','features' => '<p>-</p>','created_at' => '2024-05-13 23:20:38','updated_at' => '2024-05-13 23:20:38'),
            array('id' => '121','brand_id' => '4','category_id' => '7','sub_category_id' => '21','name' => 'Wheelchair Lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641bfcf5cafd.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => '<p>-</p>','features' => '<p>-</p>','created_at' => '2024-05-13 23:22:55','updated_at' => '2024-05-13 23:22:55'),
            array('id' => '122','brand_id' => '20','category_id' => '13','sub_category_id' => '22','name' => 'Mariani UVL-EP300','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641c7bd51c79.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => '<p>-</p>','features' => '<p>-</p>','created_at' => '2024-05-13 23:56:45','updated_at' => '2024-05-14 00:25:01'),
            array('id' => '123','brand_id' => '5','category_id' => '12','sub_category_id' => '23','name' => 'Stairlift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641cb9306ae1.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => '<p>-</p>','features' => '<p>-</p>','created_at' => '2024-05-14 00:13:07','updated_at' => '2024-05-14 00:15:35'),
            array('id' => '124','brand_id' => '5','category_id' => '12','sub_category_id' => '23','name' => 'Freecurve','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641cc65658ff.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => '<p>-</p>','features' => '<p>-</p>','created_at' => '2024-05-14 00:16:37','updated_at' => '2024-05-14 00:16:42'),
            array('id' => '125','brand_id' => '5','category_id' => '12','sub_category_id' => '24','name' => '1000 Indoor','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641cc9f49510.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:17:35','updated_at' => '2024-05-14 00:17:35'),
            array('id' => '126','brand_id' => '5','category_id' => '12','sub_category_id' => '25','name' => '1100','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641ccb8af877.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:18:00','updated_at' => '2024-05-14 00:18:00'),
            array('id' => '127','brand_id' => '5','category_id' => '12','sub_category_id' => '26','name' => '1000 Outdoor','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641ccdab6680.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:18:34','updated_at' => '2024-05-14 00:18:34'),
            array('id' => '128','brand_id' => '5','category_id' => '12','sub_category_id' => '27','name' => '4000 Indoor','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641ccfb1ddfc.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:19:07','updated_at' => '2024-05-14 00:19:07'),
            array('id' => '129','brand_id' => '5','category_id' => '12','sub_category_id' => '28','name' => '4000 Outdoor','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641cd1f21d60.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:19:43','updated_at' => '2024-05-14 00:19:43'),
            array('id' => '130','brand_id' => '4','category_id' => '6','sub_category_id' => '12','name' => 'Evo','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641cd98dc285.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:21:44','updated_at' => '2024-05-14 00:21:44'),
            array('id' => '131','brand_id' => '4','category_id' => '6','sub_category_id' => '13','name' => 'Orbit','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641cdb698f1a.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:22:14','updated_at' => '2024-05-14 00:22:14'),
            array('id' => '132','brand_id' => '4','category_id' => '14','sub_category_id' => '29','name' => 'Driving Aids','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d0de5ab44.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:35:42','updated_at' => '2024-05-14 00:35:42'),
            array('id' => '133','brand_id' => '4','category_id' => '14','sub_category_id' => '29','name' => 'Carospeed Classic','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d107cbf87.jpg','quantity' => '40','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:36:23','updated_at' => '2024-05-14 00:36:23'),
            array('id' => '134','brand_id' => '4','category_id' => '14','sub_category_id' => '30','name' => 'Carospeed Menox','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d12714c72.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:36:55','updated_at' => '2024-05-14 00:36:55'),
            array('id' => '135','brand_id' => '4','category_id' => '14','sub_category_id' => '31','name' => 'Pedals','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d16897ab8.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:38:00','updated_at' => '2024-05-14 00:38:00'),
            array('id' => '136','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'Medical Bed','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d27421218.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:42:28','updated_at' => '2024-05-14 00:46:00'),
            array('id' => '137','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'B01','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d2961fa57.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:43:02','updated_at' => '2024-05-14 00:46:12'),
            array('id' => '138','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'B02','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d2c46825e.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:43:48','updated_at' => '2024-05-14 00:46:25'),
            array('id' => '140','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'B03','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d2f92d048.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:44:41','updated_at' => '2024-05-14 00:46:42'),
            array('id' => '141','brand_id' => '1','category_id' => '10','sub_category_id' => '18','name' => 'B04','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641d310ec74a.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 00:45:05','updated_at' => '2024-05-14 00:46:57'),
            array('id' => '142','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641db0a37d1c.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:19:06','updated_at' => '2024-05-14 01:19:06'),
            array('id' => '143','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Thunder Pro-Power Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641db2c534ea.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:19:40','updated_at' => '2024-05-14 01:19:40'),
            array('id' => '144','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'Thunder PW-02','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641db5ec0c75.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:20:30','updated_at' => '2024-05-14 01:20:30'),
            array('id' => '145','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'I Go Fold','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641db8fbf069.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:21:19','updated_at' => '2024-05-14 01:21:19'),
            array('id' => '146','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'I Go Lite','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641dbae89ca9.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:21:50','updated_at' => '2024-05-14 01:21:50'),
            array('id' => '147','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'I Go +','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641dbca3a575.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:22:18','updated_at' => '2024-05-14 01:22:18'),
            array('id' => '148','brand_id' => '2','category_id' => '1','sub_category_id' => '2','name' => 'Jazzy 600ES','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641dbe4ec31e.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:22:45','updated_at' => '2024-05-14 01:22:45'),
            array('id' => '149','brand_id' => '1','category_id' => '3','sub_category_id' => '3','name' => 'Manual Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641dc4f0dfa3.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:24:31','updated_at' => '2024-05-14 01:24:31'),
            array('id' => '150','brand_id' => '1','category_id' => '3','sub_category_id' => '3','name' => 'Thunder Standard Manual Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641dd462a714.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:28:38','updated_at' => '2024-05-14 01:28:38'),
            array('id' => '151','brand_id' => '3','category_id' => '3','sub_category_id' => '4','name' => 'Alerta Car Transit Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641dd91112a5.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:29:53','updated_at' => '2024-05-14 01:29:53'),
            array('id' => '152','brand_id' => '3','category_id' => '3','sub_category_id' => '4','name' => 'Alerta Self Propelled Wheelchair','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6641ddc1d407e.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'No','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-14 01:30:41','updated_at' => '2024-05-14 01:30:41'),
            array('id' => '153','brand_id' => '1','category_id' => '4','sub_category_id' => '32','name' => 'Manual Patient Transfer Chair','serial_number' => NULL,'engine_number' => NULL,'model' => 'M211','thumbnail' => 'images/product/6643147c79439.png','quantity' => '15','maintenance' => '0','warranty' => '0','price' => '2800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<ul><li>LENGTH: 700mm</li><li>WIDTH: 595mm</li><li>HEIGHT: &nbsp;805-1005mm</li><li>FRONT WHEEL SIZE: 4ft</li><li>SEAT WIDTH: 460mm</li><li>SEAT DEPTH: 350mm</li><li>SEAT HEIGHT FROM FLOOR: 440-640mm</li><li>CASTER HEIGHT FROM FLOOR: 155mm</li><li>NET WEIGHT: 24kg</li><li>MAXIMUM WEIGHT: 100kg</li></ul>','features' => '<h2>Multi-Function Manual Patient Transfer Chair</h2><p>An Manual patient transfer chair is an ideal solution for patients with mobility issues who need special care. It has an adjustable height feature, making it easy to transfer patients in and out of the medical bed.</p><p>L:70cm x W: 59cm x H: 105cm</p><p>Convenient, fast, safe and reliable</p><p>Space saving and convenient storage</p><p>Prevent leaning forward, length can be adjusted</p><p>Lifting range:44-64cm</p><p>Easy to get in and out, no need for labor and violence, easy operation by one person. To ease the difficulty of care, the seat belt prevents forward leaning and falls.</p><p>Equipped with a detachable bedpan, it is convenient to go out without dragging, and it is easy to move.</p>','created_at' => '2024-05-14 22:42:20','updated_at' => '2024-06-23 00:23:54'),
            array('id' => '154','brand_id' => '1','category_id' => '15','sub_category_id' => '34','name' => 'Manual Patient Transfer Chair','serial_number' => NULL,'engine_number' => NULL,'model' => 'M211','thumbnail' => 'images/product/66430d4d6f1ab.png','quantity' => '3','maintenance' => '0','warranty' => '0','price' => '2800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<ul><li>LENGTH: 700mm</li><li>WIDTH: 595mm</li><li>HEIGHT: &nbsp;805-1005mm</li><li>FRONT WHEEL SIZE: 4ft</li><li>SEAT WIDTH: 460mm</li><li>SEAT DEPTH: 350mm</li><li>SEAT HEIGHT FROM FLOOR: 440-640mm</li><li>CASTER HEIGHT FROM FLOOR: 155mm</li><li>NET WEIGHT: 24kg</li><li>MAXIMUM WEIGHT: 100kg</li></ul>','features' => '<h2>Multi-Function Manual Patient Transfer Chair</h2><p>An Manual patient transfer chair is an ideal solution for patients with mobility issues who need special care. It has an adjustable height feature, making it easy to transfer patients in and out of the medical bed.</p><p>L:70cm x W: 59cm x H: 105cm</p><p>Convenient, fast, safe and reliable</p><p>Space saving and convenient storage</p><p>Prevent leaning forward, length can be adjusted</p><p>Lifting range:44-64cm</p><p>Easy to get in and out, no need for labor and violence, easy operation by one person. To ease the difficulty of care, the seat belt prevents forward leaning and falls.</p><p>Equipped with a detachable bedpan, it is convenient to go out without dragging, and it is easy to move.</p>','created_at' => '2024-05-14 23:05:49','updated_at' => '2024-07-04 22:51:45'),
            array('id' => '155','brand_id' => '1','category_id' => '4','sub_category_id' => '32','name' => 'Electric Patient Transfer Chair','serial_number' => NULL,'engine_number' => NULL,'model' => 'E211','thumbnail' => 'images/product/6643162ea48a9.png','quantity' => '15','maintenance' => '0','warranty' => '0','price' => '3800','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>OVERALL DIMENSIONS:</strong> 700mmx595mmx805mm</p><p><strong>PACKAGE SIZE:</strong> 605mmx365mmx705mm</p><p><strong>SEAT SIZE:</strong> 460*550mm</p><p><strong>SEAT HEIGHT FROM THE GROUND:</strong>&nbsp;440-640mm</p><p><strong>NET WEIGHT:</strong> 27.5kg</p><p><strong>MAXIMUM LOAD:</strong> &lt;100kg</p><p><strong>LIFTING SPEED:</strong> 5mm/s, 6mm/s</p><p><strong>LIFTING HEIGHT RANGE:</strong>&nbsp;200mm</p><p><strong>TURNING RADIUS: </strong>720mm</p><p><strong>MAXIMUM HEIGHT OF CROSSING OBSTACLES:</strong>&nbsp;&lt;35mm</p><p><strong>FRONT TYRE:</strong> 4</p><p><strong>REAR TYRE:</strong> 4</p><p><strong>DRIVE MOTOR:</strong> 24V/60W*2pcs</p><p><strong>LITHIUM BATTERY: </strong>24V/4000mAh</p>','features' => '<h2>Multi-Function Electric Patient Transfer Chair</h2><p>An electric patient transfer chair is an ideal solution for patients with mobility issues who need special care. It has an adjustable height feature, making it easy to transfer patients in and out of the medical bed.</p><p>Convenient, fast, safe and reliable</p><p>Equipped with motor,<br>equipped with remote control,<br>easy to operate</p><p>Prevent leaning forward, length can be adjusted</p><p>Lifting range:44-64cm</p><p>Equipped with a detachable bedpan, it is convenient to go out without dragging, and it is easy to move.</p><p>Easy to get in and out, no need for labor and violence, easy operation by one person. To ease the difficulty of care, the seat belt prevents forward leaning and falls.</p><p>Vientiane casters are flexible and convenient, giving you and your family a quiet and comfortable environment.</p>','created_at' => '2024-05-14 23:43:42','updated_at' => '2024-05-15 00:07:52'),
            array('id' => '156','brand_id' => '4','category_id' => '14','sub_category_id' => '29','name' => 'Carospeed Classic','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6643196f16899.png','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<h2><strong>Accelerate and brake easily with your hands</strong></h2><p>Carospeed® Classic is a universal easy-to-use driving hand control for your vehicle with automatic transmission. Being a fully mechanical driving aid, it moves the accelerator and brake pedals to an intuitive hand control, allowing you to pull for gas and push for brakes.&nbsp;Despite being mounted on the floor, it doesn\'t need any drilling through the vehicle floor.</p><h2><strong>Easy-to-use hill holder</strong></h2><p>Each Carospeed Classic is equipped with a hill holder to maintain the brake pedal\'s position. This function enables the user to brake the car while changing gears or tuning the radio. Just press the button on the handle to turn it on. Its activation is only possible when the car is braking, with sufficient brake power and ignition on.</p><p>The hill-holder releases automatically when the handle is pushed forward (braking). To add cruise control, you can activate its set function by using the same button as the hill-holder.</p><p>Each Carospeed Classic is equipped with a hill holder to maintain the brake pedal\'s position. This function enables the user to brake the car while changing gears or tuning the radio. Just press the button on the handle to turn it on. Its activation is only possible when the car is braking, with sufficient brake power and ignition on.</p><p>The hill-holder releases automatically when the handle is pushed forward (braking). To add cruise control, you can activate its set function by using the same button as the hill-holder.</p><h2><strong>Straightforward installation without vehicle impact</strong></h2><p>Elegantly designed and shaped to match most cars interior, it is possible to install it in most vehicles (not just cars). While mounted on the floor, Carospeed is not fastened through it, making installation straightforward. There are no holes to be drilled because cables are concealed under carpeting and behind panels. Instead, it gets attached to the mounting bracket located under the driver\'s seat.</p><p>The Carospeed Classic’s installation won\'t impact the vehicle you use it in, and the foot pedal functionality will remain intact. In other words, even with the Classic installed, your car is still accessible to both impaired and able drivers.</p><p><br><br>&nbsp;</p>','features' => '<p>Hand control for accelerator and brake.</p><h2><strong>One mechanical driving aid&nbsp;</strong></h2><p>In the Electric model, there are additional electrical functions available: high and low beams, right and left indicators, windscreen wipers and washers, horn, and cruise control.</p>','created_at' => '2024-05-14 23:57:35','updated_at' => '2024-05-15 00:17:18'),
            array('id' => '157','brand_id' => '1','category_id' => '15','sub_category_id' => '34','name' => 'Electric Patient Transfer Chair','serial_number' => NULL,'engine_number' => NULL,'model' => 'E211','thumbnail' => 'images/product/664319ca2fe72.png','quantity' => '3','maintenance' => '0','warranty' => '0','price' => '3800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p><strong>OVERALL DIMENSIONS:</strong> 700mmx595mmx805mm</p><p><strong>PACKAGE SIZE:</strong> 605mmx365mmx705mm</p><p><strong>SEAT SIZE:</strong> 460*550mm</p><p><strong>SEAT HEIGHT FROM THE GROUND:</strong>&nbsp;440-640mm</p><p><strong>NET WEIGHT:</strong> 27.5kg</p><p><strong>MAXIMUM LOAD:</strong> &lt;100kg</p><p><strong>LIFTING SPEED:</strong> 5mm/s, 6mm/s</p><p><strong>LIFTING HEIGHT RANGE:</strong>&nbsp;200mm</p><p><strong>TURNING RADIUS: </strong>720mm</p><p><strong>MAXIMUM HEIGHT OF CROSSING OBSTACLES:</strong>&nbsp;&lt;35mm</p><p><strong>FRONT TYRE:</strong> 4</p><p><strong>REAR TYRE:</strong> 4</p><p><strong>DRIVE MOTOR:</strong> 24V/60W*2pcs</p><p><strong>LITHIUM BATTERY: </strong>24V/4000mAh</p>','features' => '<h2>Multi-Function Electric Patient Transfer Chair</h2><p>An electric patient transfer chair is an ideal solution for patients with mobility issues who need special care. It has an adjustable height feature, making it easy to transfer patients in and out of the medical bed.</p><p>Convenient, fast, safe and reliable</p><p>Equipped with motor,<br>equipped with remote control,<br>easy to operate</p><p>Prevent leaning forward, length can be adjusted</p><p>Lifting range:44-64cm</p><p>Equipped with a detachable bedpan, it is convenient to go out without dragging, and it is easy to move.</p><p>Easy to get in and out, no need for labor and violence, easy operation by one person. To ease the difficulty of care, the seat belt prevents forward leaning and falls.</p><p>Vientiane casters are flexible and convenient, giving you and your family a quiet and comfortable environment.</p>','created_at' => '2024-05-14 23:59:06','updated_at' => '2024-07-04 22:51:51'),
            array('id' => '159','brand_id' => '4','category_id' => '14','sub_category_id' => '30','name' => 'Carospeed Menox','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66431cbbd571e.png','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<h2><strong>Universal hand control for accelerator and brake.</strong></h2><p>Carospeed Menox is a universal floor-mounted none car specific hand control that moves the accelerator and brake pedals to an intuitive hand control; pull for gas and push to brake. Thanks to Menox\'s advanced design, each control is ergonomic, conforming to a person’s natural hand-wrist-arm motion.&nbsp;</p><p>Each Carospeed Menox handle comes ﬁtted with a hill holder to hold the brake pedal down. In this way hands are freed at trafﬁc lights to change gears or tune the radio. Cruise Control frees the hand reducing muscle fatigue and allowing the driver to concentrate on driving.</p><p>Menox hand controls are designed to compliment vehicle interiors and comes with a wide range of upholstery selections. This allows for Carospeed Menox hand control to go unnoticed by blending into the car\'s interior design.</p><p>The Carospeed Menox\'s design is simple and durable. Minimal hardware is needed for the installation leaving the driver with extensive leg room. Likewise Menox is not in the way of knee air bags.</p>','features' => '<ul><li>Ergonomical motion that conforms&nbsp;to a person’s natural hand-wrist-arm motion</li><li>Highly adjustable to individual needs</li><li>Available in many colors to match your cars interior</li><li>Can be installed in most vehicles (not car specific)</li><li>The electrical cables are concealed under carpeting and behind panels; no holes need to be drilled</li><li>Recommended for use with automatic gearboxes only</li></ul>','created_at' => '2024-05-15 00:11:40','updated_at' => '2024-05-15 00:11:40'),
            array('id' => '160','brand_id' => '5','category_id' => '12','sub_category_id' => '23','name' => 'Curved Stairlift | Freecurve','serial_number' => 'sr0347','engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664322c6e6e9f.jpg','quantity' => '7','maintenance' => '2','warranty' => '3','price' => '1','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p>The Handicare Freecurve provides a multitude of innovative features to ensure your stairlift is tailor-made just for you.</p><p>Custom built to fit your staircase, this unique, single track design is available in a variety of colors to match your home and décor. Coupled with one of three seat&nbsp;styles, your comfort and safety remain priority. This includes our <strong>Active Seat</strong> option, a stand-assist aid to gently guide your movements as you stand up or sit down.</p><p>The Freecurve can overcome many architectural obstacles, allowing it to be installed in tighter spaces. For example, the <strong>Turn and Go</strong> feature will swivel your seat as you are riding the lift to ensure your knees don’t hit the opposite handrail on narrow staircases. The drop nose and powered hinge minimize any track obstructions to a minimum.</p><p>To ensure an exact fit on your staircase, we utilize our proprietary PhotoSurvey system to take pictures of your stairs. These measurements are then uploaded into our system and transposed into an instant look at how your stairlift will look in your home. This allows you the opportunity to make sure you are happy with the design before we even leave your home!</p>','features' => '<ul><li>Weight limit: 275lbs</li><li>Foldup seat, footrest and armrests save space for other stair users</li><li>Safety sensors immediately stop the lift if anything is detected in its path</li><li>Key switch prevents unauthorized use</li><li>Battery back-up in the event of power outage</li></ul>','created_at' => '2024-05-15 00:37:27','updated_at' => '2024-07-13 02:07:59'),
            array('id' => '161','brand_id' => '1','category_id' => '16','sub_category_id' => '35','name' => '2 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664333a182f3d.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '650','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<ul><li><strong>Premium Quality:</strong> Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</li><li><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</li><li><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</li><li><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</li><li><strong>Expert Support:</strong> At Easy Access Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.<br>&nbsp;</li></ul>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 10 lbs&nbsp;</li><li>Recommend Using Height: 3.9"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li></ul>','created_at' => '2024-05-15 01:49:21','updated_at' => '2024-07-04 22:58:18'),
            array('id' => '162','brand_id' => '5','category_id' => '12','sub_category_id' => '25','name' => 'Straight Stairlift 1100','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66433a0a91610.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p><strong>Handicare 1100</strong></p><p>The 1100\'s strong yet super slim stair lift rail is the thinnest on the market, meaning it takes up less space on your stairs than any other stair lift. With its compact design and grease-free rail, the 1100 fits nicely into your interior and it is a breeze to keep the rail clean.</p><h2>Slim: Stylish, compact design</h2><p>The Handicare 1100 is ultra-thin and compact and can be placed close to the wall, leaving plenty of free space on the stairs for other stair users to climb the stairs safely. It is the slimmest <a href="https://handicare-trapliften.nl/trapliften/rechte-trapliften/">straight stairlift</a> on the market! To save even more space, the seat lift, footrest and armrests can be folded when not in use. The chair rotates to the top floor and ensures that you can get up and down the stair lift easily and safely. The 1100 comes standard with safety sensors that stop the lift in the event of an obstacle.</p><h2>Smart: clean and tidy</h2><p>Thanks to patented technology, there is no rack and pinion on the Handicare 1100. This means that, unlike other stair lifts, there is no grease or oil on the rail to collect dust and dirt. This makes the rail easy to clean and safe to touch. Your stairs will remain spick and span!</p><h2>Safe: strong and reliable</h2><p><br>The robust 1100 is powered by Handicare\'s patented four-wheel drive technology with four quiet and reliable motors. Even if one of the motors were to fail, you could still complete the trip up the stairs. The lift is fully certified by the international safety standard for stair lifts EN 81-40 and designed for years of carefree daily use. Thanks to the continuous charging function, you can park the chair anywhere you want on the rail: the batteries are always charged and ready to use. The 1100 is suitable for users up to max. 140kg.</p><p>&nbsp;</p>','features' => '<p><strong>The slimmest straight stairlift</strong></p>','created_at' => '2024-05-15 02:16:42','updated_at' => '2024-05-15 02:19:25'),
            array('id' => '163','brand_id' => '5','category_id' => '12','sub_category_id' => '28','name' => 'Outdoor Stairlift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66434b7739eb0.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>The Handicare 4000 Outdoor stairlift is durable, strong and reliable, using the latest technology to help you with stairs outside your home.</p><p>The weatherproofed materials are expertly designed and built to measure for your staircase, and can accommodate stairs that are spiral, curved, or turn corners.</p><p>The chrome plated rail, UV stable upholstery, and anti-slip footrest make it safe to use outdoors in all weather, and our outdoor lifts include a waterproof cover to protect them from the elements, making sure it’s always ready to use.</p><p>All Handicare models include a key switch, so that you know your stairlift is always safe from unauthorised use.</p>','features' => '<p><strong>Outdoor stairlift for curved stairs</strong></p>','created_at' => '2024-05-15 03:31:03','updated_at' => '2024-05-15 03:31:03'),
            array('id' => '164','brand_id' => '1','category_id' => '16','sub_category_id' => '36','name' => '3 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66434dcb3e6de.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '950','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p><strong>Premium Quality</strong>: Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</p><p><br><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</p><p><br><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</p><p><br><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</p><p><br><strong>Expert Support:</strong> At EasyAccess Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.</p>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 14.5 lbs&nbsp;</li><li>Recommend Using Height: 5.9"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li><li>Lock screw</li></ul>','created_at' => '2024-05-15 03:40:59','updated_at' => '2024-07-04 22:58:34'),
            array('id' => '165','brand_id' => '1','category_id' => '16','sub_category_id' => '37','name' => '4 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66435ac0070c1.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '1250','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p><strong>Premium Quality</strong>: Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</p><p><br><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</p><p><br><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</p><p><br><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</p><p><br><strong>Expert Support:</strong> At EasyAccess Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.</p>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 19.2 lbs&nbsp;</li><li>Recommend Using Height: 7.9"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li><li>Lock screw</li></ul>','created_at' => '2024-05-15 04:36:16','updated_at' => '2024-07-04 22:58:46'),
            array('id' => '166','brand_id' => '1','category_id' => '16','sub_category_id' => '38','name' => '5 Feet Portable Wheelchair Ramp','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66435b98e32e6.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '1500','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p><strong>Premium Quality:</strong> Our ramps are crafted from durable materials, ensuring reliability and longevity. Each ramp undergoes rigorous testing to meet and exceed industry standards, providing you with peace of mind and confidence in your investment.</p><p><br><strong>Versatility:</strong> Whether you need a ramp for your home, office, vehicle, or any other location, we offer a wide range of options to suit your specific needs. From folding ramps for easy transport to modular systems for customizable configurations, we have the perfect solution for every situation.</p><p><br><strong>Ease of Use:</strong> Designed with user convenience in mind, our ramps are lightweight and simple to set up, allowing you to quickly create accessible pathways wherever you go. With features such as non-slip surfaces and easy-grip handles, our ramps prioritize safety and usability.</p><p><br><strong>Portability:</strong> Our ramps are designed to be portable and easy to transport, meaning you can take them with you wherever you go. Whether you\'re traveling across town or across the country, our ramps ensure that accessibility is never out of reach.</p><p><br><strong>Expert Support:</strong> At Easy Access Ramps, we\'re dedicated to providing exceptional customer service every step of the way. Our team of accessibility experts is here to answer your questions, provide guidance, and ensure that you find the perfect ramp for your needs.</p>','features' => '<ul><li>Weight Capacity: 600 lbs</li><li>Net Weight: 26.7 lbs&nbsp;</li><li>Recommend Using Height: 9.8"</li><li>Strong skid resistance, durable</li><li>Thickened Anti-slip Pads</li><li>Safe arc edge</li><li>Anti-collision mute pad</li><li>Portable Handle</li><li>Stainless steel hinge &amp; rivets</li><li>Lock screw</li></ul>','created_at' => '2024-05-15 04:39:53','updated_at' => '2024-07-04 22:58:59'),
            array('id' => '167','brand_id' => '1','category_id' => '16','sub_category_id' => '39','name' => 'Portable Wheelchair Ramp 6 Feet-PR06','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664361199d0f5.png','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '2800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p>A 6 feet portable THUNDER wheelchair ramp is a handy accessibility tool designed to make buildings or vehicles more wheelchair-friendly. It provides a gradual incline for wheelchair users to easily navigate steps, curbs, or thresholds. Portable ramps are often made of lightweight materials like aluminum, making them easy to transport and set up as needed. They come in various styles and designs to accommodate different environments and user needs.</p>','features' => '<p><strong>Material</strong>: Typically made from durable and lightweight materials like aluminum or fiberglass to ensure both strength and portability.</p><p><strong>Foldable Design</strong>: Many portable ramps are designed to fold in half or retract to a compact size for easy transportation and storage.</p><p><strong>Weight Capacity</strong>: Ramps are usually rated for a specific weight capacity to accommodate various wheelchair users and mobility devices.</p><p><strong>Surface Texture</strong>: The ramp\'s surface often includes a non-slip texture or coating to provide traction and ensure safety, especially in wet conditions.</p><p><strong>Width and Length</strong>: The ramp dimensions, including width and length, are crucial to ensure compatibility with different spaces and mobility needs.</p><p><strong>Adjustable Height</strong>: Some ramps offer adjustable legs or settings to accommodate different heights and angles.</p><p><strong>Safety Features</strong>: Look for features like side rails or raised edges to prevent wheelchairs from slipping off the ramp during use.</p><p><strong>Easy Setup</strong>: Quick and easy setup is essential for portable ramps, allowing users to deploy them whenever and wherever needed without hassle.</p><p><strong>Weather Resistance</strong>: Ideally, the ramp should be weather-resistant to withstand outdoor conditions such as rain, snow, or UV exposure.</p><p><strong>Compliance</strong>: Ensure that the ramp meets relevant safety and accessibility standards, such as ADA (Americans with Disabilities Act) requirements, if applicable.</p><p>When considering a specific product like the "Thunder 6 feet portable wheelchair ramp," it\'s essential to review its detailed specifications, customer reviews, and any additional features it may offer to meet your specific needs and preferences.</p>','created_at' => '2024-05-15 05:03:21','updated_at' => '2024-07-04 22:59:16'),
            array('id' => '168','brand_id' => '1','category_id' => '16','sub_category_id' => '39','name' => 'Thunder- Portable Wheelchair Ramp- 6 feet','serial_number' => NULL,'engine_number' => NULL,'model' => 'pr06','thumbnail' => 'images/product/664362a0a1235.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '2800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p>Introducing the Thunder Portable Wheelchair Ramp, your solution to accessibility on the go! Designed with convenience and durability in mind, this 6-foot ramp provides a smooth and secure transition for wheelchair users over obstacles such as curbs, steps, and thresholds. Crafted from lightweight yet sturdy materials, it\'s easily portable and can be set up in seconds, making it ideal for both indoor and outdoor use. Whether you\'re navigating through doorways or accessing vehicles, the Thunder Ramp ensures independence and ease of movement wherever you go. Say goodbye to barriers and hello to freedom with the Thunder Portable Wheelchair Ramp!</p>','features' => '<p><strong>Sturdy Construction:</strong> Constructed from high-quality materials, the ramp provides a stable and reliable surface for wheelchair users.</p><p><strong>6-Foot Length:</strong> With a length of 6 feet, this ramp provides ample coverage for overcoming obstacles such as curbs, steps, and thresholds.</p><p><strong>Portable Design:</strong> Lightweight and easy to transport, the ramp can be folded and carried with ease, making it perfect for travel and use in various locations.</p><p><strong>Quick Setup:</strong> The ramp is designed for quick and hassle-free setup, allowing users to deploy it in seconds without the need for complex assembly.</p><p><strong>Non-Slip Surface:</strong> Equipped with a non-slip surface, the ramp offers enhanced traction and safety for wheelchair users, even in wet or slippery conditions.</p><p><strong>Versatile Use:</strong> Suitable for both indoor and outdoor use, the Thunder Ramp can be used in various environments, including homes, businesses, and public spaces.</p><p><strong>Durable and Weather-Resistant:</strong> Built to withstand the elements, the ramp is durable and weather-resistant, ensuring long-lasting performance in a range of conditions.</p><p><strong>Adjustable Height:</strong> Some models may feature adjustable height options to accommodate different thresholds or inclines, providing added flexibility for users.</p>','created_at' => '2024-05-15 05:09:52','updated_at' => '2024-07-04 22:59:57'),
            array('id' => '169','brand_id' => '1','category_id' => '16','sub_category_id' => '40','name' => 'Portable Wheelchair Ramp 8 Feet-PR08','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664363ae0d863.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '3400','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p><strong>Portable wheelchair ramp: </strong>We all know that it’s complicated to transfer a patient or disabled person from the stairs of your home into the vehicles. So, to finish these problems, we designed such portable wheelchair ramps.</p><p><strong>Portable Ramps With Variety: </strong>This portable wheelchair ramp is there to make it wheelchair accessible for the people of determination. And don’t think that the portable wheelchair ramp is of one type. No, we are providing you with portable wheelchair ramps of different lengths and widths to meet other requirements of different people.</p><p><strong>Major Types Of Portable Wheelchair Ramps: </strong>When we talk about types of portable wheelchair ramps, there are two significant types. Some are single fold while others are multi-fold. You will not face any difficulty carrying these ramps with your car to different places as these are easy to maintain.</p>','features' => '<ul><li>&nbsp;8 Feet Portable Ramp</li><li>74×243 CM</li><li>Non-Slip</li></ul>','created_at' => '2024-05-15 05:14:22','updated_at' => '2024-07-04 23:00:08'),
            array('id' => '170','brand_id' => '1','category_id' => '16','sub_category_id' => '41','name' => 'Portable Wheelchair Ramp 10 Feet-PR10','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6643644a7ba73.jpg','quantity' => '5','maintenance' => '0','warranty' => '0','price' => '3800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'Yes','status' => 'Publish','description' => '<p><strong>Portable wheelchair ramp: </strong>We all know that it’s complicated to transfer a patient or disabled person from the stairs of your home into the vehicles. So, to finish these problems, we designed such portable wheelchair ramps.</p><p><strong>Portable Ramps With Variety: </strong>This portable wheelchair ramp is there to make it wheelchair accessible for the people of determination. And don’t think that the portable wheelchair ramp is of one type. No, we are providing you with portable wheelchair ramps of different lengths and widths to meet other requirements of different people.</p><p><strong>Major Types Of Portable Wheelchair Ramps: </strong>When we talk about types of portable wheelchair ramps, there are two significant types. Some are single fold while others are multi-fold. You will not face any difficulty carrying these ramps with your car to different places as these are easy to maintain.</p>','features' => '<ul><li>&nbsp;10 Feet Portable Ramp</li><li>74×304 CM</li><li>Non-Slip</li></ul>','created_at' => '2024-05-15 05:16:58','updated_at' => '2024-07-04 23:00:19'),
            array('id' => '171','brand_id' => '3','category_id' => '15','sub_category_id' => '42','name' => 'Alerta Sensaflex 3000 Foam Mattress','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6643664a439fd.png','quantity' => '15','maintenance' => '0','warranty' => '0','price' => '1800','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'No','status' => 'Unpublish','description' => '<p>Its advanced design ensures superior comfort, care, and pressure redistribution, making it ideal for hospital, nursing, and care home settings.</p><p>For washing the cover in a machine, use a main wash setting of 65oC for a minimum of 10 minutes or 95oC for a minimum of 3 minutes. Tumble dry the cover on low heat, ensuring the temperature does not exceed 60oC. The foam component can be autoclaved at 134oC.</p><p>Additionally, a bariatric version measuring 120cm wide is available, identified by code: ALT-3000/4.</p>','features' => '<ul><li>Multi-stretch and vapor-permeable PU cover</li><li>Water-resistant and machine-washable cover</li><li>Antimicrobial cover with white underside</li><li>BS7177: Crib 5</li></ul>','created_at' => '2024-05-15 05:25:30','updated_at' => '2024-07-04 22:54:24'),
            array('id' => '172','brand_id' => '3','category_id' => '15','sub_category_id' => '42','name' => 'Alerta Bubble 2 Overlay Pad','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664367c213628.jpg','quantity' => '15','maintenance' => '0','warranty' => '0','price' => '750','discount' => '0','delivery_charges' => NULL,'type' => 'Rent','special' => 'No','status' => 'Unpublish','description' => '<p>Featuring an entry-level pump, it offers care providers essential tools for pressure care.</p><p>Equipped with user-friendly settings and functions, the Alerta Bubble 2 facilitates quick setup and optimal pressure adjustment for individual users with simplicity.</p><p>Manufactured to adhere to rigorous quality and usage standards, the Alerta Bubble 2 ensures reliability and performance.</p><p>Note: When washing, ensure the air inlet tubes are tightly sealed to prevent water entry.</p>','features' => '<ul><li>&nbsp;Tuck-in extension flaps</li><li>CPR - tubes can be easily removed</li><li>Water resistant material</li><li>Antimicrobial material</li><li>Machine washable*</li></ul>','created_at' => '2024-05-15 05:31:46','updated_at' => '2024-07-04 22:53:54'),
            array('id' => '173','brand_id' => '21','category_id' => '17','sub_category_id' => '43','name' => 'QRT Standard Q-8200-A-L','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6645c74c3ceed.jpg','quantity' => '15','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p>4 QRT Standard Retractors with Manual Lap &amp; Shoulder Belt.</p><h2>Includes:</h2><ul><li>(4) QRT Standard Retractors w/PLI (Q8-6201-L)</li><li>(1) Manual Lap &amp; Shoulder Belt (Q8-6325-A)</li><li>*L-Track not included</li></ul><p>The&nbsp;QRT Standard&nbsp;is an economical,&nbsp;<strong>semi-automatic</strong>&nbsp;retractor system with a&nbsp;single tensioning knob to help meet minimum specifications and cost-conscious budgets without sacrificing safety.</p><p><strong>Vehicle Applications: </strong><br>School Bus, City Bus, Coach Bus, Rail, Community Transport, Minivan, WAV</p><p>&nbsp;</p>','features' => '<p><strong>SINGLE TENSIONING KNOB: </strong>Safely secures wheelchair and occupant in under 10 seconds.</p><p><strong>POSITIVE LOCK INDICATOR: </strong>Patented feature clearly indicates when fitting is locked in anchorage (L-track application only).</p><p><strong>INTERCHANGEABLE: </strong>Eliminates confusion; no right, left, front or rear locations.</p><p><strong>UNIVERSAL DESIGN: </strong>Accommodates virtually all wheelchair designs, including scooters.</p><p><strong>ULTRA-DURABLE: </strong>Constructed from hardened steel and coated in zinc for maximum corrosion resistance.</p><p><strong>LOW PROFILE &amp; COMPACT: </strong>No mounting bracket allows retractors to fit under most footrests.</p><p><strong>J-HOOK: </strong>Reduces twisting of belts and ensures proper securement with a quarter turn accommodating virtually all wheelchair designs.</p><p><strong>FOOT RELEASE LEVER: </strong>Easy release eliminates the need to bend down.</p>','created_at' => '2024-05-16 22:52:08','updated_at' => '2024-05-17 00:45:57'),
            array('id' => '174','brand_id' => '21','category_id' => '17','sub_category_id' => '43','name' => 'QRT Standard Q-8200-A-SC','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6645cb504b213.jpg','quantity' => '15','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>4 QRT Standard Retractors with Slide \'N Click fittings; and Manual Lap &amp; Shoulder Belt.</p><h2>Includes:</h2><ul><li>(4) QRT Standard Retractors w/SNC (Q8-6201-SC)</li><li>(1) Manual Lap &amp; Shoulder Belt (Q8-6325-A)</li><li>(4) Slide \'N Click Floor Anchorages (Q8-7580-A)</li></ul><p>The&nbsp;QRT Standard&nbsp;is an economical,&nbsp;<strong>semi-automatic</strong>&nbsp;retractor system with a&nbsp;single tensioning knob to help meet minimum specifications and cost-conscious budgets without sacrificing safety.</p><p><strong>Vehicle Applications: </strong><br>School Bus, City Bus, Coach Bus, Rail, Community Transport, Minivan, WAV</p>','features' => '<p><strong>SINGLE TENSIONING KNOB: </strong>Safely secures wheelchair and occupant in under 10 seconds.</p><p><strong>POSITIVE LOCK INDICATOR: </strong>Patented feature clearly indicates when fitting is locked in anchorage (L-track application only).</p><p><strong>INTERCHANGEABLE: </strong>Eliminates confusion; no right, left, front or rear locations.</p><p><strong>UNIVERSAL DESIGN: </strong>Accommodates virtually all wheelchair designs, including scooters.</p><p><strong>ULTRA-DURABLE: </strong>Constructed from hardened steel and coated in zinc for maximum corrosion resistance.</p><p><strong>LOW PROFILE &amp; COMPACT: </strong>No mounting bracket allows retractors to fit under most footrests.</p><p><strong>J-HOOK: </strong>Reduces twisting of belts and ensures proper securement with a quarter turn accommodating virtually all wheelchair designs.</p><p><strong>FOOT RELEASE LEVER: </strong>Easy release eliminates the need to bend down.</p>','created_at' => '2024-05-17 01:01:04','updated_at' => '2024-05-18 00:26:02'),
            array('id' => '175','brand_id' => '20','category_id' => '13','sub_category_id' => '22','name' => 'Extra flat EP300 cassette lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6646025cd9377.jpg','quantity' => '15','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p>The EP300 cassette lift has a reduced thickness, which allows it to be installed on the side without having to make substantial modifications to the vehicle. The model is fully automatic.</p><p>Our new series of <strong>cassette lifts</strong> is the optimal solution for fitting out<strong> vehicles for transporting the disabled</strong> without obstructing the interior of the vehicle. The <strong>cassette wheelchair lifts</strong> can be fitted under the chassis, on the outside of cars, vans or special vehicles. Discover the different models and choose the one that best suits your needs.</p>','features' => '<ul><li>Silent Made in Italy electro-hydraulic power pack with emergency booster pump.</li><li>Stainless steel drawer.</li><li>Automatic aluminium anti-slip platform.</li><li>Drawer closed at the back with automatic lid.</li><li>Automatic safety flaps for connection to the vehicle and to the ground.</li><li>Electrical controls on a four-button spiral cable control panel.</li></ul>','created_at' => '2024-05-17 04:55:57','updated_at' => '2024-05-17 04:55:57'),
            array('id' => '176','brand_id' => '23','category_id' => '18','sub_category_id' => '44','name' => 'Artira - Inclined Platform Lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664704ac834fa.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p>The Artira inclined platform wheelchair lift offers a secure and dependable means for wheelchair users and individuals with limited mobility to move between floors with ease.</p><p>Designed to seamlessly integrate into most stairways, this wheelchair lift eliminates the need for extensive renovations or specialized construction. Simply requiring a mains power connection at the upper landing, minimal preparation is typically necessary. Installation by Garaventa Lift technicians typically takes only 3 or 4 days.</p><p>Versatile and adaptable, the Artira is particularly well-suited for enhancing accessibility in various settings, including heritage buildings, schools, churches, and restaurants. With a wide range of colors and finishes available, the wheelchair lift can effortlessly complement any decor. Its space-efficient design makes it an ideal accessibility solution for constrained areas or locations where floor space is at a premium. For instance, in restaurants, instead of allocating space for a vertical platform lift, the Artira\'s minimal footprint allows for an extra table, contributing to increased profits that can offset the cost of the lift installation.</p><p>Garaventa inclined platform lifts are compliant with ADA regulations, recognized as a viable means to enhance public accessibility. In accordance with ADA Accessibility Guidelines (ADAAG), these lifts facilitate access within buildings, whether retrofitting existing structures or providing access to specific areas such as stages, projection rooms, press boxes, bleachers, and metro train station platforms.</p>','features' => '<ul><li><strong>Load Capacity:</strong> 300 Kg (660 Lbs.) up to 45° stair angle for commercial/public use</li><li><strong>Power Requirements: </strong>208-240 VAC, 50/60 Hz on a dedicated 20 amp circuit</li><li><strong>Platform Sizes: </strong>4 standard sizes including large ADA-compliant 800 mm x 1220 mm (31.5” x 48”) platform.</li><li><strong>Attachment: </strong>Mounted directly to a wall or attached to stair treads using support towers (requires sufficient sub-strate strength).</li><li><strong>Controls: </strong>Smart-Lite Technology TM guides the user through operation by illuminating the appropriate button. Safety code requires continuous pressure on control buttons to operate the lift (keep button depressed to keep moving). Buttons are large and easy to use for everyone.</li></ul><p><strong>Platform Storage: </strong>A folded platform conceals and protects safety barrier arms and platform controls from vandalism.</p><ul><li><strong>Standard Finishes: </strong>Indoor units - RAL 7030 fine texture Satin Grey. Outdoor - bead blasted and electropolished stainless steel. Optional RAL colors available.</li><li><strong>Standard Safety Features: </strong>Under-platform obstruction sensors, Pedestrian Safety Lights, bi-directional ramp obstruction sensors, emergency manual folding and lowering, curved safety barrier arms, overspeed safety.</li><li><strong>Optional Features: </strong>Attendant remote control, under hanger sensors, side of hanger sensors, automatic platform fold, fold-down seat and seatbelt, building fire alarm integration, side load for confined lower landings, wall-mount pedestrian audio-visual alert, pedestrian handrails integrated in to support rail system.</li></ul>','created_at' => '2024-05-17 23:18:04','updated_at' => '2024-05-17 23:18:04'),
            array('id' => '177','brand_id' => '23','category_id' => '18','sub_category_id' => '44','name' => 'X3 - Inclined Platform Lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/6647055ddccb1.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<ul><li>Low cost</li><li>Reliable</li><li>Fast/Quick Installation</li><li>Wireless Call Stations</li><li>Minimal space requirement</li><li>Concealed Drive</li><li>Narrow Profile when Folded</li></ul><p>The X3, a straightforward and durable inclined platform lift by Garaventa Lift, boasts a 550 lb. load capacity along with battery operation and wireless call stations, making it swift and hassle-free to set up. Offering exceptional value, the X3 blends Garaventa Lift\'s renowned reliability and safety with cutting-edge technology.</p><p>In commercial settings, the X3 will be equipped with larger batteries for extended capacity, a spacious ADA-compliant platform, and powered fold and unfold functions, ensuring seamless operation and compliance with accessibility standards.</p>','features' => '<ul><li>Platform<br>A variety of platform sizes available</li><li>Power Requirements<br>120 VAC provides power to battery charger<br><br>&nbsp;</li><li>Applications<br>Residential or Commercial. Commerical applications require conformance to the ADA Accessibility Guidelines and/or ASME A117.1 (check local requirements).<br><br>&nbsp;</li><li>Rated Load<br>250 kg (550 lbs)<br><br>&nbsp;</li><li>Drive System<br>Rack &amp; Pinion<br><br>&nbsp;</li><li>Speed<br>4 m/min (13 ft/min)<br><br>&nbsp;</li><li>Platform Controls<br>Keyless with continuous pressure directional buttons, equipped with emergency stop switch<br><br>&nbsp;</li><li>Overspeed Safety<br>On board the platform carriage<br><br>&nbsp;</li><li>Safety<br>Emergency manual lowering and folding | Under platform obstruction detection | Bi-directional ramp sensing | Curved safety arms | Pedestrian safety lights.<br><br>&nbsp;</li><li>Finishes<br>Champagne anodized extruded aluminum rails, Optional RAL colors (See your local Garaventa Lift dealer for details)<br><br>&nbsp;</li><li>Optional Features<br>Wireless call stations, keyless (standard) or keyed with continuous pressure switches | Fully powered platform fold and unfold with powered ramps and arms | Attendant remote control | Fold-down seat with seat belt | Support towers | Keyed platform controls | Vandal resistant platform storage | Keyed platform lock</li></ul>','created_at' => '2024-05-17 23:21:02','updated_at' => '2024-05-18 00:26:06'),
            array('id' => '178','brand_id' => '23','category_id' => '18','sub_category_id' => '44','name' => 'Genesis OPAL - Unenclosed Vertical Platform Lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66470d7e6c75f.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>he Genesis OPAL vertical lift effortlessly moves passengers up and down short vertical distances, perfect for use on stages and porches. Equipped with platform walls, a platform gate, and an optional automatic folding ramp that move with the platform, it forms a protective barrier around passengers, ensuring their safety.</p><p>With a weight capacity of 340kg (750lbs) and the ability to provide access up to 1600mm (63"), the OPAL is well-suited for both indoor and outdoor applications, offering a cost-effective solution for enhancing accessibility.</p><ul><li>Low cost</li><li>Fast installation</li><li>Under Platform Obstruction Sensing</li><li>Ideal for Stage Access</li><li>Easy grip offset "D" handles</li></ul>','features' => '<ul><li>Rated Load<br>Rated Load of 340 kg (750 lbs)<br><br>&nbsp;</li><li>Platform size<br>Standard: 914mm x 1242mm (36” x 48 7/8”).<br>Optional: Mid-Size Platform: 914mm x 1394mm (36” x 54 7/8”)<br>Large Platform: 1100mm x 1546mm (43 1/4” x 60 7/8”)<br><br>&nbsp;</li><li>Configuration<br>Standard: Straight through entry/exit<br>Optional: 90&nbsp;o&nbsp;entry/exit<br><br>&nbsp;</li><li>Controls<br>Up/Down continuous pressure directional controls<br><br>&nbsp;</li><li>Warranty<br>Standard: 24 months<br>Optional: 12 months extended warranty (36 months total)OR 60 months extended warranty (84 months total)<br><br>&nbsp;</li><li>Accessories<br>Standard: Keyless operation. Grabrail on platform side wall. Audible Illuminated Emergency Stop/Alarm Switch<br>Optional: Autodialer phone. Emergency battery lowering (Leadscrew drive only). Illuminated and tactile directional buttons. Power gate operator. Keyed call station and platform controls. Stationary loading ramp or platform mounted automatic folding ramp for installations without a pit. Electrical disconnect.<br><br>&nbsp;</li><li>Drive System<br>Standard: Leadscrew: 2 HP motor, travel speed at 3 meters (10 ft) per minute. Hydraulic: 3 HP motor Continuous Mains Powered with an auxiliary power system. Lift travels at 5.2 meters (17 ft) per minute.<br>Optional: Hydraulic (full time battery operation): 3 HP 24VDC hydraulic motor lifts the platform at 5.2 meters (17 ft) per minute.</li></ul>','created_at' => '2024-05-17 23:55:42','updated_at' => '2024-05-18 00:26:10'),
            array('id' => '179','brand_id' => '23','category_id' => '18','sub_category_id' => '44','name' => 'Genesis Staage Portable Vertical Lift Wheelchair Lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664711b8d3fa6.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Sale','special' => 'No','status' => 'Publish','description' => '<p>The Genesis STAAGE lift offers a secure, user-friendly, and budget-friendly accessibility solution tailored for low-rise vertical barriers like stages and podiums. Its ease of operation allows it to be effortlessly wheeled away when wheelchair accessibility isn\'t needed. With all the expected safety features, the STAAGE ensures peace of mind, courtesy of Garaventa Lift.</p><p>Regulations concerning portable vertical lifts in public spaces differ across jurisdictions. To learn about using the STAAGE in your area, reach out to your local Garaventa Lift representative for guidance.</p><ul><li>Portable</li><li>Plug-in 120V power</li><li>Adjustable upper travel limit</li><li>Under platform obstruction sensor</li></ul>','features' => '<ul><li>Rated Load:<br>340 kg (750 lbs)<br><br>&nbsp;</li><li>Speed:<br>3 meters (10 ft) per minute<br><br>&nbsp;</li><li>Drive System:<br>2 HP Motor drives a 1” ACME screw<br><br>&nbsp;</li><li>Travel Range:<br>Up to 44”)<br><br>&nbsp;</li><li>Clear Platform Area:<br>Standard: 36” x 52 3/4” with lower landing platform gate.<br>36” x 54 1/2” without lower landing platform gate.<br><br>&nbsp;</li><li>Safety Devices:<br>Self Locking Drive System.Emergency Stop Switch.<br>Audible Emergency Alarm.Under Platform Sensor.<br>Gate Interlocks.Lockout Key Switch.<br>Safety Drive Nut (engages if drive nut fails).<br>Manual emergency lowering<br><br>&nbsp;</li><li>Footprint:<br>68 7/8” x 57 3/4” including wheels<br><br>&nbsp;</li><li>Controls:<br>Up/Down continuous pressure directional controls<br><br>&nbsp;</li><li>Power Requirements:<br>120 VAC mains power from a standard plug-in recepticle</li></ul>','created_at' => '2024-05-18 00:13:45','updated_at' => '2024-05-18 00:26:15'),
            array('id' => '180','brand_id' => '2','category_id' => '2','sub_category_id' => '7','name' => 'Moblity Scooter','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/664c74d98f6ed.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-22 02:18:01','updated_at' => '2024-05-22 02:25:49'),
            array('id' => '182','brand_id' => '23','category_id' => '18','sub_category_id' => '44','name' => 'Platform Lift','serial_number' => NULL,'engine_number' => NULL,'model' => NULL,'thumbnail' => 'images/product/66629cd562c1b.jpg','quantity' => '10','maintenance' => '0','warranty' => '0','price' => '0','discount' => '0','delivery_charges' => NULL,'type' => 'Maintenance','special' => 'Yes','status' => 'Publish','description' => NULL,'features' => NULL,'created_at' => '2024-05-22 02:30:48','updated_at' => '2024-06-07 21:38:29'),
            array('id' => '183','brand_id' => '1','category_id' => '1','sub_category_id' => '1','name' => 'my test product for developmnt','serial_number' => '13123123123','engine_number' => '3123123123','model' => '123123123','thumbnail' => 'images/product/6652d97613fa4.jpg','quantity' => '8','maintenance' => '4','warranty' => '12','price' => '1200','discount' => '1100','delivery_charges' => NULL,'type' => 'Sale','special' => 'Yes','status' => 'Publish','description' => '<p>and ehere will be the long description of the product</p>','features' => '<p>here will be the features of this product</p>','created_at' => '2024-05-26 22:40:54','updated_at' => '2024-06-04 23:37:32')
        );
        DB::table('products')->insert($products);

        $images = [
            [
              "product_id" => "76",
              "image" => "images/product/gallery/661f879bd23c8.png"
            ],
            [
              "product_id" => "76",
              "image" => "images/product/gallery/661f87ae55a02.png"
            ],
            [
              "product_id" => "76",
              "image" => "images/product/gallery/661f87ba8a3ac.png"
            ],
            [
              "product_id" => "76",
              "image" => "images/product/gallery/661f87c92cb29.png"
            ],
            [
              "product_id" => "76",
              "image" => "images/product/gallery/661f87d521335.png"
            ],
            [
              "product_id" => "77",
              "image" => "images/product/gallery/661f88e2df888.jpg"
            ],
            [
              "product_id" => "77",
              "image" => "images/product/gallery/661f88edcfef1.jpg"
            ],
            [
              "product_id" => "77",
              "image" => "images/product/gallery/661f88f926780.jpg"
            ],
            [
              "product_id" => "1",
              "image" => "images/product/gallery/1.jpg"
            ],
            [
              "product_id" => "79",
              "image" => "images/product/gallery/8.jpg"
            ],
            [
              "product_id" => "50",
              "image" => "images/product/gallery/17.jpg"
            ],
            [
              "product_id" => "50",
              "image" => "images/product/gallery/19.jpg"
            ],
            [
              "product_id" => "50",
              "image" => "images/product/gallery/20.jpg"
            ],
            [
              "product_id" => "53",
              "image" => "images/product/gallery/22.jpg"
            ],
            [
              "product_id" => "53",
              "image" => "images/product/gallery/23.jpg"
            ],
            [
              "product_id" => "1",
              "image" => "images/product/gallery/Halo.jpg"
            ],
            [
              "product_id" => "1",
              "image" => "images/product/gallery/manual wheelchair.jpg"
            ],
            [
              "product_id" => "52",
              "image" => "images/product/gallery/thunder 101 power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "52",
              "image" => "images/product/gallery/thunder 101 power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "52",
              "image" => "images/product/gallery/thunder 101 wheelchair.jpg"
            ],
            [
              "product_id" => "52",
              "image" => "images/product/gallery/thunder 101.jpg"
            ],
            [
              "product_id" => "51",
              "image" => "images/product/gallery/thunder 201 power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "51",
              "image" => "images/product/gallery/thunder 201 power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "51",
              "image" => "images/product/gallery/thunder 201 power wheelchair.jpg"
            ],
            [
              "product_id" => "53",
              "image" => "images/product/gallery/thunder 401 wheelchair.jpg"
            ],
            [
              "product_id" => "56",
              "image" => "images/product/gallery/thunder foldable power wheelchair.jpg"
            ],
            [
              "product_id" => "60",
              "image" => "images/product/gallery/i go fold wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "60",
              "image" => "images/product/gallery/i go fold wheelchair.jpg"
            ],
            [
              "product_id" => "65",
              "image" => "images/product/gallery/i go lite power wheechair.jpg"
            ],
            [
              "product_id" => "65",
              "image" => "images/product/gallery/i go lite-weight power wheechair.jpg"
            ],
            [
              "product_id" => "67",
              "image" => "images/product/gallery/i go plus foldable power wheelchair.jpg"
            ],
            [
              "product_id" => "67",
              "image" => "images/product/gallery/i go plus power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "67",
              "image" => "images/product/gallery/i go plus power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "67",
              "image" => "images/product/gallery/i go plus power wheelchair.jpg"
            ],
            [
              "product_id" => "60",
              "image" => "images/product/gallery/pride mobility i go fold wheelchair  in dubai.jpg"
            ],
            [
              "product_id" => "60",
              "image" => "images/product/gallery/pride mobility i go fold wheelchair.jpg"
            ],
            [
              "product_id" => "67",
              "image" => "images/product/gallery/pride mobility i go plus.jpg"
            ],
            [
              "product_id" => "68",
              "image" => "images/product/gallery/pride mobility jazzy 600 wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "68",
              "image" => "images/product/gallery/pride mobility jazzy 600 wheelchair.jpg"
            ],
            [
              "product_id" => "68",
              "image" => "images/product/gallery/pride mobility jazzy wheelchair.jpg"
            ],
            [
              "product_id" => "72",
              "image" => "images/product/gallery/pride mobility quest foldable mobility scooter.jpg"
            ],
            [
              "product_id" => "72",
              "image" => "images/product/gallery/pride mobility quest mobility scooter in dubai.jpg"
            ],
            [
              "product_id" => "72",
              "image" => "images/product/gallery/pride mobility quest mobility scooter.jpg"
            ],
            [
              "product_id" => "72",
              "image" => "images/product/gallery/pride mobility quest scooter.jpg"
            ],
            [
              "product_id" => "73",
              "image" => "images/product/gallery/pride mobility power scooter.jpg"
            ],
            [
              "product_id" => "73",
              "image" => "images/product/gallery/pride mobility scooter.jpg"
            ],
            [
              "product_id" => "73",
              "image" => "images/product/gallery/pride mobility power scooter in dubai.jpg"
            ],
            [
              "product_id" => "73",
              "image" => "images/product/gallery/pride mobility power scooter in uae.jpg"
            ],
            [
              "product_id" => "48",
              "image" => "images/product/gallery/manual wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "48",
              "image" => "images/product/gallery/manual wheelchair.jpg"
            ],
            [
              "product_id" => "48",
              "image" => "images/product/gallery/thunder manual wheelchair.jpg"
            ],
            [
              "product_id" => "74",
              "image" => "images/product/gallery/alerta sensaflex 3000.jpg"
            ],
            [
              "product_id" => "74",
              "image" => "images/product/gallery/alerta sensaflex 3000 mattress in dubai.jpg"
            ],
            [
              "product_id" => "74",
              "image" => "images/product/gallery/alerta sensaflex 3000 mattress.jpg"
            ],
            [
              "product_id" => "74",
              "image" => "images/product/gallery/alerta sensaflex mattress in dubai.jpg"
            ],
            [
              "product_id" => "74",
              "image" => "images/product/gallery/medical bed mattress in dubai.jpg"
            ],
            [
              "product_id" => "75",
              "image" => "images/product/gallery/alerta bubble mattress.jpg"
            ],
            [
              "product_id" => "75",
              "image" => "images/product/gallery/alerta bubble mattress for bed.jpg"
            ],
            [
              "product_id" => "75",
              "image" => "images/product/gallery/alerta bubble mattress in dubai.jpg"
            ],
            [
              "product_id" => "75",
              "image" => "images/product/gallery/alerta medical mattress.jpg"
            ],
            [
              "product_id" => "82",
              "image" => "images/product/gallery/braunability turny orbit.jpg"
            ],
            [
              "product_id" => "82",
              "image" => "images/product/gallery/braunability turny orbit seat (2).jpg"
            ],
            [
              "product_id" => "82",
              "image" => "images/product/gallery/braunability turny orbit seat.jpg"
            ],
            [
              "product_id" => "82",
              "image" => "images/product/gallery/turny orbit.jpg"
            ],
            [
              "product_id" => "81",
              "image" => "images/product/gallery/TEST TURNY 1.jpg"
            ],
            [
              "product_id" => "81",
              "image" => "images/product/gallery/TEST TURNY 2.jpg"
            ],
            [
              "product_id" => "81",
              "image" => "images/product/gallery/TEST TURNY 3.jpg"
            ],
            [
              "product_id" => "81",
              "image" => "images/product/gallery/TEST TURNY 4.jpg"
            ],
            [
              "product_id" => "81",
              "image" => "images/product/gallery/TEST TURNY.jpg"
            ],
            [
              "product_id" => "83",
              "image" => "images/product/gallery/2 feet ramp.jpg"
            ],
            [
              "product_id" => "83",
              "image" => "images/product/gallery/2 feet lightweight wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "83",
              "image" => "images/product/gallery/2 feet lightweight wheelchair ramp.jpg"
            ],
            [
              "product_id" => "83",
              "image" => "images/product/gallery/2 feet portable ramp.jpg"
            ],
            [
              "product_id" => "83",
              "image" => "images/product/gallery/2 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "83",
              "image" => "images/product/gallery/2 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "84",
              "image" => "images/product/gallery/5 feet ramp.jpg"
            ],
            [
              "product_id" => "84",
              "image" => "images/product/gallery/5 feet lightweight wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "84",
              "image" => "images/product/gallery/5 feet lightweight wheelchair ramp.jpg"
            ],
            [
              "product_id" => "84",
              "image" => "images/product/gallery/5 feet portable ramp.jpg"
            ],
            [
              "product_id" => "84",
              "image" => "images/product/gallery/5 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "84",
              "image" => "images/product/gallery/5 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "85",
              "image" => "images/product/gallery/3 feet ramp.jpg"
            ],
            [
              "product_id" => "85",
              "image" => "images/product/gallery/3 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "85",
              "image" => "images/product/gallery/3 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "85",
              "image" => "images/product/gallery/3 feet lightweight wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "85",
              "image" => "images/product/gallery/3 feet lightweight wheelchair ramp.jpg"
            ],
            [
              "product_id" => "85",
              "image" => "images/product/gallery/3 feet portable ramp.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/4 feet ramp.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/4 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/4 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/4 feet lightweight wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/4 feet lightweight wheelchair ramp.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/4 feet portable ramp.jpg"
            ],
            [
              "product_id" => "89",
              "image" => "images/product/gallery/8 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "89",
              "image" => "images/product/gallery/8 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "90",
              "image" => "images/product/gallery/10 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "90",
              "image" => "images/product/gallery/10 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "91",
              "image" => "images/product/gallery/fixed wheelchair ramp.jpg"
            ],
            [
              "product_id" => "91",
              "image" => "images/product/gallery/i feel wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "91",
              "image" => "images/product/gallery/i feel wheelchair ramp.jpg"
            ],
            [
              "product_id" => "91",
              "image" => "images/product/gallery/manual wheelchair ramp for vehicle.jpg"
            ],
            [
              "product_id" => "91",
              "image" => "images/product/gallery/manual wheelchair ramp installation in dubai.jpg"
            ],
            [
              "product_id" => "91",
              "image" => "images/product/gallery/wheelchair ramp installation for vehicle.jpg"
            ],
            [
              "product_id" => "91",
              "image" => "images/product/gallery/wheelchair ramp installation in dubai.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/IMG-20240426-WA0017.jpg"
            ],
            [
              "product_id" => "86",
              "image" => "images/product/gallery/IMG-20240426-WA0018.jpg"
            ],
            [
              "product_id" => "92",
              "image" => "images/product/gallery/6 feet ramp.png"
            ],
            [
              "product_id" => "92",
              "image" => "images/product/gallery/6 feet wheelchair ramp in dubai.png"
            ],
            [
              "product_id" => "92",
              "image" => "images/product/gallery/6 feet lightweight wheelchair ramp in dubai.png"
            ],
            [
              "product_id" => "92",
              "image" => "images/product/gallery/6 feet portable ramp.png"
            ],
            [
              "product_id" => "92",
              "image" => "images/product/gallery/6 feet lightweight wheelchair ramp.png"
            ],
            [
              "product_id" => "93",
              "image" => "images/product/gallery/6 feet wheelchair ramp.png"
            ],
            [
              "product_id" => "66",
              "image" => "images/product/gallery/3 function Electric Medical Bed with mattress.png"
            ],
            [
              "product_id" => "66",
              "image" => "images/product/gallery/3 function Electric Medical Bed in dubai.png"
            ],
            [
              "product_id" => "66",
              "image" => "images/product/gallery/3 function Electric Medical Bed.png"
            ],
            [
              "product_id" => "66",
              "image" => "images/product/gallery/B02 Electric Medical Bed.png"
            ],
            [
              "product_id" => "66",
              "image" => "images/product/gallery/B02 function Electric Medical Bed with mattress.png"
            ],
            [
              "product_id" => "69",
              "image" => "images/product/gallery/5 function electric medical bed.png"
            ],
            [
              "product_id" => "69",
              "image" => "images/product/gallery/5 function electric hospital bed in dubai.png"
            ],
            [
              "product_id" => "69",
              "image" => "images/product/gallery/5 function electric hospital bed.png"
            ],
            [
              "product_id" => "69",
              "image" => "images/product/gallery/5 function electric medical bed in dubai.png"
            ],
            [
              "product_id" => "69",
              "image" => "images/product/gallery/5 function electric patient bed.png"
            ],
            [
              "product_id" => "64",
              "image" => "images/product/gallery/B01 Manual Medical bed with mattress.png"
            ],
            [
              "product_id" => "64",
              "image" => "images/product/gallery/2 Crank Manual Medical bed.png"
            ],
            [
              "product_id" => "64",
              "image" => "images/product/gallery/2 Crank Manual Medical bed in dubai.png"
            ],
            [
              "product_id" => "64",
              "image" => "images/product/gallery/B01 Manual Medical Bed.png"
            ],
            [
              "product_id" => "94",
              "image" => "images/product/gallery/B01 Manual Medical bed with mattress.png"
            ],
            [
              "product_id" => "94",
              "image" => "images/product/gallery/2 Crank Manual Medical bed in dubai.png"
            ],
            [
              "product_id" => "94",
              "image" => "images/product/gallery/2 Crank Manual Medical bed.png"
            ],
            [
              "product_id" => "94",
              "image" => "images/product/gallery/B01 Manual Medical Bed.png"
            ],
            [
              "product_id" => "95",
              "image" => "images/product/gallery/3 function Electric Medical Bed with mattress.png"
            ],
            [
              "product_id" => "95",
              "image" => "images/product/gallery/3 function Electric Medical Bed in dubai.png"
            ],
            [
              "product_id" => "95",
              "image" => "images/product/gallery/3 function Electric Medical Bed.png"
            ],
            [
              "product_id" => "95",
              "image" => "images/product/gallery/B02 Electric Medical Bed.png"
            ],
            [
              "product_id" => "95",
              "image" => "images/product/gallery/B02 function Electric Medical Bed with mattress.png"
            ],
            [
              "product_id" => "96",
              "image" => "images/product/gallery/mutli-functional medical bed.png"
            ],
            [
              "product_id" => "96",
              "image" => "images/product/gallery/mutli-functional hospital bed in dubai.png"
            ],
            [
              "product_id" => "96",
              "image" => "images/product/gallery/mutli-functional hospital bed.png"
            ],
            [
              "product_id" => "96",
              "image" => "images/product/gallery/mutli-functional medical bed in dubai.png"
            ],
            [
              "product_id" => "97",
              "image" => "images/product/gallery/5 function electric medical bed.png"
            ],
            [
              "product_id" => "97",
              "image" => "images/product/gallery/5 function electric hospital bed in dubai.png"
            ],
            [
              "product_id" => "97",
              "image" => "images/product/gallery/5 function electric hospital bed.png"
            ],
            [
              "product_id" => "97",
              "image" => "images/product/gallery/5 function electric medical bed in dubai.png"
            ],
            [
              "product_id" => "97",
              "image" => "images/product/gallery/5 function electric patient bed.png"
            ],
            [
              "product_id" => "98",
              "image" => "images/product/gallery/1.jpg"
            ],
            [
              "product_id" => "98",
              "image" => "images/product/gallery/2.jpg"
            ],
            [
              "product_id" => "98",
              "image" => "images/product/gallery/3.jpg"
            ],
            [
              "product_id" => "98",
              "image" => "images/product/gallery/4.jpg"
            ],
            [
              "product_id" => "98",
              "image" => "images/product/gallery/5.jpg"
            ],
            [
              "product_id" => "98",
              "image" => "images/product/gallery/6.jpg"
            ],
            [
              "product_id" => "98",
              "image" => "images/product/gallery/7.jpg"
            ],
            [
              "product_id" => "99",
              "image" => "images/product/gallery/thunder 301 power wheelchair.jpg"
            ],
            [
              "product_id" => "99",
              "image" => "images/product/gallery/thunder 301 wheelchair.jpg"
            ],
            [
              "product_id" => "99",
              "image" => "images/product/gallery/thunder recyling power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "99",
              "image" => "images/product/gallery/thunder recyling power wheelchair.jpg"
            ],
            [
              "product_id" => "100",
              "image" => "images/product/gallery/thunder 201 wheelchair.jpg"
            ],
            [
              "product_id" => "100",
              "image" => "images/product/gallery/thunder 201 power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "100",
              "image" => "images/product/gallery/thunder 201 power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "100",
              "image" => "images/product/gallery/thunder 201 power wheelchair.jpg"
            ],
            [
              "product_id" => "101",
              "image" => "images/product/gallery/thunder 101.jpg"
            ],
            [
              "product_id" => "101",
              "image" => "images/product/gallery/thunder 101 power wheelchair.jpg"
            ],
            [
              "product_id" => "101",
              "image" => "images/product/gallery/thunder 101 power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "101",
              "image" => "images/product/gallery/thunder 101 power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "101",
              "image" => "images/product/gallery/thunder 101 wheelchair.jpg"
            ],
            [
              "product_id" => "102",
              "image" => "images/product/gallery/thunder 401 wheelchair.jpg"
            ],
            [
              "product_id" => "102",
              "image" => "images/product/gallery/thunder 401 power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "102",
              "image" => "images/product/gallery/thunder 401 power wheelchair.jpg"
            ],
            [
              "product_id" => "103",
              "image" => "images/product/gallery/thunder foldable power wheelchair.jpg"
            ],
            [
              "product_id" => "103",
              "image" => "images/product/gallery/thunder foldable power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "104",
              "image" => "images/product/gallery/Alerta Car Transit Wheelchair"
            ],
            [
              "product_id" => "104",
              "image" => "images/product/gallery/Alerta Car Transit manual Wheelchair.jpg"
            ],
            [
              "product_id" => "104",
              "image" => "images/product/gallery/Alerta Car Transit Wheelchair.jpg"
            ],
            [
              "product_id" => "104",
              "image" => "images/product/gallery/alerta manual wheelchair.jpg"
            ],
            [
              "product_id" => "58",
              "image" => "images/product/gallery/thunder power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "58",
              "image" => "images/product/gallery/thunder power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "58",
              "image" => "images/product/gallery/thunder power wheelchair.jpg"
            ],
            [
              "product_id" => "58",
              "image" => "images/product/gallery/thunder power.jpg"
            ],
            [
              "product_id" => "105",
              "image" => "images/product/gallery/affordable power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "105",
              "image" => "images/product/gallery/thunder power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "105",
              "image" => "images/product/gallery/thunder power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "105",
              "image" => "images/product/gallery/thunder power wheelchair.jpg"
            ],
            [
              "product_id" => "105",
              "image" => "images/product/gallery/thunder power.jpg"
            ],
            [
              "product_id" => "106",
              "image" => "images/product/gallery/pride mobility i go fold wheelchair.jpg"
            ],
            [
              "product_id" => "106",
              "image" => "images/product/gallery/pride mobility i go fold wheelchair  in dubai.jpg"
            ],
            [
              "product_id" => "106",
              "image" => "images/product/gallery/i go fold wheelchair.jpg"
            ],
            [
              "product_id" => "106",
              "image" => "images/product/gallery/i go fold wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "107",
              "image" => "images/product/gallery/i go lite power wheechair.jpg"
            ],
            [
              "product_id" => "107",
              "image" => "images/product/gallery/i go lite-weight power wheechair.jpg"
            ],
            [
              "product_id" => "108",
              "image" => "images/product/gallery/i go plus foldable power wheelchair.jpg"
            ],
            [
              "product_id" => "108",
              "image" => "images/product/gallery/i go plus power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "108",
              "image" => "images/product/gallery/i go plus power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "108",
              "image" => "images/product/gallery/i go plus power wheelchair.jpg"
            ],
            [
              "product_id" => "110",
              "image" => "images/product/gallery/pride mobility quest scooter.jpg"
            ],
            [
              "product_id" => "110",
              "image" => "images/product/gallery/pride mobility quest mobility scooter.jpg"
            ],
            [
              "product_id" => "111",
              "image" => "images/product/gallery/pride mobility power scooter.jpg"
            ],
            [
              "product_id" => "111",
              "image" => "images/product/gallery/pride mobility power scooter in dubai.jpg"
            ],
            [
              "product_id" => "111",
              "image" => "images/product/gallery/pride mobility power scooter in uae.jpg"
            ],
            [
              "product_id" => "111",
              "image" => "images/product/gallery/pride mobility scooter.jpg"
            ],
            [
              "product_id" => "110",
              "image" => "images/product/gallery/pride mobility quest foldable mobility scooter.jpg"
            ],
            [
              "product_id" => "110",
              "image" => "images/product/gallery/pride mobility quest mobility scooter in dubai.jpg"
            ],
            [
              "product_id" => "112",
              "image" => "images/product/gallery/Alerta Self Propelled Wheelchair - Crash Tested.jpg"
            ],
            [
              "product_id" => "112",
              "image" => "images/product/gallery/Alerta Self Propelled Wheelchair.jpg"
            ],
            [
              "product_id" => "112",
              "image" => "images/product/gallery/manual wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "112",
              "image" => "images/product/gallery/manual wheelchair.jpg"
            ],
            [
              "product_id" => "112",
              "image" => "images/product/gallery/thunder manual wheelchair.jpg"
            ],
            [
              "product_id" => "113",
              "image" => "images/product/gallery/thunder 301 wheelchair.jpg"
            ],
            [
              "product_id" => "113",
              "image" => "images/product/gallery/thunder 301 power wheelchair.jpg"
            ],
            [
              "product_id" => "113",
              "image" => "images/product/gallery/thunder recyling power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "113",
              "image" => "images/product/gallery/thunder recyling power wheelchair.jpg"
            ],
            [
              "product_id" => "115",
              "image" => "images/product/gallery/thunder 101.jpg"
            ],
            [
              "product_id" => "115",
              "image" => "images/product/gallery/thunder 101 power wheelchair in uae.jpg"
            ],
            [
              "product_id" => "115",
              "image" => "images/product/gallery/thunder 101 power wheelchair.jpg"
            ],
            [
              "product_id" => "115",
              "image" => "images/product/gallery/thunder 101 wheelchair.jpg"
            ],
            [
              "product_id" => "116",
              "image" => "images/product/gallery/thunder 401 wheelchair.jpg"
            ],
            [
              "product_id" => "116",
              "image" => "images/product/gallery/thunder 401 power wheelchair.jpg"
            ],
            [
              "product_id" => "116",
              "image" => "images/product/gallery/thunder 401 power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "57",
              "image" => "images/product/gallery/manafeth one.jpg"
            ],
            [
              "product_id" => "57",
              "image" => "images/product/gallery/manafeth five.jpg"
            ],
            [
              "product_id" => "57",
              "image" => "images/product/gallery/manafeth four.jpg"
            ],
            [
              "product_id" => "57",
              "image" => "images/product/gallery/manafeth three.jpg"
            ],
            [
              "product_id" => "57",
              "image" => "images/product/gallery/manafeth two.jpg"
            ],
            [
              "product_id" => "70",
              "image" => "images/product/gallery/1.png"
            ],
            [
              "product_id" => "70",
              "image" => "images/product/gallery/2.png"
            ],
            [
              "product_id" => "70",
              "image" => "images/product/gallery/3.png"
            ],
            [
              "product_id" => "70",
              "image" => "images/product/gallery/4.png"
            ],
            [
              "product_id" => "70",
              "image" => "images/product/gallery/5.png"
            ],
            [
              "product_id" => "79",
              "image" => "images/product/gallery/Alerta Self Propelled Wheelchair.jpg"
            ],
            [
              "product_id" => "49",
              "image" => "images/product/gallery/1.jpg"
            ],
            [
              "product_id" => "49",
              "image" => "images/product/gallery/2.jpg"
            ],
            [
              "product_id" => "49",
              "image" => "images/product/gallery/3.jpg"
            ],
            [
              "product_id" => "49",
              "image" => "images/product/gallery/4.jpg"
            ],
            [
              "product_id" => "49",
              "image" => "images/product/gallery/5.jpg"
            ],
            [
              "product_id" => "49",
              "image" => "images/product/gallery/6.jpg"
            ],
            [
              "product_id" => "49",
              "image" => "images/product/gallery/7.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift for vehicle.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift for vehicle in dubai.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift in dubai.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift installation in dubai.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift installation.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/how to install wheelchair lift.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift in uae.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift price in dubai.jpg"
            ],
            [
              "product_id" => "118",
              "image" => "images/product/gallery/wheelchair lift price.jpg"
            ],
            [
              "product_id" => "93",
              "image" => "images/product/gallery/6 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "56",
              "image" => "images/product/gallery/thunder foldable power wheelchair in dubai.jpg"
            ],
            [
              "product_id" => "119",
              "image" => "images/product/gallery/Braunability under vehicle lift.png"
            ],
            [
              "product_id" => "119",
              "image" => "images/product/gallery/Braunability remote control under vehicle lift.png"
            ],
            [
              "product_id" => "119",
              "image" => "images/product/gallery/braunability uvl for bus.png"
            ],
            [
              "product_id" => "119",
              "image" => "images/product/gallery/Braunability uvl.png"
            ],
            [
              "product_id" => "119",
              "image" => "images/product/gallery/under vehicle lift for bus.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/manual patient transfer chair.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/portable manual transfer chair.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/manual patient chair.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/patient transfer chair manual operation.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/portable manual patient transfer chair.png"
            ],
            [
              "product_id" => "154",
              "image" => "images/product/gallery/manual patient chair.png"
            ],
            [
              "product_id" => "154",
              "image" => "images/product/gallery/manual patient transfer chair for patients.png"
            ],
            [
              "product_id" => "154",
              "image" => "images/product/gallery/manual patient transfer chair in dubai.png"
            ],
            [
              "product_id" => "154",
              "image" => "images/product/gallery/manual patient transfer chair.png"
            ],
            [
              "product_id" => "154",
              "image" => "images/product/gallery/patient transfer chair manual operation.png"
            ],
            [
              "product_id" => "154",
              "image" => "images/product/gallery/patient chair manual.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/manual patient transfer chair in dubai.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/patient transfer chair manual.png"
            ],
            [
              "product_id" => "153",
              "image" => "images/product/gallery/patient chair manual.png"
            ],
            [
              "product_id" => "156",
              "image" => "images/product/gallery/carospeed classic.png"
            ],
            [
              "product_id" => "156",
              "image" => "images/product/gallery/braunability carospeed classic in dubai.png"
            ],
            [
              "product_id" => "156",
              "image" => "images/product/gallery/braunability carospeed classic.png"
            ],
            [
              "product_id" => "159",
              "image" => "images/product/gallery/carospeed menox.png"
            ],
            [
              "product_id" => "159",
              "image" => "images/product/gallery/braunability carospeed menox.png"
            ],
            [
              "product_id" => "159",
              "image" => "images/product/gallery/carospeed menox in dubai.png"
            ],
            [
              "product_id" => "155",
              "image" => "images/product/gallery/electric patient transfer chair.png"
            ],
            [
              "product_id" => "155",
              "image" => "images/product/gallery/automatic patient transfer chair in uae.png"
            ],
            [
              "product_id" => "155",
              "image" => "images/product/gallery/electric patient chair.png"
            ],
            [
              "product_id" => "155",
              "image" => "images/product/gallery/electric patient transfer chair for patients.png"
            ],
            [
              "product_id" => "155",
              "image" => "images/product/gallery/electric patient transfer chair in dubai.png"
            ],
            [
              "product_id" => "155",
              "image" => "images/product/gallery/electric patient transfer chair in uae.png"
            ],
            [
              "product_id" => "155",
              "image" => "images/product/gallery/electric transfer chair manual operation.png"
            ],
            [
              "product_id" => "157",
              "image" => "images/product/gallery/electric patient transfer chair.png"
            ],
            [
              "product_id" => "157",
              "image" => "images/product/gallery/automatic patient transfer chair in uae.png"
            ],
            [
              "product_id" => "157",
              "image" => "images/product/gallery/electric patient chair.png"
            ],
            [
              "product_id" => "157",
              "image" => "images/product/gallery/electric patient transfer chair for patients.png"
            ],
            [
              "product_id" => "157",
              "image" => "images/product/gallery/electric patient transfer chair in dubai.png"
            ],
            [
              "product_id" => "157",
              "image" => "images/product/gallery/electric patient transfer chair in uae.png"
            ],
            [
              "product_id" => "157",
              "image" => "images/product/gallery/electric transfer chair manual operation.png"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/freecurve stairlift for elderly.jpg"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/freecurve stairlift for home.jpg"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/freecurve stairlift in dubai.jpg"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/handicare freecurve stairlift.jpg"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/handicare freecurve.jpg"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/alliance seat freecurve.jpg"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/elegance seat freecurve.jpg"
            ],
            [
              "product_id" => "160",
              "image" => "images/product/gallery/classic seat freecurve.jpg"
            ],
            [
              "product_id" => "162",
              "image" => "images/product/gallery/handicare straight stair elevator.jpg"
            ],
            [
              "product_id" => "162",
              "image" => "images/product/gallery/handicare straight stairlift.jpg"
            ],
            [
              "product_id" => "162",
              "image" => "images/product/gallery/straight stairlift for elderly.jpg"
            ],
            [
              "product_id" => "162",
              "image" => "images/product/gallery/straight stairlift for home.jpg"
            ],
            [
              "product_id" => "162",
              "image" => "images/product/gallery/straight stairlift in dubai.jpg"
            ],
            [
              "product_id" => "163",
              "image" => "images/product/gallery/handicare outdoor stair elevator.jpg"
            ],
            [
              "product_id" => "163",
              "image" => "images/product/gallery/handicare outdoor stairlift.jpg"
            ],
            [
              "product_id" => "163",
              "image" => "images/product/gallery/outdoor stairlift for villa.jpg"
            ],
            [
              "product_id" => "163",
              "image" => "images/product/gallery/outdoor stairlift in dubai.jpg"
            ],
            [
              "product_id" => "164",
              "image" => "images/product/gallery/3 feet ramp.jpg"
            ],
            [
              "product_id" => "164",
              "image" => "images/product/gallery/3 feet lightweight wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "164",
              "image" => "images/product/gallery/3 feet lightweight wheelchair ramp.jpg"
            ],
            [
              "product_id" => "164",
              "image" => "images/product/gallery/3 feet portable ramp.jpg"
            ],
            [
              "product_id" => "164",
              "image" => "images/product/gallery/3 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "164",
              "image" => "images/product/gallery/3 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "165",
              "image" => "images/product/gallery/4 feet ramp.jpg"
            ],
            [
              "product_id" => "165",
              "image" => "images/product/gallery/4 feet lightweight wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "165",
              "image" => "images/product/gallery/4 feet lightweight wheelchair ramp.jpg"
            ],
            [
              "product_id" => "165",
              "image" => "images/product/gallery/4 feet portable ramp.jpg"
            ],
            [
              "product_id" => "165",
              "image" => "images/product/gallery/4 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "165",
              "image" => "images/product/gallery/4 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "166",
              "image" => "images/product/gallery/5 feet ramp.jpg"
            ],
            [
              "product_id" => "166",
              "image" => "images/product/gallery/5 feet lightweight wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "166",
              "image" => "images/product/gallery/5 feet lightweight wheelchair ramp.jpg"
            ],
            [
              "product_id" => "166",
              "image" => "images/product/gallery/5 feet portable ramp.jpg"
            ],
            [
              "product_id" => "166",
              "image" => "images/product/gallery/5 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "166",
              "image" => "images/product/gallery/5 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "167",
              "image" => "images/product/gallery/6 feet ramp.png"
            ],
            [
              "product_id" => "167",
              "image" => "images/product/gallery/6 feet lightweight wheelchair ramp in dubai.png"
            ],
            [
              "product_id" => "167",
              "image" => "images/product/gallery/6 feet lightweight wheelchair ramp.png"
            ],
            [
              "product_id" => "167",
              "image" => "images/product/gallery/6 feet portable ramp.png"
            ],
            [
              "product_id" => "167",
              "image" => "images/product/gallery/6 feet wheelchair ramp in dubai.png"
            ],
            [
              "product_id" => "168",
              "image" => "images/product/gallery/6 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "168",
              "image" => "images/product/gallery/6 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "169",
              "image" => "images/product/gallery/8 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "169",
              "image" => "images/product/gallery/8 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "170",
              "image" => "images/product/gallery/10 feet wheelchair ramp.jpg"
            ],
            [
              "product_id" => "170",
              "image" => "images/product/gallery/10 feet wheelchair ramp in dubai.jpg"
            ],
            [
              "product_id" => "171",
              "image" => "images/product/gallery/1.png"
            ],
            [
              "product_id" => "171",
              "image" => "images/product/gallery/2.png"
            ],
            [
              "product_id" => "171",
              "image" => "images/product/gallery/3.png"
            ],
            [
              "product_id" => "171",
              "image" => "images/product/gallery/4.png"
            ],
            [
              "product_id" => "171",
              "image" => "images/product/gallery/5.png"
            ],
            [
              "product_id" => "171",
              "image" => "images/product/gallery/6.png"
            ],
            [
              "product_id" => "172",
              "image" => "images/product/gallery/alerta bubble E Manafeth.jpg"
            ],
            [
              "product_id" => "172",
              "image" => "images/product/gallery/alerta bubble mattress for bed.jpg"
            ],
            [
              "product_id" => "172",
              "image" => "images/product/gallery/alerta bubble mattress in dubai.jpg"
            ],
            [
              "product_id" => "172",
              "image" => "images/product/gallery/alerta medical mattress.jpg"
            ],
            [
              "product_id" => "173",
              "image" => "images/product/gallery/Q-8200-A-L.jpg"
            ],
            [
              "product_id" => "173",
              "image" => "images/product/gallery/QRT Standard.jpg"
            ],
            [
              "product_id" => "173",
              "image" => "images/product/gallery/Qstraint Standard Lock system.jpg"
            ],
            [
              "product_id" => "173",
              "image" => "images/product/gallery/wheelchair lock system standard.jpg"
            ],
            [
              "product_id" => "173",
              "image" => "images/product/gallery/wheelchair secure lock QRT Standard.jpg"
            ],
            [
              "product_id" => "174",
              "image" => "images/product/gallery/Q-8200-A-SC.jpg"
            ],
            [
              "product_id" => "174",
              "image" => "images/product/gallery/Qstraint Standard Lock system SC.jpg"
            ],
            [
              "product_id" => "174",
              "image" => "images/product/gallery/wheelchair lock system standard SC.jpg"
            ],
            [
              "product_id" => "175",
              "image" => "images/product/gallery/mariani under vehicle lift in dubai.jpg"
            ],
            [
              "product_id" => "175",
              "image" => "images/product/gallery/mariani under vehicle lift.jpg"
            ],
            [
              "product_id" => "175",
              "image" => "images/product/gallery/under vehicle lift in dubai.jpg"
            ],
            [
              "product_id" => "175",
              "image" => "images/product/gallery/under vehicle lift.jpg"
            ],
            [
              "product_id" => "175",
              "image" => "images/product/gallery/UVL lift Dubai.jpg"
            ],
            [
              "product_id" => "175",
              "image" => "images/product/gallery/UVL Lift.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artira platform lift five.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artira platform lift four.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artira platform lift one.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artira platform lift six.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artira platform lift three.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artira platform lift two.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artirta plaftom lift in dubai.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa artirta plaftom lift.jpg"
            ],
            [
              "product_id" => "176",
              "image" => "images/product/gallery/garaventa plaftom lift.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 plaftom lift (2).jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 plaftom lift in dubai.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 plaftom lift.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 platform lift five.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 platform lift four.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 platform lift one.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 platform lift six.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 platform lift three.jpg"
            ],
            [
              "product_id" => "177",
              "image" => "images/product/gallery/garaventa x3 platform lift two.jpg"
            ],
            [
              "product_id" => "178",
              "image" => "images/product/gallery/garaventa Opal plaftom lift dubai.jpg"
            ],
            [
              "product_id" => "178",
              "image" => "images/product/gallery/garaventa Opal plaftom lift in dubai.jpg"
            ],
            [
              "product_id" => "178",
              "image" => "images/product/gallery/garaventa Opal plaftom lift.jpg"
            ],
            [
              "product_id" => "178",
              "image" => "images/product/gallery/garaventa Opal platform lift one.jpg"
            ],
            [
              "product_id" => "178",
              "image" => "images/product/gallery/garaventa Opal platform lift two.jpg"
            ],
            [
              "product_id" => "179",
              "image" => "images/product/gallery/garaventa Staage portable vertical lift.jpg"
            ],
            [
              "product_id" => "179",
              "image" => "images/product/gallery/garaventa Staage portable vertical lift dubai.jpg"
            ],
            [
              "product_id" => "179",
              "image" => "images/product/gallery/garaventa Staage portable vertical lift in dubai.jpg"
            ],
            [
              "product_id" => "179",
              "image" => "images/product/gallery/garaventa Staage portable vertical wheelchair lift.jpg"
            ],
            [
              "product_id" => "179",
              "image" => "images/product/gallery/portable vertical wheelchair lift in dubai.jpg"
            ],
            [
              "product_id" => "179",
              "image" => "images/product/gallery/portable vertical wheelchair lift.jpg"
            ],
            [
              "product_id" => "183",
              "image" => "images/product/gallery/4th one.png"
            ],
            [
              "product_id" => "183",
              "image" => "images/product/gallery/5th one (1).png"
            ],
            [
              "product_id" => "183",
              "image" => "images/product/gallery/6th one (1).png"
            ],
            [
              "product_id" => "183",
              "image" => "images/product/gallery/black-friday-crazy-sale-banner-with-limited-time-offer_1017-41018.jpg"
            ]
        ];
        DB::table('product_images')->insert($images);
        $rents = [
            [
            "product_id" => "94",
            "title" => "3 Days",
            "days" => "3",
            "amount" => "450"
            ],
            [
            "product_id" => "94",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "94",
            "title" => "3 Weeks",
            "days" => "21",
            "amount" => "850"
            ],
            [
            "product_id" => "94",
            "title" => "1 Month",
            "days" => "30",
            "amount" => "950"
            ],
            [
            "product_id" => "1",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "250"
            ],
            [
            "product_id" => "1",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "350"
            ],
            [
            "product_id" => "1",
            "title" => "1 Month",
            "days" => "30",
            "amount" => "450"
            ],
            [
            "product_id" => "98",
            "title" => "3 Days",
            "days" => "3",
            "amount" => "450"
            ],
            [
            "product_id" => "98",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "750"
            ],
            [
            "product_id" => "98",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "950"
            ],
            [
            "product_id" => "104",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "180"
            ],
            [
            "product_id" => "104",
            "title" => "2 Weeks",
            "days" => "14",
            "amount" => "250"
            ],
            [
            "product_id" => "104",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "320"
            ],
            [
            "product_id" => "112",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "250"
            ],
            [
            "product_id" => "112",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "350"
            ],
            [
            "product_id" => "112",
            "title" => "1 Month",
            "days" => "30",
            "amount" => "450"
            ],
            [
            "product_id" => "98",
            "title" => "1 Month",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "99",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "99",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "99",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "99",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1450"
            ],
            [
            "product_id" => "100",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "100",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "100",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "100",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1450"
            ],
            [
            "product_id" => "101",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "101",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "101",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "950"
            ],
            [
            "product_id" => "101",
            "title" => "4 Week",
            "days" => "28",
            "amount" => "1450"
            ],
            [
            "product_id" => "102",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "102",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "102",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "102",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1450"
            ],
            [
            "product_id" => "103",
            "title" => "3 Days",
            "days" => "3",
            "amount" => "450"
            ],
            [
            "product_id" => "103",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "750"
            ],
            [
            "product_id" => "103",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "950"
            ],
            [
            "product_id" => "103",
            "title" => "1 Month",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "105",
            "title" => "3 Days",
            "days" => "3",
            "amount" => "450"
            ],
            [
            "product_id" => "105",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "750"
            ],
            [
            "product_id" => "105",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "950"
            ],
            [
            "product_id" => "105",
            "title" => "1 Month",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "110",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "750"
            ],
            [
            "product_id" => "110",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "1050"
            ],
            [
            "product_id" => "110",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1350"
            ],
            [
            "product_id" => "110",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1550"
            ],
            [
            "product_id" => "111",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "750"
            ],
            [
            "product_id" => "111",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "1050"
            ],
            [
            "product_id" => "111",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1350"
            ],
            [
            "product_id" => "111",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1550"
            ],
            [
            "product_id" => "95",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "850"
            ],
            [
            "product_id" => "95",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "1150"
            ],
            [
            "product_id" => "95",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1350"
            ],
            [
            "product_id" => "95",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "96",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "850"
            ],
            [
            "product_id" => "96",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "1150"
            ],
            [
            "product_id" => "96",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1350"
            ],
            [
            "product_id" => "96",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "154",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "154",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "850"
            ],
            [
            "product_id" => "154",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1100"
            ],
            [
            "product_id" => "157",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "850"
            ],
            [
            "product_id" => "157",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1100"
            ],
            [
            "product_id" => "157",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1800"
            ],
            [
            "product_id" => "106",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "106",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "106",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "106",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1450"
            ],
            [
            "product_id" => "107",
            "title" => "3 Days",
            "days" => "3",
            "amount" => "450"
            ],
            [
            "product_id" => "107",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "750"
            ],
            [
            "product_id" => "107",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "950"
            ],
            [
            "product_id" => "107",
            "title" => "1 Month",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "108",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "108",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "108",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "108",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1450"
            ],
            [
            "product_id" => "161",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "161",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "161",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "161",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "164",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "164",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "164",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "164",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "165",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "165",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "165",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "165",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "166",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "166",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "166",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "166",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "167",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "167",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "167",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "167",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "168",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "168",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "168",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "168",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "169",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "169",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "169",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "169",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "170",
            "title" => "1 Week",
            "days" => "7",
            "amount" => "650"
            ],
            [
            "product_id" => "170",
            "title" => "2 Week",
            "days" => "14",
            "amount" => "950"
            ],
            [
            "product_id" => "170",
            "title" => "3 Week",
            "days" => "21",
            "amount" => "1250"
            ],
            [
            "product_id" => "170",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "1500"
            ],
            [
            "product_id" => "104",
            "title" => "4 Week",
            "days" => "30",
            "amount" => "380"
            ],
            [
            "product_id" => "95",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "96",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "99",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "100",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "101",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "102",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "104",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "106",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "108",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "110",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "111",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "154",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "157",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "161",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "164",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "165",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "166",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "167",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "168",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
            "product_id" => "169",
            "title" => "Custom",
            "days" => "100",
            "amount" => "0"
            ],
            [
                "product_id" => "170",
                "title" => "Custom",
                "days" => "100",
                "amount" => "0"
            ]
        ];
        DB::table('product_rents')->insert($rents);
    }
}
