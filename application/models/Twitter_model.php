<?php
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

 
define('CONSUMER_KEY', 'y0gCGPHvuOSZD26A5p9N0p7eE');
define('CONSUMER_SECRET', 'Ul6LXsEhySe5DKgXaxWcCwUqw4x60OBkN3bGCIBiUltxX7bk0h');
define('ACCESS_TOKEN', '498716087-1NQuGOAvn8l3jVQGzSiHBq8pxyicFrIwx8OUadrs');
define('ACCESS_TOKEN_SECRET', 'QY7Ljs7GEbafC9UsGiFZNwtkeK6GE7KLoA0xp5PrXdaQp');

	class Twitter_model extends CI_Model{

		  
		   
		
		 
		


		function search1($data)
		{
			$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
			$max_id = "";
			foreach (range(1, 2) as $i) {
			  $query = array(
			    "q" => $data,
			    "count" => 20,
			    "result_type" => "recent",
			    "lang" => "en",
			    "max_id" => $max_id,
			  );


			 
			  $results = $toa->get('search/tweets', $query);


			  return $results;
			}

		}
	}
?>