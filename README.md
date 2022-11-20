# Plugin Manager

#### _Plugin for [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software")_

Replace the Installed Plugins section within the Kanboard interface with a new Plugin Manager and revamped Plugins Directory. Plugin Manager provides both users and developers with an improved comprehensive interface displaying a new section for troubleshooting plugins and a new plugin structure breakdown for each plugin.


Features
-------------

- Add [Bootstrap Twitter](https://icons.getbootstrap.com) and [GitHub Octicons](https://primer.style/octicons/) for better clarity and an improved end user experience
- Clean coded icons - no images
- All plugins, installed and available are now sorted alphabetically
- Add `Back to Top` and `Bottom` buttons for easier screen navigation with smooth scrolling effect
- Fully translatable


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
- Add direct link in Kanboard Settings menu

**Plugin Directory**
- NEW: Show plugin structure
  - Show if plugin has database changes
  - Show if plugin contains template or model overrides
  - Show if plugin uses hooks
  - Show when the plugin was last updated
    - Show relative date with exact date in tooltip (toggles to exact date when clicked)
  - _Plugin structures are extracted through properties in the Kanboard Plugins Directory_
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

**Plugin Problems**
- A page dedicated to common issues with plugins and how to resolve them
- Direct links to [KanboardSupport](https://github.com/aljawaid/KanboardSupport) plugin (if installed) to display technical information
- Useful links to further troubleshoot plugin issues all in one place

Screenshots
----------


**Plugin Manager**

![Plugin Manager](../master/Screenshots/screenshot-plugin-manager-main.png "View more screenshots of this plugin using the link below")

**Plugin Directory**

![Plugin Directory](../master/Screenshots/screenshot-plugin-directory-main.png "View more screenshots of this plugin using the link below")


**_[More screenshots](../master/screenshots.md)_**

Usage
-------------

Go to `Plugins`

**_or_**

`Settings` &#10562; `Plugin Manager`

Compatibility
-------------

- Requires [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`

#### Other Plugins & Action Plugins
- _No known issues_
- [KanboardSupport](https://github.com/aljawaid/KanboardSupport) integration included _(optional)_
#### Core Files & Templates
- `03` Template overrides
- _No database changes_

Changelog
---------

Read the full [**Changelog**](../master/changelog.md "See changes")
 

Installation
------------

- **Install via [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory**
  - _Go to_ Kanboard: `Settings` -> `Plugins` -> `Plugin Directory`

**_or_**

- **Install via [Releases](../master/Releases/ "A copy of each release is saved in the folder") folder**
 - A copy of each release is saved in the Releases folder of the repository
 - Simply extract the `.zip` file into the `plugins` directory

**_or_**

- **Install via [GitHub](https://github.com/aljawaid "Find the correct plugin from the list of repositories")**
- Download the `.zip` file and decompress everything under the directory `plugins`
 - The `.zip` folder must not contain any branch names and must be exact case matching the plugin name

_Note: Plugin folder is case-sensitive._

**_or_**
- `git clone` (_or ftp upload_) and extract the `.zip` into this folder: `.\plugins\` (must be exact case)


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
- _Contributors welcome_

License
-------
- This project is distributed under [The MIT License](../master/LICENSE "Read The MIT license")
