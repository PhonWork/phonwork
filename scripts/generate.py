#!/usr/bin/env python

# Generate site html files.

import os
import jinja2
import shutil

mediapath = 'assets'
mediapath = 'https://aws.com/s3/phonwork/assets'

page1 = jinja2.Environment(
    loader=jinja2.FileSystemLoader('../_templates')
).get_template('page1.html').render(mediapath=mediapath)

index = jinja2.Environment(
    loader=jinja2.FileSystemLoader('../_templates')
).get_template('layout.html').render(body=page1)

os.mkdir('../_site')

with open('../_site/index.html', 'w') as f: f.write(index)

shutil.copytree('../_js', '../_site/js')
shutil.copytree('../_css', '../_site/css')
