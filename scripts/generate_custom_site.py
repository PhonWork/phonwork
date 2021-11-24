#!/usr/bin/env python

# Generate site html files.

import os, sys, glob, shutil, re
import jinja2
import pandas as pd

templatedir = '../templates'
sitedir = '../site'
jsdir = '../assets/js'
cssdir = '../assets/css'
enc = 'utf-8'
imgdir = '../media/images'
snddir = '../media/sounds' 

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
        
    script = '"' + jsdir[3:] + "/ex/" + bodyfile[:-4] + 'js"'
    
    title = re.search(r'(?<=Title)(.+)(?=Title)',var).group(0)
    
    body = re.search(r'(?<=Body)(.+)(?=Body)',var).group(0)


    #Variables in layout.render are the variables set out by the _base_page html file
    #Differs from just body in that it also includes menu and other webpage items?
    page = layout.render(title = title, 
                         bodystuff = body, 
                         main = main, 
                         custom_script = script, 
                         exercise = 1)         
    
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
    print("Now adding: {}".format(index_url))
    
    pages = section_db.to_dict('records')
    #print(pages)

    #Variables in layout.render are the variables set out by the _base_page html file
    #Differs from just body in that it also includes menu and other webpage items?
    page = layout.render(title = title, description = "Not provided", image = None , pages = pages) 
    
    with open(os.path.join(sitedir, index_url), 'w', encoding=enc) as f: f.write(page)



if __name__ == '__main__':
    
    if len(sys.argv) > 1:   # allow user to pass a site "manifest" file
        csv_file = sys.argv[1]
    else:
        csv_file = "nametourl.csv"
    
    try:
        df = pd.read_csv(csv_file, index_col=0)
    except FileNotFoundError:
        sys.exit(1)

    prep_sitedir(sitedir, jsdir, cssdir)

    layout = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_base_page.html')

    for name in df.Name:
        bodyfile = df.Url[df.Name==name].values[0]
        print("Now adding: {}".format(bodyfile))
        make_page(bodyfile, layout, cfg, templatedir, sitedir)
        
    #put in code for making sections
    sectionlayout = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_section.html')
    
    for section in df.index.unique():
        section_df = df.loc[section]
        #print(section_df)
        make_indices(sectionlayout, section_df, cfg, templatedir, sitedir)
        
    print("Lastly, add: index.html")
    make_page("index.html",layout, cfg, templatedir, sitedir)
        
        
        
        