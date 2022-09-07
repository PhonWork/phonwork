import re, os
import csv

#CSV maps Old ID system to their new URLs (and convert .html to .js)
with open('nametourl.csv', newline='') as csvfile:
    rdr = csv.reader(csvfile, delimiter=',', quotechar='"')
    rows = [r for r in rdr]
head = rows.pop(0)
recs = {r[2]: dict(zip(head, r)) for r in rows}
 
#JS Exercises Directory
os.chdir("../old_phonwork/assets/js/ex")

#Get all exercises in directory
files = [f for f in os.listdir('.') if re.match(r'^ex[0-9abc_]+\.js', f)]


enc = 'utf-8'

#Make list of error files
non_converted_files = []
#print(files)
for file in files:
    with open(file, 'r', encoding=enc) as f:
        #Read full page for file --> page
        page = f.read()
        
    #Get page number
    num = re.search(r'ex([0-9abc_]+)\.js', file).group(1)
    #num = num.group(1) + "." + num.group(2)
    
    #Remove number from page name
    page = re.sub(r'exerciseName = \"\d+\.[0-9abc]+\s', r'exerciseName = "', page)
    
    #Get new name from number
    try:
        recname = recs[num]['Name']
        filename = recs[num]['Url'].replace('.html', '.js')
        print(f'{num}\t{filename}')
        
    except KeyError:
        non_converted_files.append(f'\nFile does not have a mapping in the database: {file}')
        continue
    
    with open('named_js/' + filename, 'w+', encoding=enc) as f:
        f.write(page)
    
    with open('named_js/non_converted_files.txt', 'w+', encoding=enc) as f:
        [f.write(string) for string in non_converted_files]
