# Bizink Theme

## How to update the theme

1. Have the latest version of the theme in the master/main branch
    - Note this should contain the latest version number in the theme stylesheet style.css
2. Make sure the **Readme.txt** file is up to date - This file is written in **WordPress Markdown** see Readme.txt section below
    - This has a Version item and a Stable Tag item **both** should be the new verson number e.g. 1.0
    - This file also has a Change Log included. Update this as this file is used by wordpress to show changes on the theme update section
3. Create a new Release in the releases tab. **Important:** Make sure the tag is the new version number e.g. 1.0
    - If the release is marked as *Pre Release* the theme updater will ignore it.
    - We should also put what has changed in the release notes but these would be for our benefit and not used by the theme.

### Readme.txt

This file is written in **WordPress Markdown** this is different to GitHub Markdown and is also different to the Readme.md file. It is required for the updater to work. Update the details in this file on the master branch then add a new release with the github tag in order to post a new version of the theme. [Follow this example https://wordpress.org/themes/readme.txt](https://wordpress.org/themes/readme.txt)

### Tags

Using the master branch create a tag with the name being the version number of the release. **Note:** It should be the same version number in the theme files and the readme.txt file
