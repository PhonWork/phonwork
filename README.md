# phonwork
Phonetics workbook

This repository contains templates for generating the Phonetics Workbook as
a static html site.

## Getting started

To get started with this repository, clone it:

```bash
git clone https://github.com/rsprouse/phonwork
```

The site is generated with a Python script with minimal dependencies. The
only required package that is not in the standard library is
[jinja2](https://jinja.palletsprojects.com/en/3.0.x/). Install it before
trying to generate the site.

## Editing and building the site

Templates for the site pages are in the `_templates` directory. Templates
with filenames beginning with an alphabetic character are rendered as content
pages that use the overall layout determined by `_layout.html`. Other
templates beginning with underscore may be used to include sublayouts and
are not render as separate html files.

To generate the site, do:

```bash
cd scripts
python generate.py
```

The content pages will be render to html files in the `_site` directory.
Before the pages are generated the existing `_site` directory will be
cleared of existing content.

## Viewing the site

Use your web browser to open the files in the `_site` directory to view
the current website.

## Publishing the site

If the results of viewing the site are satisfactory, push the changes to
github and then copy the current site files to the public server. A sample
set of commands:

```bash
# View repo status
get status

# Inspect, commit, and push changes
git diff _templates/mypage.html
git add templates/mypage.html
git commit -m 'Added a section to mypage.html'
git push

# Copy site files to public server
scp -R _site/* username@server.com:/sites/phonwork
```
