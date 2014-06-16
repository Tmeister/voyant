## Voyant Theme Child Theme

**This assume that you have already installed PageLines DMS.**

### Get the Zip File

Download the **theme zip file** in to your computer, the files can be obtained from the [PageLines Store][1].

### Standard Installation

1.   Login to your **WordPress Administrator**.
2.   Navigate to **Appearance > Themes**.
3.   Click in the tab **Install**.
4.   Locate and click in the **Upload** link
5.   Click in the **Choose File** button.
6.   Browse your computer and locate the **zip file**.
7.   Click **Install Now**.
8.   When the installation finish locate the new theme in the list.
9.   Click on the **Activate** link.

### Manual Installation

If you encounter problems using the WordPress Installer, you can manually install the plugin using a FTP client.

1.   To install using a FTP client, you will first need to extract the **zip file**.
2.   Using a FTP client, access your host web server and navigate to the **wp-content/themes** directory.
3.   Now upload the new folder to **wp-content/themes**.
4.   Your structure should end up like this **wp-content/themes/voyant**

### Recommended Plugins

In order to get the best experience using **Voyant** and for replicated the [DEMO SITE][2], I recommend a few plugins, (why reinvent the wheel, if there is great plugin out there?).

* [Wordpress SEO][3] - Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using the WordPress SEO plugin by Yoast.
* [Contact Form 7][4] - Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup. The form supports Ajax-powered submitting, CAPTCHA, Akismet spam filtering and so on.
* [Sidebar Manager Light][5] - Create custom sidebars (widget areas) and replace any existing sidebar so you can display relevant content on different pages.

** *I highly recommend install this plugin before install the DEMO content.**

### Import demo content

1. Please [download][6] the demo content file (voyant-config-vX.zip).
2. Unzip the file. located the **.xml** file.
3. Within your wp admin area, go to the Menu Tool -> Import.
4. From the list options, click on WordPress.
5. A popup will show asking for install the **"WordPress Importer"** plugin, click **"Install Now"**.
6. Activate plugin and Run Importer
7. In the **"Choose a file from your computer: "** choose the file from the point 2.
8. Click Upload file and import.
9. In the **"Assign Authors"** check the **"Download and import file attachments\"**.
10. Click Submit.

### Set Home & Blog Page

1. Finally set the home and blog pages.
2. Go to the **"Settings > Reading menu"**.
3. Select the **"A static page (select below)"**.
4. In the **"Front Page"** option select **"Home"**.
5. In the **"Posts Page"** option select **"Blog"**.
6. Click  **"Save Changes"**.
7. Reload your site.

### Built-in Sections

#### Menu Voyant

The **Menu Voyant** section need to be attached to the **"fixed"** region in the page template. The Menu will hide and show according to the scroll position.

This section have 4 options:

* **Main Menu** - Select the [WordPress Menu][7] to use as the Main Menu.
* **Site Logotype** - The image to use as the site Logotype.
* **Background Color** - With this option you can change the color for the background menu.
* **Background Color Alpha** - Also you can change the transparency for the background color.

![Voyant Menu](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Menu-1.png)


#### Video Slider

The **Video Slider** section allows you to show a introduction video as a background and slides to show important information or welcome messages. **The Video Slider only support Youtube videos and use an image as fallback for mobile devices.**

**Options:**

**Video URL ( YouTube )** 

This section use a YouTube video as a Background, so is mandatory to use a youtube URL you can use the follow formats:

* https://www.youtube.com/watch?v=**6_4M1sd23V0**
* http://youtu.be/**6_4M1sd23V0**
* **6_4M1sd23V0**

**Alternative image**

This image will be used as a fallback for mobile devices for performance reasons please note that this only will be visible in mobile devices.

**Video Full Height**

If this option is set to TRUE the video will use the full height of the screen automatically, you can set this option to false to use a custom height.

**Video Height (in pixels)**

If the previous option is set to false, the section will used this value (in pixels) to set a custom height. ex. **500px**

**Video Opacity**

When the video start to play the opacity is set in 40%, if you want to change this value just select a value from the dropdown menu.

**Video Start At**

With this option you can set the exact time where the video will start to play, please use a numeric value. ex. 4 for 4 seconds.

**Video Ends At**

With this option you can set the exact time where the video will end to play, please use a numeric value. ex. 120 for 2 minutes.

**Video Play Button**

The background video will play automatically with a opacity and in muted way. If you use this option a play button will be shown under the slider content and when the user click on it the sliders will disappears and the video will shown with full opacity and with sound.

**Video Mute at Start**

You can start the video unmuted if you want this option allows you to do that, the default value is **Muted**

**Video Loop**

You can play the video in a loop or just one.

**Exit Text Indication**

When the user use the play button and the video enter in a "full screen" mode a text appears to let the user know he can click on the video to return to the initial state.

**Slides**

The slides use two options Title and Description this slides will rotate automatically. You can use any shortcode in the description field.

![Voyant Video Slider](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Video-Slider.png)


#### Image Slider

Sometimes a Video as background can be not the first choice, if this is the case, you can get the same goodies that  the Video Slider offers but in this section you use an image for a background.

**Image Full Height**

If this option is set to TRUE the video will use the full height of the screen automatically, you can set this option to false to use a custom height.

**Image Height (in pixels)**

If the previous option is set to false, the section will used this value (in pixels) to set a custom height. ex. **500px**

**Slides**

The slides use two options Title and Description this slides will rotate automatically. You can use any shortcode in the description field.

**Background Image**

The image to use as background.

![Voyant Image Slider](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Image-Slider.png)


#### Mega Title

The Meta Title section allows you to place beautiful titles for your content, using text as a faint shadow, highlighting and complementing the main title. The Main Title section can be used in full-width and content-width mode and can be aligned to the left or to the right.

![Voyant Mega Menu](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Mega-Menu.png)


#### Page Title

The Page Title section allows you to show the pages and posts titles in a beautiful way, setting a image background to highlight the title and if you use the "[WordPress SEO][3]" plugin by Yoast a breadcrumbs are added.

![Voyant Page Title](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Page-Title.png)

**Breadcrumbs**

To activated the breadcrumbs option you need the "[WordPress SEO][3]" plugin by Yoast.

Once the plugin is active navigate to: **SEO > Internal Links** locate the **Enable Breadcrumbs** and click on it to activate.

![Voyant Breadcrumbs](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Breadcrumbs.png)


#### Pin Switch

The Pin Switch section allows you to show small information blocks using a elegant "bullet" navigation.

Each "**Pin**" used the follow 4 options:

* **Content Title**
* **Content Text**
* **Icon Title** 
* **Icon**

![Voyant Pin Switch](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Pin-Switch.png)

#### Timeline

The Timeline section is useful to show events or small information blocks in a progressive view with 4 options: Title, Description, Date (Optional), Icon. This section can be aligned to de right, left or in a odd/even view.

![Voyant Pin Switch](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Timeline.png)


#### Testiminials

The Testimonials section allows you to add clients testimonials or quotes in a easy way you can use or not a avatar for each testimonial.

**Options**

**Color Theme** 

You can choose a "theme" color for each section clone. The **Dark** theme need to be used if you use a dark image or color as a background and **Light** need to be used if you use a light image or background color.

**Avatar Shape**

If you want to use avatar in the testimonials you can choose 3 shapes for the image: 

* Circle
* Drop Botom-Left to Top-Right (Default)
* Drop Top-Left Bottom-Right

**Avatar Options**

* Name
* Testimonial/Quote
* URL (Optional)
* Avatar Image (Optional)

![Voyant Pin Switch](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Testimonials.png)

	
#### Shortcodes

**Highlight**

This shortcode wrap a text in a span tag using the **highlight** class, this class use the **Link Base Color** setting.

```
.highlight{
	color: @pl-link;
}
```

**White**

This shortcode wrap a text in a span tag using the **white** class, this class set the text to white.

```
.white{
	color: white !important;
}
```

#### Helper CSS classes

This classes can be used in each section via the **Custom Styling Classes** 


```
.detach{
	font-size: 22px;
	line-height: 30px;
}

.medium-text{
	font-size: 18px;
}

.margin-top-100{
	margin-top: 100px;
}

.margin-top-75{
	margin-top: 75;
}

.margin-top-50{
	margin-top: 50px;
}

.margin-top-25{
	margin-top: 25px;
}

.highlight{
	color: @pl-link;
}

.reverse-title{
	[data-sync="textbox_title"]{
		color: @pl-base;
		background: @pl-link;
		text-align: center;
		padding: 5px;
		margin-bottom: 10px;
	}
}

.white{
	color: white !important;
}

.bold{
	font-weight: 700;
}
```

**Section Using the helper classes**

![Voyant Helpers](http://enriquechavez.co/wp-content/uploads/2014/06/Voyant-Helpers.png)


 [1]: https://www.pagelines.com/my-account/
 [2]: http://voyant.wpengine.com/
 [3]: http://wordpress.org/plugins/wordpress-seo/
 [4]: http://wordpress.org/plugins/contact-form-7/
 [5]: http://wordpress.org/plugins/sidebar-manager-light/
 [6]: http://enriquechavez.co/wp-content/uploads/2014/06/voyant-config-v1.zip
 [7]: http://codex.wordpress.org/WordPress_Menu_User_Guide