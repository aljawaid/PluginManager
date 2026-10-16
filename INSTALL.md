# Plugin Installation

## Requirements

- Kanboard `1.2.54` or later
- PHP `8.2`, `8.3`, `8.4` or `8.5`
- PHP's ZIP extension when installing an archive through Kanboard
- Administrator access to install or manage plugins
- `PLUGIN_INSTALLER` enabled and a writable Kanboard plugin directory when using an installer inside Kanboard

Back up an existing `plugins/PluginManager` directory before replacing it manually. PluginManager does not make database changes.

## Recommended installation

- **Install via the [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory**
  - _Go to:_
    - Kanboard: `Plugins` &#10562; `Plugin Directory`
  - _or with [PluginManager](https://github.com/aljawaid/PluginManager "A Kanboard plugin") installed:_
    - Kanboard: `Settings` &#10562; `Plugins` &#10562; `Plugin Directory`

## Manual installation

- Download a published PluginManager release archive.
- Confirm that the archive contains one top-level `PluginManager` directory, with `Plugin.php` directly inside it.
- Extract that directory to Kanboard's `plugins/PluginManager` path.
- Confirm that the web server can read all extracted files.
- Open Kanboard's Plugins page and confirm that PluginManager `5.0.0` loads without an incompatibility warning.

_Note: The `/plugins` folder is case-sensitive._

The repository's `Releases/` directory contains historical archives. Those files remain unchanged; use the current published release for a new production installation.

---

Read the full [**Changelog**](../master/changelog.md "See changes") or view the [**README**](../master/README.md "View README")
