<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'ImagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51N3IPqtMNL._SX311_BO1,204,203,200_.jpg',
        	'title' => 'Harry Potter',
        	'description' =>'Based on an original new story by J.K. Rowling, John Tiffany and Jack Thorne, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London West End on 30th July 2016.',
        	'price' => '12']);

        	$product ->save();

        	$product = new \App\Product([
        	'ImagePath' => 'https://images-na.ssl-images-amazon.com/images/I/61hLCO-zhfL._SX333_BO1,204,203,200_.jpg',
        	'title' => 'FAntastic Beats',
        	'description' =>'A brand new edition of this essential companion to the Harry Potter stories, with a new foreword from J.K. Rowling, an irresistible new jacket by Jonny Duddle, illustrations by Tomislav Tomic and six new beasts!',
        	'price' => '16']);

        	$product ->save();

        	$product = new \App\Product([
        	'ImagePath' => 'https://images-na.ssl-images-amazon.com/images/I/61aq1ZejNrL._SX325_BO1,204,203,200_.jpg',
        	'title' => 'The Trials Of Appolo',
        	'description' =>'The god Apollo, cast down to earth and trapped in the form of a gawky teenage boy as punishment, must set off on the second of his harrowing (and hilarious) trials.',
        	'price' => '12']);

        	$product ->save();

        	$product = new \App\Product([
        	'ImagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51hmm18V-WL._SX327_BO1,204,203,200_.jpg',
        	'title' => 'Magnus Chase and the Hammer of Thor',
        	'description' =>'Thors hammer is missing again. The thunder god has a disturbing habit of misplacing his weapon - the mightiest force in the Nine Worlds. But this time the hammer isnt just lost, it has fallen into enemy hands. If Magnus Chase and his friends cant retrieve the hammer quickly, the mortal worlds will be defenseless against an onslaught of giants.',
        	'price' => '12']);

        	$product ->save();
           
            $product = new \App\Product([
            'ImagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51W-jeXf3zL._SX310_BO1,204,203,200_.jpg',
            'title' => 'Grandpa’s Great Escape',
            'description' =>'The eighth novel from NUMBER ONE bestselling author, David Walliams – now available in paperback!
                Jack’s Grandpa…
                *wears his slippers to the supermarket
                serves up Spam à la Custard for dinner
                *and often doesn’t remember Jack’s name
                But he can still take to the skies in a speeding Spitfire and save the day…',
             'price' => '9']);

            $product ->save();
            $product = new \App\Product([
            'ImagePath' => 'https://images-na.ssl-images-amazon.com/images/I/61DikqSwgHL._SX325_BO1,204,203,200_.jpg',
            'title' => 'Demon Dentist',
            'description' =>'Darkness had come to the town. Strange things were happening in the dead of night. Children would put a tooth under their pillow for the tooth fairy, but in the morning they would wake up to find… a dead slug; a live spider; hundreds of earwigs creeping and crawling beneath their pillow.
                Evil was at work. But who or what was behind it…?',
            'price' => '7']);

            $product ->save();

    }
}
