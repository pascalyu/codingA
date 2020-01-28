#!/bin/bash
##vérifie seulement depuis la où tu es
filename="exist.sh"
if [ -e "$filename" ]; then
    echo "$filename exists as a file"
fi
directory_name="test_directory"
if [ -d "$directory_name" ]; then
    echo "$directory_name exists as a directory"
fi

#!/bin/bash
filename="sample.md"
if [ ! -f "$filename" ]; then
    touch "$filename"
fi
if [ -r "$filename" ]; then
    echo "you are allowed to read $filename"
else
    echo "you are not allowed to read $filename"
fi