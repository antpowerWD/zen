<?php
/**
 * @package Zen_Koans
 * @version 1.0
 */
/*
Plugin Name: Zen Koans
Plugin URI: http://wordpress.org/extend/plugins/zen-koans/
Description: Words are useless to understand this plugin, they are fingers pointing at the moon. Based on Hello Dolly Thanks Matt Mullenweg
Author: Ant Power
Version: 1.0
Author URI: http://www.antpowerwebdevelopment.com
*/

function zen_koan() {
	/** These are the lyrics to Hello Dolly */
	$koans = "Nan-in, a Japanese master during the Meiji era (1868-1912),
	 received a university professor who came to inquire about Zen.
Nan-in served tea. He poured his visitor's cup full, and then kept on pouring.
The professor watched the overflow until he no longer could restrain himself. 
It is overfull. No more will go in! Like this cup, Nan-in said, 
You are full of your own opinions and speculations. 
How can I show you Zen unless you first empty your cup? |
Twenty monks and one nun, who was named Eshun, 
were practicing meditation with a certain Zen master.
Eshun was very pretty even though her head was shaved and her dress plain. 
Several monks secretly fell in love with her. 
One of them wrote her a love letter, insisting upon a private meeting.
Eshun did not reply. The following day the master gave a lecture to the group, 
and when it was over, Eshun arose. Addressing the one who had written to her, she said: 
If you really love me so much, come and embrace me now. |
Tanzan wrote sixty postal cards on the last day of his life,
and asked an attendent to mail them. Then he passed away.
The cards read: I am departing from this world.
This is my last announcement. Tanzan July 27, 1892.|
In the early days of the Meiji era there lived a well-known wrestler called O-nami, Great Waves.
O-nami was immensely strong and knew the art of wrestling. 
In his private bouts he defeated even his teacher, 
but in public he was so bashful that his own pupils threw him.
O-nami felt he should go to a Zen master for help. Hakuju, 
a wandering teacher, was stopping in a little temple nearby, 
so O-nami went to see him and told him of his trouble.
Great Waves is your name, the teacher advised, so stay in this temple tonight. 
Imagine that you are those billows. You are no longer a wrestler who is afraid. 
You are those huge waves sweeping everything before them, 
swallowing all in their path. Do this and you will be the greatest wrestler in the land.
The teacher retired. O-nami sat in meditation trying to imagine himself as waves. 
He thought of many different things. Then gradually he turned more and more to the feeling of the waves. 
As the night advanced the waves became larger and larger. 
They swept away the flowers in their vases. 
Even the Buddha in the shrine was inundated. 
Before dawn the temple was nothing but the ebb and flow of an immense sea.
In the morning the teacher found O-nami meditating, 
a faint smile on his face. He patted the wrestler's shoulder. 
Now nothing can disturb you, he said. You are those waves. You will sweep everything before you.
The same day O-nami entered the wrestling contests and won. 
After that, no one in Japan was able to defeat him. |
Ryokan, a Zen master, lived the simplest kind of life in a little hut at the foot of a mountain. 
One evening a thief visited the hut only to discover there was nothing to steal.
Ryokan returned and caught him. 
You have come a long way to visit me, he told the prowler, 
and you should not return empty-handed. Please take my clothes as a gift.
The thief was bewildered. He took the clothes and slunk away.
Ryoken sat naked, watching the moon. Poor fellow, he mused, 
I wish I could have given him this beautiful moon. |
Anyone walking about Chinatowns in America with observe statues of a stout fellow carrying a linen sack. 
Chinese merchants call him Happy Chinaman or Laughing Buddha.
This Hotei lived in the T'ang dynasty. 
He had no desire to call himself a Zen master or to gather many disciples about him. 
Instead he walked the streets with a big sack into which he would put gifts of candy, 
fruit, or doughnuts. These he would give to children who gathered around him in play. 
He established a kindergarten of the streets.
Whenever he met a Zen devotee he would extend his hand and say: Give me one penny. 
And if anyone asked him to return to a temple to teach others, again he would reply: Give me one penny.
Once he was about his play-work another Zen master happened along and inquired: What is the significance of Zen?
Hotei immediately plopped his sack down on the ground in silent answer.
Then, asked the other, what is the actualization of Zen?
At once the Happy Chinaman swung the sack over his shoulder and continued on his way.|
Tanzan and Ekido were once traveling together down a muddy road. A heavy rain was still falling.
Coming around a bend, they met a lovely girl in a silk kimono and sash, unable to cross the intersection.
Come on, girl said Tanzan at once. Lifting her in his arms, he carried her over the mud.
Ekido did not speak again until that night when they reached a lodging temple. 
Then he no longer could restrain himself. We monks don't go near females, he told Tanzan, 
especially not young and lovely ones. It is dangerous. Why did you do that?
I left the girl there, said Tanzan. Are you still carrying her? |
A university student while visiting Gasan asked him: Have you ever read the Christian Bible?
No, read it to me, said Gasan.
The student opened the Bible and read from St. Matthew: 
And why take ye thought for rainment? Consider the lilies of the field, how they grow. 
They toil not, neither do they spin, 
and yet I say unto you that even Solomon in all his glory was not arrayed like one of these... 
Take therefore no thought for the morrow, for the morrow shall take thought for the things of itself.
Gasan said: Whoever uttered those words I consider an enlightened man.
The student continued reading: Ask and it shall be given you, seek and ye shall find, 
knock and it shall be opened unto you. For everyone that asketh receiveth, 
and he that seeketh findeth, and to him that knocketh, it shall be opened.
Gasan remarked: That is excellent. Whoever said that is not far from Buddhahood. |
What is the sound of one hand clapping?";


	// Here we split it into lines
	$koans = explode( "|", $koans );

	// And then randomly choose a line
	return wptexturize( $koans[ mt_rand( 0, count( $koans ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function zen() {
	$chosen = zen_koan();
	echo "<p id='zen'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'zen' );

// We need some CSS to position the paragraph
function zen_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#zen {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'zen_css' );

?>