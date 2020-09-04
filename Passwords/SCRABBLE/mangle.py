#!/usr/bin/env python
# password file mangler with upper/lower + common upper+lower+numeric schema.
import sys

if __name__ == "__main__":
	bytes = open(sys.argv[1],'rb').read()
	for line in open(sys.argv[1],'rb').readlines():
		line = line.strip()
		print line.lower()

	for line in open(sys.argv[1],'rb').readlines():
                line = line.strip()
                print line.upper()

        for line in open(sys.argv[1],'rb').readlines():
                line = line.strip()
		line = line.lower()
                print line.capitalize()
	for i in range(0,10):

	        for line in open(sys.argv[1],'rb').readlines():
        	        line = line.strip()
               		line = line.lower()
                	print line.capitalize() + str(i)
