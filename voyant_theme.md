## Voyant Theme

Voyant was created using the new DMS 2.0 structure that removes the parent-child theme dependency, known as "core themes".

This means that you only need to install the Voyant Theme and forget about the post conflicts when a new DMS update be released.

Now the update of DMS Core in a "core theme" is developer's responsibility. And a new "core theme" update only will be released when the developer have been tested the latest DMS update.

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



#### Image Slider
#### Mega Title
#### Page Title
#### Pin Switch
#### Timeline
#### Testiminials
#### Team Voyant
#### Blog Loop



 [1]: https://www.pagelines.com/my-account/
 [2]: http://voyant.wpengine.com/
 [3]: http://wordpress.org/plugins/wordpress-seo/
 [4]: http://wordpress.org/plugins/contact-form-7/
 [5]: http://wordpress.org/plugins/sidebar-manager-light/
 [6]: http://enriquechavez.co/wp-content/uploads/2014/06/voyant-config-v1.zip
 [7]: http://codex.wordpress.org/WordPress_Menu_User_Guide