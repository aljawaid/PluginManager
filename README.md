# Plugin Manager

#### _Plugin for [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software")_

Replace the Installed Plugins section with a whole new interface. Plugin Manager provides both users and developers with an improved comprehensive layout displaying a new section for troubleshooting plugins with a new plugin structure breakdown for each plugin. Install plugins direct from the Plugin Directory or explore new upcoming or untested features from manual plugins.


Features
-------------

- All plugins, installed and available are now sorted alphabetically
- Add `Back to Top` and `Bottom` buttons for easier screen navigation with smooth scrolling effect
- Fully translatable
- Add direct link in Kanboard Settings menu
- Add New Plugin Sidebar Menu Hook
  - `'template:plugin:sidebar'` is located in the plugins menu sidebar
- Add _selected_ [Bootstrap](https://icons.getbootstrap.com) and [Octicons](https://primer.style/octicons/) icons for better clarity and an improved end user experience
- Clean coded icons - no images
- Direct link to [ContentCleaner](https://github.com/aljawaid/ContentCleaner) from the PluginManager sidebar


**Plugin Manager**
- Installed Plugins
  - Renamed as **`Plugin Manager`**
- Show installed plugin count
- Fixed table headers
- Searchable user friendly filter for quickly finding installed plugins
  - Hover over input box to focus without clicking
- Show icon if plugin has database changes
- Show icon for plugin homepage if set
- Show Kanboard compatible version if set
- Show direct link to plugin Readme file if hosted on GitHub, GitLab or Gitea.
- Show plugin installation date

**Plugin Directory**
- NEW: Show plugin structure
  - Show if plugin has database changes
  - Show if plugin contains template or model overrides
  - Show if plugin uses hooks
  - Show when the plugin was last updated
    - [Time Ago Relative Dates _- 51 translatable calculations_](../master/time-ago.md "View table of calculations")
    - Show relative date with exact date in tooltip (toggles to exact date when clicked)
  - _Plugin structures are extracted through new properties in the Kanboard Plugins Directory_
- Show Directory source e.g. official or custom
  - Show url of plugins directory
- Show available plugins count
- Show external weblink for official directory
- Show current application version
- Show icon for Readme file if set
- Searchable user friendly filter for quickly finding available plugins
    - Hover over input box to focus without clicking
- Highlight last updated dates to reflect the development activity of a plugin
- Show plugin totals by type
- Show link to installed plugin

**Manual Plugins**
- Manually install plugins from local archive files or remote locations
- Manual Plugins are part or completely functional but not suitable for general Kanboard installation
- Show a list of plugins which can be manually downloaded and installed
- Developers can list their plugins in the normal directory but if they set remote_install to false, the plugin will appear on the manual plugin page with a download link (no install). Kanboard by default, currently completely ignores such plugins
- These plugins only show in PluginManager

**Plugin Info**
- A page detailing the breakdown of a plugin with valuable information about core components of a Kanboard plugin
- Details explaining the plugin structure as displayed in the _Plugin Directory_ and _Plugin Manager_ pages

**Plugin Problems**
- A page dedicated to common issues with plugins and how to resolve them
- Integration with [KanboardSupport](https://github.com/aljawaid/KanboardSupport) plugin (if installed) to display technical information
- Useful links to further troubleshoot plugin issues all in one place


Screenshots
----------


**Plugin Manager**

![Plugin Manager](../master/Screenshots/screenshot-plugin-manager-main.png "View more screenshots of this plugin using the link below")

**Plugin Directory**

![Plugin Directory](../master/Screenshots/screenshot-plugin-directory-main.png "View more screenshots of this plugin using the link below")

**Manual Plugins**

![Manual Plugins](../master/Screenshots/screenshot-manual-plugins.png "View more screenshots of this plugin using the link below")

**Plugin Problems**

![Plugin Problems](../master/Screenshots/screenshot-plugin-problems.png "View more screenshots of this plugin using the link below")


**_[More screenshots](../master/screenshots.md)_**


Usage
-------------

Go to `Plugins`

**_or_**

`Settings` &#10562; `Plugin Manager`


Compatibility
-------------

- Requires [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`
- PHP Compatibility [![PHP 7.0 ](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-7.0.yaml/badge.svg?branch=master&event=push)](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-7.0.yaml) [![PHP 7.4 ](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-7.4.yaml/badge.svg?branch=master&event=push)](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-7.4.yaml) [![PHP 8.0 ](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.0.yaml/badge.svg?branch=master&event=push)](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.0.yaml) [![PHP 8.2 ](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.2.yaml/badge.svg?branch=master&event=push)](https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.2.yaml)

#### Other Plugins & Action Plugins
- _No known issues_
- Compatible with [KanboardSupport](https://github.com/aljawaid/KanboardSupport), [Glancer](https://github.com/aljawaid/Glancer), [ContentCleaner](https://github.com/aljawaid/ContentCleaner)
- Other plugins can use the `'template:plugin:sidebar'` hook after installing PluginManager
#### Core Files & Templates
- `03` Template overrides
- _No database changes_


Changelog
---------

Read the full [**Changelog**](../master/changelog.md "See changes")
 

Installation
------------

- **Install via the [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory**
  - _Go to:_
    - Kanboard: `Plugins` &#10562; `Plugin Directory`

**_or_**

- **Install via the [Releases](../master/Releases/ "A copy of each release is saved in the folder") folder**
  - A copy of each release is saved in the `/Releases` folder of the repository
  - Simply extract the `.zip` file into the `/plugins` directory

**_or_**

- **Install via [GitHub](https://github.com/aljawaid "Find the correct plugin from the list of repositories")**
  - Download the `.zip` file and decompress everything under the directory `/plugins`
  - The folder inside the `.zip` must not contain any branch names and must be exact case (matching the plugin name)

_Note: The `/plugins` folder is case-sensitive._

**_or_**

- **Install using Git CLI**
  - `git clone` (_or ftp upload_) and extract the `.zip` file into this folder: `.\plugins\` (must be exact case)


Translations
------------

- English (UK)
- _Contributors welcome_
- _Translation starter template included_


Authors & Contributors
----------------------

- [@aljawaid](https://github.com/aljawaid) - Author
- [Alfred Bühler](https://github.com/alfredbuehler) - Contributor
- [Craig Crosby](https://github.com/creecros) - Contributor
- [Captain Sanifair](https://github.com/cptsanifair) - Contributor
- _Contributors welcome_


License
-------
- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")
