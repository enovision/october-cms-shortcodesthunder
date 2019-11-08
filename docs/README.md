# Shortcodes Thunder #

## Documentation

### Shortcodes

| Shortcode | Description | Link | Status |
| --- | --- | --- | :---: |
| Alert | Nice Alerts | [documentation](shortcodes/alert.md) | ![](../images/i/flag-green.png) |
| Align | Easier way to align elements | [documentation](shortcodes/align.md) | ![](../images/i/flag-green.png) |
| BootstrapButton | Bootstrap buttons made easy | [documentation](shortcodes/bootstrapbutton.md) | ![](../images/i/flag-green.png) | 
| BootstrapTable | Easy conversion of markdown tables to Bootstrap  | [documentation](shortcodes/bootstraptable.md) |![](../images/i/flag-green.png) |
| Code | Enhancing code with linenumbers and hilites | [documentation](shortcodes/code.md) |![](../images/i/flag-green.png) |
| Color | Use colors in markdown | [documentation](shortcodes/color.md) |![](../images/i/flag-green.png) |
| Columns | Creates nice alerts | [documentation](shortcodes/columns.md) |![](../images/i/flag-green.png) |
| Div | Simply adding a div container wrapper | [documentation](shortcodes/div.md) |![](../images/i/flag-green.png) |
| Email | Easy to use email shortcode | [documentation](shortcodes/email.md) |![](../images/i/flag-green.png) |
| Figure | ??? | [documentation](shortcodes/figure.md) |![](../images/i/flag-green.png) |
| FontAwesome | Adding Fontawesome Icons to your markdown text | [documentation](shortcodes/fontawesome.md) |![](../images/i/flag-green.png) |
| H | Creating headers like '#', but with more options | [documentation](shortcodes/h.md) |![](../images/i/flag-green.png) |
| Lightbox | Well, if this wouldn't work (under construction) | [documentation](shortcodes/lightbox.md) |![](../images/i/flag.png) |
| Mark | Hilite text with markers | [documentation](shortcodes/mark.md) |![](../images/i/flag-green.png) |
| Notice | Creates nice alerts | [documentation](shortcodes/notice.md) |![](../images/i/flag-green.png) |
| Raw | ??? | [documentation](shortcodes/raw.md) |![](../images/i/flag-green.png) |
| SafeEmail | Obfuscates Email Addresses | [documentation](shortcodes/safeemail.md) |![](../images/i/flag-green.png) |
| Section | ??? | [documentation](shortcodes/section.md) |![](../images/i/flag-green.png) |
| Size | ??? | [documentation](shortcodes/size.md) |![](../images/i/flag-green.png) |
| Span | Use `<span>` tags | [documentation](shortcodes/span.md) |![](../images/i/flag-green.png) |
| Underline | Underlining made easier | [documentation](shortcodes/underline.md) |![](../images/i/flag-green.png) |
| Url | Creating URL's with more options | [documentation](shortcodes/url.md) |![](../images/i/flag-green.png) |
| Vimeo | Responsive Vimeo video | [documentation](shortcodes/vimeo.md) |![](../images/i/flag-green.png) |
| Wrap | Wrap an element with options | [documentation](shortcodes/wrap.md) |![](../images/i/flag-green.png) |
| Youtube | Responsive Youtube video | [documentation](shortcodes/youtube.md) |![](../images/i/flag-green.png) |

* ![](../images/i/flag-green.png) = OK to use
* ![](../images/i/flag-yellow.png) = still some sharp edges 
* ![](../images/i/flag.png) = not for production 


It colors your markdown code:

![Color](../images/sh_00510.png)

It creates nice notices:

![Notice](../images/sh_00511.png)

It marks your keywords:

![Mark my text](../images/sh_00512.png)

Bootstrap alerts:

![Bootstrap alerts](../images/sh_00513.png)

Bootstrap tables

![Bootstrap tables](../images/sh_00514.png)

And much more...

## What does it do?
This plugin adds extra functionality to your markdown used in the blog plugin from Rainlab.
It is a work-under-construction as new shorcodes are added all the time. This plugin is not in the October CMS marketplace
and no support is offered. It comes as it is.

The name of the plugin is quite explosive, but that is while this plugin is based on [`thunderer/shortcode`](https://github.com/thunderer/Shortcode)
package of Tomasz Kowalczyk.

## How to install
This plugin is not available in the marketplace of October CMS, so you have to install it manually.

Clone this repository to the `plugins\enovision` folder and name it `shortcodesthunder`.

```
git clone https://github.com/enovision/october-cms-shortcodesthunder shortcodesthunder

cd shortcodesthunder

composer install
```

from within the plugins/enovision folder.

The `enovision` folder might not exist, so you have to create that first.
