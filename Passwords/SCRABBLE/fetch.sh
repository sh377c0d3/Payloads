#!/bin/sh
curl www.hasbro.com/scrabble/en_US/search.cfm -d dictWord= | grep "<p><b>" | awk '{print $1}'  >> $1.tmp
cat $1.tmp | sed 's/<p><b>//g' >> $1
rm -rf $1.tmp
