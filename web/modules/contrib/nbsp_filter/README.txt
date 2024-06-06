CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers

INTRODUCTION
------------

*NBSP Filter* helps handling non-breaking spaces (&nbsp;) characters in your contents.

Its main purpose is to avoid punctuation marks to break alone on a newline for
languages where it has to have a space before or after. For instance in french:
`In french, there is a space : before double-points or exclamation marks !`

*NBSP Filter* is a WYSIWYG filter you can add on your text formats.
It will provide configurations for the following actions:
 * Remove all useless &nbsp; that might be inserted in your contents
 * Converts space before configured punctuations to non-breaking spaces.
 * Converts space after configured punctuations to non-breaking spaces.

REQUIREMENTS
------------

No special requirements.

INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module.
   See: https://www.drupal.org/node/895232 for further information.

CONFIGURATION
-------------

 * Configure the *NBSP Filter* for each for the desired text formats at
(/admin/config/content/formats).
   * Enable the filter
   * Review defaults configurations and change if necessary
   * Save the text format

MAINTAINERS
-----------

Current maintainer:
 * Dominique CLAUSE (Dom) - https://www.drupal.org/u/Dom