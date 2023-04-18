# Changelog


## v3.0

### What's Changed

_(most recent changes are listed on top):_
- FIX: CSS Property - change `bold` to `700`
- NEW: Delay Alert Flash Messages- change from default 7s to 10s
- FIX: Installer: Add more tests for namespace, directory and plugin name - thanks @alfredbuehler
- FIX: Download Button Styling
- FIX: Manual Plugins: `installByURL()` uses the same tests - thanks @alfredbuehler
- FIX: Hide Incompatible Plugin Count if Zero
- FIX: Incompatible Plugins Layout & Styling
- FIX: Major CSS Fixes
- FIX: Message Styling
- FIX: Better Wording
- FIX: Make Plugin Sidebar Menu Neater
- NEW: Show Incompatible Installed Plugins Count
- FIX: Installed Plugins Count Page Position - count looked confusing if incompatible plugins were detected
- FIX: Page Redirects for Manually Installed Plugins (by file) - #44
- FIX: Detect Kanboard Structure in Any Folder in Archive File - fixes #44  Bug: All zip types are accepted
- FIX: Duplicate `id` for `input` - #44
- FIX: Check for cURL - resolves #45
- FIX: Undefined Variable `$values` - #44
- NEW: Add Copy Download Link to Clipboard Button - fixes #41 - thanks @alfredbuehler
- NEW: Manually install plugins from local archive files or remote locations - thanks @alfredbuehler
- FIX: Detect Kanboard Structure in Archive File - fixes #44 Bug: All zip types are accepted - thanks @creecros
- FIX: Better Wording for Placeholder
- FIX: Plugin Action Icons' Spacing
- NEW: Add Unique Table IDs per Plugin
- FIX: Set fileselector to accept 'application/zip' - thanks @alfredbuehler
- NEW: Install plugins by file or URL - thanks @alfredbuehler


## v2.0

### What's Changed

_(most recent changes are listed on top):_
- NEW: Copy Installed Plugins List to Clipboard - List output shows plugin name, version and author - fixes #38
- NEW: Add ContentCleaner Link in Sidebar
- NEW: Show Last Updated for Manual Plugins
- FIX: Remove CSS ID
- FIX: Restyle Borders - Available Plugins
- FIX: Disabled URL Color Consistency
- NEW: Add Manual Plugin Count
- FIX: Download Button for Manual Plugins
- NEW: Add Smooth Transition to Install/Update Buttons
- FIX: Button Styling - Font
- FIX: Page Title Consistence- for Manual Plugins
- FIX: Manual Plugins Menu Order
- FIX: Section Titles Styling
- FIX: Update Plugin Description
- NEW: Show Last Updated for Extensions Directory
- FIX: Page Header Icon Size
- NEW: Pull ALL Plugins for Manual Plugins Page
- NEW: Add Manual Plugins Page
- NEW: Add Alert Message Box
- FIX: Page Margins for Directory Page
- Revert FIX: Page Header Left Margin
- FIX: Menu Order
- FIX: Page Header Left Margin


## v1.8

### What's Changed

_(most recent changes are listed on top):_
- FIX: Anchor Underline Should Not Show on Hover
- FIX: Compact Side Menu - fixes useless whitespace breaking consistency in menu click
- FIX: Replace Global CSS Target
- FIX: Missing Menu Indicator
- FIX: Conflicting Global Variable - fixes https://github.com/greyaz/ThemeRevision/issues/20 - #34 - thanks @greyaz
- FIX: SVG Pointer Events Conflicting with Links - replaces 16f1691
- NEW: Prevent `Enter` Key Being Used on Filter Input - fixes #33 Pressing Enter on Filter Input Redirects Page to Dashboard - thanks @axb21
- Cleanup code
- Improve package size - reduce screenshots' resolution


## v1.7

### What's Changed

_(most recent changes are listed on top):_
- Make installation date higher priority - should fix the date font sizing issue #29
- FIX:  Align Plugin Structure Boxes #30 - thanks @JustFxDev - Fixes #30f
- FIX: Title Top Margin
- FIX: Unix (LF) Line Endings and Tabs > Spaces
- FIX: No unit for zero needed
- FIX: Do not use empty rulesets
- FIX: Remove CSS Global Selectors - fixes #31
- FIX: Button Hover
- FIX: Transition affecting other pages - fixes #28
- Fix CSS Jumping Side Menu
- CSS - Undo Dropdown Menu Hack
- CSS Fix Extra Space - extra space (error) - possibly causing issue in reading complete css file
- Scope CSS Classes & Variables to this Plugin Only


## v1.6

### What's Changed

_(most recent changes are listed on top):_
- FIX: Target Selected Anchor Instead of All Anchors
- Glancer Compatibility: Switch `if` statement for Glancer plugin compatibility
- FIX: Translations
- FIX: CSS Conflict for Glancer Plugin
- Bug fixes and general improvements


## v1.5

### What's Changed

_(most recent changes are listed on top):_
- FIX: Remove test code - Fixes #27
- NEW: Add Time Ago in README.md
- FIX: Translation Starter Template
- FIX: The stylesheet leaks into all pages - Fixes #27
- Add New Plugin Sidebar Menu Hook  - `'template:plugin:sidebar'`


## v1.0

### What's Changed

_(most recent changes are listed on top):_
- Initial release
- Added `en_GB` translations


Read the full [**Changelog**](../master/changelog.md "See changes") or view the [**README**](../master/README.md "View README")
