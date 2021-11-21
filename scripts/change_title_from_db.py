import re, os
import pandas as pd
df = pd.read_csv("nametourl.csv", index_col=2)

os.chdir("../old_phonwork")
files = [f for f in os.listdir('.') if re.match(r'^ex[0-9abc_]+\.php', f)]
enc = 'utf-8'
pattern = r'<title>(\d+\.\d+)\s(.+)<\/title>'

non_converted_files = []
for file in files:
    with open(file, 'r', encoding=enc) as f:
        page = f.read()
    num = re.search('ex(.+).php', file).group(1)

    try:
        dfname = df.loc[num].Name
        filename = df.loc[num].Url
    except KeyError:
        non_converted_files.append("\nFile does not have a mapping in the database: " + file)
        print("File does not have a mapping in the database: " + file)
        continue
        
    title = r"<title>" + dfname + r"</title>"
    print("{}, {}".format(file, filename))

    bodyOnLoad = re.search(r'<body.+>', page).group(0)
    body = re.search(r'<!-- Main -->([\s\S]+)<!-- Footer -->', page, flags=re.M).group(1)

    with open('../templates/' + filename, 'w+', encoding=enc) as f:
        f.write("Title"+title+"Title" + "Body"+str(bodyOnLoad)+"Body" + '\n\t' + body)
    
with open('../templates/non_converted_files.txt', 'w+', encoding=enc) as f:
    [f.write(string) for string in non_converted_files]