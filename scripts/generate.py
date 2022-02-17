#!/usr/bin/env python

# Generate site html files.

import os
import glob
import jinja2
import shutil
import re
import pandas as pd

templatedir = '../templates'
sitedir = '../site'
jsdir = '../assets/js'
cssdir = '../assets/css'
enc = 'utf-8'
imgdir = '../media/images'
snddir = '../media/sounds' 
datadir = '../assets/data'
df = pd.read_csv("nametourl.csv", index_col=0)

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
    shutil.copytree(jsdir, os.path.join(sitedir, 'assets/js'))
    shutil.copytree(cssdir, os.path.join(sitedir, 'assets/css'))
    shutil.copytree(imgdir, os.path.join(sitedir, 'media/images'))
    shutil.copytree(snddir, os.path.join(sitedir, 'media/sounds'))
    shutil.copytree(snddir, os.path.join(sitedir, 'assets/data'))



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
    with open(templatedir + "/" + bodyfile, encoding=enc) as f:        
        var = f.readline().strip()
        main = f.read()
        
    #rand = "rand=" + re.search(r'(?<=Rand)(.+)(?=Rand)',var).group(0)
    script = '"' + jsdir[3:] + "/ex/" + bodyfile[:-4] + 'js"'
    #print(script)
    
    title = re.search(r'(?<=Title)(.+)(?=Title)',var).group(0)
    if title.find('Guess the word') > -1:
        script = '"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>\n<script src="https://cdn.rawgit.com/evanplaice/jquery-csv/109ae716/src/jquery.csv.js"></script>\n<script src="' + jsdir[3:] + '/newguess.js"'
    #guess = "'" + re.search(r'(?<=Guess)(.+)(?=Guess)',var).group(0) + "'"
    
    body = re.search(r'(?<=Body)(.+)(?=Body)',var).group(0)


    #print(title, body, main)
    


    #Variables in layout.render are the variables set out by the _base_page html file
    #Differs from just body in that it also includes menu and other webpage items?
    page = layout.render(title = title, bodystuff = body, main = main, custom_script = script, exercise = 1)         
    
    with open(os.path.join(sitedir, bodyfile), 'w', encoding=enc) as f: f.write(page)

def make_indices(layout, section_db, cfg, templatedir, sitedir):
    '''
    Generate an index html page using layout.
    Parameters
    ----------
    layout : template
    A loaded Jinja2 template for the site's index (_section) page layout.
    section_db : DataFrame
    A DataFrame corresponding to every exercise under a specific section
    cfg : dict
    A configuration dictionary for site variables to be interpolated into
    the page body content.
    templatedir : str
    The directory path where input templates (i.e. bodyfile) are found.
    sitedir : str
    The directory path where output .html files will be written.
    '''
    title = section_db.index.unique().values[0]
    
    index_url = "Section_" + re.sub(" ", "_", title) + ".html"
    print(index_url)
    
    pages = section_db.to_dict('records')
    print(pages)

    #Variables in layout.render are the variables set out by the _base_page html file
    #Differs from just body in that it also includes menu and other webpage items?
    page = layout.render(title = title, description = "Not provided", image = None , pages = pages) 
    
    with open(os.path.join(sitedir, index_url), 'w', encoding=enc) as f: f.write(page)



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
        
    #put in code for making sections
    sectionlayout = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_section.html')
    
    for section in df.index.unique():
        section_df = df.loc[section]
        #print(section_df)
        make_indices(sectionlayout, section_df, cfg, templatedir, sitedir)
        
        
        
        
        
        