# Shortcodes Thunder #

## Documentation

### Shortcodes

| Shortcode | Description | Link | Status |
<<<<<<< HEAD
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
=======
| --- | --- | --- | --- |
| Alert | Nice Alerts | [documentation](shortcodes/alert.md) | ![](https://img.icons8.com/offices/30/000000/ok.png>) |
| Align | Creates nice alerts | [documentation](shortcodes/align.md) | OK |
| BootstrapButton | Creates nice alerts | [documentation](shortcodes/bootstrapbutton.md) | 
| BootstrapTable | Creates nice alerts | [documentation](shortcodes/bootstraptable.md) |
| Code | Creates nice alerts | [documentation](shortcodes/code.md) |
| Color | Creates nice alerts | [documentation](shortcodes/color.md) |
| Columns | Creates nice alerts | [documentation](shortcodes/columns.md) |
| Div | Creates nice alerts | [documentation](shortcodes/div.md) |
| Email | Creates nice alerts | [documentation](shortcodes/email.md) |
| Figure | Creates nice alerts | [documentation](shortcodes/figure.md) |
| FontAwesome | Creates nice alerts | [documentation](shortcodes/fontawesome.md) |
| H | Creates nice alerts | [documentation](shortcodes/h.md) |
| Lightbox | Creates nice alerts | [documentation](shortcodes/lightbox.md) |
| Mark | Creates nice alerts | [documentation](shortcodes/mark.md) |
| Notice | Creates nice alerts | [documentation](shortcodes/notice.md) |
| Raw | Creates nice alerts | [documentation](shortcodes/raw.md) |
| SafeEmail | Creates nice alerts | [documentation](shortcodes/safeemail.md) |
| Section | Creates nice alerts | [documentation](shortcodes/section.md) |
| Size | Creates nice alerts | [documentation](shortcodes/size.md) |
| Span | Creates nice alerts | [documentation](shortcodes/span.md) |
| Underline | Creates nice alerts | [documentation](shortcodes/underline.md) |
| Url | Creates nice alerts | [documentation](shortcodes/url.md) |
| Vimeo | Creates nice alerts | [documentation](shortcodes/vimeo.md) |
| Wrap | Creates nice alerts | [documentation](shortcodes/wrap.md) |
| Youtube | Creates nice alerts | [documentation](shortcodes/youtube.md) |


>>>>>>> master





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
