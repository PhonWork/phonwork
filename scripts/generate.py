#!/usr/bin/env python

# Generate site html files.

import os
import glob
import jinja2
import shutil

templatedir = '../_templates'
sitedir = '../_site'
jsdir = '../_js'
cssdir = '../_css'
DBmridir = '../_DB_mri_movies'  # movies
MGmridir = '../_MG_mri_movies'  # movies
imagesdir = '../images'         # images
soundsdir = '../sounds'         # sounds
guessdir = '../Guess-the-Word'  

# Values to be interpolated into Jinja2 templates.
cfg = {
    'mediapath': 'https://d3uxfe7dw0hhy7.cloudfront.net/phonwork/assets'
}

def prep_sitedir(sitedir, jsdir, cssdir, DBmridir, MGmridir, imagesdir, soundsdir, guessdir):
    '''Remove existing sitedir and recreate it.'''
    try:
        shutil.rmtree(sitedir)
    except FileNotFoundError:
        pass
    os.mkdir(sitedir)
    shutil.copytree(jsdir, os.path.join(sitedir, 'js'))
    shutil.copytree(cssdir, os.path.join(sitedir, 'css'))
    shutil.copytree(soundsdir, os.path.join(sitedir, 'sounds'))
    shutil.copytree(imagesdir, os.path.join(sitedir, 'images'))
    shutil.copytree(DBmridir, os.path.join(sitedir, 'DB_mri_movies'))
    shutil.copytree(MGmridir, os.path.join(sitedir, 'MG_mri_movies'))
    shutil.copytree(guessdir, os.path.join(sitedir, 'Guess-the-Word'))

def make_page(bodyfile, layout, cfg, templatedir, sitedir):
    '''
    Generate an html page using layout.

    Parameters
    ----------

    bodyfile : str
    The input body template file.

    layout : template
    A loaded Jinja2 template for the site's overall page layout.

    cfg : dict
    A configuration dictionary for site variables to be interpolated into
    the page body content.

    templatedir : str
    The directory path where input templates (i.e. bodyfile) are found.

    sitedir : str
    The directory path where output .html files will be written.
    '''
    body = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template(bodyfile).render(cfg=cfg)

    page = layout.render(body=body)
    with open(os.path.join(sitedir, bodyfile), 'w') as f: f.write(page)

if __name__ == '__main__':
    prep_sitedir(sitedir, jsdir, cssdir)

    layout = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_layout.html')

    for bodypath in glob.glob(os.path.join(templatedir, '*.html')):
        bodyfile = os.path.basename(bodypath)
        if bodyfile.startswith('_'):
            continue
        make_page(bodyfile, layout, cfg, templatedir, sitedir)
