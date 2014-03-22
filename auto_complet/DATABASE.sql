CREATE TABLE IF NOT EXISTS `categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_url` text NOT NULL,
  PRIMARY KEY (`cid`)
);

INSERT INTO `categories` (`cid`, `cat_name`, `cat_url`) VALUES
(1, 'Webdesign', 'http://www.marcofolio.net/webdesign/'),
(2, 'CSS', 'http://www.marcofolio.net/css/'),
(3, 'Photoshop', 'http://www.marcofolio.net/photoshop/'),
(4, 'Imagedump', 'http://www.marcofolio.net/imagedump/'),
(5, 'Icon', 'http://www.marcofolio.net/icon/'),
(6, 'Inspiration', 'http://www.marcofolio.net/inspiration/'),
(7, 'Actionscript', 'http://www.marcofolio.net/actionscript/'),
(8, 'Joomla', 'http://www.marcofolio.net/joomla/'),
(9, 'Features', 'http://www.marcofolio.net/features/'),
(10, 'Reviews', 'http://www.marcofolio.net/reviews/'),
(11, 'Other', 'http://www.marcofolio.net/other/'),
(12, 'How to', 'http://www.marcofolio.net/how_to/'),
(13, 'Cheat Sheets', 'http://www.marcofolio.net/cheat_sheets/'),
(14, 'Tips', 'http://www.marcofolio.net/tips/'),
(15, 'Tools', 'http://www.marcofolio.net/tools/'),
(16, 'Games', 'http://www.marcofolio.net/games/'),
(17, 'Video', 'http://www.marcofolio.net/video/');

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `search` (`id`, `cat_id`, `name`, `img`, `desc`, `url`) VALUES
(1, 10, 'Chatting on warp speed with Janko Javonovic', 'janko_javonovic_chat.png', 'Last week, I was "chatting on warp speed" with Janko, sharing thoughts about webdesign, UI design, webdevelopment and his personal life. You can read this conversation right here.', 'http://www.marcofolio.net/reviews/chatting_on_warp_speed_with_janko_javonovic.html'),
(2, 4, '[Imagedump] March 2009', 'march_09.png', 'Here''s a small collection of the best, funniest or coolest images to cheer up your day.', 'http://www.marcofolio.net/imagedump/imagedump_march_2009.html'),
(3, 1, 'Creating a polaroid photo viewer with CSS3 and jQuery ', 'polaroid_css3_jquery.png', 'By combining the CSS3 Box Shadow and Rotate properties, creating a polaroid page where you can drag images around is relatively easy to create.', 'http://www.marcofolio.net/webdesign/creating_a_polaroid_photo_viewer_with_css3_and_jquery.html'),
(4, 9, 'A Walkthrough on Creating Icons with Photoshop', 'photoshop_icons.png', 'Many think about making their own icons for their design projects. In fact it is actually possible to make your own icons, according to your taste. What you will need is Adobe Photoshop, some Photoshop tutorials to get an idea, and of course your creativity.', 'http://www.marcofolio.net/features/a_walkthrough_on_creating_icons_with_photoshop.html'),
(5, 1, 'The iPhone Contacts App with CSS and jQuery', 'iphone_contactsapp.png', 'The design of the Contacts app will be used and displayed in your browser using jQuery.', 'http://www.marcofolio.net/webdesign/the_iphone_contacts_app_with_css_and_jquery.html'),
(6, 6, 'Gimme some inspiring band website designs', 'band_websites.png', 'There are some amazing (popular) music bands out there that have an incredibly amazing and inspiring website design. With their great music and their well designed online "business card", it helps in their success.', 'http://www.marcofolio.net/inspiration/gimme_some_inspiring_band_website_designs.html'),
(7, 10, 'Marcofolio.net gets a facelift', 'marcofolio_2.0.png', 'Remember my goals for 2009? One of the goals was: Finally changing / update my template. Today, I''m proud to release this template, giving Marcofolio.net a totally new and unique look.', 'http://www.marcofolio.net/reviews/marcofolio.net_gets_a_facelift.html'),
(8, 14, '27 inspiring top notch programming quotes', 'programming_quotes.png', 'While searching for inspiring programming quotes, there were loads of others that are really funny (and true) where I (and probably many more) can relate to.', 'http://www.marcofolio.net/tips/27_inspiring_top_notch_programming_quotes.html'),
(9, 4, '[Imagedump] February 2009', 'february_09.png', 'I''m presenting you yet another small collection of the best, funniest or coolest images for February 2009 to cheer up your day. You can show these imagedumps to your friends and family, just to give them a laugh too.', 'http://www.marcofolio.net/imagedump/imagedump_february_2009.html'),
(10, 14, 'Getting Groovy in an SOA', 'groovy_grails_soa.png', 'Six months ago, I''ve started researching a fairly new programming language called Groovy together with a couple of my classmates. Our task was to investigate Groovy, Grails, and their position in a SOA environment.', 'http://www.marcofolio.net/tips/getting_groovy_in_an_soa.html'),
(11, 1, 'The iPhone Springboard in xHTML, CSS and jQuery', 'iphone_springboard.png', 'The next obvious step for me, was to create the iPhone Springboard in xHTML, CSS and jQuery.', 'http://www.marcofolio.net/webdesign/the_iphone_springboard_in_xhtml_css_and_jquery.html'),
(12, 5, 'Social Post Stamps: Free icon set', 'poststamps.png', 'Today, I''m proud to present you my first icon pack: Social Post Stamps. Social Post Stamps is a social media icon set with 13 different icons all placed on post stamps.', 'http://www.marcofolio.net/icon/social_post_stamps_free_icon_set.html'),
(13, 11, 'Spotlight: T-shirt design from Aled Lewis', 'aled_lewis.png', 'Designer Aled Lewis is one of those talented designers that loves to create designs for shirts. Because I really like his illustrations, todays spotlight is on him.', 'http://www.marcofolio.net/other/spotlight_t-shirt_design_from_aled_lewis.html'),
(14, 8, 'Enable Akismet support in !JoomlaComment', 'akismet_joomla.png', '!JoomlaComment isn''t perfect (yet). It''s still missing some features that make others (Like JomComment) more attractive, like the support for trackback. On the other hand, !JoomlaComment does allow threaded / nested comments which is a big positive point.', 'http://www.marcofolio.net/joomla/enable_akismet_support_in_joomlacomment.html'),
(15, 1, 'The iPhone unlock screen in xHTML, CSS and jQuery', 'iphone_unlock.png', 'Today, I''m going to show you how to create The iPhone unlock screen in xHTML, CSS and jQuery.', 'http://www.marcofolio.net/webdesign/the_iphone_unlock_screen_in_xhtml_css_and_jquery.html'),
(16, 2, 'Styling a chat conversation with text balloons', 'speech_balloons_css3.png', 'I wanted to share how you can create such a nicely styled chat conversation with text balloons using CSS3. You can show your interviews or chat conversations online in a pretty way, making it more visually attractive.', 'http://www.marcofolio.net/css/styling_a_chat_conversation_with_text_balloons.html'),
(17, 9, 'Best of the Best: 2008', 'best_of_08.png', 'With all those great blogs out there, there has to be loads and loads of quality content written in the past year. But what is actually the best post from 2008 from those sites? To who can I ask that question better than the actual owners / authors of those great blogs.', 'http://www.marcofolio.net/features/best_of_the_best_2008.html'),
(18, 9, 'Top 15 Free Mac Apps for Graphic Designers', 'free_apps.png', 'The most common app(s) that designers use has to be Adobe Photoshop (Or the full suite). The app(s) are great, but there is a downside: The price tag. Photoshop CS4 costs $699, CS4 extended is $999 and the full Creative Suite starts at an stunning $1799. For many people this is just a little bit too much to "play around with".', 'http://www.marcofolio.net/features/top_15_free_mac_apps_for_graphic_designers.html'),
(19, 14, 'Royal design blogs that can''t be dethroned', 'royal_blog.png', 'This article will show the The roadmap from the Kingdom of design blogs, listing the greatest / biggest players in this game. These bloggers have the biggest influence on the design community, bringing you innovative articles every time a new one is released.', 'http://www.marcofolio.net/tips/royal_design_blogs_that_cant_be_dethroned.html'),
(20, 16, 'Time wasters: 15 addictive Flash games', 'flash.png', 'Here a small list with real time wasters: 15 addictive (but fun) Flash games.', 'http://www.marcofolio.net/games/time_wasters_15_addictive_flash_games.html'),
(21, 6, 'The colours of game heroes', 'game_heroes.png', 'This article is showing the colours of game heroes just to feed your inspiration fluids and get them juiced up.', 'http://www.marcofolio.net/inspiration/the_colours_of_game_heroes.html'),
(22, 2, 'A parallax illusion with CSS: The Horse in Motion', 'parallax_illusion_css.png', 'Time for some fun with CSS and optical illusions.', 'http://www.marcofolio.net/css/a_parallax_illusion_with_css_the_horse_in_motion.html'),
(23, 6, 'Show me some sleek and well designed game logos', 'game_logos.png', 'The list below shows some seriously sleek and well designed game logos for your inspiration. They all have one thing in common: The logo is more than "just the name of the game" in a fancy way. It''s something where you can recognize the game of.', 'http://www.marcofolio.net/inspiration/show_me_some_sleek_and_well_designed_game_logos.html');