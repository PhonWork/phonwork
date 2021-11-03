#!/usr/bin/env python

# Generate site html files.

import os
import glob
import jinja2
import shutil

templatedir = '../templates'
sitedir = '../site'
jsdir = '../js'
cssdir = '../css'

# Values to be interpolated into Jinja2 templates.
cfg = {
    'mediapath': 'https://d3uxfe7dw0hhy7.cloudfront.net/phonwork/assets'
}

def prep_sitedir(sitedir, jsdir, cssdir):
    '''Remove existing sitedir and recreate it.'''
    try:
        shutil.rmtree(sitedir)
    except FileNotFoundError:
        pass
    os.mkdir(sitedir)
    shutil.copytree(jsdir, os.path.join(sitedir, 'js'))
    shutil.copytree(cssdir, os.path.join(sitedir, 'css'))

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
    #Interpolates cfg variables into bodyfile variable slots
    with open(templatedir + "\\" + bodyfile + ".html"):
        
    body = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template(bodyfile).render(cfg=cfg)


    #Variables in layout.render are the variables set out by the _base_page html file
    #Differs from just body in that it also includes menu and other webpage items?
    page = layout.render(body=body)         
    
    with open(os.path.join(sitedir, bodyfile), 'w') as f: f.write(page)

if __name__ == '__main__':
    prep_sitedir(sitedir, jsdir, cssdir)

    layout = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_base_page.html')

    for bodypath in glob.glob(os.path.join(templatedir, '*.html')):
        bodyfile = os.path.basename(bodypath)
        if bodyfile.startswith('_'):
            continue
        make_page(bodyfile, layout, cfg, templatedir, sitedir)