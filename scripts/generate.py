#!/usr/bin/env python

# Generate site html files.

import os
import glob
import jinja2
import shutil
import re
import csv

templatedir = '../templates'
sitedir = '../site'
jsdir = '../assets/js'
cssdir = '../assets/css'
enc = 'utf-8'
imgdir = '../media/images'
snddir = '../media/sounds' 
datadir = '../assets/data'

with open('nametourl.csv', newline='') as csvfile:
    rdr = csv.reader(csvfile, delimiter=',', quotechar='"')
    rows = [r for r in rdr]
head = rows.pop(0)
recs = {}
for r in rows:
    rec = dict(zip(head, r))
    secno, exno = rec['Num'].split('_')
    rec['SecNo'] = secno
    rec['ExNo'] = exno.zfill(2)
    rec['displaytag'] = f'<b>{rec["Num"].replace("_", ".")} {rec["Name"]}</b>'
    if r[0] not in recs.keys():
        recs[r[0]] = [rec]
    else:
        recs[r[0]].append(rec)

#Full index list for search purposes
pages = {}

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
    print(index_url)
    
    print("pages \n \n \n", pages, "\n")

    #Variables in layout.render are the variables set out by the _base_page html file
    #Differs from just body in that it also includes menu and other webpage items?
    page = layout.render(title = title, description = "Not provided", image = None , pages = pages) 
    
    with open(os.path.join(sitedir, index_url), 'w', encoding=enc) as f: f.write(page)

def make_search_menu(pages, sitedir, layout):
    base = '<nav id="menu2"><!--<div class="inner">-->\n<input type="text" id="mySearch" onkeyup="searchFunction()" placeholder="Exercise Search.." title="Type in a category">\n<h2>Exercise Menu</h2>\n<ul id="hiddenMenu">\n'
    mid = ''
    other = '</ul>\n</nav>'
    #df[["SecNo", "ExNo"]] = df["Num"].str.split("_", expand=True)
    #df['ExNo'] = df['ExNo'].apply(lambda x: x.zfill(2))
    #df.sort_values(by=["SecNo", "ExNo"], inplace=True)
    pages = sorted(pages, key=lambda r: (r['SecNo'], r['ExNo']))
    #df["searchterms"] = df["Name"] + " " + df["Description"] + " " + df["Num"]
    #df["searchterms"] = df["Description"]
    #df["Num"] = df["Num"].str.replace("_", ".", regex=False)
    #df["displaytag"] = "<b>" + df["Num"] + " " + df["Name"] + "</b> \n"
    #pages = df[["Url", "searchterms", "displaytag"]].to_dict('records')
    for p in pages:
        mid += (f'<li><td><a href="{p["Url"]}">{p["displaytag"]}</a></td><td>{p["Description"]}</td></li>\n')
    page = layout.render(main = base + mid + other)
    with open(os.path.join(sitedir, "search"), 'w', encoding=enc) as f: f.write(page)


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
    
    for title, section in recs.items():
        #print(section_df)
        make_indices(sectionlayout, section, title, cfg, templatedir, sitedir)
    
    fullindex = jinja2.Environment(
        loader=jinja2.FileSystemLoader(templatedir)
    ).get_template('_hiddenmenu.html')
    make_search_menu(
        [r for sublist in recs.values() for r in sublist],
        sitedir,
        fullindex
    )
    #print(hiddenmenu)
