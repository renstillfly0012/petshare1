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
            'Carousel','Carousel','Carousel',
            'About Us', 'About Us','About Us',
            'Contact Details','Contact Details','Contact Details',
            'Background Image', 'Logo Image'
        ];
        
        $titles = [
        'First Slide','Second Slide','Third Slide',
        'First Information','Second Information','Third Information',
        'First Contact','Second Contact','Third Contact',
        'Background Image','Logo'
        ];

        $images = [
            'adopt.png','report.png','donate.png',
            'adopt.png','report.png','donate.png',
            '','','',
            'landing_page.png','pspcalogo.png',  
        ];
        $descriptions = [
            'First Slide description here','Second Slide description here','Third Slide description here',
            'ADOPT/SURRENDER
            A
            PET',
            'REPORT ANIMAL
            CRUELTY
            OR
            RESCUE ANIMALS.',
            'DONATE TO HELP
            THE ANIMALS.',
            'First Contact Details','Second Contact Details','Third Contact Details',
            'Background of landing page', 'Logo of the site',
            
        ];
        for($i=0; $i<=10; $i++)
        {
            $cms = Content::create([
                'content_section' => $sections[$i],
                'content_title' => $titles[$i],
                'content_image' => $images[$i],
                'content_description' => $descriptions[$i],
            ]);
        }
       



    }
}
