#!/bin/bash

a=(3 5 8 10 6) 
b=(6 5 4 12) 
c=(14 7 5 7)
for x in "${a[@]}"; do 
	
	  for y in "${b[@]}"; do 
	    if [ $x = $y ];then 
	      # assigning the matching results to new array z
	      z[${#z[@]}]=$x
	    fi
	  done 
	done
	#comparison of third array c with new array z
	for i in "${c[@]}"; do 
	  
	  for k in "${z[@]}"; do
	    if [ $i = $k ];then
	      # assigning the matching results to new array j
	      j[${#j[@]}]=$i
	    fi
	  done 
	done 
	
	# print content of array j
	echo ${j[@]}