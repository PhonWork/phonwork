import re, glob, os
import pandas as pd
df = pd.read_csv("nametourl.csv", index_col=1)

os.chdir("../old_phonwork")
files = [f for f in os.listdir('.') if re.match(r'^ex[0-9_]+\.php', f)]
enc = 'utf-8'
pattern = r'<title>(\d+\.\d+)\s(.+)<\/title>'

non_converted_files = []

for file in files:
    with open(file, 'r', encoding=enc) as f:
        page = f.read()
       
    num = re.search('ex(.+).php', file).group(1)
    num = re.sub('_', '.', num)
    
    try:
        dfname = df.loc[num].Name
        file = df.loc[num].Url
    except KeyError:
        non_converted_files.append("\nFile does not have a mapping in the database: " + file)
        print("File does not have a mapping in the database: " + file)
        continue
        
    title = r"<title>" + dfname + r"<\/title"
    
    initialize = re.search(r'<body onload="initialize\((?:rand=)*(\d)*\)">', page, flags=re.M)
    if initialize:
        isRand = initialize.group(1)
    else:
       print('Special file has no intialize variable' + dfname)
       non_converted_files.append('\nSpecial file has no intialize variable' + dfname)
       continue
    
    body = re.search(r'<!-- Main -->([\s\S]+)<!-- Footer -->', page, flags=re.M).group(1)
    
    if not isRand:
        isRand = 0
    
    
    
    
    #print(title, isRand, body)
    
    with open('exercises_html/' + file, 'w+', encoding=enc) as f:
        f.write(r'<!-- Title  -->' + title + '\n<!-- IsRand ' + str(isRand) + ' -->\n\t' + r'<!-- Main -->' + body)
        #print("Fixed " + dfname)
    
    with open('exercises_html/non_converted_files.txt', 'w+', encoding=enc) as f:
        [f.write(string) for string in non_converted_files]