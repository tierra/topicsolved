# phpBB Topic Solved Extension

Allows posting questions, and accepting answers as solved.

Solved indicators will be shown next to titles throughout forum and topic
views. Mostly ideal for support forums, but can be customized for marking
topics for other purposes such as classifieds being marked as sold.

This is an update of the phpBB 3.0.x Topic Solved MOD, written by Jari Kanerva.

[![Packagist](https://img.shields.io/packagist/v/tierra/topicsolved.svg)](https://packagist.org/packages/tierra/topicsolved)
[![Travis](https://img.shields.io/travis/tierra/topicsolved.svg)](https://travis-ci.org/tierra/topicsolved)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/tierra/topicsolved.svg)](https://scrutinizer-ci.com/g/tierra/topicsolved/?branch=master)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/tierra/topicsolved.svg)](https://scrutinizer-ci.com/g/tierra/topicsolved/?branch=master)

## Features

*   Solved indicators show in the following locations:
    *   Forum View
    *   Topic View
    *   Search Results (both Post and Topic views)
    *   MCP Forum View
*   Use custom text indicator instead of default image.
*   Custom text indicators can use custom colour.
*   Only topic author or moderator can solve topics.
*   Can be locked to only moderator access for solving topics.
*   Solving topics may be set to automatically lock/unlock the topic.
*   All settings can be customized per-forum.

## Translations

This extension comes bundled with support for the following languages:

*    Arabic (ar)
*    Czech (cs)
*    Danish (da)
*    Dutch (nl)
*    English (en)
*    Estonian (et)
*    Finnish (fi)
*    French (fr)
*    German (de)
*    German (Formal Honorifics) (de_x_sie)
*    Japanese (ja)
*    Polish (pl)
*    Portuguese (pt)
*    Portuguese (Brazilian) (pt_br)
*    Russian (ru)
*    Spanish (es)
*    Swedish (sv)
*    Turkish (tr)

Additional translations can be [requested and submitted here][transifex].

[transifex]: https://www.transifex.com/tierra/phpbb-topic-solved/

## Supported Styles

Most phpBB 3.1.x styles should work with this extension out of the box,
however, some styles require additional changes for full functionality. If your
style does not work correctly, you can request support for your style from the
[Issue Tracker][]. The following styles are explicitly supported:

*   prosilver
*   subsilver2
*   bb3-mobi
*   pbtech
*   subway

## Requirements

*   PHP 5.3.10+
*   phpBB 3.1.3+

## Install

You can install this extension in phpBB by following the steps below:

1. [Download the latest release](https://github.com/tierra/topicsolved/releases).
2. Unzip the downloaded release, and change the name of the folder to
   `topicsolved`.
3. In the `ext` directory of your phpBB board, create a new directory named
   `tierra` (if it does not already exist).
4. Copy the `topicsolved` directory to `phpBB/ext/tierra/` (if done correctly,
   this readme file should be located at:
   `phpBB/ext/tierra/topicsolved/readme.md`).
5. Navigate in the ACP to `Customise -> Manage extensions`.
6. Look for `Topic Solved` under the Disabled Extensions list, and click its
   `Enable` link.

## Getting Started

After enabling the extension, you must configure each individual forum you
would like solved topic functionality to be enabled for. Under the "Forums"
section in the Administration Control Panel, find each forum you would like to
enable solved topics for, and click "Edit forum".

Topic Solved will not work for "Category" or "Link" type forums, it will only
work with "Forum" forum types. Once you have ensured your forum is set for the
"Forum" type, the topic solved settings will show up in it's own section near
the bottom of the settings form.

At the minimum, you must select either "Yes" or "Moderator" for the "Allow
topics to be marked as solved" setting in order to enable solved topics for the
forum you wish to use this extension with.

The remaining settings alter the behavior and permissions required to mark
topics as solved or unsolved, as well as the appearance of the indicator.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Topic Solved` under the Enabled Extensions list, and click its
   `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the
   `/ext/tierra/topicsolved` directory.

## Support

Please report bugs and other issues to the [Issue Tracker][].

[Issue Tracker]: https://github.com/tierra/topicsolved/issues

## License

The phpBB Topic Solved extension is released under the
[GNU General Public License v2][GPL-2.0].

[GPL-2.0]: http://opensource.org/licenses/GPL-2.0
