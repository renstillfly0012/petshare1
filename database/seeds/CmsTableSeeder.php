<?php

use Illuminate\Database\Seeder;
use App\Content;
class CmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sections = [
            'Header','Header','Header',
            'Section_Adopt', 'Section_Adopt','Section_Adopt','Section_Adopt','Section_Adopt',
            'Section_Report','Section_Report','Section_Report','Section_Report',
            'Event', 'Event', 'Event', 'Event', 'Event', 'Event', 'Event', 'Event', 'Event',
            'Feedback','Feedback','Feedback','Feedback','Feedback','Feedback','Feedback',
            'Contact Us','Contact Us','Contact Us','Logo'
        ];
        
        $titles = [
        'Heading','Subheading','Subheading',
        'Heading','First Content','Second Content','Third Content','Fourth Content',
        'Heading','First Content','Second Content','Third Content',
        'First Event', 'First Event', ' Second Event', 'Second Event', 'Third Event', 'Third Event', 'Fourth Event', 'Fourth Event', 'Fourth Event',
        'First Carousel','Second Carousel','Third Carousel','Fourth Carousel','Fifth Carousel','Sixth Carousel','Seventh Carousel',
        'Contact Address', 'Contact Telephone', 'Contact Email',''
        ];

        $texts = [
            'EVERY ANIMAL NEEDS SHELTER. ','Let’s help each other build them a better home.','You can chip in with money & effort!',
            'How to adopt a Pet','Choose A Pet','Book an appointment for meeting the pet.','Background Check','Take Care of it.',
            'How to surrender a Pet','Book an appointment for surrendering the pet.','We will review your request if reasonable.','We will take care of your pets and find for future foster parents.',
            '9th Animal Welfare Week Celebration','','PET PROJECT art exhibit','','PSPCA Free Mass Anti-Rabies Vaccination','','By Bust Operation@ San Simon, Pampanga','','',
            '','','','','','','',
            'C.M. Recto Ave.,Quiapo Manila (In front of UE Recto gate','(02) 82939698 2044 / 02-7339427','phil.spca@gmail.com',''

        ];

        $images = [
           '','','',
           '','adoptPet.png','booking.png','bgcheck.png','takecare.png',
           '','booking.png','bgcheck.png','takecare.png',
           'a1.png', 'a4.png', 'a2.png', 'a3.jpg', 'a5.png', 'a6.png', 'a7.png', 'a8.png', 'a9.png',
           'f1.png','f2.png','f3.png','f4.png','f5.png','f6.png','f7.png','f8.png',
           '','','pspcalogo.png',
        ];
        $descriptions = [
            '','','','','','','','','','','','',
            '9th Animal Welfare Week Celebration (Sept. 29 to October 06, 2013) - Bureau of Animal Industry held at Quezon Memorial Circle
            Theme: "Sa Bansang Progresibo, Pagpapahalaga sa Hayop ay Aktibo"','',
            '(Filipinio Artists Realist Movement)','','','','Insert Description',
            '','','','','','','','','','','','','',

            
        ];
        $dates = [
            '','','','','','','','','','','','',
            'Sept. 29 to October 06, 2013','','January 2011','July 13 2013','','July 13 2013',
            '','','','','','','','','','','','','',''
        ];
        for($i=0; $i<=31; $i++)
        {
            $cms = Content::create([
                'content_section' => $sections[$i],
                'content_title' => $titles[$i],
                'content_text' => $texts[$i],
                'content_image' => $images[$i],
                'content_description' => $descriptions[$i],
                'content_date' => $dates[$i]
            ]);
        }
       



    }
}
