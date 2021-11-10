#Script must generate title, bodystuff, and main for index files

import re, glob, os
import pandas as pd
df = pd.read_csv("nametourl.csv", index_col=[0,1])
print(df)
'''
os.chdir("../templates")
files = [f for f in os.listdir('.') if re.match(r'^ex[0-9_]+\.php', f)]
enc = 'utf-8'
pattern = r'<title>(\d+\.\d+)\s(.+)<\/title>'

non_converted_files = []
#print(files)
for file in files:
    with open(file, 'r', encoding=enc) as f:
        page = f.read()
    num = re.search('ex(.+).php', file).group(1)
    #num = re.sub('_', '.', num)
    print(num)

    try:
        dfname = df.loc[num].Name
        filename = df.loc[num].Url
        print(filename)
    except KeyError:
        non_converted_files.append("\nFile does not have a mapping in the database: " + file)
        print("File does not have a mapping in the database: " + file)
        continue
        
    title = r"<title>" + dfname + r"</title>"
    isRand = 0
    isRandV2 = 0
    initialize = re.search(r'<body onload="initialize\((?:rand=)*(\d)*\)">', page, flags=re.M)
    if initialize:
        isRand = initialize.group(1)
    else:
        load_guess = re.search(r'<body onload="load_guess\(\'*(\d)\'*\)">', page, flags=re.M)
        if load_guess:
            isRandV2 = load_guess.group(1)
        else:
            print('Special file has no intialize or load_guess variable ' + dfname)
            non_converted_files.append('\nSpecial file has no intialize or load_guess variable ' + dfname)
            continue
    bodyOnLoad = re.search(r'<body.+>', page).group(0)
    body = re.search(r'<!-- Main -->([\s\S]+)<!-- Footer -->', page, flags=re.M).group(1)

    
    print(r"file is: " + filename + r' ')    
    with open('../templates/' + filename, 'w+', encoding=enc) as f:
        f.write("Title"+title+"Title" + "Body"+str(bodyOnLoad)+"Body" + '\n\t' + body)
    
with open('../templates/non_converted_files.txt', 'w+', encoding=enc) as f:
    [f.write(string) for string in non_converted_files]'''