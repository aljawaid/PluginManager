<h1 name="user-content-readme-top">PluginManager</h1>
<p align="center">
    <a href="https://github.com/aljawaid/PluginManager/releases">
        <img src="https://img.shields.io/github/v/release/aljawaid/PluginManager?style=for-the-badge&color=brightgreen" alt="GitHub Latest Release (by date)" title="GitHub Latest Release (by date)">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/releases">
        <img src="https://img.shields.io/github/downloads/aljawaid/PluginManager/total?style=for-the-badge&color=orange" alt="GitHub All Releases" title="GitHub All Downloads">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/releases">
        <img src="https://img.shields.io/github/directory-file-count/aljawaid/PluginManager?style=for-the-badge&color=orange" alt="GitHub Repository File Count" title="GitHub Repository File Count">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/releases">
        <img src="https://img.shields.io/github/repo-size/aljawaid/PluginManager?style=for-the-badge&color=orange" alt="GitHub Repository Size" title="GitHub Repository Size">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/releases">
        <img src="https://img.shields.io/github/languages/code-size/aljawaid/PluginManager?style=for-the-badge&color=orange" alt="GitHub Code Size" title="GitHub Code Size">
    </a>
</p>
<p align="center">
    <a href="https://github.com/aljawaid/PluginManager/discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/PluginManager?style=for-the-badge&color=blue" alt="GitHub Discussions" title="Read Discussions">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/compare">
        <img src="https://img.shields.io/github/commits-since/aljawaid/PluginManager/latest?include_prereleases&style=for-the-badge&color=blue" alt="GitHub Commits Since Last Release" title="GitHub Commits Since Last Release">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/compare">
        <img src="https://img.shields.io/github/commit-activity/m/aljawaid/PluginManager?style=for-the-badge&color=blue" alt="GitHub Commit Monthly Activity" title="GitHub Commit Monthly Activity">
    </a>
    <a href="https://github.com/kanboard/kanboard" title="Kanboard - Kanban Project Management Software">
        <img src="https://img.shields.io/badge/Plugin%20for-kanboard-D40000?style=for-the-badge&labelColor=000000" alt="Kanboard">
    </a>
</p>

Replace the Installed Plugins section with a whole new interface. Plugin Manager provides both users and developers with an improved comprehensive layout displaying a new section for troubleshooting plugins with a new plugin structure breakdown for each plugin. Install plugins direct from the Plugin Directory or explore new upcoming or untested features from manual plugins.

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Features

- All plugins, installed and available are now sorted alphabetically
- Add `Back to Top` and `Bottom` buttons for easier screen navigation with smooth scrolling effect
- Add direct link in Kanboard Settings menu
- Add New Plugin Sidebar Menu Hook
  - `'template:plugin:sidebar'` is located in the plugins menu sidebar
- Fully translatable
- Clean coded icons without images for faster page load times
- Direct link to [ContentCleaner](https://github.com/aljawaid/ContentCleaner) and [KanboardSupport](https://github.com/aljawaid/KanboardSupport) from the PluginManager sidebar


**Plugin Manager**
- Installed Plugins
  - Renamed as **`Plugin Manager`**
- Show installed plugin count
- Show total count for plugins with updates
  - Filter plugins by those requiring updates
- Fixed table headers for easier page navigation
- Use the user friendly search filter to quickly find installed plugins
  - Hover over the input box to focus without clicking
- Show a notification icon if the plugin has database changes
- Show a notification icon if the plugin has a published homepage
- Show the Kanboard compatible version set by the plugin
- Show a direct link to the plugin readme file if hosted on GitHub, GitLab, Gitea or Codeberg.
- Show the plugin installation date

**Plugin Directory**
- NEW: Show a plugin structure for all plugins
  - Each plugin shows informative icons if it has any database changes, contains template or model overrides, or uses any hooks.
  - Show when each plugin was last updated using _Time Ago_ relative dates
    - Display a relative date with the exact date shown in tooltip (toggles to the exact date when clicked)
  - _The plugin structure is compiled for each plugin using properties extracted from the Kanboard Plugins Directory_
- Show a directory source e.g. 'official' or 'custom' including the URL of the source
  - Show external weblink for official directory
- Show the available plugins count based on your configuration
- Show the current application version
- Show a direct link for each plugin's readme file
- Show plugin totals by type
- Use the user friendly search filter for quickly finding available plugins
  - Click on each type to dynamically filter all plugins including those with updates
  - Hover over the input box to focus without clicking
- Highlight the last updated dates to reflect the development activity of a plugin
- Show direct links to installed plugins

**Manual Plugins**
- Manually install plugins in `.zip` archive files from local or remote locations
- Manual plugins are part or completely functional plugins but not suitable for general Kanboard installation
- Show a list of plugins which can be manually downloaded and installed based on data from the Plugin Directory
- Developers can list their plugins in the normal directory but if they set `remote_install` to `false`, the plugin will appear on the manual plugin page with a download link (no install). Kanboard by default, currently completely ignores such plugins.
- These plugins only show in PluginManager

**Plugin Info**
- A dedicated section detailing the breakdown of a plugin with valuable information about core components of a Kanboard plugin
- Details explaining the plugin structure as displayed in the _Plugin Directory_ and _Plugin Manager_ sections

**Plugin Problems**
- A dedicated section listing common issues with plugins and how to resolve them
- Integration with [KanboardSupport](https://github.com/aljawaid/KanboardSupport) to display technical information
- Useful links to further troubleshoot plugin issues all in one place

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#usage">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Screenshots

**Plugin Manager**

![Plugin Manager](../master/Screenshots/screenshot-plugin-manager-main.png "View more screenshots of this plugin using the link below")

**Plugin Directory**

![Plugin Directory](../master/Screenshots/screenshot-plugin-directory-main.png "View more screenshots of this plugin using the link below")

**Manual Plugins**

![Manual Plugins](../master/Screenshots/screenshot-manual-plugins.png "View more screenshots of this plugin using the link below")

**Plugin Problems**

![Plugin Problems](../master/Screenshots/screenshot-plugin-problems.png "View more screenshots of this plugin using the link below")


**_[More screenshots](../master/screenshots.md)_**

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#installation--compatibility">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Usage

Go to `Plugins`

**_or_**

`Settings` &#10562; `Plugin Manager`

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8592; Previous</a>] [<a href="#authors--contributors">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Installation & Compatibility

<p align="left">
    <a href="https://github.com/aljawaid/PluginManager/actions/workflows/linter.yml">
        <img src="https://github.com/aljawaid/PluginManager/actions/workflows/linter.yml/badge.svg?branch=master&event=push" alt="Code Scanning" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-7.4.yaml">
        <img src="https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-7.4.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.0.yaml">
        <img src="https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.0.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.2.yaml">
        <img src="https://github.com/aljawaid/PluginManager/actions/workflows/php-compatibility-8.2.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
</p>

<details>
    <summary><strong>Installation</strong></summary>

- Install via the **[Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory** or see [INSTALL.md](../master/INSTALL.md)
- Read the full [**Changelog**](../master/changelog.md "See changes") to see the latest updates

</details>
<details>
    <summary><strong>Compatibility</strong></summary>

- Requires [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`
- **Other Plugins & Action Plugins**
  - _No known issues_
  - Compatible with [KanboardSupport](https://github.com/aljawaid/KanboardSupport), [Glancer](https://github.com/aljawaid/Glancer), [ContentCleaner](https://github.com/aljawaid/ContentCleaner), [KanboardCSS](https://github.com/aljawaid/KanboardCSS)
  - Other plugins can use the `'template:plugin:sidebar'` hook after installing PluginManager
- **Core Files & Templates**
  - `04` Template override
  - _No database changes_

</details>
<details>
    <summary><strong>Translations</strong></summary>

- English (UK), French, German, Spanish
- _Starter template available_

</details>

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#usage">&#8592; Previous</a>] [<a href="#license">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Authors & Contributors

- [@aljawaid](https://github.com/aljawaid) - Author
- [Alfred Bühler](https://github.com/alfredbuehler) - Contributor
- [Craig Crosby](https://github.com/creecros) - Contributor
- [CptSanifair](https://github.com/cptsanifair) - Contributor
- _Contributors welcome_

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#installation--compatibility">&#8592; Previous</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## License

- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")

---

<p align="center">
    <a href="https://github.com/aljawaid/PluginManager/stargazers" title="View Stargazers">
        <img src="https://img.shields.io/github/stars/aljawaid/PluginManager?logo=github&style=flat-square" alt="PluginManager">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/forks" title="See Forks">
        <img src="https://img.shields.io/github/forks/aljawaid/PluginManager?logo=github&style=flat-square" alt="PluginManager">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/blob/master/LICENSE" title="Read License">
        <img src="https://img.shields.io/github/license/aljawaid/PluginManager?style=flat-square" alt="PluginManager">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/issues" title="Open Issues">
        <img src="https://img.shields.io/github/issues-raw/aljawaid/PluginManager?style=flat-square" alt="PluginManager">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/issues?q=is%3Aissue+is%3Aclosed" title="Closed Issues">
        <img src="https://img.shields.io/github/issues-closed/aljawaid/PluginManager?style=flat-square" alt="PluginManager">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/discussions" title="Read Discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/PluginManager?style=flat-square" alt="PluginManager">
    </a>
    <a href="https://github.com/aljawaid/PluginManager/compare/" title="Latest Commits">
        <img alt="GitHub commits since latest release (by date)" src="https://img.shields.io/github/commits-since/aljawaid/PluginManager/latest?style=flat-square">
    </a>
</p>
<p align="right">[<a href="#user-content-readme-top">&#8593; Top</a>]</p>
<a name="user-content-readme-bottom"></a>
