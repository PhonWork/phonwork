#!/usr/bin/env python

# Generate site html files.

import os, sys, glob, shutil, re
import csv
import jinja2

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

def make_indices(layout, pages, title, cfg, templatedir, sitedir):
    '''
    Generate an index html page using layout.
    Parameters
    ----------
    layout : template
    A loaded Jinja2 template for the site's index (_section) page layout.
    pages : list of dicts
    A list of dicts corresponding to every exercise page under a specific section.
    title : str
    The section title.
    cfg : dict
    A configuration dictionary for site variables to be interpolated into
    the page body content.
    templatedir : str
    The directory path where input templates (i.e. bodyfile) are found.
    sitedir : str
    The directory path where output .html files will be written.
    '''
    
    index_url = "Section_" + re.sub(" ", "_", title) + ".html"
    print("Now adding: {}".format(index_url))
    
    print("pages \n \n \n", pages, "\n")

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
        with open('nametourl.csv', newline='') as csvfile:
            rdr = csv.reader(csvfile, delimiter=',', quotechar='"')
            rows = [r for r in rdr]
        head = rows.pop(0)
        recs = {}
        for r in rows:
            rec = dict(zip(head, r))
            if r[0] not in recs.keys():
                recs[r[0]] = [rec]
            else:
                recs[r[0]].append(rec)


    except FileNotFoundError:
        sys.exit(1)

    prep_sitedir(sitedir, jsdir, cssdir)

    layout = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_base_page.html')

    for section in recs.values():
        for rec in section:
            bodyfile = rec['Url']
            print(f'Now adding: {bodyfile}')
            make_page(bodyfile, layout, cfg, templatedir, sitedir)
        
    #put in code for making sections
    sectionlayout = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_section.html')
    
    for title, section in recs.items():
        make_indices(sectionlayout, section, title, cfg, templatedir, sitedir)
        
    print("Lastly, add: index.html")
    make_page("index.html",layout, cfg, templatedir, sitedir)
        
        
        
        
