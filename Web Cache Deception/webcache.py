import requests
import sys

headers = {"Accept":"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8","Upgrade-Insecure-Requests":"1","Connection":"close","User-Agent":"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36","Referer":"https://www.site.com/teams/","Accept-Language":"en-US,en;q=0.8"}
cookies = {"Paste Cookies Here"}

short_extensions = ['css','png','jpg','gif','txt','js','swf','bmp']
large_extensions = ['aif','aiff','css','au','avi','bin','bmp','cab','carb','cct','cdf','class','css','doc',' dcr',' dtd',' gcf',' gff',' gif',' grv',' hdml',' hqx',' ico',' ini',' jpeg',' jpg',' js',' mov',' mp3',' nc',' pct',' ppc',' pws',' swa',' swf',' txt',' vbs',' w32',' wav',' wbmp',' wml',' wmlc',' wmls',' wmlsc',' xsd',' zip']

auth = requests.Session()
results=[]
possible_result=[]
urls = sys.argv[1]
try:
	with open(urls,'r') as f:
		for j in f.readlines():
			j=j.strip('\n')
			j=j.strip('\r')
			url = j 
			#print url
			unsession = requests.get(url)
			session = auth.get(url, headers=headers, cookies=cookies)
			print '\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n'
			print '[+] Authenticated Detail [+]  '+'\n'
			print 'URL : '+session.url
			print 'Status Code : '+str(session.status_code)
			print 'Content Length: '+str(len(session.content))
			print '\n'
			print '[+] UnAuthenticated Details [+]  '+'\n'
			print 'URL : '+unsession.url
			print 'Status Code : '+str(unsession.status_code)
			print 'Content Length : '+str(len(unsession.content))+'\n'
			print '\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n'
			if unsession.history:
				for resp in unsession.history:
					print 'Redirected From : '+resp.url
					print 'With Status Code : '+str(resp.status_code)
					print '\n'
				print '\n~~~~~ATTACK~~~~~\n'
			for i in short_extensions:
				i = i.strip('\n')
				i = i.strip('\r')
				i = 'testsheet.'+i
				newurl=url+i
				newsession = auth.get(newurl, headers=headers, cookies=cookies)
				print 'Trying ... -> '+str(newurl)+'\n'
				conditionContent = str(len(newsession.content)+100) # To Avoid False Positivie

				#print conditionContent
				if len(newsession.content) == len(session.content) | (newsession.status_code) == (session.status_code):
					print '100% Cache at : '+newurl+str(newsession.status_code)+', Length:'+str(len(newsession.content))+'\n'
					results.append(newurl)
				elif len(session.content) > len(newsession.content) & (newsession.status_code) == (session.status_code):
					if conditionContent >= len(session.content):
						print 'Possible Cache at : '+newurl+str(newsession.status_code)+', Length:'+str(len(newsession.content))+'\n'
						possible_result.append(newurl)
				else:
					print 'Not Possible , Status code : '+str(newsession.status_code)+', Length:'+str(len(newsession.content))+'\n'

except KeyboardInterrupt as e:
	print 'Error occured : '+str(e)+'\n'
	pass

print '[+] Results '+str(len(results))+'\n'
print results

print '[+] Possible Results '+str(len(possible_result))+'\n'
print possible_result
