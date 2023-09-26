# Changelog

## v4.7

_(most recent changes are listed on top):_
- FIX: Rename Sidebar for KanboardSupport - relates to [KanboardSupport Issue #17](https://github.com/aljawaid/KanboardSupport/issues/17) - [Commit 502216](https://github.com/aljawaid/KanboardSupport/commit/5022165c35c8bd1aa86bf8b90672cf54cc55de17)
- FIX: Missing Translation String in Manual Plugins


## v4.6

_(most recent changes are listed on top):_
- FIX: Plugin Description Grammar
- NEW: Improved Uninstall Modal with ContentCleaner Integration - show install date and reminder to clean database
- FIX: Message Alerts Bottom Border
- FIX: Code Styling in Plugin Description
- NEW: Add Spanish Translations
- FIX: Better Plugin Description
- NEW: Add French Translations
- FIX: Missing Translation Strings in Plugin Problems
- FIX: Incompatibility Language String Syntax
- FIX: Translation Syntax
- FIX: Reformat `de_DU` Translations - reformat and add missing translations
- FIX: Missing Translations
- FIX: Duplicate Translations
- FIX: Syntax Error - #68
- FIX: Improve Time-Ago Logic - fixes #68 Bug: Plurals Are Ignored in Age Breakdown
- FIX: Switch Statement in AgeHelper Function - relates to [a4ba3cd](https://github.com/aljawaid/PluginManager/commit/a4ba3cdca7e6375fefd696b8b383c20b9fa4aafe#commitcomment-125410897) - thanks @alfredbuehler
- FIX: 'Further Reading' Link Spacing
- FIX: Anchor Transitions
- FIX: Button Alignment & Spacing
- FIX: Detection for Repositories Hosted on Codeberg - relates to 8a61031 - thanks @alfredbuehler


## v4.5

_(most recent changes are listed on top):_
- FIX: Update README.md with Screenshots
- NEW: Add Filter by Updates Button in Directory
- FIX: Code Syntax `translations.php`
- NEW: Add German Translation - thanks @cptsanifair - Merge pull request #61 from kanboard-ng/main


## v4.2

_(most recent changes are listed on top):_
- FIX: PHP 8 Compatibility Issue - fixes #59 PM not load after latest update - introduced by 1c92221 - thanks @alfredbuehler

## v4.1

_(most recent changes are listed on top):_
- FIX: Update README.md for KanboardCSS - relates to d53870c
- FIX: Code Cleanup - `PluginManagerController.php` - fix comments - fix code syntax - move `show` page codeblocks to top - fix language strings
- FIX: Translations Strings - includes missing strings - thanks @cptsanifair
- FIX: Code Syntax - thanks @cptsanifair
- FIX: Table Header Spanning for Installed Plugins
- FIX: Update Button Notification - now shows neatly when hovering over the installed plugin update button
- FIX: Count Badge Positioned Too High for KanboardCSS
- Fix Typo

## v4.0

_(most recent changes are listed on top):_
- FIX: Update Screenshots to Reflect Latest Features
- NEW: Fade Sidebar Badges When Not Active
- NEW: Add Tooltip for Type Filters
- FIX: Improve Styling for Links Inside Plugin Descriptions
- NEW: Open Links Inside Plugin Descriptions in New Windows
- FIX: JS File Loading Order - would intermittently fail to load `ClipboardJS` if Glancer plugin was not installed
- NEW: Add Plugin Counts in Sidebar Menu
- FIX: `Update` Color Should Not Conflict with `Available` Color
- NEW: Add Route for `uninstall` - `install` and `update` plugin functions do not work with routes
- FIX: Page Titles
- FIX: Sticky Table Header Positioning for Modals - previous commit conflicted with modals - relates to: a3196b9
- NEW: Add Blue Tint to Plugin Directory - to easily differentiate between installed plugins (solid blue) and manual plugins (red)
- FIX: Better Wording
- FIX: Filter Icon Color
- FIX: Add Reminder to Refresh Page - #42
- FIX: Styling Update Button - #42
- FIX: Installed Plugins Spacing & Alignment - #42
- FIX: Directory Information Spacing & Alignment
- FIX: Sticky Table Header Positioning - in case users use the page `header` as a page sticky also, this change will ensure the table header is displayed on top of the header
- NEW: Show Update Count Only if Updates Available
- FIX: Missing CSS Variable
- FIX: Move Directory Source to End - in Plugin Directory
- FIX: Alignment Fixes
- NEW: Filter Installed Plugins Requiring Updates - just click the link and move the mouse to the search box
- FIX: Update README.md with the latest features - #54 #53 #42 #52
- FIX: Code Cleanup - Isolate SVG Code - closes #54
- FIX: Manual Plugin Colour Variable
- FIX: Highlight Incompatible Version Numbers - use darker green
- NEW: Highlight Incompatible Version Numbers - for incompatible plugins
- NEW: Show Updates Count in Installed Plugins - thanks @alfredbuehler
- FIX: CSS Code Syntax Errors
- NEW: Hide Installed Plugins Navigation if Count Less Than 10 - thanks for the tip @alfredbuehler
- FIX: Plugin Structure Button Hover Styling in Directory
- NEW: Highlight Total Updates Count in Directory
- FIX: Better Wording for Link
- FIX: Code Structure
- FIX: PHP Code Syntax Errors for `PluginManagerHelper.php`
- FIX: PHP Code Syntax Errors for `PluginManagerHelper.php`
- FIX: Code Syntax - Exclude PHP Specific Code from Test
- FIX: PHP Code Syntax Errors
- FIX: Code Syntax - PHP - `AgeHelper.php`
- FIX: Code Syntax - PHP - `AgeHelper.php`
- FIX: Code Syntax - PHP - `PluginManagerController.php`
- FIX: Code Syntax - Markdown Content Flow
- FIX: Removed Compatibility File - content is merged into README.md
- FIX: Code Syntax - CSS
- FIX: Code Syntax: Alert Messages Styling
- NEW: Filter Plugins Based on Plugin Types in the Plugin Directory - thanks @alfredbuehler
- FIX: Code Syntax - Exclude PHP Code Specific Test
- FIX: Code Syntax - Exclude PHP Code Specific Test `Squiz.WhiteSpace.ScopeClosingBrace.ContentBefore`
- FIX: Code Syntax - Exclude PHP Code Specific Test
- FIX: Code Syntax
- NEW: Add Update Button to Installed Plugins - thanks @alfredbuehler - #42
- NEW: Show Total Updates Count in Plugin Directory - thanks @alfredbuehler - #42
- FIX: Typo in README.md - Contributors - thanks @cptsanifair
- FIX: README Navigation Links for GitHub
- FIX: Changelog


## v3.5

_(most recent changes are listed on top):_
- FIX: Exclude `Releases` `Screenshots` Folder in Tests
- FIX: Badge Link
- NEW: Add Footer Badges
- NEW: Add Compatibility Badges to README.me
- FIX: Merge Duplicate CSS Class
- CSS Fixes
- CSS Fixes
- CSS Fixes
- FIX: Reduce Severity for Code Scanning
- CSS Fixes
- FIX PHP Compatibility Tests
- NEW: Add Section Navigation Links to README.md
- NEW: Badges for README.md
- NEW: Add README Page Navigation Links
- FIX: Content Flow for INSTALL.md
- FIX: Content Flow for README.md
- NEW: Plugin Code Optimisation - thanks @cptsanifair
- FIX: Code Cleanup - remove multiple if-else - use variables for translations - thanks @cptsanifair
- FIX: Code Cleanup - remove multiple if-else - thanks @cptsanifair
- FIX: CSS Syntax - thanks @cptsanifair
- FIX: CSS Syntax - thanks @cptsanifair
- FIX: CSS RBA to RGBA if Alpha is used - thanks @cptsanifair
- NEW: Add Support for SSL Certificate Check in Last Updated Directory - Disabling SSL Certificate Checks in `config.php` will now respected by PluginManager - thanks @cptsanifair


## v3.0

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

_(most recent changes are listed on top):_
- FIX: Anchor Underline Should Not Show on Hover
- FIX: Compact Side Menu - fixes useless whitespace breaking consistency in menu click
- FIX: Replace Global CSS Target
- FIX: Missing Menu Indicator
- FIX: Conflicting Global Variable - fixes [ThemeRevision Issue 20](https://github.com/greyaz/ThemeRevision/issues/20) - #34 - thanks @greyaz
- FIX: SVG Pointer Events Conflicting with Links - replaces 16f1691
- NEW: Prevent `Enter` Key Being Used on Filter Input - fixes #33 Pressing Enter on Filter Input Redirects Page to Dashboard - thanks @axb21
- Cleanup code
- Improve package size - reduce screenshots' resolution


## v1.7

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

_(most recent changes are listed on top):_
- FIX: Target Selected Anchor Instead of All Anchors
- Glancer Compatibility: Switch `if` statement for Glancer plugin compatibility
- FIX: Translations
- FIX: CSS Conflict for Glancer Plugin
- Bug fixes and general improvements


## v1.5

_(most recent changes are listed on top):_
- FIX: Remove test code - Fixes #27
- NEW: Add Time Ago in README.md
- FIX: Translation Starter Template
- FIX: The stylesheet leaks into all pages - Fixes #27
- Add New Plugin Sidebar Menu Hook  - `'template:plugin:sidebar'`


## v1.0

_(most recent changes are listed on top):_
- Initial release
- Added `en_GB` translations

---

Read the full [**Changelog**](../master/changelog.md "See changes") or view the [**README**](../master/README.md "View README")
