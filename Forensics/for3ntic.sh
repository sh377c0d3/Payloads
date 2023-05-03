#!/bin/bash
set -ex

OS=$(uname -s | tr A-Z a-z)

case $OS in
  linux)
    source /etc/os-release
    case $ID in
      debian|ubuntu|mint)
        apt install exiftool
        apt install stegsnow
        apt install stegno
        ;;
      arch)
        pacman -S exiftool stegsnow stegno
        ;;
      *)
        echo -n "unsupported linux distro  manually install exiftool,stegsnow,stegno"
        ;;
    esac
  ;;
esac
echo "name of the file : "
read filename
exiftool $filename >> Result.txt
echo "Stegsnow : " >> Result.txt
stegsnow $filename >> Result.txt
echo "Stegno : " >> Result.txt
stegno $filename >> Result.txt

echo "Done...Check Results.txt "
