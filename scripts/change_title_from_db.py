import re, os
import csv

#CSV maps Old ID system to their new URLs (and convert .html to .js)
with open('nametourl.csv', newline='') as csvfile:
    rdr = csv.reader(csvfile, delimiter=',', quotechar='"')
    rows = [r for r in rdr]
head = rows.pop(0)
recs = {r[2]: dict(zip(head, r)) for r in rows}
 
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
        recname = recs[num]['Name']
        filename = recs[num]['Url']
    except KeyError:
        non_converted_files.append(f'\nFile does not have a mapping in the database: {file}')
        print("File does not have a mapping in the database: " + file)
        continue
        
    title = r"<title>" + recname + r"</title>"
    print("{}, {}".format(file, filename))

    bodyOnLoad = re.search(r'<body.+>', page).group(0)
    body = re.search(r'<!-- Main -->([\s\S]+)<!-- Footer -->', page, flags=re.M).group(1)

    with open('../templates/' + filename, 'w+', encoding=enc) as f:
        f.write("Title"+title+"Title" + "Body"+str(bodyOnLoad)+"Body" + '\n\t' + body)
    
with open('../templates/non_converted_files.txt', 'w+', encoding=enc) as f:
    [f.write(string) for string in non_converted_files]
