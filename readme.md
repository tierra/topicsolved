# phpBB Topic Solved Extension

Allows posting questions, and accepting answers as solved.

## Quick Install

You can install this on the latest release of phpBB by following the steps below:

1. [Download the latest release](https://github.com/tierra/phpbb-topic-solved/releases).
2. Unzip the downloaded release, and change the name of the folder to
   `topicsolved`.
3. In the `ext` directory of your phpBB board, create a new directory named
   `tierra` (if it does not already exist).
4. Copy the `topicsolved` directory to `phpBB/ext/tierra/` (if done correctly,
   you'll have the main composer JSON file at
   (your forum root)/ext/tierra/topicsolved/composer.json).
5. Navigate in the ACP to `Customise -> Manage extensions`.
6. Look for `Topic Solved` under the Disabled Extensions list, and click its
   `Enable` link.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Look for `Topic Solved` under the Enabled Extensions list, and click its
   `Disable` link.
3. To permanently uninstall, click `Delete Data` and then delete the
   `/ext/tierra/topicsolved` directory.

## Support

* Report bugs and other issues to our
  [Issue Tracker](https://github.com/tierra/phpbb-topic-solved/issues).

## License

[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)
