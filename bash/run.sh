clear
export FILE=./sorted_data.txt
sort ./source_data.txt > $FILE && tail -n +1 $FILE