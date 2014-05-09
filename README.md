Start Here, another WordPress theme starter
==========

Start Here is my own WordPress theme Starter.
You can find a **live version** here: http://bromine.mwanoz.fr

![ScreenShot](https://raw.github.com/Manoz/start-here/master/start-here/screenshot.png)

### Current 'Theme-Sheck' errors

**INFO:** recent-posts.php The theme appears to use include or require. If these are being used to include separate sections of a template from independent files, then get_template_part() should be used instead.

    Line 120: include( plugin_dir_path( __FILE__ ).'/adm-recent.php' );

> The include method works fine. No real problems here.

**INFO:** likebox.php The theme appears to use include or require. If these are being used to include separate sections of a template from independent files, then get_template_part() should be used instead.

    Line 92: include( plugin_dir_path( __FILE__ ).'/adm-likebox.php' );

> Same as above

**INFO:** iframe was found in the file likebox.php iframes are sometimes used to load unwanted adverts and code on your site.

    Line 51: <iframe src='//www.facebook.com/plugins/likebox.php?href=<?php echo $page ; 

> No problems here. This is the Facebook iFrame. I'll add it inside a php var to avoir theme check errors.