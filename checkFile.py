import  string,os, sys

dir='/search'

files=os.listdir(dir)

for f in files:
        print dir+os.sep+f
for root,dirs,files in os.walk(dir):
        for name in files:
                print os.path.join(root,name)
