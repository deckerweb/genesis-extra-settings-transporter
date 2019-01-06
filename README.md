# Genesis Extra Settings Transporter - Migrate Settings between Genesis Sites 
**Contributors:** daveshine, deckerweb, wpautobahn  
**Donate link:** https://www.paypal.me/deckerweb  
**Tags:** genesis, genesiswp, genesis framework, settings, exporter, plugins, child themes, export, import, transport, transporter, data, deckerweb  
**Requires at least:** 4.7  
**Tested up to:** 5.0  
**Requires PHP:** 5.6  
**Stable tag:** 1.4.0  
**License:** GPL-2.0-or-later  
**License URI:** https://opensource.org/licenses/GPL-2.0  

Adds support for exporting settings of various Genesis-specific plugins & Child Themes via the Genesis Exporter feature.

[<img src="https://raw.githubusercontent.com/deckerweb/genesis-extra-settings-transporter/master/assets-repos/github-com/gest-banner.png" data-canonical-src="https://raw.githubusercontent.com/deckerweb/genesis-extra-settings-transporter/master/assets-repos/github-com/wpdrsd-banner.png" width="772" height="250" />](https://wordpress.org/plugins/genesis-extra-settings-transporter/)


## Description 

**Migrate or Backup Settings**
Finally, not only do backups or transfers of Genesis core settings but **also hook in official & third-party plugins** plus **some child themes**. Especially useful for site builders and developers to speed up their work!

[![Video of Plugin's Live Demo and Walkthrough](https://img.youtube.com/vi/5c-lemjFxSs/0.jpg)](https://www.youtube.com/watch?v=5c-lemjFxSs)
[**original video link**](https://www.youtube.com/watch?v=5c-lemjFxSs) *by plugin developer David Decker*

A great helper tool for Genesis child themes plus Genesis-specific plugins with their own **extra settings**!

**Please note:** The plugin requires the *Genesis Framework*, a paid premium product released by StudioPress/ WPEngine, Inc. [(via studiopress.com)](https://deckerweb.de/go/genesis/)


### What the Plugin does? 
* Currently 31 different plugins are supported. (These being official ones plus third-party community plugins.)
* Currently 62 different child themes with extra settings are supported. (These being all third-party child themes sold or downloadable via "StudioPress Community Marketplace" *or* elsewhere.)
* Settings export for the first time possible for a lot of these plugins and/ or child themes!
* Combined settings .JSON file, speeds up development especially!
* Seperate plugin settings .JSON files could be useful for testing purposes for developers etc.
* New plugins and child themes may be added, that support the Genesis Settings Field/ API!
* Also, plugins and child themes that natively hook in to the Genesis Exporter themselves may be removed from support here (to avoid doubled items!).
* Fully internationalized plugin, fully transalateable.
* This plugin just leverages the AWESOMENESS of Genesis Framework and WordPress! Therefore it's a really simple, lightweight, flexible plugin.

See the *FAQ* here for a [**full list of supported plugins & child themes...**](https://wordpress.org/plugins/genesis-extra-settings-transporter/#faq)


### Useful for: 
* Users who want to backup their settings - in a combined way, or seperate for supported plugins and/ or themes.
* Developers and/ or agencies who want to speed up their development times and just use pure Genesis awesomeness :).

**Typical Workflow Example**
*Transfer settings from a development install to the live/ production install.*

**1) Prerequisites/ Requirements:**

* On BOTH sites/ installations you have installed & activated for example the (great) "Curtail" child theme, plus the following plugins: Genesis Layout Extras, Genesis Responsive Slider, Genesis Simple Hooks, Genesis Simple Sidebars.
* On BOTH sites/ installations you have installed & activated this plugin, "Genesis Extra Settings Transporter".
* It's recommended to have THE VERY SAME VERSIONS installed on the original site and also the receiving site. Reason: sometimes settings differ between plugin or child theme versions. So with making sure you have the same versions installed you just ensure the correct settings are included within the export file.

**2) Transfer (Migrate):**

* On the development install: Just make an Export file via **Genesis > Import/Export** admin page:
* In the "Export" section there enable all checkboxes you need.
* Save the resulting `.JSON` file to your computer.
* On the live/ production site, just import this `.JSON` file and you're done! ;-)


### Translations 
* English (United States) - `en_US` = default, always included
* [German (informal, default)](https://translate.wordpress.org/locale/de/default/wp-plugins/genesis-extra-settings-transporter) - `de_DE` - always included
* [German (formal)](https://translate.wordpress.org/locale/de/formal/wp-plugins/genesis-extra-settings-transporter) - `de_DE_formal` - always included
* `.pot` file (`genesis-extra-settings-transporter.pot`) for translators is always included in the plugin's 'languages' folder :)


### Be a Contributor 
If you want to translate, [go to the Translation Portal at translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/genesis-extra-settings-transporter).

You can also contribute code-wise via our [Genesis Extra Settings Transporter GitHub Repository](https://github.com/deckerweb/genesis-extra-settings-transporter) - and see where you can help.


### Documentation and Support 
* If you have any more questions, visit our support on the [Plugin's Forum](https://wordpress.org/support/plugin/genesis-extra-settings-transporter).


### Liked Builder Template Categories? 
* **Rate us 5 stars** on [WordPress.org](https://wordpress.org/support/plugin/genesis-extra-settings-transporter/reviews/?filter=5/#new-post) :)
* Join our [**Facebook User Community Support Group**](https://www.facebook.com/groups/deckerweb.wordpress.plugins/)
* Like our [**Facebook Info Page for Deckerweb Plugins**](https://www.facebook.com/deckerweb.wordpress.plugins/)
* [**Subscribe to my Newsletter for insider info on this plugin**](https://eepurl.com/gbAUUn), plus tutorials and more stuff on deckerweb WordPress plugins - join a thriving community of site builders!


### This Plugin ... 
* ... scratches my own itch!
* ... is *Quality Made in Germany*
* ... was created with love (plus some coffee) :-) - [if you like it consider donating](https://www.paypal.me/deckerweb)


### Recommended Time Saver 
Try [**Toolbar Extras**](https://toolbarextras.com/) my other plugin for Site Builders and admins: Building sites with Elementor? [**Your work will get easier & faster with Toolbar Extras.**](https://wordpress.org/plugins/toolbar-extras/) With extended plugin & theme support baked right in. Of course, "Genesis Extra Settings Transporter" is integrated as well :)

* [Plugin Page here on WordPress.org](https://wordpress.org/plugins/toolbar-extras/)
* [Plugin's own website toolbarextras.com](https://toolbarextras.com/)
* In your WordPress admin dashboard search for `toolbar extras` in the plugin installer ;-)


### Check out my other Genesis Plugins 
* [**Genesis Widgetized Not Found & 404**](https://wordpress.org/plugins/genesis-widgetized-notfound/) - Easy Setup for 404 Page and Search Not Found - be prepared for the edge cases
* [**Genesis What's New Info**](https://wordpress.org/plugins/genesis-whats-new-info/) - Show the what's new overview page via left-hand admin menu
* [**Genesis Layout Extras**](https://wordpress.org/plugins/genesis-layout-extras/) - Setup Default Layouts in Genesis for WordPress
* [Genesis Shortcode UI (for Shortcake)](https://github.com/deckerweb/genesis-shortcode-ui)
* [Genesis Elementor Canvas](https://github.com/deckerweb/genesis-elementor-canvas)
* [Genesis Featured Page Extras](https://wordpress.org/plugins/genesis-featured-page-extras/) - more options for the featured page widget
* [Genesis Prose Extras](https://wordpress.org/plugins/genesis-prose-extras/) - add-on for Prose child theme
* [Genesis Printstyle Plus](https://wordpress.org/plugins/genesis-printstyle-plus/) - just print it out - only what's needed
* [Genesis Widgetized Archive](https://wordpress.org/plugins/genesis-widgetized-archive/) - easily set up content for your Archive page (template)
* [Genesis Widgetized Footer](https://wordpress.org/plugins/genesis-widgetized-footer/) - easily set up your copyright/ credits/ back to top
* [Genesis Connect for Easy Digital Downloads](https://wordpress.org/plugins/genesis-connect-edd/) - plugin for easy & elegant integration
* [*My Genesis plugins newsletter*](https://eepurl.com/gbAUUn)


## My Other WordPress Plugins 
* [**Toolbar Extras for Genesis & Elementor - WordPress Admin Bar Enhanced**](https://wordpress.org/plugins/toolbar-extras/)
* [**Builder Template Categories - for WordPress Page Builders**](https://wordpress.org/plugins/builder-template-categories/)
* [**Polylang Connect for Elementor – Language Switcher & Template Tweaks**](https://wordpress.org/plugins/connect-polylang-elementor/)
* [**Simple Download Manager for WP Document Revisions**](https://wordpress.org/plugins/wpdr-simple-downloads/)
* [Multisite Toolbar Additions](https://wordpress.org/plugins/multisite-toolbar-additions/)
* [Cleaner Plugin Installer](https://wordpress.org/plugins/cleaner-plugin-installer/)
* [*My plugins newsletter*](https://eepurl.com/gbAUUn)



## Installation 


### Minimum Requirements 

* WordPress version 4.7 or higher, latest 5.0.x recommended
* **NOTE:** Only works with *Genesis Framework* (GPL-2.0+) as the parent theme (latest version is fine!). This is a paid premium product by StudioPress/ WPEngine, Inc., [available via studiopress.com](https://deckerweb.de/go/genesis/)
* PHP version 5.6 or higher
* MySQL version 5.0 or higher
* Administrator user with capabilities `manage_options` and `edit_theme_options`


### We Recommend Your Host Supports at least: 

* PHP version 7.0 or higher
* MySQL version 5.6 or higher / or MariaDB 10 or higher


### Installation 

1. Install using the WordPress built-in Plugin installer (via **Plugins > Add New** - search for `genesis extra settings transporter`), or extract the ZIP file and drop the contents in the `wp-content/plugins/` directory of your WordPress installation.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the Genesis Exporter page under **Genesis > Import/Export** and check the available options.
4. Now, make your export(s), just for backup or transport settings into other installations, etc. ;-)



## Frequently Asked Questions 


### What's the recommended usage of this plugin? 
[Just see plugin's page (you are on it right now)](https://wordpress.org/plugins/genesis-extra-settings-transporter/) for a typical workflow example.



### "Genesis Simple Sidebars" plugin: Why are inpost/ inpage settings not included? 
Good question, hehe :). Simple answer: not possible as these settings belong to the actual post meta. You can always import & export all posts/ pages/ custom post types via the NATIVE WORDPRESS export and import functionality. This applies for any inpost/ inpage/ CPT post meta settings in WordPress generally. All administrator users have access to "Tools" in the left-hand admin menu and could do exports and imports.



### Why are Widget settings not included? 
That's just not possible yet. Still, there is no such functionality in WordPress core as is in Genesis yet! However, there's a nice third-party plugin for that purpose: ["Widget Importer & Exporter"](https://wordpress.org/plugins/widget-importer-exporter/)



### Why isn't plugin/ child theme X,Y not supported? 
I can only support plugins and child themes that make use of the WordPress/ Genesis settings API and use a settings field other than that from Genesis itself. Will more developers add this to their work I could add support in this helper plugin. It's as simple as that :).

The way better alternative, though, is, when developers add that little hook in to the Genesis Exporter **natively**! In this case I might remove support here for such a plugin/ child theme, of course.

Also note, some plugins have 1 or 2 little settings included in Genesis Theme Settings, therefore THESE settings are then included in the default, native Genesis export file. So you'll already have these safe for your exports and imports as well.



### What's up with the Prose child theme? 
"Prose" natively includes its settings on the Genesis exporter page, so you're already hooked up! You can export and import all "Design Settings" at any time!



### Some settings seem not to be included, what should I do? 
Just make sure you have the very same versions of the plugins or child themes installed. If you have a development and live install, just make sure, both have "Genesis Simple Hooks, version 1.8.0.2" installed, to name an example. -- Reason: Sometimes setting field names could differ between different versions, or settings may be added or removed in newer/ older versions.



### Hands down, how does it all work? 
Just to clarify: This plugin here does NO export/ import ON ITS OWN! It just hooks in to the existing Genesis Exporter feature and leverages existing Genesis & WordPress functionality :).



### Finally come on, what is supported in detail? 
Just have look at the plugin & child theme listing:

**List of Supported Plugins**

* Genesis Simple Hooks (free, by StudioPress)
* Genesis Simple Sidebars (free, by StudioPress/)
* Genesis Slider (free, by StudioPress)
* Genesis Responsive Slider (free, by StudioPress)
* Genesis Simple Edits (free, by StudioPress)
* Genesis Connect for WooCommerce (free, by StudioPress)
* Genesis Layout Extras (free, by David Decker - DECKERWEB)
* Genesis Accessible (free, by Rian Rietveld, Robin Cornett)
* Blox Lite (free, by Nick Diego)
* Blox (Pro) (Premium, by Nick Diego)
* Display Featured Image for Genesis (free, by Robin Cornett)
* Genesis Simple Comments (free, by Nick Croft)
* Genesis Simple Breadcrumbs (free, by Nick Croft)
* Genesis Responsive Header (free, by Nick Croft)
* Genesis Grid Loop (free, by Bill Erickson)
* Genesis Bootstrap Carousel (free, by Justin Tallant)
* Genesis Widget Toggle (free, by Arya Prakasa)
* Genesis Accordion (free, by Pat Ramsey)
* Genesis Post Navigation (free, by Iniyan)
* Genesis 404 Page (free, by Bill Erickson)
* Genesis Design Palette (free, by Andrew Norcross)
* Generate Box (free, by Hesham Zebida)
* Genesis Custom Backgrounds (free, by Travis Smith)
* Genesis Custom Post Types Archives (free, by Travis Smith)
* Genesis Portfolio (free, by Travis Smith) (plugin currently in beta state!)
* WP Genesis Box (free, by Jimmy Peña)
* Dynamic Content Gallery (DCG) (free, by Adew Walker/ studiograsshopper.ch) - from the Genesis ecosystem :)
* WP-Cycle (free, by Nathan Rice) - from the Genesis ecosystem :)
* WP Premise Box (free, by Jimmy Peña) - from the Genesis ecosystem :)
* WP Scribe Box (free, by Jimmy Peña) - from the Genesis ecosystem :)
* *special bonus:* Premise, including "Member Access" module (Premium, by Copyblogger Media LLC)

**List of Supported Child Themes (free & Premium)**

* *NOTE: The following list is as of April of 2013!*
* All by "Web Savvy Marketing, LLC", 19 by the time of plugin release (all Premium)
* All by "Themedy" brand (by Red Streams Consulting), 17 by the time of plugin release (1 free, other Premium)
* All by "Agent Evolution, LLC", 3 by the time of plugin release (all Premium)
* All by "GenesisAwesome" (aka Harish Dasari), 3 by the time of plugin release (all free)
* All by "ThemeWolf" brand, 2 by the time of plugin release (all Premium)
* 11 child themes by "ZigZagPress" brand: Bijou, Engrave, Eshop, Gallery, Megalithe, Prestige, Showroom, Single, Solo, Tequila, Vanilla (all Premium)
* "Curtail" (Premium, by Thomas Griffin Media -- via studiopress.com)
* "Genesis Sandbox" (free, by SureFireWebservice & Travis Smith)
* "Sandbox Theme" (Premium, by SureFire Themes brand)
* "AyoShop" v1.1+ (currently free, by AyoThemes)
* "Dizain-01" (Premium, by ThemeDizain)
* "Radio" (free, by Greg Rickaby -- via GitHub.com)
* "Bigg" (free, by OD - OpenDesigns.org)



### More info on Translations? 

* English - default, always included
* German (de_DE): Deutsch - immer dabei! :-)
* For custom and update-safe language files please upload them to `/wp-content/languages/genesis-extra-settings-transporter/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that as well, just use a language file like `genesis-extra-settings-transporter-en_US.mo/.po` to achieve that (for creating one see the following tools).

**Easy WordPress.org plugin translation platform with GlotPress platform:** [**Translate "Builder Template Categories"...**](https://translate.wordpress.org/projects/wp-plugins/genesis-extra-settings-transporter)

*Note:* All my plugins are internationalized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating and validating I recommend the awesome ["Poedit Editor"](https://www.poedit.net/), which works fine on Windows, macOS and Linux.



### Idea Behind this plugin, its philosophy? 
Exporting and importing settings for plugins like "Genesis Simple Hooks" or my own "Genesis Layout Extras" plugin was always a "nice to have". Now, that I've found out Genesis had a filter for that - thanks to Genesis developer [Gary Jones](https://garyjones.io/)! - I just created this plugin. It's a small tool I need and use myself. My hope is that it may help other users and developers as well! :) ENJOY!



## Screenshots 

### 1. Supported plugins & child themes hooked in to the Genesis Exporter
[missing image]


### 2. Plugin help tab
[missing image]




## Changelog 


([Join my Genesis plugins newsletter](https://eepurl.com/gbAUUn))


### 1.4.0 - 2018-12-14 
* ***New: Brought the plugin back to life after more than five years, yeah! :)***
* New: Added plugin support for "Genesis Connect for WooCommerce" (free by StudioPress)
* New: Added plugin support for "Genesis Accessible" (free, by Rian Rietveld, Robin Cornett)
* New: Added plugin support for "Blox Lite" (free) and "Blox" (Pro) (both by Nick Diego)
* New: Added plugin support for "Display Featured Image for Genesis" (free, by Robin Cornett)
* New: Release on GitHub.com as well (for issues, development etc.), see here: [https://github.com/deckerweb/genesis-extra-settings-transporter](https://github.com/deckerweb/genesis-extra-settings-transporter)
* New: Added plugin update message also to Plugins page (overview table)
* New: Added plugins recommendations library by deckerweb to add plugin installer tips
* New: Added `composer.json` file to the plugin's root folder - this is great for developers using Composer
* New: Added `README.md` file for plugin's GitHub.com repository to make it more readable there
* New: Added new plugin icon and banner on WordPress.org
* New: Created special [Facebook Group for user community support](https://www.facebook.com/groups/deckerweb.wordpress.plugins/) for all plugins from me (David Decker - DECKERWEB), this one here included! ;-) - [please join at facebook!](https://www.facebook.com/groups/deckerweb.wordpress.plugins/)
* Update: In Admin help texts, changed recommended Widget Exporter Importer plugin to better alternative
* Update: Lots of code tweaks and improvements throughout the plugin
* Update: Updated all internal plugin links to current state, deleted the ones that were dead or no longer needed
* Update: `.pot` file for translators, plus German translations
* Update: Readme.txt file
* *Trivia fact: this plugin is already over five (five!) years old. Whoa, that's a lot. ;-)*



### 1.3.0 (2013-04-29) 
* **Unreleased - private beta version!**
* NEW: Added plugin support for "WP Scribe Box" (free, by Jimmy Peña) - from the Genesis ecosystem :)
* NEW: Added plugin support for "WP Premise Box" (free, by Jimmy Peña) - from the Genesis ecosystem :)
* NEW: Added child theme support for "Picture Perfect" (Premium, by Agent Evolution brand)
* NEW: Added child theme support for "Gallery" and "Prestige" (both Premium, by ZigZagPress brand)
* NEW: Added child theme support for "Upshot" (Premium, by ThemeWolf brand)
* CODE: Minor code/documentation updates & improvements.
* UPDATE: Updated German translations and also the `.pot` file for all translators!



### 1.2.0 (2013-03-22) 
* NEW: Added plugin support for "WP Genesis Box" (free, by Jimmy Peña)
* NEW: Added plugin support for "Dynamic Content Gallery (DCG)" (free, by Adew Walker/ studiograsshopper.ch) - from the Genesis ecosystem :)
* NEW: Added plugin support for "WP-Cycle" (free, by Nathan Rice) - from the Genesis ecosystem :)
* NEW: Added child theme support for "Sandbox Theme" (Premium, by Surefire Themes brand)
* NEW: Added child theme support for "Eshop" and "Tequila" (both Premium, by ZigZagPress brand)
* UPDATE: Load translations only within admin area to further improve performance
* CODE: Minor code/documentation updates & improvements
* UPDATE: Updated German translations and also the `.pot` file for all translators



### 1.1.0 (2013-02-01) 
* NEW: Added plugin support for "Genesis Custom Backgrounds", "Genesis Custom Post Types Archives" and "Genesis Portfolio" (all free, by Travis Smith)
* NEW: Added plugin support for "Premise" including its "Member Access" module -- Note: premium landing page plugin by Copyblogger Media LLC (same company as behind "Genesis" :)
* NEW: Added child theme support for "Megalithe" v1.2+ (Premium, by ZigZagPress brand)
* NEW: Added child theme support for "Bigg" (free, by OD - OpenDesigns.org)
* UPDATE: Extended and improved plugin's inline help info
* UPDATE: Updated readme.txt file here with improved instructions and extended FAQ section
* UPDATE: Updated German translations and also the `.pot` file for all translators



### 1.0.0 (2013-01-25) 
* *Initial release*
* Includes support for 17 different plugins
* Includes support for 53 different child themes



## Upgrade Notice 


### 1.4.0 
**Major release: Back in life :-)** - New supported plugins. All code improved. - Have fun migrating some settings ;-) -- **Update highly recommended!**


### 1.3.0 
Several additions & improvements: Extended plugin support. Also updated German translations and .pot file for all translators.


### 1.2.0 
Several additions & improvements: Extended plugin & child theme support. Code improvements. Also updated German translations and .pot file for all translators.


### 1.1.0 
Several additions & improvements: Extended plugin & child theme support. Improved plugin help info. Also updated German translations and .pot file for all translators.


### 1.0.0 
Just released into the wild.